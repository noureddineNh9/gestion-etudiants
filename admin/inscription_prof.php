<?php include './header.php' ?>
<?php include './navbar.php'; ?>

<div class="form-container">

   <div class="right">
      <fieldset class="field">
         <form class="form__inscription" action="creation_prof.php" method="post" enctype="multipart/form-data">
            <input hidden type="file" name="profil" id="file" class="file">
            <label for="file">
               <center> <img src="../assets/images/photo-avatar-profil.png" alt="avatar" id="avatar" class="avatar">
               </center>
            </label>

            <div class="group_input">
               <div class="position_lab">
                  <label for="nom" class="form__label info"> Nom </label>
                  <input type="text" name="nom" id="nom">
               </div>
               <div class="position_lab">
                  <label for="prenom " class="form__label info">Prenom</label>
                  <input type="text" name="prenom" id="prenom">


               </div>
               <div class="position_lab">
                  <label for="cin" class="form__label info"> Cin</label>
                  <input type="text" name="cin" id="cin">


               </div>
               <div class="position_lab">
                  <label for="email" class="form__label info"> Email</label>
                  <input type="text" name="email" id="email">


               </div>

               <div class="position_lab">
                  <label for="password" class=" form__label"> Password</label>
                  <input type="text" name="password" id="password">


               </div>
               <div class="content_date position_lab">
                  <div class="dt">
                     <label for="date" class="info"> Date de naissance</label>
                     <input type="date" name="date" id="date">
                  </div>

                  <div class="content_sub ">
                     <input class="button-81" type="submit" value="envoyer">
                  </div>
               </div>


            </div>




         </form>
      </fieldset>

   </div>
</div>

</body>
<script src="../assets/javascript/inscription_prof.js"></script>

</html>