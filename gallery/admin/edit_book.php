<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {
  redirect("login.php");
}
?>

<?php
if (empty($_GET['id'])) {
  redirect("books.php");
} else {
  $book = Book::find_by_id($_GET['id']);
  if (isset($_POST['update'])) {
    if ($book) {
      $book->title = $_POST['title'];
      $book->number_available = $_POST['number_available'];
      $book->alternate_text = $_POST['alternate_text'];
      $book->description = $_POST['description'];

      $book->save();
    }
  }
}


// $books = book::find_all();

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
          books
          <small>Subheading</small>
        </h1>
        <form action="" method="post">

          <div class="col-md-12">

            <div class="form-group">

              <input type="text" name="title" class="form-control" value="<?php echo $book->title; ?>">

            </div>
            <div class="form-group">
              <a class="thumbnail" href="#"><img src="<?php echo $book->picture_path(); ?>" alt=""></a>
            </div>
            <div class="form-group">
              <label for="number_available">Quantity (between 1 and 50):</label>
              <input 
              type="number" 
              id="number_available" 
              name="number_available" 
              min="1" 
              max="50"
               value="<?php echo $book->number_available; ?>">

            </div>
            <div class="form-group">
              <label for="total_quantity">Total Quantity (between 1 and 50):</label>
              <input 
              type="number" 
              id="total_quantity" 
              name="total_quantity" 
              min="1" 
              max="50"
               value="<?php echo $book->total_quantity; ?>">

            </div>

            <div class="form-group">
              <label for="">Alternate text</label>
              <input type="text" name="alternate_text" class="form-control" value="<?php echo $book->alternate_text; ?>">

            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $book->description; ?></textarea>

            </div>

          </div>

          <div class="col-md-4">
            <div class="photo-info-box">
              <div class="info-box-header">
                <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
              </div>
              <div class="inside">
                <div class="box-inner">
                  <p class="text">
                    <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                  </p>
                  <p class="text ">
                    book Id: <span class="data photo_id_box">34</span>
                  </p>
                  <p class="text">
                    Filename: <span class="data">image.jpg</span>
                  </p>
                  <p class="text">
                    File Type: <span class="data">JPG</span>
                  </p>
                  <p class="text">
                    File Size: <span class="data">3245345</span>
                  </p>
                </div>
                <div class="info-box-footer clearfix">
                  <div class="info-box-delete pull-left">
                    <a href="delete_book.php?id=<?php echo $book->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                  </div>
                  <div class="info-box-update pull-right ">
                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                  </div>
                </div>
              </div>
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