<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin BuzzTm</title>
<?= $this->Html->css(array('bootstrap.min', 'buzztm_styles', 'font-awesome.min', 'updates')) ?>
<?= $this->Html->script(array('jquery.min', 'bootstrap.min', 'html2canvas')) ?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
</head>

<body>
<?= $this->element('Admin/buzztm_header');?>
<section>
  <div class="container">
    <div class="createnew_section">
      <div class="col-xs-12 col-sm-3 col-lg-3">
        <div class="profile_section"> 
          <img src="<?= $this->Url->build('/images/profile.png'); ?>" /> 
          <span class="profile_name"><?= $loggedInUser['username'];?></span> 
        </div>
        <div class="list_menu_tag">
          	<?= $this->element('Admin/buzztm_navigation');?>
        </div>
        <div class="need_help"><a href="#">Need Help</a></div>
      </div>
      <div class="col-xs-12 col-sm-9 col-lg-9">
          <?= $this->Flash->render() ?>
        	<?= $this->fetch('content') ?>
        </div>
      </div>
    </div>
  </div>
</section>
<footer>
  <div class="footer_section"> <span>COPYRIGHT RESERVED 2016</span> </div>
</footer>
</body>
</html>