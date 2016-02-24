<div class="row" ng-app="buzztm" ng-controller="AddController">
    <div class="right_section_dash">
        <div class="register_steps">
            <ol class="list_step_line">
              <li ng-class="{active:tab==1}"></li>
              <li ng-class="{active:tab==2}"></li>
            </ol>
            <ul class="step_function">
              <li><span ng-class="{active:tab==1}" class="circule_fun">1</span><span>step</span></li>
              <li><span ng-class="{active:tab==2}" class="circule_fun">2</span><span>step</span></li>
              <li><span ng-class="{active:tab==3}" class="circule_fun">3</span><span>step</span></li>
            </ul>
            <form onsubmit="return false;" name="new_company" novalidate action="" method="post" class="register_step_form new_company" enctype="multipart/form-data">
              <input type="hidden" ng-model="company.role">
              <div class="register_section">
                <div class="register_step_bg" ng-if="tab==1">
                  <h2>TEMPLATE DETAILS</h2>
                  <p>
                    <span>Template Name</span>
                    <span><input type="text" name="template_name" ng-model="company.template_name" required></span>
                    <span ng-show="new_company.template_name.$invalid && (!new_company.template_name.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.template_name.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Page</span>
                    <span>
                      <select name="page_type" ng-model="company.page_type" required>
                        <option value="">Select Page</option>
                        <option value="1">Home Page</option>
                        <option value="2">About us</option>
                        <option value="3">Navigation</option>
                        <option value="4">Product Page</option>
                        <option value="5">Social Wall</option>
                        <option value="6">Contact</option>
                      </select>
                    </span>
                    <span ng-show="new_company.page_type.$invalid && (!new_company.page_type.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.page_type.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Category</span>
                    <span>
                      <select name="category_type" ng-model="company.category_type" required>
                        <option value="">Select Category</option>
                        <?php foreach($categories as $cat){?>
                        <option value="<?= $cat->id; ?>"><?= $cat->name; ?></option>
                        <?php }?>
                      </select>
                    </span>
                    <span ng-show="new_company.category_type.$invalid && (!new_company.category_type.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.category_type.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Width</span>
                    <span><input type="number" name="width" ng-model="company.width" required></span>
                    <span ng-show="new_company.width.$invalid && (!new_company.width.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.width.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Height</span>
                    <span><input type="number" ng-model="company.height" name="height" required></span>
                    <span ng-show="new_company.height.$invalid && (!new_company.height.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.height.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>No of Textbox</span>
                    <span><input type="number" ng-model="company.textbox" name="textbox" required></span>
                    <span ng-show="new_company.textbox.$invalid && (!new_company.textbox.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.textbox.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>No of Image</span>
                    <span><input type="number" ng-model="company.image" name="image" required></span>
                    <span ng-show="new_company.image.$invalid && (!new_company.image.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.image.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p> <button ng-click="next();" class="btn btn_submit right">Next</button></p>
                </div>
                <div class="register_step_bg" ng-if="tab==2">
                  <h2>CREATE OWN TEMPLATE</h2>
                  
                  <div id="create_own_template" class="create_own_template">
                    <div ng-dblclick="change_background(company.background)" style="overflow:hidden;margin:0 auto; position:relative;width:{{company.width}}px; height:{{company.height}}px; background:{{data['background']['value']}}">
                        <span ng-dblclick="change_active_text($index)" on-finish-text-render ng-repeat="t in getNumber(company.textbox)  track by $index" class="draggable_text" ng-class="{active: data['active_text'] == $index}" style="position:absolute;" data-index="{{$index}}" ng-init="data['text'][$index] = data['text'][$index] === undefined ? {value:'Input '+ ($index + 1), top: $index*20 + 'px', left: '0'} : data['text'][$index];" ng-style="{top: data['text'][$index]['top'], left: data['text'][$index]['left']}">
                          <input ng-enter type="text" value="{{data['text'][$index]['value']}}">
                          <abbr>{{data['text'][$index]['value'] }}</abbr>
                        </span>
                        <span ng-dblclick="change_active_image($index)" on-finish-image-render ng-repeat="t in getNumber(company.image)  track by $index" class="draggable_image" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:{{$index*40}}px; left:50%;" data-index="{{$index}}" ng-init="data['image'][$index] = data['image'][$index] === undefined ? {value:'<?= $this->Url->build('/img/');?>image_placeholder.png', top: $index*40 + 'px', left: '50%'} : data['image'][$index];" ng-style="{top: data['image'][$index]['top'], left: data['image'][$index]['left']}">
                          <img width="100" src="{{data['image'][$index]['value']}}" >
                        </span>
                    </div>
                  </div>

                  <p> 
                    <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                    <button ng-click="next();" class="btn btn_submit right">Next</button>
                  </p>
                </div>
                <div class="register_step_bg" ng-if="tab==3">
                  <h2>PREVIEW</h2>
                  
                  <div class="create_own_template">
                    <div style="overflow:hidden;margin:0 auto; position:relative;width:{{company.width}}px; height:{{company.height}}px; background:{{data['background']['value']}}">
                        <span ng-repeat="t in getNumber(company.textbox)  track by $index" class="draggable_text" ng-class="{active: data['active_text'] == $index}" style="position:absolute;" data-index="{{$index}}" ng-style="{top: data['text'][$index]['top'], left: data['text'][$index]['left']}">
                          <input ng-enter type="text" value="{{data['text'][$index]['value']}}">
                          <abbr>{{data['text'][$index]['value'] }}</abbr>
                        </span>
                        <span ng-repeat="t in getNumber(company.image)  track by $index" class="draggable_image" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:{{$index*40}}px; left:50%;" data-index="{{$index}}" ng-style="{top: data['image'][$index]['top'], left: data['image'][$index]['left']}">
                          <img width="100" src="{{data['image'][$index]['value']}}" >
                        </span>
                    </div>
                  </div>

                  <p>
                    <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                    <span class="right">
                      <button ng-click="next(0);" class="btn btn_submit">Create New</button>
                      &nbsp;&nbsp;
                      <button ng-click="next(1);" class="btn btn_submit">Save</button>
                    </span>
                  </p>
                </div>
              </div>
            </form>
      </div>
    </div>

    <a data-toggle="modal" data-target="#myModal" class="hide modal_image_upload"></a>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload Image</h4>
          </div>
          <div class="modal-body">
            <input type="file" class="file_uploaded">
          </div>
          <div class="modal-footer">
            <button ng-disabled="upload_button_text != 'Upload'" type="button" ng-click="upload_image()" class="btn btn-primary">{{upload_button_text}}</button>
            <button ng-if="upload_button_text == 'Upload'" type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </div>
        </div>

      </div>
    </div>

