<script>
$('.carousel-sync').on('slide.bs.carousel', function(ev) {
    var dir = ev.direction == 'right' ? 'prev' : 'next';
    $('.carousel-sync').not('.sliding').addClass('sliding').carousel(dir);
});
$('.carousel-sync').on('slid.bs.carousel', function(ev) {
    $('.carousel-sync').removeClass('sliding');
});

</script>
<script>
$(document).ready(function(){
    $("#myCarousel").carousel({interval: 300000});
    $("#carousel-a").carousel({interval: 300000});
});
</script>
<div class="theme_uplode clearfix">
          <h3 class="welcome_title">WELCOME <span>Name</span></h3>
          <div class="product_list_slider">
            <div class="my_app">My App</div>
            <div class="col-lg-3 col-xs-12 col-md-4 col-sm-4"> <a href="<?= $this->Url->build(["controller" => "admin", "action" => "new-book-template"]);?>" class="producttheme_list"> <span class="theme_label_creation"><i class="fa fa-plus create_plus"></i>Create New Book</span> </a> </div>
            <div id="myCarousel" class="carousel slide col-lg-9 col-xs-12 col-md-8 col-sm-8"> 
              <!-- Wrapper for slides -->
              <div class="theme_preview">
                <div class="selection_theme"> 
                  <div class="carousel-inner product_slider" role="listbox">
                    <?php $cnt = count($books); foreach($books as $k=>$bk){ if($k%3 == 0){?>
                    <div class="item <?php echo $k == 0 ? 'active' : '';?> ">
                      <div class="span4" style="padding-left: 18px;"> 
                      <?php }?>
                        <div class="theme_list filter_<?= $bk->category; ?>"> 
                          <?php if($this->Custom->getBookPreview($bk->id)){?><img src="<?= $this->Url->build('/upload/template_image/').$this->Custom->getBookPreview($bk->id); ?>" class="img-responsive"><?php }?>
                          <span class="theme_label"><?= $bk->book_name;?></span>
                          <p class="hover_selecton">
                            <a target="_blank" href="<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($bk->id)), $bk->slug]);?>" class="btn btn_preview">LIVE PREVIEW</a>
                            <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $bk->id]);?>" class="btn btn_use">EDIT</a>
                            
                            <a class="delete_company btn btn_delete" data-href="<?= $this->Url->build(["controller" => "admin", "action" => "delete_book", $bk->id]);?>" data-toggle="modal" data-target="#myModal">DELETE</a>
                          </p>
                        </div>
                      <?php if($k%3 == 2 || $cnt == $k+1){?>
                      </div>
                    </div>
                    <?php }}?>
                  </div>
                </div>
              </div>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="fa fa-caret-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="fa fa-caret-left" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
            </div>
          </div>
        </div>
        
        <div class="product_list_slider">
          <div class="my_app">Unpublished APPs</div>
          
          <div class="theme_preview">
            <div class="selection_theme"> 
              <div id="carousel-a" class="carousel slide col-lg-12 col-xs-12 col-md-12 col-sm-12"> 
                <div class="carousel-inner product_slider" role="listbox">
                  <?php foreach($books2 as $k=>$bk){if($k%4 == 0){?>
                    <div class="item <?php echo $k == 0 ? 'active' : '';?> ">
                      <div class="span4" style="padding-left: 18px;"> 
                      <?php }?>
                        <div class="theme_list filter_<?= $bk->category; ?>"> 
                          <?php if($this->Custom->getBookPreview($bk->id)){?><img src="<?= $this->Url->build('/upload/template_image/').$this->Custom->getBookPreview($bk->id); ?>" class="img-responsive"><?php }?>
                          <span class="theme_label"><?= $bk->book_name;?></span>
                          <p class="hover_selecton">
                            <a target="_blank" href="<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($bk->id)), $bk->slug]);?>" class="btn btn_publish">PUBLISH</a>
                            <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $bk->id]);?>" class="btn btn_use">EDIT</a>
                          </p>
                        </div>
                      <?php if($k%4 == 3 || $cnt == $k+1){?>
                      </div>
                    </div>
                  <?php }}?> 
                </div>
              </div>
            </div>
            <a class="right carousel-control" href="#carousel-a" role="button" data-slide="next"> <span class="fa fa-caret-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> <a class="left carousel-control" href="#carousel-a" role="button" data-slide="prev"> <span class="fa fa-caret-left" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
          </div>
        </div>
        
        <div class="product_list_slider analytics_section">
          <div class="my_app clearfix">
            <div class="col-lg-6">ANALYTICS</div>
            <div class="col-lg-6">USER ACTIVITY</div>
          </div>
        </div>

        <div class="total_view">
          <ul>
            <li class="view_all"></li>
            <li class="view_all"></li>
          </ul>
        </div>