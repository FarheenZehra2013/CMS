
<?php
if(isset($_POST['create_post'])){

   // echo $_POST['create_post'];
   // echo $_POST['title'];
 var_dump($_POST);
 var_dump($_FILES);
  $post_title      = $_POST['post_title'];
  $post_author     =$_POST['post_author'];
  $post_category_id =$_POST['post_category_id'];
  $post_status     =$_POST['post_status'];
  $post_image      =$_FILES['image']['name'];
  $post_image_temp =$_FILES['image']['tmp_name'];
  $posts_tag       =$_POST['posts_tag'];
  $post_content    =$_POST['post_content'];
  $post_date       =date('d-m-y');
  $post_comment_count=4;//hard code

 //$post search form  from their name/variables
 move_uploaded_file($post_image_temp,"../images/$post_image");

 //insert query
$query= "INSERT INTO posts (post_category_id, post_title, post_author,post_date,post_image,post_content ,
 posts_tag,post_comment_count,post_status)";

 $query.=" VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}',
 '{$post_content}','{$posts_tag}','{$post_comment_count}','{$post_status}')";

 echo "query is:".$query; 
 //now() is date function
 $create_post_query = mysqli_query($connection,$query);

 if(!$create_post_query){

    die("query failed".mysqli_error($connection) );
 }

}
?>
<!--lets create form-->

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
      <input type="text" class="form-control" name="post_title">
</div>  

<div class="form-group">
    <label for="title">Post Category Id</label>
      <input type="text" class="form-control" name="post_category_id">
</div>

<div class="form-group">
    <label for="title">Post Author</label>
      <input type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
    <label for="title">Post Status</label>
      <input type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
    <label for="title">Post Image</label>
      <input type="file" name="image">
</div>

<div class="form-group">
    <label for="title">Post Tags</label>
      <input type="text" class="form-control" name="posts_tag">
</div>

<div class="form-group">
    <label for="title">Post Content</label>
    <textarea class="form-control" name="post_content" id="" col="30" row="10">
   </textarea>
 </div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value= "Publish Post">
</div>

</form>









