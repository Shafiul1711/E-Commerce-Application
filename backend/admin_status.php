<?php include 'includes/header.php'; ?>
<h1>System Monitoring</h1>
<ul>
  <li>Database Connection: <?php echo mysqli_connect_errno() ? '<span style="color:red;">Offline</span>' : '<span style="color:green;">Online</span>'; ?></li>
  <li>Authentication Service: <span style="color:green;">Operational</span></li>
  <li>Mail Service: <span style="color:green;">Operational</span></li>
  <li>Product Service: <span style="color:green;">Active</span></li>
  <li>User Service: <span style="color:green;">Active</span></li>
</ul>
<?php include 'includes/footer.php'; ?>