<?php
session_start();
$LibrarianID = $_SESSION['LibrarianID'];
$con=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
		if(mysqli_connect_errno()){
		echo "Failed to connect to mySQL:".mysqli_connect_error();
		}
	$bookID = $_POST['bookID'];
	$memberID = $_POST['memberID'];
	$current = date_create();
	$currentDate = $current->format('Y-m-d');
	
	$borrowDate = date_create();
	$query = mysqli_query($con, "SELECT *, bo.BorrowPeriod AS BorrowPeriod1, cd.BorrowPeriod AS BorrowPeriod2
								FROM Member m
								LEFT JOIN BorrowItem bi ON m.MemberID = bi.MemberID
								LEFT JOIN BorrowInfo b ON bi.BorrowNo = b.BorrowNo
								LEFT JOIN Item i ON b.ItemNo = i.ItemNo
								LEFT JOIN Book bo ON i.ISBN = bo.ISBN
								LEFT JOIN CD cd ON i.ISSN = cd.ISSN
								WHERE b.ItemNo LIKE '%$bookID%'");				
	$fetch=mysqli_fetch_assoc($query);
		$borrowPeriod = $fetch['BorrowPeriod1'];
	if($borrowPeriod == NULL)
		$borrowPeriod = $fetch['BorrowPeriod2'];
	
	
	$borrowDate->modify("+$borrowPeriod days");
	$DueDate = $borrowDate->format('Y-m-d');
	
	$updateBorrowItem=mysqli_query($con,"INSERT INTO BorrowItem(memberID, LibrarianID, PaidStatus, BorrowDate)
				VALUES('$memberID', '$LibrarianID', 'NOPAID', '$currentDate')");

	$newQuery=mysqli_query($con,"SELECT BorrowNo 
								FROM BorrowItem 
								ORDER BY BorrowNo DESC LIMIT 1");
	$fetchBorrowNo=mysqli_fetch_assoc($newQuery);
	$borrowNo = $fetchBorrowNo['BorrowNo'];
	
	$updateBorrowInfo =mysqli_query($con,"INSERT INTO BorrowInfo(BorrowNo, ItemNo, DueDate)
		VALUES('$borrowNo', '$bookID', '$DueDate')");	

	$updateStatus = mysqli_query($con,"UPDATE Item i
									JOIN BorrowInfo bi ON i.ItemNo = bi.ItemNo
									SET AvailableStatus = 'NotAvailable' 
									WHERE bi.ItemNo = $bookID");
	
?>