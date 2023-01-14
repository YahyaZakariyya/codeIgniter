<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSSC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/79e546177a.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex flex-column vh-100">

    <!-- Header -->
    <header class="bg-info sticky-top">
        <!-- Navbar -->
        <nav class="navbar container-xl">
            <div class="nav nav-fill container-fluid">
                <!-- Navbar brand i.e. logo -->
                <a class="navbar-brand" href="http://localhost/NSSC/main/">NSSC</a>
                <!-- Search Bar and Button -->
                <div class="col-3 col-sm-4 col-md-6">
                    <form class="d-flex">
                        <input class="form-control rounded-0 border-0" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary rounded-0" type="submit">SEARCH</button>
                    </form>
                </div>
                <!-- Login & SignUp Buttons -->
                <div>
                <?php
                    if(isset($_SESSION['user_name'])){
                ?>
                    <!-- When logged in -->
                    <div class="btn-group">
                        <button type="button" class="btn clr-5 text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user_name']; ?></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" type="button" href="http://localhost/NSSC/main/profile">Profile</a></li>
                        <li><a class="dropdown-item" type="button">Settings action</a></li>
                        <li><a class="dropdown-item" type="button" href="http://localhost/NSSC/main/logout">Logout</a></li>
                        </ul>
                    </div>
                <?php
                    }else{
                ?>
                    <!-- When not logged in -->
                    <a class="btn btn-primary rounded-0 mx-1" href="http://localhost/NSSC/main/login">LOGIN</a>
                    <a class="btn btn-outline-primary rounded-0" href="http://localhost/NSSC/main/signup">SIGN UP</a>
                <?php } ?>
                </div>
            </div>
        </nav>
    </header>
    <section class="container-xl flex-grow-1">
    <!-- <div class="clr-5" style="height: 20px;"></div> -->