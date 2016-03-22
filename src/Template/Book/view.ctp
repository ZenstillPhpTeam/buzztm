<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $book['book_name'].' | '.$this->Custom->getBusinessName($book['company']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <?= $this->Html->css(array('swiper.min')) ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Demo styles -->
    <style>
    html, body {
        position: relative;
        height: 100%;
        background: #191919;
    }
    body {
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 100%;
        color:#000;
        margin: 0 auto;
        padding: 0;
        width: <?= ($is_mobile) ? 100 : 50; ?>%;
    }
    iframe{border: none;}
    .menulist i, .home_icon i{font-size: 25px; cursor: pointer;color:#fff;}
    .swiper-container {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    .swiper-container-v {
    }
    .swiper-button-prev img, .swiper-button-next img,.swiper-button-vprev img, .swiper-button-vnext img{
        cursor:pointer;
        height:30px;
        width:30px;
        opacity:.8;
    }

    .swiper-pagination.swiper-pagination-h {
        bottom: 0 !important;
        height: 20px;
        left: 0;
        width: 100%;
        background: #000;
    }
    .swiper-pagination.swiper-pagination-v {
        background: #000;
        right:0;
        border-top-left-radius:10px;
        border-bottom-left-radius:10px;
        padding: 8px 4px;
    }
    .swiper-container-horizontal > .swiper-pagination .swiper-pagination-bullet {
        margin: -6px 5px;
    }
    span.swiper-pagination-bullet.swiper-pagination-bullet-active {
        background: #fdb403 none repeat scroll 0 0 !important;
        opacity: 1;
    }
    .swiper-pagination-h .swiper-pagination-bullet {
        background: #fdb403 none repeat scroll 0 0;
        border: 0 solid #fff;
        border-radius: 10px !important;
        display: inline-block;
        height: 4px !important;
        position: relative;
        top: -7px;
        width: 15px !important;
    }
    .swiper-pagination.swiper-pagination-v .swiper-pagination-bullet 
    {
        background: #fdb403 none repeat scroll 0 0;
        border: 0 solid #fff;
        border-radius: 10px !important;
        display: block;
        height: 15px !important;
        width: 4px !important;
        margin:10px 0;
    }
    .swiper-wrapper{ background:#fff;}
    .contact_in{padding:<?= $is_mobile ? '20px' : '25px'; ?> 7px; cursor: pointer;}
    .contact_out .contact_markers, .contact_out .redo_link{padding:<?= $is_mobile ? '18px' : '22px'; ?> 7px; display: inline-block;}
    .contact_out .redo_link{cursor: pointer;}
    .contact_out .contact_markers{background: #175800;}
    .fa-map-marker{ font-size:40px; color:#fff; padding:0 20px;}
    .fa-phone{ font-size:40px; color:#fff; padding:0 20px;}
    .fa-caret-left, .fa-caret-right{  color: #fff;
    display: inline-block;
    font-size: 30px;
    margin-top: 5px;}
    .fa-caret-left{vertical-align: 2px;}
    .home_icon{cursor: pointer;}
    .leftsocial {
        box-shadow: 0 0 15px #000;
        height: 100%;
        position: absolute;
        top: 0;
        transition-duration: 0.5s;
        z-index: 9999;
    }
    .social_icon {
        position: absolute;
        top: 0;
        transition-duration: 1s;
        z-index: 9999;
        display: none;
        background: #fff; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(#fff, #ccc); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#fff, #ccc); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#fff, #ccc); /* For Firefox 3.6 to 15 */
        background: linear-gradient(#fff, #ccc); /* Standard syntax */
    }
    .contact_floating_icon .contact_out{display: none;}
    .contact_floating_icon.out .contact_out{display: block;}
    .contact_floating_icon.out .contact_out span.contact_markers{}
    .contact_floating_icon.out .contact_in{display: none;}
    ul.head_bar_icon {width: 100%; list-style: none;}
    .navbar_icon img{width: 35px; height: auto;}
    ul.head_bar_icon ul{list-style: none; width:240px; position: absolute; overflow: hidden; display: block; margin: 0; padding: 0; transition: all 1s ease 0s; background: #ccc; left: 0; opacity:0; top:0; z-index: -1}
    ul.head_bar_icon > li{position: relative;}
    ul.head_bar_icon ul li{display: inline-block;}
    ul.head_bar_icon ul.show_share_links{left:100%; opacity: 1;z-index: 9999;}
    .mail_form{display: none;}
    .cp{cursor: pointer;}
    .text2image img{max-width: 100%;}
    </style>
</head>
<body class="<?= $is_mobile ? 'mobile_view' : 'desktop_view'; ?> ">
    <!-- Swiper -->
    <span class="menulist" style="position:absolute; top:<?= $is_mobile ? '2%' : '4%'; ?>;left:5%;z-index:10;">
        <i class="fa fa-bars"></i>
    </span>
    <span class="home_icon" style="position:absolute; top:<?= $is_mobile ? '2%' : '4%'; ?>;left:90%;z-index:10;">
        <i class="fa fa-th-large"></i>
    </span>
    <span class="contact_floating_icon" style="position:absolute; top:72.00%;left:0%;background:rgb(36,138,0); border-radius: 0 10px 10px 0; z-index: 10">
        <div class="contact contact_out">
            <span class="contact_markers">
                <span><a href=""><i class="fa fa-map-marker"></i></a></span>
                <?php if($is_mobile){?>
                <span><a href=""><i class="fa fa-phone"></i> </a></span>
                <?php }?>
            </span>
            <span class="redo_link"><a href="javascript:void(0);"><i class="fa fa-caret-left"></i></a></span>
        </div>
        <div class="contact contact_in">
            <span><a href="javascript:void(0);"><i class="fa fa-caret-right"></i></a></span>
        </div>
    </span>
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
            <?php foreach($page as $k=>$p){?>
            <div class="swiper-slide page_<?= $p['page']; ?>" data-index="<?= $k;?>">
                <?php if(count($p['sub_products'])){?>
                <div class="swiper-container swiper-container-v">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= $p['template_attributes']['background']['value']; ?>">
                                <?php foreach($p['template_attributes']['text'] as $t){?>
                                    <span class="text2image <?= ($t['link'] || $t['external_link']) ? 'cp' : ''; ?>" data-link="<?= $t['link']; ?>" data-external="<?= $t['external_link']; ?>" style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;font-size:<?= ((int)$t['font_size'] * 6.25).'%'; ?>;font-weight:<?= $t['bold'] ? 'bold' : 'normal'; ?>;text-align:<?= $t['text_align']; ?>;color:#<?= $t['color']; ?>;width:<?= $t['width']; ?>;">
                                        <img src="<?= $this->Url->build('/admin/text2image/');?>?text=<?= urlencode($t['value']); ?>&width=<?= $t['width']; ?>&color=<?= $t['color']; ?>&bold=<?= $t['bold']; ?>&size=<?= $t['font_size']; ?>&align=<?= $t['text_align']; ?>&lheight=<?= $t['line_height']; ?>" >
                                    </span>
                                <?php } foreach($p['template_attributes']['image'] as $t){?>
                                    <span class="<?= ($t['link'] || $t['external_link']) ? 'cp' : ''; ?>" data-link="<?= $t['link']; ?>" data-external="<?= $t['external_link']; ?>" style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>">
                                        <img width="100%"  height="100%" src="<?= $t['value']; ?>" >
                                    </span>
                                <?php } foreach($p['template_attributes']['video'] as $t){?>
                                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height'];?>;">
                                        <iframe width="100%"  height="100%" src="<?= $t['value']; ?>?modestbranding=1&autohide=1&showinfo=0&controls=0" ></iframe>
                                    </span>
                                <?php } foreach($p['template_attributes']['map'] as $t){?>
                                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height'];?>;">
                                        <iframe width="100%"  height="100%" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAj5h09edjQhvZCnTutWyo18UQpJvcR75U&q=<?= $t['value']; ?>" ></iframe>
                                    </span>
                                <?php }?>
                            </div>
                        </div>
                        <?php foreach($p['sub_products'] as $p1){?>
                        <div class="swiper-slide">
                            <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= $p1['template_attributes']['background']['value']; ?>">
                                <?php foreach($p1['template_attributes']['text'] as $t){?>
                                    <span class="text2image <?= ($t['link'] || $t['external_link']) ? 'cp' : ''; ?>" data-link="<?= $t['link']; ?>" data-external="<?= $t['external_link']; ?>" style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;font-size:<?= ((int)$t['font_size'] * 6.25).'%'; ?>;font-weight:<?= $t['bold'] ? 'bold' : 'normal'; ?>;text-align:<?= $t['text_align']; ?>;color:#<?= $t['color']; ?>;width:<?= $t['width']; ?>;">
                                        <img src="<?= $this->Url->build('/admin/text2image/');?>?text=<?= urlencode($t['value']); ?>&width=<?= $t['width']; ?>&color=<?= $t['color']; ?>&bold=<?= $t['bold']; ?>&size=<?= $t['font_size']; ?>&align=<?= $t['text_align']; ?>&lheight=<?= $t['line_height']; ?>" >
                                    </span>
                                <?php } foreach($p1['template_attributes']['image'] as $t){?>
                                    <span class="<?= ($t['link'] || $t['external_link']) ? 'cp' : ''; ?>" data-link="<?= $t['link']; ?>" data-external="<?= $t['external_link']; ?>" style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height'];?>;">
                                        <img width="100%" height="100%" src="<?= $t['value']; ?>" >
                                    </span>
                                <?php }foreach($p1['template_attributes']['video'] as $t){?>
                                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height'];?>;">
                                        <iframe width="100%"  height="100%" src="<?= $t['value']; ?>?modestbranding=1&autohide=1&showinfo=0&controls=0" ></iframe>
                                    </span>
                                <?php } foreach($p1['template_attributes']['map'] as $t){?>
                                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height'];?>;">
                                        <iframe width="100%"  height="100%" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAj5h09edjQhvZCnTutWyo18UQpJvcR75U&q=<?= $t['value']; ?>" ></iframe>
                                    </span>
                                <?php }?>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="swiper-pagination swiper-pagination-v"></div>
                </div>
                <?php }else{?>
                <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= $p['template_attributes']['background']['value']; ?>">
                    <?php foreach($p['template_attributes']['text'] as $t){?>
                        <span class="text2image <?= ($t['link'] || $t['external_link']) ? 'cp' : ''; ?>" data-link="<?= $t['link']; ?>" data-external="<?= $t['external_link']; ?>" style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;font-size:<?= $t['font_size'] ? ((int)$t['font_size'] * 6.25).'%' : '87.5%'; ?>;font-weight:<?= $t['bold'] ? 'bold' : 'normal'; ?>;text-align:<?= $t['text_align']; ?>;color:#<?= $t['color']; ?>;width:<?= $t['width']; ?>;">
                            <img src="<?= $this->Url->build('/admin/text2image/');?>?text=<?= urlencode($t['value']); ?>&width=<?= $t['width']; ?>&color=<?= $t['color']; ?>&bold=<?= $t['bold']; ?>&size=<?= $t['font_size']; ?>&align=<?= $t['text_align']; ?>&lheight=<?= $t['line_height']; ?>" >
                        </span>
                    <?php } foreach($p['template_attributes']['image'] as $t){?>
                        <span class="<?= ($t['link'] || $t['external_link']) ? 'cp' : ''; ?>" data-link="<?= $t['link']; ?>" data-external="<?= $t['external_link']; ?>" style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>;">
                            <img width="100%" height="100%" src="<?= $t['value']; ?>" >
                        </span>
                    <?php } foreach($p['template_attributes']['video'] as $t){?>
                        <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>">
                            <iframe width="100%"  height="100%" src="<?= $t['value']; ?>?modestbranding=1&autohide=1&showinfo=0&controls=0" ></iframe>
                        </span>
                    <?php } foreach($p['template_attributes']['map'] as $t){?>
                        <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>">
                            <iframe width="100%"  height="100%" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAj5h09edjQhvZCnTutWyo18UQpJvcR75U&q=<?= $t['value']; ?>" ></iframe>
                        </span>
                    <?php } ?>
                </div>
                <?php }?>
            </div>
            <?php }  ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-h"></div>
    </div>
    <input type="hidden" id="copy_link" value="<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($book['id'])), $book['slug']], true);?>" />
    <!-- Swiper JS -->
    <?= $this->Html->script(array('jquery.min', 'swiper.min')) ?>

    <!-- Initialize Swiper -->
    <script>
    var swiper, swiperV;
    $(document).ready(function(){
        <?php if(!$is_mobile){?>
            $(".page_templates").height($("body").height());
            reswidth = ($("body").height() * 400) / 500;
            $(".page_templates").width(reswidth);
            $("body").width(reswidth);
            /*$(".text2image").each(function(){
                $(this).find("img").attr("src", $(this).find("img").attr("src")+"&sw="+reswidth);
            });*/
        <?php }else{?>
            $(".page_templates").height('100%');
            $(".page_templates").width('100%');
        <?php }?>

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

        $(".home_icon").click(function(){
            swiperH.slideTo($(".page_3").index(), 1000, true);
        });

        $(".menulist").click(function(){
            $(".social_icon").show();
        });
        $(".btn_close").click(function(){
            $(".social_icon").hide();
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
    });
    </script>
</body>
</html>