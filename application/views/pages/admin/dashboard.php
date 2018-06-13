<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/posts/dist/css/swiper.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900" rel="stylesheet">
  <style>
  body {
    font-family: 'Roboto', sans-serif;
  }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>

<style type="text/css">
.user_img{
  height: 50px;
  width: 50px;
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
}

.timeline_img{
  height:500px;
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
}
</style>
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-user-secret"></i> Dashboard</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-third">
        <div class="w3-container w3-blue w3-padding-16">
          <div class="w3-left"><i class="fa fa-user-circle w3-jumbo"></i></div>
          <div class="w3-right">
            <span class="w3-xxlarge"><?php echo $stats['userCount']; ?></span>
          </div>
          <div class="w3-clear"></div>
          <h4>Total Users</h4>
        </div>
      </div>
      <div class="w3-third">
        <div class="w3-container w3-green w3-padding-16">
          <div class="w3-left"><i class="fa fa-cubes w3-jumbo"></i></div>
          <div class="w3-right">
            <span class="w3-xxlarge"><?php echo $stats['prod_count']; ?></span>
          </div>
          <div class="w3-clear"></div>
          <h4>Total Products</h4>
        </div>
      </div>
      <!-- <div class="w3-third">
        <div class="w3-container w3-red w3-padding-16">
          <div class="w3-left"><i class="fa fa-history w3-jumbo"></i></div>
          <div class="w3-right">
            <span class="w3-xxlarge"><?php echo $orderCount['closeOrders']; ?></span>
          </div>
          <div class="w3-clear"></div>
          <h4>Closed Orders</h4>
        </div>
      </div> -->      
    </div>
    <!-- End page content -->

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-rss-square"></i> Latest Feeds</b></h5>
    </header>

    <!-- Product timeline div starts -->
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-container">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="w3-col l12" style="padding-left: 30px">

            <div class="w3-col l4 w3-padding-left">
              <label>Sort By:</label>
              <select class="w3-input w3-border" name="sortFeeds" id="sortFeeds">
                <option value="0">All</option>
                <option value="1">Featured</option>
                <option value="2">Unfeatured</option>
              </select>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
          </div>         

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
  <!-- script to load more feeds data on page scroll -->
  <script>
    // -------fucntion to load 2 feeds on dropdown sort by chnage-------------------//
    $('#sortFeeds').change(function(){
      var limit = 2;
  var start = 0;
  var action = 'inactive';
function sortFeeds(limit,start){
  
  var sortBy = $('#sortFeeds').val();
  $.ajax({
   url:"<?php echo base_url(); ?>admin/dashboard/getTimeline_web",
   method:"POST",
   data:{limit:limit, start:start, sortBy:sortBy},
   cache:false,
   success:function(data)
   {
    alert(data);
    if(start==0){
      $('#load_feeds').html(data);
    }
    else{
      $('#load_feeds').append(data);
    }
    
    if(data == '')
    {
     $('#loading_msg').html('<div class="alert alert-warning w3-center w3-margin"><b> Oops! No more Feeds available. </b></div>');
     action = 'active';
   }
   else
   {
      $('#loading_msg').html('<div class="w3-center w3-margin w3-text-grey"><b><i class="fa fa-refresh fa-spin"></i> Loading Feeds... </b></div>');
     action = "inactive";
   }
 }
});
}

    if(action == 'inactive')
    {
      action = 'active';
      sortFeeds(limit, start);
    }
    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_feeds").height() && action == 'inactive')
      {
       action = 'active';
       start = start + limit;
       setTimeout(function(){
        sortFeeds(limit, start);
      }, 500);
     }
   });
});

// ----------------------function ends here -----------------------------------//

// --------------------- function to get all feeds by default---------------------//
    $(document).ready(function(){ 
     var limit = 2;
     var start = 0;
     var action = 'inactive';
     
     function load_feeds_data(limit, start)
     {
      var sortBy = $('#sortFeeds').val();
      $.ajax({
       url:"<?php echo base_url(); ?>admin/dashboard/getTimeline_web",
       method:"POST",
       data:{limit:limit, start:start, sortBy:sortBy},
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
     $('#loading_msg').html('<div class="w3-center w3-margin w3-text-grey"><b><i class="fa fa-refresh fa-spin"></i> Loading Feeds... </b></div>');
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
      }, 500);
     }
   });

  });
// ------------------------fucntion ends ----------------------------//
</script>
<!-- script to load feeds on page scroll ends -->
<script>
        //--------------fun for remove product from product table-------------------------------//
        function RemoveProduct(prod_id) {
          $.confirm({
            title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to delete this product.!</h4>',
            content: '',
            type: 'red',
            buttons: {
              confirm: function () {
                var dataS = 'prod_id=' + prod_id;
                $.ajax({
                  url: "<?php echo base_url(); ?>admin/dashboard/removeProduct",
                  type: "POST",
                  data: dataS,
                  cache: false,
                  success: function (html) {
                    $.alert(html);
                    location.reload();
                  }
                });
              },
              cancel: function () {
              }
            }
          });
        }
        //------------fun ends here------------------------------------------------------//

        //--------------fun to mark featured for post-------------------------------//
        function MarkFeatured(prod_id) {
          $.confirm({
            title: '<h4 class="w3-text-green"><i class="fa fa-warning"></i> Are you sure you want to mark post as Featured?</h4>',
            content: '',
            type: 'green',
            buttons: {
              confirm: function () {
                var dataS = 'prod_id=' + prod_id;
                $.ajax({
                  url: "<?php echo base_url(); ?>admin/dashboard/markFeatured",
                  type: "POST",
                  data: dataS,
                  cache: false,
                  success: function (html) {
                    $.alert(html);
                    location.reload();
                  }
                });
              },
              cancel: function () {
              }
            }
          });
        }
        //------------fun ends here------------------------------------------------------//

        //--------------fun to mark unfeatured for post-------------------------------//
        function MarkUnFeatured(prod_id) {
          $.confirm({
            title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to mark post as Unfeatured?</h4>',
            content: '',
            type: 'red',
            buttons: {
              confirm: function () {
                var dataS = 'prod_id=' + prod_id;
                $.ajax({
                  url: "<?php echo base_url(); ?>admin/dashboard/markUnfeatured",
                  type: "POST",
                  data: dataS,
                  cache: false,
                  success: function (html) {
                    $.alert(html);
                    location.reload();
                  }
                });
              },
              cancel: function () {
              }
            }
          });
        }
        //------------fun ends here------------------------------------------------------//

      </script>
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
