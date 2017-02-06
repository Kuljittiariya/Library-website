<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

  $sql = "SELECT Number.MemberID, Number.FirstName, Number.LastName, MAX(Times) AS count FROM (SELECT Member.MemberID, Member.FirstName, Member.LastName, COUNT(BorrowItem.MemberID) AS Times FROM BorrowItem JOIN Member ON BorrowItem.MemberID = Member.MemberID GROUP BY BorrowItem.MemberID) AS Number";
   $query = mysqli_query($conn,$sql);
   $num = mysqli_fetch_assoc($query);



    				        $MemberID = $num['MemberID'];
                    $FirstName = $num['FirstName'];
                    $count = $num['count'];


                    echo " <table style = 'width:70%; margin:auto;'>

                          <tr>
                          <center>
                            <th style = 'color:white;'>Member ID</th>
                            <th style = 'color:white;'>Name</th>
                            <th style = 'color:white;'>Times</th>
                          </center>
                          </tr>

                          <tr>
                          <center>
                            <td>".$MemberID."</td>
                            <td>".$FirstName."</td>
                            <td>".$count."</td>
                            </center>
                          </tr>

                        </table>
                         ";


?>
