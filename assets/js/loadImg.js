$(document).ready(function () {
    function readURL(file) {
        if (file.files && file.files[0]) {         //si le boutton upload contient quelque chose
            var reader = new FileReader(); // "recupere" le(s) fichiers
            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);  //change la valeur de l'attribut src et on le range dans  e.target.result
            }
            reader.readAsDataURL(file.files[0]); // je spécifie que reader doit lire l'url du fichier qui se situe en .files[0]
        }
    }
    

    $("#pro_photo").change(function () {
        readURL(this);                  //affiche l'image
    });
    
});


