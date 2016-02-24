<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title>BuzzTm</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- CSS -->
        <?= $this->Html->css(array('bootstrap.min', 'bootstrap-theme', 'styles', 'updates')) ?>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <?= $this->Html->script(array('jquery.min', 'bootstrap.min', 'html2canvas', 'custom')) ?>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
	</head>

    <body class="book_page" ng-app="buzztm" ng-controller="AddController">
		
    <div class="hide" style="background: #fff;">
    {{page}}
    </div>

		<header>
			<div class="header-top">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-5">
							<div class="col-sm-6">
								<input type="text" class="form-control" ng-model="company.book_name" value="Book Name Here" />
							</div>
							<div class="col-sm-6">
								<select class="form-control" name="company" ng-model="company.company" >
			                        <option value="">Select Company</option>
			                        <?php foreach($company as $cat){?>
			                        <option value="<?= $cat->id; ?>"><?= $cat->username; ?></option>
			                        <?php }?>
			                    </select>
							</div>
						</div>
						
						<div class="col-sm-2">
							<div class="logo text-center">
								<?= $this->Html->image('logo.png', ['class' => 'img-responsive', 'url' => ['controller' => 'admin', 'action' => 'dashboard']]);?>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="right-menu">
								<ul class="list-inline">
									<li>Support</li>
									<li><a href='<?= $this->Url->build(["controller" => "admin", "action" => "dashboard"]);?>' class="btn btn-1">Dashboard</a></li>
									<li><a href="#" ng-disabled="progress() != 100" ng-click="save();" class="btn btn-2">Save</a></li>
									<!-- <li><a href="#" class="btn btn-3">Preview</a></li>
									<li><a href="#" class="btn btn-4">Publish</a></li> -->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-middle">
				<div class="container-fluid level-indicator-panel">
                    <div class="level-indicator" style="width:{{progress()}}%;">
                        <p>{{progress()}}% Done</p>
                    </div>
				</div>
			</div>
			<div class="header-bottom clearfix">
				<a href="#" class="page-btn create-page" ng-click="create_new_page($event);"><i class="fa fa-plus"></i><br/>Create New Page</a>
				
				<a ng-repeat="pa in page" href="#" class="page-btn live-page" ng-class="{active: active_page == $index}" ng-click="select_active_page($index, $event)">
					<span class="live-page-id">{{$index+1}}a</span>
					<span ng-if="pa.page == 4 && page.length != 5" ng-click="remove_page($index)" class="live-page-id trash_icon"><i class="fa fa-trash"></i></span>
					<span ng-if="pa.template" ng-click="remove_page_template($index)" class="live-page-id remove_icon"><i class="fa fa-times"></i></span>
					<span class="live-page-caption">{{pa.name}}</span>
					<img ng-if="pa.template" width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{pa.template}}.png" >
				</a>
				
				<!-- <a href="#" class="page-btn empty-page"></a>
				<a href="#" class="page-btn empty-page"></a> -->
			</div>
		</header>

		<div class="clearfix" ng-show="active_page == -1">
			<div class="row themes_list">
				<div ng-repeat="the in themes track by $index" class="col-sm-2 theme_single" ng-click="select_theme(the)">
					<div class="template_short_preview">
						<img width="50" src="<?= $this->Url->build('/upload/template_image/template_');?>{{the['page_1']}}.png">
						<img width="50" src="<?= $this->Url->build('/upload/template_image/template_');?>{{the['page_2']}}.png">
						<img width="50" src="<?= $this->Url->build('/upload/template_image/template_');?>{{the['page_3']}}.png">
						<img width="50" src="<?= $this->Url->build('/upload/template_image/template_');?>{{the['page_4']}}.png">
						<img width="50" src="<?= $this->Url->build('/upload/template_image/template_');?>{{the['page_5']}}.png">
						<img width="50" src="<?= $this->Url->build('/upload/template_image/template_');?>{{the['page_6']}}.png">
					</div>
					<span>{{the.name}}</span>
				</div>
			</div>
		</div>

		<div class="content" ng-show="active_page != -1">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4">
						<div ng-repeat="(id,tmp) in templates track by $index" class="col-lg-3" ng-click="select_template(id);" ng-show="(!page[active_page]['template']) || (active_sub_page != -1 && !page[active_page]['sub_products'][active_sub_page]['template'])">
                            <img width="100" src="<?= $this->Url->build('/upload/template_image/template_');?>{{id}}.png" >
                            <span classs="template_name">{{tmp}}</span>
                        </div>
						<div class="tools-box" ng-show="(page[active_page]['template'] && active_sub_page == -1) || (active_sub_page != -1 &&page[active_page]['sub_products'][active_sub_page]['template'])">
							<div class="tools-box-header">
								<div class="row">
									<div class="col-sm-6">
										<h2>Page Items</h2>
									</div>
									<div class="col-sm-6 text-right">
										<a class="btn btn-5">Image Library</a>
									</div>
								</div>
							</div>
							<div class="tools-box-content">
								<div class="row">
									<div class="col-sm-4">
										<div class="tools-box-content-left">
											<ul class="tools-menu">
												<li ng-class="{active:attribute_tab == 1}" ng-click="attribute_tab = 1; $event.preventDefault(); reset();"><a href="#">Text</a></li>
												<li ng-class="{active:attribute_tab == 2}" ng-click="attribute_tab = 2; $event.preventDefault(); reset();"><a href="#">Image</a></li>
												<li ng-class="{active:attribute_tab == 3}" ng-click="attribute_tab = 3; $event.preventDefault(); reset();"><a href="#">Background</a></li>
												<li ng-class="{active:attribute_tab == 4}" ng-click="attribute_tab = 4; $event.preventDefault(); reset();"><a href="#">Video</a></li>
											</ul>
											
											<ul class="tools-bottom-menu clearfix" ng-if="attribute_tab != 3">
												<li class="pull-left"><a ng-click="new_attribute($event);" href="#"><i class="fa fa-plus"></i></a></li>
												<li ng-if="data['active_text'] != -1 || data['active_image'] != -1 || data['active_video'] != -1" class="pull-right"><a ng-click="delete_attribute($event)" href="#"><i class="fa fa-trash"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="tools-box-content-stage" ng-if="attribute_tab == 1">
											<div class="img-preview text-center">
												<h3>Text Preview</h3>
												<input data-index="" ng-show="data['active_text'] != -1" ng-enter type="text" id="change_text_val">
											</div>
											
											<div class="tools-box-content-stage-bottom">
												<ul ng-if="active_sub_page == -1" class="list-inline">
													<li ng-repeat="t in page[active_page]['template_attributes']['text']  track by $index" ng-dblclick="change_active_text($index, page[active_page]['template_attributes']['text'][$index]['value'])" ng-class="{active: data['active_text'] == $index}"  >{{page[active_page]['template_attributes']['text'][$index]['value']}}</li>
												</ul>
												<ul ng-if="active_sub_page != -1" class="list-inline">
													<li ng-repeat="t in page[active_page]['sub_products'][active_sub_page]['template_attributes']['text']  track by $index" ng-dblclick="change_active_text($index, page[active_page]['sub_products'][active_sub_page]['template_attributes']['text'][$index]['value'])" ng-class="{active: data['active_text'] == $index}"  >{{page[active_page]['sub_products'][active_sub_page]['template_attributes']['text'][$index]['value']}}</li>
												</ul>
											</div>
										</div>
										<div class="tools-box-content-stage" ng-if="attribute_tab == 2">
											<div class="img-preview text-center">
												<?= $this->Html->image('others/preview.png', ['ng-if' => '!active_tab_image']);?>
												<img data-toggle="modal" data-target="#uploadimageModal" ng-if="active_tab_image" src='{{active_tab_image}}'>
											</div>
											
											<div class="tools-box-content-stage-bottom">
												<ul ng-if="active_sub_page == -1" class="list-inline">
													<li ng-click="change_active_image($index)" ng-class="{active: data['active_image'] == $index}"  ng-repeat="t in page[active_page]['template_attributes']['image']  track by $index">
														<img width="100" src="{{page[active_page]['template_attributes']['image'][$index]['value']}}" >
													</li>
												</ul>
												<ul ng-if="active_sub_page != -1" class="list-inline">
													<li ng-click="change_active_image($index)" ng-class="{active: data['active_image'] == $index}"  ng-repeat="t in page[active_page]['sub_products'][active_sub_page]['template_attributes']['image']  track by $index">
														<img width="100" src="{{page[active_page]['sub_products'][active_sub_page]['template_attributes']['image'][$index]['value']}}" >
													</li>
												</ul>
											</div>
										</div>
										<div class="tools-box-content-stage" ng-if="attribute_tab == 3">
											<div ng-if="active_sub_page == -1" ng-dblclick="change_background_image()" class="img-preview text-center" ng-style="{background:page[active_page]['template_attributes']['background']['value']}">
											</div>
											<div ng-if="active_sub_page != -1" ng-dblclick="change_background_image()" class="img-preview text-center" ng-style="{background:page[active_page]['sub_products'][active_sub_page]['template_attributes']['background']['value']}">
											</div>
										</div>
										<div class="tools-box-content-stage" ng-if="attribute_tab == 4">
											<div class="img-preview text-center">
												<h3>Add Video</h3>
												<input data-index="" ng-show="data['active_video'] != -1" ng-enter-video type="text" id="change_video_val">
											</div>
											
											<div class="tools-box-content-stage-bottom template_video_attributes">
												<ul ng-if="active_sub_page == -1" class="list-inline">
													<li ng-repeat="t in page[active_page]['template_attributes']['video']  track by $index" ng-dblclick="change_active_video($index, page[active_page]['template_attributes']['video'][$index]['value'])" ng-class="{active: data['active_video'] == $index}"  >
														<iframe width="100" height="100" ng-src="{{page[active_page]['template_attributes']['video'][$index]['value'] | trustAsResourceUrl}}" frameborder="0" allowfullscreen></iframe>
													</li>
												</ul>
												<ul ng-if="active_sub_page != -1" class="list-inline">
													<li ng-repeat="t in page[active_page]['sub_products'][active_sub_page]['template_attributes']['video']  track by $index" ng-dblclick="change_active_video($index, page[active_page]['sub_products'][active_sub_page]['template_attributes']['video'][$index]['value'])" ng-class="{active: data['active_video'] == $index}"  >
														<iframe width="100" height="100" ng-src="{{page[active_page]['sub_products'][active_sub_page]['template_attributes']['video'][$index]['value'] | trustAsResourceUrl}}" frameborder="0" allowfullscreen></iframe>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="page-menu-panel">
							<div class="page-menu-part">
								<h4>Switch View</h4>
								<div class="view-switcher list">
									<a href="#"><i class="fa fa-television"></i></a>
									<a href="#"><i class="fa fa-mobile"></i></a>
								</div>
							</div>
							<div class="page-menu-part">
								<h4>Page Settings</h4>
								<div class="page-menu list">
									<a href="#" class="btn btn-block btn-6">Page CATEGORY</a>
									<select ng-disabled="page[active_page]['template'] && (active_sub_page == -1 || page[active_page]['sub_products'][active_sub_page]['template'])" ng-change="filter_templates()" ng-model="selectcategory">
		                                <option value="">Select Category</option>
		                                <?php foreach($categories as $cat){?>
		                                <option value="<?= $cat->id; ?>"><?= $cat->name; ?></option>
		                                <?php }?>
		                              </select>
									<a href="#" class="btn btn-block btn-6">Page Type</a>
									<select disabled name="page_type" ng-model="company.page_type" required>
				                        <option value="">Select Page</option>
				                        <option value="1">Home Page</option>
				                        <option value="2">About us</option>
				                        <option value="3">Navigation</option>
				                        <option value="4">Product Page</option>
				                        <option value="5">Social Wall</option>
				                        <option value="6">Contact</option>
				                      </select>
								</div>
							</div>
							
							<div class="page-menu-part" ng-show="data['active_image'] != -1 || data['active_video'] != -1">
								<h4>Width Adjust</h4>
								<div id="wslider"></div>
								<h4>Height Adjust</h4>
								<div id="hslider"></div>
							</div>

							<!-- <div class="page-menu-part">
								<h4>Text Tools</h4>
								<div class="page-menu list">
									<a href="#" class="btn btn-block btn-6">Page FONT SELECTION</a>
								</div>
								<div class="page-menu list">
									<a href="#" class="btn btn-6">14</a>
									<a href="#" class="btn btn-6"><i class="fa fa-bold"></i></a>
									<a href="#" class="btn btn-6"><i class="fa fa-rotate-left"></i></a>
									<a href="#" class="btn btn-6"><i class="fa fa-rotate-right"></i></a>
								</div>
							</div>
							<div class="page-menu-part">
								<h4>PROPERTIES</h4>
								<div class="row">
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="X:" />
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="Y:" />
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="W:" />
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="H:" />
									</div>
								</div>
								<ul class="list-inline">
									<li><a href="#"><i class="fa fa-align-left"></i></a></li>
									<li><a href="#"><i class="fa fa-align-center"></i></a></li>
									<li><a href="#"><i class="fa fa-align-right"></i></a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<div class="col-sm-4">
						<div class="book-preview clearfix ">
							<?= $this->Html->image('others/book-preview.png', ['class' => 'img-responsive', 'ng-if' => "page[active_page]['template_attributes'].length == 0 && page[active_page]['sub_products'][active_sub_page]['template_attributes'].length == 0"]);?>
								<div ng-show="active_sub_page == -1" style="position:relative;overflow:hidden; margin:0 auto;width:{{page[active_page]['template_attributes']['template'].width}}px; height:{{page[active_page]['template_attributes']['template'].height}}px;background:{{page[active_page]['template_attributes']['background']['value']}}">
			                        <span ng-repeat="t in page[active_page]['template_attributes']['text']  track by $index" on-finish-text-render class="draggable_text" style="position:absolute;" data-index="{{$index}}" ng-style="{top: page[active_page]['template_attributes']['text'][$index]['top'], left: page[active_page]['template_attributes']['text'][$index]['left']}">
			                          <abbr>{{page[active_page]['template_attributes']['text'][$index]['value'] }}</abbr>
			                        </span>
			                        <span ng-repeat="t in page[active_page]['template_attributes']['image']  track by $index" on-finish-image-render class="draggable_image" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:{{$index*40}}px; left:50%;" data-index="{{$index}}" ng-style="{top: page[active_page]['template_attributes']['image'][$index]['top'], left: page[active_page]['template_attributes']['image'][$index]['left'], width: page[active_page]['template_attributes']['image'][$index]['width'], height: page[active_page]['template_attributes']['image'][$index]['height']}">
			                          <img width="100%" height="100%" src="{{page[active_page]['template_attributes']['image'][$index]['value']}}" >
			                        </span>
			                        <div ng-repeat="t in page[active_page]['template_attributes']['video']  track by $index" on-finish-video-render class="draggable_video" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:50%; left:50%;" data-index="{{$index}}" ng-style="{top: page[active_page]['template_attributes']['video'][$index]['top'], left: page[active_page]['template_attributes']['video'][$index]['left'], width: page[active_page]['template_attributes']['video'][$index]['width'], height: page[active_page]['template_attributes']['video'][$index]['height']}">
			                          <iframe width="100%" height="100%" ng-src="{{page[active_page]['template_attributes']['video'][$index]['value'] | trustAsResourceUrl}}" ></iframe>
			                        </div>
			                    </div>

			                    <div ng-show="active_sub_page != -1" style="position:relative;overflow:hidden; margin:0 auto;width:{{page[active_page]['template_attributes']['template'].width}}px; height:{{page[active_page]['sub_products'][active_sub_page]['template_attributes']['template'].height}}px;background:{{page[active_page]['sub_products'][active_sub_page]['template_attributes']['background']['value']}}">
			                        <span ng-repeat="t in page[active_page]['sub_products'][active_sub_page]['template_attributes']['text']  track by $index" on-finish-text-render class="draggable_text" style="position:absolute;" data-index="{{$index}}" ng-style="{top: page[active_page]['sub_products'][active_sub_page]['template_attributes']['text'][$index]['top'], left: page[active_page]['sub_products'][active_sub_page]['template_attributes']['text'][$index]['left']}">
			                          <abbr>{{page[active_page]['sub_products'][active_sub_page]['template_attributes']['text'][$index]['value'] }}</abbr>
			                        </span>
			                        <span ng-repeat="t in page[active_page]['sub_products'][active_sub_page]['template_attributes']['image']  track by $index" on-finish-image-render class="draggable_image" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:{{$index*40}}px; left:50%;" data-index="{{$index}}" ng-style="{top: page[active_page]['sub_products'][active_sub_page]['template_attributes']['image'][$index]['top'], left: page[active_page]['sub_products'][active_sub_page]['template_attributes']['image'][$index]['left'], width: page[active_page]['sub_products'][active_sub_page]['template_attributes']['image'][$index]['width'], height: page[active_page]['sub_products'][active_sub_page]['template_attributes']['image'][$index]['height']}">
			                          <img width="100%" height="100%" src="{{page[active_page]['sub_products'][active_sub_page]['template_attributes']['image'][$index]['value']}}" >
			                        </span>
			                        <div ng-repeat="t in page[active_page]['sub_products'][active_sub_page]['template_attributes']['video']  track by $index" on-finish-video-render class="draggable_video" ng-class="{active: data['active_image'] == $index}" style="position:absolute; top:50%; left:50%;" data-index="{{$index}}" ng-style="{top: page[active_page]['sub_products'][active_sub_page]['template_attributes']['video'][$index]['top'], left: page[active_page]['sub_products'][active_sub_page]['template_attributes']['video'][$index]['left'], width: page[active_page]['sub_products'][active_sub_page]['template_attributes']['video'][$index]['width'], height: page[active_page]['sub_products'][active_sub_page]['template_attributes']['video'][$index]['height']}">
			                          <iframe width="100%" height="100%" ng-src="{{page[active_page]['sub_products'][active_sub_page]['template_attributes']['video'][$index]['value'] | trustAsResourceUrl}}" ></iframe>
			                        </div>
			                    </div>

						</div>
					</div>
					<div class="col-sm-2">
						<div ng-show="page[active_page].page == 4 && page[active_page]['template']" class="sub_product_page" ng-init="tmp_letter_data = []; ">
							<a href="#" class="page-btn create-page" ng-click="create_new_product_page($event);"><i class="fa fa-plus"></i><br/>Create New Page</a>

							<a ng-repeat="pa in page[active_page].sub_products" href="#" class="page-btn live-page" ng-class="{active: active_sub_page == $index}" ng-click="select_active_sub_page($index, $event)" ng-init="tmp_letter = $index == 0 ? 'b' : nextletter(); $parent.tmp_letter_data = ($index == 0) ? [] : $parent.tmp_letter_data ; $parent.tmp_letter_data[$index] = tmp_letter; $parent.tmp_letter = tmp_letter" data-id="{{tmp_letter}}">
								<span class="live-page-id">{{active_page+1}}{{tmp_letter_data[$index]}}</span>
								<span ng-click="remove_product($index)" class="live-page-id trash_icon"><i class="fa fa-trash"></i></span>
								<span ng-if="pa.template" ng-click="remove_product_template($index)" class="live-page-id remove_icon"><i class="fa fa-times"></i></span>
								<span class="live-page-caption">{{pa.name}}</span>
								<img ng-if="pa.template" width="65" src="<?= $this->Url->build('/upload/template_image/template_');?>{{pa.template}}.png" >
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
    

		<a data-toggle="modal" data-target="#myModal" class="hide modal_image_upload"></a>

		<div id="uploadimageModal" class="modal fade" role="dialog">
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js" type="text/javascript"></script>

        <script type="text/javascript">
