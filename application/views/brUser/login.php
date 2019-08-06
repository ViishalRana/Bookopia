<!DOCTYPE html>
<html>
<head>
  <title>Bookopia</title>
  <base href="<?=base_url();?>">
  <link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon"> 
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="resources2/css/jquery-ui.css">
    <link rel="stylesheet" href="resources2/css/bootstrap.min.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="resources2/js/vendor/notify.js"></script> -->

  <!------ Include the above in your HEAD tag ---------->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style type="text/css">
    msg-error {
      color: #c65848;
    }
    .g-recaptcha.error {
      border: solid 2px #c64848;
      padding: .2em;
      width: 19em;
    }
  </style>

  <title></title>
  <style type="text/css">


    @import url('https://fonts.googleapis.com/css?family=Mukta');
    body{
      font-family: 'Mukta', sans-serif;
      height:100vh;
      min-height:550px;
      /*background-image: url(http://www.planwallpaper.com/static/images/Free-Wallpaper-Nature-Scenes.jpg);*/
      background-repeat: no-repeat;
      background-size:cover;
      background-position:center;
      position:relative;
      /*overflow-y: hidden;*/
    }
    a{
      text-decoration:none;
      color:#444444;
    }
    .login-reg-panel{
      position: relative;
      top: 50%;
      transform: translateY(-50%);
      text-align:center;
      width:70%;
      right:0;left:0;
      margin:auto;
      height:400px;
      /*background-color: rgba(236, 48, 20, 0.9);*/
      background-color: rgba(0, 100, 0, 0.7);
    }
    .white-panel{
      background-color: rgba(255,255, 255, 1);
      position:absolute;
      top:-80px;
      width:50%;
      right:calc(50% - 50px);
      transition:.3s ease-in-out;
      z-index:0;
      box-shadow: 0 0 15px 9px #00000096;
    }
    .login-reg-panel input[type="radio"]  {
      position:relative;
      display:none;
    }

    .login-reg-panel{
      color:#B8B8B8;
    }
    .login-reg-panel #label-login, 
    .login-reg-panel #label-register{
      border:1px solid #9E9E9E;
      padding:5px 5px;
      width:150px;
      display:block;
      text-align:center;
      border-radius:10px;
      cursor:pointer;
      font-weight: 600;
      font-size: 18px;
    }
    .login-info-box{
      width:30%;
      padding:0 50px;
      top:20%;
      left:0;
      position:absolute;
      text-align:left;
    }
    .register-info-box{
      width:30%;
      padding:0 50px;
      top:20%;
      right:0;
      position:absolute;
      text-align:left;

    }
    .right-log{right:50px !important;}

    .login-show, 
    .register-show{
      z-index: 1;
      display:none;
      opacity:0;
      transition:0.3s ease-in-out;
      color:#242424;
      text-align:left;
      padding:50px;
    }
    .show-log-panel{
      display:block;
      opacity:0.9;
    }
    .login-show input[type="text"], .login-show input[type="password"]{
      width: 100%;
      display: block;
      margin:20px 0;
      padding: 10px;
      border: 1px solid #b5b5b5;
      outline: none;
    }
    .login-show input[type="submit"] {
      max-width: 150px;
      width: 100%;
      background: #444444;
      color: #f9f9f9;
      border: none;
      padding: 10px;
      text-transform: uppercase;
      border-radius: 2px;
      float:right;
      cursor:pointer;
    }
    .login-show a{
      display:inline-block;
      padding:10px 0;
    }

    .register-show input[type="text"], .register-show input[type="password"], .register-show input[type="date"]{
      width: 100%;
      display: block;
      margin:20px 0;
      padding: 10px;
      border: 1px solid #b5b5b5;
      outline: none;
    }
    .register-show input[type="submit"] {
      max-width: 150px;
      width: 100%;
      background: #444444;
      color: #f9f9f9;
      border: none;
      padding: 10px;
      text-transform: uppercase;
      border-radius: 2px;
      float:right;
      cursor:pointer;

    }
    .credit {
      position:absolute;
      bottom:10px;
      left:10px;
      color: #3B3B25;
      margin: 0;
      padding: 0;
      font-family: Arial,sans-serif;
      text-transform: uppercase;
      font-size: 12px;
      font-weight: bold;
      letter-spacing: 1px;
      z-index: 99;
    }
/*
.scrolling-wrapper{
overflow-x: scroll;
overflow-y: hidden;
white-space: nowrap;

}*/

a{
  text-decoration:none;
  color:#2c7715;
}
</style>
</head>
<body>
  <?php $date=date("Y-m-d");?>
<?php
  if(isset($error) && !empty($error))
  {
    ?>
    <script type="text/javascript">
      alert("<?=$error?>");
    </script>
    <?php
  }
