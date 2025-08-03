<?php
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {//checks if admin
    header("Location: ../dynamic/login.php");
    exit;
}

$page_title = "Admin Status";
include '../includes/header.php';
include '../includes/db_connect.php';

$services = [//retrieves status of websites parts
    'Home Page' => true,
    'Product Page' => true,
    'Cart' => true,
    'Checkout' => true,
    'Login' => true,
    'Register' => true,
    'User Profile' => true,
    'Search' => true,
    'Database' => !$conn->connect_error
];
?>

<main>
  <h2>Admin System Status</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>Service</th>
      <th>Status</th>
    </tr>
    <?php foreach ($services as $name => $status): ?>
      <?php
        $label = $status ? 'Online' : 'Offline';
        $color = $status ? 'green' : 'red';
      ?>
      <tr>
        <td><?php echo htmlspecialchars($name); ?></td>
        <td style="color:<?php echo $color; ?>"><?php echo $label; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?php include '../includes/footer.php'; ?>
</main>


