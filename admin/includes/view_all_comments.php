<!--create form table -->
<table class="table table-bordered table hover">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Author</th>
                                 <th>Comment</th>
                                 <th>Email</th>
                                 <th>Status</th>
                                 <th>In Response to</th>
                                 <th>Date</th>
                                 <th>Approve</th>
                                 <th>Unapprove</th>
                                 <th>Delete</th>
                             </tr>   
                       </thead>                    
                          <tbody>

                        <?php

//if(isset($_GET['delete'])){
   // echo "hello";


//$the_post_id  = $_GET['delete'];

//$query = "DELETE FROM posts where post_id =$the_post_id";
//$delete_query = mysqli_query($connection,$query);
//}
                        //create query for display comments in admin part

                     $query = "SELECT * FROM  comments order by comment_id";
                     $select_comments = mysqli_query($connection,$query); 

                     while($row = mysqli_fetch_assoc($select_comments)){
                         $comment_id= $row['comment_id'];
                         $comment_post_id = $row['comment_post_id'];
                         $comment_author = $row['comment_author'];
                         $comment_content = $row['comment_content'];
                         $comment_email = $row['comment_email'];
                         $comment_status = $row['comment_status'];
                         $comment_date = $row['comment_date'];
                         
                                       
                        echo    "<tr>";
                        echo    "<td>$comment_id</td>";
                        echo    "<td>$comment_author</td>";

                       //relating categories to post and displying it
                       //insert select query from catogory table
                     /*$query = "SELECT * FROM catogories WHERE cat_id = {$post_category_id}";
                       $select_categories_id =mysqli_query($connection,$query);


                       while($row=mysqli_fetch_assoc($select_categories_id)){
                          $cat_id=$row['cat_id'];
                          $cat_title=$row['cat_title'];                      
                        echo    "<td>{$cat_title}</td>";
                       }*/
                        echo    "<td>$comment_content</td>"; 
                        echo    "<td>$comment_email</td>";
                        echo    "<td>$comment_status</td>";

                         $query= "SELECT * FROM posts WHERE post_id= $comment_post_id";
                         $select_post_id_query= mysqli_query($connection,$query);
                         while($row = mysqli_fetch_assoc($select_post_id_query)){
                         $post_id = $row['post_id'];
                         $post_title=$row['post_title'];
                         echo    "<td><a href ='../post.php?p_id=$post_id'>$post_title</a></td>";


                         }
                        
                        echo    "<td>$comment_date</td>";
                        //add edit link: in edit link we pass two parameters
                        echo     "<td><a href='comments.php?source=edit_comments&p_id='>Approve</a></td>";
                        //add delete link
                        echo     "<td><a href='comments.php?delete='>Unapprove</a></td>";
                        
                        echo     "<td><a href='comments.php?delete='>Delete</a></td>";
                        echo    "</tr>";

                     }
                     ?>
                        </tbody>
                    </table> 
                    <?php
                    //lets make query for delete button for posts.php

                    
?>