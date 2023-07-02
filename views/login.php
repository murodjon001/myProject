<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['authentificated'] = 'progress';
    login($_POST);
    // header('Location:function.php');
}
?>
<div class='container mt-5'>
<br>
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
</div>
<?php
 


// if (isset($_SERVER['REQUEST_METHOD']) == 'POST' and isset($_SESSION['name']) == null){

//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $statement = $pdo ->prepare('SELECT * FROM User WHERE email = :email AND password = :password');
   
//     $statement ->bindParam(':email', $email);
//     $statement -> bindParam(':password', $password);
    
//     $statement-> execute();
//     $result = $statement->fetch();
    
//     if ($result['email'] == $email and $result['password'] == $password){
        
       
//         $statement = $pdo->prepare('SELECT name from User WHERE password = :password');
//         try{
//             $statement-> execute([
//                 'password' => $password
//             ]);  
//             $name1 = $statement->fetch();
//             $_SESSION['name'] = $name1['name'];

            
//                 header('Location:/');
            
            
//         }catch (PDOException $e) {
//             echo 'Ishlmadi'. $e;
//         }
       
      
//     }else{  
//         echo 'ishlamadi';
//     }
// }
?>



