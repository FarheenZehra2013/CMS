<table class="table table-bordered table hover">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Author</th>
                                 <th>Title</th>
                                 <th>Category</th>
                                 <th>Status</th>
                                 <th>Image</th>
                                 <th>Tags</th>
                                 <th>Comments</th>
                                 <th>Date</th>
                                 <th>Edit</th>
                                 <th>Delete</th>


                             </tr>   
                       </thead>                    
                          <tbody>

                        <?php

if(isset($_GET['delete'])){
   // echo "hello";


$the_post_id  = $_GET['delete'];

$query = "DELETE FROM posts where post_id =$the_post_id";
$delete_query = mysqli_query($connection,$query);
header("Location:pots.php");
 }
                        //find all posts query

                     $query = "SELECT * FROM posts order by post_id";
                     $select_posts = mysqli_query($connection,$query); 

                     while($row = mysqli_fetch_assoc($select_posts)){
                         $post_id = $row['post_id'];
                         $post_author = $row['post_author'];
                         $post_title = $row['post_title'];
                         $post_category_id = $row['post_category_id'];
                         $post_status = $row['post_status'];
                         $post_image = $row['post_image'];
                         $posts_tag = $row['posts_tag'];
                         $post_comment_count = $row['post_comment_count'];
                         $post_date = $row['post_date'];
                                       
                        echo    "<tr>";
                        echo    "<td>$post_id</td>";
                        echo    "<td>$post_author</td>";
                        echo    "<td>$post_title</td>";

                       //relating categories to post and displying it
                       //insert select query from catogory table
                     $query = "SELECT * FROM catogories WHERE cat_id = {$post_category_id}";
                       $select_categories_id =mysqli_query($connection,$query);


                       while($row=mysqli_fetch_assoc($select_categories_id)){
                          $cat_id=$row['cat_id'];
                          $cat_title=$row['cat_title'];                      
                        echo    "<td>{$cat_title}</td>";
                       }
                        echo    "<td>$post_status</td>";
                        echo    "<td><img width='100' src='../images/$post_image' alt='image'></td>";                       
                        echo    "<td>$posts_tag</td>";
                        echo    "<td>$post_comment_count</td>";
                        echo    "<td>$post_date</td>";
                        //add edit link: in edit link we pass two parameters
                        echo     "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                        //add delete link
                        echo     "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                        echo    "</tr>";
                     }
                     ?>
                        </tbody>
                    </table> 
                    <?php
                    //lets make query for delete button for posts.php

                    
?>