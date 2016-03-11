<div class="right_section new_book_template">
  <div class="header_creation"> 
    <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'new-book']); ?>" class="btn btn_creation">CREATE NEW APP TEMPLATE</a> 
    <h2 class="rightsection_title">APP TEMPLATES</h2>
  </div>
          
          <div class="app_templates">
            <ul>
              <li><a href="#" class="btn btn_show show_all">Show All</a></li>
              <?php foreach($categories as $cat){?>
              <li><a href="#" data-filter="<?= $cat->id; ?>" class="btn btn_show cat_list"><?= $cat->name?></a></li>
              <?php }?>
            </ul>
            <div class="show_hide_category">
              <span><abbr>MORE CATEGORIES</abbr><abbr style="display:none;">LESS CATEGORIES</abbr> <i class="fa fa-angle-double-down"></i></span>
            </div>
          </div>
          <div class="theme_preview">
            <div class="selection_theme"> 
              <?php foreach($books as $bk){?>
              <div class="theme_list filter_<?= $bk->category; ?>"> 
                <?php if($this->Custom->getBookPreview($bk->id)){?><img src="<?= $this->Custom->getBookPreview($bk->id); ?>" class="img-responsive"><?php }?>
                <span class="theme_label"><?= $bk->book_name;?></span>
                <p class="hover_selecton">
                  <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $bk->id]);?>" class="btn btn_use">EDIT</a>
                  <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $bk->id, 1]);?>" class="btn btn_use">CLONE</a>
                  <a target="_blank" href="<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($bk->id)), $bk->slug]);?>" class="btn btn_preview">PREVIEW</a>
                  <a class="delete_company btn btn_preview" data-href="<?= $this->Url->build(["controller" => "admin", "action" => "delete_book", $bk->id]);?>" data-toggle="modal" data-target="#myModal">DELETE</a>
                </p>
              </div>
              <?php }?> 
            </div>
          </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are you sure you want to delete this template?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="confirm_button btn btn-primary" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".delete_company").click(function(){
      $(".confirm_button").data("href", $(this).data('href'));
    });
    $(".confirm_button").click(function(){
      window.location.assign($(this).data("href"));
    });
    click = 1;
    height = $(".new_book_template .app_templates ul").height();
    
    if(height <= 90)
      $(".show_hide_category").hide();
    else
      $(".new_book_template .app_templates ul").height(90);
    
    $(".show_hide_category").click(function(){
      
      //$(".new_book_template .app_templates ul").toggleClass('auto_height');
      if(click %2 == 1)
      {
        $(".new_book_template .app_templates ul").height(height);
      }
      else
      {
        $(".new_book_template .app_templates ul").height(90);
      }
      $(".new_book_template .app_templates .show_hide_category abbr").toggle();
      $(".new_book_template .app_templates .show_hide_category i").toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');

      click++;
    });
    $(".app_templates ul li a.cat_list").click(function(e){
      e.preventDefault();
      filter = $(this).data('filter');
      $('.selection_theme .theme_list').hide();
      $('.filter_'+filter).show();
    });
    $(".app_templates ul li a.show_all").click(function(e){
      e.preventDefault();
      $('.selection_theme .theme_list').show();
    });
  });
</script>