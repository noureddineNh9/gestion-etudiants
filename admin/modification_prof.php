<?php
include "../database/connection.php";


if(isset($_POST['id_enseignant']) ){
    $id = $_POST['id_enseignant'];
        
    $sql = "SELECT * FROM Enseignant WHERE id_enseignant = '$id'";

     $res =$conn->query($sql);
        $row = mysqli_fetch_assoc($res);

}

if($_POST['btn'] ==="annuler" ){
    header('location:Enseignant.php');
} 
else{
    if(isset($_POST['nom']) and isset($_POST['password']) and 
        isset($_POST['email']) and isset($_POST['date']) 
        and isset($_POST['cin']) and isset($_POST['prenom']) and isset($_POST['id_enseignant'])  ){
    $nom=$_POST['nom'];
    $date=$_POST['date'];
    $email=$_POST['email'];
    $cin=$_POST['cin'];
    $prenom=$_POST['prenom'];
    $password=$_POST['password'];
    $ide =$_POST['id_enseignant'];

    $files=$_FILES['profil'];

    if($files['error'] !=0){
        $req="UPDATE Enseignant SET nom='$nom', prenom = '$prenom',cin ='$cin', date_naissance='$date',email = '$email',password ='$password' 
        WHERE id_enseignant = $ide ";

        $ress=$conn->query($req);
        if($ress){
            move_uploaded_file($tmp_name,$upload);
            header("Location:Enseignant.php");

        } else
        echo "echec enseignant deja existe "; 

    }
    else{
        
    $size=$files['size'];
    $tmp_name=$files['tmp_name'];
    $ereur=$files['error'];
    $type=$files['type'];
    $name=$files['name'];
    $tab=explode('.',$name);
    $extension=end($tab);
    $tab1=["jpg","jpeg","png"];
    if(in_array($extension,$tab1)){
            if($size<500000){
                    $upload="../images/";
                    $new_name=uniqid();
                    $new_name.= ".".$extension;
                     $upload.=$new_name;
                    
                $req="UPDATE Enseignant SET nom='$nom',image='$upload', prenom = '$prenom',cin ='$cin', date_naissance='$date',email = '$email',password ='$password' 
                WHERE id_enseignant = $ide ";

                     $ress=$conn->query($req);
                        if($ress){
                            move_uploaded_file($tmp_name,$upload);
                            header("Location:Enseignant.php");

                        } else
                        echo "echec enseignant deja existe ";   

            }else
                echo "La taille non appropriée";
    }else{
                echo "Modifier votre fichier";

    }



}



    
        
    
        
}
}


?>

<?php include 'header.php' ?>
<?php include './navbar.php'; ?>



<div class="form-container">
   <fieldset class="field">
      <form class="form__inscription" action="" method="post" enctype="multipart/form-data">
         <input hidden type="file" name="profil" id="file" class="file">
         <label for="file">
            <center> <img src="<?php echo $row['image']?>" alt="avatar" class="avatar"></center>
         </label>
         <div class="group_input">
            <div class="position_lab">
               <label for="nom" class="form__label"> Nom </label>
               <input class="form__input" type="text" value="<?php echo $row['nom'] ?>" name="nom" id="nom">

            </div>
            <div class="position_lab">
               <label for="prenom " class="form__label">Prenom</label>
               <input class="form__input" type="text" value="<?php echo $row['prenom'] ?>" name="prenom" id="prenom">

            </div>
            <div class="position_lab">
               <label for="cin" class=" form__label"> Cin</label>
               <input class="form__input" type="text" value="<?php echo $row['cin'] ?>" name="cin" id="cin">

            </div>
            <div class="position_lab">
               <label for="email" class=" form__label"> Email</label>
               <input class="form__input" type="text" value="<?php echo $row['email'] ?>" name="email" id="email">

            </div>
            <div class="position_lab">
               <label for="password" class=" form__label"> Password</label>
               <input class="form__input" type="text" value="<?php echo $row['password'] ?>" name="password"
                  id="password">

            </div>
            <div hidden class="position_lab">
               <input hidden class="form__input" type="text" value="<?php echo $row['id_enseignant'] ?>"
                  name="id_enseignant" id="id_enseignant">

            </div>

            <div class="content_date position_lab">
               <div class="dt">
                  <label for="date" class="info">Date de naissance</label>
                  <input type="date" name="date" id="date" value="<?php echo $row['date_naissance'] ?>">
               </div>
               <div class="content_sub btn_left">
                  <input class="button-81" type="submit" name="btn" value="enregistrer">
                  <input class="button-81" type="submit" name="btn" value="annuler">

               </div>

            </div>



         </div>




      </form>
   </fieldset>



   <script src="../assets/javascript/modification.js"></script>
   <?php include 'footer.php' ?>