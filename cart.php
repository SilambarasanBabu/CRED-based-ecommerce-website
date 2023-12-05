<?php
  include('includes/connect.php');
  include('functions/common_function.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        overflow-x: hidden;
        background: #dee2e6 !important;
      }

      .st-title{
        background: #dee2e6 !important;
      }

      .sub-total{
        display: flex;
      }


      .st-img{
        width: 100px;
        height: 150px
      }
    </style>
</head>
<body>
    <!-- Nav bar -->
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img src="images/logo1.png" alt="logo" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item (); ?></sup></a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>


<?php 
  cart();
?>
<!-- secondary nav bar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-outo">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
  </ul>
</nav>

<!-- title-->

<div class="bg-light st-title">
  <h3 class="text-center">Book Hub</h3>
  <p class="text-center">Today a reader, tomorrow a leader.</p>
</div>

<!-- displaying cart items -->

<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
              <!-- php code for display dynamic cart details -->
              <?php
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
                        $price_table = $row_product_price['product_price'];
                        $product_title = $row_product_price['product_title'];
                        $product_image1 = $row_product_price['product_image1'];
                        $product_value = array_sum($product_price);
                        $total+=$product_value;
              ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img class="st-img" src="./images/<?php echo $product_image1 ?>" alt=""></td>
                    <td><input type="text" class="form-input w-50" name="qty"></td>

                  <!-- php code for update qty -->
                    <?php
                         $ip = getIPAddress(); 
                         if(isset($_POST['cart_update'])){
                          $quantities = $_POST['qty'];
                          $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$ip'";
                          $result_products_quantity = mysqli_query($con,$update_cart);
                          $total = $total*$quantities;
                         }
                    ?>
                    <td><?php echo $price_table ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                        <input type="submit" value="Update" class="text-light bg-dark px-2 py-2 mx-3" name="cart_update">
                        <input type="submit" value="Remove" class="text-light bg-dark px-2 py-2 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php }
                  }
                ?>
            </tbody>
        </table>

        <div class="sub-total">
            <h4 class="px-3">Subtotal:  <strong><?php echo $total ?>/-</strong></h4>
            <a href="index.php"><button class="text-light bg-dark px-2 py-2 mx-3">Continue Shopping</button></a>
            <a href=""><button class="text-light bg-primary px-2 py-2">Check Out</button></a>
        </div>
    </div>
</div>
</form>
<!-- function for removing cart items -->

<?php
  function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query = "delete from `cart_details` where product_id=$remove_id";
        $run_delete = mysqli_query($con,$delete_query);
        if($run_delete){
          echo "<script>window.open('cart.php','_self')<script/>";
        }
      }
    }
  }

  echo $remove_item = remove_cart_item();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>