?>
  <div class="login-reg-panel">

    <div class="login-info-box">
      <h2>Have an account?</h2>
      <!-- <p>Lorem ipsum dolor sit amet</p> -->
      <label id="label-register" for="log-reg-show">Login</label>
      <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked" style="display: none;">
    </div>

    <div class="register-info-box">
      <h2>Don't have an account?</h2>
      <!-- <p>Lorem ipsum dolor sit amet</p> -->
      <label id="label-login" for="log-login-show">Register</label>
      <input type="radio" name="active-log-panel" id="log-login-show" style="display: none;">
    </div>

    <div class="white-panel">
      <form method="post" action="<?=site_url("brUser/LoginC/loginUser")?>">
        <div class="login-show" style="height: 650px;">
          <h2>LOGIN</h2>
          <input type="radio" name="rad" id="radUser" style="display: inline;" value="User" checked>User
          <input type="radio" name="rad" id="radAuthor" style="display: inline;" value="Author">Author
          <input type="text" name="txtEmail" placeholder="Email">
          <input type="password" name="txtPassword" placeholder="Password">
          <input type="submit" name="btnSubmit" value="Login">
          <a href="#" data-toggle="modal" data-target="#myModal">Forgot password?</a>
        </div>
      </form>

      <form method="post" id="registerForm" action="<?=site_url("brUser/LoginC/signup")?>" >
        <div class="register-show" style="height: 800px;">
          <h2 class="regi" id="title1">User Register</h2>

          <div class="row">
            <div class="custom-control custom-radio col-md-3">
              <label>
                <input type="radio" id="radioUser" name="r2" value="User" style="display: inline;" checked>
              User</label>
            </div>

            <div class="custom-control custom-radio col-md-4">
              <label >
                <input type="radio" id="radioAuthor" name="r2" value="Author" style="display: inline;">
              Author</label>
            </div>
          </div>


          <!-- <div id="res"></div> -->
          <input type="text" name="txtFirstName" placeholder="First Name" id="fName" required >
          <input type="text" name="txtLastName" placeholder="Last Name" id="lName" required>
          <input type="text" name="txtEmail" placeholder="Email" id="email" required>
          <input type="password" name="txtPassword" placeholder="Password" id="pass" id="pass" required>
          <input type="password" placeholder="Confirm Password" id="cpass" required>

          <div class="row">
            <!-- <div class="col-md-1"></div> -->
            <div class="custom-control custom-radio col-md-3">
              <label>
                <input type="radio" id="radioMale" name="r1" value="Male" style="display: inline;" checked>
              Male</label>
            </div>

            <div class="custom-control custom-radio col-md-4">
              <label >
                <input type="radio" id="radioFemale" name="r1" value="Female" style="display: inline;">
              Female</label>
            </div>
          </div>

          <input type="date" name="date" class="form-control" value="<?=$date?>">
          <input type="text" name="txtuserContactNo" placeholder="ContactNo" id="cNo" required>

          <div>
            <span class="msg-error error"></span>
            <div id="recaptcha" class="g-recaptcha" data-sitekey="6LfPzacUAAAAAD8V26lwSx5SaUJY1tM79UucY_O_"></div>
          </div>      
          <input type="submit" name="btnRegister" value="Register" id="btn">
        </div>
      </form>
    </div>

  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

      <form method="post" action="<?=site_url("brUser/LoginC/forgetPassword")?>">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Forget Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

            <div class="row formData">
              <div class="col-sm-10">
                <label class="col-sm-2 col-form-label">Name</label>
                <input type="text" name="txtuserName" id="txtuserName" class="form-control" placeholder="Name" style="margin: 10px;width: 450px;" required>
              </div>
            </div>
            <div class="row formData">
              <div class="col-sm-10">
                <label class="col-sm-2 col-form-label">Email</label>
                <input type="text" name="txtuserEmail" id="txtuserEmail" class="form-control" placeholder="Email" style="margin: 10px;width: 450px;" required>
              </div>
            </div>
            <div class="row formData">
              <div class="col-sm-10">
                <label class="col-sm-2 col-form-label">ContactNo</label>
                <input type="text" name="txtuserContactNo" id="txtuserContactNo" class="form-control" placeholder="Contact No" style="margin: 10px;width: 450px;" required>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <div id="res1"></div>
            <button type="button" class="btn btn-primary" name="submit" id="btnSubmit">Send</button>
          </div>
        </div>
      </form>

    </div>
  </div>  
</body>

<script src="resources2/js/vend/jquery.min.js"></script>
<script src="resources2/js/vendor/bootstrap.min.js"></script>
<script src="resources2/js/vendor/notify.js"></script>
<!-- 

<script src="resources2/js/vendor/jquery-library.js"></script>
<script src="resources2/js/vendor/bootstrap.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
<script src="resources2/js/owl.carousel.min.js"></script>
<script src="resources2/js/jquery.vide.min.js"></script>
<script src="resources2/js/countdown.js"></script>
<script src="resources2/js/jquery-ui.js"></script>
<script src="resources2/js/parallax.js"></script>
<script src="resources2/js/countTo.js"></script>
<script src="resources2/js/appear.js"></script>
<script src="resources2/js/gmap3.js"></script>
<script src="resources2/js/main.js"></script> -->

