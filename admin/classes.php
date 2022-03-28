<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>


   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet">

   <link rel="stylesheet" href="../styles/main.css">
</head>

<body>

   <main>




      <form action="" method="POST">
         <input type="text" name="nom" required>
         <input type="submit" name="submit" value="Ajouter Classe">
      </form>


      <?php 
      include '../database/connection.php';
      
      // classe formulaire
      if (isset($_POST['nom']) && $_POST['submit'] == 'Ajouter Classe') {
         $nom = $_POST['nom'];

         $insertResultat = $conn->query("INSERT INTO Classe(nom) VALUES('$nom')");
         if (!$insertResultat) {
            echo "<script>alert('error!')</script>";
         }
      }

      // matiere formulaire
      if (isset($_POST['nom']) && isset($_POST['id_classe']) 
            && isset($_POST['id_enseignant']) &&  $_POST['submit'] == 'Ajouter Matiere') {
               
         $nom = $_POST['nom'];
         $id_classe = $_POST['id_classe'];
         $id_enseignant = $_POST['id_enseignant'];

         if (!empty($id_enseignant) && !empty($id_classe) && !empty($nom)) {
            try {
               $selectMatiere = $conn->query("SELECT nom FROM Matiere WHERE nom='$nom' AND id_classe = $id_classe");
            
               if (mysqli_num_rows($selectMatiere) === 0) {
                     $insertMatiere = $conn->query("INSERT INTO Matiere(nom, id_classe, id_enseignant) 
                                                   VALUES('$nom', $id_classe, $id_enseignant)");
               }else{
                  echo "<script>alert('le nom de matiere deja exist !')</script>";
               }

            } catch (Exception $e) {
               echo "<script>alert('error!')</script>";
            } 
         }else{
            echo "<script>alert('form non valide!')</script>";

         }
                                 
  

      }

      // delete classe formulaire
      if (isset($_POST['id_classe']) && $_POST['submit'] == 'supprimer classe') {
         $id_classe = $_POST['id_classe'];

         $deleteClasse = $conn->query("DELETE FROM Classe WHERE id_classe = $id_classe");
         if (!$deleteClasse) {
            echo "<script>alert('error!')</script>";
         }
      }


      // supprimer matiere formulaire
      if (isset($_POST['id_matiere']) && $_POST['submit'] == 'supprimer matiere') {
         $id_matiere = $_POST['id_matiere'];

         $deleteMatiere = $conn->query("DELETE FROM Matiere WHERE id_matiere = $id_matiere");
         if (!$deleteMatiere) {
            echo "<script>alert('error!')</script>";
         }
      }

   ?>


      <?php

         $enseignantResutat = $conn->query("select * from Enseignant");

         $classesResultat = $conn->query('SELECT * FROM Classe');
         if ($classesResultat) {
            while($row = mysqli_fetch_assoc($classesResultat)){
              $id_classe = $row['id_classe' ];
               echo "<h1>$row[nom]</h1>";
               
               // echo "<form method='POST' action=''>
               //    <input hidden type='number' name='id_classe' value='$id_classe'>
               //    <input type='submit' name='submit' value='supprimer classe'>
               // </form>";

               echo "<table border='1'>
                        <tr>
                           <th>id</th>
                           <th>matiere</th>
                           <th></th>
                        </tr>";

               $MatiereResultat = $conn->query("SELECT * FROM Matiere WHERE id_classe = $id_classe");
               if ($MatiereResultat) {
                  while($row2 = mysqli_fetch_assoc($MatiereResultat)){
                     $id_matiere = $row2['id_matiere'];
                     echo "<tr>
                              <th>$row2[id_matiere]</th>
                              <th>$row2[nom]</th>
                              <th>
                                 <form method='POST' action=''>
                                    <input hidden type='number' name='id_matiere' value='$id_matiere'>
                                    <input type='submit' name='submit' value='supprimer matiere'>
                                 </form>
                              </th>
                           </tr>";
                  }
               }

               echo "</table>";
               echo "<form action='' method='POST'>
               <input type='text' name='nom' required>
               <input hidden type='number' name='id_classe' value='$id_classe'>
               <select name='id_enseignant'>";
                  echo "<option></option>";
                     $enseignantResutat->data_seek(0);
                  if ($enseignantResutat) {
                     while ($enseignantRow = mysqli_fetch_assoc($enseignantResutat)) {
                        echo "<option value='$enseignantRow[id_enseignant]' >$enseignantRow[nom]</option>";
                     }
                  }
               echo "</select>
                        <input type='submit' name='submit' value='Ajouter Matiere'>
                     </form>";
            }
         }
      ?>


   </main>

</body>

</html>