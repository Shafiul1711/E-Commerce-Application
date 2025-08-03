<?php
session_start();
require '../includes/db_connect.php';

if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {
    header("Location: login.php");
    exit;
}

//gets existing users
$users = $conn->query("SELECT * FROM users");

//updates user logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE users SET name=?, email=?, is_admin=? WHERE id=?");
    $stmt->bind_param("ssii", $name, $email, $is_admin, $id);
    $stmt->execute();
    $updated = true;
    $users = $conn->query("SELECT * FROM users");
}

include '../includes/header.php';
?>

<main>
  <h2>Edit Users</h2>
  <?php if (!empty($updated)) echo "<p class='success'>User updated successfully.</p>"; ?>
  <table border="1" cellpadding="10">
    <tr>
      <th>Name</th><th>Email</th><th>Admin</th><th>Action</th>
    </tr>
    <?php while ($row = $users->fetch_assoc()): ?>
      <form method="post">
      <tr>
        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
        <td><input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"></td>
        <td><input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"></td>
        <td><input type="checkbox" name="is_admin" <?php if ($row['is_admin']) echo 'checked'; ?>></td>
        <td><input type="submit" value="Update"></td>
      </tr>
      </form>
    <?php endwhile; ?>
  </table>
  <?php include '../includes/footer.php'; ?>

</main>

