<?php
  $conn=mysqli_connect("localhost","zp9943_library","moreFin28","zp9943_library");

  $sql = "SELECT new.Author, MAX(num) AS NumBook FROM (SELECT Author, COUNT(Author) AS num FROM Book GROUP BY Author ORDER BY num DESC) AS new";
  $query = mysqli_query($conn,$sql);

   echo "  <table style = 'width:70%; margin:auto;'>

           <tr>
           <center>
             <th style = 'color:white;'>Author</th>
             <th style = 'color:white;'>Number of book</th>
           </center>
           </tr>
           </table>";
   		while($num = mysqli_fetch_array($query))
      {
    			$Author = $num['Author'];
          $NumBook = $num['NumBook'];


          echo "  <table style = 'width:70%; margin:auto;'>

                  <tr>
                  <center>
                    <td>".$Author."</td>
                    <td>".$NumBook."</td>
                  </center>
                  </tr>

                </table>

              ";
}

?>
