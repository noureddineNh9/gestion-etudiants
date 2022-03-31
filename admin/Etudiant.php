<?php
include "../database/connection.php";

$items =[ "id","image", "nom" , "prenom ", "cne" , "date de naaissance" , "email" , "num classe"];

$req ="SELECT id_etudiant,image, nom , prenom ,cne ,date_naissance ,email,id_classe from Etudiant ";
 $res = $conn->query($req);

 

?>

<?php include 'header.php' ?>
<?php include './navbar.php'; ?>

<div class="tab_container">
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
            foreach($rows as $key => $row ){
                 if($key!='image'){
                    echo " <td>$row</td>";
                 }else
                 echo "<td><img  class='img-pf' src='$row' alt='image_profil'/></td>";
                
                
            }
            echo " <td>
                <form action='modification_etud.php' method='post'>
                    <input hidden type='text' name='idetud' value='$rows[id_etudiant]' >
                    <button class='button-71' >modifier </button>
                </form>
            </td>";
            echo "<td> 
                <form action='suppression_etud.php' method='post'>
                    <input hidden type='text' name='idetud' value='$rows[id_etudiant]' >
                    <button class='btn-72'>supprimer </button>
                </form>
            </td>";
            
            echo "</tr>";
            

        }
        

       
        ?>


   </table>
</div>
<img src="" alt="">

<script src="./javaScript/Etudiant.js"></script>

<?php include 'footer.php' ?>