<?php 
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\UsersController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Inflector;

class AdminController extends UsersController
{

    public $paginate = [
        'limit' => 10
    ];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('buzztm_admin');
        $this->set('loggedInUser', $this->Auth->user());
    }


    public function dashboard()
    {
        $this->Books = TableRegistry::get('Books');

        $books = $this->Books->find('all', ['order' => ['Books.id' => 'desc']])->all();

        $books2 = $this->Books->find('all', ['order' => ['Books.id' => 'asc']])->all();

        $this->set(compact('books', 'books2'));
    }

    public function company()
    {
        $this->paginate['order'] = [
            'Users.id' => 'desc'
        ];

        $conditions = [
            'role' => 'company'
        ];

        $this->paginate['conditions'] = $conditions;

        $users = $this->paginate('Users');
        $this->set(compact('users'));
    }

    public function newCompany()
    {

    }

    public function editCompany($id)
    {
        $this->Users = TableRegistry::get('Users');
        $this->UserProfiles = TableRegistry::get('UserProfiles');
        $company = $this->Users->get($id);
        $profile = $this->UserProfiles->find('all', ['conditions' => ['UserProfiles.user_id' => $id]])->first();
        

        $company_array = array_values($this->objectToArray($company))[0];
        $company_array['user_name'] = $company_array['username'];
        $company_array['user_email'] = $company_array['email'];
        $profile_array = array_values($this->objectToArray($profile))[0];
        $profile_array['profile_id'] = $profile_array['id'];
        unset($profile_array['id']);
        $json_res = json_encode(array_merge($company_array, $profile_array));
        //echo $json_res; exit;
        $this->set(compact('json_res'));
    }

    public function deleteCompany($id)
    {
        $this->Users = TableRegistry::get('Users');
        $this->UserProfiles = TableRegistry::get('UserProfiles');
        $company = $this->Users->get($id);
        $profile = $this->UserProfiles->find('all', ['conditions' => ['UserProfiles.user_id' => $id]])->first();

        $this->Users->delete($company);
        $this->UserProfiles->delete($profile);

        $this->Flash->success(__('Selected Company Deleted successfully!!'));
        return $this->redirect(array('controller' => 'admin', 'action' => 'company'));
    }

    public function createCompany()
    {
        $this->autoRender = false;
        
        $this->Users = TableRegistry::get('Users');
        $this->UserProfiles = TableRegistry::get('UserProfiles');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            $data = $this->request->data;

            if(!isset($data['user_id']))
            {
                $hasher = new DefaultPasswordHasher();
                $password = '123456';
                $user_data = array('role' => 'company', 'username' => $data['user_name'], 'email' => $data['user_email'], 'password' => $hasher->hash($password));
                $user = $this->Users->patchEntity($user, $user_data);
                $res = $this->Users->save($user);
                if ($res) {
                    $this->Flash->success(__('The user has been saved.'));
                    $data['user_id'] = $res->id;
                    $data['created'] = date("Y-m-d H:i:s");
                    $data['modified'] = date("Y-m-d H:i:s");
                    $user = $this->UserProfiles->newEntity();
                    $user = $this->UserProfiles->patchEntity($user, $data);
                    $this->UserProfiles->save($user);

                    echo $res->id;
                    return;
                }
                echo 'error';
            }
            else
            {
                unset($data['id']);
                $profile = $this->UserProfiles->get($data['profile_id']);
                $data['modified'] = date("Y-m-d H:i:s");
                $profile = $this->UserProfiles->patchEntity($profile, $data);
                $res = $this->UserProfiles->save($profile);
                if($res)
                    echo $data['user_id'];
                else  
                    echo 'error';
            }
        }
    }

    public function uploadlogo($id)
    {
        $this->autoRender = false;
        if(isset($this->request->data['file']) && !empty($this->request->data['file']))
        {

            $file = $this->request->data['file'];
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
            $setNewFileName = 'logo-'.$id;

            if (in_array($ext, $arr_ext)) {
                
                $imageFileName = $setNewFileName . '.' . $ext;
                move_uploaded_file($file['tmp_name'], WWW_ROOT . '/upload/logo/' . $imageFileName); 

            }

            $this->Users = TableRegistry::get('Users');
            $user = $this->Users->get($id);
            $user->logo = $imageFileName;
            $this->Users->save($user);
        }
    }

    public function uploadimage()
    {
        $this->autoRender = false;
        if(isset($this->request->data['file']) && !empty($this->request->data['file']))
        {

            $file = $this->request->data['file'];
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
            $setNewFileName = rand(11111,99999).strtotime("now");

            if (in_array($ext, $arr_ext)) {
                
                $imageFileName = $setNewFileName . '.' . $ext;
                if(move_uploaded_file($file['tmp_name'], WWW_ROOT . '/upload/template/' . $imageFileName))
                    echo $imageFileName;
                return;
            }
            echo 'error';
        }
    }

    public function template()
    {
        $this->Templates = TableRegistry::get('Templates');

        $this->paginate['order'] = [
            'Templates.id' => 'desc'
        ];

        $template = $this->paginate('Templates');
        $this->set(compact('template'));
    }

    public function newTemplate()
    {
        $this->Categories = TableRegistry::get('Categories');

        $categories = $this->Categories->find('all')->all();

        $this->set(compact('categories'));
    }

    public function editTemplate($id)
    {
        $this->Templates = TableRegistry::get('Templates');
        $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
        $this->Categories = TableRegistry::get('Categories');

        $categories = $this->Categories->find('all')->all();

        $template = $this->Templates->get($id);
        $templateattr = $this->TemplateAttributes->find('all', ['conditions' => ['TemplateAttributes.template_id' => $id, 'TemplateAttributes.book_id' => 0]])->all();
        
        $template = array_values($this->objectToArray($template))[0];

        $attrlist = array('text' => [], 'image' => []);
        foreach($templateattr as $attr)
        {
            $attr->top = $attr->pos_top;
            $attr->left = $attr->pos_left;

            if($attr->field_type == 'text')
                $attrlist['text'][] = array_values($this->objectToArray($attr))[0];

            if($attr->field_type == 'image')
                $attrlist['image'][] = array_values($this->objectToArray($attr))[0];

            if($attr->field_type == 'background')
                $attrlist['background'] = array_values($this->objectToArray($attr))[0];
        }

        $this->set(compact('id', 'template', 'attrlist', 'categories'));
    }

    public function createTemplate()
    {
        $this->autoRender = false;
        //pr($this->request->data);exit;
        if(isset($this->request->data['template']) && !empty($this->request->data['template']))
        {
            $this->Templates = TableRegistry::get('Templates');
            $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
            $data = $this->request->data;

            $template_data = $data['template'];
            $template_data['created_by'] = $this->Auth->user()['id'];
            $template_data['created'] = date("Y-m-d H:i:s");
            $template_data['modified'] = date("Y-m-d H:i:s");
            
            if(isset($template_data['id']))
                unset($template_data['id']);

            $template = $this->Templates->newEntity();
            $template = $this->Templates->patchEntity($template, $template_data);
            //pr($template);
            $res = $this->Templates->save($template);

            if ($res) {
                $template_id = $res->id;

                $template = $this->Templates->get($template_id);
                $template_data['template_image'] = $this->createTemplateImage($template_data['template_image'], $template_id);
                $template = $this->Templates->patchEntity($template, $template_data);
                $this->Templates->save($template);

                for($i=0; $i<$template_data['textbox']; $i++)
                {
                    $attr = $data['text'][$i];

                    if(isset($attr['id']))
                        unset($attr['id']);

                    $attr['field_type'] = 'text';
                    $attr['template_id'] = $template_id;
                    $attr['pos_top'] = $attr['top'];
                    $attr['pos_left'] = $attr['left'];

                    $template = $this->TemplateAttributes->newEntity();
                    $template = $this->TemplateAttributes->patchEntity($template, $attr);
                    $this->TemplateAttributes->save($template);
                }

                for($i=0; $i<$template_data['image']; $i++)
                {
                    $attr = $data['image'][$i];

                    if(isset($attr['id']))
                        unset($attr['id']);

                    $attr['field_type'] = 'image';
                    $attr['template_id'] = $template_id;
                    $attr['pos_top'] = $attr['top'];
                    $attr['pos_left'] = $attr['left'];

                    $template = $this->TemplateAttributes->newEntity();
                    $template = $this->TemplateAttributes->patchEntity($template, $attr);
                    $this->TemplateAttributes->save($template);
                }

                $attr = $data['background'];

                if(isset($attr['id']))
                    unset($attr['id']);

                $attr['field_type'] = 'background';
                $attr['template_id'] = $template_id;

                $template = $this->TemplateAttributes->newEntity();
                $template = $this->TemplateAttributes->patchEntity($template, $attr);
                $this->TemplateAttributes->save($template);

                echo "success";
                return;
            }
            else
                echo 'error';
        }
    }

    public function updateTemplate($id)
    {
        $this->autoRender = false;
        //pr($this->request->data);exit;
        if(isset($this->request->data['template']) && !empty($this->request->data['template']))
        {
            $this->Templates = TableRegistry::get('Templates');
            $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
            $data = $this->request->data;

            $template_data = $data['template'];
            $template_data['modified'] = date("Y-m-d H:i:s");
            $template_data['template_image'] = $this->createTemplateImage($template_data['template_image'], $id);

            $template = $this->Templates->get($id);
            $template = $this->Templates->patchEntity($template, $template_data);
            $res = $this->Templates->save($template);

            $this->TemplateAttributes->deleteAll(['template_id' => $id]);

            if ($res) {
                $template_id = $id;

                for($i=0; $i<$template_data['textbox']; $i++)
                {
                    $attr = $data['text'][$i];
                    $attr['field_type'] = 'text';
                    $attr['template_id'] = $template_id;
                    $attr['pos_top'] = $attr['top'];
                    $attr['pos_left'] = $attr['left'];

                    $template = $this->TemplateAttributes->newEntity();
                    $template = $this->TemplateAttributes->patchEntity($template, $attr);
                    $this->TemplateAttributes->save($template);
                }

                for($i=0; $i<$template_data['image']; $i++)
                {
                    $attr = $data['image'][$i];
                    $attr['field_type'] = 'image';
                    $attr['template_id'] = $template_id;
                    $attr['pos_top'] = $attr['top'];
                    $attr['pos_left'] = $attr['left'];

                    $template = $this->TemplateAttributes->newEntity();
                    $template = $this->TemplateAttributes->patchEntity($template, $attr);
                    $this->TemplateAttributes->save($template);
                }

                $attr = $data['background'];
                $attr['field_type'] = 'background';
                $attr['template_id'] = $template_id;

                $template = $this->TemplateAttributes->newEntity();
                $template = $this->TemplateAttributes->patchEntity($template, $attr);
                $this->TemplateAttributes->save($template);

                echo "success";
                return;
            }
            else
                echo 'error';
        }
    }

    public function deleteTemplate($id)
    {
        $this->Templates = TableRegistry::get('Templates');
        $categories = $this->Templates->get($id);
        $this->Templates->delete($categories);

        $this->Flash->success(__('Selected Template Deleted successfully!!'));
        return $this->redirect(array('controller' => 'admin', 'action' => 'template'));
    }

    public function createTemplateImage($data, $id)
    {
        if (!empty($data)) {
            $image_name = 'template_' . $id . '.png';
            $path = WWW_ROOT . 'upload/template_image/' . $image_name;
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            if(file_put_contents($path, $data))
                return $image_name;
            else
                return false;
        }
    }

    public function category()
    {
        $this->Categories = TableRegistry::get('Categories');

        $this->paginate['order'] = [
            'Categories.id' => 'desc'
        ];

        $categories = $this->paginate('Categories');
        $this->set(compact('categories'));
    }

    public function addCategory()
    {
        $this->autoRender = false;
        if(isset($this->request->data['name']) && !empty($this->request->data['name']))
        {
            $this->Categories = TableRegistry::get('Categories');
            $data = $this->request->data;

            $categories = $this->Categories->newEntity();
            $categories = $this->Categories->patchEntity($categories, $data);
            $this->Categories->save($categories);

            $this->Flash->success(__('New category created.'));
            
            echo 'success';
            return;
        }
        echo 'error';
    }

    public function deleteCategory($id)
    {
        $this->Categories = TableRegistry::get('Categories');
        $categories = $this->Categories->get($id);
        $this->Categories->delete($categories);

        $this->Flash->success(__('Selected Category Deleted successfully!!'));
        return $this->redirect(array('controller' => 'admin', 'action' => 'category'));
    }

    public function editCategory($id)
    {
        $this->autoRender = false;
        if(isset($id) && !empty($id))
        {
            $this->Categories = TableRegistry::get('Categories');
            $data = $this->request->data;

            $categories = $this->Categories->get($id);
            $categories = $this->Categories->patchEntity($categories, $data);
            $this->Categories->save($categories);

            $this->Flash->success(__('Category updated.'));
            
            echo 'success';
            return;
        }
        echo 'error';
    }

    public function newBook()
    {
        $this->viewBuilder()->layout(false);

        //$this->Users = TableRegistry::get('Users');

        //$company = $this->Users->find('all', ['conditions' => ['Users.role' => 'company']])->all();

        $this->Categories = TableRegistry::get('Categories');

        $categories = $this->Categories->find('all')->all();

        //$this->Themes = TableRegistry::get('Themes');

        //$themes = $this->Themes->find('all')->all();

        $this->Books = TableRegistry::get('Books');

        $books = $this->Books->find('all')->all();

        $this->set(compact('company', 'categories', 'books'));
    }

    public function getTemplates($category, $page)
    {
        $this->autoRender = false;

        $this->Templates = TableRegistry::get('Templates');

        $templates = $this->Templates->find('list', ['conditions' => ['Templates.page_type' => $page, 'Templates.category_type' => $category], 'keyField' => 'id', 'valueField' => 'template_name'])->toArray();
        
        echo json_encode($templates);
    }

    public function getTemplateAttributes($id)
    {
        $this->Templates = TableRegistry::get('Templates');
        $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
        $this->Categories = TableRegistry::get('Categories');

        $categories = $this->Categories->find('all')->all();

        $template = $this->Templates->get($id);
        $templateattr = $this->TemplateAttributes->find('all', ['conditions' => ['TemplateAttributes.template_id' => $id, 'TemplateAttributes.book_id' => 0]])->all();
        
        $template = array_values($this->objectToArray($template))[0];

        $this->autoRender = false;
        $attrlist = array('text' => [], 'image' => [], 'video' => [], 'map' => [], 'template' => $template);
        foreach($templateattr as $attr)
        {
            $attr->top = $attr->pos_top;
            $attr->left = $attr->pos_left;

            $atttr = array_values($this->objectToArray($attr))[0];
            $atttr['width'] = $atttr['width'] ? $atttr['width'] : '20%';
            $atttr['text_align'] = $atttr['text_align'] ? $atttr['text_align'] : 'left';
            $atttr['line_height'] = $atttr['line_height'] ? $atttr['line_height'] : 14;
            
            if($attr->field_type == 'text')
                $attrlist['text'][] = $atttr;

            if($attr->field_type == 'image')
                $attrlist['image'][] = $atttr;

            if($attr->field_type == 'video')
                $attrlist['video'][] = $atttr;

            if($attr->field_type == 'map')
                $attrlist['map'][] = $atttr;

            if($attr->field_type == 'background')
                $attrlist['background'] = $atttr;
            
        }

        echo json_encode($attrlist);
    }

    public function createBook()
    {

        $this->autoRender = false;
        if(isset($this->request->data['book']) && !empty($this->request->data['book']))
        {
            $this->Books = TableRegistry::get('Books');
            $this->BookTemplates = TableRegistry::get('BookTemplates');
            $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
            $data = $this->request->data;

            $template_data = $data['book'];
            $template_data['created_by'] = $this->Auth->user()['id'];
            $template_data['created'] = date("Y-m-d H:i:s");
            $template_data['modified'] = date("Y-m-d H:i:s");
            $template_data['slug'] = Inflector::slug($template_data['book_name'], "-");

            if(isset($template_data['id'])) unset($template_data['id']);

            $template = $this->Books->newEntity();
            $template = $this->Books->patchEntity($template, $template_data);

            $res = $this->Books->save($template);

            if ($res) {
                $book_id = $res->id;

                for($i=0; $i<count($data['page']); $i++)
                {
                    if(isset($data['page'][$i]['id'])) unset($data['page'][$i]['id']);

                    $data['page'][$i]['book_id'] = $book_id;
                    $template = $this->BookTemplates->newEntity();
                    $template = $this->BookTemplates->patchEntity($template, $data['page'][$i]);
                    $res2 = $this->BookTemplates->save($template);
                    $bt_id = $res2->id;

                    $this->save_book_template_attributes($data['page'][$i]['template_attributes'], $book_id, $data['page'][$i]['template'], $bt_id);

                    if(isset($data['page'][$i]['sub_products']))
                    {
                        for($k=0; $k<count($data['page'][$i]['sub_products']); $k++)
                        {
                            if(isset($data['page'][$i]['sub_products'][$k]['id'])) unset($data['page'][$i]['sub_products'][$k]['id']);

                            $data['page'][$i]['sub_products'][$k]['book_id'] = $book_id;
                            $data['page'][$i]['sub_products'][$k]['parent'] = $bt_id;
                            if(is_numeric(strpos($data['page'][$i]['sub_products'][$k]['template_image'], 'data:image')))
                                $data['page'][$i]['sub_products'][$k]['template_image'] = $this->createTemplateImage($data['page'][$i]['sub_products'][$k]['template_image'], rand(11111,99999).time());
                            $data['page'][$i]['template_image'] = $this->createTemplateImage($data['page'][$i]['template_image'], rand(11111,99999).time());
                            $template = $this->BookTemplates->newEntity();
                            $template = $this->BookTemplates->patchEntity($template, $data['page'][$i]['sub_products'][$k]);
                            $res2 = $this->BookTemplates->save($template);
                            $bt_id2 = $res2->id;

                            $this->save_book_template_attributes($data['page'][$i]['sub_products'][$k]['template_attributes'], $book_id, $data['page'][$i]['sub_products'][$k]['template'], $bt_id2);
                        }
                    }
                }

                echo "success";
                return;
            }
            else
                echo 'error';
        }
    }

    public function save_book_template_attributes($template_attributes, $book_id, $template_id, $bt_id)
    {
            $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');

                    for($j=0; $j<count($template_attributes['text']); $j++)
                    {
                        $attr = $template_attributes['text'][$j];

                        if(isset($attr['id']))
                            unset($attr['id']);

                        $attr['field_type'] = 'text';
                        $attr['template_id'] = $template_id;
                        $attr['pos_top'] = $attr['top'];
                        $attr['pos_left'] = $attr['left'];
                        $attr['book_id'] = $book_id;
                        $attr['book_template_id'] = $bt_id;

                        $template = $this->TemplateAttributes->newEntity();
                        $template = $this->TemplateAttributes->patchEntity($template, $attr);
                        $this->TemplateAttributes->save($template);
                    }

                    for($j=0; $j<count($template_attributes['image']); $j++)
                    {
                        $attr = $template_attributes['image'][$j];

                        if(isset($attr['id']))
                            unset($attr['id']);

                        $attr['field_type'] = 'image';
                        $attr['template_id'] = $template_id;
                        $attr['pos_top'] = $attr['top'];
                        $attr['pos_left'] = $attr['left'];
                        $attr['book_id'] = $book_id;
                        $attr['book_template_id'] = $bt_id;

                        $template = $this->TemplateAttributes->newEntity();
                        $template = $this->TemplateAttributes->patchEntity($template, $attr);
                        $this->TemplateAttributes->save($template);
                    }

                    for($j=0; $j<count($template_attributes['video']); $j++)
                    {
                        $attr = $template_attributes['video'][$j];

                        if(isset($attr['id']))
                            unset($attr['id']);

                        $attr['field_type'] = 'video';
                        $attr['template_id'] = $template_id;
                        $attr['pos_top'] = $attr['top'];
                        $attr['pos_left'] = $attr['left'];
                        $attr['book_id'] = $book_id;
                        $attr['book_template_id'] = $bt_id;

                        $template = $this->TemplateAttributes->newEntity();
                        $template = $this->TemplateAttributes->patchEntity($template, $attr);
                        $this->TemplateAttributes->save($template);
                    }

                    for($j=0; $j<count($template_attributes['map']); $j++)
                    {
                        $attr = $template_attributes['map'][$j];

                        if(isset($attr['id']))
                            unset($attr['id']);

                        $attr['field_type'] = 'map';
                        $attr['template_id'] = $template_id;
                        $attr['pos_top'] = $attr['top'];
                        $attr['pos_left'] = $attr['left'];
                        $attr['book_id'] = $book_id;
                        $attr['book_template_id'] = $bt_id;

                        $template = $this->TemplateAttributes->newEntity();
                        $template = $this->TemplateAttributes->patchEntity($template, $attr);
                        $this->TemplateAttributes->save($template);
                    }

                    $attr = $template_attributes['background'];

                    if(isset($attr['id']))
                        unset($attr['id']);

                    $attr['field_type'] = 'background';
                    $attr['template_id'] = $template_id;
                    $attr['book_id'] = $book_id;
                    $attr['book_template_id'] = $bt_id;

                    $template = $this->TemplateAttributes->newEntity();
                    $template = $this->TemplateAttributes->patchEntity($template, $attr);
                    $this->TemplateAttributes->save($template);
    }

    public function updateBook($book_id)
    {

        $this->autoRender = false;
        if(isset($this->request->data['book']) && !empty($this->request->data['book']))
        {
            $this->Books = TableRegistry::get('Books');
            $this->BookTemplates = TableRegistry::get('BookTemplates');
            $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
            $data = $this->request->data;

            $template_data = $data['book'];
            $template_data['created_by'] = $this->Auth->user()['id'];
            $template_data['created'] = date("Y-m-d H:i:s");
            $template_data['modified'] = date("Y-m-d H:i:s");
            $template_data['slug'] = Inflector::slug($template_data['book_name'], "-");

            $template = $this->Books->get($book_id);
            $template = $this->Books->patchEntity($template, $template_data);

            $res = $this->Books->save($template);
            if ($res) {

                $this->BookTemplates->deleteAll(['book_id' => $book_id]);
                $this->TemplateAttributes->deleteAll(['book_id' => $book_id]);

                for($i=0; $i<count($data['page']); $i++)
                {
                    $data['page'][$i]['book_id'] = $book_id;
                    if(is_numeric(strpos($data['page'][$i]['template_image'], 'data:image')))
                        $data['page'][$i]['template_image'] = $this->createTemplateImage($data['page'][$i]['template_image'], rand(11111,99999).time());
                    $template = $this->BookTemplates->newEntity();
                    $template = $this->BookTemplates->patchEntity($template, $data['page'][$i]);
                    $res2 = $this->BookTemplates->save($template);
                    $bt_id = $res2->id;

                    $this->save_book_template_attributes($data['page'][$i]['template_attributes'], $book_id, $data['page'][$i]['template'], $bt_id);

                    if(isset($data['page'][$i]['sub_products']))
                    {
                        for($k=0; $k<count($data['page'][$i]['sub_products']); $k++)
                        {
                            
                            $data['page'][$i]['sub_products'][$k]['book_id'] = $book_id;
                            $data['page'][$i]['sub_products'][$k]['parent'] = $bt_id;
                            if(is_numeric(strpos($data['page'][$i]['sub_products'][$k]['template_image'], 'data:image')))
                                $data['page'][$i]['sub_products'][$k]['template_image'] = $this->createTemplateImage($data['page'][$i]['sub_products'][$k]['template_image'], rand(11111,99999).time());
                            $template = $this->BookTemplates->newEntity();
                            $template = $this->BookTemplates->patchEntity($template, $data['page'][$i]['sub_products'][$k]);
                            $res2 = $this->BookTemplates->save($template);
                            $bt_id2 = $res2->id;

                            $this->save_book_template_attributes($data['page'][$i]['sub_products'][$k]['template_attributes'], $book_id, $data['page'][$i]['sub_products'][$k]['template'], $bt_id2);
                        }
                    }
                }

                echo "success";
                return;
            }
            else
                echo 'error';
        }
    }

    public function editBook($id, $clone = 0)
    {
        $this->viewBuilder()->layout(false);

        $this->Users = TableRegistry::get('Users');

        $company = $this->Users->find('all', ['conditions' => ['Users.role' => 'company']])->all();

        $this->Categories = TableRegistry::get('Categories');

        $categories = $this->Categories->find('all')->all();

        $this->Books = TableRegistry::get('Books');
        $this->BookTemplates = TableRegistry::get('BookTemplates');
        $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
        $this->Templates = TableRegistry::get('Templates');

        $book = $this->Books->get($id);
        $book = array_values($this->objectToArray($book))[0];
        
        $page = [];
        
        $template = $this->BookTemplates->find('all', ['conditions' => ['BookTemplates.book_id' => $id, 'BookTemplates.parent' => 0], 'order' => ['BookTemplates.page' => 'asc', 'BookTemplates.id' => 'asc']])->all();

        foreach($template as $k=>$tmp){
            
            $tmp = $this->getpagetemplates($tmp, $id);
            
            $subtemplate = $this->BookTemplates->find('all', ['conditions' => ['BookTemplates.book_id' => $id, 'BookTemplates.parent' => $tmp['id']]])->all();
            $sub_page = [];
            if(count($subtemplate))
            {
                foreach($subtemplate as $sk=>$stmp){
            
                    $stmp = $this->getpagetemplates($stmp, $id);
                    
                    $sub_page[$sk] = $stmp;
                }
            }

            $tmp['sub_products'] = $sub_page;

            $page[$k] = $tmp;
        }

        $books = $this->Books->find('all')->all();

        $this->set(compact('id', 'clone', 'company', 'categories', 'book', 'page', 'books'));
    }

    public function getpagetemplates($tmp, $id)
    {
            $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
            $this->Templates = TableRegistry::get('Templates');

            $tmp = array_values($this->objectToArray($tmp))[0];

            $templateattr = $this->TemplateAttributes->find('all', ['conditions' => ['TemplateAttributes.book_template_id' => $tmp['id'], 'TemplateAttributes.book_id' => $id]])->all();

            $template = [];

            $attrlist = array('text' => [], 'image' => [], 'video' => [], 'map' => [], 'template' => $template);
            foreach($templateattr as $attr)
            {
                $attr->top = $attr->pos_top;
                $attr->left = $attr->pos_left;

                $atttr = array_values($this->objectToArray($attr))[0];
                $atttr['width'] = $atttr['width'] ? $atttr['width'] : '20%';
                $atttr['text_align'] = $atttr['text_align'] ? $atttr['text_align'] : 'left';
                $atttr['line_height'] = $atttr['line_height'] ? $atttr['line_height'] : 14;
                
                if($attr->field_type == 'text')
                    $attrlist['text'][] = $atttr;

                if($attr->field_type == 'image')
                    $attrlist['image'][] = $atttr;

                if($attr->field_type == 'video')
                    $attrlist['video'][] = $atttr;

                if($attr->field_type == 'map')
                    $attrlist['map'][] = $atttr;

                if($attr->field_type == 'background')
                    $attrlist['background'] = $atttr;
            }

            $tmp['template_attributes'] = $attrlist;

            return $tmp;
    }

    public function book()
    {
        $this->Books = TableRegistry::get('Books');

        $this->paginate['order'] = [
            'Books.id' => 'desc'
        ];

        $books = $this->paginate('Books');
        $this->set(compact('books'));
    }

    public function deleteBook($id)
    {
        $this->Books = TableRegistry::get('Books');
        $this->BookTemplates = TableRegistry::get('BookTemplates');
        $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
        $categories = $this->Books->get($id);
        
        $this->Books->delete($categories);
        $this->BookTemplates->deleteAll(['book_id' => $id]);
        $this->TemplateAttributes->deleteAll(['book_id' => $id]);

        $this->Flash->success(__('Selected Book Deleted successfully!!'));
        return $this->redirect(array('controller' => 'admin', 'action' => 'new-book-template'));
    }

    public function newTheme()
    {
        $this->Categories = TableRegistry::get('Categories');

        $categories = $this->Categories->find('all')->all();

        $this->set(compact('categories'));
    }

    public function templateList($category)
    {
        $this->autoRender = false;

        $this->Templates = TableRegistry::get('Templates');

        $templates = $this->Templates->find('all', ['conditions' => ['Templates.category_type' => $category]])->all();
        
        $sub = array();

        foreach($templates as $tmp)
        {
            $sub[$tmp->page_type] = isset($sub[$tmp->page_type]) ? $sub[$tmp->page_type] : array();
            $sub[$tmp->page_type][] = $tmp;
        }

        echo json_encode($sub);
    }


    public function createTheme()
    {
        $this->autoRender = false;

        if(isset($this->request->data['name']) && !empty($this->request->data['name']))
        {
            $this->Themes = TableRegistry::get('Themes');
            $data = $this->request->data;

            foreach($data['data'] as $k=>$d)
            {
                if($d)
                {
                    $data['page_'.$k] = $d;
                }
            }

            $template = $this->Themes->newEntity();
            $template = $this->Themes->patchEntity($template, $data);

            $res = $this->Themes->save($template);

            echo $res ? "success" : 'error';
        }
    }

    public function theme()
    {
        $this->Themes = TableRegistry::get('Themes');

        $this->paginate['order'] = [
            'Themes.id' => 'desc'
        ];

        $themes = $this->paginate('Themes');
        $this->set(compact('themes'));
    }

    public function deleteTheme($id)
    {
        $this->Themes = TableRegistry::get('Themes');
        $categories = $this->Themes->get($id);
        
        $this->Themes->delete($categories);

        $this->Flash->success(__('Selected Themes Deleted successfully!!'));
        return $this->redirect(array('controller' => 'admin', 'action' => 'theme'));
    }

    public function editTheme($id)
    {
        $this->Themes = TableRegistry::get('Themes');
        $themes = array_values($this->objectToArray($this->Themes->get($id)))[0];

        $data = ['', $themes['page_1'], $themes['page_2'], $themes['page_3'], $themes['page_4'], $themes['page_5'], $themes['page_6']];

        $this->Categories = TableRegistry::get('Categories');

        $categories = $this->Categories->find('all')->all();

        $this->set(compact('categories', 'themes', 'data', 'id'));
    }

    public function updateTheme($id)
    {
        $this->autoRender = false;

        $this->Themes = TableRegistry::get('Themes');
        $themes = $this->Themes->get($id);
        $data = $this->request->data;
        foreach($data['data'] as $k=>$d)
        {
            if($d)
            {
                $data['page_'.$k] = $d;
            }
        }
        $template = $this->Themes->patchEntity($themes, $data);

        $res = $this->Themes->save($template);

        echo $res ? "success" : 'error';
    }

    public function newBookTemplate()
    {
        $this->viewBuilder()->layout('buzztm_admin');

        $this->Books = TableRegistry::get('Books');
        $this->Categories = TableRegistry::get('Categories');

        $categories = $this->Categories->find('all')->all();
        $books = $this->Books->find('all')->all();

        $this->set(compact('categories', 'books'));
    }

    public function imageLibrary($book = 0)
    {
        $this->autoRender = false;
        $files = array();
        
        if($book)
        {
            $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');

            $templates = $this->TemplateAttributes->find('all', ['conditions' => ['TemplateAttributes.book_id' => $book, 'TemplateAttributes.field_type' => 'image']])->all();
            foreach($templates as $tmp)
            {
                $exp = explode("template/", $tmp->value);
                if(count($exp) == 2)
                {
                    array_push($files, $exp[1]);
                }
            }

            $templates = $this->TemplateAttributes->find('all', ['conditions' => ['TemplateAttributes.book_id' => $book, 'TemplateAttributes.field_type' => 'background']])->all();
            foreach($templates as $tmp)
            {
                $exp = explode("template/", $tmp->value);
                if(count($exp) == 2)
                {
                    $exp = explode("')", $exp[1]);
                    if(count($exp) == 2)
                    {
                        array_push($files, $exp[0]);
                    }
                }
            }
        }
        else
        {
            $dir = WWW_ROOT.'upload/template/';
            $i = 0;
            if (is_dir($dir)){
              if ($dh = opendir($dir)){
                while (($file = readdir($dh)) !== false){
                  if($i > 1)
                  array_push($files, $file);
                  $i++;
                }
                closedir($dh);
              }
            }
        }
        echo json_encode(array_values(array_unique($files)));
    }
    
    public function resetBookTemplateImageDataToFile(){
        
        $this->BookTemplates = TableRegistry::get('BookTemplates');
        $booktemplates = $this->BookTemplates->find('all')->all();
        
        foreach($booktemplates as $bk)
        {
            $data = array();
            $bkt = $this->BookTemplates->get($bk->id);
            if($bk->template_image && !is_numeric(strpos($bk->template_image, 'template_')))
            {
                $data['template_image'] = $this->createTemplateImage($bk->template_image, rand(11111,99999).time());
                $data = $this->BookTemplates->patchEntity($bkt, $data);
                $this->BookTemplates->save($data);
            }   
        }
        exit;
    }

    public function text2image()
    {
        $this->autoRender = false;

        header('Content-Type: image/png');

        $font = (isset($_GET['bold']) && $_GET['bold']) ? WWW_ROOT.'arialbd.ttf' : WWW_ROOT.'arial.ttf';
        $font_size = (isset($_GET['size']) && !empty($_GET['size'])) ? 0.75 * $_GET['size'] : 10;
        $width = (isset($_GET['width']) && !empty($_GET['width'])) ? 700 * ((int)$_GET['width'] / 100) : 700;
        $sw = (isset($_GET['sw']) && !empty($_GET['sw'])) ? $_GET['sw'] : $width;
        $margin = 20;
        $text = (isset($_GET['text']) && !empty($_GET['text'])) ? $_GET['text'] : "That is why where when why and how, and now why where when why and how?";
        $halign =  (isset($_GET['align']) && !empty($_GET['align'])) ? $_GET['align'] : "left";

        $left = 10;
        $words = explode(' ', strip_tags($text));
        $line = '';
        while (count($words) > 0) {
          $dimensions = imagettfbbox($font_size, 0, $font, $line.' '.$words[0]);
          $lineWidth = $dimensions[2] - $dimensions[0];
          if ($lineWidth > $width) {
            $lines[] = $line;
            $line = '';
          }
          $line .= ' '.$words[0];
          $words = array_slice($words, 1);
        }
        if ($line != '') { $lines[] = $line; }
        $lineHeight = $dimensions[1] - $dimensions[7];
        $lineHeight = (isset($_GET['lheight']) && !empty($_GET['lheight'])) ? $_GET['lheight'] : $lineHeight;
        $height = (count($lines) * $lineHeight) + $margin;

        $color = (isset($_GET['color']) && !empty($_GET['color'])) ? '#'.$_GET['color'] : "#00000";
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");

        $im = imagecreatetruecolor($sw, $height);
         
        imagesavealpha($im, true);
        $color = imagecolorallocatealpha($im, 0, 0, 0, 127);
        imagefill($im, 0, 0, $color);
        $black = imagecolorallocate($im, $r, $g, $b);
        $i = 0;
        foreach ($lines as $line) {
          if($halign=="center") {
            $dimensions = imagettfbbox($font_size, 0, $font, $line);
            $lineWidth = $dimensions[2] - $dimensions[0];
            $center=floor($width/2);
            if(isset($_GET['sw']) && $_GET['sw'] > 400)
                $leftStart=$center-($lineWidth/2) + (($sw - $width)/2);
            else
                $leftStart=$center - $lineWidth/2;
          } else if ($halign=="right") {
            $dimensions = imagettfbbox($font_size, 0, $font, $line);
            $lineWidth = $dimensions[2] - $dimensions[0];
            if(isset($_GET['sw']) && $_GET['sw'] > 400)
                $leftStart=$width-$lineWidth-$left + (($sw - $width)/2);
            else
                $leftStart=$width-$lineWidth-$left;
          } else {
            if(isset($_GET['sw']) && $_GET['sw'] > 400)
                $leftStart=$left + (($sw - $width)/2);
            else
                $leftStart=$left - 10;
          }    
          imagettftext($im, $font_size, 0, $leftStart, $margin + $lineHeight * $i, $black, $font, $line);
          $i++;
        }

        imagepng($im);
        imagedestroy($im);
        exit;
    }

    public function map()
    {
        $this->viewBuilder()->layout(false); 
    }

    public function imageResize()
    {
        
        if(count(explode("/template/", $_GET['src'])) > 1)
            $filename = WWW_ROOT.'upload/template/'.explode("/template/", $_GET['src'])[1];
        elseif(count(explode("/template_image/", $_GET['src'])) > 1)
            $filename = WWW_ROOT.'upload/template_image/'.explode("/template_image/", $_GET['src'])[1];
        else
            exit;

        $percent = 0.5;

        // Content type
        header('Content-Type: image/jpeg');

        // Get new sizes
        list($width, $height) = getimagesize($filename);
        $newwidth = isset($_GET['width']) ? $_GET['width'] : $width * $percent;
        $newheight = isset($_GET['height']) ? $_GET['height'] : $height * $percent;
        //$crop = (!isset($_GET['crop']) || (isset($_GET['crop']) && $_GET['crop'])) ? 1 : 0;
        $crop = 0;

        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        
        $ext = substr(strtolower(strrchr($filename, '.')), 1);
        $arr_ext = array('jpg' => 'imagecreatefromjpeg', 'jpeg' => 'imagecreatefromjpeg', 'gif' => 'imagecreatefromgif', 'png' => 'imagecreatefrompng');

        $source = $arr_ext[$ext]($filename);

        /*$widthProportion  = $width / $newwidth;
        $heightProportion = $height / $newheight;

        if ($widthProportion > $heightProportion) {
            // width proportion is greater than height proportion
            // figure out adjustment we need to make to width
            $widthAdjustment = ($width * ($widthProportion - $heightProportion));

            // Shrink width to proper proportion
            $width = $width - $widthAdjustment;

            $x = 0; // No adjusting height position
            $y = ($widthAdjustment / 2); // Center the adjustment
        } else {
            // height proportion is greater than width proportion
            // figure out adjustment we need to make to width
            $heightAdjustment = ($height * ($heightProportion - $widthProportion));

            // Shrink height to proper proportion
            $height = $height - $heightAdjustment;

            $x = ($heightAdjustment / 2); // Center the ajustment
            $y = 0; // No adjusting width position
        }*/

        // Resize
        if($crop)
            imagecopyresized($thumb, $source, 0, 0, $x, $y, $newwidth, $newheight, $width, $height);
        else
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        // Output
        imagejpeg($thumb);
        exit;
    }

    public function postSocialWall()
    {
        $this->autoRender = false;

        if(isset($this->request->data['file']) && !empty($this->request->data['file']))
        {

            $file = $this->request->data['file'];
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
            $setNewFileName = rand(11111,99999).strtotime("now");

            if (in_array($ext, $arr_ext)) {
                
                $imageFileName = $setNewFileName . '.' . $ext;
                if(move_uploaded_file($file['tmp_name'], WWW_ROOT . '/upload/social_wall/' . $imageFileName))
                {    
                    $this->request->data['image'] = $imageFileName;
                }
            }
            
        }

        $this->request->data['author'] = $this->Auth->user()['id'];
        $this->request->data['created'] = date("Y-m-d H:i:s");

        $this->SocialWalls = TableRegistry::get('SocialWalls');
        $SocialWalls = $this->SocialWalls->newEntity();
        $SocialWalls = $this->SocialWalls->patchEntity($SocialWalls, $this->request->data);
        $this->SocialWalls->save($SocialWalls);
    }

    public function socialWalls()
    {
        $this->Books = TableRegistry::get('Books');
        $this->SocialWalls = TableRegistry::get('SocialWalls');

        $books = $this->Books->find('all', ['order' => ['Books.id' => 'desc']])->all();

        $social_walls = $this->SocialWalls->find('all', ['order' => ['SocialWalls.id' => 'desc']])->all();

        $this->set(compact('books', 'social_walls'));
    }

    public function deleteSwpost($id)
    {
        $this->SocialWalls = TableRegistry::get('SocialWalls');
        $categories = $this->SocialWalls->get($id);
        $this->SocialWalls->delete($categories);

        $this->Flash->success(__('Selected Post Deleted successfully!!'));
        return $this->redirect(array('controller' => 'admin', 'action' => 'socialWalls'));
    }
}