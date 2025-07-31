<?php
session_start();
if (isset($_POST['theme'])) {
  $_SESSION['theme'] = $_POST['theme'];
  header('Location: index.php');
  exit();
}
?>
<form method="post">
  <label>Choose Theme:</label>
  <select name="theme">
    <option value="style.css">Default</option>
    <option value="theme_winter.css">Winter</option>
    <option value="theme_spring.css">Spring</option>
    <option value="theme_dark.css">Dark</option>
  </select>
  <button type="submit">Apply</button>
</form>
