<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

  $sql = "SELECT data.FirstName, data.LastName, MAX(Fine) AS fine FROM (SELECT Member.FirstName, Member.LastName, BorrowInfo.Fine FROM BorrowInfo JOIN BorrowItem ON BorrowInfo.BorrowNo = BorrowItem.BorrowNo JOIN Member ON BorrowItem.MemberID = Member.MemberID WHERE BorrowInfo.ReturnDate BETWEEN '2016-12-01' AND '2016-12-31') AS data ";
   $query = mysqli_query($conn,$sql);
   $num = mysqli_fetch_assoc($query);




                    $FirstName = $num['FirstName'];
                    $LastName = $num['LastName'];
                    $fine = $num['fine'];


                    echo " <table style = 'width:70%; margin:auto;'>

                          <tr>
                          <center>
                            <th style = 'color:white;'>FirstName</th>
                            <th style = 'color:white;'>LastName</th>
                            <th style = 'color:white;'>Fine</th>
                          </center>
                          </tr>

                          <tr>
                          <center>
                            <td>".$FirstName."</td>
                            <td>".$LastName."</td>
                            <td>".$fine."</td>
                            </center>
                          </tr>

                        </table>
                         ";


?>
