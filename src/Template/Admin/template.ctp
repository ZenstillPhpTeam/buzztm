<div class="row">
  <div class="right_section_dash">
    <div class="list_function">
      <div class="add_bookpages clearfix">
        <h2>
          <span>Template list</span> 
          <a href="<?= $this->Url->build(["controller" => "admin", "action" => "new_template"]);?>" class="btn submit_pagebtn">New Template</a>
          <a href="<?= $this->Url->build(["controller" => "admin", "action" => "category"]);?>" class="btn submit_pagebtn right">Template Category</a>
        </h2>
      </div>
      <div class="table-responsive">          
        <table class="table active_title">
          <thead>
            <tr>
              <th width="5%">#</th>
              <th width="15%">Template Name</th>
              <th width="10%"></th>
              <th width="10%">Page</th>
              <th width="10%">Category</th>
              <th width="10%">No of Books Used</th>
              <th width="10%">No of Child Template</th>
              <th width="5%">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($template as $key=>$tmp){ $profile = $this->Custom->template_attributes($tmp->id);?>
            <tr>
              <td><?= $key+1; ?></td>
              <td><?= $tmp->template_name; ?></td>
              <td><img width="50" src="<?= $this->Url->build('/upload/template_image/'.$tmp->template_image);?>"></td>
              <td><?= $this->Custom->getPageName($tmp->page_type); ?></td>
              <td><?= $this->Custom->getCategoryName($tmp->category_type); ?></td>
              <td>0</td>
              <td>0</td>
              <td>
                <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_template", $tmp->id]);?>"><i class="fa fa-pencil"></i></a>&nbsp;
                <a class="delete_company" data-href="<?= $this->Url->build(["controller" => "admin", "action" => "delete_template", $tmp->id]);?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="buzztm_pagination text-center">
  <ul class="pagination">
    <?= $this->Paginator->numbers() ? $this->Paginator->prev('« Previous') : '' ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->numbers() ? $this->Paginator->next('Next »') : ''; ?>
  </ul>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
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
  });
</script>