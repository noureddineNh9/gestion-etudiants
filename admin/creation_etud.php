<?php 
include "../database/connection.php";
    $error="";
    $files=$_FILES['profil'];
    $size=$files['size'];
    $tmp_name=$files['tmp_name'];
    $ereur=$files['error'];
    $type=$files['type'];
    $name=$files['name'];
    $tab=explode('.',$name);
    $extension=end($tab);
    $tab1=["jpg","jpeg","png"];
    if(in_array($extension,$tab1)){
        echo $size;

        if($size<1000000){
            $upload="../images/";
            $new_name=uniqid();
            $new_name.= ".".$extension;
            //   echo $new_name;
            $upload.=$new_name;
            if(isset($_POST['nom']) and isset($_POST['password']) and 
            isset($_POST['email']) and isset($_POST['date']) 
            and isset($_POST['cne']) and isset($_POST['prenom'])){
                $nom=$_POST['nom'];
                $date=$_POST['date'];
                $email=$_POST['email'];
                $cne=$_POST['cne'];
                $prenom=$_POST['prenom'];
                $password=$_POST['password'];
                echo "$nom $prenom $date $password $cne $email ";
                    $req="INSERT into Etudiant  (nom,prenom,cne,date_naissance,email,password,image) 
                    VALUES ('$nom','$prenom','$cne','$date','$email','$password','$upload')";
                    
                    $res=$conn->query($req);
                if($res){
                    move_uploaded_file($tmp_name,$upload);
                    echo " succes ";
                    header("Location:Etudiant.php");
                } else
                    echo "echec l'etudiant deja existe ";

            }else{
                echo "saisir tout les champs";
            }
       
          
        }else{
            echo "size incorrect";
        }
    }else {

        echo " veuillez rechoisir un fichier";
    }
 

?>