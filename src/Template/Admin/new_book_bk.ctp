<div class="row" ng-app="buzztm" ng-controller="AddController">
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
            {{page}}<br>
            {{selectcategory}}<br>
            {{active_page}}
            <form onsubmit="return false;" name="new_company" novalidate action="" method="post" class="register_step_form new_company" enctype="multipart/form-data">
              <input type="hidden" ng-model="company.role">
              <div class="register_section" ng-class="{book_customization:tab == 2}">
                <div class="register_step_bg" ng-if="tab==1">
                  <h2>BOOK DETAILS</h2>
                  <p>
                    <span>Book Name</span>
                    <span><input type="text" name="book_name" ng-model="company.book_name" required></span>
                    <span ng-show="new_company.book_name.$invalid && (!new_company.book_name.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.book_name.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Company</span>
                    <span>
                      <select name="company" ng-model="company.company" required>
                        <option value="">Select Company</option>
                        <?php foreach($company as $cat){?>
                        <option value="<?= $cat->id; ?>"><?= $cat->username; ?></option>
                        <?php }?>
                      </select>
                    </span>
                    <span ng-show="new_company.company.$invalid && (!new_company.company.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.company.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>No of Product Page</span>
                    <span><input type="text" ng-model="company.no_of_page" name="no_of_page" required></span>
                    <span ng-show="new_company.no_of_page.$invalid && (!new_company.no_of_page.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.no_of_page.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Products per page</span>
                    <span><input type="text" name="product_per_page" ng-model="company.product_per_page" required></span>
                    <span ng-show="new_company.product_per_page.$invalid && (!new_company.product_per_page.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.product_per_page.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p> <button ng-click="next();" class="btn btn_submit right">Next</button></p>
                </div>
                <div class="register_step_bg" ng-show="tab==2">
                  <h2>CUSTOMIZE YOUR BOOK</h2>
                  <div class='book_customization row'>
                    <div class="page_list clearfix">
                      <div ng-repeat="pa in page" class="book_page col-lg-2" ng-class="{selected: active_page == $index}" ng-click="select_active_page($index)">
                        <img ng-if="!pa.template" width="100" src="<?= $this->Url->build('/img/');?>image_placeholder.png" >
                        <img ng-if="pa.template" width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{pa.template}}.png" >
                        <span class="page_name">{{pa.name}}</span>
                      </div>
                    </div>
                    <div class='book_customization_container clearfix'>
                      <div class="row">
                        <div class='col-lg-5'>
                          <div ng-repeat="(id,tmp) in templates" class="col-lg-3" ng-click="select_template(id);">
                            <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{id}}.png" >
                            <span classs="template_name">{{tmp}}</span>
                          </div>
                        </div>
                        <div class='col-lg-2'>
                          <p>
                            <span>Category</span>
                            <span>
                              <select ng-disabled="page[active_page]['template']" ng-change="filter_templates()" ng-model="selectcategory">
                                <option value="">Select Category</option>
                                <?php foreach($categories as $cat){?>
                                <option value="<?= $cat->id; ?>"><?= $cat->name; ?></option>
                                <?php }?>
                              </select>
                            </span>
                          </p>
                        </div>
                        <div class='col-lg-5'>
                          Preview
                        </div>
                      </div>
                    </div>
                  </div>
                  <p> 
                    <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                    <button ng-click="next();" class="btn btn_submit right">Next</button>
                  </p>
                </div>
                
              </div>
            </form>
      </div>
    </div>
</div>
<script type="text/javascript">
  var buzztm = angular.module('buzztm', []);
  buzztm.controller('AddController', ['$scope', '$http',
    function($scope, $http) {
        
        $scope.company = {book_name: 'Book new', no_of_page:2, product_per_page: 3};
        $scope.tab = 1;
        $scope.clicked = false;
        var formData = 0;

        $scope.page = [];
        $scope.templates = [];
        $scope.active_page = -1;
        $scope.selectcategory = '';

        $(document).on("change", "#company_logo", function(e){
            $scope.handleFileSelect(e, true);
        });

        $scope.handleFileSelect = function(evt, manual) {
          evt.stopPropagation();
          evt.preventDefault();
          f = evt.target.files[0];
          formData = new FormData();
          formData.append('file', f);
          formData.append('filename', f.name);
        };

        $scope.select_active_page = function(id){
          $scope.active_page = id;
          $scope.selectcategory = $scope.page[$scope.active_page]['category'] === undefined ? '' : $scope.page[$scope.active_page]['category'];
        };

        $scope.select_template = function(id){
          $scope.page[$scope.active_page]['template'] = id;
          $scope.templates = [];
        };

        $scope.filter_templates = function(){
          $scope.page[$scope.active_page]['category'] = $scope.selectcategory;
          $http.get('<?= $this->Url->build(["controller" => "admin", "action" => "get_templates"]);?>/'+$scope.selectcategory+'/'+$scope.page[$scope.active_page]['page']).
          then(function(res){
            $scope.templates = res['data'];
          });
        };

        $scope.next = function()
        {
            $scope.clicked = true;
            
            if($scope.tab == 4)
            {
              $scope.company['file'] = formData;

              $http.post('<?= $this->Url->build(["controller" => "admin", "action" => "create_company"]);?>', $scope.company)

              .then(function(res){
                if(res['data'] != 'error')
                {
                  if(formData)
                  {
                    $.ajax({
                        url : '<?= $this->Url->build(["controller" => "admin", "action" => "upload_logo"]);?>/'+res['data'],
                        type: "POST",
                        data : formData,
                        processData: false,
                        contentType: false,
                        success:function(response, textStatus, jqXHR){
                            window.location.assign('<?= $this->Url->build(["controller" => "admin", "action" => "company"]);?>');
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            $(".dashboard_section .message").remove();
                            $(".dashboard_section").prepend('<div onclick="this.classList.add(\'hidden\')" class="message error">Error While Uploading Image. Try Again!!.</div>');
                        }
                    });
                  }
                  else
                    window.location.assign('<?= $this->Url->build(["controller" => "admin", "action" => "company"]);?>');
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
              if($scope.tab ==  1)
              {
                $i = 0;
                $scope.page[$i++] = {name: 'Home Page', template: 0, template_attributes: [], page: 1};
                $scope.page[$i++] = {name: 'About us', template: 0, template_attributes: [], page: 2};
                
                if($scope.no_of_page == 1)
                  $scope.page[$i++] = {name: 'Product Page', template: 0, template_attributes: [], page: 4};
                else
                {
                  $scope.page[$i++] = {name: 'Navigation', template: 0, template_attributes: [], page: 3};

                  for(j=0;j<$scope.company.no_of_page;j++)
                  {

                    $scope.page[$i++] = {name: 'Product Page ' + (j+1), template: 0, template_attributes: [], product_per_page: $scope.company.product_per_page, sub_products: [$scope.company.product_per_page], page: 4};
                    
                  }
                }

                $scope.page[$i++] = {name: 'Social Wall', template: 0, template_attributes: [], page: 5};
                $scope.page[$i++] = {name: 'Contact us', template: 0, template_attributes: [], page: 6};
              }

              $scope.tab++;
              $scope.clicked = false;
            }
        };

        $scope.previous = function()
        {
            $scope.tab--;
        };

    }
  ]);
</script> 