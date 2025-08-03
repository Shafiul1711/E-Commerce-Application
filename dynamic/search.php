<?php
session_start();
$page_title = "Search Products";
include '../includes/header.php';
include '../includes/db_connect.php';
?>

<main>
  <h2>Search Our Puzzle Collection</h2>

  <form method="get" action="">
    <label for="query">Search:</label>
    <input type="text" id="query" name="query" placeholder="e.g., Magic, Kids, Sky" required>
    <input type="submit" value="Search">
  </form>

  <?php
  if (isset($_GET['query']) && !empty(trim($_GET['query']))) {//check if query is provided
    $search = '%' . trim($_GET['query']) . '%';

    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ? OR category LIKE ?");
    $stmt->bind_param("sss", $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h3>Search Results for \"" . htmlspecialchars($_GET['query']) . "\":</h3>";

    if ($result->num_rows > 0) {//displays matching products
      echo '<div class="product-grid">';
      while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card">';
        echo '<img src="../assets/images/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '">';
        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
        echo '<p><strong>$' . number_format($row['price'], 2) . '</strong></p>';
        echo '<form action="add_to_cart.php" method="post">';
        echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
        echo '<input type="submit" value="Add to Cart">';
        echo '</form>';
        echo '</div>';
      }
      echo '</div>';//close product grid
    } else {
      echo "<p>No results found.</p>";
    }

    $stmt->close();//close statement
  }
  ?>

<?php include '../includes/footer.php'; ?>

</main>
