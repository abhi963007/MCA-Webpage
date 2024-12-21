class EventManager {
    constructor() {
        this.auth = new Auth();
        this.initializeEventListeners();
        this.loadEvents();
    }

    initializeEventListeners() {
        document.getElementById('addEventForm').addEventListener('submit', (e) => {
            e.preventDefault();
            this.addEvent();
        });
    }

    async loadEvents() {
        try {
            const response = await fetch('/api/admin/events', {
                headers: this.auth.getAuthHeaders()
            });
            const events = await response.json();
            this.updateEventTable(events);
        } catch (error) {
            console.error('Error loading events:', error);
        }
    }

    updateEventTable(events) {
        const tbody = document.getElementById('eventList');
        tbody.innerHTML = events.map(event => `
            <tr>
                <td>${event.title}</td>
                <td>${new Date(event.date).toLocaleDateString()}</td>
                <td>${event.type}</td>
                <td>${event.venue}</td>
                <td>
                    <span class="badge ${event.isActive ? 'bg-success' : 'bg-secondary'}">
                        ${event.isActive ? 'Active' : 'Inactive'}
                    </span>
                </td>
                <td>
                    <button onclick="eventManager.editEvent('${event._id}')" class="btn btn-sm btn-primary">Edit</button>
                    <button onclick="eventManager.toggleStatus('${event._id}')" class="btn btn-sm btn-warning">
                        ${event.isActive ? 'Deactivate' : 'Activate'}
                    </button>
                    <button onclick="eventManager.deleteEvent('${event._id}')" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        `).join('');
    }

    async addEvent() {
        const form = document.getElementById('addEventForm');
        const formData = new FormData(form);

        try {
            const response = await fetch('/api/admin/events', {
                method: 'POST',
                headers: this.auth.getAuthHeaders(),
                body: formData
            });

            if (response.ok) {
                $('#addEventModal').modal('hide');
                form.reset();
                this.loadEvents();
                alert('Event added successfully!');
            } else {
                throw new Error('Failed to add event');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }

    async toggleStatus(eventId) {
        try {
            const response = await fetch(`/api/admin/events/${eventId}/toggle-status`, {
                method: 'PUT',
                headers: this.auth.getAuthHeaders()
            });

            if (response.ok) {
                this.loadEvents();
            } else {
                throw new Error('Failed to toggle event status');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }

    async deleteEvent(eventId) {
        if (!confirm('Are you sure you want to delete this event?')) {
            return;
        }

        try {
            const response = await fetch(`/api/admin/events/${eventId}`, {
                method: 'DELETE',
                headers: this.auth.getAuthHeaders()
            });

            if (response.ok) {
                this.loadEvents();
                alert('Event deleted successfully!');
            } else {
                throw new Error('Failed to delete event');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }
}

// Initialize event manager
const eventManager = new EventManager(); 