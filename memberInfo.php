<?php

    session_start();
    $conn =  new mysqli("localhost","zp9943_library","moreFin28","zp9943_library");
    $memberid = $_POST['MemberID'];
    $sql = "SELECT MemberID AS "vMemberID" FROM Member WHERE MemberID = '00000000001'";
    $result = $conn->query($sql);
   
    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"vMemberID":"'  . $rs["vMemberID"] . '",';
    $outp .= '"vFirstname":"'. $rs["vFirstname"]     . '",';
    $outp .= '"vBorrowNo":"'   . $rs["vBorrowNo"]        . '",';
    $outp .= '"vBorrowDate":"'   . $rs["vBorrowDate"]        . '",';
    $outp .= '"vItemNo":"'   . $rs["vItemNo"]        . '",';
    $outp .= '"vTitle":"'. $rs["vTitle"]     . '",';
    $outp .= '"vDueDate":"'. $rs["vDueDate"]     . '"}';
    }
    $outp .="]";

    $conn->close();

    echo($outp);
    ?>
   