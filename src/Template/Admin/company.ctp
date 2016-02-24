<div class="row">
  <div class="right_section_dash">
    <div class="list_function">
      <div class="add_bookpages">
        <h2><span>Company list</span> <a href="<?= $this->Url->build(["controller" => "admin", "action" => "new_company"]);?>" class="btn submit_pagebtn">New Company</a></h2>
      </div>
      <div class="table-responsive">          
        <table class="table active_title">
          <thead>
            <tr>
              <th>#</th>
              <th>Company Title</th>
              <th>&nbsp;</th>
              <th>Username</th>
              <th>Email</th>
              <th>Allowed Books</th>
              <th>Used Books</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($users as $key=>$user){ $profile = $this->Custom->company_profile($user->id);?>
            <tr>
              <td><?= $key+1; ?></td>
              <td><?= $profile->business_name; ?></td>
              <td><img width="50" src="<?= $this->Url->build('/upload/logo/'.$user->logo);?>"></td>
              <td><?= $user->username;?></td>
              <td><?= $user->email;?></td>
              <td><?= $profile->allowed_books; ?></td>
              <td>0</td>
              <td>
                <a href="<?= $this->Url->build(["controller" => "admin", "action" => "edit_company", $user->id]);?>"><i class="fa fa-pencil"></i></a>&nbsp;
                <a class="delete_company" data-href="<?= $this->Url->build(["controller" => "admin", "action" => "delete_company", $user->id]);?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></a>
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
  });
</script>