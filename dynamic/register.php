<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);//for debugging
error_reporting(E_ALL);
session_start();
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);//hashes password

    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");//check if email is used
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "An account with this email already exists.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['user_name'] = $name;
            header("Location: user_profile.php");
            exit;
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>

<?php include '../includes/header.php'; ?>
<main>
  <h2>Register</h2>
  <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
  <form method="post" action="register.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="Register">
  </form>
  <?php include '../includes/footer.php'; ?>
</main>

