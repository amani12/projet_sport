<?php
session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
header("location:http://localhost/projet_sport/web_admin/connexion_admin");

?>