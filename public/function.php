<?php 
require '/var/www/myProject/database.php';
function prettyDump($var){
    echo '<pre>';
    print_r($var);
    echo '<pre>';
}

function arrayBormi($array, $value){
    return (array_key_exists($value, $array));
}

function signup($data){
    var_dump($data);
        $password = $data['password'];
        $hashPass = password_hash($password, PASSWORD_DEFAULT);  
    /* password_hash funksyasining $options = $cost =12 parametridan foydalanish xavfsizlikni 
    kuchaytiradi lekin serveri ishlashida bosimni kuchaytiradi va ortiqcha vaqt oladi  
    Agar server kuchli bo'lsa bu parametrlardan foydalanish maslahat beriladi
    */       
    global $pdo;
    $lastName = $data['lastName'];
    $firstName = $data['firstName'];
    $adress = $data['adress'];
    $phone = $data['phone'];
    $email = $data['email'];
    $password = $hashPass;
    $sql = ('INSERT INTO User(lastName, firstName, adress, phone, email, password)
            VALUES(:lastName, :firstName, :adress, :phone, :email, :password)');
    $stmt = $pdo ->prepare($sql); 
    $stmt ->bindParam(':lastName', $lastName);
    $stmt ->bindParam(':firstName', $firstName);
    $stmt ->bindParam(':adress', $adress);
    $stmt ->bindParam(':phone', $phone);
    $stmt ->bindParam(':email', $email);    
    $stmt ->bindParam(':password', $password);
    try {
        $stmt->execute(); 
        echo 'ishladi';
        header("Location:/login"); 
        session_destroy();

    } catch (PDOException $e) {
        echo $e;
        header('Location:/signup');
        $_SESSION['alert'] = 'Iltimos email va parolingizni tekshirib boshqa email, parol kiriting!';        
    }
}

  
function login($data){
    global $pdo;
    $sql = ('SELECT * FROM User');
    $stmt = $pdo-> prepare($sql);
    $stmt -> execute();
    $result = $stmt->fetchAll();
    $email = $data['email'];
    $password = $data['password'];
    foreach($result as $result){
         $db_email = $result['email'];
         $db_password = $result['password'];
         if ($email == $db_email and password_verify($password, $db_password)){
            $_SESSION['name'] = $result['lastName'] ;
            header('Location:/home');
         }
    }


}