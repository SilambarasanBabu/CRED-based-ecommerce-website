<?php
 include('includes/connect.php');
 //getting products
 function getproducts (){
    global $con;

    //checking condition isset or not
    if(!isset($_GET['category'])){
    $select_query = "select * from `products`";
    $result_query = mysqli_query($con,$select_query);
    //$row =  mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      //$product_keyword = $row['product_word'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id= $row['category_id'];

      echo "<div class='col-md-3 mb-4'>
            <div class='card st-card'>
              <div class='cbooks'>
                  <img src='./Admin/product_images/$product_image1' class='card-img-top cimg' alt='$product_title'>
            </div>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price: $product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart</a>
        </div>
      </div>
  </div>";
    }
}
 }

    
 //getting uniqe catedories
 function get_unique_categories (){
  global $con;

  if(isset($_GET['category'])){
    $category_id = $_GET['category'];
  $select_query = "select * from `products` where category_id = $category_id";
  $result_query = mysqli_query($con,$select_query);
  $num_of_rows = mysqli_num_rows($result_query);
  if($num_of_rows == 0){
    echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
  }
  //$row =  mysqli_fetch_assoc($result_query);
  //echo $row['product_title'];
  while($row = mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    //$product_keyword = $row['product_word'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id= $row['category_id'];

    echo "<div class='col-md-3 mb-4'>
          <div class='card st-card'>
            <div class='cbooks'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top cimg' alt='$product_title'>
          </div>
          <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart</a>
      </div>
    </div>
</div>";
  }
}
}


 function getcategories (){
    global $con;
    $select_categories = "select * from Categories";
    $result_categories = mysqli_query($con,$select_categories);

    while($row_data = mysqli_fetch_assoc($result_categories)){
     $categories_title = $row_data['category_title'];
     $categories_id = $row_data['category_id'];
     echo "  <li class='nav-item ms-10'>
               <a href='index.php?category=$categories_id #cat' class='nav-link text-light'>$categories_title</a>
             </li>";
    }
 }

//  getting search products 
function getsearch(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_data_value = $_GET['search_data'];
  $search_query = "select * from `products` where product_keyword like '%$search_data_value%'";
  $result_query = mysqli_query($con,$search_query);
  $num_of_rows = mysqli_num_rows($result_query);
  if($num_of_rows == 0){
    echo "<h2 class='text-center text-danger'>Oops search result is not found</h2>";
  }
  while($row = mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    //$product_keyword = $row['product_word'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id= $row['category_id'];

    echo "<div class='col-md-3 mb-4'>
          <div class='card st-card'>
            <div class='cbooks'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top cimg' alt='$product_title'>
          </div>
          <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart</a>
      </div>
    </div>
</div>";
  }
}
}

//getting ip address
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//function for add to cart
function cart (){
  if(isset($_GET['add_to_cart'])){
    global $con;

    $ip = getIPAddress(); 
    $get_product_id=$_GET['add_to_cart'];
    $select_query = "select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows > 0){
      echo "<script>alert('This product is already present inside the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }else{
      $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$ip',0)";
      $result_query = mysqli_query($con,$insert_query);
      echo "<script>alert('item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

//function for number of items in cart
function cart_item (){
  if(isset($_GET['add_to_cart'])){
    global $con;

    $ip = getIPAddress(); 
    $select_query = "select * from `cart_details` where ip_address='$ip'";
    $result_query = mysqli_query($con,$select_query);
    $num_of_items = mysqli_num_rows($result_query);
    }else{
      global $con;
      $ip = getIPAddress(); 
      $select_query = "select * from `cart_details` where ip_address='$ip'";
      $result_query = mysqli_query($con,$select_query);
      $num_of_items = mysqli_num_rows($result_query);
    }
    echo $num_of_items;
  }

  //Total price function

  function total_price(){
    global $con;
    $ip = getIPAddress(); 
    $total = 0;
    $cart_query = "select * from `cart_details` where ip_address='$ip'";
    $result_query = mysqli_query($con,$cart_query);
    while($row = mysqli_fetch_array($result_query)){
      $product_id = $row['product_id'];
      $select_products = "select * from `products` where product_id = '$product_id'";
      $result_products = mysqli_query($con,$select_products);
      while($row_product_price = mysqli_fetch_array($result_products)){
          $product_price = array($row_product_price['product_price']);
          $product_value = array_sum($product_price);
          $total+=$product_value;
      }
    }
    echo $total;
  }

?>