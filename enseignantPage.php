<?php
   session_start();
   if (isset($_SESSION['type']) && isset($_SESSION['email'])) {
      if($_SESSION['type'] == 'enseignant'){

      }else{
         header('Location: login.php');
      }
   }else{
      header('Location: login.php');
   }

   if (isset($_POST['note']) AND isset($_POST['id_etudiant']) AND isset($_POST['id_matiere'])) {
      $note = $_POST['note'];
      $id_etudiant = $_POST['id_etudiant'];
      $id_matiere = $_POST['id_matiere'];

      echo $note;
   }

?>

<?php  include './header.php' ?>
<?php include 'layouts/navbar.php'; ?>


<?php

   include './database/connection.php';

   $id_enseignant = $_SESSION['id_enseignant'];

   $resultat = $conn->query("select * from Matiere WHERE id_enseignant = $id_enseignant");

   if ($resultat) {
   
      while ($row = mysqli_fetch_assoc($resultat)) {
         $id_matiere = $row['id_matiere'];
         $nom_matiere = $row['nom'];

         echo "<h1>$nom_matiere</h1>";

         //$notes = $conn->query("select n.note, e.id_etudiant, e.nom, e.prenom from Note n, Etudiant e, Classe c WHERE n.id_etudiant = e.id_etudiant AND n.id_matiere = $id_matiere");
         
         $notes = $conn->query("select a.id_etudiant, a.id_matiere, a.id_classe, a.nom, a.prenom, n.note 
                                 from (select m.id_matiere, m.id_classe, e.id_etudiant, e.nom, e.prenom
                                       from Etudiant e JOIN Matiere m 
                                       ON m.id_classe = e.id_classe 
                                       AND m.id_matiere=$id_matiere) a 
                                 LEFT JOIN Note n 
                                 ON a.id_matiere = n.id_matiere 
                                 AND a.id_etudiant=n.id_etudiant");
         if ($notes) {
            echo "<table border='1'>
                  <tr>
                     <th>id classe</th>
                     <th>id etudiant</th>
                     <th>nom</th>
                     <th>prenom</th>
                     <th>note</th>
                     <th></th>
                  </tr>";
            while ($row2 = mysqli_fetch_assoc($notes)) {
               print_r($row2);

               echo "<tr>
                  <td>$row2[id_classe]</td>
                  <td>$row2[id_etudiant]</td>
                  <td>$row2[nom]</td>
                  <td>$row2[prenom]</td>
                  <form method='POST' action=''>
                  <input hidden type='number' value='$row2[id_matiere]' name='id_matiere'/>
                  <input hidden type='number' value='$row2[id_etudiant]' name='id_etudiant'/>
                     <td><input type='number' value='$row2[note]' name='note'/></td>
                     <td><input type='submit' value='modifier' name='modifier'/></td>
                  </form>
               </tr>";
            }
            echo '</table>';
         }
         
      }
   }



?>

<h1>enseignant page</h1>

<?php  include './footer.php' ?>