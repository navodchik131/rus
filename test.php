<?
include 'header.php';
?>
<?php if ( isset ($_SESSION['logged_user']) ) : ?>
<div style="text-align: center">
  <img src="images/Group.png" class="group" style="margin-top:50px">
</div>
<?php
else :echo "<div class='error'>Доступ закрыт</div>";

endif; ?>
<?
include 'footer.php';
?>
