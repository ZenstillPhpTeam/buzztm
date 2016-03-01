<header>
  <div class="header_section">
    <div class="container">
      <div class="row">
        <div class="brand_logo"> <a href="#"><?= $this->Html->image('buzz_logo.png', ['style' => 'width:160px;']);?></a> </div>
        <div class="header_logout"> <a href="<?= $this->Url->build(['controller' =>'users', 'action' => 'logout']); ?>">LogOut</a> </div>
      </div>
    </div>
  </div>
</header>