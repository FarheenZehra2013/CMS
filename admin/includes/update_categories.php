                       <form name="temp" action="categories.php" method="post">
                        <div class="form-group">
                         <label for="cat-title">Edit Category </label>

                         <?php
                         //edit query

                         if (isset($_GET['edit'])){
                          $cat_id=$_GET['edit'];
                          //edit is the key or parameter to pass in
                          //$cat_id is the variable for get request
                         
                         $query = "SELECT * FROM catogories WHERE cat_id={$cat_id}";
                         $select_categories_id= mysqli_query($connection,$query);

                         while($row = mysqli_fetch_assoc($select_categories_id)){
                          $cat_id=$row['cat_id'];
                           $cat_title = $row['cat_title'];
                           
                           ?>
                         <!--inside html-->

                         <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                         <?php }} ?>

                         <?php
                         //update category query
                        if(isset($_GET['update_category'])){
                          
                         $the_cat_title = $_GET['update_category'];
                         $query= "UPDATE catogories SET cat_title ='{$the_cat_title}' WHERE cat_id='{$cat_id}' ";
                         $update_query= mysqli_query($connection,$query);
                         if(!$update_query){

                          die("QUERY FAILED" . mysqli_error($connection));
                         }
                        }
                        ?>

                         </div>
                         
                        <div class="form-group">
                         <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                        </div> 
                       </form>