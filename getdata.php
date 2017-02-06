<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost","zp9943_library","moreFin28","zp9943_library");
$sql = "SELECT i.ItemNo AS ItemNo, i.Copy AS Copy, i.ItemType AS ItemType, i.ISSN AS ISSN, i.ISBN AS ISBN , cd.Title AS cdTitle, bk.Title AS bookTitle, i.AvailableStatus AS Availability\n"
    . "FROM Item i LEFT JOIN Book bk ON i.ISBN = bk.ISBN\n"
    . "LEFT JOIN CD cd ON i.ISSN = cd.ISSN";
$result = $conn->query($sql);

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"ItemNo":"'  . $rs["ItemNo"] . '",';
    $outp .= '"Copy":"'. $rs["Copy"]     . '",';    
    $outp .= '"ItemType":"'. $rs["ItemType"]     . '",';
    $outp .= '"cdTitle":"'   . $rs["cdTitle"]        . '",';
    $outp .= '"bookTitle":"'   . $rs["bookTitle"]        . '",';
    $outp .= '"ISSN":"'   . $rs["ISSN"]        . '",';
    $outp .= '"ISBN":"'. $rs["ISBN"]     . '",';
    $outp .= '"Availability":"'. $rs["Availability"]     . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>