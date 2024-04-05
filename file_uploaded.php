<html>
    <body>
          <form action="uploader.php" method="post" enctype="multipart/form-data">
          select file:
          <input type="file" name="file to upload"/>
          <input type="submit" value="upload" name="submit"/>
          </form>
    </body>
</html>
<?php $target_path = "d:/";
$target_path = $target_path.basename($_FILES['file to upload']['name']);
   if(move_uploaded_file($_FILES['file to upload']['tmp_name'],$target_path));
{
    echo "file uploaded successfully!";
}
   else
{
    echo "sorry,file not uploaded , please try again!";
}
?>