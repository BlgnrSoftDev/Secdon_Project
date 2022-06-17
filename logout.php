<?php 

include "./util/header.php";
include "./util/footer.php";

if(session_destroy())
{
    header('Location: ./index.php');
}

?>