var buzztm = angular.module('buzztm', []);
var preview_width = 400, preview_height = 500;
var default_img = "<?= $this->Url->build('/img/image_placeholder.png');?>";
var default_video = "https://www.youtube.com/embed/BtufKuPCJMo";


buzztm.filter('trustAsResourceUrl', ['$sce', function($sce) {
    return function(val) {
        return $sce.trustAsResourceUrl(val);
    };
}]);

buzztm.directive('ngEnter', function() {
        return function(scope, element, attrs) {
            element.bind("keydown keypress", function(event) {
                if(event.which === 13) {
                        scope.$apply(function(){
                                if(scope.active_sub_page == -1)
                                {
                                	scope.page[scope.active_page]['template_attributes']['text'][scope.data['active_text']]['value'] = element.val();
                                }
                                else
                                {
                                	scope.page[scope.active_page]['sub_products'][scope.active_sub_page]['template_attributes']['text'][scope.data['active_text']]['value'] = element.val();
                                }
                                scope.data['active_text'] = -1;
                                scope.data['active_video'] = -1;
                                scope.data['background_st'] = 0;
                        });
                        
                        event.preventDefault();
                }
            });
        };
});

buzztm.directive('ngEnterVideo', function() {
        return function(scope, element, attrs) {
            element.bind("keydown keypress", function(event) {
                if(event.which === 13) {
                        scope.$apply(function(){
                                if(scope.active_sub_page == -1)
                                {
                                	scope.page[scope.active_page]['template_attributes']['video'][scope.data['active_video']]['value'] = element.val();
                                }
                                else
                                {
                                	scope.page[scope.active_page]['sub_products'][scope.active_sub_page]['template_attributes']['video'][scope.data['active_video']]['value'] = element.val();
                                }
                                scope.data['active_text'] = -1;
                                scope.data['active_video'] = -1;
                                scope.data['background_st'] = 0;
                        });
                        
                        event.preventDefault();
                }
            });
        };
});

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
                            if(scope.active_sub_page == -1)
                            {
                            	ttop = (ui.position.top / preview_height) * 100;
                            	scope.page[scope.active_page]['template_attributes']['text'][ind]['top'] = ttop.toFixed(2)+'%';
                            	lleft = (ui.position.left / preview_width) * 100;
                            	scope.page[scope.active_page]['template_attributes']['text'][ind]['left'] = lleft.toFixed(2)+'%';
                            }
                            else
                            {
                            	ttop = (ui.position.top / preview_height) * 100;
                            	scope.page[scope.active_page]['sub_products'][scope.active_sub_page]['template_attributes']['text'][ind]['top'] = ttop.toFixed(2)+'%';
                            	lleft = (ui.position.left / preview_width) * 100;
                            	scope.page[scope.active_page]['sub_products'][scope.active_sub_page]['template_attributes']['text'][ind]['left'] = lleft.toFixed(2)+'%';
                            }
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
                            if(scope.active_sub_page == -1)
                            {
                            	ttop = (ui.position.top / preview_height) * 100;
                            	scope.page[scope.active_page]['template_attributes']['image'][ind]['top'] = ttop.toFixed(2)+'%';
                            	lleft = (ui.position.left / preview_width) * 100;
                            	scope.page[scope.active_page]['template_attributes']['image'][ind]['left'] = lleft.toFixed(2)+'%';
                            }
                            else
                            {
                            	ttop = (ui.position.top / preview_height) * 100;
                            	scope.page[scope.active_page]['sub_products'][scope.active_sub_page]['template_attributes']['image'][ind]['top'] = ttop.toFixed(2)+'%';
                            	lleft = (ui.position.left / preview_width) * 100;
                            	scope.page[scope.active_page]['sub_products'][scope.active_sub_page]['template_attributes']['image'][ind]['left'] = lleft.toFixed(2)+'%';
                            }
                          });
                        }
                      }
                      );
                });
            }
        }
    }
}]);

  buzztm.directive('onFinishVideoRender',['$timeout', '$parse', function ($timeout, $parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
            if (scope.$last === true) {
                $timeout(function () {
                    $(".draggable_video").draggable(
                      {
                        containment: "parent",
                        stop: function( event, ui ) { 
                          ind = $(this).data("index");
                          scope.$apply(function(){
                            if(scope.active_sub_page == -1)
                            {
                            	ttop = (ui.position.top / preview_height) * 100;
                            	scope.page[scope.active_page]['template_attributes']['video'][ind]['top'] = ttop.toFixed(2)+'%';
                            	lleft = (ui.position.left / preview_width) * 100;
                            	scope.page[scope.active_page]['template_attributes']['video'][ind]['left'] = lleft.toFixed(2)+'%';
                            }
                            else
                            {
                            	ttop = (ui.position.top / preview_height) * 100;
                            	scope.page[scope.active_page]['sub_products'][scope.active_sub_page]['template_attributes']['video'][ind]['top'] = ttop.toFixed(2)+'%';
                            	lleft = (ui.position.left / preview_width) * 100;
                            	scope.page[scope.active_page]['sub_products'][scope.active_sub_page]['template_attributes']['video'][ind]['left'] = lleft.toFixed(2)+'%';
                            }
                          });
                        }
                      }
                      );
                });
            }
        }
    }
}]);

  buzztm.controller('AddController', ['$scope', '$http',
    function($scope, $http) {
        
    	$( "#wslider" ).slider({
			change : function (e, ui)
			{
				wwidth = $(this).slider( "value" );
				
				if($scope.data['active_image'] == -1)
				{
					ind = $scope.data['active_video'];
					ttype = 'video';
				}
				else
				{
					ind = $scope.data['active_image'];
					ttype = 'image';
				}

				$scope.$apply(function(){
					if($scope.active_sub_page == -1)
	                {
	                    $scope.page[$scope.active_page]['template_attributes'][ttype][ind]['width'] = wwidth+'%';
	                }
	                else
	                {
	                    $scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes'][ttype][ind]['width'] = wwidth+'%';
	                }
				});
			}
		});

		$( "#hslider" ).slider({
			change : function (e, ui)
			{
				wwidth = $(this).slider( "value" );
				
				if($scope.data['active_image'] == -1)
				{
					ind = $scope.data['active_video'];
					ttype = 'video';
				}
				else
				{
					ind = $scope.data['active_image'];
					ttype = 'image';
				}

				$scope.$apply(function(){
					if($scope.active_sub_page == -1)
	                {
	                    $scope.page[$scope.active_page]['template_attributes'][ttype][ind]['height'] = wwidth ? wwidth+'%' : 'auto';
	                }
	                else
	                {
	                    $scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes'][ttype][ind]['height'] = wwidth ? wwidth+'%' : 'auto';
	                }
				});
			}
		});

    	$scope.progress = function(){

    		cnt = 0;
    		sub_page_length = 0;

    		angular.forEach($scope.page, function(value, key) {
			  if(value.template)cnt++;

			  if(value.page == 4)
			  {
			  	sub_page_length += value.sub_products.length;
			  	angular.forEach(value.sub_products, function(v1, k1) {
			  		if(v1.template)cnt++;
			  	});
			  }
			});

    		return Math.round((100/($scope.page.length + sub_page_length)) * cnt);
    	};

    	$scope.getNumber = function(num) {
            return new Array(num);   
        };

    	$scope.reset = function(){
          $scope.data['active_text'] = -1;
          $scope.data['active_image'] = -1;
          $scope.data['background_st'] = -1;
          $scope.data['active_video'] = -1;
          $scope.active_tab_image = '';
        };

    	$scope.change_active_text = function(ind, txt)
        {
          $("#change_text_val").val(txt);
          $scope.data['active_text'] = ind;
          $scope.data['active_image'] = -1;
          $scope.data['background_st'] = -1;
          $scope.data['active_video'] = -1;

          $scope.active_tab_image = '';
        };

        $scope.change_active_video = function(ind, txt)
        {
          $("#change_video_val").val(txt);
          $scope.data['active_text'] = -1;
          $scope.data['active_image'] = -1;
          $scope.data['background_st'] = -1;
          $scope.data['active_video'] = ind;

          $scope.active_tab_image = '';
        };

        $scope.change_active_image = function(ind)
        {
          $scope.data['active_text'] = -1;
          $scope.data['active_video'] = -1;
          $scope.data['active_image'] = ind;
          $scope.data['background_st'] = -1;

          if($scope.active_sub_page == -1)
          	$scope.active_tab_image = $scope.page[$scope.active_page]['template_attributes']['image'][ind]['value'];
          else
          	$scope.active_tab_image = $scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['image'][ind]['value'];
        };

        $scope.change_background_image = function(ind)
        {
          $scope.data['active_text'] = -1;
          $scope.data['active_image'] = -1;
          $scope.data['active_video'] = -1;
          $scope.data['background_st'] = 1;

          $scope.active_tab_image = '';

          $('#uploadimageModal').modal("show");
        };

        $('#uploadimageModal').on('hidden.bs.modal', function () {
            $scope.$apply(function(){
              $scope.data['background_st'] = 0;
              $scope.data['active_text'] = -1;
              $scope.data['active_image'] = -1;
              $scope.data['active_video'] = -1;
              $scope.upload_button_text = 'Upload';
              $scope.active_tab_image = '';
            });
        });

        <?php if($clone){?>
        	post_url = '<?= $this->Url->build(["controller" => "admin", "action" => "create_book"]);?>';
        <?php }else{?>
        	post_url = '<?= $this->Url->build(["controller" => "admin", "action" => "update_book", $id]);?>';
        <?php }?>

        $scope.page = <?= json_encode($page); ?>;
        $scope.company = <?= json_encode($book); ?>;
        $scope.tab = 1;
        $scope.clicked = false;
        $scope.attribute_tab = 1;
        $scope.data = {active_text: -1, active_image: -1, background_st: 0, active_video: -1};
        $scope.active_tab_image = '';
        $scope.upload_button_text = 'Upload';
        $scope.templates = [];
        $scope.active_page = -1;
        $scope.active_sub_page = -1;
        $scope.selectcategory = '';
        $scope.defaultproductpage = {template: 0,  template_attributes: []};
        $scope.themes = [];
        $scope.selected_theme = {};

        var formData = 0;
        $i = 0;

        $scope.create_new_page = function(e){
        	e.preventDefault();

        	page_cnt = 0;

        	angular.forEach($scope.page, function(v,k){
        		if(v.page == 4)
        			page_cnt++;
        	});

        	if(page_cnt == 1)
        	{
        		if($scope.selected_theme['page_3'] !== undefined)
        		{
        			
        			$http.get('<?= $this->Url->build(["controller" => "admin", "action" => "get_template_attributes"]);?>/'+$scope.selected_theme['page_3']).
			          then(function(res){
			            $scope.page.splice(2, 0, {name: 'Navigation', template: $scope.selected_theme['page_3'], template_attributes: res['data'], page: 3});
			            $scope.page.splice(4, 0, {name: 'Product Page 2', template: $scope.defaultproductpage['template'], template_attributes: $scope.defaultproductpage['template_attributes'], page: 4, sub_products: []});
			          });
			    }
			    else
			    {	
			    	$scope.page.splice(2, 0, {name: 'Navigation', template: 0, template_attributes: [], page: 3});

        			$scope.page.splice(4, 0, {name: 'Product Page 2', template: $scope.defaultproductpage['template'], template_attributes: $scope.defaultproductpage['template_attributes'], page: 4, sub_products: []});
        		}
        	}
        	else
        	{
        		$scope.page.splice((3 + page_cnt), 0, {name: 'Product Page '+(page_cnt + 1), template: $scope.defaultproductpage['template'], template_attributes: $scope.defaultproductpage['template_attributes'], page: 4, sub_products: []});
        	}
        };

        $scope.remove_page = function(ind){
			page_cnt = 0;

        	angular.forEach($scope.page, function(v,k){
        		if(v.page == 4)
        			page_cnt++;
        	});

        	if(page_cnt == 2)
        	{
        		$scope.page.splice(ind, 1);
        		$scope.page.splice(2, 1);
        	}
        	else
        	{
        		$scope.page.splice(ind, 1);
        	}

        	$scope.active_page = -1;
        };

        $scope.remove_product = function(ind){
			
			$scope.page[$scope.active_page]['sub_products'].splice(ind, 1);

        	$scope.active_sub_page = -1;
        };


        $(document).on("change", ".file_uploaded", function(e){
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
                              if($scope.active_sub_page == -1)
                              	$scope.page[$scope.active_page]['template_attributes']['background']['value'] = "url('<?= $this->Url->build('/upload/template/');?>"+response+"')  no-repeat scroll 0 0 / 100% 100% ";
                              else
                              	$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['background']['value'] = "url('<?= $this->Url->build('/upload/template/');?>"+response+"')  no-repeat scroll 0 0 / 100% 100% ";
                            }
                            else
                            {
                                if($scope.active_sub_page == -1)
                                	$scope.page[$scope.active_page]['template_attributes']['image'][$scope.data['active_image']]['value'] = "<?= $this->Url->build('/upload/template/');?>"+response;
                                else
                                	$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['image'][$scope.data['active_image']]['value'] = "<?= $this->Url->build('/upload/template/');?>"+response;
                                $scope.data['background_st'] = 0;
                            }
                            
                            $('#uploadimageModal').modal('hide');
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
        };

        $scope.select_active_page = function(id, e){
          e.preventDefault();
          $scope.active_page = id;
          $scope.active_sub_page = -1;
          $scope.selectcategory = $scope.page[$scope.active_page]['category'] === undefined ? '' : $scope.page[$scope.active_page]['category'];
          $scope.company.page_type = $scope.page[$scope.active_page]['page'].toString();
          $scope.reset();
        };

        $scope.select_active_sub_page = function(id, e){
          e.preventDefault();
          $scope.active_sub_page = id;
          $scope.selectcategory = $scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['category'] === undefined ? '' : $scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['category'];
          $scope.company.page_type = $scope.page[$scope.active_page]['page'].toString();
          $scope.reset();
        };

        $scope.select_template = function(id){
          
          if($scope.active_sub_page == -1)
          {
          	  $scope.page[$scope.active_page]['template'] = id;
	          $scope.templates = [];

	          if($scope.page[$scope.active_page].page == 4)
	          		$scope.defaultproductpage['template'] = id;

	          $http.get('<?= $this->Url->build(["controller" => "admin", "action" => "get_template_attributes"]);?>/'+id).
	          then(function(res){
	            $scope.page[$scope.active_page]['template_attributes'] = res['data'];

	            if($scope.page[$scope.active_page].page == 4)
	          		$scope.defaultproductpage['template_attributes'] = res['data'];
	          });
          }
          else
          {
          	  $scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template'] = id;
	          $scope.templates = [];

	          $http.get('<?= $this->Url->build(["controller" => "admin", "action" => "get_template_attributes"]);?>/'+id).
	          then(function(res){
	            $scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes'] = res['data'];
	          });
          }
        };

        $scope.filter_templates = function(){
          
          if($scope.active_sub_page == -1)
          	$scope.page[$scope.active_page]['category'] = $scope.selectcategory;
          else
          	$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['category'] = $scope.selectcategory;

          $http.get('<?= $this->Url->build(["controller" => "admin", "action" => "get_templates"]);?>/'+$scope.selectcategory+'/'+$scope.page[$scope.active_page]['page']).
          then(function(res){
            $scope.templates = res['data'];
          });
        };

        $scope.save = function()
        {
        	book_data = {book: $scope.company, page: $scope.page};

        	$http.post(post_url, book_data)

              .then(function(res){
                if(res['data'] != 'error')
                {
                  window.location.assign('<?= $this->Url->build(["controller" => "admin", "action" => "book"]);?>');
                }
                else
                {
                  $(".dashboard_section .message").remove();
                  $(".dashboard_section").prepend('<div onclick="this.classList.add(\'hidden\')" class="message error">Error While Creating Book. Try Again!!.</div>');
                }
              });
        };

        $scope.nextletter = function(){
		    return $scope.tmp_letter.replace(/([a-zA-Z])[^a-zA-Z]*$/, function(a){
		        var c= a.charCodeAt(0);
		        switch(c){
		            case 90: return 'A';
		            case 122: return 'a';
		            default: return String.fromCharCode(++c);
		        }
		    });
		};

		$scope.create_new_product_page = function(e){
			e.preventDefault();

			$scope.page[$scope.active_page].sub_products.push({name: 'Sub Page', template: $scope.page[$scope.active_page]['template'], template_attributes: $scope.page[$scope.active_page]['template_attributes']});
		};

		$scope.remove_page_template = function(ind){
			$scope.page[ind]['template'] = 0;
			$scope.page[ind]['template_attributes'] = [];
		};

		$scope.remove_product_template = function(ind){
			$scope.page[$scope.active_page]['sub_products'][ind]['template'] = 0;
			$scope.page[$scope.active_page]['sub_products'][ind]['template_attributes'] = [];
		};

		$scope.select_theme = function(theme){
			$scope.selected_theme = theme;
			angular.forEach($scope.page, function(v,k){
				v['template'] = theme['page_'+v['page']];
				v['category'] = theme['category_type'];

				if(v['page'] == 4)
	          		$scope.defaultproductpage['template'] = theme['page_'+v['page']];

	          	$http.get('<?= $this->Url->build(["controller" => "admin", "action" => "get_template_attributes"]);?>/'+theme['page_'+v['page']]).
		          then(function(res){
		            v['template_attributes'] = res['data'];

		            if(v['page']  == 4)
		          		$scope.defaultproductpage['template_attributes'] = res['data'];
		          });
			});
		};

		$scope.new_attribute = function(e){
			e.preventDefault();

			if($scope.active_sub_page == -1)
			{
				if($scope.attribute_tab == 1)
				{
					fcount = $scope.page[$scope.active_page]['template_attributes']['text'].length + 1;
					ddata = {"field_type":"text","value":"Input "+fcount,"pos_top":"0","pos_left":"0","link":"","top":"0","left":"0"};
					$scope.page[$scope.active_page]['template_attributes']['text'].push(ddata);
				}
				else if($scope.attribute_tab == 2)
				{
					ddata = {"field_type":"image","value":default_img,"pos_top":"0","pos_left":"50%","link":"","top":"0","left":"50%", width: "20%", height: "auto"};
					$scope.page[$scope.active_page]['template_attributes']['image'].push(ddata);
				}
				else if($scope.attribute_tab == 4)
				{
					ddata = {"field_type":"video","value":default_video,"pos_top":"0","pos_left":"50%","link":"","top":"50%","left":"50%", width: "20%", height: "auto"};
					$scope.page[$scope.active_page]['template_attributes']['video'].push(ddata);
				}
			}
			else
			{
				if($scope.attribute_tab == 1)
				{
					fcount = $scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['text'].length + 1;
					ddata = {"field_type":"text","value":"Input "+fcount,"pos_top":"0","pos_left":"0","link":"","top":"0","left":"0"};
					$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['text'].push(ddata);
				}
				else if($scope.attribute_tab == 2)
				{
					ddata = {"field_type":"image","value":default_img,"pos_top":"0","pos_left":"50%","link":"","top":"0","left":"50%", width: "20%", height: "auto"};
					$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['image'].push(ddata);
				}
				else if($scope.attribute_tab == 4)
				{
					ddata = {"field_type":"video","value":default_video,"pos_top":"0","pos_left":"50%","link":"","top":"50%","left":"50%", width: "20%", height: "auto"};
					$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['video'].push(ddata);
				}
			}
		};

		$scope.delete_attribute = function(e){
			e.preventDefault();

			if($scope.active_sub_page == -1)
			{
				if($scope.attribute_tab == 1)
				{
					$scope.page[$scope.active_page]['template_attributes']['text'].splice($scope.data['active_text'], 1);
				}
				else if($scope.attribute_tab == 2)
				{
					$scope.page[$scope.active_page]['template_attributes']['image'].splice($scope.data['active_image'], 1);
				}
				else if($scope.attribute_tab == 4)
				{
					$scope.page[$scope.active_page]['template_attributes']['video'].splice($scope.data['active_video'], 1);
				}
			}
			else
			{
				if($scope.attribute_tab == 1)
				{
					$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['text'].splice($scope.data['active_text'], 1);
				}
				else if($scope.attribute_tab == 2)
				{
					$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['image'].splice($scope.data['active_image'], 1);
				}
				else if($scope.attribute_tab == 4)
				{
					$scope.page[$scope.active_page]['sub_products'][$scope.active_sub_page]['template_attributes']['video'].splice($scope.data['active_video'], 1);
				}
			}

			$scope.reset();
		};
    }
  ]);
</script> 
    </body>
</html>
