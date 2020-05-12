
<!-- Blog Sidebar Widgets Column -->
<body>
<html>

<div class="col-md-4">

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

            echo "some results";
           }

          }
            ?>
                <!-- Blog Search Well -->
                <div class="well">
             <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                     <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!--search form-->
                    <!-- /.input-group -->
                </div>

                 <!--Side Bar Login Form -->
           <div class="well">
             <h4>Login</h4>
                    <form action="includes/login.php" method="post">

                     <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                        </div>

                        <div class="input-group">
                          <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        
                        <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" type="submit">Submit
                               <!-- <span class="glyphicon glyphicon-search"></span>-->
                        </button>
                        </span>
                    </div>
                    </form><!--search form-->
                    <!-- /.input-group -->
                </div>





                <!-- Blog Categories Well -->
                <div class="well">
                <?php
             $query = "SELECT * FROM catogories";

             $select_catogories_sidebar = mysqli_query($connection,$query);?>
             
              <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                            <?php

                        while($row= mysqli_fetch_assoc($select_catogories_sidebar))
                         {
                           $cat_title= $row['cat_title'];

                           echo "<li><a href='#'>$cat_title</a></li>";
                             }

                           ?>
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include "widget.php";?>

            </div>

        </div>
        </body>

        </html>