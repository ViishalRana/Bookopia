<!DOCTYPE html>
<html>
<head>
  <title>Bookopia</title>
  <base href="<?=base_url();?>">
  <link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon"> 
    <link rel="stylesheet" type="text/css" href="resources/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="resources/assets/icon/font-awesome/css/font-awesome.min.css">

</head>
<style type="text/css">
  /* Chat containers */
.container {
  border: 2px solid #dedede;
  background-color: #d6f5d6;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  width: 700px;
}

/* Darker chat container */
.darker {
  border-color: #ccc;
  background-color: #6fdc6f;
}

/* Clear floats */
.container::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

/* Style time text */
.time-right {
  float: right;
  color: #aaa;
}

/* Style time text */
.time-left {
  float: left;
  color: #999;
}
#top,
#bottom {
    position: fixed;
    left: 0;
    right: 0;
}

#top {
    top: 0;
    height: 80%;
    overflow-x: scroll;
}

#bottom {
    bottom: 0;
    background-color: white;
    height: 20%;

}
button:disabled,
button[disabled]{
  border: 1px solid #999999;
  background-color: #cccccc;
  color: #666666;
}
.blink_me{
  animation: blinker 1s linear infinite;
    color: red;
  }
@keyframes blinker {
  50%{
    opacity:0;
  }
}
</style>
<body>
<div class="card" id="top" align="center">
  <div class="card-header">
    <?php
      if($livesessiondata->status==1)
      {
        ?>
        <div style="color: grey;" id="gm" hidden>LIVE</div>
        <div class="blink_me" id="bm"><i class="fa fa-dot-circle-o"></i> LIVE</div>
        <?php
      }
      else
      {
        ?>
        <div style="color: grey;">LIVE</div>
        <?php
      }
    ?>
    <h4><?="Started By: ".$livesessiondata->userData->authorFirstName." ".$livesessiondata->userData->authorFirstName?></h4>
    <h6><?=$livesessiondata->createdDate?></h6>
  </div>
  <div class="card-body" id="chatbody">
    <?php
      foreach ($livesessionchats as $key) {
                  if($key->senderType=="User")
          {
            $username=$key->userData->userFirstName." ".$key->userData->userLastName;
            $img=$key->userData->userPhoto;
          }
          else
          {
            $username=$key->userData->authorFirstName." ".$key->userData->authorLastName;
            $img=$key->userData->authorPhoto;            
          }
          if($livesessiondata->authorID==$key->senderID && $key->senderType=="Author")
          {
            $c="";
            $class="";
            $time="right";
            $float="style='float:left;word-break:break-word;'";
          }
          else
          {
              $c="darker"; 
              $class="right";
              $time="left";
              $float="style='float:right;word-break:break-word;'";
          }
        ?>

          <div class="container <?=$c?>">
            <img src="<?=base_url("upload/$img")?>" alt="Avatar" class="<?=$class?>">
            <p <?=$float?>><?=$key->sentMessage?></p>
            <span class="time-<?=$time?>"><?=$key->sentDate?></span>
          </div>
          
        <?php
      }
    ?>        
  </div>
</div>

  <div id="bottom" align="center">
    <div>
        <input type="text" id="txtchatmsg" name="txtchatmsg" style="width: 50%;height: 40px;margin-top: 15px;margin-bottom: 15px;">
        <button type="button" id="btnsend" name="btnsend" class="btn btn-success btn-round waves-effect waves-light" <?php if($livesessiondata->status==1){echo "";}else{echo "disabled";}?>>Send <i class="fa fa-send-o"></i></button>
    </div>
  </div>
</body>
</html>
  <script src="resources2/js/vendor/jquery-library.js"></script>
<script type="text/javascript"> 
  $(document).ready(function(){
    $("#chatbody").animate({ scrollTop: $('#chatbody').prop("scrollHeight")}, 1000);
  });
  $("#btnsend").click(function(){
    var chatmsg=$("#txtchatmsg").val();
    if(chatmsg!="")
    {
        $.ajax({type:"POST",data:{msg: chatmsg},url: "<?=site_url('brUser/AuthorC/sendchatmsg/')?>"+<?=$livesessiondata->sessionID?>,success: function(result){
            $("#txtchatmsg").val("");
        }});
    }
  });
        var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        if(dd<10) 
        {
        dd='0'+dd;
        } 

        if(mm<10) 
        {
        mm='0'+mm;
        } 
        today = yyyy+'-'+mm+'-'+dd;
        var dt = new Date();
        hr=dt.getHours();
        m=dt.getMinutes();
        s=dt.getSeconds();
        if(hr<10)
        {
          hr='0'+hr;
        }
        if(m<10)
        {
          m='0'+m;
        }
        if(s<10)
        {
          s='0'+s;
        }
        var time = hr + ":" + m + ":" + s;
        var olt=today+' '+time;
        var olt=encodeURIComponent(olt);

  setInterval(function(){
        $.ajax({url:"<?=site_url('brUser/AuthorC/checkSessionStatus/')?>"+<?=$livesessiondata->sessionID?>,success:function(result){
          if(result==0)
          {
           // alert(result);
            $("#btnsend").attr("disabled","disabled");
            $("#bm").hide();
            $("#gm").show();
          }
          else
          {
            //alert(result);
          }
        }});
        //alert(olt);
    $.ajax({url: "<?=site_url('brUser/AuthorC/loadchat/')?>"+<?=$livesessiondata->sessionID?>+"/"+olt,success :function(result){
        var chatdata=JSON.parse(result);
        $.each(chatdata,function(idx,obj){
          var aid=<?=$livesessiondata->authorID?>;
          if(obj.senderType=="User")
          {
            username=obj.userData.userFirstName+" "+obj.userData.userLastName;
            img=obj.userData.userPhoto;
              c="darker";
              cl="right";
              tm="left";
          var res='<div class="container darker" id="lastdiv"><img src="'+"<?=base_url('upload/')?>"+img+'" alt="Avatar" class="right"><p style="float:right;">'+obj.sentMessage+'</p><span class="time-left">'+obj.sentDate+'</span></div>';
          }
          else
          {
            username=obj.userData.authorFirstName+" "+obj.userData.authorLastName;
            img=obj.userData.authorPhoto;
            if(aid==obj.senderID)
            {
              c="";
              cl="";
              tm="right";
          var res='<div class="container" id="lastdiv"><img src="'+"<?=base_url('upload/')?>"+img+'" alt="Avatar" class=""><p style="float:left">'+obj.sentMessage+'</p><span class="time-right">'+obj.sentDate+'</span></div>';
            }
            else
            {
              c="darker";
              cl="right";
              tm="left";
          var res='<div class="container darker" id="lastdiv"><img src="'+"<?=base_url('upload/')?>"+img+'" alt="Avatar" class="right"><p style="float:right">'+obj.sentMessage+'</p style="float:right;"><span class="time-left">'+obj.sentDate+'</span></div>';

            }          
          }
/*          alert(obj.sessionMessageID+" "+obj.sentMessage+" "+username);
*/          //alert(aid);
          $("#chatbody").append(res); 
        dt = new Date();
        hr=dt.getHours();
        m=dt.getMinutes();
        s=dt.getSeconds();
        if(hr<10)
        {
          hr='0'+hr;
        }
        if(m<10)
        {
          m='0'+m;
        }
        if(s<10)
        {
          s='0'+s;
        }
        time = hr + ":" + m + ":" + s;
        olt=today+' '+time;
        olt=encodeURIComponent(olt);

        });
    }})
  },1500);
</script>