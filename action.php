<?php
session_start();
	$con=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
	//check connection_aborted
	if(mysqli_connect_errno()){
		echo "Failed to connect to mySQL:".mysqli_connect_error();
	}
	//esacpe varible for security
	$MemberID= $_SESSION['MemberID'];
	$TypeofItem=mysqli_real_escape_string($con,$_POST['TypeofItem']);
	if(strcmp($TypeofItem,"Book"))
		{
		$ISSN = mysqli_real_escape_string($con,$_POST['ISBN_ISSN']);
		$ISBN = NULL;	
		$PRODUCER = mysqli_real_escape_string($con,$_POST['Author_Producer']);
		$AUTHOR = NULL;
		}
	else
		{
		$ISSN = NULL;
		$ISBN = mysqli_real_escape_string($con,$_POST['ISBN_ISSN']);	
		$PRODUCER = NULL;
		$AUTHOR = mysqli_real_escape_string($con,$_POST['Author_Producer']);
		}
	$Title=mysqli_real_escape_string($con,$_POST['Title']);
	$Format=mysqli_real_escape_string($con,$_POST['format']);
	$Edition=mysqli_real_escape_string($con,$_POST['Edition']);
	$Publisher=mysqli_real_escape_string($con,$_POST['Publisher']);
	$Language=mysqli_real_escape_string($con,$_POST['Language']);
	$Price=mysqli_real_escape_string($con,$_POST['Price']);
	$Language=mysqli_real_escape_string($con,$_POST['Descriptions']);
	$sql = "INSERT INTO `zp9943_library`.`RequestItem` (`MemberID`, `ItemType`, `Title`, `ISBN`, `ISSN`, `Price`, `Author`, `Producer`, `Edition`, `Language`) VALUES('$MemberID', '$TypeofItem', '$Title', '$ISBN', '$ISSN', '$Price', '$AUTHOR', '$PRODUCER', '$Edition' , '$Language')";
	if(!mysqli_query($con,$sql)){
	die('Error:'.mysqli_error($con));
	}

	header("Location:NEW_requisition2.html"); 
	mysqli_close($con);
?>