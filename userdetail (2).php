<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>User Detail Registration</h1>
        <form id="fupForm"  action="api/addclientdetail.php" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
    </div>
    <div class="form-group">
        <label for="email">Age</label>
        <input type="text" class="form-control" id="email" name="age" placeholder="Enter email" required />
    </div>
  <div class="form-group">
        <label for="email">Mobile  No</label>
        <input type="text" class="form-control" id="email" name="mobileno" placeholder="Enter email" required />
    </div>
    
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
    </div>
    
      <div class="form-group">
        <label for="email">Event</label>
        <input type="text" class="form-control" id="email" name="event" placeholder="Enter email" required />
    </div>
    
    <div class="form-group">
        <label for="email">dealerid</label>
        <input type="number" class="form-control" id="email" name="dealerid" placeholder="Enter email" required />
    </div>
    
    
    <input type="submit" name="submit" class="btn btn-success submitBtn" value="SUBMIT"/>
</form>
        
        
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

<input id="uploadImage" type="file" accept="image/*" name="image" required/>

<input class="btn btn-success" type="submit" value="Upload">
</form>


        
    <h1>Login api</h1>    
     
<form id="form" action="loginapi.php" method="post" >

<div class="form-group">
<label for="email">email</label>
<input type="text" class="form-control" id="email" name="userid" placeholder="Enter email" required />
</div>

<div class="form-group">
<label for="email">Password</label>
<input type="text" class="form-control" id="email" name="password" placeholder="Enter email" required />
</div>
<input class="btn btn-success" type="submit" value="save">
</form>

   
    <script>
        $(document).ready(function (e) {
 $("#forms").on('submit',(function(e) {
  e.preventDefault();
 
  
   var form = $('#forms')[0];

  $.ajax({
   url: "api/uploadimage.php",
   type: "POST",
   data:  new FormData(form),
    contentType: 'multipart/form-data',
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
});
        
        
        
        
    </script>    
        
        
        
        
        
        
        
        
        
    </body>
    
</html>