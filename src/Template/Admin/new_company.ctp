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
            <form onsubmit="return false;" name="new_company" novalidate action="" method="post" class="register_step_form new_company" enctype="multipart/form-data">
              <input type="hidden" ng-model="company.role">
              <div class="register_section">
                <div class="register_step_bg" ng-if="tab==1">
                  <h2>COMPANY DETAILS</h2>
                  <p>
                    <span>Login Name</span>
                    <span><input type="text" name="user_name" ng-model="company.user_name" required></span>
                    <span ng-show="new_company.user_name.$invalid && (!new_company.user_name.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.user_name.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Email</span>
                    <span><input type="email" name="user_email" ng-model="company.user_email" required></span>
                    <span ng-show="new_company.user_email.$invalid && (!new_company.user_email.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.user_email.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Business Name</span>
                    <span><input type="text" ng-model="company.business_name" name="business_name" required></span>
                    <span ng-show="new_company.business_name.$invalid && (!new_company.business_name.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.business_name.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Logo</span>
                    <span><input type="file"  ng-model="company.logo"></span>
                  </p>
                  <p>
                    <span>Default Language</span>
                    <span><input type="text" name="default_language" ng-model="company.default_language" required></span>
                    <span ng-show="new_company.default_language.$invalid && (!new_company.default_language.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.default_language.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Default Timezone</span>
                    <span><input type="text" name="default_timezone" ng-model="company.default_timezone" required></span>
                    <span ng-show="new_company.default_timezone.$invalid && (!new_company.default_timezone.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.default_timezone.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>Currency</span>
                    <span><input type="text" name="currency" ng-model="company.currency" required></span>
                    <span ng-show="new_company.currency.$invalid && (!new_company.currency.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.currency.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p>
                    <span>No of Allowed Books</span>
                    <span><input type="text" name="allowed_books" ng-model="company.allowed_books" required></span>
                    <span ng-show="new_company.allowed_books.$invalid && (!new_company.allowed_books.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.allowed_books.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p> <button ng-click="next();" class="btn btn_submit right">Next</button></p>
                </div>
                <div class="register_step_bg" ng-if="tab==2">
                  <h2>ABOUT COMPANY</h2>
                  <p>
                    <span>About Company</span>
                    <span><textarea rows="5" name="about" ng-model="company.about" required></textarea></span>
                    <span ng-show="new_company.about.$invalid && (!new_company.about.$pristine || clicked)" class="fa fa-times errmsg"></span>
                    <span ng-show="new_company.about.$valid" class="fa fa-check successmsg"></span>
                  </p>
                  <p> 
                    <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                    <button ng-click="next();" class="btn btn_submit right">Next</button>
                  </p>
                </div>
                <div class="register_step_bg" ng-if="tab==3">
                  <h2>CONTACT INFORMATION</h2>
                    <p>
                      <span>Business Phone</span>
                      <span><input type="text" name="phone" ng-model="company.phone"  required></span>
                      <span ng-show="new_company.phone.$invalid && (!new_company.phone.$pristine || clicked)" class="fa fa-times errmsg"></span>
                      <span ng-show="new_company.phone.$valid" class="fa fa-check successmsg"></span>
                    </p>
                    <p>
                      <span>Street Address</span>
                      <span><input type="text" name="address" ng-model="company.address" required></span>
                      <span ng-show="new_company.address.$invalid && (!new_company.address.$pristine || clicked)" class="fa fa-times errmsg"></span>
                      <span ng-show="new_company.address.$valid" class="fa fa-check successmsg"></span>
                    </p>
                    <p>
                      <span>City</span>
                      <span><input type="text" name="city" ng-model="company.city" required></span>
                      <span ng-show="new_company.city.$invalid && (!new_company.city.$pristine || clicked)" class="fa fa-times errmsg"></span>
                      <span ng-show="new_company.city.$valid" class="fa fa-check successmsg"></span>
                    </p>
                    <p>
                      <span>State</span>
                      <span><input type="text" name="state" ng-model="company.state" required></span>
                      <span ng-show="new_company.state.$invalid && (!new_company.state.$pristine || clicked)" class="fa fa-times errmsg"></span>
                      <span ng-show="new_company.state.$valid" class="fa fa-check successmsg"></span>
                    </p>
                    <p>
                      <span>Zipcode</span>
                      <span><input type="text" name="zipcode" ng-model="company.zipcode" required></span>
                      <span ng-show="new_company.zipcode.$invalid && (!new_company.zipcode.$pristine || clicked)" class="fa fa-times errmsg"></span>
                      <span ng-show="new_company.zipcode.$valid" class="fa fa-check successmsg"></span>
                    </p>
                    <p> 
                      <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                      <button ng-click="next();" class="btn btn_submit right">Next</button>
                    </p>
                </div>
                <div class="register_step_bg" ng-if="tab==4">
                  <h2>SOCIAL LINKS</h2>
                    <p>
                      <span>Facebook Url</span>
                      <span><input type="text" ng-model="company.facebook"></span>
                    </p>
                    <p>
                      <span>Twitter Url</span>
                      <span><input type="text" ng-model="company.twitter" ></span>
                    </p>
                    <p>
                      <span>Google+ Url</span>
                      <span><input type="text" ng-model="company.googleplus" ></span>
                    </p>
                    <p>
                      <span>Linkedin Url</span>
                      <span><input type="text" ng-model="company.linkedin" ></span>
                    </p>
                    <p> 
                      <button ng-click="previous();" class="btn btn_submit left">Previous</button>
                      <button ng-click="next();" class="btn btn_submit right">Save</button>
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
        
        $scope.company = {role: 'company', allowed_books: 1};
        $scope.tab = 1;
        $scope.clicked = false;
        var formData = 0;

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
        }

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