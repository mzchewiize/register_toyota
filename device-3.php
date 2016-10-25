<head>
<?php require_once('config.php');?>
<?php header('Content-Type: text/html; charset=utf-8');?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>ระบบลงทะเบียนเข้าร่วมงาน</title>
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">


<link href="fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css">

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="js/buttons.flash.min.js" type="text/javascript"></script>

<script src="js/pdfmake.min.js" type="text/javascript"></script>

<script src="fancybox/source/jquery.fancybox.js" type="text/javascript"></script>
<script src="js/pdfmake.min.js" type="text/javascript"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<style>
body {
    position: relative;
}
.loading {
    width: 100%;
    height:100%;
    background-color: pink;
    z-index: 999999999;
}
.title ,{
    width: 100%;
    display: inline-block;
    position: relative;
}
.subject,.display_status {
    float: left;
}
.display_status {
    color: green;
    margin-left:30px;
}
.hidden
{
   display: none
}
.blockpage {
    background-color: rgba(83,83,255,0.95);
    position: relative;
    display: inline-block;
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 99999 !important;
}
.display_welcome_box {
    
    height: 350px;
    position: relative;
    background-image: url('toyota/welcome_template.jpg');

}
.toyota_logo {
      position: absolute;
    background-image: url('toyota/logo.png');
    width: 214px;
    height: 178px;
    top: 146px;
    bottom: 10px;
    opacity: 1;
    background-size: cover;
    left: 166px;

}
.registered_people_photo { 
    position: absolute;
    float: right;
    right: 50px;
    display: inline-block;
    float: left;
    width: 200px;
    height: 200px;
    top: 183px;
    background-repeat: no-repeat;
    background-size: contain;
}
.welcome_text {
    position: absolute;
    bottom: 40px;
    margin: 10px;
    font-size: 20px;
    color: red;
}
.display_name {
position: absolute;
    bottom: 200px;
    margin: 10px;
    font-size: 30px;
    text-align: center;
}
.display_sub_name {
       position: absolute;
    top: 328px;
    margin: 127px 0 0 10px;
    font-size: 30px;
    text-align: center;
    line-height: 16px;
}
.submit_area {
       position: absolute;
    bottom: 45px;
    text-align: right;
    right: 25px;
    /* left: 100px; */

}
.cancel_register,.confirm_register {
    padding: 10px;
    margin-left:10px;
}
@media screen and (min-width: 320px) {
    .display_welcome_box {
        width: 280px !important;
    }
    .display_name {
        font-size: 25px;
        left: 0;
        right: 0;
    }
    .display_sub_name {
    font-size: 25px;
        text-align: center;
        width: 80%;
        word-wrap: break-word;
        word-wrap: break-word;
        width: 95%;
        line-height: 1.3;
        text-align: left;
    }   
}
@media screen and (min-width: 768px) {
    .display_welcome_box {
        width: 793px !important;
        background-size: contain;
    }
    .display_name {
        font-size: 67px;
        float: left;
        text-align: center;
        border: 207px;
        right: 261px;
        color: blue;
        text-shadow: 1px 1px;
        top: 342px;
    }
    .registered_people_photo { 
           width: 251px;
    height: 350px;
    margin-top: 159px;
    background-size: cover;
    float: right;
    padding: 10px;

    }
    .display_sub_name {
        font-size: 38px;
        word-wrap: break-word;
        width: 59%;
        line-height: 1.3;
        bottom: 160px;
        left: 48px;
        color: crimson;
        padding: 10px;
        height: 68px;
        text-shadow: 2px 2px;
    }

    .welcome_text {
        top: 31px;
        color: white;
        left: 190px;
        font-size: 22px;
        top: 46px;
    }
    .display_welcome_box {
        background-size: round;
    }


}
</style>

<div class="extraControls">

    <div class="title">
        <div class="subject"><h3>ระบบลงทะเบียนเข้าร่วมงาน</h3></div>
        <div class="display_status"></div>
    </div>
    <?php $members = get_member(); ?>

    <table id="example" class="display" cellspacing="0" width="100%" >
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
             <?php foreach ($members as $member){ ?>
                <tr class="register" data-memberid="<?php echo $member['id'];?>" data-firstname="<?php echo $member['firstname'];?>"
                    data-lastname="<?php echo $member['lastname'];?>" 
                    data-image="<?php echo $member['photo'];?>" 
                    data-memberid="<?php echo $member['id'];?>">
                <td><img src="member/<?php echo $member['photo'];?>" width="200" height="200"/></td>
                <td><?php echo $member['firstname'];?></td>
                <td><?php echo $member['lastname'];?></td>
                <td></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </body>
    </html>
    </div>
</div>

<script>

$(document).ready(function() {
   //$('.fancybox').fancybox();
  //$('body').addClass("loading");
    
    $('#example').DataTable( {
       
    } );

    $('body').on('click','.register' ,function(){
      
        var member_id = $(this).attr('data-memberid');
        var firstname =  $(this).attr('data-firstname');
        var lastname = $(this).attr('data-lastname');
        var photo = $(this).attr('data-image');

         $.fancybox(
                ' <div id="inline1"  class="display_welcome_box" style="height:619px;overflow:hidden;">'+
                '<div class="toyota_logo"></div>'+
                '<div class="registered_people_photo" style="background-image:url(\'member/'+photo+'\');"></div>'+
                '<div class="display_name">ยินดีต้อนรับ</div>'+
                '<div class="display_sub_name">คุณ '+firstname+' '+lastname+'</div>'+
                '<div class="welcome_text">'+
                '    2017 CS STRATEGY : FIGHT TO WIN JDP NO.1'+
                '</div>'+
                '<div class="submit_area">'+
                '<button class="btn btn-info confirm_register">ยืนยันการลงทะเบียน</button>'+
                '<button class="btn btn-danger cancel_register">ยกเลิก</button>'+
                '</div>'+
                '</div>',
                {
                    fitToView: false,
                    padding:15,
                    closeBtn:false,
                    afterLoad: function () {
                        $('body').on('click', '.confirm_register', function () {
                              $.ajax({
                                method: 'POST',
                                url: 'config.php?action=register',
                                data: { 
                                    'member_id' : member_id,
                                    'device' : '3'
                                },
                            }) 
                            .done(function(response) {
                                alert('กำลังดำเนินการ ...... ');
                                parent.location.reload(true);
                                // var url = 'http://api.mzchewiize.com/register/landing.php';
                                // window.location.href=url;
                           });

                        });

                        $('body').on('click', '.cancel_register', function() {
                            $.fancybox.close();
                        });
                    }
                }
            );
    });
});


</script>
