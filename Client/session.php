<?php
session_start ();
if (! $_SESSION['client']) {
  header('location:loginCtrl.php');
}
