<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {
     redirect("login.php");
}
?>

<?php

if(empty($_GET['id'])) {

    redirect("books.php");
}

$emprunts = Emprunt::find_the_emprunts($_GET['id']);


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
            Users
            
        </h1>

        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Body</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emprunts as $emprunt) : ?>
                    
                        <tr>
                        <td><?php echo $emprunt->id; ?></td>
                            <td><?php echo $emprunt-> author;  ?>
                                <div class="action_links">
                                    <a href="delete_emprunt_book.php?id=<?php echo $emprunt->id ?>">delete</a>
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