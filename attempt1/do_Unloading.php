<?php
require('boot.php');
$stmt = pdo()->prepare("SELECT * FROM `offers` WHERE `user`= 'Slava'");

$stmt->execute();


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result[1]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);  
// while($row = $stmt->fetchAll()) {  
//     echo $row['id'] . "\n";  
//     echo $row['profession'] . "\n";  
//     echo $row['countPlace'] . "\n";  
// }
echo "<table>"; // start a table tag in the HTML
foreach($result as $row){
    echo 
    "<tr><td>" . "<h3>Номер</h3>" .
    "</td><td>" . 
    "</td></tr>" .
    "<tr><td>" . htmlspecialchars($row['id']) . 
    "</td><td>" . htmlspecialchars($row['profession']) . 
    "</td><td>" . htmlspecialchars($row['countPlace']) . 
    "</td><td>" . htmlspecialchars($row['salary']) . 
    "</td><td>" . htmlspecialchars($row['townRegion']) . 
    "</td><td>" . htmlspecialchars($row['restrictSex']) . 
    "</td><td>" . htmlspecialchars($row['age']) . 
    "</td><td>" . htmlspecialchars($row['education']) . 
    "</td></tr>";  //$row['index'] the index here is a field name

}
echo "</table>";
