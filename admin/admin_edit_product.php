<?php
session_start();
require '../includes/db_connect.php';

if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {
    header("Location: login.php");
    exit;
}

// gets existing product
$products = $conn->query("SELECT * FROM products");

// updates product info
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category = $_POST['category'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $pieces = $_POST['pieces'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, image=?, category=?, option1=?, option2=?, pieces=?, stock=? WHERE id=?");
    $stmt->bind_param("ssdssssssi", $name, $description, $price, $image, $category, $option1, $option2, $pieces, $stock, $id);
    $stmt->execute();
    $updated = true;
    // refreshes list
    $products = $conn->query("SELECT * FROM products");
}

include '../includes/header.php';
?>

<main>
  <h2>Edit Products</h2>
  <?php if (!empty($updated)) echo "<p class='success'>Product updated successfully.</p>"; ?>
  <table border="1" cellpadding="10">
    <tr>
      <th>Name</th><th>Description</th><th>Price</th><th>Image</th><th>Category</th><th>Option1</th><th>Option2</th><th>Pieces</th><th>Stock</th><th>Action</th>
    </tr>
    <?php while ($row = $products->fetch_assoc()): ?>
      <form method="post">
      <tr>
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
        <td><input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"></td>
        <td><input type="text" name="description" value="<?php echo htmlspecialchars($row['description']); ?>"></td><!--shows editable fields for the product-->
        <td><input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($row['price']); ?>"></td>
        <td><input type="text" name="image" value="<?php echo htmlspecialchars($row['image']); ?>"></td>
        <td><input type="text" name="category" value="<?php echo htmlspecialchars($row['category']); ?>"></td>
        <td><input type="text" name="option1" value="<?php echo htmlspecialchars($row['option1']); ?>"></td>
        <td><input type="text" name="option2" value="<?php echo htmlspecialchars($row['option2']); ?>"></td>
        <td><input type="text" name="pieces" value="<?php echo htmlspecialchars($row['pieces']); ?>"></td>
        <td><input type="number" name="stock" value="<?php echo htmlspecialchars($row['stock']); ?>"></td>
        <td><input type="submit" value="Update"></td>
      </tr>
      </form>
    <?php endwhile; ?>
  </table>
  <?php include '../includes/footer.php'; ?>

</main>

