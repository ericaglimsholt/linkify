<div class="header">

  <a href="home.php">
    <img src="img/logo-linkify.png" alt="Linkify Logotype" />
  </a>

<!--    If the user are logged in-->

    <?php if (!isset($_SESSION["login"]["uid"])): ?>

      <div class="headerForm">

        <form class="loginform" action="/../home.php" method="post">
          <input type="text" name="username" value="" placeholder="Username">
          <input type="password" name="password" value="" placeholder="Password">
          <input type="submit" name="login" value="Log in">
        </form>

          <a href="../register.php">
            <input type="button" name="newuser" value="New user">
          </a>

      </div>

    <?php else: ?>

        <!--    If the user are not logged in-->

        <div class="headerForm">

          <a href="/../settings.php">
            <input type="submit" name="settings" value="Settings">
          </a>

          <a href="blocks/logout.php">
            <input type="submit" name="login" value="Log out">
          </a>

        </div>



    <?php endif; ?>

</div>
