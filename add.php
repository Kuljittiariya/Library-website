<?php
	$con=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
	//check connection_aborted
	if(mysqli_connect_errno()){
		echo "Failed to connect to mySQL:".mysqli_connect_error();
	}
	echo "\n\n\n";
	//esacpe varible for security
	//$TypeofItem=mysqli_real_escape_string($con,$_POST['TypeofItem']);
	$ISBN=mysqli_real_escape_string($con,$_POST['ISBN']);
	$Title=mysqli_real_escape_string($con,$_POST['Title']);
	$Format=mysqli_real_escape_string($con,$_POST['Format']);
    $Quantity=mysqli_real_escape_string($con,$_POST['Quantity']);
	$Author=mysqli_real_escape_string($con,$_POST['Author']);
	$Edition=mysqli_real_escape_string($con,$_POST['Edition']);
	$Publisher=mysqli_real_escape_string($con,$_POST['Publisher']);
	$Language=mysqli_real_escape_string($con,$_POST['Language']);
    $CategoryCode=mysqli_real_escape_string($con,$_POST['Category']);
	$Description=mysqli_real_escape_string($con,$_POST['Description']);
    $BorrowPeriod=mysqli_real_escape_string($con,$_POST['BorrowPeriod']);
    
	$sql="INSERT INTO Book(ISBN, Title, Author, Edition, Publisher, Description, Quantity, Format, Language, BorrowPeriod, CategoryCode) VALUES('$ISBN', '$Title', '$Author', '$Edition', '$Publisher', '$Description', '$Quantity', '$Format', '$Language', '$BorrowPeriod', '$CategoryCode')";
	if(!mysqli_query($con,$sql)){
	die('Error:'.mysqli_error($con));
	}


    $ArrivalDate=mysqli_real_escape_string($con,$_POST['ArrivalDate']);
    for($i=1; $i<=$Quantity; $i++){
    $sql= "INSERT INTO Item(ItemType, Copy, ArrivalDate, ISBN) VALUES ('Book', '".$i."', '$ArrivalDate', '$ISBN')";
    
    if(!mysqli_query($con,$sql)){
        die('Error:'.mysqli_error($con));
    }
    }
	mysqli_close($con);
?>


<html>
<head>
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<link rel="stylesheet" href="add.css">
</head>

<body>
<center>
<table>

<tr>
<td>
BOOK HAS BEEN ADDED
</td>
</tr>

<tr>
<td>
<a href = "Additem.html">
<button type="button" class="btn btn-default btn-lg btn-block">Go BACK TO ADDITION</button>
</a>
</td>
</tr>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</table>
</center>
</body>
</html>