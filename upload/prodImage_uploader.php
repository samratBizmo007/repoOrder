   <?php
//print_r($_FILES);die();
   if (is_uploaded_file($_FILES['bill']['tmp_name'])) {
    $uploads_dir = '../images/product_images/';
    $tmp_name = $_FILES['bill']['tmp_name'];
    $pic_name = $_FILES['bill']['name'];

    move_uploaded_file($tmp_name, $uploads_dir.$pic_name);

    if(file_exists($uploads_dir.$pic_name)){
      $response=array(
        'status'    =>  '200',
        'file_name'    =>  $pic_name,
        'status_message'    =>  'File '.$pic_name.' uploaded successfully'
      );
      echo json_encode($response);
    }else{
     $response=array(
      'status'    =>  '400',
      'file_name'    =>  $pic_name,
      'status_message'    =>  'File '.$pic_name.' not uploaded successfully'
    );
     echo json_encode($response);
   }
 }
 else{
   $response=array(
    'status'    =>  '400',
    'file_name'    =>  $pic_name,
    'status_message'    =>  'File '.$pic_name.' not uploaded successfully'
  );
   echo json_encode($response);
 }

 ?>