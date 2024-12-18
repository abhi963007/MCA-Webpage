class AdminPanel {
    constructor() {
        this.auth = new Auth();
        this.initializeEventListeners();
        this.loadDashboardData();
        this.setupActivityLogging();
    }

    initializeEventListeners() {
        document.addEventListener('DOMContentLoaded', () => {
            // Handle form submissions
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', (e) => this.handleFormSubmit(e));
            });

            // Handle logout
            const logoutBtn = document.getElementById('logoutBtn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', () => this.auth.logout());
            }
        });
    }

    async loadDashboardData() {
        try {
            const response = await fetch('/api/dashboard-stats', {
                headers: this.auth.getAuthHeaders()
            });
            const data = await response.json();
            
            this.updateDashboard(data);
        } catch (error) {
            console.error('Error loading dashboard data:', error);
        }
    }

    updateDashboard(data) {
        document.getElementById('facultyCount').textContent = data.facultyCount;
        document.getElementById('courseCount').textContent = data.courseCount;
        document.getElementById('eventCount').textContent = data.eventCount;
    }

    async handleFormSubmit(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: form.method,
                headers: this.auth.getAuthHeaders(),
                body: formData
            });

            if (response.ok) {
                this.logActivity(`Form submitted: ${form.id}`);
                alert('Operation successful!');
                this.loadDashboardData();
            } else {
                throw new Error('Operation failed');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }

    async logActivity(action) {
        try {
            await fetch('/api/admin/activity-log', {
                method: 'POST',
                headers: this.auth.getAuthHeaders(),
                body: JSON.stringify({
                    action,
                    timestamp: new Date().toISOString()
                })
            });
        } catch (error) {
            console.error('Error logging activity:', error);
        }
    }

    setupActivityLogging() {
        // Log page visits
        this.logActivity(`Visited ${window.location.pathname}`);
    }
}

// Initialize admin panel
const adminPanel = new AdminPanel(); 