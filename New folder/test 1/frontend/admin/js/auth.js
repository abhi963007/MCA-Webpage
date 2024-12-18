class Auth {
    constructor() {
        this.baseUrl = config.API_BASE_URL;
        this.token = localStorage.getItem('adminToken');
        this.checkAuth();
        console.log('Auth initialized with baseUrl:', this.baseUrl);
    }

    async checkAuth() {
        if (!this.token && !window.location.href.includes('login.html')) {
            window.location.href = 'login.html';
            return;
        }
    }

    async login(username, password) {
        try {
            console.log('Attempting login to:', `${this.baseUrl}/admin/login`);
            const requestBody = { username, password };
            console.log('Request body:', requestBody);
            
            const response = await fetch(`${this.baseUrl}/admin/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(requestBody),
                mode: 'cors',
                credentials: 'include'
            });

            console.log('Login response status:', response.status);
            const responseText = await response.text();
            console.log('Response text:', responseText);
            
            let data;
            try {
                data = JSON.parse(responseText);
            } catch (e) {
                console.error('Failed to parse response:', e);
                throw new Error('Invalid server response');
            }

            if (!response.ok) {
                throw new Error(data.error || 'Login failed');
            }

            localStorage.setItem('adminToken', data.token);
            window.location.href = 'index.html';
        } catch (error) {
            console.error('Login error:', error);
            throw error;
        }
    }

    async logout() {
        localStorage.removeItem('adminToken');
        window.location.href = 'login.html';
    }

    getAuthHeaders() {
        return {
            'Authorization': `Bearer ${this.token}`,
            'Content-Type': 'application/json'
        };
    }
}

// Initialize auth
const auth = new Auth();

// Handle login form submission
async function handleLogin(event) {
    event.preventDefault();
    const form = event.target;
    const username = form.username.value;
    const password = form.password.value;
    const errorDiv = document.getElementById('errorMessage');
    
    // Clear previous errors
    errorDiv.classList.add('d-none');
    errorDiv.textContent = '';

    try {
        await auth.login(username, password);
    } catch (error) {
        console.error('Login submission error:', error);
        errorDiv.textContent = error.message;
        errorDiv.classList.remove('d-none');
    }
    return false;
} 