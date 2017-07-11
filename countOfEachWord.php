<html>
<?php
$content = file_get_contents("text.html");
$arrayWord = [];
$split = " ,.\n\t";
$singleWord = strtok($content, $split);
while ($singleWord != false) {
    array_push($arrayWord, $singleWord);
    $singleWord = strtok($split);
}
$tmp = array_count_values($arrayWord);
$key = "Gohar";
?>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Word');
            data.addColumn('number', 'Frequency');
            data.addRows([
                <?php
                foreach ($tmp as $key => $value) {
                    echo "['" . $key . "', " . $value . "],";
                }
                ?>
            ]);


            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {showRowNumber: true, width: '100%', height: '100%', align: 'center'});
        }


    </script>
</head>
<body>
<div id="table_div" style="text-align: center"></div>
</body>

</html>

