// Toggle between ATS and EMS login cards
        document.getElementById('toggleToEMS').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginATS').classList.add('d-none');
            document.getElementById('loginEMS').classList.remove('d-none');
        });

        document.getElementById('toggleToATS').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginEMS').classList.add('d-none');
            document.getElementById('loginATS').classList.remove('d-none');
        });