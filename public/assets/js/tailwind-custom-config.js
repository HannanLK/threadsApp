const tailwindConfig = {
    theme: {
        extend: {
            colors: {
                primary: '#FEE5E2', // Light Peach
                secondary: '#BFA86D', // Golden Beige
                accent: '#8D7536', // Warm Brown
            },
            animation: {
                fadeIn: 'fadeIn 1.2s ease-in-out',
                float: 'float 3s ease-in-out infinite',
                slideIn: 'slideIn 1.5s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: 0 },
                    '100%': { opacity: 1 },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                slideIn: {
                    '0%': { opacity: 0, transform: 'translateX(-100px)' },
                    '100%': { opacity: 1, transform: 'translateX(0)' },
                },
            },
        },
    },
};

// Check if Tailwind is available and apply the config
if (typeof tailwind !== 'undefined') {
    tailwind.config = tailwindConfig;
}
