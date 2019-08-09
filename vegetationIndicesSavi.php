<?php
    $redpasmo = $_POST['savi_red'];
    $nirpasmo = $_POST['savi_nir'];
	$index = $_POST['savi'];
    //$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$db = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=db_roubalik;', 'roubalik', 'dp_roubalik2019');
    $deleteSaviTable = $db->prepare("DROP TABLE IF EXISTS $index;");
	$deleteSaviTable->execute();	
	$sql = $db->prepare("CREATE TABLE $index AS SELECT ST_MapAlgebra
					(arast, 1, brast, 1, '(-1)*((1 + 0.5) * ([rast1] - [rast2]) / ([rast1] + [rast2] + 0.5))::float', '32BF')
					AS rast FROM 
					(SELECT a.rast as arast, b.rast as brast FROM $redpasmo a INNER JOIN $nirpasmo b ON a.rid = b.rid) as joined");
    $sql->execute();
?>
