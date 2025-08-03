<?php
session_start();//starts session
include '../includes/header.php';

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;//get product id from url
?>

<main>
  <h2>Rate This Product</h2>

  <?php if ($product_id > 0): ?>
    <form action="submit_rating.php" method="post"><!--rating shown if theres a valid product-->
      <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

      <label for="rating">Rating (1–5):</label>
      <select name="rating" id="rating" required>
        <option value="">--Select--</option>
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php endfor; ?>
      </select>

      <br><br>
      <label for="review">Optional Comment:</label><br>
      <textarea name="review" id="review" rows="4" cols="40"></textarea>

      <br><br>
      <input type="submit" value="Submit Rating">
    </form>
  <?php else: ?>
    <p>Invalid product.</p>
  <?php endif; ?>
  <?php include '../includes/footer.php'; ?>

</main>

