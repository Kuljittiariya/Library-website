<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

    $sql = "SELECT SUM(Quantity) As Quantity1 FROM Book";
    $query = mysqli_query($conn,$sql);
    $num = mysqli_fetch_assoc($query);
    $Quantity1 =  $num['Quantity1'];


    $sql = "SELECT SUM(Quantity) As Quantity2 FROM CD";
    $query = mysqli_query($conn,$sql);
    $num = mysqli_fetch_assoc($query);
    $Quantity2 = $num['Quantity2'];

    echo "<table style = 'width:70%; margin:auto;'>

          <tr>
          <center>
            <th style = 'color:white;'>Book</th>
            <th style = 'color:white;'>CD</th>

          </center>
          </tr>

          <tr>
          <center>
            <td>".$Quantity1."</td>
            <td>".$Quantity2."</td>
            </center>
          </tr>

        </table>"



?>
