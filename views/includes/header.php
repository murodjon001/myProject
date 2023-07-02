<!doctype html>
<html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link href="/var/www/myProject/public/assets/js.js">
      <link rel="stylesheet" href='/var/www/myProject/public/assets/style.css'>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


      <title><?php echo $title ?? 'PHP Blog' ?></title>
      <style> #white{ color: #fff} </style>
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Blog site</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="/about">Biz haqimizda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/price">Narxlar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blog">Bloglar</a>
          </li>
        </ul>
        
        <?php
      
        if (isset($_SESSION['name'])){?>
            <h5 class='ml-3' id='white'><?php echo $_SESSION['name']; ?></h5>
            <a href='/logout'><button class="btn btn-outline-secondary " type="submit">Log out</button></a>
        <?php 
        }else{?>
          <a href='/signup'><button class="btn btn-outline-success " type="submit">Sign up</button></a>
          <a href='/login'><button class="btn btn-outline-warning" type="submit">Log in</button></a>
        <?php } ?>
        
    
      </div>
    </div>
  </nav>
</header>
