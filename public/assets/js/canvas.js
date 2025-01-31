document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('mouse-animation');
    const ctx = canvas.getContext('2d');

    // Function to resize the canvas to cover the full page, including scrollable area
    function resizeCanvas() {
        const docWidth = Math.max(document.documentElement.scrollWidth, document.body.scrollWidth, window.length);
        const docHeight = Math.max(document.documentElement.scrollHeight, document.body.scrollHeight, window.innerHeight);
        canvas.width = docWidth;
        canvas.height = docHeight;
    }

    // Initial canvas setup
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
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const scrollLeft = window.scrollX || document.documentElement.scrollLeft;

        // Adjust the particle's position to include scrolling offsets
        for (let i = 0; i < 5; i++) {
            particlesArray.push(new Particle(clientX + scrollLeft, clientY + scrollTop));
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
    window.addEventListener('scroll', resizeCanvas); // Update canvas size on scroll

    animate();
});
