<?php
	$con=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
	//check connection_aborted
	if(mysqli_connect_errno()){
		echo "Failed to connect to mySQL:".mysqli_connect_error();
	}
	
	$fName=mysqli_real_escape_string($con,$_POST['fName']);
	$mName=mysqli_real_escape_string($con,$_POST['mName']);
	$lName=mysqli_real_escape_string($con,$_POST['lName']);
	
	$idNo=mysqli_real_escape_string($con,$_POST['idNo']);
	$passportNo=mysqli_real_escape_string($con,$_POST['passportNo']);
	$nationality=mysqli_real_escape_string($con,$_POST['nationality']);
	
	$dateOfBirth=mysqli_real_escape_string($con,$_POST['dateOfBirth']);
	$gender=mysqli_real_escape_string($con,$_POST['gender']);
	
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$phone=mysqli_real_escape_string($con,$_POST['phone']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	
	
	//$memberCheck=mysqli_real_escape_string($con,$_POST['check']);
	if(isset($con,$_POST['check']) && 
	$_POST['check'] == 1) 
	{
		$memberCheck = 'S';
	}
	else
	{
		$memberCheck = 'G';
	}
	$studentID=mysqli_real_escape_string($con,$_POST['studentId']);
	$university=mysqli_real_escape_string($con,$_POST['university']);
	
	$password=mysqli_real_escape_string($con,$_POST['memPassword']);

	$sql = "INSERT INTO `zp9943_library`.`Member` (`MemberPassword`, `FirstName`, `MiddleName`, `LastName`, `Nationality`, `IDNo`, `PassportNo`, `DateOfBirth`, `Gender`, `Phone`, `Email`, `Address`, `MemberTypeCode`, `StudentID`, `University`) VALUES('$password','$fName', '$mName', '$lName','$nationality', '$idNo', '$passportNo','$dateOfBirth', '$gender', '$phone', '$email', '$address', '$memberCheck', '$studentID', '$university');";
	if(!mysqli_query($con,$sql)){
	die('Error:'.mysqli_error($con));
	} 
	mysqli_close($con);
?>



<!DOCTPYE html>

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <!--- basic page nee
   ================================================== -->
   <meta charset="utf-8">
	<title>Rak Karn Arn Library</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">     

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="favicon.png">

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   <header>

   	<div class="row">

   		<div class="logo">
	         <a href="index.html">Library</a>
	      </div>


			<a class="menu-toggle" href="#"><span>Menu</span></a>
   		
   	</div>   	
   	
   </header> <!-- /header -->

<div class="row">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<center>
	<h1 style="color:white"; >SUCESSED REGISTER!</h1>
  	<h1 style="color:white";> YOUR MEMBER ID IS : </h1>
    <h1 style="color:white"; style="text-align:center;" ><?php $con=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library"); $result = mysqli_query($con,"SELECT MemberID FROM Member ORDER BY MemberID DESC LIMIT 1");
$row=mysqli_fetch_assoc($result);
echo ''.$row["MemberID"]; ?></h1>
<form action="Sign-in.html" method ="post">
<input id="button" style="font-size: 15;"  type="submit" name="submit" value="Log-In"> </form> 
</center>

</div>
  </body>
</html>


