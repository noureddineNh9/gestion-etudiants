<?php include 'header.php' ?>
<?php include './navbar.php'; ?>


<div class="form-container">
   <div class="left">
      <fieldset class="field">
         <form class="form__inscription" action="creation_etud.php" method="post" enctype="multipart/form-data">
            <input hidden type="file" name="profil" id="file" class="file">
            <label for="file">
               <center> <img src="../assets/images/photo-avatar-profil.png" alt="avatar" class="avatar"></center>
            </label>

            <div class="group_input">
               <div class="position_lab">
                  <label for="nom" class="form__label"> Nom </label>

                  <input class="form__input" type="text" name="nom" id="nom">
               </div>
               <div class="position_lab">
                  <label for="prenom " class="form__label">Prenom</label>

                  <input class="form__input" type="text" name="prenom" id="prenom">

               </div>
               <div class="position_lab">
                  <label for="cne" class=" form__label"> Cne</label>

                  <input class="form__input" type="text" name="cne" id="cne">

               </div>
               <div class="position_lab">
                  <label for="email" class=" form__label"> Email</label>

                  <input class="form__input" type="text" name="email" id="email">

               </div>
               <div class="position_lab">
                  <label for="password" class=" form__label"> Password</label>

                  <input class="form__input" type="text" name="password" id="password">

               </div>

               <div class="content_date position_lab">
                  <div class="dt">

                     <label for="date" class="info"> Date de naissance</label>
                     <input type="date" name="date" id="date">

                  </div>
                  <div class="content_sub btn_left">
                     <input class="button-81" type="submit" value="envoyer">

                  </div>

               </div>


            </div>




         </form>
      </fieldset>

   </div>

</div>

</body>
<script src="../assets/javascript/inscription_etud.js"></script>

</html>