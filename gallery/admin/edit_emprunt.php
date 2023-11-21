<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {
redirect("emprunts.php");
  } 

  $emprunt = Emprunt::find_by_id($_GET['id']);

    if (isset($_POST['update'])) {

        if($emprunt) {
            
            $emprunt->book_id = $_POST['book_id'];
            $emprunt->author = $_POST['author'];
            $emprunt->body = $_POST['body'];
            

            if(empty($_FILES['emprunt_image'])) {

                $emprunt->save();
            } else {
            
            $emprunt->set_file($_FILES['emprunt_image']);
            $emprunt->upload_book();
            $emprunt->save();

            redirect("edit_emprunt.php?id={$emprunt->id}");

          }             
        }
      }





// $emprunts = emprunt::find_all();

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
                </h1>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">




                        <div class="form-group">
                            <label for="book_id">book_id</label>
                            <input type="number" name="book_id" class="form-control" value="<?php $emprunt->book_id; ?>">

                        </div>

                        <div class="form-group">
                            <label for="author">author</label>
                            <input type="text" name="author" class="form-control"value="<?php $emprunt->author; ?>">

                        </div>
                        <div class="form-group">
                            <label for="body ">comment</label>
                            <input type="text" name="body" class="form-control" value="<?php $emprunt->body; ?>">

                        </div> 
                        <div class="form-group">

                            <a class="btn btn-danger" href = "delete_emprunt.php?id=<?php echo $emprunt->id;  ?>" >Delete</a>

                            <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">

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