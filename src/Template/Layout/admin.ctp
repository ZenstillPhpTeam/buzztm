<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
        <?= 'MyBuzzTm '; ?>:
        <?= $this->fetch('title') ?>
    </title>
<?= $this->Html->css(array('bootstrap.min', 'styles', 'font-awesome.min', 'updates')) ?>
<?= $this->Html->script(array('jquery.min', 'bootstrap.min', 'html2canvas')) ?>
<script type="text/javascript">
$(document).ready(function(){
	$(".toggle").css("display", "none");
    $(".trigger").click(function(){
    var div = $(this).next(".toggle");
    $(".toggle").not(div).slideUp("slow");
    div.slideToggle("slow");
  });
  
  
$(function(){
	var rHeight = 	$(document).height() - ( $("header").height()+$("#footer_sec").height());
    $('.Left_menulist').css({'height':(rHeight)+'px'});
    $(window).resize(function(){
        $('.Left_menulist').css({'height':($(document).height())+'px'});
    });
});

});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
</head>

<body>
<?= $this->element('Admin/header');?>
<section>
  <div class="dashboard_section">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?= $this->element('Admin/navigation');?>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
  </div>
</section>
<footer>
  <div class="footer_sec" id="footer_sec">
    <div class="footer_text">Copyright 2015 advertisement.com &nbsp; &nbsp; &nbsp;<a href="#">Developed By : zenstill.com</a></div>
  </div>
</footer>
</body>
</html>
