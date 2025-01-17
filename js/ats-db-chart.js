const ctx = document.getElementById('applicantsChart').getContext('2d');
const applicantsChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [
            {
                label: '2023',
                data: [17, 48, 30, 36, 26, 27, 50, 31, 10, 45, 39, 11],
                backgroundColor: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: '2024',
                data: [8, 21, 26, 19, 18, 22, 50, 13, 13, 14, 11, 6],
                backgroundColor: 'rgba(30, 99, 132, 0.8)',
                borderColor: 'rgba(30, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 50,
                ticks: {
                    stepSize: 5
                }
            }
        },
        plugins: {
            legend: {
                position: 'top'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return `${context.dataset.label}: ${context.raw}`;
                    }
                }
            }
        }
    }
});