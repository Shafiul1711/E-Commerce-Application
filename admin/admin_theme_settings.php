<?php
session_start();
require '../includes/db_connect.php';

if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {
    header("Location: login.php");
    exit;
}

include '../includes/header.php';

//updates the themes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])) {
    $selected_theme = $_POST['theme'];
    $_SESSION['theme'] = $selected_theme;
    echo "<p class='success'>Theme changed to: $selected_theme</p>";
}

//retrieves available themes
$themes_dir = '../assets/css/';
$theme_files = array_filter(scandir($themes_dir), function($file) {
    return strpos($file, 'theme_') === 0 && strpos($file, '.css') !== false;
});
?>

<main>
  <h2>Admin Theme Settings</h2>
  <form method="post">
    <label for="theme">Choose a Theme:</label>
    <select name="theme" id="theme">
      <?php foreach ($theme_files as $file): ?>
        <option value="<?php echo $file; ?>" <?php if (isset($_SESSION['theme']) && $_SESSION['theme'] === $file) echo 'selected'; ?>><!--shows theme options in drop down menu-->
          <?php echo htmlspecialchars($file); ?>
        </option>
      <?php endforeach; ?>
    </select>
    <input type="submit" value="Apply Theme">
  </form>
  <?php include '../includes/footer.php'; ?>
</main>

