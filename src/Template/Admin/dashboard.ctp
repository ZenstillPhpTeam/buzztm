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
    $("#myCarousel").carousel({interval: false});
    $("#carousel-a").carousel({interval: false});
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
            <div class="col-lg-6">SOCIAL WALL</div>
          </div>
        </div>

        <div class="total_view" ng-app="buzztm" ng-controller="myController">
          <ul>
            <li class="view_all"></li>
            <li class="view_all post_new_social_walls_container">
              <div class="post_new_social_walls">
                <h3 class="clearfix">
                  POST HERE 
                  <a href="<?= $this->Url->build(["controller" => "admin", "action" => "social_walls"]);?>" class="socialwall_link">View all Posts</a>
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
            </li>
          </ul>
        </div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are you sure you want to delete this Book?</h4>
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

  });

  var buzztm = angular.module('buzztm', []);
  buzztm.controller('myController', ['$scope', '$http', '$timeout', '$rootScope',
    function($scope, $http, $timeout) {
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
        }
        else
        {
          formData = new FormData();
          formData.append('book', $scope.data.book);
          formData.append('message', $scope.data.message);
          formData.append('title', $scope.data.title);
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