<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.min.css">

    <title><?=$title ?></title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'SubBidang');
            data.addColumn('number', 'Anggota');

            var chart_data_table = <?php echo json_encode($chart_data_table); ?>;

            for (i = 0; i < chart_data_table.length; i++) {
                data.addRow([chart_data_table[i]['SubBidangName'], parseInt(chart_data_table[i]['Jumlah'])]);
            }

            var options = {
                'height': 400,
                'pieHole': 0.4
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

  </head>
  <body>
