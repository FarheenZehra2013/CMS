
<!--database connection-->

<?php include "includes/db.php";?>

<!--header file-->

<?php include "includes/header.php";?>

<!--navigation file-->

<?php include "includes/navigation.php";?>




<body>

   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php
            
              if(isset($_POST['submit'])){

              $search = $_POST['search'];

//we need to know hows database find users
//like operator is used with where clause to find specific pattern in a column.
/*where customer name like %a% find any value that have or
in any position.*/
//we user search we need to jump to the database tocompare the data

//lets make database search query using variable $search
  $query = "SELECT * FROM posts WHERE posts_tag LIKE '%$search%'";//$search is a string where text coming in
  $search_query =  mysqli_query($connection,$query);//send query to the database

// lets check if query is working or not using if statement

if(!$search_query)
{
        die("query failed". mysqli_error($connection));
          
      }
         //lets check how many results are coming
         //count function return the number of elements in an array
     $count  =  mysqli_num_rows($search_query);

     if($count==0){


      echo "<h1>no result</h1>";
     }

     else {

      //insert query to get data from database
      //$query= "SELECT * FROM posts";
      //$select_all_posts_query  = mysqli_query($connection,$query);

      //while($row= mysqli_fetch_assoc($select_all_posts_query))
      while($row= mysqli_fetch_assoc($search_query))
      {
          $post_title= $row['post_title'];
          $post_author=$row['post_author'];
          $post_date=  $row['post_date'];
          $post_image= $row['post_image'];
          $post_content=$row['post_content'];

        ?>

          <h1 class="page-header">
              Page Heading
              <small>Secondary Text</small>
          </h1>

          <!-- First Blog Post -->
          <h2>
              <a href="#"><?php echo $post_title  ?></a>
          </h2>
          <p class="lead">
              by <a href="index.php"><?php echo $post_author ?></a>
          </p>
          <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
          <hr>
          <img class="img-responsive" src="images/<?php echo $post_image;?>"
             alt="">
          <hr>
          <p>  <?php echo $post_content ?></p>
          <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

          <hr><!--html code-->

          //for images we need to provide refrence where the image is located

      <?php } 
                }


          }
      ?><!--clsoing loop-->
            
             </div>
                
           <!-- Blog Sidebar Widgets Column -->

              <?php include "includes/sidebar.php";?> 
            
        <!-- /.row -->

        <hr>

            <!--footer file-->
            
        <?php include "includes/footer.php";?>
       </body> 
       