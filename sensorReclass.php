<?php
	$reclassifyInput = $_POST['reclassifyInput'];
	$reclassifyOutput = $_POST['reclassifyOutput'];
	//$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$db = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=db_roubalik;', 'roubalik', 'dp_roubalik2019');
	$deleteTable = $db->prepare("DROP TABLE IF EXISTS $reclassifyOutput;");
	$deleteTable->execute();
	$sql = $db->prepare("CREATE TABLE $reclassifyOutput AS SELECT 
	ST_Reclass(a.rast,1,']-1--0.1]:1, (-0.1-0]:2, (0-0.1]:3, (0.1-1]:4, (-9999:5', '32BF',0)
	FROM $reclassifyInput AS a;");
    $sql->execute();	
?>
