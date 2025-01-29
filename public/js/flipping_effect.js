document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Simulate successful login
    // alert('Login successful!');
    
    // Trigger flipping effect
    const card = document.getElementById('loginCard'); // Corrected ID reference
    card.classList.add('flipped');

    // Perform operations specific to the back side (if necessary)
    const cardBack = document.getElementById('loginCardBack'); // Unique id for the back side
    setTimeout(() => {
        console.log('Back side is now visible.'); // Optional: Debugging message
    }, 600); 
    
});
