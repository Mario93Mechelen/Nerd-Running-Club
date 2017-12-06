/**
 * Created by Mario on 1/12/2017.
 */
$(document).ready(function(){

        var classname="";
        var show = false;
   $('.week').on('mouseenter',function(){
       $('.bubblecontainer').css("display","none");
      classname = $(this).attr('class');
      $position = $(this).position();
      console.log($position);
       $str = classname.substring(classname.indexOf("k")+2);
       $str = $str .substring($str.indexOf("k")+1);
       $str = $str.charAt(0);
       classname=$str;

       setTimeout(function () {
           $('.bubblecontainer#bubble' + classname).has('img').fadeIn();
       }, 250);

       $('.bubblecontainer#bubble'+$str).has('img').css('left',$position.left-110);
       $('.bubblecontainer#bubble'+$str).has('img').css('top',$position.top+55);
   });

    $('.week').on('mouseleave',function(){
        setTimeout(function () {
            if(!show) {
                $('.bubblecontainer#bubble' + classname).has('img').fadeOut();
            }
        }, 250);
        console.log(classname);
    });

    $('.bubblecontainer').on('mouseenter', function(){
       show=true;
       console.log(show, classname);
    });

    $('.bubblecontainer').on('mouseleave', function(){
        show=false;
        $('.bubblecontainer#bubble' + classname).has('img').fadeOut();
        console.log(show, classname);
    })

    $('.badgeText').hide();

    $('.rankingBBadge').on('mouseenter',function(){
        $(this).find('.badgeText').show();

    });

    $('.rankingBBadge').on('mouseleave',function(){
        $('.badgeText').hide();
    });

});