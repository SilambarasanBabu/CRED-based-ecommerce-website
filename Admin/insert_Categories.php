<?php
  include('../includes/connect.php');
  if(isset($_POST['insert_cat'])){
    $category_title = $_POST['cat_title'];

    $select_query = "select * from `categories` where category_title = '$category_title'";
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);
    if($number > 0){
       echo "<script>alert('Categories has been already exist')</script>";
    }else{

      $insert_query = "insert into `categories` (category_title) values('$category_title')";
      $result = mysqli_query($con,$insert_query);
          if($result){
            echo "<script>alert('Categories has been inserted successfull')</script>";
            }
  } 
  }
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group mb-3">
  <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert categories" name="cat_title" aria-label="categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-3 m-auto">
  <input type="submit" class="bg-dark text-light p-2 border-0 my-2" value="Insert categories" name="insert_cat" aria-label="Username" aria-describedby="basic-addon1">
 
</div>
</form>