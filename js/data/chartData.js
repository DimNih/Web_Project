var ctxA = document.getElementById('myAreaChart').getContext('2d');
var myAreaChart = new Chart(ctxA, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Earnings',
            data: earningsData,
            borderColor: '#4e73df',
            backgroundColor: 'rgba(78, 115, 223, 0.05)',
            fill: true,
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctxB = document.getElementById('myBarChart').getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Quantity Sold',
            data: quantityData,
            backgroundColor: '#4e73df',
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

