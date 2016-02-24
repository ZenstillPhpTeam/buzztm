<div class="row">
  <div class="right_section_dash">
    <div class="list_function">
      <div class="add_bookpages">
        <h2>
          <span>Category list</span> 
          <a class="btn submit_pagebtn" data-toggle="modal" data-target="#addModal">New Category</a>
        </h2>
      </div>
      <div class="table-responsive">          
        <table class="table active_title">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($categories as $key=>$cat){ ?>
            <tr>
              <td><?= $key+1; ?></td>
              <td><?= $cat->name; ?></td>
              <td>
                <a class="edit_category" data-text="<?= $cat->name; ?>" data-href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_category", $cat->id]);?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></a>&nbsp;
                <a class="delete_company" data-href="<?= $this->Url->build(["controller" => "admin", "action" => "delete_category", $cat->id]);?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
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


<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Category</h4>
      </div>
      <div class="modal_body">
        <p class="form-group">
          <span>Catgeory name</span>
          <span><input type="text" id="category_name" name="textbox" required></span>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="add_new_category btn btn-primary" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>

<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Category</h4>
      </div>
      <div class="modal_body">
        <p>
          <span>Catgeory name</span>
          <span><input type="text" id="update_category_name" name="textbox" required></span>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="update_category btn btn-primary" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>

<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are you sure you want to delete this company?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="confirm_button btn btn-primary" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
<script>
  $(document).ready(function(){
    $(".delete_company").click(function(){
      $(".confirm_button").data("href", $(this).data('href'));
    });
    $(".confirm_button").click(function(){
      window.location.assign($(this).data("href"));
    });

    $("button.add_new_category").click(function(){
      console.log("dfsdfs");
      $.post('<?= $this->Url->build(["controller" => "admin", "action" => "add_category"]);?>', {name: $("#category_name").val()}).
      success(function(response){
        window.location.assign(window.location.href);
      });
    });

    var edit_category = '';
    $(".edit_category").click(function(){
      edit_category = $(this).data('href');
       $("#update_category_name").val($(this).data('text'));
    });
    $("button.update_category").click(function(){
      $.post(edit_category, {name: $("#update_category_name").val()}).
      success(function(response){
        window.location.assign(window.location.href);
      });
    });
  });
</script>