class CourseManager {
    constructor() {
        this.auth = new Auth();
        this.initializeEventListeners();
        this.loadCourses();
    }

    initializeEventListeners() {
        document.getElementById('addCourseForm').addEventListener('submit', (e) => {
            e.preventDefault();
            this.addCourse();
        });
    }

    async loadCourses() {
        try {
            const response = await fetch('/api/admin/courses', {
                headers: this.auth.getAuthHeaders()
            });
            const courses = await response.json();
            this.updateCourseTable(courses);
        } catch (error) {
            console.error('Error loading courses:', error);
        }
    }

    updateCourseTable(courses) {
        const tbody = document.getElementById('courseList');
        tbody.innerHTML = courses.map(course => `
            <tr>
                <td>${course.code}</td>
                <td>${course.name}</td>
                <td>${course.semester}</td>
                <td>${course.credits}</td>
                <td>
                    <span class="badge ${course.isActive ? 'bg-success' : 'bg-secondary'}">
                        ${course.isActive ? 'Active' : 'Inactive'}
                    </span>
                </td>
                <td>
                    <button onclick="courseManager.editCourse('${course._id}')" class="btn btn-sm btn-primary">Edit</button>
                    <button onclick="courseManager.toggleStatus('${course._id}')" class="btn btn-sm btn-warning">
                        ${course.isActive ? 'Deactivate' : 'Activate'}
                    </button>
                    <button onclick="courseManager.deleteCourse('${course._id}')" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        `).join('');
    }

    async addCourse() {
        const form = document.getElementById('addCourseForm');
        const formData = new FormData(form);
        const courseData = Object.fromEntries(formData.entries());

        try {
            const response = await fetch('/api/admin/courses', {
                method: 'POST',
                headers: {
                    ...this.auth.getAuthHeaders(),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(courseData)
            });

            if (response.ok) {
                $('#addCourseModal').modal('hide');
                form.reset();
                this.loadCourses();
                alert('Course added successfully!');
            } else {
                throw new Error('Failed to add course');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }

    async toggleStatus(courseId) {
        try {
            const response = await fetch(`/api/admin/courses/${courseId}/toggle-status`, {
                method: 'PUT',
                headers: this.auth.getAuthHeaders()
            });

            if (response.ok) {
                this.loadCourses();
            } else {
                throw new Error('Failed to toggle course status');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }

    async deleteCourse(courseId) {
        if (!confirm('Are you sure you want to delete this course?')) {
            return;
        }

        try {
            const response = await fetch(`/api/admin/courses/${courseId}`, {
                method: 'DELETE',
                headers: this.auth.getAuthHeaders()
            });

            if (response.ok) {
                this.loadCourses();
                alert('Course deleted successfully!');
            } else {
                throw new Error('Failed to delete course');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }
}

// Initialize course manager
const courseManager = new CourseManager(); 