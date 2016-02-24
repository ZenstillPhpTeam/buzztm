<div class="row"> 
        <div class="left_menufuction">
          <ul class="Left_menulist">
            <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'dashboard']); ?>"> <i class="fa fa-dashboard"></i> <span class="title">Dashboard</span> </a> </li>
            <li> <a href="#" class="trigger"> <i class="fa fa-user"></i> <span class="title">Company</span> <span class="arrow "></span> </a>
              <ul class="sub-menu toggle">
                <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'company ']); ?>">Company List</a> </li>
                <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'new_company']); ?>">Add New Company</a> </li>
              </ul>
            </li>
            <li> <a href="#" class="trigger"> <i class="fa fa-photo"></i> <span class="title">Templates</span> <span class="arrow "></span> </a>
              <ul class="sub-menu toggle">
                <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'template']); ?>">Template List</a> </li>
                <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'new_template']); ?>">Add New Template</a> </li>
              </ul>
            </li>
            <li> <a href="#" class="trigger"> <i class="fa fa-photo"></i> <span class="title">Themes</span> <span class="arrow "></span> </a>
              <ul class="sub-menu toggle">
                <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'theme']); ?>">Theme List</a> </li>
                <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'new_theme']); ?>">Add New Theme</a> </li>
              </ul>
            </li>
            <li> <a href="#" class="trigger"> <i class="fa fa-book"></i> <span class="title">Books</span> <span class="arrow "></span> </a>
              <ul class="sub-menu toggle">
                <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'book']); ?>">Book List</a> </li>
                <li> <a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'new_book']); ?>">Add New Book</a> </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>