<script> 
  $(function()
  {
    Dropzone.autoDiscover = false;
    myDropzone = new Dropzone(
      "#dropForm", 
      {
        paramName: "file",
        maxFilesize: <?=MAX_DOSYA_BOYUTU?>, // MB
        maxFiles:8,
        acceptedFiles:"<?=dropZoneJsUzantilariGetir()?>",
        parallelUploads:5,
      }
    );

    myDropzone.on("success", function(file,response) {
      console.log(response)
    });

    myDropzone.on("complete",function(file){
      var img="<img src='<?=base_url(DOSYA_YUKLEME_KLASORU)?>/"+file.name+"'/>";
      var dosya="<tr><td>"+ img + "</td><td>"+file.name+"</td><td><span class='label label-danger'>Sayfayı yenilemelisin</span></td></tr>";
      $(".table tbody").append(dosya);
      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
        location.reload();
      }
    });
  });
</script>