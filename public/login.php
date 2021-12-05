<?php require_once ('layouts\header.php'); ?>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <h1> MySaf Reservation </h1>
      <div>
        <img src ="<?= constant("BASEURL") . 'assets/image/logo.png' ?>" id="icon" alt="System Icon" />
      <div>
  
    <h2 class="login active"> Sign In </h2>
    <h2 class="login inactive underlineHover">Sign Up </h2>

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="input login" name="login" placeholder="Email/Phone number">
      <input type="password" id="password" class="input login" name="login" placeholder="password">
      <button class="button login">LOG IN</button>
    </form>

    <!-- Remind Passowrd -->
    <!--div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div-->

  </div>
</div>

<?php require_once ('layouts\footer.php'); ?>