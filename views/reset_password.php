<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['email'])){
    $email = $_POST['email'];
    password_reset($email);
}
?>
<br>
<br>
<div class='container mt-5'>
<?php
    if(isset($_SESSION['key'])){?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['key'];
             session_destroy();             
    }?></div></div>
<div class='container mt-5'>
    <h4>Parolingiz yodingizdan chiqdimi?</h4>
    <p>Bizga emailingizni yuboring, biz sizga parolingizni tiklash uchun instruksya yuboramiz!</p>
    <div class='mt-5'>
        <form method ="POST" action =''>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type='submit' class='btn btn-outline-success'> Send </button> 
        </form>
    </div>
</div>






