$('.tooltip_btn').tooltip({
    selector: "a[rel=tooltip]"
}) ;

$('.product-list').tooltip({
    selector: "a[rel=popover]"
}) ;

jQuery('body').on('click','a[rel=popover]',function(){
    var ajaxid = this.id ;
    var url = '/index.php?r=main/buy&numiid='+ajaxid ;
    if($('#productCount').length) {
        var pCount = $('#productCount').val() ;
        url = url+'&count='+pCount;
    }
    jQuery.ajax({
        'type':'GET',
        'data':{'update':true},
        'url': url,
        'cache':false,
        'success':function(html){
            $('#cartContainer').data('refresh', true) ; // флаг - можно обновить аяксом cartTips
            jQuery("#cart-count").html(html)
        }
    });
    return false;
});

$(function(){
    $('#cartContainer').data('refresh', true) ;
    $('#cartContainer').bind('mouseenter', function(){
        show_cart_tips() ;
    }) ;

    function show_cart_tips(){
        if($('#cartContainer').data('refresh')){
            $.ajax({
                url:'/index.php?r=main/cart/carttips',
                type:'POST',
                dataType:'JSON',
                data:{},
                beforeSend:function(){
                    $('#cartTips').remove();
                    var html = '<div id="cartTips" class="cartTips">' +
                        '       <div class="popoverbottom">' +
                        '           <div class="popover-content">' +
                        '               <div class="loading-wrap">' +
                        '                   <div class="loader"></div>' +
                        '               </div>' +
                        '           </div>' +
                        '       </div>' +
                        '       </div>';
                    $('#cartLink').after(html);
                },
                success: function(data){
                    $('#cartContainer').data('refresh', false) ;
                    if(data.type=='success') {
                        $('#cartTips').remove();//для начала удаляем к ебеням всплывашку
                        $('#cartLink').after(data.html);
                    }
                },
                error:function(){}
            }) ;
        } ;
    } ;




    //стрелка вверх :)
    $('#arrupmain').click(function(){
        $(window).scrollTop(0);
    })
    $(window).scroll(function(e){
        var offset = $(window).scrollTop();

        if (offset > 300) {
            $('#arrupmain').addClass('showing');
        }
        else
        {
            $('#arrupmain').removeClass('showing');
        }
    });
});

