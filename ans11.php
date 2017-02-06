<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

  $sql = "SELECT DISTINCT Book.Title, Item.ArrivalDate FROM Book, Item WHERE Book.ISBN = Item.ISBN AND ArrivalDate BETWEEN '2016-12-01' AND '2016-12-31'";
       $query = mysqli_query($conn,$sql);


   echo " <table style = 'width:70%; margin:auto;'>

         <tr>
         <center>
           <th style = 'color:white;'>Title</th>
           <th style = 'color:white;'>Arrival Date</th>
         </center>
         </tr>
         </table>";
   			            while($num = mysqli_fetch_array($query))
                    {
    				          $Title = $num['Title'];
                      $ArrivalDate = $num['ArrivalDate'];


                      echo " <table style = 'width:70%; margin:auto;'>

                            <tr>
                            <center>
                              <td>".$Title."</td><dd>
                              <td>".$ArrivalDate."</td>
                              </center>
                            </tr>

                          </table>
                            ";
                    }

?>
