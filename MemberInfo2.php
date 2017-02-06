<?php

    session_start();
    $conn =  new mysqli("localhost","zp9943_library","moreFin28","zp9943_library");
    $memberid = $_SESSION['MemberID'];
    $sql = "SELECT m.MemberID AS vMemberID, m.FirstName AS vFirstName, bi.BorrowNo AS vBorrowNo, bi.BorrowDate AS vBorrowDate, b.ItemNO AS vItemNo, cd.Title AS cdTitle, bk.Title AS vTitle, b.DueDate AS vDueDate\n"
    . "FROM Member m\n"
    . "LEFT JOIN BorrowItem bi ON m.MemberID = bi.MemberID\n"
    . "LEFT JOIN BorrowInfo b ON bi.BorrowNo = b.BorrowNo\n"
    . "LEFT JOIN Item i ON b.ItemNo = i.ItemNo\n"
    . "LEFT JOIN Book bk ON i.ISBN = bk.ISBN\n"
    . "LEFT JOIN CD cd ON i.ISSN = cd.ISSN\n"
    . "WHERE m.MemberID = $memberid";
    $result = $conn->query($sql) or trigger_error($mysqli->error."[$sql]");
   
    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"vMemberID":"'  . $rs["vMemberID"] . '",';
    $outp .= '"vFirstName":"'. $rs["vFirstName"]     . '",';
    $outp .= '"vBorrowNo":"'   . $rs["vBorrowNo"]        . '",';
    $outp .= '"vBorrowDate":"'   . $rs["vBorrowDate"]        . '",';
    $outp .= '"vItemNo":"'   . $rs["vItemNo"]        . '",';
    $outp .= '"vTitle":"'. $rs["vTitle"]     . '",';
    $outp .= '"cdTitle":"'   . $rs["cdTitle"]        . '",';
    $outp .= '"vDueDate":"'. $rs["vDueDate"]     . '"}';
    }
    $outp .="]";

    $conn->close();

    echo($outp);    

    ?>
   