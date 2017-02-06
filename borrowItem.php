<html>
	<head>
		<title>
			Borrow Item
		</title>
	</head>
	<?php
		session_start();
		$LibrarianID = $_SESSION['LibrarianID'];
	?>
	<body>
		<a href="http://www.zp9943.tld.122.155.18.18.no-domain.name/libInfo.php">
			Back
		</a>
		<center><h2>Borrow Item</h2></center>
		<form action="borrow.php" method ="post">
			<center>
				<table>
					<tr>
						<td>
						 Member ID
						</td>
						<td>
							<input type="text" name="memberID">
						</td>
						<td colspan=2>
							<input type="submit" name="submit" value="Submit">
						</td>
					</tr>
				</table>
			</center>
		</form>
	</body>
</html>