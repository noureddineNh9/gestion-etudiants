<?php
include "../database/connection.php";




if(isset($_POST['id_enseignant']) ){
    $id = $_POST['id_enseignant'];
      $sql = "DELETE FROM Enseignant WHERE id_enseignant = $id";
     $res =$conn->query($sql);
     if($res){
         header('Location:Enseignant.php');
     }
     else{
         echo "echec";
     }

}

?>