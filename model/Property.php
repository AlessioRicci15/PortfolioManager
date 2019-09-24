<?php

class Property
{

    private $adresse;

    private $land;

    private $preis;

    private $baujahr;

    private $lat;

    private $lng;

    private $id;

    function setAdresse($newAdresse)
    {
        $this->adresse = $newAdresse;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    function setLand($newLand)
    {
        $this->land = $newLand;
    }

    function getLand()
    {
        return $this->land;
    }

    function setPreis($newPreis)
    {
        $this->preis = $newPreis;
    }

    function getPreis()
    {
        return $this->preis;
    }

    function setBaujahr($newBaujahr)
    {
        $this->baujahr = $newBaujahr;
    }

    function getBaujahr()
    {
        return $this->baujahr;
    }

    function setLat($newLat)
    {
        $this->lat = $newLat;
    }

    function getLat()
    {
        return $this->lat;
    }

    function setLng($newLng)
    {
        $this->lng = $newLng;
    }

    function getLng()
    {
        return $this->lng;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function createProperty($adress, $baujahr, $price, $land)
    {
        global $conn;

        $insert = "INSERT INTO immobilien (Ort, Baujahr, Preis, Land)
									values (
										'$adress',
										'$baujahr',
										'$price',
										'$land'
									)";

        if ($conn->query($insert))
        {
            $conn->close();
            return true;
        } else
        {
            $conn->close();
            return false;
        }
    }

    public static function getAll()
    {
        global $conn;
        $sql = "SELECT `immobilien`.`id`, `immobilien`.`Ort`, `immobilien`.`Preis`, `immobilien`.`Baujahr`, `land`.`Landname`
            FROM `immobilien`
            LEFT JOIN `land` ON `immobilien`.`Land` = `land`.`LandID`";
        $result = $conn->query($sql);

        $results = [];

        while ($row = $result->fetch_assoc())
        {
            $object = new Property();

            $object->setAdresse($row['Ort']);
            $object->setBaujahr($row['Baujahr']);
            $object->setPreis($row['Preis']);
            $object->setLand($row['Landname']);
            $object->setId($row['id']);

            array_push($results, $object);
        }

        $conn->close();
        return $results;
    }
}

?>
