<?php

session_start();
if(isset($_SESSION)){
    session_destroy();
    echo '<script>location.href = "index.php";</script>';
}

?>