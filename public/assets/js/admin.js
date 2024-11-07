$(document).ready(function() {
    // Initialize Chart.js
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // chart options
    });

    // Initialize DataTables
    $('#myTable').DataTable({
        // datatable options
    });
});