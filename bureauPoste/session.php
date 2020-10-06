<?php
session_start ();
if (! $_SESSION['bureauPoste']) {
  header('location:login.php');
}
