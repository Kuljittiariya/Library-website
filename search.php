
   
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
   <title>Rak Karn Arn Library</title>
   <meta name="description" content="">  
   <meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/new.css">
   <link rel="stylesheet" href="css/vendor.css">     

   <!-- script
   ================================================== -->
   <script src="js/modernizr.js"></script>

   <!-- favicons
   ================================================== -->
   <link rel="icon" type="image/png" href="favicon.png">

</head>

   <header>

      <div class="row">

         <div class="logo">
            <a href="index.html">Library</a>
         </div>

         <nav id="main-nav-wrap">
            <ul class="main-navigation">
              <li class="current"><a class="smoothscroll" onclick="location.href='index.html'" href="index.html" title="">Home</a></li>
              
              <li><a class="smoothscroll"  onclick="location.href='Analysis.html'" href="Analysis.html" title="">ANALYSIS</a></li>
              <li><a class="smoothscroll"  onclick="location.href='Sign-in.html'" href="Sign-in.html" title="">Log-In</a></li>        
              <li class="highlight with-sep"><a class="smoothscroll" onclick="location.href='libSignIn.html'" href="libSignIn.html" title="">Librarian</a></li>             
            </ul>
         </nav>

         <a class="menu-toggle" href="#"><span>Menu</span></a>
         
      </div>      
      
   </header> <!-- /header -->

               <!-- intro section
   ================================================== -->
   <section id="intro">

      <div class="shadow-overlay"></div>

      <div class="intro-content">
         <div class="row">

            <div class="col-twelve">

               <h5>Welcome to Library.</h5><br><br>
            <center>
            <form action="search.php" method ="post">
            <input type="text" name="search" value="" placeholder="Search Book" required="">
            <select name="TypeSearch">
               <option value="All" selected>Select Type</option>
               <option value="BookTitle">Book Title</option>
               <option value="CDTitle">CD Title</option>
               <option value="ISBN">ISBN</option>
               <option value="ISSN">ISSN</option>
               <option value="Author">Author</option>
               <option value="Producer">Producer</option>
                           
            </select>
            </center>
               <input type="SUBMIT" name="submitsearch" value="Search" /><br /><br />

      
<h4>
<?php
$output = NULL;

