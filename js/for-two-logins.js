document.getElementById('flipToEMS').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('flipCard').classList.add('flipped');
});

document.getElementById('flipToATS').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('flipCard').classList.remove('flipped');
});
