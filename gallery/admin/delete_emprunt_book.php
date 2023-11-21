<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()) {
     redirect("login.php");
}
?>
<?php

if(empty($_GET['id'])) {

    redirect("emprunts.php"); 

}

$emprunt = Emprunt::find_by_id($_GET['id']);

if($emprunt) {

    $emprunt->delete();
    $session->message("The emprunt {$emprunt->id} has been deleted");
    redirect("emprunt_book.php?id={$emprunt->book_id}");

} else {

    redirect("emprunt_book.php?id={$emprunt->book_id}");

}


?>