
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('performanceChart').getContext('2d');
        
            const data = {
                labels: ['2020', '2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Performance',
                    data: [1.5, 2, 1, 1.8, 2.3, 2.5],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Colors for bars
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Border colors for bars
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(201, 203, 207, 1)'
                    ],
                    borderWidth: 1
                }]
            };
        
            const options = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };
        
            new Chart(ctx, {
                type: 'bar', // Bar chart
                data: data,
                options: options
            });
        });
        
 