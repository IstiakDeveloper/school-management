document.addEventListener('DOMContentLoaded', () => {
    const sideMenu = document.querySelector('aside');
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-btn');
    const darkMode = document.querySelector('.dark-mode');

    // Show the side menu when menu button is clicked
    menuBtn.addEventListener('click', () => {
        sideMenu.style.display = 'block';
    });

    // Hide the side menu when close button is clicked
    closeBtn.addEventListener('click', () => {
        sideMenu.style.display = 'none';
    });

    // Toggle dark and light mode
    darkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode-variables');
        const isDarkMode = document.body.classList.contains('dark-mode-variables');
        
        // Update the icon states
        darkMode.querySelector('span:nth-child(1)').classList.toggle('active', !isDarkMode);
        darkMode.querySelector('span:nth-child(2)').classList.toggle('active', isDarkMode);

        // Save the theme preference to local storage
        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
    });

    // Apply the saved theme preference on page load
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode-variables');
        darkMode.querySelector('span:nth-child(1)').classList.remove('active');
        darkMode.querySelector('span:nth-child(2)').classList.add('active');
    } else {
        darkMode.querySelector('span:nth-child(1)').classList.add('active');
        darkMode.querySelector('span:nth-child(2)').classList.remove('active');
    }
});



document.addEventListener('DOMContentLoaded', () => {
    const loadingOverlay = document.getElementById('loadingOverlay');
    loadingOverlay.classList.add('show');
    
    // Simulate a delay for demonstration purposes (remove this in production)
    setTimeout(() => {
        loadingOverlay.classList.remove('show');
    }, 2000); // 3 seconds delay
});


// Back to Top Button
document.addEventListener('scroll', () => {
    const backToTopButton = document.getElementById('backToTop');
    
    if (window.scrollY > 300) { // Show button after scrolling 300px
        backToTopButton.classList.add('show');
    } else {
        backToTopButton.classList.remove('show');
    }
});

document.getElementById('backToTop').addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});


