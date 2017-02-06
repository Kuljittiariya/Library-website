<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost","zp9943_library","moreFin28","zp9943_library");
$sql = "SELECT RequestNo, MemberID, ItemType, Title, ISBN, ISSN, Price, Author, Producer, Edition, Language FROM `RequestItem`";
$result = $conn->query($sql);

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"RequestNo":"'  . $rs["RequestNo"] . '",';
    $outp .= '"MemberID":"'. $rs["MemberID"]     . '",';    
    $outp .= '"ItemType":"'. $rs["ItemType"]     . '",';
    $outp .= '"Title":"'   . $rs["Title"]        . '",';
    $outp .= '"ISBN":"'   . $rs["ISBN"]        . '",';
    $outp .= '"ISSN":"'   . $rs["ISSN"]        . '",';
    $outp .= '"Price":"'. $rs["Price"]     . '",';
    $outp .= '"Author":"'. $rs["Author"]     . '",';
    $outp .= '"Producer":"'. $rs["Producer"]     . '",';
    $outp .= '"Edition":"'. $rs["Edition"]     . '",';
    $outp .= '"Language":"'. $rs["Language"]     . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>