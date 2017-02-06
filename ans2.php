<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

  $sql = "SELECT Number.ItemNo, Number.Title, MAX(Times) AS count FROM (SELECT Book.Title, Item.ItemNo, COUNT(BorrowInfo.ItemNo) AS Times FROM BorrowInfo JOIN Item ON BorrowInfo.ItemNo = Item.ItemNo JOIN Book ON Item.ISBN = Book.ISBN GROUP BY BorrowInfo.ItemNo) AS Number\n";
   $query = mysqli_query($conn,$sql);
   $num = mysqli_fetch_assoc($query);



    				$Title = $num['Title'];

                    $ItemNo = $num['ItemNo'];
                    $count = $num['count'];


                    echo " <table style = 'width:70%; margin:auto;'>

                          <tr>
                          <center>
                            <th style = 'color:white;'>Title</th>
                            <th style = 'color:white;'>Item Number</th>
                            <th style = 'color:white;'>Times</th>
                          </center>
                          </tr>

                          <tr>
                          <center>
                            <td>".$Title."</td>
                            <td>".$ItemNo."</td>
                            <td>".$count."</td>
                            </center>
                          </tr>

                        </table>
                         ";


?>
