<div class="right_section">
  <div class="header_creation"> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'new-book']); ?>" class="btn btn_creation">CREATE NEW APP TEMPLATE</a> </div>
          <h2 class="rightsection_title">APP TEMPLATES</h2>
          <div class="app_templates">
            <ul>
              <li><a href="#" class="btn btn_show show_all">Show All</a></li>
              <?php foreach($categories as $cat){?>
              <li><a href="#" data-filter="<?= $cat->id; ?>" class="btn btn_show "><?= $cat->name?></a></li>
              <?php }?>
            </ul>
          </div>
          <div class="theme_preview">
            <div class="selection_theme"> 
              <?php foreach($books as $bk){?>
              <div class="theme_list" data-filter="<?= $bk->category; ?>"> 
                <?php if($this->Custom->getBookPreview($bk->id)){?><img src="<?= $this->Custom->getBookPreview($bk->id); ?>" class="img-responsive"><?php }?>
                <span class="theme_label"><?= $bk->book_name;?></span>
                <p class="hover_selecton">
                  <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $bk->id]);?>" class="btn btn_use">EDIT</a>
                  <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $bk->id, 1]);?>" class="btn btn_use">CLONE</a>
                  <a target="_blank" href="<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($bk->id)), $bk->slug]);?>" class="btn btn_preview">PREVIEW</a>
                </p>
              </div>
              <?php }?> 
            </div>
          </div>
</div>