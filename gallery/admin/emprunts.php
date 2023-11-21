<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {
     redirect("login.php");
}
?>

<?php

$emprunts = Emprunt::find_all();

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
            emprunts
            
        </h1>

        <a href="add_emprunt.php" class="btn btn-primary">Add emprunt</a>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>book_id</th>
                        <th>Author</th>
                        <th>comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emprunts as $emprunt) : ?>
                    
                        <tr>
                        <td><?php echo $emprunt->id; ?></td>
                        <td><?php echo $emprunt->book_id; ?></td>
                            <td><?php echo $emprunt-> author;  ?>
                                <div class="action_links">
                                    <a href="delete_emprunt.php?id=<?php echo $emprunt->id ?>">delete</a>
                                </div>
                                <div class="action_links">
                                    <a href="edit_emprunt.php?id=<?php echo $emprunt->id ?>">edit</a>
                                </div>
                        </td>
                        <td><?php echo $emprunt->body; ?></td>
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