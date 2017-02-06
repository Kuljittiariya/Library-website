<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

  $sql = "SELECT Member.MemberID, Member.FirstName, COUNT( BorrowItem.MemberID ) AS Times FROM Member JOIN BorrowItem ON BorrowItem.MemberID = Member.MemberID GROUP BY BorrowItem.MemberID ORDER BY Times LIMIT 3";
  $query = mysqli_query($conn,$sql);


   echo " <table style = 'width:70%; margin:auto;'>

         <tr>
         <center>
           <th style = 'color:white;'>Student Member Type</th>
           <th style = 'color:white;'>Name</th>
           <th style = 'color:white;'>Total</th>
         </center>
         </tr>
         </table>";
   			            while($num = mysqli_fetch_array($query))
                    {
    				        $MemberID = $num['MemberID'];
                    $FirstName = $num['FirstName'];
                    $Times = $num['Times'];

                    echo " <table style = 'width:70%; margin:auto;'>
                          <tr>
                          <center>
                            <td>".$MemberID."</td>
                            <td>".$FirstName."</td>
                            <td>".$Times."</td>
                            </center>
                          </tr>

                        </table>
                         ";
}

?>
