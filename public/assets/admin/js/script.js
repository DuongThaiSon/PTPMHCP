$(document).ready(function () {
    $('#datatable').DataTable();

    $.get('getchart',{},function(data){
        console.log(data);
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: data.arrDate,
                datasets: [{
                    label: 'Nhiệt độ',
                    backgroundColor: 'rgba(22, 170, 255, 1)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: data.arrTemp
                }]
            },

            // Configuration options go here
            options: {}
        });
    })

    
   
});
