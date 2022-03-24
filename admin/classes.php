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

   <form action="" method="POST">
      <input type="text" name="nom" required>
      <input type="submit" value="Ajouter Classe">
   </form>


   <?php 
      include '../database/connection.php';
      
      if (isset($_POST['nom'])) {
         $nom = $_POST['nom'];

         $insertResultat = $conn->query("INSERT INTO Classe(nom) VALUES('$nom')");
         if (!$insertResultat) {
            echo "<script>alert('error!')</script>";
         }else{
            echo 'ok';
         }
      }
   ?>


   <?php

         $enseignantResutat=$conn->query("select * from Enseignant");

         $classesResultat = $conn->query('SELECT * FROM Classe');
         if ($classesResultat) {
            while($row = mysqli_fetch_assoc($classesResultat)){
              $id_classe = $row['id_classe' ];
               echo "<h1>$row[nom]</h1>";

               echo "<table border='1'>
                        <tr>
                           <th>id</th>
                           <th>matiere</th>
                        </tr>";

               $MatiereResultat = $conn->query("SELECT * FROM Matiere WHERE id_classe = $id_classe");
               if ($MatiereResultat) {
                  while($row2 = mysqli_fetch_assoc($MatiereResultat)){
                     echo "<tr>
                              <th>$row2[id_matiere]</th>
                              <th>$row2[nom]</th>
                           </tr>";
                  }
               }

               echo "</table>";
               echo "<form action='' method='POST'>
               <input type='text' name='nom' required>
               <input hidden type='number' name='id_classe' value='$id_classe'>
               <select name='id_enseignant'>".
                  
               ."</select>
               <input type='submit' value='Ajouter matiere'>
            </form>";
            }
         }
      ?>



</body>

</html>