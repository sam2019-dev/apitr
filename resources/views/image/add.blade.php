<form method="post" action="{{ url('/image') }}" enctype="multipart/form-data" >
   @method('POST')
   @csrf()
   <input type="text" name="imagename" >
   <input type="text" name="abc" >
   <input type="file" name="imagefile" >
   <input type="submit" name="save" >
</form>