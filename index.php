<?php
session_start();
if (empty($_SESSION['logged_in'])) {
    header('Location: alfarita_login/login.php');
    exit;
}
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/main-content.php'; ?>
<?php include 'includes/footer.php'; ?>
