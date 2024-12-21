class FacultyManager {
    constructor() {
        this.auth = new Auth();
        this.imageUploader = new ImageUploader('/api/admin/faculty/image', 'facultyImages');
        this.initializeEventListeners();
        this.loadFacultyList();
    }

    async loadFacultyList() {
        try {
            const response = await fetch('/api/admin/faculty', {
                headers: this.auth.getAuthHeaders()
            });
            const faculty = await response.json();
            this.updateFacultyTable(faculty);
        } catch (error) {
            console.error('Error loading faculty:', error);
        }
    }

    updateFacultyTable(faculty) {
        const tbody = document.getElementById('facultyList');
        tbody.innerHTML = faculty.map(f => `
            <tr>
                <td>${f.name}</td>
                <td>${f.position}</td>
                <td>${f.department}</td>
                <td>
                    <button onclick="editFaculty('${f._id}')" class="btn btn-sm btn-primary">Edit</button>
                    <button onclick="deleteFaculty('${f._id}')" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        `).join('');
    }
} 