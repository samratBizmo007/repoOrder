<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feeds</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/posts/dist/css/swiper.min.css">

  <!-- <link rel="stylesheet" href="assets/css/alert/jquery-confirm.css"> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <!-- <script type="text/javascript" src="assets/css/alert/jquery-confirm.js"></script> -->
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-rss-square"></i> Latest Feeds</b></h5>
    </header>

    <!-- Product timeline div starts -->
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-container">
        <div class="col-lg-2"></div>
        <div class="w3-col l8 ">

          <div class="w3-col l12 w3-padding-xxlarge" id="load_feeds"></div>

          <!-- loading spinner div -->
          <div class="w3-col l12 w3-padding" id="loading_msg"></div>
          <!-- loading spinner div ends -->

        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
    <!-- Product timeline ends here -->
  </div>
  <!-- End page content -->


<!-- script to load more feeds data on page scroll -->
  <script>
    $(document).ready(function(){ 
     var limit = 2;
     var start = 0;
     var action = 'inactive';
     function load_feeds_data(limit, start)
     {
      $.ajax({
       url:"<?php echo base_url(); ?>user/feeds/getTimeline_web",
       method:"POST",
       data:{limit:limit, start:start},
       cache:false,
       success:function(data)
       {
    //alert(data);
    $('#load_feeds').append(data);
    if(data == '')
    {
     $('#loading_msg').html('<div class="alert alert-warning w3-center w3-margin"><b> Oops! No more Feeds available. </b></div>');
     action = 'active';
   }
   else
   {
     $('#loading_msg').html('<div class="w3-center w3-margin w3-xlarge w3-text-grey"><b><i class="fa fa-refresh fa-spin"></i> Loading Feeds... </b></div>');
     action = "inactive";
   }
 }
});
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_feeds_data(limit, start);
    }
    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_feeds").height() && action == 'inactive')
      {
       action = 'active';
       start = start + limit;
       setTimeout(function(){
        load_feeds_data(limit, start);
      }, 1000);
     }
   });

  });
</script>
<!-- script to load feeds on page scroll ends -->

<!-- Swiper JS -->
<script src="<?php echo base_url(); ?>css/posts/dist/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
</body>
</html>
