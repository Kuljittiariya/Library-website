<?php 

$conn = new mysqli("localhost","zp9943_library","moreFin28","zp9943_library");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}
/* $ID = $_POST['user']; 
$Password = $_POST['pass']; */ 
function SignIn() 
{ 
	$conn = new mysqli("localhost","zp9943_library","moreFin28","zp9943_library");
	session_start(); //starting the session for user profile page
	if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
	{ 
		$query = "SELECT * FROM Libralian where LibrarianID = '$_POST[user]' AND libPassword = '$_POST[pass]'";
		$memberid = $_POST[user];
		$result = $conn->query($query);
		$row = $result->fetch_array(); 
		if(!empty($row['LibrarianID']) AND !empty($row['libPassword'])) 
			{ 
				//$_SESSION['LibrarianID'] = $row['libPassword']; 
				$_SESSION['LibrarianID'] = $_POST[user];
				header("Location:libInfo.php");
			} 
		else 
			{ 
				header("Location:libSignIn2.html");
				echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
			} 
	} 
} 
	if(isset($_POST['submit'])) 
		{ 
			SignIn(); 
		}
	mysqli_close($conn);
?>