</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
  });


  $('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
      $('.register-info-box').fadeOut(); 
      $('.login-info-box').fadeIn();

      $('.white-panel').addClass('right-log');
      $('.register-show').addClass('show-log-panel');
      $('.login-show').removeClass('show-log-panel');

    }
    else if($('#log-reg-show').is(':checked')) {
      $('.register-info-box').fadeIn();
      $('.login-info-box').fadeOut();

      $('.white-panel').removeClass('right-log');

      $('.login-show').addClass('show-log-panel');
      $('.register-show').removeClass('show-log-panel');
    }
  });

  $("#cpass").blur(function(){
    if($("#pass").val()==$("#cpass").val())
    {
      $("#cpass").notify("Password Match",{position:"top"});   
    }
    else
    {
      $("#cpass").notify("Password Not Match",{position:"top"});
    }
  });

  $("#btnSubmit").click(function(){
    // alert(1);
    var fname=$("#txtuserName").val();
    var email=$("#txtuserEmail").val();
    var contact=$("#txtuserContactNo").val();
    $.ajax(
    {
      type:"POST",
      data:{name:fname,mail:email,cno:contact},
      url: "<?=site_url("brUser/LoginC/forgetPassword/")?>", 
      success: function(result)
      {
       $.notify(result);
       if(result=="Mail sent on your email")
       {
        $.ajax({
          type:"POST",
          data:{name:fname,mail:email},
          url:"<?=site_url("brUser/LoginC/sendMail/")?>",
          success:function(data)
          {
            if(data=="Correct")
            {
              $.notify("Password recovery link is successfully sent to your email");
            }                           
          }
        });
      }
      else
      {
        $.notify("Mail is not sent");
      }
    }
  });
  });

// $("#btn").click(function(){
//  if($('#radioAuthor').is(':checked')) 
//  {
//    alert("we will contact you after verifying your details, Please stay in touch");
//  }
// });

$("#radioAuthor").change(function(){
  if($(this).is(":checked"))
  {
    $("#title1").html("Author Register");
  }
});

$("#radioUser").change(function(){
  if($(this).is(":checked"))
  {
    $("#title1").html("User Register");
  }
});
</script>

<script type="text/javascript">


// function check()
// {
  $("#fName").keyup(function(){
// alert(1);
var regex = new RegExp('^[a-zA-Z]{0,8}$');
var FirstName=$("#fName").val();
// var LastName=$("lName").val();
if(!regex.test(FirstName))
{
// alert("Enter Valid FirstName");    
$("#fName").notify("Enter Proper FirstName",{position:"right"});
// $("#fName").focus();
}
});

  $("#lName").keyup(function(){
// alert(1);
var regex = new RegExp('^[a-zA-Z]{0,15}$');
var LastName=$("#lName").val();
// var LastName=$("lName").val();
if(!regex.test(LastName))
{
// alert("Enter Valid LastName");
$("#lName").notify("Enter Proper LastName",{position:"right"});
}
});

  $("#email").blur(function(){
// alert(1);
var regex = new RegExp('^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$');
var Email=$("#email").val();
// var LastName=$("lName").val();
if(!regex.test(Email))
{
// alert("Enter Valid LastName");
$("#email").notify("Enter Proper Email",{position:"right"});
}
});  

  $("#cNo").blur(function(){
// alert(1);
var regex = new RegExp('^[6-9]{1}[0-9]{9}$');
var contact=$("#cNo").val();
// var LastName=$("lName").val();
if(!regex.test(contact))
{
// alert("Enter Valid LastName");
$("#cNo").notify("Enter Proper ContactNo",{position:"right"});
}
});
// }


// $("#btn").click(function(){
//   var id=$("#registerForm").attr("id");
//   check();
//   $("#registerForm").attr("action","<?=site_url("brUser/LoginC/signup")?>");
// });
</script>

<script type="text/javascript">
  $('#registerForm').submit(function(){
    var $captcha = $('#recaptcha'),
    response = grecaptcha.getResponse();
    if (response.length === 0) 
    {
      $( '.msg-error').text( "reCAPTCHA is mandatory" );
      if( !$captcha.hasClass( "error" ) ){
        $captcha.addClass( "error" );
      }
      return false;
    } 
    else 
    {
      $( '.msg-error' ).text('');
      $captcha.removeClass( "error" );
      if($("#radioAuthor").val()=="Author")
      {
        alert("mail sent");
      }
      return true;
    }
  });
</script>
<!-- <script type="text/javascript">
  $("#forgetModal").click(function(){
    alert(1);
  });
</script> -->