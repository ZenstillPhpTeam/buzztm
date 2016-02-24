<div class="row new_theme" ng-app="buzztm" ng-controller="AddController">
    <div class="right_section_dash">
        <div class="register_steps">
            <ol class="list_step_line">
              <li ng-class="{active:tab==1}"></li>
              <li ng-class="{active:tab==2}"></li>
              <li ng-class="{active:tab==3}"></li>
            </ol>
            <ul class="step_function">
              <li><span ng-class="{active:tab==1}" class="circule_fun">1</span><span>step</span></li>
              <li><span ng-class="{active:tab==2}" class="circule_fun">2</span><span>step</span></li>
              <li><span ng-class="{active:tab==3}" class="circule_fun">3</span><span>step</span></li>
              <li><span ng-class="{active:tab==4}" class="circule_fun">4</span><span>step</span></li>
            </ul>
            <form onsubmit="return false;" name="new_company" novalidate action="" method="post" class="register_step_form new_company" enctype="multipart/form-data">
              <input type="hidden" ng-model="company.role">
              <div class="register_section">
                <div class="register_step_bg" ng-if="tab==1">
                  <h2>THEME DETAILS</h2>
                  <p>
                    <span>Theme Name</span>
                    <span><input type="text" name="template_name" ng-model="company.name" required></span>
                    <span ng-show="new_company.template_name.$invalid && (!new_company.template_name.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.template_name.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Category</span>
                    <span>
                      <select name="category_type" ng-model="company.category_type" required>
                        <option value="">Theme Category</option>
                        <?php foreach($categories as $cat){?>
                        <option value="<?= $cat->id; ?>"><?= $cat->name; ?></option>
                        <?php }?>
                      </select>
                    </span>
                    <span ng-show="new_company.category_type.$invalid && (!new_company.category_type.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.category_type.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p> <button ng-click="next();" class="btn btn_submit right">Next</button></p>
                </div>
                <div class="register_step_bg" ng-if="tab==2">
                  <h2>SELECT TEMPLATE[1]</h2>
                  
                  <h3>Home Page</h3>
                  
                  <div class="row template_list">
                    <div class="col-lg-3 template_single" ng-click="selected_template(1, tmp.id)" ng-class="{selected: company.data[1] == tmp.id}" ng-repeat='tmp in templates[1]'>
                      <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{tmp.id}}.png" >
                      <span class="template_name">{{tmp.template_name}}</span>
                      <i class="fa fa-check"></i>
                    </div>
                  </div>
                  

                  <h3>About us Page</h3>
                  <div class="row template_list">
                    <div class="col-lg-3 template_single" ng-click="selected_template(2, tmp.id)" ng-class="{selected: company.data[2] == tmp.id}" ng-repeat='tmp in templates[2]'>
                      <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{tmp.id}}.png" >
                      <span class="template_name">{{tmp.template_name}}</span>
                      <i class="fa fa-check"></i>
                    </div>
                  </div>

                  <h3>Navigation Page</h3>
                  <div class="row template_list">
                    <div class="col-lg-3 template_single" ng-click="selected_template(3, tmp.id)" ng-class="{selected: company.data[3] == tmp.id}" ng-repeat='tmp in templates[3]'>
                      <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{tmp.id}}.png" >
                      <span class="template_name">{{tmp.template_name}}</span>
                      <i class="fa fa-check"></i>
                    </div>
                  </div>
                  

                  <p> 
                    <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                    <button ng-disabled="company.data[1] === undefined || company.data[2] === undefined || company.data[3] === undefined" ng-click="next();" class="btn btn_submit right">Next</button>
                  </p>
                </div>
                <div class="register_step_bg" ng-if="tab==3">
                  <h2>SELECT TEMPLATE[2]</h2>
                  
                  <h3>Product Page</h3>
                  <div class="row template_list">
                    <div class="col-lg-3 template_single" ng-click="selected_template(4, tmp.id)" ng-class="{selected: company.data[4] == tmp.id}" ng-repeat='tmp in templates[4]'>
                      <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{tmp.id}}.png" >
                      <span class="template_name">{{tmp.template_name}}</span>
                      <i class="fa fa-check"></i>
                    </div>
                  </div>

                  <h3>Social Wall Page</h3>
                  <div class="row template_list">
                    <div class="col-lg-3 template_single" ng-click="selected_template(5, tmp.id)" ng-class="{selected: company.data[5] == tmp.id}" ng-repeat='tmp in templates[5]'>
                      <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{tmp.id}}.png" >
                      <span class="template_name">{{tmp.template_name}}</span>
                      <i class="fa fa-check"></i>
                    </div>
                  </div>

                  <h3>Contact us Page</h3>
                  <div class="row template_list">
                    <div class="col-lg-3 template_single" ng-click="selected_template(6, tmp.id)" ng-class="{selected: company.data[6] == tmp.id}" ng-repeat='tmp in templates[6]'>
                      <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{tmp.id}}.png" >
                      <span class="template_name">{{tmp.template_name}}</span>
                      <i class="fa fa-check"></i>
                    </div>
                  </div>

                  <p>
                    <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                    <button ng-disabled="company.data[6] === undefined || company.data[4] === undefined || company.data[5] === undefined" ng-click="next();" class="btn btn_submit right">Save</button>
                  </p>
                </div>
                <div class="register_step_bg" ng-if="tab==4">
                  <h2>PREVIEW</h2>
                  
                  <div class="row template_preview">
                    <div ng-repeat='(k,tmp) in company.data' ng-if="tmp"  class="template_preview_list">
                      <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{tmp}}.png" >
                      <span>{{page_name[k]}}</span>
                    </div>
                  </div>

                  <p>
                    <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                    <button ng-click="next();" class="btn btn_submit right">Save</button>
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
  
  buzztm.controller('AddController', ['$scope', '$http',
    function($scope, $http) {
        
        $scope.company = {"name":"ghdfghd", "category_type": "", data: []};
        $scope.tab = 1;
        $scope.clicked = false;
        $scope.templates = [];

        $scope.getNumber = function(num) {
            return new Array(num);   
        }

        $scope.page_name = ['', 'Home', 'About us', 'Navigation', 'Product', 'Social Wall', 'Contact'];


        $scope.selected_template = function(id, tmp){
          $scope.company['data'][id] = tmp;
        };

        $scope.next = function()
        {
            $scope.clicked = true;
            
            if($scope.tab == 4)
            {

              $http.post('<?= $this->Url->build(["controller" => "admin", "action" => "create_theme"]);?>', $scope.company)

              .then(function(res){
                if(res['data'] == 'success')
                {
                  window.location.assign('<?= $this->Url->build(["controller" => "admin", "action" => "theme"]);?>');
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
                if($scope.tab == 1)
                {
                  $http.post('<?= $this->Url->build(["controller" => "admin", "action" => "template_list"]);?>/'+$scope.company.category_type, $scope.data)

                  .then(function(res){
                    $scope.templates = res['data'];
                    console.log($scope.templates);
                    $scope.tab++;
                    $scope.clicked = false;
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
            $scope.tab--;
        };

    }
  ]);
</script> 