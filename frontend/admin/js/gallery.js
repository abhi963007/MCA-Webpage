class GalleryManager {
    constructor() {
        this.auth = new Auth();
        this.initializeEventListeners();
        this.loadGallery();
    }

    initializeEventListeners() {
        const dropzone = document.getElementById('imageDropzone');
        const fileInput = document.getElementById('fileInput');

        dropzone.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', (e) => this.handleFileSelect(e.target.files));

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('dragover');
            this.handleFileSelect(e.dataTransfer.files);
        });
    }

    async loadGallery() {
        try {
            const response = await fetch('/api/admin/gallery', {
                headers: this.auth.getAuthHeaders()
            });
            const images = await response.json();
            this.updateGalleryGrid(images);
        } catch (error) {
            console.error('Error loading gallery:', error);
        }
    }

    updateGalleryGrid(images) {
        const grid = document.getElementById('galleryGrid');
        grid.innerHTML = images.map(image => `
            <div class="gallery-item">
                <img src="${image.url}" alt="${image.title || 'Gallery Image'}">
                <div class="gallery-item-overlay">
                    <div class="d-flex justify-content-between">
                        <span class="text-white">${image.title || 'Untitled'}</span>
                        <button onclick="galleryManager.deleteImage('${image._id}')" 
                                class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    async handleFileSelect(files) {
        const formData = new FormData();
        Array.from(files).forEach(file => {
            formData.append('images', file);
        });

        try {
            const response = await fetch('/api/admin/gallery/upload', {
                method: 'POST',
                headers: this.auth.getAuthHeaders(),
                body: formData
            });

            if (response.ok) {
                this.loadGallery();
                alert('Images uploaded successfully!');
            } else {
                throw new Error('Failed to upload images');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }

    async deleteImage(imageId) {
        if (!confirm('Are you sure you want to delete this image?')) {
            return;
        }

        try {
            const response = await fetch(`/api/admin/gallery/${imageId}`, {
                method: 'DELETE',
                headers: this.auth.getAuthHeaders()
            });

            if (response.ok) {
                this.loadGallery();
                alert('Image deleted successfully!');
            } else {
                throw new Error('Failed to delete image');
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }
}

// Initialize gallery manager
const galleryManager = new GalleryManager(); 