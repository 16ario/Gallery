<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {
  redirect("login.php");
}
?>

<?php

$emprunt = new Emprunt();
  if (isset($_POST['create'])) {

    if($emprunt) {
        echo $emprunt->book_id = $_POST['book_id'];
        $emprunt->author = $_POST['author'];
        $emprunt->body = $_POST['body'];

        $emprunt->save();
    }

//     if ($user) { = 
//       $user->title = $_POST['title'];
//       $user->caption = $_POST['caption'];
//       $user->alternate_text = $_POST['alternate_text'];
//       $user->description = $_POST['description'];

//       $user->save();
//     }
  }



// $users = user::find_all();

?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->

  <?php include("includes/top_nav.php") ?>

  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


  <?php include("includes/side_nav.php") ?>


  <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-7">
        <h1 class="page-header">
          emprunts
          <small>Subheading</small>
        </h1>
        <form action="" method="post" enctype="multipart/form-data">

          <div class="col-md-6 col-md-offset-3">


            <div class="form-group">
            <label for="book_id">book_id</label>
              <input type="number" name="book_id" class="form-control">
            </div>
            
            <div class="form-group">
              <label for="author">author</label>
              <input type="text" name="author" class="form-control" >

            </div>
            <div class="form-group">
              <label for="body">comment</label>
              <input type="text" name="body" class="form-control" >
            </div>

            <div class="form-group">
              <input type="submit" name="create" class="btn btn-primary pull-right" >
            </div>

          </div>
        </form>

      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>