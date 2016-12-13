<div class="header">

  <a href="index.php">
    <img src="img/logo-linkify.png" alt="Linkify Logotype" />
  </a>

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

        <div class="headerForm">
            <a href="blocks/logout.php">
            <input type="submit" name="login" value="Log out">
            </a>
        </div>

    <?php endif; ?>




</div>
