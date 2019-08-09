<?php
	$sensorType = $_POST['sensorType'];
	$datetime = $_POST['datetime'];
	$dbsensor = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=sensor;', 'roubalik', 'dp_roubalik2019');
	$sqlSensorData = $dbsensor->prepare("SELECT timestamp, virrib, ec5, rh, ta, vbatt FROM $sensorType WHERE timestamp::text LIKE '$datetime%';");
	$sqlSensorData->execute();
	
    echo "<table id= 'dtHorizontalVerticalExample' class= 'table table-striped table-bordered table-sm' cellspacing='0', width= '100%'>";
    echo "<tr><th>timestamp</th><th>objemová půdní vlhkost</th><th>relativní půdní vlhkost</th><th>relativní vzdušná vlhkost</th><th>teplota</th><th>napětí baterie sensoru</th></tr>";
    while ($row = $sqlSensorData->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";	
?>
