<?php 
  $page_title = "Index"; 
  session_start();
  include '../includes/header.php'; 
?>

<!-- Welcome Modal-->
<div id="welcomeModal" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close">&times;</span>
    <h2>Welcome to PuzzleMania!</h2>
    <p>We're thrilled to have you here. Explore our puzzles and have fun!</p>
  </div>
</div>
<main>
  <h2>Welcome to PuzzleMania!</h2>
  <p>Dive into a world of fun and challenge with our wide range of puzzles for all ages.</p>

  

  <div class="puzzle-highlight">
    <p>
      Explore our puzzle of the month,
      <a href="products.php"><strong>Mystical Puzzle</strong></a> by PuzzleMania!<!--puzzle of the month-->
    </p>
    <a href="products.php">
      <img src="../assets/images/mystic.png" alt="Puzzle of The Month">
    </a>
  </div>

  <p><em>Your mind deserves a workout. Let the games begin!</em></p>

  <section><!--categories-->
    <h3>Shop by Category</h3>
    <div class="puzzle-highlight">
      <p>
        <a href="products.php"><strong>Kids Puzzles</strong></a>
      </p>
      <a href="products.php">
        <img src="../assets/images/child.jpg" alt="Kids Puzzles">
      </a>
      <p>
        <a href="products.php"><strong>Challenging Puzzles</strong></a>
      </p>
      <a href="products.php">
        <img src="../assets/images/brain.png" alt="Challenging Puzzles">
      </a>
      <p>
        <a href="products.php"><strong>Magic Puzzles</strong></a>
      </p>
      <a href="products.php">
        <img src="../assets/images/magic.jpg" alt="Magic Puzzles">
      </a>
    </div>
    
  </section>

  <section>
    <h3>Puzzle Tip of the Day</h3>
    <p id="puzzleTip">Loading tip...</p>
  </section>

  <section>
    <h3>Want The Latest Puzzle News? Join Our Newsletter!</h3>
    <form onsubmit="return validateForm();">
      <label for="email">Your Email:</label><!--dynammic form-->
      <input type="email" id="email" required>
      <input type="submit" value="Subscribe">
    </form>
    
  </section>
  <?php include '../includes/footer.php'; ?>
</main>

<!--subscribe modal-->
<div id="subscribeModal" class="smodal">
  <div class="smodal-content">
    <span id="sModal" class="close">&times;</span>
    <h2>Thanks for Subscribing!</h2>
    <p>We'll make sure you stay up to date with the latest puzzle news!</p>
  </div>
</div>



<!--javascript-->
<script>
window.onload = function () {
  const welcomeModal = document.getElementById("welcomeModal");
  const closeWelcome = document.getElementById("closeModal");
  welcomeModal.style.display = "block";
  closeWelcome.onclick = function () {
    welcomeModal.style.display = "none";
  };
  window.addEventListener("click", function (event) {
    if (event.target === welcomeModal) {
      welcomeModal.style.display = "none";
    }
  });
  const tips = [
    "Sort your puzzle pieces by edge and color before starting!",
    "A well-lit room helps spot details more easily.",
    "Take short breaks—your brain solves puzzles better when fresh!",
    "Try working from the corners inward!",
    "Make sure to have a lot of room",
    "Having others around makes puzzling more fun!"
  ];
  document.getElementById("puzzleTip").innerText = tips[Math.floor(Math.random() * tips.length)];
};
function validateForm() {
  const email = document.getElementById("email").value.trim();
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (email === "") {
    alert("Please enter your email.");
    return false;
  }
  if (!emailPattern.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }
  const modal = document.getElementById("subscribeModal");
  const closeBtn = document.getElementById("sModal");
  modal.style.display = "block";
  closeBtn.onclick = function () {
    modal.style.display = "none";
  };
  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
  document.querySelector("form").reset();
  return false;
}
</script>