<head>
<?php require_once('config.php');?>
<meta charset="utf-8">
<meta http-equiv="refresh" content="20; URL=http://api.mzchewiize.com/register/landing.php">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>ระบบลงทะเบียนเข้าร่วมงาน</title>
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css">

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.dataTables.js" type="text/javascript"></script>
<script src="fancybox/source/jquery.fancybox.js" type="text/javascript"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<style>
.landing_body {
    background-image: url('toyota/welcome_template.jpg');
    width: 100%;
    height: 100%;
    background-repeat: repeat;
    background-size: cover;
    position: relative;
}
.welcome_text {
    left: 348px;
    position: absolute;
    top: 102px;
    color: white;
    font-size: 40px;
}
.display_name {
position: absolute;
    bottom: 200;
    left: 400;
    font-size: 56px;
    color: blue;
}
.display_sub_name {
    position: absolute;
    bottom: 100px;
    left: 300;
    font-size: 50;
    color: red;
}
.registered_people_photo {
       position: absolute;
    float: right;
    right: 200px;
    display: inline-block;
    float: left;
    width: 400px;
    height: 400px;
    top: 269px;
    background-repeat: no-repeat;
    background-size: contain;
}
.toyota_logo {
      position: absolute;
    background-image: url('toyota/logo.png');
    width: 482px;
    height: 400px;
    top: 280;
    bottom: 10px;
    opacity: 1;
    background-size: cover;
    left: 460px;
}
</style>
<?php
header('Content-Type: text/html; charset=utf-8');
require_once('wpdb.php');
global $vars;
$sql = "SELECT * FROM  `member` WHERE `created` !='' ORDER BY  `created` DESC  LIMIT 1";
$result = mysql_query($sql);
while($rows = mysql_fetch_array($result)) { $_display[] = $rows; }
print_r($_display);
if(empty($_display)) { ?>
<div class="landing_body">
</div>
     <div id="inline1"  class="display_welcome_box">
    <div class="toyota_logo"></div>
    <div class="registered_people_photo" style="background-image:url('member/');"></div>
    <div class="display_name"></div>
    <div class="display_sub_name"></div>
    <div class="welcome_text">
        2017 CS STRATEGY : FIGHT TO WIN JDP NO.1
    </div>
<?php } else { ?>
    <div class="landing_body">
     <div id="inline1"  class="display_welcome_box">
    <div class="">
    <div class="registered_people_photo" style="background-image:url('member/<?php echo $_display[0]['photo'];?>');"></div>
    <div class="display_name">ยินดีต้อนรับ</div>
    <div class="display_sub_name">คุณ <?php echo $_display[0]['firstname'] .' '.$_display[0]['lastname'];?> </div>
    <div class="welcome_text">
        2017 CS STRATEGY : FIGHT TO WIN JDP NO.1
    </div>
    <?php 
    }
 ?>
</div>
 <?php echo date('Y-m-d H:i:s');?>
</div>

