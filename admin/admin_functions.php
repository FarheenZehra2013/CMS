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

function findAllCategories(){

    global $connection;

 
    $query= "SELECT * FROM catogories order by cat_id";
    $select_categories= mysqli_query($connection,$query);

     //add while loop to make repeat                
     while($row = mysqli_fetch_assoc($select_categories)){
     $cat_id=$row['cat_id'];//cat_id is the key inside database   
     $cat_title=$row['cat_title'];//cat_title is the key inside database
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";

     //lets make delete column in order to delete row with respect to id
     //we have to pass the link of the page wth the key value
     //here key is 'delete' associate array
     echo "<td><a href ='categories.php?delete={$cat_id}'>Delete</a></td>";
     echo "<td><a href ='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
     }

}







