<?php
   session_start();
   if (isset($_SESSION['type']) && isset($_SESSION['email'])) {
      if($_SESSION['type'] == 'etudiant'){

      }else{
         header('Location: login.php');
      }
   }else{
      header('Location: login.php');
   }

?>

<?php  include './header.php' ?>

<?php
   

   include 'layouts/navbar.php';

?>

<h1>etudiant page</h1>

<?php  include './footer.php' ?>