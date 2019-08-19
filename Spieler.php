<?php

	

class Spieler {

	public $SpielerIDs;
	public $Grund;
	public $Datum_Grund;
	public $Datum_Erledigt;

	public function setSpielerDaten($SpielerIDs, $Grund, $Datum_Grund){
			$this->SpielerIDs = $_GET['Spieler_ID'];
			$this->Grund = $_GET['Grund'];
			$this->Datum_Grund = $_GET['Datum_Grund'];
			$this->Datum_Erledigt = $_GET['Datum_Erledigt'];
	}
	
	public function insertSpielerDaten($SpielerIDs, $Grund, $Datum_Grund){

		foreach ($SpielerIDs as $Spieler_IDr) {
			$sql = "insert into mg_kl_kistenliste (Spieler_ID,Grund,Datum_Grund,Datum_Erledigt) values('$Spieler_IDr', '$Grund', '$Datum_Grund', '$Datum_Erledigt')";
			$conn = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');
			$conn->query($sql);
		}
	}

	public function printTableSpielerDaten(){
		require("connection.php");
		$sql="select Trikotnummer, Name, ID from mg_kl_spieler order by Name";
		$stmt = $conn->query($sql);

		$stack = array("<table> <thead> <tr> <th> Name </th> <th> Trikotnummer </th> </thead>");
			foreach ($stmt->fetchall(PDO::FETCH_ASSOC) as $row) {
				array_push($stack, "<tr>");
                  	foreach($row as $key => $value){
						if($key == "Name" || $key == "Trikotnummer"){
							array_push($stack, "<td> $value </td>");
						}
						else{
							array_push($stack, "");
						}	
                 	}
				array_push($stack, "</tr>");
			}
		array_push($stack, "</table>");

		return print(implode('', $stack));
		/* return print_r($stack); */
	}

	public function printSelectSpielerDaten(){
		$sql = "select ID, Trikotnummer, Name from mg_kl_spieler order by Trikotnummer";

		foreach ($conn->query($sql) as $row) {
			$Spieler_ID = $row['ID'];
			$Trikotnummer = $row['Trikotnummer'];
			$Name = $row['Name'];
			echo "<option value='$Spieler_ID'>$Trikotnummer $Name</option>";
		}
	}

/* if(isset($_GET['submit']))(
	setSpielerDaten();
	insertSpielerDaten();
) */
}


#header("Location: http://localhost/FC/showTable.php/");
?>
<!--<a href="showTable.php">Weiter</a> -->