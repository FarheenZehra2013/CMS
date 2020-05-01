<?php

if(isset($_GET['p_id'])){

  //echo $_GET['p_id'];
  //echo "hello ";
  //var_dump($_GET);
  $pid= $_GET['p_id'];
}


//select query to display edit data in post edit page

$query = "SELECT * FROM posts where post_id= {$pid}";
$select_posts_by_id = mysqli_query($connection,$query); 

while($row = mysqli_fetch_assoc($select_posts_by_id)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    //echo $post_image;
    $posts_content = $row['post_content'];
    $posts_tag = $row['posts_tag'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
}

?>
<?php
if(isset($_POST['update_post'])){

  //echo "hi update button called";

  //lets grab all form 'name' value and assign a variable to them
var_dump($_POST);
var_dump($_FILES);
  $post_title      =$_POST['title'];
  $post_author     =$_POST['post_author'];
  $post_category_id =$_POST['post_category_id'];
  $post_status     =$_POST['post_status'];
  $post_image      =$_FILES['image']['name'];
  $post_image_temp =$_FILES['image']['tmp_name'];
  $posts_tag       =$_POST['posts_tag'];
  $post_content    =$_POST['post_content'];
  $post_date       =date('d-m-y');

  move_uploaded_file($post_image_temp,"../images/$post_image");
  //before update lets make sure your iamge value is not empty 

  if(empty($post_image)){

    $query = "SELECT * FROM posts WHERE post_id=$pid ";
    $select_image=mysqli_query($connection,$query); 

    while($row =mysqli_fetch_array($select_image)){
      $post_image = $row['post_image'];
    }
  }



  //update query
  //we use catination to divide our query otherwise its a long long string

  $query ="UPDATE posts SET ";
  $query .="post_title ='{$post_title}',"; //where post_title is the column name in db and $post_title is the field in form 
  $query .="post_author ='{$post_author}', ";//space after comma,
  $query .="post_category_id ='{$post_category_id}', ";
  $query .="post_status = '{$post_status}', "; 
  $query .="post_date =now(), ";
  $query .="post_image ='{$post_image}', ";//no coma
  $query .="posts_tag ='{$posts_tag}', ";
  $query .="post_content ='{$post_content}' ";
  $query .="WHERE post_id ={$pid}" ;
 var_dump ($query);
  $update_post=mysqli_query($connection,$query);
  if(!$update_post){
    die("query failed". mysqli_error($connection));
  }

}

?>
<!--lets create form-->

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
      <input value="<?php echo $post_title;?>" type="text" class="form-control" name="title">
</div>  

<!--lets make select option for dynamic category edit-->

<div class="form-group">
<select name="post_category" id="category_name_id">
<?php

    //dynamic category edit
    $query="SELECT * FROM catogories";
    $select_categories=mysqli_query($connection,$query);

    if(!$select_categories){

      die("query failed".mysqli_error($connection));
    }

    //add while loop to make repeat                
    while($row = mysqli_fetch_assoc($select_categories)){
      $cat_id=$row['cat_id'];//cat_id is the key inside database   
      $cat_title=$row['cat_title'];//cat_title is the key inside database
      if($cat_id == $post_category_id) {

      
       echo "<option selected value='{$cat_id}'>{$cat_title}</option>";


        } else {

          echo "<option value='{$cat_id}'>{$cat_title}</option>";


        }
      
      

    }
?>
</select>


    <label for="title">Post Category Id</label>
      <input value="<?php echo $post_category_id;?>" type="text" class="form-control" name="post_category_id">
</div>

<div class="form-group">
    <label for="title">Post Author</label>
      <input value="<?php echo $post_author;?>" type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
    <label for="title">Post Status</label>
      <input value="<?php echo $post_status;?>" type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
    <img width ="100" src="../images/<?php echo $post_image;?>" alt ="image">
    <input  type="file" name="image">
  </div>  
       
</div>

<div class="form-group">
    <label for="title">Post Tags</label>
      <input value="<?php echo $posts_tag;?>"type="text" class="form-control" name="posts_tag">
</div>

<div class="form-group">
    <label for="title">Post Content</label>
    <textarea class="form-control" name="post_content" id="" col="30" row="10">
    <?php echo $posts_content;?>
   </textarea>
 </div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value= "Update Post">
</div>

</form>