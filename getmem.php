<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost","zp9943_library","moreFin28","zp9943_library");
$sql = "SELECT MemberID , FirstName , LastName, DateOfBirth, Gender , MemberTypeCode FROM Member";
$result = $conn->query($sql);

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"MemberID":"'  . $rs["MemberID"] . '",';
    $outp .= '"FirstName":"'. $rs["FirstName"]     . '",';    
    $outp .= '"LastName":"'. $rs["LastName"]     . '",';
    $outp .= '"DateOfBirth":"'   . $rs["DateOfBirth"]        . '",';
    $outp .= '"Gender":"'   . $rs["Gender"]        . '",';
    $outp .= '"MemberTypeCode":"'   . $rs["MemberTypeCode"]        . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>