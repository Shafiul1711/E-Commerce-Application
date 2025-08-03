<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$page_title = "Browse Puzzles";
include '../includes/header.php';
include '../includes/db_connect.php';
?>

<main>
  <h2>Our Puzzles</h2>
  <div class="product-grid">
    <?php
      $result = $conn->query("SELECT * FROM products");

      if ($result && $result->num_rows > 0):      //if products are found, loop through and display each
        while($row = $result->fetch_assoc()):
    ?>
      <div class="product-card"><!--retrieves images and details from database-->
        <img src="../assets/images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
        <p><?php echo htmlspecialchars($row['description']); ?></p>
        <p><strong>$<?php echo number_format($row['price'], 2); ?></strong></p>

        <!--link to details page-->
        <p><a href="product_details.php?id=<?php echo $row['id']; ?>">View Details</a></p>

        <!--link to ratings page-->
        <p><a href="rate_product.php?id=<?php echo $row['id']; ?>">Rate this Product</a></p>

        <form action="add_to_cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <label for="format_<?php echo $row['id']; ?>">Choose Format:</label>
            <select name="format" id="format_<?php echo $row['id']; ?>">
            <option value="Physical">Physical</option>
            <option value="Digital">Digital</option>
            </select>
            <input type="submit" value="Add to Cart">
        </form>
        </div>

    <?php
        endwhile;
      else:
        echo "<p>No products available.</p>";
      endif;
      $conn->close();
    ?>
  </div>
  <?php include '../includes/footer.php'; ?>
</main>


