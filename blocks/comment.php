<?php if (isset($_SESSION["login"]["uid"])): ?>
    <div class="comments">
        <img src="../img/erica.jpg" alt="Avatar">
        <input name="writeComment" type="text" placeholder="Write you comment">
        <input type="submit" name="commentButton" value="✓">
        <div class="del"><input type="submit" name="commentDeleteButton" value="x"></div>
    </div>
<?php endif; ?>
