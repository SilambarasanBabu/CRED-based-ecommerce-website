<?php
  include('../includes/connect.php');
  if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
// Acessing images
    $product_image1 = $_FILES['product_image1']['name'];
// Accessing temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];

//checking emty feilds in form
    if($product_title == '' or $product_description == '' or $product_keyword == '' or $product_category == '' or $product_price == '' or $product_image1 == ''){
        echo "<script>alert('Please fill all feilds')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        

        //insert query
        // $product_brand = intval($product_brand);
        $insert_products = "insert into `products` (product_title,product_description,product_keyword,category_id,product_image1,product_price,date,status) values ('$product_title','$product_description','$product_keyword','$product_category','$product_image1','$product_price',NOW(),'$product_status')";

        $result_query = mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Product has inserted')</script>";
        }
      
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" class="form-control" name="product_title" id="product_title" placeholder="enter product title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" class="form-control" name="product_description" id="product_description" placeholder="enter product description" autocomplete="off" required="required">
            </div>
            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keyword</label>
                <input type="text" class="form-control" name="product_keyword" id="product_keyword" placeholder="enter product keyword" autocomplete="off" required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" class="form-select" id="">
                    <option value="">Select a category</option>
                    <?php
                        $select_query = "select * from `categories`";
                        $result_query = mysqli_query($con,$select_query);
                        while($row = mysqli_fetch_assoc($result_query)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- image1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" class="form-control" name="product_image1" id="product_image1" required="required">
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" class="form-control" name="product_price" id="product_price" placeholder="enter product price" autocomplete="off" required="required">
            </div>
            <!-- submit btn -->
            <div class="form-outline mb-4 w-50 m-auto">
              <input type="submit" class="btn btn-dark text-light" name="insert_product" value="Insert Product">
            </div>
        </form>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>