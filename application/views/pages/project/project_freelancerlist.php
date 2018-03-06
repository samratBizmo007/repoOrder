<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Listing</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/joblisting.css">

  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/sales/manage_workorder.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/findwork/findwork.js"></script>

</head>
<body class="">
  <div class="container search_main">
    <div class="col-md-12">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <div class="row">
          <form class="form-group">
            <div class="search">
              <span class="fa fa-search"></span>
              <input placeholder="Search job by keywords" class="search_input" name="search">
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-2">
      </div>
    </div>
  </div>

  <div class="w3-container w3-padding-bottom" style="margin-top: 40px">
    <div class="w3-col l12 w3-margin-top w3-margin-bottom">
      <div class="col-lg-1"></div>
      <div class="w3-col l10">
        <div class="w3-col l12 w3-border-bottom ">
          <div class="w3-col l9 ">
            <div class="row w3-padding">
              <form class="form-group">
                <span>
                  <label class="label_main w3-margin"><b>Job Types</b></label>
                  <label class="radio-inline label1">
                    <input type="radio" name="optradio" class="label2" value="Fixed Price">Fixed Price
                  </label>
                  <label class="radio-inline label1">
                    <input type="radio" name="optradio" class="label3" value="Hourly">Hourly
                  </label>
                </span>
              </form>
            </div>
          </div>
          <div class="w3-col l3 ">
            <div class="row w3-padding">
              <label class="w3-margin" style="display:inline">
                <b>Sort By</b>&nbsp&nbsp&nbsp
                <select class="latest_search" name="searchby">
                  <option value="">Select</option>
                  <option value="lastest">Latest</option>
                  <option value="high">Prize(High to low)</option>
                  <option value="low">Prize(Low to High)</option>
                </select>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>

  <div class="w3-container w3-margin-bottom">
    <div class="w3-col l12">
      <div class="col-lg-1"></div>
      <div class="w3-col l10">
        <div class="w3-col l12">
          <div class="w3-col l9 w3-border-right" id="showResult">

            <?php
         // print_r($freelancer_info['status_message']);die();
//            if($freelancer_info['status_message']==1)
//            {
//             $count=1;
//              
          //print_r($freelancer_info['status_message']);
              foreach ($freelancer_info['status_message'] as $row)  
                { 
					//print_r($row);//die();
           echo '<div class="w3-col 12 w3-padding">              
              <div class="w3-col l12 w3-border-bottom">
                <div class="w3-right w3-margin-right"><a href=""><i class="fa fa-bookmark-o" style="font-size:25px; color: black"></i></a></div>
                <div class="col-lg-9">
                  <h4>'.$row['jm_username'].'</h4>
                    <span class="fa fa-star-o" data-rating="1">'.$row['jm_rank'].'</span>
        			<span class="fa fa-star-o" data-rating="2"></span>
        			<span class="fa fa-star-o" data-rating="3"></span>
        			<span class="fa fa-star-o" data-rating="4"></span>
       				 <span class="fa fa-star-o" data-rating="5"></span>
                  <div>
                    <p>
                      <div style="max-height:200px;overflow: hidden">
                        '.$row['jm_userDescription'].'
                      </div>
                      <span style="color:#02b28b"><i>More</i></span></p>
                    </div>
                    <div class="para_second">
                    //  <p>Tags & Skills: '.$row['jm_skill'].'</p>
                    </div>
                    <div class="w3-col l8 w3-margin-bottom">
                      <div class="w3-col l12">
                        <div class="w3-col l2 w3-padding-tiny">'. $row['jm_job_type'].'</div>
                        <div class="w3-col l5 w3-padding-tiny">Est Time:'.$row['jm_posting_date'].'</div>
                        <div class="w3-col l5 w3-padding-tiny">Posted:'.$row['jm_posting_date'].'</div>
                      </div>
                    </div>              
                  </div>
                  <div class="col-lg-3">
                    <div class="innerThird1">
                      <div class="innerThird3" >'.$row['jm_ratePerHr'].'</div>
                      <div class="w3-right" ><a href="#" class="w3-small w3-black w3-round-xlarge w3-padding-tiny btn">HIRE ME</a></div>
                      <div class="w3-right" style="margin: 12px 10px 0 0"><p>10 Proposals</p></div>
                    </div>
                  </div>
                </div>             
              </div>';
            }
            //$count++;
         // }
          ?>              

            </div>
            <!-- <div class="w3-col l9 w3-border" style="height: 200px"></div>
              <div class="w3-col l3 w3-border" style="height: 200px"></div> -->

            <div class="w3-col l3 w3-padding">

              <div>
                <div><b>Skills</b></div>
                <div class="skill"></div>
              </div>
              <div class="small_search">
                <div style="display:inline">
                  <form>
                    <select class="latest_search" id="term" name="allSkill">
                    </select>
                    <i class="fa fa-plus-circle" style="font-size:20px;" name='usrname' id="hit"></i>
                  </form>
                </div>
              </div>
              <div class="budget">
                <div style="display:inline">
                  <div><b>Budget &nbsp;&nbsp;&nbsp;<span id="demo"></span></b></div>
                  <div class="slidecontainer"><input type="range" min="1" max="100" value="1" class="slider" id="myRange"></div>
                  <div><p>Range 0-2500000</p></div>
                  <button type="button" class="view_button" name="showData">Show Project</button>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>

      </div>
    </div>      

        <script>
 //  var today = new Date();
 //    var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

 //    function setCookie(name, value)
 //    {
 //      document.cookie=name + "=" + escape(value) + "; path=/; expires=" + expiry.toGMTString();
 //    }
 //  function putCookie(form)
 //                  //this should set the UserName cookie to the proper value;
 //    {
 //     setCookie("userName", form[0].usrname.value);
 //     alert("hiiii");
 //      return true;
 //    }
//  </script>
</body>
</html>
