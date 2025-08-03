<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title ?? 'Online Puzzle Store'; ?></title>
  <meta name="description" content="Swtch themes, shop and rate 20 products. Built with SQL, Php and HTML5"><!--seo tags-->
  <meta name="keywords" content="puzzles, online store, ecommerce, PHP, MySQL, HTML5, brain game">
  <meta name="author" content="Shafiul Kalam">
  <meta name="robots" content="index, follow">
  <link rel="icon" href="../assets/images/icon.png" type="image/png">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/<?php echo $_SESSION['theme'] ?? 'theme_default.css'; ?>"><!--style sheet-->
</head>
<body>
  <header>
    <h1>PuzzleMania</h1>
    <nav>
      <ul>
        <li><a href="../dynamic/index.php">Home</a></li>
        <li><a href="../dynamic/products.php">Products</a></li><!--menus-->
        <li><a href="../dynamic/faq.php">FAQ</a></li>
        <li><a href="../dynamic/search.php">Search</a></li>
        <li><a href="../dynamic/cart.php">Cart</a></li>
        <li><a href="../dynamic/user_profile.php">Profile</a></li>
        <li><a href="../dynamic/login.php">Login</a></li>
        <li><a href="../dynamic/register.php">Register</a></li>
        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?><!--accessible to admins-->
        <li><a href="../admin/admin_panel.php">Admin</a></li>
      <?php endif; ?>
      </ul>
    </nav>
    <hr>
  </header>

</head>
