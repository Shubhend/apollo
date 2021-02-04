        <html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
    <h1>File Upload</h1>    
     
<form id="forms" action="ajaxupload.php" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="email">dealer id</label>
<input type="text" class="form-control" id="email" name="dealerid" placeholder="Enter email" required />
</div>

<div class="form-group">
<label for="email">client id</label>
<input type="text" class="form-control" id="email" name="clientid" placeholder="Enter email" required />
</div>
<div class="form-group">
<label for="email">event</label>
<input type="text" class="form-control" id="email" name="eventid" placeholder="Enter email" required />
</div>

<div class="form-group">
<label for="email">venu</label>
<input type="text" class="form-control" id="email" name="venu" placeholder="Enter email" required />
</div>
<input type="text" name="image" id="url"/>
<input id="uploadImage" type="file" accept="image/*" name="ima" required/>

<input class="btn btn-success" type="submit" value="Upload">
</form>

<script>
       $(document).ready(function (e) {
 var url;
 function el(id){return document.getElementById(id);} // Get elem by ID

function readImage() {
    if ( this.files && this.files[0] ) {
        var FR= new FileReader();
        FR.onload = function(e) {
            url=e.target.result;
             $("#url").val(e.target.result);
            // el("base").innerHTML = e.target.result;
        };       
        FR.readAsDataURL( this.files[0] );
    }
}

el("uploadImage").addEventListener("change", readImage, false);
           
           
 $("#forms").on('submit',(function(e) {
  e.preventDefault();
 
  
   var form = $('#forms')[0];
   
   img=$("#uploadImage").val();
   alert(url);
  

   
//console.log(imageToBase64(img));
  $.ajax({
   url: "api/uploadimage.php",
   type: "POST",
   data:  new FormData(form),
   contentType: false,  
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
          alert(data.msg);
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
     // view uploaded file.
     $("#preview").html(data).fadeIn();
     $("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
 
 
 
function getFileContentAsBase64(path,callback){
    window.resolveLocalFileSystemURL(path, gotFile, fail);
            
    function fail(e) {
          alert('Cannot found requested file');
    }

    function gotFile(fileEntry) {
           fileEntry.file(function(file) {
              var reader = new FileReader();
              reader.onloadend = function(e) {
                   var content = this.result;
                   callback(content);
              };
              // The most important point, use the readAsDatURL Method from the file plugin
              reader.readAsDataURL(file);
           });
    }
}
 
 
 
 
 
 
});
        
        
        
    
</script>


</body>
</html>