<?php
include "../database/connection.php";




if(isset($_POST['idetud']) ){
    $id = $_POST['idetud'];
      $sql = "DELETE FROM Etudiant WHERE id_etudiant = $id";
     $res =$conn->query($sql);
     if($res){
         header('Location:Etudiant.php');
     }
     else{
         echo "echec";
        }
}

?>