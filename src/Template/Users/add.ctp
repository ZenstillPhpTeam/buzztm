<header>
  <?= $this->Form->create($user) ?>
  <div class="header_section-login">
    <div class="container">
      <div class="row">
	  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	  <div class="clearfix">
	  </div>
	  </div>
	  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 login mrg-top text-center">
	  <div class="bg-color padd-rgt padd-lft row">
	  <h3>SignUp<h3>
	  </div>
	  <div class="heading">
	  <h4>Hello Nice to meet you</h4>
	  </div>
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	  <input type="text" name="username" class="form-control" placeholder="YOUR NAME_">
	  <input type="password" name="password" class="form-control" placeholder="BUSINESS NAME_">
	  <?= $this->Form->input('role', [
            'options' => ['admin' => 'Admin', 'author' => 'Author']
        , 'class' => 'form-control', 'label' => false]) ?>
	  </div>
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
	  <p><button href="" class="btn btn-primary">Submit</a></p>
	  </div>
	  </div>
	  </div>
    </div>
  </div>
  <?= $this->Form->end() ?>
</header>