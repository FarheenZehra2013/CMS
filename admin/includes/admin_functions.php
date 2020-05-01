<?php

function insert_categories(){   
    global $connection;
    

//echo "<h1>hello</h1>";
//print_r( var_dump($_POST));


if(isset($_POST['submit'])){
  // echo "<h1>accessed inside issetpost</h1>";

   $cat_title=$_POST['cat_title'];//variable holding super global key

  //form validation to check for users

  if ($cat_title == ""|| empty($cat_title)){
      echo "this field should not be empty";

  }
  else{
      //database query
      $query= "INSERT INTO catogories (`cat_id`, `cat_title`) ";
      $query.=" VALUES (NULL,'{$cat_title}') ";
        //print_r (var_dump($query));
      $create_category_query = mysqli_query($connection,$query);

              if(!$create_category_query){

                  die("query failed". mysqli_error($connection));
              }

      }//end of else
} // end of isset post


}//end of function insert category


?>







?>