<script>
$('.carousel-sync').on('slide.bs.carousel', function(ev) {
    var dir = ev.direction == 'right' ? 'prev' : 'next';
    $('.carousel-sync').not('.sliding').addClass('sliding').carousel(dir);
});
$('.carousel-sync').on('slid.bs.carousel', function(ev) {
    $('.carousel-sync').removeClass('sliding');
});

</script>
<div class="theme_uplode">
          <h3 class="welcome_title">WELCOME <span>Name</span></h3>
          <div class="product_list_slider">
            <div class="my_app">My App</div>
            <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4"> <a href="#" class="producttheme_list"> <span class="theme_label_creation"><i class="fa fa-plus create_plus"></i>Create New Book</span> </a> </div>
            <div id="myCarousel" class="carousel slide col-lg-8 col-xs-12 col-md-8 col-sm-8" data-ride="carousel"> 
              <!-- Wrapper for slides -->
              <div class="carousel-inner product_slider" role="listbox">
                <div class="item active">
                  <div class="span4" style="padding-left: 18px;"> <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-4 col-xs-12 col-md-4 col-sm-4"> <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-4 col-xs-12 col-md-4 col-sm-4"> <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-4 col-xs-12 col-md-4 col-sm-4"> </div>
                </div>
                <div class="item">
                  <div class="span4" style="padding-left: 18px;"> <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-4 col-xs-12 col-md-4 col-sm-4"> <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-4 col-xs-12 col-md-4 col-sm-4"> <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-4 col-xs-12 col-md-4 col-sm-4"> </div>
                </div>
              </div>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
          </div>
        </div>
        <div class="product_list_slider">
          <div class="my_app">Unpublished APPs</div>
          <div id="carousel-a" class="carousel slide col-lg-12 col-xs-12 col-md-12 col-sm-12" data-ride="carousel"> 
            <!-- Wrapper for slides -->
            <div class="carousel-inner product_slider" role="listbox">
              <div class="item active">
                <div class="span4" style="padding-left: 18px;"> 
                    <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-3 col-xs-12 col-md-3 col-sm-3"> 
                    <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-3 col-xs-12 col-md-3 col-sm-3"> 
                    <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-3 col-xs-12 col-md-3 col-sm-3"> 
                    <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-3 col-xs-12 col-md-3 col-sm-3"> 
                </div>
              </div>
              <div class="item">
                <div class="span4" style="padding-left: 18px;"> 
                    <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-3 col-xs-12 col-md-3 col-sm-3"> 
                    <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-3 col-xs-12 col-md-3 col-sm-3"> 
                    <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-3 col-xs-12 col-md-3 col-sm-3"> 
                    <img src="<?= $this->Url->build('/images/product_view.jpg'); ?>" class="img-thumbnail col-lg-3 col-xs-12 col-md-3 col-sm-3"> 
                </div>
              </div>
            </div>
            <a class="right carousel-control" href="#carousel-a" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> <a class="left carousel-control" href="#carousel-a" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
        <div class="total_view">
          <h4>TOTAL VIEWS</h4>
          <ul>
            <li class="view_all"></li>
            <li class="view_empty"></li>
          </ul>
        </div>