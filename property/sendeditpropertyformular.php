<?php
    include("../sql/databaseconnaction.php");
    include("../sql/getformularvariable.php");
    $lander = "SELECT `land`.`LandID`
                FROM `land` 
                WHERE land.Landname = '$land'";
    $result = $conn->query($lander);
    $row = $result->fetch_assoc();
    $landid = "{$row['LandID']}";
    $changer = "UPDATE immobilien 
                SET Ort='$adresse', Baujahr='$baujahr', Preis='$preis', Land=$landid
                WHERE immobilien.id =" . intval($_POST['id']);
    if ($conn->query($changer)){
        include("../layout/head.php");
        include("../layout/headereditproperty.php");
        include("../layout/nav.php");
        include("../layout/maineditproperty.php");
        include("../layout/footer.php");
        }
        else{
            echo "Error: ". $changer ."". $conn->error;
        }
    $conn->close();
?>