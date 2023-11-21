<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {
     redirect("login.php");
}
?>

<?php

$books = Book::find_all();

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
    <div class="col-lg-12">
        <h1 class="page-header">
            books
            <small>Subheading</small>
        </h1>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>book</th>
                        <th>Id</th>
                        <th>Filename</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Total Quantity</th>
                        <th>size</th>
                        <th>emprunts</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                    
                        <tr>
                        <td >
                            <img class="admin-photo-thumbnail" src="<?php echo $book->picture_path(); ?>" alt="";>
                                <div class="action_links">
                                    <a href="delete_book.php?id=<?php echo $book->id; ?>">delete</a>
                                    <a href="edit_book.php?id=<?php echo $book->id; ?>">Edit</a>
                                    <a href="../book.php?id=<?php echo $book->id; ?>">View</a>

                                </div>
                        </td>
                        <td><?php echo $book->id; ?></td>
                        <td><?php echo $book->filename; ?></td>
                        <td><?php echo $book->title; ?></td>
                        <td><?php echo $book->number_available; ?></td>
                        <td><?php echo $book->total_quantity; ?></td>
                         <td><?php echo $book->size; ?></td>
                         <td>
                            
                        <a href="add_emprunt.php?id=<?php echo $book->id; ?>">
                        <?php
                         
                        $emprunts = Emprunt::find_the_emprunts($book->id);

                         echo count($emprunts);
                         
                         ?>
                            </a>
                         </td>
                    </tr>
                    <?php
                        endforeach; ?>
                </tbody>
            </table>   <!--end of table-->
        </div>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>