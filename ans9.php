<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

  $sql = "SELECT Libralian.LBfName, COUNT(BorrowItem.LibrarianID) AS count FROM Libralian, BorrowItem WHERE Libralian.LibrarianID = BorrowItem.LibrarianID GROUP BY BorrowItem.LibrarianID DESC LIMIT 0, 30 ";
   $query = mysqli_query($conn,$sql);
   $num = mysqli_fetch_assoc($query);

   echo "   <table style = 'width:70%; margin:auto;'>

           <tr>
           <center>
             <th style = 'color:white;'>Librarian Name</th>
             <th style = 'color:white;'>Count</th>
           </center>
           </tr>
           </table>";
   			            while($num = mysqli_fetch_array($query))
                    {
    				          $LBfName = $num['LBfName'];
                      $count = $num['count'];


                    echo "   <table style = 'width:70%; margin:auto;'>

                            <tr>
                            <center>
                              <td>".$LBfName."</td>
                              <td>".$count."</td>
                              </center>
                            </tr>

                          </table>

                         ";

                    }
?>
