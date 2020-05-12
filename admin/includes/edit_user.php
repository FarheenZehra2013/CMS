<?php

if(isset($_GET['edit_user'])){

  
  $the_user_id= $_GET['edit_uer'];



//select query to display edit data in post edit page

$query = "SELECT * FROM users where user_id = {$the_user_id}";
$select_users_query = mysqli_query($connection,$query); 

while($row = mysqli_fetch_assoc($select_users_query))


$user_id        = $row['user_id'];
$username       = $row['username'];
$user_password  = $row['user_password'];
$user_firstname = $row['user_firstname'];
$user_lastname  = $row['user_lastname'];
$user_email     = $row['user_email'];
$user_image     = $row['user_image'];
$user_role      = $row['user_role'];



}

?>

<?php
if(isset($_POST['edit_user'])){

  // echo $_POST['create_post'];

 $user_firstname  = $_POST['user_firstname'];
 $user_lastname= $_POST['user_lastname'];
 $user_role     = $_POST['user_role'];
 $username  = $_POST['username'];
 //$userimage  = $_POST['user_image'];
 $user_email    = $_POST['user_email'];
 $user_password   = $_POST['user_password'];
 

//insert query
$query= "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password)";

$query.= "VALUES ('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}',
'{$user_email}','{$user_password}')";


$create_user_query = mysqli_query($connection,$query);

if(!$create_user_query){

   die("query failed". mysqli_error($connection));
}

 }
?>


<?php


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


?>

<!--lets create form-->

<form action="" method="post" enctype="multipart/form-data">    
     
     
     
      <div class="form-group">
         <label for="title">Firstname</label>
          <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
      </div>
      
      
      

       <div class="form-group">
         <label for="post_status">Lastname</label>
          <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
      </div>
     
     
         <div class="form-group">
       
       <select name="user_role" id="">
       
    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
       <?php 

          if($user_role == 'admin') {
          
             echo "<option value='subscriber'>subscriber</option>";
          
          } else {
          
            echo "<option value='admin'>admin</option>";
          
          }
    
      ?>
        
       </select>
       
       
       
       
      </div>
      
<!--
      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>
-->

      <div class="form-group">
         <label for="post_tags">Username</label>
          <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
      </div>
      
      <div class="form-group">
         <label for="post_content">Email</label>
          <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
      </div>
      
      <div class="form-group">
         <label for="post_content">Password</label>
          <input type="password" value="<?php //echo $user_password; ?>" class="form-control" name="user_password">
      </div>
      
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
      </div>


</form>
