$(function(){
   $('#widgettest').click(function(){
        alert('widget is good!');
   });
});	

//下拉jquery
$(function(){
	$('#mydrop').click(function(){
		var $drop=$(".dropdown-menu");
		if($drop.is(":visible")){
		 $(".dropdown-menu").hide(500);
		}else{
		 $(".dropdown-menu").show(500);
		}
	});
	
});

//点赞jquery特效
$(document).ready(function(e) {
    $('a.zhan').click(function(){
  var left = parseInt($(this).offset().left)+10, top =  parseInt($(this).offset().top)-10, obj=$(this);
  $(this).append('<div id="zhan"><b>+1<\/b></\div>');
  $('#zhan').css({'position':'absolute','z-index':'1', 'color':'#C30','left':left+'px','top':top+'px'}).animate({top:top-10,left:left+10},'slow',function(){
   $(this).fadeIn('fast').remove();
   var Num = parseInt(obj.find('span').text());
       Num++;
    obj.find('span').text(Num);
  });
   return false;
 });
});

//gotoTop  jquery特效
$(function() {
  $(window).scroll(function(){
        var scrolltop=$(this).scrollTop();    
        if(scrolltop>=200){   
            $("#gotoTop").show();
        }else{
            $("#gotoTop").hide();
        }
  });
  //向上滚动   
  $("#elevator").click(function(){
        $("html,body").animate({scrollTop: 0}, 500);  
  });
  //weixin
  $(".qr").hover(function(){
    $(".qr-popup").show();
  },function(){
    $(".qr-popup").hide();
  });

});
