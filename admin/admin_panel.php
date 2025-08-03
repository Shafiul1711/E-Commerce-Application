<?php
session_start();
$page_title = "Admin Panel";

if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {//checks if admin
    header("Location: login.php");
    exit;
}

include '../includes/header.php';
?>

<main>
  <h2>Admin Panel</h2>
  <ul style="line-height: 2;">
    <li><a href="../admin/admin_add_product.php"> Add Product</a></li><!--admin panel options-->
    <li><a href="../admin/admin_edit_product.php"> Edit Products</a></li>
    <li><a href="../admin/admin_edit_user.php"> Edit Users</a></li>
    <li><a href="../admin/admin_theme_settings.php"> Theme Settings</a></li>
  </ul>
  <?php include '../includes/footer.php'; ?>

</main>

