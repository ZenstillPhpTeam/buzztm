<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class CustomHelper extends Helper
{
    public function company_profile($id)
    {
        $this->UserProfiles = TableRegistry::get('UserProfiles');
    	return $this->UserProfiles->find('all', ['conditions' => ['UserProfiles.user_id' => $id]])->first();
    }

    public function template_attributes($id)
    {
        $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
    	return $this->TemplateAttributes->find('all', ['conditions' => ['TemplateAttributes.template_id' => $id]])->first();
    }

    public function getPageName($id)
    {
        if(!$id) return;

        $pages = [1 => 'Home Page', 2 => 'About us', 3 => 'Navigation', 4 => 'Product Page',  5 => 'Social Wall', 6 => 'Contact'];

        return $pages[$id];
    }

    public function getCategoryName($id)
    {
        if(!$id) return;

        $this->Categories = TableRegistry::get('Categories');

        return $this->Categories->get($id)->name;
    }

    public function getBusinessName($id)
    {
        if(!$id) return;

        $this->UserProfiles = TableRegistry::get('UserProfiles');
        return $this->UserProfiles->find('all', ['conditions' => ['UserProfiles.user_id' => $id]])->first()->business_name;
    }

    public function getUserName($id)
    {
        if(!$id) return;
        
        $this->Users = TableRegistry::get('Users');
        return $this->Users->get($id)->username;
    }

    public function getBookPreview($id)
    {
        if(!$id) return;
        
        $this->BookTemplates = TableRegistry::get('BookTemplates');

        $template = $this->BookTemplates->find('all', ['conditions' => ['BookTemplates.book_id' => $id, 'BookTemplates.parent' => 0], 'order' => ['BookTemplates.page' => 'asc']])->first();

        return $template->template_image;
    }

    public function bgtoimg($img)
    {
        if(!$img) return;
        
        $img = explode("('", $img);
        $img = explode("')", $img[1]);

        return $img[0];
    }
}