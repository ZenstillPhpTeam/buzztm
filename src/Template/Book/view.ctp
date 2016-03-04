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
        font-size: 14px;
        color:#000;
        margin: 0 auto;
        padding: 0;
        width: <?= ($is_mobile) ? 100 : 50; ?>%;
    }
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
        height: 30px;
        left: 0;
        width: 100%;
        background: #000;
    }
    .swiper-pagination.swiper-pagination-v {
        background: #000;
        right:0;
        border-top-left-radius:10px;
        border-bottom-left-radius:10px;
        padding: 8px;
    }
    .swiper-container-horizontal > .swiper-pagination .swiper-pagination-bullet {
        margin: -10px 5px;
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
    .contact{padding:22px;}

    .fa-map-marker{ font-size:40px; color:#fff; padding-right:40px;}
    .fa-phone{ font-size:40px; color:#fff; padding-right:20px;}
    .fa-caret-left{  color: #fff;
    display: inline-block;
    font-size: 30px;
    margin-top: 5px;
    position: absolute;}
    .home_icon{cursor: pointer;}
    </style>
</head>
<body>
    <!-- Swiper -->
    <span style="position:absolute; top:7.00%;left:5%;width:10%;height:auto;z-index:10;">
        <img src="<?= $this->Url->build('/img/bar.png');?>" height="10%" width="80%">
    </span>
    <span class="home_icon" style="position:absolute; top:7.00%;left:84%;width:10%;height:auto;z-index:10;display:none;">
        <img src="<?= $this->Url->build('/img/home.png');?>" height="10%" width="65%">
    </span>
    <div class="swiper-container swiper-container-h">
        <div class="swiper-wrapper">
            <?php foreach($page as $k=>$p){?>
            <div class="swiper-slide">
                <?php if(count($p['sub_products'])){?>
                <div class="swiper-container swiper-container-v">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= $p['template_attributes']['background']['value']; ?>">
                                <?php if($p['page'] == 6){?>
                                <span style="position:absolute; top:72.00%;left:0%;width:38%;height:auto; background:rgb(36,138,0); border-radius: 0 3px 3px 0;">
                                    <div class="contact">
                                       <span><a href=""><i class="fa fa-map-marker"></i></a></span>
                                       <span><a href=""><i class="fa fa-phone"></i> </a></span>
                                       <span><a href=""><i class="fa fa-caret-left"></i></a></span>
                                    </div>
                                </span>
                                <?php }?>
                                <?php foreach($p['template_attributes']['text'] as $t){?>
                                    <span style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;font-size:<?= $t['font_size']; ?>;font-weight:<?= $t['bold'] ? 'bold' : 'normal'; ?>;text-align:<?= $t['text_align']; ?>;color:#<?= $t['color']; ?>;">
                                        <abbr><?= $t['value']; ?></abbr>
                                    </span>
                                <?php } foreach($p['template_attributes']['image'] as $t){?>
                                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>">
                                        <img width="100%"  height="100%" src="<?= $t['value']; ?>" >
                                    </span>
                                <?php } foreach($p['template_attributes']['video'] as $t){?>
                                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height'];?>;">
                                        <iframe width="100%"  height="100%" src="<?= $t['value']; ?>" ></iframe>
                                    </span>
                                <?php }?>
                            </div>
                        </div>
                        <?php foreach($p['sub_products'] as $p1){?>
                        <div class="swiper-slide">
                            <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= $p1['template_attributes']['background']['value']; ?>">
                                <?php foreach($p1['template_attributes']['text'] as $t){?>
                                    <span style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;font-size:<?= $t['font_size']; ?>;font-weight:<?= $t['bold'] ? 'bold' : 'normal'; ?>;text-align:<?= $t['text_align']; ?>;color:#<?= $t['color']; ?>;">
                                        <abbr><?= $t['value']; ?></abbr>
                                    </span>
                                <?php } foreach($p1['template_attributes']['image'] as $t){?>
                                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height'];?>;">
                                        <img width="100%" height="100%" src="<?= $t['value']; ?>" >
                                    </span>
                                <?php }foreach($p1['template_attributes']['video'] as $t){?>
                                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height'];?>;">
                                        <iframe width="100%"  height="100%" src="<?= $t['value']; ?>" ></iframe>
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
                    <?php if($p['page'] == 6){?>
                    <span style="position:absolute; top:72.00%;left:0%;width:38%;height:auto; background:rgb(36,138,0); border-radius: 0 3px 3px 0;">
                        <div class="contact">
                            <span><a href=""><i class="fa fa-map-marker"></i></a></span>
                            <span><a href=""><i class="fa fa-phone"></i> </a></span>
                            <span><a href=""><i class="fa fa-caret-left"></i></a></span>
                        </div>
                    </span>
                    <?php }?>
                    <?php foreach($p['template_attributes']['text'] as $t){?>
                        <span style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;font-size:<?= $t['font_size']; ?>;font-weight:<?= $t['bold'] ? 'bold' : 'normal'; ?>;text-align:<?= $t['text_align']; ?>;color:#<?= $t['color']; ?>;">
                            <abbr><?= $t['value']; ?></abbr>
                        </span>
                    <?php } foreach($p['template_attributes']['image'] as $t){?>
                        <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>;">
                            <img width="100%" height="100%" src="<?= $t['value']; ?>" >
                        </span>
                    <?php } foreach($p['template_attributes']['video'] as $t){?>
                        <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>">
                            <iframe width="100%"  height="100%" src="<?= $t['value']; ?>" ></iframe>
                        </span>
                    <?php }?>
                </div>
                <?php }?>
            </div>
            <?php }  ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-h"></div>
    </div>

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
                console.log(swiper.activeIndex);
                if(swiper.activeIndex)
                    $(".home_icon").show();
                else
                    $(".home_icon").hide();
            }
        });
        swiperV = new Swiper('.swiper-container-v', {
            pagination: '.swiper-pagination-v',
            paginationClickable: true,
            direction: 'vertical',
            spaceBetween: 0,
            nextButton: '.swiper-button-vnext',
            prevButton: '.swiper-button-vprev',
            keyboardControl: true
        });

        $(".home_icon").click(function(){
            swiperH.slideTo(0, 1000, true);
        });
    });
    </script>
</body>
</html>