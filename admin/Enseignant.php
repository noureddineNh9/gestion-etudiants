<?php
include "../database/connection.php";

$items =[ "id","image" ,"nom" , "prenom ", "cin" , "date de naaissance" , "email"];

$req ="SELECT id_enseignant ,image, nom , prenom ,cin ,date_naissance ,email from Enseignant ";
 $res = $conn->query($req);

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'header.php' ?>

<?php include './navbar.php'; ?>


<div class="tab_container">
   <div class="header_ajout">
      <a href="inscription_prof.php"><button class="btn_ajout">Ajout</button></a>
      <div class="search">
         <input class="recherch" type="text" placeholder="Entrer le CIN">

         <button><a href="#"> <i class="fa fa-search" aria-hidden="true"></i></a></button>
      </div>
   </div>

   <table class="table__inscription">
      <?php
        echo "<tr class='th-style'>";
        foreach($items as $item){
            echo " <th>$item</th>";
        } 
        echo "<th >modifier </th>";
        echo "<th> supprimer </th>";
        "</tr>";
        
        while($rows =mysqli_fetch_assoc($res)){
            echo "<tr>";
            foreach($rows as $key=>$row ){
                if($key!='image'){
                    echo " <td>$row</td>";
                 }else
                 echo "<td><img  class='img-pf' src='$row' alt='image_profil'/></td>";
                
                
                
                
            }
            echo "
            <td>
            <form action='modification_prof.php' method='post'>
            <input hidden type='text' name='id_enseignant' value='$rows[id_enseignant]' >
            <button class='button-71' >modifier </button>
           </form></td>";
            echo "<td> 
            <form action='suppression_prof.php' method='post'>
            <input hidden type='text' name='id_enseignant' value='$rows[id_enseignant]' >
            <button class='btn-72'>supprimer </button>
            </form></td>";
                 echo "</tr>";
            

        }
        echo $rows['id_enseignant'];
        
        
       
       
        ?>


   </table>
</div>


<?php include 'footer.php' ?>