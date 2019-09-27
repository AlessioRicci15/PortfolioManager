<?php
$results = Property::getAll();
$resultsCount = count($results);
if ($resultsCount > 0) {
    echo "
    <table border=1>
        <tr>
            <th class=p1>Adresse</th>
            <th class=p2>Land</th>
            <th class=p3>Baujahr</th>
            <th class=p4>Preis</th>
            <th class=p5>Aktion</th>
        </tr>";
    foreach ($results as $property) {
        echo "
        <tr>
            <td class=p1>
                <a href='properties/show/{$property['id']}'>
                    {$property['Ort']}
                </a>
            </td>
        <td class=p2 class=lang>
            {$property['Landname']}
        </td>
        <td class=p3 class=lang>
            {$property['Baujahr']}
        </td>
        <td class=p4 class=lang>
            {$property['Preis']}
        </td>
        <td class=p5 class=lang>
            <a href=properties/show/{$property['id']}>
                <i class='fa fa-eye'></i> Show<br>
            </a>
            <a href=properties/edit/{$property['id']}>
                <i class='fa fa-edit'></i> Edit<br>
            </a>
            <a href=properties/remove/{$property['id']}>
                <i class='fa fa-trash'></i> Remove
            </a>
        </td>
    </tr>";
    }
        echo "</table>";
    } else {
        echo "0 results";
    }
?>
