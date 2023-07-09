<?php 
require '/var/www/myProject/database.php';

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
    $stmt -> execute(); var_dump($data);
    $result = $stmt->fetchAll();
    $email = $data['email'];
    $password = $data['password'];
    foreach($result as $result){
         $db_email = $result['email'];
         $db_password = $result['password'];
         if ($email == $db_email and password_verify($password, $db_password)){           
            $_SESSION['name'] = $result['lastName'] ;
            header('Location:/home');
         }else{
            $_SESSION['alert1'] = 'Iltimos email va parolingizni tekshirib qaytadan kiriting!';
         }
    }
}

function post_edit($data){
    global $pdo;
    $post_id = $data;
    $post_ctg = 1;
    $stmt = $pdo-> prepare('SELECT * FROM Post where id = :id');
    $stmt-> bindParam(':id', $post_id);
    
    try{
        $stmt -> execute();
        $result = $stmt-> fetchAll();
        redirect('/post/edit', $result);
    }catch (PDOException $e) {
        echo $e;
    }
}

function redirect($path_to_file, $data){
    define('BASE_DIR', __DIR__. '/../views');
    $php = '.php';
    if (isset($data)){
        foreach($data as $key => $values){
            $_SESSION["$key"] = $values;
        }
        $file = BASE_DIR . $path_to_file . $php;
        if(file_exists($file)){
            header('Location:' . $file);
            $array = $_SESSION;
            return $array; 
        }else{
            echo '';
        }
    }
}

function post_save($data){
    global $pdo;
    $id = $data['id'];
    $title = $data['title'];
    $body = $data['body'];
    $category_id = '1';

    $sql = ("UPDATE Post 
             SET id = :id, category_id = :category_id, title = :title, body = :body
             WHERE id = :id");
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindParam(':id', $id);
    $stmt -> bindParam(':category_id', $category_id);
    $stmt -> bindParam(':title', $title);
    $stmt -> bindParam(':body', $body);
    try{
        $stmt-> execute();
    } catch (PDOException $e){
        echo "xatolik $e";
    }
    define('BASE_DIR', __DIR__. '/../views');

    header("Location:"."/post/$id");
}

function echo_id(){
    global $pdo;
    $stmt = $pdo->prepare('SELECT id FROM Post');
    $stmt -> execute();
    $data = $stmt ->fetchAll();
    $result = [];
    foreach($data as $d){
        $result[] = $d['id'];     
}
    return($result);
}



// Xulas $d bu  array. Arrayning id sini olasanda yangi arrayning id kalitiga qiymat qi