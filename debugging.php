<?php
    function console_log($dado) {
        echo '<script>';
        echo 'console.log('. json_encode( $dado ) .')';
        echo '</script>';
    }
?>