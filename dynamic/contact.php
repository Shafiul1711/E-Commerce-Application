<?php 
  $page_title = "Contact"; 
  session_start();
  include '../includes/header.php'; 
?>
<main><!-- contact-->
  <h2>Contact Us</h2>
  <p style="text-align: center;">
    If you need any help, have some questions, need help with a past order, or just want some recommendations for your next puzzling adventure, don't hesitate to contact us!
  </p>
  <img src="../assets/images/contact.png" alt="contact" width="300" height="200">
  <section>
    <form onsubmit="return validateForm();">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"><br><br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email"><br><br>

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" cols="30"></textarea><br><br>

      <input type="submit" value="Submit">
      <input type="reset" value="Clear">
    </form>
  </section>
  <?php include '../includes/footer.php'; ?>
</main>
<script>
  function validateForm() {//function
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();//constants
    const message = document.getElementById("message").value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (name === "" || email === "" || message === "") {
      alert("Please fill in all fields.");
      return false;
    }

    if (!emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }

    
    const modal = document.getElementById("welcomeModal");
    const closeBtn = document.getElementById("closeModal");//gets ids

    modal.querySelector("h2").textContent = `Thank you, ${name}, for your message!`;
modal.style.display = "block";

    closeBtn.onclick = function() {
      modal.style.display = "none";
    };

    
    window.onclick = function(event) {//closes
      if (event.target === modal) {
        modal.style.display = "none";
      }
    };
    
    
    document.querySelector("form").reset();//resets form

    return false; // prevents reload
  }
</script>
  </main>
<!-- modal-->
    <div id="welcomeModal" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close">&times;</span>
    <h2>Thank you for your message!</h2>
    <p>We at PuzzleMania will get back to you as soon as possible!</p>

  </div>
</div>