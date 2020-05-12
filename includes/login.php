<!-- Login Form -->
<?php include "db.php"; ?>


<?php
var_dump ($_POST);
var_dump($_SESSION);

if(isset($_POST['login'])){
    var_dump ($_POST);
    var_dump($_SESSION);
  $username    = $_POST['username'];
  $password    = $_POST['password'];

  $username = mysqli_real_escape_string($connection,$username);//sql injection to clean our info.
  $password = mysqli_real_escape_string($connection,$password);

$query = "SELECT * from users WHERE username = '{$username}'" ;
$select_user_query = mysqli_query($connection,$query);

if(!$select_user_query){
    die("query failed" . mysqli_error($connection));
}
while($row = mysqli_fetch_array($select_user_query)){

     $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];
}

//password validation
session_start();
if($username !== $db_username && $password !== $db_user_password){

header("Location: ../index.php");

} else if($username == $db_username && $password == $db_user_password && $db_user_role=="admin"){

    $_SESSION['username'] = $db_username;
$_SESSION['firstname']=   $db_user_firstname ;
$_SESSION['lastname'] = $db_user_lastname;
$_SESSION['user_role'] = $db_user_role;
    header("Location: ../admin");


} else {

    header("Location: ../index.php");

}

}

?>







