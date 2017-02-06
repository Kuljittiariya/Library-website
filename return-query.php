<?php
session_start();
$LibrarianID = $_SESSION['LibrarianID'];
$con=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
		if(mysqli_connect_errno()){
		echo "Failed to connect to mySQL:".mysqli_connect_error();
		}

	$bookID = $_POST['bookID'];
	$Return= $_POST['ReturnDate'];
	$Fine= $_POST['Fine'];

	$queryBook = mysqli_query($con, "SELECT * 
								FROM Member
								LEFT JOIN BorrowItem ON Member.MemberID = BorrowItem.MemberID
								LEFT JOIN BorrowInfo ON BorrowItem.BorrowNo = BorrowInfo.BorrowNo
								LEFT JOIN Item ON BorrowInfo.ItemNo = Item.ItemNo
								LEFT JOIN Book ON Item.ISBN = Book.ISBN
								LEFT JOIN CD ON Item.ISSN = CD.ISSN
								WHERE BorrowInfo.ItemNo = $bookID");	

	$updatePaid = mysqli_query($con,"UPDATE BorrowItem b 
									JOIN BorrowInfo bi ON b.BorrowNo = bi.BorrowNo
									SET PaidStatus = 'PAID'
									WHERE bi.ItemNo = $bookID");

	$updateReturnDate = mysqli_query($con,"UPDATE BorrowInfo b
									JOIN BorrowInfo bi ON b.BorrowNo = bi.BorrowNo
									SET bi.ReturnDate = '$Return',bi.Fine = $Fine
									WHERE bi.ItemNo = $bookID");	
	
	$updateStatus = mysqli_query($con,"UPDATE Item i
									JOIN BorrowInfo bi ON i.ItemNo = bi.ItemNo
									SET AvailableStatus = 'Available' 
									WHERE bi.ItemNo = $bookID");
?>