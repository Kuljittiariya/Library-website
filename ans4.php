<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

    $sql ="SELECT COUNT(*) AS numMember FROM Member";
    $query = mysqli_query($conn,$sql);
    $num = mysqli_fetch_assoc($query);
    $num1 =  $num['numMember'];
    //echo $num1."<br>";

    $sql = "SELECT COUNT(*) AS numLibrarian FROM Libralian" ;
    $query = mysqli_query($conn,$sql);
    $num = mysqli_fetch_assoc($query);
    $num2 = $num['numLibrarian'];
    //echo $num2."<br>";
    $total = $num1+$num2;

    echo "<table style = 'width:70%; margin:auto;'>

          <tr>
          <center>
            <th style = 'color:white;'>Student Member Type</th>
            <th style = 'color:white;'>General Member Type</th>
            <th style = 'color:white;'>Total</th>
          </center>
          </tr>

          <tr>
          <center>
            <td>".$num1."</td>
            <td>".$num2."</td>
            <td>".$total."</td>
            </center>
          </tr>

        </table>"



 ?>
