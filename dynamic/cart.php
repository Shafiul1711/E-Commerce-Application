<?php
session_start();//starts session for cart data
$page_title = "Your Shopping Cart";
include '../includes/header.php'; 
?>

<main>
  <h2>Your Cart</h2>

  <?php if (empty($_SESSION['cart'])): ?><!--if cart is empty-->
    <p>Your cart is currently empty.</p>
  <?php else: ?>
    <table class="product-table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $total = 0; 
          foreach ($_SESSION['cart'] as $id => $item): 
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
        ?>
        <tr>
          <td><?php echo htmlspecialchars($item['name']); ?></td>
          <td>$<?php echo number_format($item['price'], 2); ?></td>
          <td><?php echo $item['quantity']; ?></td>
          <td>$<?php echo number_format($subtotal, 2); ?></td>
          <td><a href="remove_from_cart.php?id=<?php echo urlencode($id); ?>">Remove</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p><strong>Cart Total:</strong> $<?php echo number_format($total, 2); ?></p>
    <a href="checkout.php" class="button">Proceed to Checkout</a>
  <?php endif; ?>
  <?php include '../includes/footer.php'; ?>
</main>


