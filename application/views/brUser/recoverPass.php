<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->

    <!-- Title -->
    <title>Bookopia</title>
    <base href="<?=base_url();?>">
    <link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon">   
    <style type="text/css">
        body{
            font-size:18px;
        }
        .form-gap {
            padding-top: 70px;
        }
        .pass_show{position: relative} 

        .pass_show .ptxt { 

            position: absolute; 

            top: 50%; 

            right: 10px; 

            z-index: 1; 

            color: #f36c01; 

            margin-top: -10px; 

            cursor: pointer; 

            transition: .3s ease all; 

        } 

        .pass_show .ptxt:hover{color: #333333;} 

        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }

        .container{
            padding-top:50px;
            margin: auto;
        }
    </style>
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">

    <!-- CSS Stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="css/font-awesome.css" rel="stylesheet"><!-- font awesome -->
    <link href="css/jquery.countdown.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet"><!--  template structure css -->

    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900%7CPT+Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default" style="height:400px;width:350px;">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center" style="font-size:24px;">Recover Password</h2>
                            <p style="font-size:12px;">You can reset your password here.</p>
                            <div class="panel-body">

                                <form id="register-form" action="<?=site_url('brUser/RecoverPassC/chngPass/'.$userFirstName)?>" class="form" method="post">

                                    <div class="pt-3 form-group">
                                        <div class="form-group pass_show"> 
                                            <input type="password" class="form-control" name="npass" id="newPass" placeholder="New Password"> 
                                            <span toggle="#newPass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div> 
                                    </div>

                                    <div class="pt-3 pb-3 form-group">
                                        <div class="form-group pass_show">
                                            <input type="password" class="form-control" name="cpass" id="confirmPass" placeholder="Confirm Password">   
                                            <span toggle="#confirmPass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div id="pass"></div> 
                                    </div>

                                    <div class="form-group">
                                        <input name="btnsubmit" id="btnsubmit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value=""> 
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <?php include_once("script.php");?> -->
</body>
</html>

<script type="text/javascript">
/*    $(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});


$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
*/


$("#confirmPass, #newPass").keyup(function(){
    if($("#confirmPass").val() != "" && $("#newPass").val() != "")
    {   
        if($("#newPass").val() == $("#confirmPass").val())
        {
            $("#pass").html("Password matched");        
            $("#btnsubmit").removeAttr("disabled");
        }
        else
        {
            $("#pass").html("Password doesn't match");
            $("#btnsubmit").attr("disabled",true);
        }
    }
});

/*$("#newPass").keyup(function(){   
if($("#confirmPass").val() != "")
{
if($("#newPass").val() == $("#confirmPass").val())
{
$("#pass").html("Password matched");        
$("#btnsubmit").removeAttr("disabled");
}
else
{
$("#pass").html("Password doesn't match");
$("#btnsubmit").attr("disabled",true);
}
}
});*/

$(".toggle-password").click(function() 
{
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
</script>