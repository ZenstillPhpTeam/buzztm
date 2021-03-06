<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $book['book_name'].' | '.$this->Custom->getBusinessName($book['company']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <?= $this->Html->css(array('swiper.min', 'front_style')) ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!--Code Added for demo start -->
    <?php 
    if(check_file_exists("../webroot/manifest/".$book['book_name'].".json")){
        $manifest_lin_path="http://cms.mybuzztm.com/webroot/manifest/".$book['book_name'].".json";

    }
    else{
        $manifest_lin_path="http://cms.mybuzztm.com/webroot/manifest/manifest.json";
    }

    #echo $manifest_lin_path;
    #echo "/mybuzztm-cms/manifest/".$book['book_name'].".json";

    function check_file_exists($file_name)
    {
        if (file_exists($file_name)) {
            return true;
        } else {
            return false;
        }
    }

    ?> 

    <link rel="manifest" href="<?php echo $manifest_lin_path;?>"/>
    <!--Code Added for demo END-->

    <!-- Demo styles -->
    <style>
    body {width: <?= ($is_mobile) ? 100 : 50; ?>%;}
    .menulist i, .home_icon i{font-size: 25px; cursor: pointer;color:<?= $book['color'] ? $book['color'] : '#fff'?>;}
    .swiper-pagination-bullet{background: <?= $book['color'] ? $book['color'] : '#fdb403'?>;}
    .contact_in{padding:<?= $is_mobile ? '20px' : '25px'; ?> 7px; cursor: pointer;}
    .contact_out .contact_markers, .contact_out .redo_link{padding:<?= $is_mobile ? '18px' : '22px'; ?> 7px; display: inline-block;}
    <?php if($is_mobile){?>
    .page_background_image{position: absolute; width: 100%; height: auto; left: 0; top: 0; }
    <?php }?>
    .contact_floating_icon {transition: all 1s ease 0s;width:25px;max-height: <?php echo $is_mobile ? 76 : 84; ?>px; overflow: hidden;}
    .contact_floating_icon.out{width:<?php echo $is_mobile ? 182 : 106; ?>px;}
    </style>
</head>
<body class="<?= $is_mobile ? 'mobile_view' : 'desktop_view'; ?> ">
    <div class="preloader_image" ng-show="preloader">
        <?php // $this->Html->image('preloader.gif');?>
        <div class="sk-folding-cube">
          <div class="sk-cube1 sk-cube"></div>
          <div class="sk-cube2 sk-cube"></div>
          <div class="sk-cube4 sk-cube"></div>
          <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <div class="dynamic_slider_content">
        <!-- Swiper -->
        <span class="menulist" style="position:absolute; top:<?= $is_mobile ? '2%' : '4%'; ?>;left:5%;z-index:10;">
            <i class="fa fa-bars"></i>
        </span>
        <?php if($book['home_icon']){?>
        <span class="home_icon" style="position:absolute; top:<?= $is_mobile ? '2%' : '4%'; ?>;left:90%;z-index:10;">
            <i class="fa fa-th-large"></i>
        </span>
        <?php }?>
        <?php if($book['floating_dock']){?>
        <span class="contact_floating_icon" style="position:absolute; top:72.00%;left:0%;background:rgb(36,138,0); border-radius: 0 10px 10px 0; z-index: 10">
            <div class="contact contact_out">
                <span class="contact_markers">
                    <span><a href=""><i class="fa fa-map-marker"></i></a></span>
                    <?php if($is_mobile){?>
                    <span><a href="tel:<?= $book['contact'];?>"><i class="fa fa-phone"></i> </a></span>
                    <?php }?>
                </span>
                <span class="redo_link"><a href="javascript:void(0);"><i class="fa fa-caret-left"></i></a></span>
            </div>
            <div class="contact contact_in">
                <span><a href="javascript:void(0);"><i class="fa fa-caret-right"></i></a></span>
            </div>
        </span>
        <?php }?>
        <div style="position: absolute; top: 0px; z-index: 9999; transition-duration: 0.5s; background-color: rgb(255, 255, 255);" class="social_icon leftsocial">
          <div style="width:75px;" class="navbar_icon">
            <button style="border: medium none; padding: 3px 20px; cursor: pointer; background-color: transparent; display: inline-block; margin-top:15px;" class="navbar_btn icon-bar btn_close" type="button"><img style="width: 35px;height: auto;" src="http://mybuzztm.com/wp-content/uploads/2015/12/btn_close1.png"></button>
            <ul style="padding: 0px; text-align: center; position: absolute; top: 48px; display: block;" class="nav head_bar_icon">
              <li><a style="padding: 6px 0px;display:inline-block;" href="?id=mail"><?= $this->Html->image('btn_app.png');?>
               <span style="float: left;width: 100%;color: #222;margin: -5px 0 5px;text-align: center;">App</span>
              </a></li>
              <li><a style="padding: 6px 0px;display:inline-block;" href="?id=mail"><?= $this->Html->image('btn_mylist.png');?>
               <span style="float: left;width: 100%;color: #222;margin: -5px 0 5px;text-align: center;">My List</span>
              </a></li>
              <li>
                    <a style="padding: 6px 0px;display:inline-block;" href="#" class="share_link"><?= $this->Html->image('share.png');?>
                        <span style="float: left;width: 100%;color: #222;margin: -5px 0 5px;text-align: center;">Share</span>
                    </a>
                    <ul>
                        <li><a style="padding: 6px 0px;display: block;" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($book['id'])), $book['slug']], true);?>&amp;title=<?= $book['book_name'].' | '.$this->Custom->getBusinessName($book['company']); ?>"><?= $this->Html->image('btn_facebook.png');?>
                          <span style="float: left;width: 100%;color: #222;margin: -5px 0 5px;text-align: center;">Facebook</span>
                           </a></li>
                        <li><a style="padding: 6px 0px;display:inline-block;" target="_blank" href="https://twitter.com/intent/tweet?text=<?= $book['book_name'].' | '.$this->Custom->getBusinessName($book['company']); ?>&amp;url=<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($book['id'])), $book['slug']], true);?>"><?= $this->Html->image('btn_twitter.png');?>
                           <span style="float: left;width: 100%;color: #222;margin: -5px 0 5px;text-align: center;">Tweet</span>
                          </a>
                        </li>
                        <li><a style="padding: 6px 0px;display:inline-block;" href="#" class="mail_link">
                            <?= $this->Html->image('btn_mail.png');?>
                           <span style="float: left;width: 100%;color: #222;margin: -5px 0 5px;text-align: center;">Mail</span>
                          </a>
                        </li>
                        <div class="mail_form">
                            <div class="form-group" style="padding: 20px;">
                                <label>Email</label>
                                <input type="text" class="form-control mail_link_input">
                            </div>
                        </div>
                    </ul>
              </li>
              <li><a style="padding: 6px 0px;display:inline-block;" href="#" class="social_wall_link"><?= $this->Html->image('social.png');?>
               <span style="float: left;width: 100%;color: #222;margin: -5px 0 5px;text-align: center;">Social</span>
              </a></li>
              <li><a style="padding: 6px 0px;display:inline-block;" href="#" data-copytarget="#copy_link"><?= $this->Html->image('copy.png');?>
               <span style="float: left;width: 100%;color: #222;margin: -5px 0 5px;text-align: center;">Copy</span>
              </a></li>
            </ul>
          </div>
        </div>
        <div class="swiper-container swiper-container-h">
            <div class="swiper-wrapper">
                <?php foreach($page as $k=>$p){ if(!$book['social_wall'] && $p['page'] == 5) continue; ?>
                <div class="swiper-slide page_<?= $p['page']; ?>" data-index="<?= $k;?>">
                    <?php if(count($p['sub_products'])){?>
                    <div class="swiper-container swiper-container-v">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <?= $this->Custom->front_end_template_list($p, $is_mobile, $this->Url); ?>
                            </div>
                            <?php foreach($p['sub_products'] as $p1){?>
                            <div class="swiper-slide">
                                <?= $this->Custom->front_end_template_list($p1, $is_mobile, $this->Url); ?>
                            </div>
                            <?php }?>
                        </div>
                        <div class="swiper-pagination swiper-pagination-v"></div>
                    </div>
                    <?php }else{?>
                        <?= $this->Custom->front_end_template_list($p, $is_mobile, $this->Url); ?>
                    <?php }?>
                </div>
                <?php }  ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-h"></div>
        </div>
        <input type="hidden" id="copy_link" value="<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($book['id'])), $book['slug']], true);?>" />
    </div>
    <!-- Swiper JS -->
    <?= $this->Html->script(array('jquery.min', 'swiper.min')) ?>

    <!-- Initialize Swiper -->
    <script>
    var swiper, swiperV;
    $(document).ready(function(){
        <?php if(!$is_mobile){?>
            $(".page_templates").height($("body").height());
            reswidth = ($("body").height() * 400) / 533;
            $(".page_templates").width(reswidth);
            $("body").width(reswidth);
            /*$(".text2image").each(function(){
                $(this).find("img").attr("src", $(this).find("img").attr("src")+"&sw="+reswidth);
            });*/
        <?php }else{?>
            $(".page_templates").height('100%');
            $(".page_templates").width('100%');

            /*$(".page_background_image").each(function(){
                src = $(this).attr('src');
                imgresizeurl = "<?= $this->Url->build(["controller" => "admin", "action" => "imageResize"], true);?>";
                src = imgresizeurl+'?src='+encodeURIComponent(src)+'&width='+$("body").width()+'&height='+$("body").height();
                $(this).attr('src', src).show();
            });*/
        <?php }?>

        $(".map_template").each(function(){
            $(this).find("iframe").attr("src", $(this).find("iframe").attr("src")+"&height="+( parseFloat($(this).data("height")) * ($("body").height()/100) ));
        });

        $(window).on('resize',function(){window.location.href = window.location.href;});

        
        function initialize_slider(){
            swiperH = new Swiper('.swiper-container-h', {
                pagination: '.swiper-pagination-h',
                paginationClickable: true,
                spaceBetween: 0,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                keyboardControl: true,
                onSlideChangeEnd: function (swiper) {
                    if(swiper.activeIndex != 2)
                        $(".home_icon").show();
                    else
                        $(".home_icon").hide();
                }
            });
            if($(".swiper-container-v").length > 1)
            {
                swiperV = [];
                $(".swiper-container-v").each(function(k, v){
                    $(this).attr("data-index", k);
                    swiperV[k] = new Swiper(this, {
                        pagination: '.swiper-pagination-v',
                        paginationClickable: true,
                        direction: 'vertical',
                        spaceBetween: 0,
                        nextButton: '.swiper-button-vnext',
                        prevButton: '.swiper-button-vprev',
                        keyboardControl: true
                    });
                });
            }
            else
            {
                swiperV = new Swiper('.swiper-container-v', {
                    pagination: '.swiper-pagination-v',
                    paginationClickable: true,
                    direction: 'vertical',
                    spaceBetween: 0,
                    nextButton: '.swiper-button-vnext',
                    prevButton: '.swiper-button-vprev',
                    keyboardControl: true
                });
            }
        }

        $(".home_icon").click(function(){
            swiperH.slideTo($(".page_3").index(), 1000, true);
        });

        $(".menulist").click(function(){
            $(".social_icon").addClass('show_left_menu');
            $(".contact_floating_icon").removeClass("out");
        });
        $(".btn_close").click(function(){
            $(".social_icon").removeClass('show_left_menu');
            $("ul.head_bar_icon ul").removeClass("show_share_links");
        });
        $(".contact_floating_icon .contact_in, .contact_floating_icon .redo_link").click(function(){
            $(".contact_floating_icon").toggleClass("out");
        });
        $(".share_link").click(function(e){
            e.preventDefault();
            $("ul.head_bar_icon ul").toggleClass("show_share_links");
        });
        $(".mail_link").click(function(e){
            e.preventDefault();
            $(".mail_form").slideToggle();
        });
        $(".mail_link_input").bind("keydown", function(event) {
            if(event.which === 13) {
                $.post('<?= $this->Url->build(["controller" => "book", "action" => "send_link"]);?>', 
                    {
                        mail: $(this).val(), 
                        link: '<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($book['id'])), $book['slug']], true);?>',
                        book_name: "<?= $book['book_name'].' | '.$this->Custom->getBusinessName($book['company']); ?>"
                    }
                    , function(res){
                    $(".mail_form").slideToggle();
                });
            }
        });
        $(".social_wall_link").click(function(e){
            e.preventDefault();
            swiperH.slideTo($(".page_5").index(), 1000, true);
        });
        $(".fa-map-marker").click(function(e){
            e.preventDefault();
            swiperH.slideTo($(".page_6").index(), 1000, true);
        });
        $("span[data-link], span[data-external]").click(function(){
            if($(this).data("external"))
            {
                window.open($(this).data("external"), '_blank');
            }
            else if($(this).data("link"))
            {
                links = $(this).data("link");
                if($.isNumeric(links))
                {
                    swiperH.slideTo(links, 1000, true);
                    return;
                }

                links = links.split("-");
                swiperH.slideTo(parseInt(links[0]), 1000, true);
                if(links.length == 2)
                {
                    if($(".swiper-container-v").length > 1)
                    {
                        iiind = $(".swiper-slide[data-index='"+links[0]+"'] .swiper-container-v").data("index");
                        swiperV[iiind].slideTo(parseInt(links[1]) + 1, 1000, true);
                    }
                    else
                        swiperV.slideTo(parseInt(links[1]) + 1, 1000, true);
                }
            }
        });

        $(document).on('click', ".swiper-container", function(){
            $(".social_icon").removeClass('show_left_menu');;
            $("ul.head_bar_icon ul").removeClass("show_share_links");
            $(".contact_floating_icon").removeClass("out");
            $(".mail_form").slideUp();
        });

        setTimeout(function(){
            $("body").addClass('hide_preloader');
            initialize_slider();
        }, 2000);
    });
    </script>
</body>
</html>