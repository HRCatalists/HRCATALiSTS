const chartCanvas = document.getElementById('applicantsChart');
if (chartCanvas) {
    const ctx = chartCanvas.getContext('2d');
    const applicantsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'January', 'February', 'March', 'April'],
            datasets: [
                {
                    label: '2022-2023',
                    data: [26, 27, 50, 31, 10, 45, 39, 11, 17, 48, 30, 36],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: '2023-2024',
                    data: [18, 22, 50, 13, 13, 14, 11, 6, 8, 21, 26, 19],
                    borderColor: 'rgba(30, 99, 132, 1)',
                    backgroundColor: 'rgba(30, 99, 132, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
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
}


// const ctx = document.getElementById('applicantsChart').getContext('2d');
// const applicantsChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: ['May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'January', 'February', 'March', 'April'],
//         datasets: [
//             {
//                 label: '2022-2023',
//                 data: [26, 27, 50, 31, 10, 45, 39, 11, 17, 48, 30, 36],
//                 borderColor: 'rgba(54, 162, 235, 1)',
//                 backgroundColor: 'rgba(54, 162, 235, 0.2)',
//                 borderWidth: 2,
//                 fill: true,
//                 tension: 0.4
//             },
//             {
//                 label: '2023-2024',
//                 data: [18, 22, 50, 13, 13, 14, 11, 6, 8, 21, 26, 19],
//                 borderColor: 'rgba(30, 99, 132, 1)',
//                 backgroundColor: 'rgba(30, 99, 132, 0.2)',
//                 borderWidth: 2,
//                 fill: true,
//                 tension: 0.4
//             }
//         ]
//     },
//     options: {
//         responsive: true,
//         maintainAspectRatio: false,
//         scales: {
//             y: {
//                 beginAtZero: true,
//                 max: 50,
//                 ticks: {
//                     stepSize: 5
//                 }
//             }
//         },
//         plugins: {
//             legend: {
//                 position: 'top'
//             },
//             tooltip: {
//                 callbacks: {
//                     label: function(context) {
//                         return `${context.dataset.label}: ${context.raw}`;
//                     }
//                 }
//             }
//         }
//     }
// });
