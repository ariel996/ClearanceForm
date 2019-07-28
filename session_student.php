<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 24/12/2017
 * Time: 17:00
 */
include 'connect.php';
session_start();

if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {?>
<script>
    window.location = 'index.php';
</script>
<?php
}

$session_id = $_SESSION['id'];
?>