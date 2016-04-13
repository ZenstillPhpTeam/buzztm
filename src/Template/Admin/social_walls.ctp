<div class="theme_uplode clearfix"  ng-app="buzztm" ng-controller="myController">
  <div class="product_list_slider">
    <div class="my_app clearfix">
      Social Wall Post
      <span class="add_new_sw pull-right">+ New Post</span>
    </div>

    <div class="hide post_new_social_walls_container">
              <div class="post_new_social_walls">
                <h3 class="clearfix">
                  POST HERE
                </h3>
                <form method="post" name="social_wall_form" class="social_wall_form" novalidate ng-submit="post_data();">
                  <div class="social_message_box">
                    <div class="sw_inputs">
                      <input ng-model="data.title" required class="form-control" placeholder="Title">
                      <textarea ng-model="data.message" required placeholder="Message" class="form-control" name="message"></textarea>
                    </div>
                    <div class="clearfix">
                      <div class="pull-left">
                        <input ng-model="file" class="hide social_image" type="file" name="image">
                        <button class="btn btn-primary select_social_image">ADD IMAGE</button>
                        <select name="data" ng-model="data.book" ng-init="data.book=''" required>
                          <option value="">Choose App</option>
                          <?php foreach($books as $bk){?>
                          <option value="<?= $bk->id?>"><?= $bk->book_name?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="pull-right">
                        <input ng-disabled="social_wall_form.$invalid" type="submit" class="btn btn-primary social_wall_submit" value="POST" name="social_wall_submit">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
    </div>

    <div class="book_list sw_list">
      <button class="active" data-val="">Show all</button>
      <?php foreach($books as $bk){?>
      <button data-val="<?= $bk->id?>"><?= $bk->book_name?></button>
      <?php }?>
    </div>

    <div class="clearfix sw_posts sw_list">
      <?php foreach($social_walls as $sw){?>
      <div class="col-lg-6 sw_posts_list sw_posts_list_<?= $sw->book;?>">
        <div class="clearfix sw_container">
          <div class="clearfix sw_container_contents">
            <div class="sw_image col-lg-4">
              <img width="50" src="<?= $this->Url->build($sw->image ? '/upload/social_wall/'.$sw->image : '/img/others/preview.png');?>">
            </div>
            <div class="col-lg-8">
              <h4><?= $sw->title?></h4>
              <p><?= $sw->message?></p>
            </div>
          </div>
          <div class="clearfix sw_container_actions">
            <div class="pull-left">
              <button class="btn btn_primary">Likes</button>
              <span ><?= $this->Custom->getBookName($sw->book);?></span>
            </div>
            <div class="pull-right">
              <a class="delete_company btn btn_delete" data-href="<?= $this->Url->build(["controller" => "admin", "action" => "delete_swpost", $sw->id]);?>" data-toggle="modal" data-target="#myModal">Remove</a>
              <a ng-click='edit_post(<?= json_encode($sw)?>)' dhref="<?= $this->Url->build(["controller" => "admin", "action" => "edit_book", $sw->id]);?>" class="btn btn_use">Edit</a>
            </div>
          </div>
        </div>
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
        <h4 class="modal-title">Are you sure you want to delete this Post?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="confirm_button btn btn-primary" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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
    $(".select_social_image").click(function(e){
      e.preventDefault();
      $(".social_image").trigger("click");
    });
    $(".add_new_sw").click(function(){
      $(".post_new_social_walls_container").toggleClass("hide");
      $(".sw_list").toggleClass("hide");

      $(".add_new_sw").text($(".sw_list").hasClass("hide") ? 'Back  to post' : '+ New Post');
    });

    $(".book_list button").click(function(){
      val = $(this).data("val");
      $(".book_list button").removeClass("active");
      $(this).addClass("active");

      if(val)
      {
        $('.sw_posts_list').hide();
        $('.sw_posts_list_'+val).show();
      }
      else
        $('.sw_posts_list').show();
    });
  });

  var buzztm = angular.module('buzztm', []);
  buzztm.controller('myController', ['$scope', '$http', '$timeout', '$rootScope',
    function($scope, $http, $timeout) {
      
      $scope.edit_post = function(data){
        $(".post_new_social_walls_container").removeClass("hide");
        $(".sw_list").addClass("hide");

        $(".add_new_sw").text('Back  to post');

        $scope.data = data;
      };

      $(document).on("change", ".social_image", function(e){
            $scope.handleFileSelect(e, true);
      });
      var formData = false;
      $scope.handleFileSelect = function(evt, manual) {
            evt.stopPropagation();
            evt.preventDefault();
            f = evt.target.files[0];
            formData = new FormData();
            formData.append('file', f);
      };

      $scope.post_data = function(){
        if(formData)
        {
          formData.append('book', $scope.data.book);
          formData.append('message', $scope.data.message);
          formData.append('title', $scope.data.title);
          if(typeof $scope.data.id != "undefined")
            formData.append('id', $scope.data.id);
        }
        else
        {
          formData = new FormData();
          formData.append('book', $scope.data.book);
          formData.append('message', $scope.data.message);
          formData.append('title', $scope.data.title);
          if(typeof $scope.data.id != "undefined")
            formData.append('id', $scope.data.id);
        }

        $(".social_image").val('');
        $scope.data = {};

        $.ajax({
                        url : '<?= $this->Url->build(["controller" => "admin", "action" => "post_social_wall"]);?>/',
                        type: "POST",
                        data : formData,
                        processData: false,
                        contentType: false,
                        success:function(response, textStatus, jqXHR){
                            
                          if(!response)
                          {
                            $(".createnew_section .message").remove();
                            $(".createnew_section").prepend('<div onclick="this.classList.add(\'hidden\')" class="message success">Post added successfully. Try Again!!.</div>');
                            
                            window.location.reload();
                          }
                          else
                          {
                            $(".createnew_section .message").remove();
                            $(".createnew_section").prepend('<div onclick="this.classList.add(\'hidden\')" class="message error">Error While Posting Social Wall. Try Again!!.</div>');
                          }
                            
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            $(".createnew_section .message").remove();
                            $(".createnew_section").prepend('<div onclick="this.classList.add(\'hidden\')" class="message error">Error While Posting Social Wall. Try Again!!.</div>');
                        }
          });
      };
    }
  ]);
</script>