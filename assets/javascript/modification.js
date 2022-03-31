var file = document.querySelector(".file");

file.addEventListener(
   "change",

   (e) => {
      var Fe = e.target.files[0];
      document.querySelector(".avatar").src = URL.createObjectURL(Fe);
   }
);
