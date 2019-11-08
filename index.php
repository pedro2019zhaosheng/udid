<?php
session_start();
$UDID =  $_GET['UDID'] ? $_GET['UDID'] : $_POST['UDID'];
$_SESSION['apple_id'] = $_GET['apple_id']!=''?$_GET['apple_id']:$_SESSION['apple_id'];
$_SESSION['package_id'] = $_GET['package_id']!=''?$_GET['package_id']:$_SESSION['package_id'];
$_SESSION['udid'] = $_GET['UDID']!=''?$_GET['UDID']:$_SESSION['udid'];
$apple_id = $_SESSION['apple_id'];
$package_id = $_SESSION['package_id'];
$udid = $_SESSION['udid'];


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" name="viewport" id="viewport" />
 <script src="clipboard.min.js"></script>

<title>Test make ipa</title>
<style type="text/css">
body {
	margin: 0;
    padding: 0;
    color: #333;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857;
}
#content {
    width: 96%;
    padding: 0px 0;
	margin: 0 auto;
    text-align: center;
}

#header{
	background-color: #1aa79a;
    height: 120px;
	margin: 0;
    padding: 0;
    color: white;
    font-size: 50px;
    padding-top: 40px;
    text-align: center;
}
#showText{
    font-size: 18px;
    width: 100%;
    padding:0;
    height:40px;
    /* text-align: center; */
}
.udid-intro {
    color: #8c9293;
    line-height: 24px;
}
#footer{
	border-top: 1px solid #979797;
    font-family: "Roboto Slab","Helvetica Neue",Helvetica,"Hiragino Sans GB",Arial,sans-serif;
    margin-top: 50px;
    padding-bottom: 70px;
    padding-top: 30px;
    text-align: center;

}
.buttons{
	background: #1AA79A none repeat scroll 0 0;
    border: 1px solid #777;
    border-radius: 8px;
    box-shadow: 0 -1px 3px rgba(255, 255, 255, 0.5) inset, 0 2px 2px rgba(0, 0, 0, 0.2);
    color: #fff;
    cursor: pointer;
    font-family: "Microsoft Yahei",Arial,Tahoma,sans-serif;
    font-size: 14px;
    font-style: normal;
    font-weight: bold;
    padding: 8px 12px;
    margin-left:10px;
    text-decoration: none;
    text-shadow: -1px -1px rgba(0, 0, 0, 0.1), 0 0 15px rgba(255, 255, 255, 0.75);
    text-transform: none;
    white-space: nowrap;

}
</style>

</head>
<body>
<div id="header">
	IPA
</div>


<div id="content">
<br><br>

<input  name="" id="showText" placeholder="点击获取UDID即可获取"  value="<?php echo $UDID;?>" /> 

<br><br>

<!--<a class="buttons" href="udid.mobileconfig" target="_blank">获取UDID</a>
<a class="buttons" id="copyButton" data-clipboard-target="#showText">拷贝UDID</a>-->
 <!--a href="itms-services://?action=download-manifest&url=https://test.daoyuancloud.com/install_ipa/9efa99314d8da5632a37dfa2abad6ac5cedb715e_20191106090207.plist" > 
      点击安装IPA
   </a>

<a href = "http://49.235.90.84:8893/api/apple/generatePackage?udid=<?php echo $udid;?>&apple_id=<?php echo $apple_id?>&package_id=<?php echo $package_id?>">test</a>
-->
<input type="hidden" id='api' value="http://49.235.90.84:8893/api/apple/generatePackage?udid=<?php echo $udid;?>&apple_id=<?php echo $apple_id?>&package_id=<?php echo $package_id?>">

<br><br>

<!--<p class="udid-intro">UDID 是一种 iOS 设备的特殊识别码。除序号之外，每台 iOS 装置都另有一组独一无二的号码，我们就称之为识别码（ Unique Device Identifier, UDID ）。就像我们的身份证一样。开发者需要知道你的 UDID，才可以让你的手机安装访问测试中的应用，就像需要你的身份证才可以让你登机一样 :)</p>-->

<p class='udid-intro'></p>
<!-- <a class="buttons" href="xxapp://?function=valid&uuid=<?php echo $UDID;?>&secret=dhasdjh5521673hghdsah">2.验证ipa</a> -->

<br>

<!--<img src="qr.png" width ="200">-->
	
</div>
<div id="footer">
@Pedro
</div>
</body>

<script type="text/javascript">
	var udid = document.getElementById('showText').value;
	if(!udid){
		var host = 'https://'+document.domain;
		window.location.href= host+'/udid/udid.mobileconfig';
	}else{
		var host = document.getElementById("api").value;
		window.location.href= host;
	}
        //init
     var clipboard = new ClipboardJS('#copyButton');
    //优雅降级:safari 版本号>=10,提示复制成功;否则提示需在文字选中后，手动选择“拷贝”进行复制
    clipboard.on('success', function(e) {
        alert('复制成功!')
        e.clearSelection();
    });
    clipboard.on('error', function(e) {
        alert('请选择“拷贝”进行复制!')
    });
 </script>
</html>
