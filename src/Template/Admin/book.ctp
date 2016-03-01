<div class="row">
  <div class="right_section_dash">
    <div class="list_function">
      <div class="add_bookpages">
        <h2><span>Book list</span> <a href="<?= $this->Url->build(["controller" => "admin", "action" => "new_book"]);?>" class="btn submit_pagebtn">New Book</a></h2>
      </div>
      <div class="table-responsive">          
        <table class="table active_title">
          <thead>
            <tr>
              <th width="5%">#</th>
              <th width="15%">Book Name</th>
              <th width="10%">Category</th>
              <th width="10%">Created by</th>
              <th width="10%">Created on</th>
              <th width="5%">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($books as $key=>$tmp){ ?>
            <tr>
              <td><?= $key+1; ?></td>
              <td><?= $tmp->book_name; ?></td>
              <td><?= $this->Custom->getCategoryName($tmp->category); ?></td>
              <td><?= $this->Custom->getUserName($tmp->created_by); ?></td>
              <td><?= $tmp->created; ?></td>
              <td>
                <a target="_blank" href="<?= $this->Url->build(["controller" => "book", "action" => "view", base64_encode(base64_encode($tmp->id)), $tmp->slug]);?>"><i title="View" class="fa fa-eye"></i></a>&nbsp;
                <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $tmp->id]);?>"><i title="Edit" class="fa fa-pencil"></i></a>&nbsp;
                <a class="delete_company" data-href="<?= $this->Url->build(["controller" => "admin", "action" => "delete_book", $tmp->id]);?>" data-toggle="modal" data-target="#myModal"><i title="Delete" class="fa fa-trash"></i></a>&nbsp;
                <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $tmp->id, 1]);?>"><i title="Clone" class="fa fa-files-o"></i></a>
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