<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()) {
     redirect("login.php");
}
?>
<?php

if(empty($_GET['id'])) {

    redirect("books.php"); 

}

$book = Book::find_by_id($_GET['id']);

if($book) {

    $book->delete_book();
    redirect("books.php");

} else {

    $redirect("books.php");

}


?>