// Select all elements with the 'animate' class
const animatedElements = document.querySelectorAll('.animate');

// Create an Intersection Observer
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view'); // Trigger the specific animation
            observer.unobserve(entry.target); // Stop observing once animated
        }
    });
}, {
    threshold: 0.2, // Trigger when 20% of the element is visible
});

// Observe each animated element
animatedElements.forEach((el) => observer.observe(el));