if(isset($_POST['submitsearch'])){
   
                  $mysqli = NEW MySQLi("localhost","zp9943_library","moreFin28","zp9943_library");
                  $search = $mysqli->real_escape_string($_POST['search']);
                  $TypeSearch = $mysqli->real_escape_string($_POST['TypeSearch']);

         switch($TypeSearch){
            case "BookTitle":
            $query = "SELECT Book.*, Category.CategoryName FROM Book, Category where Book.CategoryCode = Category.CategoryCode AND Title LIKE '%$search%'";
            $res = mysqli_query($mysqli, $query) or die(mysqli_error());
            $count = mysqli_num_rows($res);
            if($count > 0)
            {
               
                while($row = mysqli_fetch_array($res))
                {
                    $Title = $row['Title'];
                    $Author = $row['Author'];
                    $ISBN = $row['ISBN'];
                    $Edition = $row['Edition'];
                    $Language = $row['Language'];
                    $CategoryName = $row['CategoryName'];

                    echo " <font color =\"white\">
                                <td>Title: $Title</td> <br />
                                <td>ISBN: $ISBN</td> <br />
                                <td>Author: $Author</td> <br />
                                <td>Edition: $Edition</td><br />
                                <td>Language: $Language</td><br />
                                <td>Category: $CategoryName<br /><br /></tr>
                         ";

                     
                }
            }else{
                echo "<p>Not found.</p>"; 
            }
            break;       

            case "CDTitle":
            $query = "SELECT c.* , ca.CategoryName FROM CD c , Category ca where c.CategoryCode = ca.CategoryCode AND Title LIKE '%$search%'";
            $res = mysqli_query($mysqli, $query) or die(mysqli_error());
            $count = mysqli_num_rows($res);
            if($count > 0)
            {
               

                while($row = mysqli_fetch_array($res))
                {
                    $Title = $row['Title'];
                    $Producer = $row['Producer'];
                    $ISSN = $row['ISSN'];
                    $Language = $row['Language'];
                    $CategoryName = $row['CategoryName'];

                    echo " <font color =\"white\">
                                Title : $Title <br />
                                ISSN : $ISSN <br />
                                Producer : $Producer <br />
                                Language : $Language <br />
                                Category : $CategoryName<br /><br />
                           </font>
                         ";
                }
            }else{
                echo "<p>Not found.</p>"; 
            }
            break; 

            case "ISBN":
            $query = "SELECT b.* , c.CategoryName FROM Book where b.CategoryCode = c.CategoryCode AND ISBN LIKE '%$search%'";
            $res = mysqli_query($mysqli, $query) or die(mysqli_error());
            $count = mysqli_num_rows($res);
            if($count > 0)
            {
               

                while($row = mysqli_fetch_array($res))
                {
                    $Title = $row['Title'];
                    $Author = $row['Author'];
                    $ISBN = $row['ISBN'];
                    $Edition = $row['Edition'];
                    $Language = $row['Language'];
                    $CategoryName = $row['CategoryName'];
                    echo " <font color =\"white\">
                                Title : $Title <br />
                                ISBN : $ISBN <br />
                                Author : $Author <br />
                                Edition : $Edition<br />
                                Language : $Language,<br />
                           </font>
                         ";
                }
            }else{
                echo"<p>Not found.</p>"; 
            }
            break;   

            case "ISSN":
            $query = "SELECT c.*, ca.CategoryName FROM CD c, Category ca WHERE c.CategoryCode = ca.CategoryCode AND ISSN LIKE '%$search%'";
            $res = mysqli_query($mysqli, $query) or die(mysqli_error());
            $count = mysqli_num_rows($res);
            if($count > 0)
            {
               

                while($row = mysqli_fetch_array($res))
                {
                    $Title = $row['Title'];
                    $Producer = $row['Producer'];
                    $ISSN = $row['ISSN'];
                    $Language = $row['Language'];
                    $CategoryName = $row['CategoryName'];

                    echo " <font color =\"white\">
                                Title : $Title <br />
                                ISSN : $ISSN <br />
                                Producer : $Producer <br />
                                Language : $Language <br />
                                Category : $CategoryName <br /><br />
                           </font>
                         ";
                }
            }else{
                echo "<p>Not found.</p>"; 
            }
            break;  
            
            case "Author":
            $query = "SELECT b.*, c.CategoryName FROM Book b , Category c WHERE b.CategoryCode = c.CategoryCode AND Author LIKE '%$search%'";
            $res = mysqli_query($mysqli, $query) or die(mysqli_error());
            $count = mysqli_num_rows($res);
            if($count > 0)
            {
               

                while($row = mysqli_fetch_array($res))
                {
                    $Title = $row['Title'];
                    $Author = $row['Author'];
                    $ISBN = $row['ISBN'];
                    $Edition = $row['Edition'];
                    $Language = $row['Language'];
                    $CategoryName = $row['CategoryName'];

                    echo " <font color =\"white\">
                                Title : $Title <br />
                                ISBN : $ISBN <br />
                                Author : $Author <br />
                                Edition : $Edition<br />
                                Language : $Language<br />
                                Category : $CategoryName<br/><br />
                           </font>
                         ";
                }
            }else{
                echo "<p>Not found.</p>"; 
            }
            break;   

            case "Producer":
            $query = "SELECT c.*, ca.CategoryName FROM CD c, Category ca WHERE c.CategoryCode = ca.CategoryCode AND c.Producer LIKE '%$search%'";
            $res = mysqli_query($mysqli, $query) or die(mysqli_error());
            $count = mysqli_num_rows($res);
            if($count > 0)
            {
               

                while($row = mysqli_fetch_array($res))
                {
                    $Title = $row['Title'];
                    $Producer = $row['Producer'];
                    $ISSN = $row['ISSN'];
                    $Language = $row['Language'];
                    $CategoryName = $row['CategoryName'];
                    

                    echo " <font color =\"white\">
                                Title : $Title <br />
                                ISSN : $ISSN <br />
                                Producer : $Producer <br />
                                Language : $Language <br />
                                Category : $CategoryName<br /><br />
                           </font>
                         ";
                }
            }else{
                 echo "<p>Not found.</p>"; 
            }
            break;   

                 
}
}

?>
</h4>
      
                 </div>  
            
         </div>               
       </div>
   </section> <!-- /intro -->