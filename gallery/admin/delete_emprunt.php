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
    redirect("emprunts.php");

} else {

    $redirect("emprunts.php");

}


?>