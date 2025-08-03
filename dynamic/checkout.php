<?php
session_start();
$page_title = "Checkout";
include '../includes/header.php'; 
?>

<main>
  <h2>Checkout</h2>

  <?php if (empty($_SESSION['cart'])): ?><!--show message if cart is empty-->
    <p>Your cart is empty. <a href="pproducts.php">Browse products</a> to continue shopping.</p>
  <?php else: ?>
     <!--if cart has items show checkout form-->
    <form action="process_order.php" method="post">
      <table class="product-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $total = 0; 
            foreach ($_SESSION['cart'] as $id => $item): 
              $subtotal = $item['price'] * $item['quantity'];//calclates total and displays
              $total += $subtotal;
          ?>
          <tr>
            <td>
                <?php echo htmlspecialchars($item['name']); ?>
                <br><small><em><?php echo htmlspecialchars($item['format']); ?></em></small><!--display product name and format-->
            </td>
            <td>$<?php echo number_format($item['price'], 2); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>$<?php echo number_format($subtotal, 2); ?></td>
            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>

      <p><strong>Total Amount:</strong> $<?php echo number_format($total, 2); ?></p>      <!--display grand total-->

      <h3>Billing Information</h3>
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="payment">Payment Method:</label>
      <select id="payment" name="payment" required>
        <option value="credit">Credit Card</option>
        <option value="paypal">PayPal</option>
        <option value="debit">Debit Card</option>
      </select>

      <br><br>
      <a href="thank_you.php" class="button">Confirm Order</a><!--submit button-->
    </form>
  <?php endif; ?>
</main>

<?php include '../includes/footer.php'; ?>
