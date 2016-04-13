<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class CustomHelper extends Helper
{
    public function company_profile($id)
    {
        $this->UserProfiles = TableRegistry::get('UserProfiles');
    	return $this->UserProfiles->find('all', ['conditions' => ['UserProfiles.user_id' => $id]])->first();
    }

    public function template_attributes($id)
    {
        $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
    	return $this->TemplateAttributes->find('all', ['conditions' => ['TemplateAttributes.template_id' => $id]])->first();
    }

    public function getPageName($id)
    {
        if(!$id) return;

        $pages = [1 => 'Home Page', 2 => 'About us', 3 => 'Navigation', 4 => 'Product Page',  5 => 'Social Wall', 6 => 'Contact'];

        return $pages[$id];
    }

    public function getCategoryName($id)
    {
        if(!$id) return;

        $this->Categories = TableRegistry::get('Categories');

        return $this->Categories->get($id)->name;
    }

    public function getBookName($id)
    {
        if(!$id) return;

        $this->Books = TableRegistry::get('Books');

        return $this->Books->get($id)->book_name;
    }

    public function getBusinessName($id)
    {
        if(!$id) return 'Buzztm Preview Link';

        $this->UserProfiles = TableRegistry::get('UserProfiles');
        return $this->UserProfiles->find('all', ['conditions' => ['UserProfiles.user_id' => $id]])->first()->business_name;
    }

    public function getUserName($id)
    {
        if(!$id) return;
        
        $this->Users = TableRegistry::get('Users');
        return $this->Users->get($id)->username;
    }

    public function getBookPreview($id)
    {
        if(!$id) return;
        
        $this->BookTemplates = TableRegistry::get('BookTemplates');

        $template = $this->BookTemplates->find('all', ['conditions' => ['BookTemplates.book_id' => $id, 'BookTemplates.parent' => 0], 'order' => ['BookTemplates.page' => 'asc']])->first();

        return $template->template_image;
    }

    public function bgtoimg($img)
    {
        if(!$img) return;
        
        $img = explode("('", $img);
        $img = explode("')", $img[1]);

        return $img[0];
    }

    public function get_map_url($q)
    {
        $str = '?';
        foreach($q as $v) {
                $str .= $str == '?' ? 'q[]='.$v['value'] : '&q[]='.$v['value'] ;
            }

        return $str;
    }

    public function front_end_template_list($p, $is_mobile, $url)
    {
        
        if($p['page'] != 5)
        {
            ?>
            <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= $is_mobile ? '#191919' : $p['template_attributes']['background']['value']; ?>">
                        
                <?php if($is_mobile){?>
                    <img class="page_background_image" src="<?= $this->bgtoimg($p['template_attributes']['background']['value']); ?>">
                <?php }?>
                
                <?php foreach($p['template_attributes']['text'] as $t){?>
                    <span class="text2image <?= ($t['link'] || $t['external_link']) ? 'cp' : ''; ?>" data-link="<?= $t['link']; ?>" data-external="<?= $t['external_link']; ?>" style="position:absolute;top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;font-size:<?= $t['font_size'] ? ((int)$t['font_size'] * 6.25).'%' : '87.5%'; ?>;font-weight:<?= $t['bold'] ? 'bold' : 'normal'; ?>;text-align:<?= $t['text_align']; ?>;color:#<?= $t['color']; ?>;width:<?= $t['width']; ?>;">
                        <img src="<?= $url->build('/admin/text2image/');?>?text=<?= urlencode($t['value']); ?>&width=<?= $t['width']; ?>&color=<?= $t['color']; ?>&bold=<?= $t['bold']; ?>&size=<?= $t['font_size']; ?>&align=<?= $t['text_align']; ?>&lheight=<?= $t['line_height']; ?>" >
                    </span>
                <?php } foreach($p['template_attributes']['image'] as $t){?>
                    <span class="<?= ($t['link'] || $t['external_link']) ? 'cp' : ''; ?>" data-link="<?= $t['link']; ?>" data-external="<?= $t['external_link']; ?>" style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>;">
                        <img width="100%" height="100%" src="<?= $t['value']; ?>" >
                    </span>
                <?php } foreach($p['template_attributes']['video'] as $t){?>
                    <span style="position:absolute; top:<?= $t['top']; ?>;left:<?= $t['left']; ?>;width:<?= $t['width']; ?>;height:<?= $t['height']; ?>">
                        <iframe width="100%"  height="100%" src="<?= $t['value']; ?>?modestbranding=1&autohide=1&showinfo=0&controls=0" ></iframe>
                    </span>
                <?php } if(count($p['template_attributes']['map'])){?>
                    <span class="map_template" data-height="<?= $p['template_attributes']['map'][0]['height']; ?>" style="position:absolute; top:<?= $p['template_attributes']['map'][0]['top']; ?>;left:<?= $p['template_attributes']['map'][0]['left']; ?>;width:<?= $p['template_attributes']['map'][0]['width']; ?>;height:<?= $p['template_attributes']['map'][0]['height']; ?>">
                        <iframe width="100%"  height="100%" src="<?= $url->build('/admin/map/').$this->Custom->get_map_url($p['template_attributes']['map']); ?>" ></iframe>
                    </span>
                <?php } ?>
            </div>
            <?php
        }
        else
            $this->social_wall_template($p['book_id'], $is_mobile, $url);
    }

    public function social_wall_template($book, $is_mobile, $url)
    {
        $this->SocialWalls = TableRegistry::get('SocialWalls');
        $social_walls = $this->SocialWalls->find('all', ['conditions' => ['SocialWalls.book' => $book], 'order' => ['SocialWalls.id' => 'desc']])->all();

        ?>
            <div class="page_templates" style="position:relative;overflow:hidden; margin:0 auto;background:<?= 'url('.$url->build('/img/sw_bg.png').') no-repeat scroll 0 0 / 100% auto'; ?>">
                        
                <?php /*if($is_mobile){?>
                    <img class="page_background_image" src="<?= $url->build('/img/sw_bg.png'); ?>">
                <?php }*/?>
                <style>
                .social_wall_posts{margin-top: 15%; height: 80%; overflow: auto; padding: 10px;}
                .social_wall_list{background: #1F4665; border-radius: 10px; margin-bottom: 8px; padding: 10px; color: #fff;}
                .sw_image_box { background: #fff none repeat scroll 0 0;border-radius: 10px;box-shadow: 0 0 10px 2px #000;height: 150px;left: 0;margin: auto;max-width: 100%;position: absolute;right: 0;width: 150px;}
                .sw_image_box img{position: absolute; max-width: 100%; height: auto; top: 0; left: 0; right: 0; bottom: 0; margin:auto; }
                .sw_image_box_container {float: left;position: relative;width: 32%;}
                .sw_post_content{float: right; margin-left:3%; width: 65%; text-align: left;}
                .sw_post_content h4{margin:0; font-size: 18px; font-weight: normal;}
                .sw_post_content p{font-size: 14px;}
                .sw_post_content .sw_actions .fa{color:#43627E; margin-left: 20px; font-size: 22px;}
                .sw_post_content .sw_actions{text-align: right;}
                .sw_post_content .sw_post_content_box{min-height: 105px;}
                @media (max-width: 400px){
                    .sw_image_box {width: 100px; height: 100px;}
                    .sw_post_content .sw_post_content_box{min-height: 70px;}
                }
                @media (min-width:500px) and (max-width: 700px){
                    .sw_image_box {width: 130px; height: 130px;}
                    .sw_post_content .sw_post_content_box{min-height: 95px;}
                }
                </style>
                <div class ="social_wall_posts">
                    <?php foreach($social_walls as $sw){?>
                    <div class ="social_wall_list clearfix">
                        <div class="sw_image_box_container">
                            <div class="sw_image_box">
                                <img src="<?= $url->build($sw->image ? '/upload/social_wall/'.$sw->image : '/img/others/preview.png');?>">
                            </div>
                        </div>
                        <div class="sw_post_content">
                            <div class="sw_post_content_box">
                                <h4><?= $sw->title?></h4>
                                <p><?= $sw->message?></p>
                            </div>
                            <hr>
                            <div class="sw_actions">
                                <i class="fa fa-share-alt"></i>
                                <i class="fa fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        <?php
    }
}