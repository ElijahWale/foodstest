<?php

function sanitize($data) {
    $text = trim($data);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);

    return $text;
}

 // display error message
 function print_error(){
        
    if(isset($_SESSION['error']) &&  !empty($_SESSION['error'])){
        echo "<p class='error'>" . $_SESSION["error"] . "</p>";
        unset($_SESSION["error"]);
    }
}

//display success message
function print_success(){

    if(isset($_SESSION['success']) &&  !empty($_SESSION['success'])){
        echo "<p class='error'>" . $_SESSION["success"] . "</p>";
        unset($_SESSION["success"]);
    }
}



?>