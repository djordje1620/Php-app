<?php
session_start();
global $loginObj;

$loginObj = false;

if(isset($_SESSION["user"])){
    $loginObj = $_SESSION["user"];
}
if(isset($_SESSION["admin"])){
    $loginObj = $_SESSION["admin"];
}

include("url.php");
?>

<script>
    var loginObj = <?php echo json_encode($loginObj); ?>;
</script>