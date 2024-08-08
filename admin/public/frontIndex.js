// Show loading overlay
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


