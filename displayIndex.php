<?php
	$vegetacni = $_POST['vegetacni'];
    //$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$db = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=db_roubalik;', 'roubalik', 'dp_roubalik2019');
    $sql = $db->prepare("SELECT ST_AsText(ST_Transform(ST_Envelope(rast),4326)) As boundInd
    FROM $vegetacni;");
    $sql->execute();
	    
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        foreach($row as $field=>$value) {
            echo "{$value}";
        }
    }
?>

