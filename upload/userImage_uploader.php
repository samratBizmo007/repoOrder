<?php


if (is_uploaded_file($_FILES['bill']['tmp_name'])) {
  $uploads_dir = '../images/users/';
  $tmp_name = $_FILES['bill']['tmp_name'];
  $pic_name = $_FILES['bill']['name'];
  $user_id = $_POST['user_id'];  
  move_uploaded_file($tmp_name, $uploads_dir.$pic_name);

  if(file_exists($uploads_dir.$pic_name)){
    echo "File uploaded successfully".$user_id;
  }else{
     echo "File not uploaded successfully.";

  }
}
else{
 echo "File not uploaded successfully.";
}

?>