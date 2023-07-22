<div class='container mt-5'>
<br>
<?php
    if(isset($_SESSION['alert1']) == 'Iltimos email va parolingizni tekshirib qaytadan kiriting!'){?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['alert1'];
                          
    }?>
        </div>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    login($_POST);
}
?>
<div class='container mt-5'>
<br><?php var_dump($_SESSION) //parolni o'zgartirish uchun forma yasash kerak?> 
<h2>Log In </h2>
<div class='mt-5'>
   <form action='/login' method='POST'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name='password' class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <h6><a href='/password/reset'>forgot password</a></h6>
</div>

