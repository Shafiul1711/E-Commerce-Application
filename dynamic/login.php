<?php
session_start();
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//checks if form is submitted
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, name, password, is_admin FROM users WHERE email = ?");

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {//checks if theres an existing user
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['is_admin'] = $user['is_admin'];
    header("Location: user_profile.php");
    exit;
}
 else {
            $error = "Incorrect password.";//checks if worng password
        }
    } else {
        $error = "User not found.";
    }
}
?>

<?php include '../includes/header.php'; ?>
<main>
  <h2>Login</h2>
  <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?><!--shows errors-->
  <form method="post" action="login.php">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="Login">
  </form>
  <?php include '../includes/footer.php'; ?>

</main>
