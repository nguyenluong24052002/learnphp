






(function($){

    /******************************
     * 詳細POPUP
     *****************************/
        $('.item_detail').bind('click', function(){
            var text = $(this).parent().find('.popup_data').html();
            $('.popup_box').html(text);
            $('.cover').show();
            $('.popup').fadeIn();
        });
    
        $('.cover, .close').bind('click', function(){
            $('.popup_box').html('');
            $('.popup').hide();
            $('.cover').fadeOut();
        });
    
    
    /******************************
     * ヘッダーのユーザー選択でページ遷移
     *****************************/
        $(document).ajaxStop(function() {
    
            $('.header_user select').change(function(){
                var val = $(this).val();
                if(val >= 1 && val <= 998){
                    location.href = 'https://s-plat.info/cart-test/cart-lunch_p2.html';
                }else if(val == 999){
                    location.href = 'https://s-plat.info/cart-test/cart-lunch_p2_3.html';
                }
            });
    
        });
    
    /******************************
     * お知らせPOPUP
     *****************************/
        $(document).ajaxStop(function() {
    
            $('.news_icon').bind('click', function(){
                $('.news_cover').show();
                $('.news_popup').fadeIn();
            });
    
            $('.news_cover, .news_close').bind('click', function(){
                $('.popup_box').html('');
                $('.news_popup').hide();
                $('.news_cover').fadeOut();
            });
    
        });
    
    
    /******************************
     * 商品数の増減
     *****************************/
        $(document).ajaxStop(function() {
    
            $('.order_item_addition').bind('click', function(){
                var num = $(this).parents('.grid_box').find('.item_num');
                num.text(Number(num.text()) + 1)
            });
    
            $('.order_item_delete').bind('click', function(){
                var num = $(this).parents('.grid_box').find('.item_num');
                var num2 = 0;
                if(Number(num.text()) > 0){
                    num2 = Number(num.text()) - 1;
                }
                num.text(num2)
            });
    
    
        });
    
    /******************************
     * 注文商品 : 増減可能フィールドの処理
     *****************************/
    
    
    $(document).on("click", ".addition_btn.on", function() {
        var parts = $(this).parents('.order_item_box_container');
        parts.clone(true).appendTo(parts.parents('.order_item_box'));
    });
    /**/$(document).on("click", ".addition_btn.off", function() {
        var target = $(this).parents('.order_item_box').find('.order_item_box_container:last-child');
            target.remove();
    });
    
    
    /******************************
     * 注文履歴・「月次」帳票 : 絞り込み
     *****************************/
    
        $('.filter_item_box').bind('click', function(){
            $(this).toggleClass('active');
        });
    
    
    /******************************
     * お客様登録 : 商品引渡し先の選択肢によりフォーム内容を切り替え
     *****************************/
              var val = $('input[name="destination"]:checked').val();
              $('#company_form,#school_form,#home_form').removeClass('active');
              if(val == 'company'){
                $("#company_form").addClass('active');
              }else if(val == 'school'){
                $("#school_form").addClass('active');
              }else if(val == 'home'){
                $("#home_form").addClass('active');
              }
    
              $('input[name="destination"]').change(function(){
                var val = $(this).val();
                $('#company_form,#school_form,#home_form').removeClass('active');
                if(val == 'company'){
                  $("#company_form").addClass('active');
                }else if(val == 'school'){
                  $("#school_form").addClass('active');
                }else if(val == 'home'){
                  $("#home_form").addClass('active');
                }
              });
    
    
    /******************************
     * お客様登録 : 増減可能フィールドの処理
     *****************************/
    
            $('.group_off').addClass('active');
              $('.group_on').bind('click', function(){
                $(this).removeClass('active');
                $('.group_off').addClass('active');
                $(this).parents('.active').find('.group_register').hide();
              });
              $('.group_off').bind('click', function(){
                $(this).removeClass('active');
                $('.group_on').addClass('active');
                $(this).parents('.active').find('.group_register').show();
              });
    
              /* 「会社・勤務地」 */
            $(document).on("click", ".company_group_addition", function() {
                $(this).parents('.group_register_box').clone(true).appendTo($('.group_register'));
                $('.group_register .group_register_box:last-child input').val('');
                var i = 1;
                $('.group_register .group_register_box .group_company_companyname').prop('name', function(){
                    $(this).attr('name', 'group_company_companyname_' + i);
                    i++;
                });
                var j = 1;
                $('.group_register .group_register_box .group_company_department').prop('name', function(){
                    $(this).attr('name', 'group_company_department_' + j);
                    j++;
                });
                var k = 1;
                $('.group_register .group_register_box .group_company_name').prop('name', function(){
                    $(this).attr('name', 'group_company_name_' + k);
                    k++;
                });
                var l = 1;
                $('.group_register .group_register_box .group_company_place').prop('name', function(){
                    $(this).attr('name', 'group_company_place_' + l);
                    l++;
                });
                var m = 1;
                $('.group_register .group_register_box .group_company_tel').prop('name', function(){
                    $(this).attr('name', 'group_company_tel_' + m);
                    m++;
                });
                var n = 1;
                $('.group_register .group_register_box .group_company_email').prop('name', function(){
                    $(this).attr('name', 'group_company_email_' + n);
                    n++;
                });
                var o = 1;
                $('.group_register .group_register_box .group_company_pass').prop('name', function(){
                    $(this).attr('name', 'group_company_pass_' + o);
                    o++;
                });
            });
            $(document).on("click", ".company_group_delete", function() {
                var target = $(this).parents('.group_register_box');
                if (target.parent().children().length > 1) {
                    target.remove();
                }
                var i = 1;
                $('.group_register .group_register_box .group_company_companyname').prop('name', function(){
                    $(this).attr('name', 'group_company_companyname_' + i);
                    i++;
                });
                var j = 1;
                $('.group_register .group_register_box .group_company_department').prop('name', function(){
                    $(this).attr('name', 'group_company_department_' + j);
                    j++;
                });
                var k = 1;
                $('.group_register .group_register_box .group_company_name').prop('name', function(){
                    $(this).attr('name', 'group_company_name_' + k);
                    k++;
                });
                var l = 1;
                $('.group_register .group_register_box .group_company_place').prop('name', function(){
                    $(this).attr('name', 'group_company_place_' + l);
                    l++;
                });
                var m = 1;
                $('.group_register .group_register_box .group_company_tel').prop('name', function(){
                    $(this).attr('name', 'group_company_tel_' + m);
                    m++;
                });
                var n = 1;
                $('.group_register .group_register_box .group_company_email').prop('name', function(){
                    $(this).attr('name', 'group_company_email_' + n);
                    n++;
                });
                var o = 1;
                $('.group_register .group_register_box .group_company_pass').prop('name', function(){
                    $(this).attr('name', 'group_company_pass_' + o);
                    o++;
                });
            });
    
    
    
    
    
    
              /* 「学校」 */
            $(document).on("click", ".group_addition", function() {
                $(this).parents('.group_register_box').clone(true).appendTo($('.group_register'));
                $('.group_register .group_register_box:last-child input').val('');
                /*var i = 1;
                $('.group_register .group_register_box .group_school').prop('name', function(){
                    $(this).attr('name', 'group_school_' + i);
                    i++;
                });*/
                var j = 1;
                $('.group_register .group_register_box .group_class').prop('name', function(){
                    $(this).attr('name', 'group_class_' + j);
                    j++;
                });
                var k = 1;
                $('.group_register .group_register_box .group_name').prop('name', function(){
                    $(this).attr('name', 'group_name_' + k);
                    k++;
                });
            });
            $(document).on("click", ".group_delete", function() {
                var target = $(this).parents('.group_register_box');
                if (target.parent().children().length > 1) {
                    target.remove();
                }
                /*var i = 1;
                $('.group_register .group_register_box .group_school').prop('name', function(){
                    $(this).attr('name', 'group_school_' + i);
                    i++;
                });*/
                var j = 1;
                $('.group_register .group_register_box .group_class').prop('name', function(){
                    $(this).attr('name', 'group_class_' + j);
                    j++;
                });
                var k = 1;
                $('.group_register .group_register_box .group_name').prop('name', function(){
                    $(this).attr('name', 'group_name_' + k);
                    k++;
                });
            });
    
    
    
    
    
    /******************************
     * 注文者情報の管理 : 商品引渡し先の選択肢によりフォーム内容を切り替え
     *****************************/
    
            $('.order_group_off').addClass('active');
              $('.order_group_on').bind('click', function(){
                $(this).removeClass('active');
                $('.order_group_off').addClass('active');
                $('.order_group_register').hide();
              });
              $('.order_group_off').bind('click', function(){
                $(this).removeClass('active');
                $('.order_group_on').addClass('active');
                $('.order_group_register').show();
              });
    
    
    /******************************
     * 注文者情報の管理 : 増減可能フィールドの処理
     *****************************/
    
    
    $(document).on("click", ".order_group_addition", function() {
        $('.order_group_register').find('.order_group_register_box:last-child').clone(true).appendTo($('.order_group_register_inner'));
        $('.order_group_register .order_group_register_box:last-child input').val('');
        var j = 1;
        $('.order_group_register .order_group_register_box .group_class').prop('name', function(){
            $(this).attr('name', 'group_class_' + j);
            j++;
        });
        var k = 1;
        $('.order_group_register .order_group_register_box .group_name').prop('name', function(){
            $(this).attr('name', 'group_name_' + k);
            k++;
        });
    });
    $(document).on("click", ".order_group_delete", function() {
        var target = $('.order_group_register').find('.order_group_register_box:last-child');
            target.remove();
        var j = 1;
        $('.order_group_register .order_group_register_box .group_class').prop('name', function(){
            $(this).attr('name', 'group_class_' + j);
            j++;
        });
        var k = 1;
        $('.order_group_register .order_group_register_box .group_name').prop('name', function(){
            $(this).attr('name', 'group_name_' + k);
            k++;
        });
    });
    
    
    
    
    
    
    
    
    
    
    
    /******************************
     * TOPへ戻る　ページ内リンク
     *****************************/
    var pagetop = $('#page_top');   
            pagetop.hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {  //100pxスクロールしたら表示
                    pagetop.fadeIn();
                } else {
                    pagetop.fadeOut();
                }
            });
          $('a[href^="#"]').click(function(){
            var time = 500;
            var href= $(this).attr("href");
            var target = $(href == "#" ? 'html' : href);
            var distance = target.offset().top;
            $("html, body").animate({scrollTop:distance}, time, "swing");
            return false;
          });
    
    
    
    $(window).on('load resize', function(){
        
    　if (window.matchMedia('(max-width: 768px)').matches){
        var height = $('.reserve_container').height();
        $('footer').css('padding-bottom', height + 100);
    　}
    
    　if (window.matchMedia('(max-width: 768px)').matches){
        var text = $('.delivery_days').html();
        if(text.length > 15 ){
            text = text.substr(0, 15);
        }
        $('.delivery_days').html(text)
    　}
    
    });
    
    
    
    
    
    
    })(jQuery);
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    