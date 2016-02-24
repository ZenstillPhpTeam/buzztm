<header>
  <div class="head-sect">
    <div class="container">
      <div class="row">
        <nav class="header-list">
          <ul>
            <li><a href="#">Welcome <?= $loggedInUser['username'];?></a></li>
            <li><a href="<?= $this->Url->build(['controller' =>'users', 'action' => 'logout']); ?>">Logout</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="header_logo">
    <div class="container">
      <div class="row">
        <div id="header_logo" class="col-xs-12 col-sm-4 col-lg-3"> <a href="#"><?= $this->Html->image('buzz_logo.png', ['style' => 'width:160px;']);?></a> </div>
        <div id="pos_search_top" class="wrap_seach list-inline col-xs-12 col-sm-8 col-lg-9 hide">
          <form method="get" action=" " id="searchbox" class="form-inline form_search" role="form">
            <input class="search_query form-control ac_input" type="text" placeholder="Enter your search key ... " id="pos_query_top" name="search_query" value="" >
            <button type="submit" value="Search" class="btn btn-default submit_search"> <i class="icon-search"></i> </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>