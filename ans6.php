<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

  $sql = "SELECT Title, COUNT(Title) AS Most FROM RequestItem GROUP BY Title ORDER BY Most DESC LIMIT 3";
  $query = mysqli_query($conn,$sql);


   echo "<table style = 'width:70%; margin:auto;'>
   <tr>
   <center>
     <th style = 'color:white;'>Title</th>
     <th style = 'color:white;'>Request</th>
   </center> 
   </tr>
   </table>" ;
   			            while($num = mysqli_fetch_array($query))
                    {
    				        $Title = $num['Title'];
                    $Most = $num['Most'];


                    echo "<table style = 'width:70%; margin:auto;'>

                    <tr>
                    <center>
                      <td>".$Title."</td>
                      <td>".$Most."</td>
                      </center>
                    </tr>

                  </table>
                         ";
}

?>
