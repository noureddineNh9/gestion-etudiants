document.querySelector('.file').addEventListener("change", (e) => {
    console.log(e);
    var file = e.target.files[0];
    document.querySelector('.avatar').src = URL.createObjectURL(file);
})