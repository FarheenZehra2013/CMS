<?php include "includes/admin_header.php"; ?>

 <div id="wrapper">

        <!-- Navigation -->
        
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">
             <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
                        <!--form-->

                        <div class="col-xs-6"><!--start div for form-->
                      
                      <?php
                      //echo "<h1>hello</h1>";
                      //print_r( var_dump($_POST));
                     // calling function after submit button post to database 
                      insert_categories();                       ?>
                        <!--continue of form 1-->   
                       <form name="temp" action="categories.php" method="post">
                        <div class="form-group">
                         <label for="cat-title">Add Category </label>
                         <input type="text" class="form-control" name="cat_title">
                         </div>
                        <div class="form-group">
                         <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div> 
                       </form>
                       <?php
                        //include update_category path using little condition
                        //update and include query
                        
                          
                        if(isset($_GET['edit'] )){

                          $cat_id = $_GET['edit'];
                          include "includes/update_categories.php";
                          }
                          


                        ?>
                      
                    </div><!--end of category form div-->
                    
                    <!-- create category table-->
                   <div class="col-xs-6">
                    <table class="table  table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Category Title</th>
                          </tr>
                      </thead>
                    <tbody>
                   
                      
                     <?php findAllCategories(); ?>
                    
                    <?php

                    //LETS MAKE QUERY FOR DELETE
                    if(isset($_GET['delete'])){

                    $cat_id = $_GET['delete'];
                    $query= "DELETE FROM catogories WHERE cat_id = $cat_id" ;
                    $delete_query= mysqli_query($connection,$query);
                    //now redirecting page to the categories page
                    header ("Location:categories.php");

                    }

                    ?>
                    </tbody>
                  </table>
                </div>
             <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>
 