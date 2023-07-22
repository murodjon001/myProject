<?php 
require '/var/www/myProject/database.php';
require'/var/www/myProject/public/mail.php';
function arrayBormi($array, $value){
    return (array_key_exists($value, $array));
}

function signup($data){
    
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

function password_reset($email){
    $validation = new Validation($email);
    $result = $validation->validate_email();
    if ($result == true){
        $url_ins = uniqid();
        send_mail($email, $url_ins);
  
    }else{
        $not_email = ['key'=>"Bunday email ma'lumotlar bazasida topilmadi!"];
        redirect('password/reset', $not_email);
    }
}

class Validation{
    private $email;
    private $pdo;
    private $password;
    private $password_new;
    public function __construct($email=null){
        global $pdo;
        $this -> pdo = $pdo;
        $this -> email = $email;
    }
   
    public function validate_email(){
        $sql = ('SELECT email from User');
        $stmt = $this -> pdo->prepare($sql);
        $stmt-> execute();
        $result = $stmt-> fetchAll();
        $result_qty = count($result);
        $fin_result =[]; 
        foreach($result as $d => $a){
            $fin_result[] =$a['email'];
        }
        $valid = in_array($this->email,$fin_result);
        if ($valid == true){
            return true;
        }else{
            return false;
        }
    }
    public function validatePassword($password, $password_new){
        $this -> password_new = $password_new;
        $this->password = $password;
        $sql = ('SELECT password FROM User');
        $stmt = $this -> pdo-> prepare($sql);
        $stmt ->execute();
        $result = $stmt -> fetchAll();
        if (isset($result)){
            foreach ($result as $result){
                $password_db = $result['password'];
                if (password_verify($this->password, $password_db)){
                    $stmt-> prepare('UPDATE User SET password = :password_new WHERE password = :password_db');
                    $stmt ->bindParam(':password_new', $this->password_new);
                    $stmt ->bindParam(':password_db', $password_db);
                    $stmt -> execute();
                    redirect('/login', $data['success']='Parolingiz muvaffaqiyatli o\'zgartirildi!');
                    die;
                }
            }echo 'password yuq';
        }
        
    }
} 

function password_reset_done($data){
    global $pdo;
    var_dump($data);
    $password = $data['password'];
    $email = $data['email'];
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = ('UPDATE User SET password = :password WHERE email = :email');
    $stmt = $pdo-> prepare($sql);
    $stmt-> bindParam(':email', $email);
    $stmt-> bindParam(':password', $hashPass);
    $stmt ->execute();
    header('Location:/password/change/done');
}
$a = new Validation();
$test = $a-> validatePassword('33333');
echo $test;