<?php
if(!isset($_SESSION['user_name']))
{
    header('Location: '.base_url('admin/'));    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSSC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/79e546177a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <div class="d-flex flex-column vh-100">
    <header class="bg-info sticky-top">
        <!-- Navbar -->
        <nav class="navbar navbar-expand">
            <div class="container-xxl">
                <!-- Brand Logo -->
                <a class="navbar-brand" href="http://localhost/NSSC/index.php/admin">ADMIN NSSC</a>
                <!-- Nav Links -->
                <div class="">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/'); ?>">USERS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('admin/view_notes'); ?>">NOTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('admin/view_courses'); ?>">COURSES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('admin/view_queries'); ?>">QUERIES</a>
                        </li>
                    </ul>
                </div>
                <!-- Logout Button -->
                <a class="btn btn-dark" href="<?php echo base_url('admin/logout'); ?>">LOGOUT</a>
            </div>
        </nav>
        <div class="bg-dark" style="height: 20px;"></div>
    </header>
    <main class="container-xl flex-grow-1">