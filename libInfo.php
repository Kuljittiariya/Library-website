<!DOCTYPE html>
<html>
<head>

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">     

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<!-- header 
   ================================================== -->
   <header>

   	<div class="row">

   		<div class="logo">
	         <a href="index.html">Library</a>
	      </div>
	    
	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
					<li class="current"><a class="smoothscroll"  href="#intro" title="">MY PROFILE</a></li>		
          <li><a class="smoothscroll" onclick="location.href='signout.php'" href="signout.php" >LOG-OUT</a></li>      
				</ul>
			</nav>

			<a class="menu-toggle" href="#"><span>Menu</span></a>
   		
   	</div>   	
   	
   </header> <!-- /header --> 



<style>
table, th , td {
    border: 1px solid grey;
    border-collapse: collapse;
     border-spacing: 10px 50px;
    padding: 5px;
}
h1 {
	margin-left: 10cm;
}
span {
  margin-left: 10cm;
}
/*body{
	color: #800000; 
	font-family: sans-serif;
	background: #d9b38c;
}*/
table tr:first-child
{
	background: #800000;
	text-align: center;
}
table tr:nth-child(odd) {
    background-color: #f1f1f1;
    color: #000000;
}
table tr:nth-child(even) {
    background-color: #ffffff;
    color: #000000;
}
</style>
</head>

<!-- intro section
   ================================================== -->
<section id="faq">
<h1>LIBRARIAN INFORMATION</h1>
<span>LIBRARIAN ID 	:</span>  <?php session_start(); $libid = $_SESSION['LibrarianID']; echo($libid); ?><br>
<span>LIBRARIAN NAME 	:</span> <?php session_start(); 
$con = mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
$libid = $_SESSION['LibrarianID']; 
$sql = "SELECT LBfName FROM Libralian WHERE LibrarianID = $libid";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
echo ''.$row['LBfName']; ?><br><br><br>
</table>
<div id="id01"></div>



<body>
  <center>
    <h2>LIBRARIAN'S FUNCTION</h2>
      <ul class="main-navigation">
        <li><a class="smoothscroll" onclick="location.href='Additem.html'" href="Additem.html" >ADDITION</a></li><br>
        <li><a class="smoothscroll" onclick="location.href='borrowItem.php'" href="borrowItem.php" >BORROW | RETURN</a></li><br>
        <li><a class="smoothscroll" onclick="location.href='DATA.html'" href="DATA.html">VIEW ITEM</a></li>
        <br>
        <li><a class="smoothscroll" onclick="location.href='DATAmem.html'" href="DATAmem.html">VIEW MEMBER</a></li>
      </ul>


  </center>
  


</body>
</section>
</html>