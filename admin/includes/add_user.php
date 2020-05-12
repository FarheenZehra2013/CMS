
<?php

if(isset($_GET['edit_user'])){//receive a get request from url
 echo   $the_user_id = $_GET['edit_user'];

}






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
<!--lets create form-->

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="firstname">Firstname</label>
      <input type="text" class="form-control" name="user_firstname">
</div>  

<div class="form-group">
    <label for="lastname">Lastname</label>
      <input type="text" class="form-control" name="user_lastname">
</div>

<div class="form-group">
   <select name="user_role" id="">
   <option value="subscriber">Select Options</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>

</select>
</div>

<div class="form-group">
    <label for="username">Username</label>
      <input type="text" class="form-control" name="username">
</div>

<div class="form-group">
    <label for="email">Email</label>
      <input type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
    <label for="password">Password</label>
      <input type="password" class="form-control"  name="user_password">
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value= "Add User">
</div>

</form>









