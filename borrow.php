<html>
	<script language="JavaScript">
		function showHide(elementid){
			if (document.getElementById(elementid).style.display == 'none'){
				document.getElementById(elementid).style.display = '';
			}else {
				document.getElementById(elementid).style.display = 'none';
			}
		}
		
		function returnbook(id,returndate,fine){
				
				//alert(id);
				//alert(returndate);
                var test = new XMLHttpRequest();
                var data = new FormData();
                data.append('bookID',id);
				data.append('ReturnDate',returndate);
				data.append('Fine',fine);
                
   
                test.onreadystatechange = function(){
					if(test.readyState == 4 && test.status == 200){
						location.reload();
						alert('Returned');
						//alert(test.responseText);
					}
                }
                test.open('POST','return-query.php',true);
                test.send(data);
				
        }
		
		function showlist(mid){
				//alert(document.getElementById("itemNo").value);
		        var test = new XMLHttpRequest();
                var data = new FormData();
				data.append('memberID',mid);
				data.append('itemID',document.getElementById("itemNo").value);
                
				test.onreadystatechange = function(){
					if(test.readyState == 4 && test.status == 200){
						document.getElementById("mylist").innerHTML=test.responseText;
					}
                }
                test.open('POST','get_borrow.php',true);
                test.send(data);
		}
		
		function borrowbook(id,mID){
			//alert(id);
			//alert(mID);
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
	<head>
		<title>
			Borrow Item
		</title>
	</head>
	<body>
	<a href="http://www.zp9943.tld.122.155.18.18.no-domain.name/libInfo.php">
		Back
	</a>
		<center><h2>Borrow Item</h2></center>
	</body>
<?php
		session_start();
		$LibrarianID = $_SESSION['LibrarianID'];
		
		$con=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
		
		if(mysqli_connect_errno()){
		echo "Failed to connect to mySQL:".mysqli_connect_error();
		}
		
		if(isset($_POST['submit'])){
			$memberID=mysqli_real_Escape_string($con,$_POST['memberID']);
			
			$query = mysqli_query($con, "SELECT ReturnDate
								FROM Member m
								LEFT JOIN BorrowItem bi ON m.MemberID = bi.MemberID
								LEFT JOIN BorrowInfo b ON bi.BorrowNo = b.BorrowNo
								LEFT JOIN Item i ON b.ItemNo = i.ItemNo
								LEFT JOIN Book bo ON i.ISBN = bo.ISBN
								LEFT JOIN CD cd ON i.ISSN = cd.ISSN
								WHERE bi.MemberID = $memberID");	
				
			$query2 = mysqli_query($con, "SELECT *
				FROM MemberType
				JOIN Member ON Member.memberTypeCode = MemberType.memberTypeCode 
				WHERE Member.MemberID = $memberID");
				/*$BorrowNo = $fetchBook['BorrowNo'];
					$BookId = $fetchBook['ItemNo'];
					$Title = $fetchBook['Title'];
					$DueDate = $fetchBook['DueDate'];*/
			$query3 = mysqli_query($con, "SELECT ReturnDate, bi.BorrowNo, b.ItemNo, bo.Title AS Title1, cd.Title AS Title2, DueDate
								FROM Member m
								LEFT JOIN BorrowItem bi ON m.MemberID = bi.MemberID
								LEFT JOIN BorrowInfo b ON bi.BorrowNo = b.BorrowNo
								LEFT JOIN Item i ON b.ItemNo = i.ItemNo
								LEFT JOIN Book bo ON i.ISBN = bo.ISBN
								LEFT JOIN CD cd ON i.ISSN = cd.ISSN
								WHERE bi.MemberID = $memberID");
				
			$nameQuery = mysqli_query($con, "SELECT *
				FROM Member
				WHERE MemberID = $memberID");
			
			$fetchName=mysqli_fetch_assoc($nameQuery);
			$fName = $fetchName['FirstName'];
			$lName = $fetchName['LastName'];
			$countDate = 0;

			while($fetchAmount1=mysqli_fetch_array($query))
			{
				$check = $fetchAmount1['ReturnDate'];
				if($check==NULL){
					$countDate++;
				}	
			}
			
			$fetchAmount2=mysqli_fetch_assoc($query2);

			
			$amountBorrow = $countDate;
			$amountAllow = $fetchAmount2['NoOfItemAllow'];
			$availableBorrow = $amountAllow-$amountBorrow;			
			
			echo "<center> <b>Name: $fName $lName</b> 
					<br>Member ID: $memberID 
					<p> Amount of Borrowed Item: $amountBorrow 
					<br> Amount of Allowed Item : $amountAllow 
					<br> Available of Borrowed Item Left : $availableBorrow 
					<p>
				</center>";

			
			echo"	<center>
						<table>
							<tr>
								<td><button onclick=\"javascript:showHide('return');\">Return</button></td>
								<td><button onclick=\"javascript:showHide('borrow');\">Borrow</button></td>
							</tr>
						</table>
					<center>";
					
					echo "<center>
					<table id='return' border='1' style='display:none'>
						<tr>
							<td>Borrow Number</td>
							<td>Item Number</td>
							<td>Title</td>
							<td>Due Date</td>
							<td>Return Date</td>
							<td>Fine</td>
							<td>Return</td>
						</tr>";	
						
			while ($fetchBook =mysqli_fetch_array($query3)){
				$checkReturn = $fetchBook['ReturnDate'];
				if($checkReturn== NULL){
					$BorrowNo = $fetchBook['BorrowNo'];
					$BookId = $fetchBook['ItemNo'];
					$Title = $fetchBook['Title1'];
					if($Title == NULL)
						$Title = $fetchBook['Title2'];
					$DueDate = $fetchBook['DueDate'];
					$Return = date_create();
					$Due = date_create($DueDate);
					if($Due<$Return){
						$Date = date_diff($Return,$Due);
						$diffDate = $Date->format('%d');
						$Fine = $diffDate*5;
					}else{
						$Fine = 0;
					}
					$ReturnDate = $Return->format('Y-m-d');
					
				echo "	<tr>
							<td>$BorrowNo</td>
							<td>$BookId</td>
							<td>$Title</td>
							<td>$DueDate</td>
							<td>$ReturnDate</td>
							<td>$Fine</td>
							<td><button onClick='returnbook(\"$BookId\",\"$ReturnDate\",\"$Fine\"); '>Return</button></td>
						</tr>";		
				}
			
			}
			echo"</table>";
			echo"<center>
					<form action='borrow.php' method ='post'>
						<p id='borrow' style='display:none'>
							<input type='text' id ='itemNo' name='itemID' placeholder='Item Number' required>
							<input type='button' onClick=\"showlist('$memberID');\" name='search' value='Search'>
							<div id='mylist'>
							</div>
						</p>
					</form>
				</center>";
		}
	?>

	
	

</html>