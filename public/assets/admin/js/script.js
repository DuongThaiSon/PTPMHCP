$(document).ready(function () {
    $('#datatable').DataTable();

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'],
            datasets: [{
                label: 'Nhiệt độ',
                backgroundColor: 'rgba(22, 170, 255, 1)',
                borderColor: 'rgb(255, 99, 132)',
                data: [27.1, 28, 29.3, 28.1, 28.9, 28.6, 28.8]
            }]
        },

        // Configuration options go here
        options: {}
    });
});
