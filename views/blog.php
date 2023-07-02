<?php 

$title = 'Blog';


$statement = $pdo->prepare('SELECT * FROM Post;');

$statement->execute();

$posts = $statement->fetchAll();
$var = 0;
// if(isset($_SERVER))
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DELETE'])){
    $post_id = $_POST['post_id'];
    $statement = $pdo-> prepare('DELETE FROM Post WHERE id = ?' );
    $statement-> execute([$post_id]);
    header("Location:blog.php");
    exit;
}


?>

<main>

  <section class="py-5 text-center container">
   
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <?php if(isset($_SESSION['name']) <> null){?>
          <a href="post_create.php" class="btn btn-primary my-2">Post yaratish</a>
          <?php } ?>
        </p>
      </div>
    </div>
  </section>
    <?php foreach($posts as $p):
       $var++; ?>
<?php endforeach ?>
  <div class="album py-5 bg-light">
    <div class="container">
    <h4>Umumiy postlar soni <?= $var ?></h4>
      
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php foreach($posts as $post):
      $var++;
        ?>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text"><h5><a href='post.php?id=<?php echo $post['id'] ?>'><?php echo $post['title'] ?></a></h5></p>
              <div class="d-flex justify-content-between align-items-center">
                <?php if (isset($_SESSION['name']) <> null){ ?>
                <div class="btn-group">
                  <form method="POST" action='' onsubmit="return confirm('Rostan ham o\'chirmoqchimisiz?')">
                    <input name="DELETE" type="hidden">
                    <input type='hidden' name='post_id' value="<?= $post['id'] ?>" >

                    <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                  </form>
                  <form method="POST" action='post_edit.php' onsubmit="return confirm('Rostan ham o\'zgartirmoqchimisiz?')">
                    <input name="POST_EDIT" type="hidden">
                    <input type='hidden' name='post_id' value="<?= $post['id'] ?>" >
                    
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Edit</button>
                    
                  </form>
                  
                </div>
                <small class="text-muted">9 mins</small>
                <?php }?>
              </div>
             
            </div>
            
          </div>
         
        </div>
        
        <?php endforeach ?>
      </div>

    </div>
  </div>




