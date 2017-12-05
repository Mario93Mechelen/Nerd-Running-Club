/**
 * Created by Mario on 1/12/2017.
 */
$(document).ready(function(){
   $('.week').on('mouseenter',function(){
      $class = $(this).attr('class');
      console.log($class);
       $str = $class.substring($class.indexOf("k")+2);
       console.log($str);
       $str = $str .substring($str.indexOf("k")+1);
       console.log($str);
       $str = $str.charAt(0);
       console.log($str);
           $('#bubble' + $str).has('img').show();

    });
    $('.week').on('mouseleave',function(){
        $('.bubblecontainer').hide();
    });

    $('.badgeText').hide();

    $('.rankingBBadge').on('mouseenter',function(){
        $(this).find('.badgetext').show();

    });

    $('.rankingBBadge').on('mouseleave',function(){
        $('.badgeText').hide();
    });

});