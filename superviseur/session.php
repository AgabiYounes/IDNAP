<?php
session_start ();
if (! $_SESSION['superviseur']) {
  header('location:login.php');
}
