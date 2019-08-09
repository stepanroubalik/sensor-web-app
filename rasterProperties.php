<?php
	/*Create a database connection*/
	$tabulka = $_POST['meta'];
	//$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$db = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=db_roubalik;', 'roubalik', 'dp_roubalik2019');
	/*Create and display raster metadata*/
	$sqlMetadata = $db->prepare("SELECT
				ST_Height(rast) As h,
				round(ST_PixelWidth(rast)::numeric,0) AS pw,
				ST_SRID(rast) AS srid,
				ST_BandPixelType(rast,1) AS bt
				FROM $tabulka");
    $sqlMetadata->execute();
    echo "<table id= 'dtHorizontalVerticalExample' class= 'table table-striped table-bordered table-sm' cellspacing='0', width= '100%'>";
    echo "<tr><th>rozměr dlaždice</th><th>velikost pixelu[m]</th><th>srs</th><th>spektrální rozlišení</th></tr>";
    while ($row = $sqlMetadata->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";
	
	/*Convert raster from 16-bit type to 8-bit type*/
	//$sqlTransform = $db->prepare("UPDATE $tabulka SET rast = ST_Reclass(rast,'0–2147483647:0-255', '8BUI');");
	//$sqlTransform->execute();
	
?>