</div>



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">

function calculate_percentage(total, used)
{
  return (used/total) * 100;
}

  var buzztm = angular.module('buzztm', []);
  
  buzztm.directive('onFinishTextRender',['$timeout', '$parse', function ($timeout, $parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
            if (scope.$last === true) {
                $timeout(function () {
                    $(".draggable_text").draggable(
                      {
                        containment: "parent",
                        stop: function( event, ui ) { 
                          ind = $(this).data("index");
                          scope.$apply(function(){
                            scope.data['text'][ind]['top'] = ui.position.top;
                            scope.data['text'][ind]['left'] = ui.position.left;
                          });
                        }
                      }
                      );
                });
            }
        }
    }
}]);

  buzztm.directive('onFinishImageRender',['$timeout', '$parse', function ($timeout, $parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
            if (scope.$last === true) {
                $timeout(function () {
                    $(".draggable_image").draggable(
                      {
                        containment: "parent",
                        stop: function( event, ui ) { 
                          ind = $(this).data("index");
                          scope.$apply(function(){
                            scope.data['image'][ind]['top'] = ui.position.top;
                            scope.data['image'][ind]['left'] = ui.position.left;
                          });
                        }
                      }
                      );
                });
            }
        }
    }
}]);

  buzztm.directive('ngEnter', function() {
        return function(scope, element, attrs) {
            element.bind("keydown keypress", function(event) {
                if(event.which === 13) {
                        scope.$apply(function(){
                                scope.data['text'][element.parent().data("index")]['value'] = element.val();
                                scope.data['active_text'] = -1;
                                scope.data['background_st'] = 0;
                        });
                        
                        event.preventDefault();
                }
            });
        };
});

  buzztm.controller('AddController', ['$scope', '$http',
    function($scope, $http) {
        
        $scope.company = <?= json_encode($template)?>;
        $scope.tab = 1;
        $scope.clicked = false;
        $scope.upload_button_text = 'Upload';
        var formData = 0;

        $scope.data = {template: $scope.company, image: <?= json_encode($attrlist['image'])?>, text: <?= json_encode($attrlist['text'])?>, background:<?= json_encode($attrlist['background'])?>, active_text: -1, active_image: -1, background_st: 0};


        $('#myModal').on('hidden.bs.modal', function () {
            $scope.$apply(function(){
              $scope.data['background_st'] = 0;
              $scope.data['active_text'] = -1;
              $scope.data['active_image'] = -1;
              $scope.upload_button_text = 'Upload';
            });
        });

        $scope.change_background = function()
        {
          if($scope.data['background_st'] != -1)
          {
            $('#myModal').modal('show');
            $scope.data['background_st'] = 1;

            console.log('parent');
          }
        };

        $scope.getNumber = function(num) {
            return new Array(num);   
        }

        $(document).on("change", ".file_uploaded", function(e){
            $scope.handleFileSelect(e, true);
        });

        $scope.change_active_text = function(ind)
        {
          $scope.data['active_text'] = ind;
          $scope.data['active_image'] = -1;
          $scope.data['background_st'] = -1;

          console.log(ind);
        };

        $scope.change_active_image = function(ind)
        {
          $scope.data['active_text'] = -1;
          $scope.data['active_image'] = ind;
          $scope.data['background_st'] = -1;

          $('#myModal').modal('show');

          console.log('child');
        };

        $scope.handleFileSelect = function(evt, manual) {
          evt.stopPropagation();
          evt.preventDefault();
          f = evt.target.files[0];
          formData = new FormData();
          formData.append('file', f);
          formData.append('filename', f.name);
        }

        $scope.upload_image = function(){
          $scope.upload_button_text = 'Uploading...';
          $.ajax({
                        url : '<?= $this->Url->build(["controller" => "admin", "action" => "upload_image"]);?>/',
                        type: "POST",
                        data : formData,
                        processData: false,
                        contentType: false,
                        success:function(response, textStatus, jqXHR){
                            
                          if(response != 'error')
                          {
                            if($scope.data.background_st == 1)
                            {
                              $scope.data['background']['value'] = "url('<?= $this->Url->build('/upload/template/');?>"+response+"')  no-repeat scroll 0 0 / 100% 100% ";
                            }
                            else
                            {
                              $scope.$apply(function(){
                                $scope.data['image'][$scope.data['active_image']]['value'] = "<?= $this->Url->build('/upload/template/');?>"+response;
                                $scope.data['background_st'] = 0;
                              });
                            }
                            
                            $('#myModal').modal('toggle');
                            $(".file_uploaded").val('');
                          }
                          else
                          {
                            $(".dashboard_section .message").remove();
                            $(".dashboard_section").prepend('<div onclick="this.classList.add(\'hidden\')" class="message error">Error While Uploading Image. Try Again!!.</div>');
                          }
                            
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            $(".dashboard_section .message").remove();
                            $(".dashboard_section").prepend('<div onclick="this.classList.add(\'hidden\')" class="message error">Error While Uploading Image. Try Again!!.</div>');
                        }
          });
        }

        $scope.next = function(st)
        {
            $scope.clicked = true;
            
            if($scope.tab == 3)
            {

              if(st)
                post_url = '<?= $this->Url->build(["controller" => "admin", "action" => "update_template", $id]);?>';
              else
                post_url = '<?= $this->Url->build(["controller" => "admin", "action" => "create_template"]);?>';

              $http.post(post_url, $scope.data)

              .then(function(res){
                if(res['data'] == 'success')
                {
                  window.location.assign('<?= $this->Url->build(["controller" => "admin", "action" => "template"]);?>');
                }
                else
                {
                  $(".dashboard_section .message").remove();
                  $(".dashboard_section").prepend('<div onclick="this.classList.add(\'hidden\')" class="message error">Error While Adding Company. Try Again!!.</div>');
                }
              });
            }
            else if($scope.new_company.$valid)
            {
              if($scope.tab == 2)
              {
                html2canvas([$("#create_own_template")[0]], {
                    onrendered: function (canvas) {
                        $scope.data['template']['template_image'] = canvas.toDataURL('image/png');
                        $scope.$apply(function(){
                            $scope.tab++;
                            $scope.clicked = false;
                        });
                    }
                });
              }
              else
              {
                $scope.tab++;
                $scope.clicked = false;
              }
            }
        };

        $scope.previous = function()
        {
            console.log('lol');
            $scope.tab--;
        };

    }
  ]);
</script> 