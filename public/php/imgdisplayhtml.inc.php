<?php


function methtml_imgdisplay($type='img'){
global $img_paraimg,$img,$product,$product_paraimg,$lang_BigPicture,$met_url,$met_img_x,$met_img_y,$met_imgdetail_x,$met_imgdetail_y,$met_img_detail,$met_productdetail_x,$met_productdetail_y,$met_product_detail,$lang_displayimg,$lang_defualt,$navurl;

if($type=='product'){
$img_paraimg=$product_paraimg;
$img=$product;
$met_imgdetail_x=$met_productdetail_x;
$met_imgdetail_y=$met_productdetail_y;
$met_img_detail=$met_product_detail;
}
 $metinfoimglist=0;
$pg=0;
if($img['displayimg']!=''){
	$displayimg=explode(',',$img['displayimg']);
	$pg=count($displayimg);
	for($i=0;$i<$pg;$i++){
		$newdisplay=explode('-',$displayimg[$i]);
		$displaylist[$i]['title']=$newdisplay[0];
		$displaylist[$i]['imgurl']=$newdisplay[1];
	}
	if($pg)$metinfoimglist=1;
}
if($metinfoimglist){
switch($met_img_detail){
case 1:
   $metinfo.="<style>\n";
   $metinfo.=".spic{margin:5px;}\n";
   $metinfo.=".spic a img{-moz-opacity:0.5; filter:alpha(opacity=50);border:0px;}\n";
   $metinfo.=".spic a:hover{font-size:9px;}\n";
   $metinfo.=".spic a:hover img{-moz-opacity:0.5; filter:alpha(opacity=100);cursor:hand;}\n";
   $metinfo.="#view_bigimg{ display:block; margin:0px auto;}\n";
   $metinfo.=".smallimg{ margin-top:10px;}\n";
   $metinfo.="</style>\n";
   $metinfo.="<script  LANGUAGE='JavaScript'>\n";
   $metinfo.="function metseeBig(nowimg) {\n";
   $metinfo.="document.getElementById('view_img').src=document.getElementById(nowimg).src;\n";
   $metinfo.="
document.getElementById('view_bigimg').href=document.getElementById(nowimg).src;\n
$('#view_img').attr('width','{$met_imgdetail_x}').attr('height','{$met_imgdetail_y}').attr('oldwidth','{$met_imgdetail_x}').attr('oldheight','{$met_imgdetail_y}').attr('style','');
ResizeImage_metshow($('#view_img'));	
   ";
   $metinfo.="}\n";
   $metinfo.="</script>\n";
   $metinfo.="<span class='info_img' id='imgqwe'><a id='view_bigimg' href='".$img[imgurl]."' title=".$lang_BigPicture." target='_blank'><img id='view_img' border='0' alt='".$img[title]."' title='".$img[title]."' autosize_metshow='yes' width=".$met_imgdetail_x." height=".$met_imgdetail_y." src='".$img[imgurl]."'></a></span>\n";
   $metinfo.="<script type='text/javascript'>";
   $metinfo.="var zoomImagesURI   = '".$met_url."images/zoom/';"; 
   $metinfo.="</script>\n"; 
   $metinfo.="<script src='".$met_url."js/metzoom.js' language='JavaScript' type='text/javascript'></script>\n";
   $metinfo.="<script src='{$navurl}public/js/image.js' type='text/javascript'></script>\n";
   $metinfo.="<script src='".$met_url."js/metzoomHTML.js' language='JavaScript' type='text/javascript'></script>\n";
   $metinfo.="<script type='text/javascript'>	window.onload==setupZoom();	</script>\n";
   $metinfo.="<div class='smallimg' style='text-align:center;'>\n";
	if($displaylist)array_unshift($displaylist,array('title'=>"$img[title]",'imgurl'=>"$img[imgurl]"));
	$i=0;
	foreach($displaylist as $key=>$val){
	$i++;
	$title=$val['title']==''?$lang_displayimg.$i:$val['title'];
   $metinfo.="<span class='spic'><a href='javascript:;' onclick=metseeBig('smallimg".$i."') title='".$title."' style='cursor:pointer'><img border='0'  id='smallimg".$i."' src='".$val['imgurl']."' width='50' height='50' alt='".$title."' title='".$title."' ></a></span>\n";
	}
   $metinfo.="</div>\n";
break;
case 2:
   $metinfo.="
		<script src='{$navurl}public/js/jquery.jqzoom-core.js' type='text/javascript'></script>
		<script src='{$navurl}public/js/image.js' type='text/javascript'></script>
		<link rel='stylesheet' href='{$navurl}public/css/jquery.jqzoom.css' type='text/css'>
		<script type='text/javascript'>
		var imgdetail_x= {$met_imgdetail_x};
		var imgdetail_y= {$met_imgdetail_y};
		$(document).ready(function() {
		var dwef=700-{$met_imgdetail_x};
			$('.jqzoom').jqzoom({
					zoomWidth: dwef,
					zoomHeight:{$met_imgdetail_y},
					xOffset:10,
					yOffset:0,
					zoomType: 'standard',
					lens:true,
					preloadImages: false,
					alwaysOn:false
				});
			
		});
		</script>
   ";
	$dtwidth=$met_productdetail_x + 14;
   $metinfo.="
<div class='clearfix'>
    <div class='clearfix' style='border:1px solid #ccc;'>
        <a href='{$img[imgurl]}' class='jqzoom' rel='gal1'  title='{$img[title]}' >
            <img src='{$img[imgurl]}' alt='{$img[title]}' title='{$img[title]}' id='view_img' autosize_metshow='yes' width='{$met_imgdetail_x}' height='{$met_imgdetail_y}' />
        </a>
    </div>
 <div class='clearfix' style='width:{$met_imgdetail_x}px;'>
	<ul id='thumblist' class='clearfix' >
	<li><a href=\"javascript:void(0);\" rel=\"{gallery: 'gal1', smallimage: '{$img[imgurl]}',largeimage: '{$img[imgurl]}'}\" class='zoomThumbActive'><img src='{$img[imgurls]}' alt='{$img[title]}' /></a></li>
	";
foreach($displaylist as $key=>$val){
	$metinfo.="<li><a href=\"javascript:void(0);\" rel=\"{gallery: 'gal1', smallimage: '{$val[imgurl]}',largeimage: '{$val[imgurl]}'}\"><img src='{$val[imgurl]}' alt='{$val[title]}' /></a></li>";
}
	$metinfo.="</ul></div></div>";
break;
case 3:
if($img[imgurl]<>""){
  $imgurl.=$img[imgurl]."|";
  $imglink.=$img[imgurl]."|";
  $imgtitle.=$img[title]."|";
  }
    $i=0;
	foreach($displaylist as $key=>$val){
	$i++;
	$title=$val['title']==''?$lang_displayimg.$i:$val['title'];
	  $imgurl.=$val['imgurl']."|";
	  $imglink.=$val['imgurl']."|";
	  $imgtitle.=$title."|";
	}
  $imgurl=substr($imgurl, 0, -1);
  $imglink=substr($imglink, 0, -1);
  $imgtitle=substr($imgtitle, 0, -1);
  $metinfo.="<span class='info_img' id='flashcontent01'></span>\n";
  $metinfo.=methtml_flashimg(8,$met_imgdetail_x,$met_imgdetail_y,$imgurl,$imglink,$imgtitle);
break;

case 4:
if($img[imgurl]<>""){
  $imgurl.=$img[imgurl]."|";
  $imglink.=$img[imgurl]."|";
  $imgtitle.=$img[title]."|";
  }
    $i=0;
	foreach($displaylist as $key=>$val){
	$i++;
	$title=$val['title']==''?$lang_displayimg.$i:$val['title'];
	  $imgurl.=$val['imgurl']."|";
	  $imglink.=$val['imgurl']."|";
	  $imgtitle.=$title."|";
	}
  $imgurl=substr($imgurl, 0, -1);
  $imglink=substr($imglink, 0, -1);
  $imgtitle=substr($imgtitle, 0, -1);
  $metinfo.=methtml_flashimg(9,$met_imgdetail_x,$met_imgdetail_y,$imgurl,$imglink,$imgtitle);
break;

case 5:
  $met_imgdetail_x1=$met_imgdetail_x+2;
  $met_imgdetail_y1=$met_imgdetail_y+44;
  $metinfo.="<div class='info_img'>\n";
  $metinfo.="<style type='text/css'>\n";
  $metinfo.=".metinfo_slide { border:1px solid #ccc; padding:3px; MARGIN: 8px 0px; OVERFLOW: hidden; width:".$met_imgdetail_x1."px; height:".$met_imgdetail_y1."px; }\n";
  $metinfo.="#metbimg {	FILTER: progid:DXImageTransform.Microsoft.Fade ( duration=0.5,overlap=1.0 ); overflow:hidden; height:".$met_imgdetail_y."px; }\n";
  $metinfo.="#metbimg img{border:0px;}\n";
  $metinfo.="#metimginfo{ font-weight:bold; font-size:14px; overflow:hidden; line-height:34px; text-align:center; width:35%; float:left;}\n";
  $metinfo.="#metimginfo a{color:#FFFFFF; text-decoration:none;}\n";
  $metinfo.=".metdis { display:block;}	\n";
  $metinfo.=".unmetdis { display:none;}\n";
  $metinfo.="#metsimg { margin:10px 0px 0px 0px; float:right;}\n";
  $metinfo.="#metsimg div{ font-size:12px; background:	#d6d6d6; float:left; width:18px; cursor:pointer; color:#FFFFFF; line-height:18px; margin-right:1px; height:18px; text-align:center;}\n";
  $metinfo.="#metsimg .f1 { background-color:#6f6f6f;}\n";
  $metinfo.=".imgbottom{ background-color:#343434; height:40px; float:left; width:".$met_imgdetail_x."px; margin:1px;}\n";
  $metinfo.="</style>\n";
  $metinfo.="<div class=metinfo_slide>\n";
  $metinfo.="<div id=metbimg>\n";
  if($displaylist)array_unshift($displaylist,array('title'=>'','imgurl'=>"$img[imgurl]"));
    $i=0;
	foreach($displaylist as $key=>$val){
	$i++;
	$title=$val['title']==''?$lang_displayimg.$i:$val['title'];
	$k=$i-1;
  $metdis=($i==1)?'metdis':'unmetdis';
  $metdis1=($i==1)?'':'f1';
  $metinfo.="<div class='".$metdis."' name='f'><A  href='".$val['imgurl']."'  target=_blank ><IMG alt=".$title."  src='".$val['imgurl']."' width='".$met_imgdetail_x."' height='".$met_imgdetail_y."'></A></div>\n";
  $metinfo1.="<div class='".$metdis."' name='f'><A  href='".$val['imgurl']."'   target=_blank >".$title."</A></div>\n";
  $metinfo2.="<div class='".$metdis1."' onclick=metplay(x[".$k."],".$k.") name='f'>".$i."</div>\n";
	}
  $metinfo.="</div>\n";
  $metinfo.="<div class='imgbottom' >\n";
  $metinfo.="<div id='metimginfo'>\n";
  $metinfo.=$metinfo1;
  $metinfo.="</div>\n";
  $metinfo.="<div id=metsimg>\n";
  $metinfo.=$metinfo2;
  $metinfo.="</div>\n";
  $metinfo.="</div>\n";
  $metinfo.="<SCRIPT src='".$met_url."js/imgdisplay5.js' type=text/javascript></SCRIPT>\n";
  $metinfo.="</div>\n";
  $metinfo.="</div>\n";
break;

case 6:
  $met_imgdetail_x1=$met_imgdetail_x/4;
  $met_imgdetail_y1=$met_imgdetail_y/4;
  $metinfo.="
<link rel='stylesheet' href='{$navurl}public/jq-flexslider/flexslider.css' type='text/css'>
<script src='{$navurl}public/jq-flexslider/jquery.flexslider-min.js'></script>
<div id='slider' class='flexslider'>
  <ul class='slides'>";
 $metinfo.="<li><img src='{$img[imgurl]}' alt='{$img[title]}' width='{$met_imgdetail_x}' height='{$met_imgdetail_y}' /></li>";
foreach($displaylist as $key=>$val){
	$metinfo.="<li><img src='{$val[imgurl]}' alt='{$val[title]}' width='{$met_imgdetail_x}' height='{$met_imgdetail_y}' /></li>";
}
  $metinfo.="</ul>
</div>
<div id='carousel' class='flexslider'>
  <ul class='slides'>";
 $metinfo.="<li><img src='{$img[imgurls]}' alt='{$img[title]}' width='{$met_imgdetail_x1}' height='{$met_imgdetail_y1}' /></li>";
foreach($displaylist as $key=>$val){
	$metinfo.="<li><img src='{$val[imgurl]}' alt='{$val[title]}' width='{$met_imgdetail_x1}' height='{$met_imgdetail_y1}' /></li>";
}
  $metinfo.="</ul></div>";
  $metinfo.="<script type='text/javascript'>
  $('#carousel').flexslider({
    animation: \"slide\",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: \"#slider\"
  });
   
  $('#slider').flexslider({
    animation: \"slide\",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: \"#carousel\"
  });
</script>";  
break;
}  

}else{
	if(stristr(PHP_OS,"WIN")){
		$imgurlen=@iconv("utf-8","gbk",$img[imgurl]);
	}else{
		$imgurlen=$img[imgurl];
	}
	$imgarr = getimagesize($imgurlen); 
	$imgxx=$imgarr[0]/$imgarr[1];
	$imgyy=$met_imgdetail_x/$met_imgdetail_y;
	if($imgxx>$imgyy){
	$met_imgdetail_y=$imgarr[1]*($met_imgdetail_x/$imgarr[0]);
	$met_imgdetail_x=$met_imgdetail_x;
	}else{
	$met_imgdetail_x=$imgarr[0]*($met_imgdetail_y/$imgarr[1]);
	$met_imgdetail_y=$met_imgdetail_y;
	}
	$metinfo.="<span class='info_img' id='imgqwe'><a href='".$img[imgurl]."' title=".$lang_BigPicture." target='_blank'><img src=".$img[imgurl]." alt='".$img[title]."' title='".$img[title]."' width=".$met_imgdetail_x." height=".$met_imgdetail_y."  /></a></span>\n";
	$metinfo.="<script type='text/javascript'>";
	$metinfo.="var zoomImagesURI   = '".$met_url."images/zoom/';"; 
	$metinfo.="</script>\n"; 
	$metinfo.="<script src='".$met_url."js/metzoom.js' language='JavaScript' type='text/javascript'></script>\n";
	$metinfo.="<script src='".$met_url."js/metzoomHTML.js' language='JavaScript' type='text/javascript'></script>\n";
	$metinfo.="<script type='text/javascript'>	window.onload==setupZoom();	</script>\n";
}
return $metinfo;
}

?>