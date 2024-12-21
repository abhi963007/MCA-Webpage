class ImageUploader {
    constructor(uploadUrl, galleryId) {
        this.uploadUrl = uploadUrl;
        this.galleryElement = document.getElementById(galleryId);
        this.setupDropzone();
    }

    setupDropzone() {
        const dropzone = document.getElementById('imageDropzone');
        if (dropzone) {
            dropzone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzone.classList.add('dragover');
            });

            dropzone.addEventListener('dragleave', () => {
                dropzone.classList.remove('dragover');
            });

            dropzone.addEventListener('drop', async (e) => {
                e.preventDefault();
                dropzone.classList.remove('dragover');
                
                const files = e.dataTransfer.files;
                await this.uploadFiles(files);
            });
        }
    }

    async uploadFiles(files) {
        const formData = new FormData();
        Array.from(files).forEach(file => {
            formData.append('images[]', file);
        });

        try {
            const response = await fetch(this.uploadUrl, {
                method: 'POST',
                headers: auth.getAuthHeaders(),
                body: formData
            });

            if (response.ok) {
                const data = await response.json();
                this.updateGallery(data.images);
            }
        } catch (error) {
            console.error('Upload failed:', error);
            alert('Upload failed');
        }
    }

    updateGallery(images) {
        images.forEach(image => {
            const imgElement = document.createElement('div');
            imgElement.className = 'gallery-item';
            imgElement.innerHTML = `
                <img src="${image.url}" alt="${image.name}">
                <div class="gallery-item-actions">
                    <button onclick="deleteImage('${image.id}')">Delete</button>
                </div>
            `;
            this.galleryElement.appendChild(imgElement);
        });
    }
} 