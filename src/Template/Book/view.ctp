<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $book['book_name'].' | '.$this->Custom->getBusinessName($book['company']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <?= $this->Html->css(array('swiper.min')) ?>

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
        height: 20px;
        left: 0;
        width: 100%;
    }
    .swiper-container-horizontal > .swiper-pagination .swiper-pagination-bullet {
        margin: 0 5px;
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
        background: #0087ff none repeat scroll 0 0;
        border: 0 solid #fff;
        border-radius: 10px !important;
        display: block;
        height: 15px !important;
        width: 4px !important;
    }
    </style>
</head>
<body>
    <!-- Swiper -->
    <div class="swiper-container swiper-container-h">
        <div class="swiper-wrapper">
            <?php foreach($page as $p){?>
            <div class="swiper-slide">
                <?php if(count($p['sub_products'])){?>
                <div class="swiper-container swiper-container-v">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= $p['template_attributes']['background']['value']; ?>">
                                <?php foreach($p['template_attributes']['text'] as $t){?>
                                    <span class="draggable_text" style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>">
                                        <abbr><?= $t['value']; ?></abbr>
                                    </span>
                                <?php } foreach($p['template_attributes']['image'] as $t){?>
                                    <span class="draggable_image" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>">
                                        <img width="100" src="<?= $t['value']; ?>" >
                                    </span>
                                <?php }?>
                            </div>
                        </div>
                        <?php foreach($p['sub_products'] as $p1){?>
                        <div class="swiper-slide">
                            <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= $p1['template_attributes']['background']['value']; ?>">
                                <?php foreach($p['template_attributes']['text'] as $t){?>
                                    <span class="draggable_text" style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>">
                                        <abbr><?= $t['value']; ?></abbr>
                                    </span>
                                <?php } foreach($p['template_attributes']['image'] as $t){?>
                                    <span class="draggable_image" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>">
                                        <img width="100" src="<?= $t['value']; ?>" >
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
                        <span class="draggable_text" style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>">
                            <abbr><?= $t['value']; ?></abbr>
                        </span>
                    <?php } foreach($p['template_attributes']['image'] as $t){?>
                        <span class="draggable_image" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>">
                            <img width="100" src="<?= $t['value']; ?>" >
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
    $(document).ready(function(){
        $(".page_templates").height($("body").height());
        reswidth = ($("body").height() * 400) / 500;
        $(".page_templates").width(reswidth);
        $("body").width(reswidth);

        var swiperH = new Swiper('.swiper-container-h', {
            pagination: '.swiper-pagination-h',
            paginationClickable: true,
            spaceBetween: 0,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            keyboardControl: true
        });
        var swiperV = new Swiper('.swiper-container-v', {
            pagination: '.swiper-pagination-v',
            paginationClickable: true,
            direction: 'vertical',
            spaceBetween: 0,
            nextButton: '.swiper-button-vnext',
            prevButton: '.swiper-button-vprev',
            keyboardControl: true
        });
    });
    </script>
</body>
</html>