<?php
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {//checks if user is admin
    header("Location: login.php");
    exit;
}

require '../includes/db_connect.php';//connects to database
$page_title = "Add Product";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $image = trim($_POST['image']); 
    $category = trim($_POST['category']);
    $option1 = trim($_POST['option1']);
    $option2 = trim($_POST['option2']);
    $pieces = trim($_POST['pieces']);
    $stock = intval($_POST['stock']);

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image, category, option1, option2, pieces, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");//inserts sql qquery
    $stmt->bind_param("ssdsssssi", $name, $description, $price, $image, $category, $option1, $option2, $pieces, $stock);

    if ($stmt->execute()) {
        $success = "Product added successfully.";
    } else {
        $error = "Error: " . $stmt->error;
    }
}
?>

<?php include '../includes/header.php'; ?>
<main>
  <h2>Add New Product</h2>

  <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
  <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

  <form method="post" action="add_product.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Price ($):</label>
    <input type="number" step="0.01" name="price" id="price" required>

    <label for="image">Image Filename:</label>
    <input type="text" name="image" id="image" required>

    <label for="category">Category:</label>
    <input type="text" name="category" id="category" required>

    <label for="option1">Option 1:</label>
    <input type="text" name="option1" id="option1" value="Physical" required>

    <label for="option2">Option 2:</label>
    <input type="text" name="option2" id="option2" value="Digital" required>

    <label for="pieces">Pieces:</label>
    <input type="text" name="pieces" id="pieces" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" required>

    <input type="submit" value="Add Product">
  </form>
  <?php include '../includes/footer.php'; ?>

</main>
