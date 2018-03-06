<!DOCTYPE html>
<html >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Contact Us</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
    <style>
    .jm_btn {
        color: #fff;
        background-color: #1fbea9;
        border-color: #1fbea9;
    }
</style>
</head>
<body>
		<div class="w3-middle" id="spinnerDiv"></div>

	<div class="w3-container bind-main">

		<div class="col-lg-2"></div>
		<div class="w3-col l8">
			<h2 class="w3-margin-left" style="color:#1fbea9">Contact Us</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="well well-sm w3-padding-large">
                            <form class="form-horizontal" id="contact_us_form" name="contact_us_form" role="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group w3-padding">
                                            <label for="name">
                                            Name</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter name" required="required" />
                                        </div>
                                        <div class="form-group w3-padding">
                                            <label for="email">
                                            Email Address</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="required" /></div>
                                        </div>
                                        <div class="form-group w3-padding">
                                            <label for="subject">
                                            Subject</label>
                                            <select id="subject" name="subject" class="form-control" required="required">
                                                <option value="na" selected="">Choose One:</option>
                                                <option value="service">General Customer Service</option>
                                                <option value="suggestions">Suggestions</option>
                                                <option value="product">Product Support</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 w3-padding">
                                        <div class="form-group">
                                            <label for="name">
                                            Message</label>
                                            <textarea name="message" id="message" class="form-control" rows="10" cols="25" required="required"
                                            placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn jm_btn pull-right" # style="" id="btnContactUs">
                                        Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form>
                            <legend><span class="glyphicon glyphicon-globe"></span> About </legend>
                            <address>
                                <strong>JobMandi.</strong><br>
                                795 xxxx xx, xxx 600<br>
                                Pune, India 12312<br>

                            </address>
                            <address>
                                <strong>Customer care</strong><br>
                                <a href="mailto:customercare@jobmandi.com">customercare@jobmandi.com</a>
                            </address>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#contact_us_form").submit(function () {
                dataString = $("#contact_us_form").serialize();
        $("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
           $.ajax({
            type: "POST",
            url: BASE_URL + "content/Contact_us/sendContactEmail",
            //dataType : 'text',
            data: dataString,
                        return: false, //stop the actual form post !important!
                        success: function (data){ 
                            $("#spinnerDiv").html('');
                            $.alert(data);
                        }
                    });



         return false;  //stop the actual form post !important!

     });
        });
    </script>
</body>
</html>