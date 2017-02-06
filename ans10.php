<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

$sql = "SELECT Gender, COUNT(Gender) AS Sexual FROM Member GROUP BY Gender LIMIT 0, 30 ";
$query = mysqli_query($conn,$sql);


echo " <table style = 'width:70%; margin:auto;'>

      <tr>
      <center>
        <th style = 'color:white;'>Gender</th>
        <th style = 'color:white;'>Count</th>
      </center>
      </tr>
      </table>";
   			            while($num = mysqli_fetch_array($query))
                    {
    				        $Gender = $num['Gender'];
                    $Sexual = $num['Sexual'];


                    echo " <table style = 'width:70%; margin:auto;'>


                          <tr>
                          <center>
                            <td>".$Gender."</td>
                            <td>".$Sexual."</td>
                            </center>
                          </tr>

                        </table>


                         ";
}

?>
