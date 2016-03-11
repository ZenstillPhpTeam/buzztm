<ul>
            <li class="<?= $this->request->params['action'] == 'dashboard' ? 'active_menu' : '';?>"><a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'dashboard']); ?>"><i class="icon_menu icon1"></i>Dashboard</a></li>
            <!-- <li class="<?= $this->request->params['action'] == 'company' ? 'active_menu' : '';?>"><a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'company ']); ?>"><i class="icon_menu icon2"></i>Company</a></li>
            <li><a href="#"><i class="icon_menu icon2"></i>Clients</a></li> -->
            <li class="<?= $this->request->params['action'] == 'newBookTemplate' ? 'active_menu' : '';?>"><a href="<?= $this->Url->build(['controller' =>'admin', 'action' => 'new-book-template']); ?>"><i class="icon_menu icon3"></i>Books</a></li>
            <li><a href="javascript:void(0);"><i class="icon_menu icon4"></i>Profile</a></li>
            <li><a href="javascript:void(0);"><i class="icon_menu icon4"></i>Upgrade</a></li>
            <li><a href="javascript:void(0);"><i class="icon_menu icon4"></i>Settings</a></li>
            <!-- <li><a href="#"><i class="icon_menu icon5"></i>lklkjsglkg</a></li> -->
          </ul>