<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 26/12/2017
 * Time: 15:08
 */
session_start();
session_destroy();
header("Location: index.php");
?>