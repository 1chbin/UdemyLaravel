import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = 
                document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-sucess', 'dz-complete');
        }
    }
})



dropzone.on('success', function(file, response){
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.off('removefile', function(){
    document.querySelector('[name="imagen"]').value = ""
})

//dropzone.on('sending', function(file, xhr, formData){
//    console.log(formData);
//});

//dropzone.on('error', function(file, message){
//    console.log(message);
//});

//dropzone.on('removedfile', function(file, message){
//    console.log("Archivo Eliminado");
//});