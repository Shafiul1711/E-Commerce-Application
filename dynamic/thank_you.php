<?php
session_start();
$page_title = "Thank You";
include '../includes/header.php';

//clears cart
$_SESSION['cart'] = [];
?>

<main>
  <h2>Thank You for Your Order!</h2>

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?><!--displays thank you message-->
    <p>Dear <strong><?php echo htmlspecialchars($_POST['name']); ?></strong>,</p>
    <p>Your order has been placed successfully. A confirmation has been sent to <strong><?php echo htmlspecialchars($_POST['email']); ?></strong>.</p>
    <p>We will deliver your items to:</p>
    <blockquote>
      <?php echo nl2br(htmlspecialchars($_POST['address'])); ?>
    </blockquote>
    <p>Payment Method: <strong><?php echo htmlspecialchars(ucfirst($_POST['payment'])); ?></strong></p>
  <?php else: ?>
    <p>Your order has been placed. Thank you for shopping with us!</p>
  <?php endif; ?>

  <a href="pproducts.php" class="button">Continue Shopping</a>
</main>

<?php include '../includes/footer.php'; ?>
