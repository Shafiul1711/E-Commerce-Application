<?php
session_start();
include '../includes/header.php';
include '../includes/db_connect.php';

if (!isset($_GET['id'])) {//checks if valid product
  echo "<p>Invalid product ID.</p>";
  include '../includes/footer.php';
  exit;
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");//check product id from the database
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>

<main>
  <?php if ($product): ?>
    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
    <img src="../assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>"><!--matches andd retrives the products details--?
    <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
    <p><strong>Pieces:</strong> <?php echo htmlspecialchars($product['pieces']); ?></p>
    <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
  <?php else: ?>
    <p>Product not found.</p>
  <?php endif; ?>
  <?php include '../includes/footer.php'; ?>

</main>

