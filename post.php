<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
// nothing    
 
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
            <div class="col-md-8">

            <?php

    if(isset($_GET['p_id'])){
    
       $the_post_id = $_GET['p_id'];
    }?>
               
               <?php

    if(isset($_POST['create_comment'])){

     //echo $_POST['create_comment'];
       $the_post_id = $_GET['p_id'];//this is in url link right now

     $comment_author= $_POST['comment_author'];
     $comment_email=  $_POST['comment_email'];
     $comment_content=$_POST['comment_content'];
    
$query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
$query .="VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

$create_comment_query = mysqli_query($connection,$query);
if(!$create_comment_query){
   die('query failed'. myslqi_error($connection));

}

//query increasing comment count using update query
$query= "UPDATE posts SET post_comment_count = post_comment_count + 1";
$query .= "WHERE post_id = $the_post_id" ;

//lets send the query using function to send in.
$update_comment_count = mysqli_query($connection,$query);


    }
?>     
        <div class="well">



            <h4>Leave a Comment:</h4>
            <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email">
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <hr>
        <!--posted comments-->

            <?php
            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
                ?>      

                        <!-- Comment -->
                         <div class="media">
                     
                         <a class="pull-left" href="#">
                         <img class="media-object" src="http://placehold.it/64x64" alt="">
                         </a>
                        <div class="media-body">
                         <h4 class="media-heading"><?php echo $comment_author; ?>
                             <small><?php echo $comment_date; ?></small>
                         </h4>
                      <?php echo $comment_content ?>
  
                     </div>
                 </div> 
            <?php }?>
        
             
            
              </div> <!--end of col-md-8 -->  
            <!-- Blog Sidebar Widgets Column -->
            
            
            <?php include "includes/sidebar.php";?>
             

        </div>
        <!-- /.row -->

        <hr>

   

<?php include "includes/footer.php";?>
