<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }

        .profile{
            width: 100px;
            object-fit: contain;
            border-radius: 50%;
            margin-left: 15px;
            margin-top: 5px;
        }

        .footer{
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .button{
            margin-left: 26%;
        }

        

    </style>
</head>
<body>

<div class="container-fluid p-0">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <img src="../images/logo1.png" alt="logo" class="logo">
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Welome Silambarasan</a>
                </li>
            </ul>
        </nav>
        </div>
     </nav>
<!-- part 2 -->
     <div class="bg-light">
        <h3 class="text-center p-3">Manage Details</h3>
     </div>
<!-- part 3 -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-5">
                <a href="#"><img class="profile" src="../images/profile.jpg" alt="profile"></a>
                <p class="text-light text-center">Silambarasan</p>
            </div>
            <div class="button text-center">
                <button><a href="insert_products.php" class="nav-link text-light bg-dark p-2">Insert Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-dark p-2">Insert Categories</a></button>
                <!-- <button><a href="index.php" class="nav-link text-light bg-dark p-2">Logout</a></button> -->
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
<?php 
        if(isset($_GET['insert_category'])){
            include('insert_Categories.php');
        }
    ?>
</div>

<div class="bg-dark p-3 text-light text-center footer">
  <p>All rights reserved @- Designed by Silambarasan-2023</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>