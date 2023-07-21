<div class='container mt-5'><br><br>
<?php
if (isset($_POST['email']) and isset($_POST['password_confirm']) and isset($_POST['password'])){
    if ($_POST['password'] == $_POST['password_confirm']){
        password_reset_done($_POST);
    }else{?>
        <div class="alert alert-danger" role="alert">
            <?php echo 'Iltimos password va password confirm maydonlarini bir xil qiymatda to\'ldiring!';?>
        </div>
        <?php
    }
}
?>
<br>
    <h4>Yangi parilingizni kiriting</h4>
    <form method='POST' action=''>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type='email' name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type='password' name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password confirm</label>
            <input type='password' name="password_confirm" class="form-control" id="exampleInputPassword1">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  
</div>
