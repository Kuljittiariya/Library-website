<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");
 $date = date_create();
 $tddate = $date->format('Y-m-d');
$sql = "SELECT Member.FirstName, Member.LastName, BorrowInfo.DueDate FROM BorrowInfo JOIN BorrowItem ON BorrowInfo.BorrowNo = BorrowItem.BorrowNo JOIN Member ON BorrowItem.MemberID = Member.MemberID WHERE DueDate < '$tddate' AND BorrowItem.PaidStatus = \"NOPAID\"";


 $query = mysqli_query($conn,$sql);


   echo "   <table style = 'width:70%; margin:auto;'>

           <tr>
           <center>
             <th style = 'color:white;'>FirstName</th>
             <th style = 'color:white;'>LastName</th>
             <th style = 'color:white;'>Due Date</th>
           </center>
           </tr>
           </table>";
   			            while($num = mysqli_fetch_array($query))
                    {
    				        $FirstName = $num['FirstName'];
                    $LastName = $num['LastName'];
                    $DueDate = $num['DueDate'];


                    echo "   <table style = 'width:70%; margin:auto;'>
                            <tr>
                            <center>
                              <td>".$FirstName."</td>
                              <td>".$LastName."</td>
                              <td>".$DueDate."</td>
                              </center>
                            </tr>

                          </table>

                         ";
}

?>
