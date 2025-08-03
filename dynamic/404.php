<?php 
  $page_title = "Page Not Found"; 
  session_start();
  include '../includes/header.php'; //contained css for the 404 page
?>

<style>
  .not-found-container {
    text-align: center;
    padding: 80px 20px;
  }

  .not-found-container h1 {
    font-size: 6em;
    margin-bottom: 10px;
    color: #cc0000;
  }

  .not-found-container p {
    font-size: 1.2em;
    color: #444;
  }

  .not-found-container a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 25px;
    background-color: #0077cc;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
  }

  .not-found-container a:hover {
    background-color: #005fa3;
  }
</style>

<div class="not-found-container">
  <h1>404</h1>
  <p>Oops! The page you're looking for doesn't exist.</p>
  <a href="/dynamic/index.php">Return to Home</a>
</div>

<?php include '../includes/footer.php'; ?>
