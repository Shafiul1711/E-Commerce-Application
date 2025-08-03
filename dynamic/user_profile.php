<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../includes/db_connect.php';//connects to database

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

//fethes user details
$stmt = $conn->prepare("SELECT name, email, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<?php include '../includes/header.php'; ?>

<main>
  <h2>User Profile</h2>

  <?php if ($user): ?>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Member Since:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>

    <p><a href="update_profile.php">Update Your Profile</a></p>
    <p><a href="logout.php">Logout</a></p>

    <?php if (!empty($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
      <p><a href="../backend/admin_status.php" style="color: red; font-weight: bold;">Admin Dashboard</a></p>
    <?php endif; ?>
    
  <?php else: ?>
    <p>User not found.</p>
  <?php endif; ?>
  <?php include '../includes/footer.php'; ?>
</main>


