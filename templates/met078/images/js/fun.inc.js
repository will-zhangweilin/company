// 头部导航菜单
function MetinfoNav(m,p,type){
    m.hover(function(){ 
	    overnav($(this),p,type);
	},function(){
	    outnav($(this),p,type);
	});
}

function overnav(dom,p,type){
                var my = dom.find('dl');
		if(my.length > 0){
                var myli = my.find('dd');
                var my_w = dom.outerWidth(true) + p;
                var my_h = dom.outerHeight(true);
                var m_h = type==2?"0px":"auto";
                var m_d = type==3?"none":"block";	
	                my.css({
					    "display" : m_d,
					    "position" : "absolute",
						"height":m_h,
					    "left" : -(p/2),
					    "top" : my_h
					}); 
				var liy = myli.outerHeight(true)*myli.length;
					if(type==2){my.animate({ height:liy },200);}
					if(type==3){my.fadeIn("slow");}	
	            var tallest = 0;
	                myli.each(function() {
		                thisWdith = $(this).outerWidth(true);
		                if(thisWdith > tallest) {
			                tallest = thisWdith;
		                }
	                });
	            var Width = tallest > my_w?tallest:my_w;
				    my.css("width",Width);	
					
        }	
}

function outnav(dom,p,type){
    var my = dom.find('dl');
	if(my.length > 0){
       if(type==2){ my.animate({ height:'0px' },200,function(){ my.css("display","none");});}
	   if(type!=2){ my.removeAttr("style");}
		my.css("display","none");
	}
}

$(function(){
     $('#nav li.class1').hover(
	 function(){$(this).addClass("hover");}
	 ,
	 function(){$(this).removeClass("hover");}
	 );	
	 $('#nav li.home').hover(
	 function(){$(this).addClass("homhover");}
	 ,
	 function(){$(this).removeClass("homhover");}
	 );	
     $('#nav dl.meanu2 dd').hover(
	 function(){$(this).addClass("ddhover");}
	 ,
	 function(){$(this).removeClass("ddhover");}
	 );
});

//鼠标移到图片上显示稍微透明

$(function () {
$('.tupAple img').hover(
function() {$(this).fadeTo("fast", 0.5);},
function() {$(this).fadeTo("fast", 1);
});
});

//首页产品等高

function equalHeight(group) {
	tallest = 0;
	group.each(function() {
		thisHeight = $(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}
$(function() {
	equalHeight($(".dgpro"));   
});

//定义class类函数
function metaddclass(dom,lei){
	if(dom)dom.addClass(lei);
}
//会员中心iftame等高函数
function Iframedom(){  
	var Iframe = $("#iframe");
	var Iframe_Conts = Iframe.contents().find("body");
		Iframe_Conts.css("height","100%");
	var Iframe_div = Iframe_Conts.find("div.main_deng");
	var Iframe_div1 = Iframe_Conts.find("div.main_zhuce");
		Iframe_div.css("margin","0px auto");
		Iframe_div1.css("margin","0px auto");
	var Iframe_Height = Iframe_Conts.outerHeight(true);
		Iframe.height(Iframe_Height);
}
//内页侧导航click函数
function navnow(dom,part2,part3){
	var li = dom.find(".navnow dt[id*='part2_']");
	var dl = li.next("dd.sub");
		dl.hide();
		if(part2.next("dd.sub").length>0)part2.next("dd.sub").show();
		if(part3.length>0)part3.parent('dd.sub').show();
		li.bind('click',function(){
			var fdl = $(this).next("dd.sub");
			if(fdl.length>0){
				fdl.is(':hidden')?fdl.show():fdl.hide();
				fdl.is(':hidden')?$(this).removeClass('launched'):$(this).addClass('launched');
			}
		});
}
//内页侧导航函数
function partnav(c2,c3,jsok){
	var part2 = $('#part2_'+c2);
	var part3 = $('#part3_'+c3);
	metaddclass(part2,'on');
	metaddclass(part3,'on');
	if(jsok==0)$('#sidebar dd.sub').show();
	if(jsok==1)navnow($('#sidebar'),part2,part3);
}

//定义宽度和等高函数

function metaddwdht(dom,p){
	dom.width(dom.find('img').width()+p);
}
function equalHeight(group) {
	tallest = 0;
	group.each(function() {
		thisHeight = $(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}
$(function() {
	equalHeight($("#metimgli li.list"));   
});