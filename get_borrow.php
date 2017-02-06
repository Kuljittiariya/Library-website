<html>
	<script>
		function borrowbook(id,mID){
			var test = new XMLHttpRequest();
			var data = new FormData();
			data.append('bookID',id);
			data.append('memberID',mID);
			test.onreadystatechange = function(){
				if(test.readyState == 4 && test.status == 200){
					location.reload();
					alert(test.responseText);
				}
			}
			test.open('POST','borrow-query.php',true);
			test.send(data);
		}
	</script>
	
	<?php
		session_start();
		$LibrarianID = $_SESSION['LibrarianID'];
		$con=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
		if(mysqli_connect_errno()){
			echo "Failed to connect to mySQL:".mysqli_connect_error();
		}
		
		$memberID = $_POST['memberID'];
		$bookID = $_POST['itemID'];
		$queryShowBook = mysqli_query($con, "SELECT *,i.ItemNo AS Item, bo.Title AS Title1, cd.Title AS Title2, bo.Author AS Author1, cd.Producer AS Author2, bo.Edition AS Edition1
										FROM Item i
										LEFT JOIN Book bo ON i.ISBN = bo.ISBN
										LEFT JOIN CD cd ON i.ISSN = cd.ISSN
										WHERE i.ItemNo = '$bookID'");
																	
		$fetchShow=mysqli_fetch_assoc($queryShowBook);
		
		$ItemNo = $fetchShow['Item'];
		$Title = $fetchShow['Title1'];
		if($Title ==NULL)
			$Title = $fetchShow['Title2'];
		$Author = $fetchShow['Author1'];
		if($Author ==NULL)
			$Author = $fetchShow['Author2'];
		$Edition = $fetchShow['Edition1'];
		if($Edition ==NULL)
			$Edition = '-';
		$Copy = $fetchShow['Copy'];
		$Status = $fetchShow['AvailableStatus'];
		
		echo $ItemNo;
		echo "	<table border='1'>
					<tr>
						<td>Item Number</td>
						<td>Title</td>
						<td>Author</td>
						<td>Edition</td>
						<td>Copy</td>
						<td>Status</td>
						<td>Borrow</td>
					</tr>
					<tr>
						<td>$ItemNo</td>	
						<td>$Title</td>
						<td>$Author</td>
						<td>$Edition</td>
						<td>$Copy</td>
						<td>$Status</td>";
						if($Status == "Available"){
							echo"<td>
								<input type='button' onClick='borrowbook(\"$ItemNo\",\"$memberID\");' name='borrowButton' value='Borrow'>
								</td>";
						}else{
							echo"<td>-</td>";
						}
				echo"</tr>
				</table>";
	?>
</html>