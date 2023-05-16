<!DOCTYPE html>
<html>
   <head>
      <title>Laravel Video Upload Form - ScratchCode.io</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   </head>
   <body>
  
              
 
            
 
               <form action="{{ route('store.video') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
 
<!--                      <div class="col-md-12">
                        <div class="col-md-6 form-group">
                           <label>Title:</label>
                           <input type="text" name="title" class="form-control"/>
                        </div>
 -->                        <div class="col-md-6 form-group">
                           <label>Select Video:</label>
                           <input type="file" name="video" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                           <button type="submit" class="btn btn-success">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>