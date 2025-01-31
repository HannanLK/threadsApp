//// Home page

// mobile menu
const menuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

menuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

// user dropdown
document.getElementById('dropdown-button').addEventListener('click', function () {
    const menu = document.getElementById('dropdown-menu');
    const expanded = this.getAttribute('aria-expanded') === 'true';
    menu.classList.toggle('hidden');
    this.setAttribute('aria-expanded', !expanded);
});

// image functionality
const thumbnails = document.querySelectorAll('.thumbnail');
const mainImage = document.getElementById('mainImage');

thumbnails.forEach(thumbnail => {
 thumbnail.addEventListener('click', () => {
     const newSrc = thumbnail.src.replace('100', '600x700'); 
     mainImage.src = newSrc;
 });
});


// Size functionality
const sizeOptions = document.querySelectorAll('.size-option');
sizeOptions.forEach(option => {
 option.addEventListener('click', () => {
     sizeOptions.forEach(btn => btn.classList.remove('selected'));
     option.classList.add('selected');
 });
});


// Color functionality
const colorOptions = document.querySelectorAll('.color-option');
colorOptions.forEach(option => {
 option.addEventListener('click', () => {
     colorOptions.forEach(btn => btn.classList.remove('selected'));
     option.classList.add('selected');
 });
});


// Quantity functionality
const decrementButton = document.getElementById('decrement');
const incrementButton = document.getElementById('increment');
const quantityDisplay = document.getElementById('quantity');
let quantity = 1;

decrementButton.addEventListener('click', () => {
    if (quantity > 1) {
        quantity--;
        quantityDisplay.textContent = quantity;
    }
});

incrementButton.addEventListener('click', () => {
    quantity++;
    quantityDisplay.textContent = quantity;
});


const canvas = document.getElementById('mouse-animation');
const ctx = canvas.getContext('2d');

// Function to resize the canvas to cover the full page, including scrollable area
function resizeCanvas() {
    canvas.width = document.documentElement.scrollWidth;
    canvas.height = document.documentElement.scrollHeight;
}

// Initial setup
resizeCanvas();

const particlesArray = [];
const colors = ['#FFD700', '#FF4500', '#6A5ACD', '#32CD32', '#FF1493'];

class Particle {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.size = Math.random() * 8 + 1;
        this.color = colors[Math.floor(Math.random() * colors.length)];
        this.speedX = Math.random() * 2 - 1;
        this.speedY = Math.random() * 2 - 1;
    }
    update() {
        this.x += this.speedX;
        this.y += this.speedY;
        this.size *= 0.95; // Shrink over time
    }
    draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = this.color;
        ctx.fill();
    }
}

// Handle mouse movement to generate particles
function handleMouse(event) {
    const { clientX, clientY } = event;
    for (let i = 0; i < 5; i++) {
        particlesArray.push(new Particle(clientX, clientY + window.scrollY)); // Adjust for scroll position
    }
}

// Animate the particles
function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < particlesArray.length; i++) {
        particlesArray[i].update();
        particlesArray[i].draw();
        if (particlesArray[i].size < 0.5) {
            particlesArray.splice(i, 1); // Remove tiny particles
            i--;
        }
    }
    requestAnimationFrame(animate);
}

// Event listeners
window.addEventListener('mousemove', handleMouse);
window.addEventListener('resize', resizeCanvas); // Adjust canvas size on window resize
window.addEventListener('scroll', () => {
    resizeCanvas(); // Ensure canvas adapts to new document height when scrolling
});

animate(); // Start animation



//product details
const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('.content');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        
        tabs.forEach(t => t.classList.remove('border-black-500', 'text-black-900'));
        contents.forEach(c => c.classList.add('hidden'));

        tab.classList.add('border-black-500', 'text-black-900');
        contents[index].classList.remove('hidden');
    });
});




document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('mouse-animation');
    const ctx = canvas.getContext('2d');

    // Function to resize the canvas to cover the full page, including scrollable area
    function resizeCanvas() {
        canvas.width = document.documentElement.scrollWidth;
        canvas.height = document.documentElement.scrollHeight;
    }

    // Initial setup
    resizeCanvas();

    const particlesArray = [];
    const colors = ['#FFD700', '#FF4500', '#6A5ACD', '#32CD32', '#FF1493'];

    class Particle {
        constructor(x, y) {
            this.x = x;
            this.y = y;
            this.size = Math.random() * 8 + 1;
            this.color = colors[Math.floor(Math.random() * colors.length)];
            this.speedX = Math.random() * 2 - 1;
            this.speedY = Math.random() * 2 - 1;
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            this.size *= 0.95; // Shrink over time
        }
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = this.color;
            ctx.fill();
        }
    }

    // Handle mouse movement to generate particles
    function handleMouse(event) {
        const { clientX, clientY } = event;
        for (let i = 0; i < 5; i++) {
            particlesArray.push(new Particle(clientX, clientY + window.scrollY)); // Adjust for scroll position
        }
    }

    // Animate the particles
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (let i = 0; i < particlesArray.length; i++) {
            particlesArray[i].update();
            particlesArray[i].draw();
            if (particlesArray[i].size < 0.5) {
                particlesArray.splice(i, 1); // Remove tiny particles
                i--;
            }
        }
        requestAnimationFrame(animate);
    }

    // Event listeners
    window.addEventListener('mousemove', handleMouse);
    window.addEventListener('resize', resizeCanvas); // Adjust canvas size on window resize
    window.addEventListener('scroll', () => {
        resizeCanvas(); // Ensure canvas adapts to new document height when scrolling
    });

    animate();
});


//image upload
function previewMultipleImages(event) {
    const previewContainer = document.getElementById('imagePreviewContainer');
    const files = event.target.files;

    // Limit the number of images to 5
    if (files.length > 5) {
        alert("You can only upload up to 5 images.");
        event.target.value = ""; // Reset the file input
        return;
    }

    previewContainer.innerHTML = ''; // Clear existing previews

    Array.from(files).forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            // Create preview container
            const imageContainer = document.createElement('div');
            imageContainer.className = 'relative w-20 h-20 overflow-hidden bg-gray-100 rounded-lg shadow-md';

            // Create image element
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = "Uploaded Image";
            img.className = 'object-cover w-full h-full';

            // Add remove button
            const removeButton = document.createElement('button');
            removeButton.innerHTML = '×';
            removeButton.className = 'absolute flex items-center justify-center w-5 h-5 text-sm font-bold text-white bg-red-500 rounded-full shadow top-1 right-1 hover:bg-red-600';
            removeButton.onclick = function () {
                imageContainer.remove();
            };

            // Append elements
            imageContainer.appendChild(img);
            imageContainer.appendChild(removeButton);
            previewContainer.appendChild(imageContainer);
        };
        reader.readAsDataURL(file);
    });
}


function toggleSidebar() {
    const sidebar = document.getElementById('filter-sidebar');
    sidebar.classList.toggle('hidden');
}


function toggleDropdown(category) {
    const dropdown = document.getElementById(`${category}-dropdown`);
    const arrow = document.getElementById(`${category}-arrow`);
    dropdown.classList.toggle('hidden');
    arrow.textContent = dropdown.classList.contains('hidden') ? '▼' : '▲';
}












    





