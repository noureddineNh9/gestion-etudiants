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

   include './database/connection.php';
   
   $id_etudiant =  $_SESSION['id'];

   $cmd = "select * from Note WHERE id_etudiant=$id_etudiant";
   $res = $conn->query($cmd);
   if ($res) {
      $row = mysqli_fetch_assoc($res);
      print_r($row);
      echo "<p></p>";
   }



?>

<?php  include './header.php' ?>
<?php include 'layouts/navbar.php'; ?>

<h1>
   Les Notes
</h1>

<table>
   <tr>
      <th>matiere</th>
      <th>note</th>
   </tr>
   <tr>
      <td>aze</td>
      <td>aze</td>
   </tr>
   <tr>
      <td>aze</td>
      <td>aze</td>
   </tr>
   <tr>
      <td>aze</td>
      <td>aze</td>
   </tr>
</table>

<?php  include './footer.php' ?>