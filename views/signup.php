
<?php 
// if($_SERVER['REQUEST_METHOD']== 'POST'){
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//  var_dump($_POST);
//     $sql = "INSERT INTO User (name, email, password)
//             VALUES(:name, :email,
// $stmt = $pdo->prepare($sql);
// $stmt -> bindParam(':name', $name);
// $stmt -> bindParam(':email', $email);
// $stmt -> bindParam(':password', $password);
    

//     try {
//         $stmt->execute(); 
//         echo 'ishladi';
//         header("Location:/login");
        

//     } catch (PDOException $e) {
//         echo $e;
        
//         $_SESSION['alert'] = 'Iltimos email va parolingizni tekshirib boshqa email, parol kiriting!';
             
//   }

// }   
?>
<div class='container mt-5'>
<br>
<?php
    if(isset($_SESSION['alert']) == 'Iltimos email va parolingizni tekshirib boshqa email, parol kiriting!'){?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['alert'];   
                session_destroy();
                ?>
        </div>
<?php
}else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    signup($_POST);
    }
}?>
    <br>
    <h3> Ro'yxatdan o'tish</h3>
    <div class='mt-5' >
    <form action='/signup' method='POST'>
        <div class="mb-3">        
            <label for="validationCustom02" class="form-label"> Last Name</label>
            <input name='lastName' class="form-control" placeholder='John'  required>
            <label for="validationCustom02" class="form-label">First Name</label>
            <input name='firstName' class="form-control" placeholder='Doe' required>
            <label for="validationCustom02" class="form-label"> Adress</label>
            <input name='adress' class="form-control" placeholder='Samarkand'  required>
            <label for="validationCustom02" class="form-label"> Phone</label>
            <input name='phone' class="form-control" placeholder='+998 90 123 45 67'  required>
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name='email' class="form-control" placeholder='JohnDoe@gmail.com' aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Email-pochtangizni hech kim bilan baham ko'rmaymiz.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name='password' class="form-control" id="exampleInputPassword1">
        </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>



