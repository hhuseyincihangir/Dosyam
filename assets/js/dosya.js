Dropzone.options.dropForm = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 8, // MB
  maxFiles:8,
  acceptedFiles:".jpeg,.jpg,.gif,.png,.pdf,.docx,.doc,.xlsx,.xlsm,.xls,.xml,.csv,.txt,.xps,.odt,.ppt,.pptx,.potx,.zip,.rar",
  parallelUploads:3,
};
$(function()
{
  var myDropzone=new Dropzone("#dropForm");
  myDropzone.on("complete",function(file){
    var img="<img src='https://localhost/Dosyam/uploads/"+file.name+"'/>";
    var dosya="<tr><td>"+ img + "</td><td>"+file.name+"</td><td><span class='label label-danger'>Sayfayı yenilemelisin</span></td></tr>";
    $(".table tbody").append(dosya);
    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
      location.reload();
    }
  })
})