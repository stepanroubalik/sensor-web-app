<?php
	$sens = $_POST['sens'];
    //$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$db = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=db_roubalik;', 'roubalik', 'dp_roubalik2019');
    $sqlLocation = $db->prepare("SELECT coord As coord FROM $sens;");
    $sqlLocation->execute();
	
	while ($row = $sqlLocation->fetch(PDO::FETCH_ASSOC)){
        foreach($row as $field=>$value) {
            echo "{$value}";
        }
    }	
?>
