<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\UsersController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Inflector;
use Cake\Mailer\Email;

class BookController extends AppController
{
	function view($id, $slug)
	{
		$this->viewBuilder()->layout(false);

		$this->Books = TableRegistry::get('Books');
        $this->BookTemplates = TableRegistry::get('BookTemplates');
        $this->TemplateAttributes = TableRegistry::get('TemplateAttributes');
        $this->Templates = TableRegistry::get('Templates');

        $id = base64_decode(base64_decode($id));
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

        $useragent=$_SERVER['HTTP_USER_AGENT'];
        $is_mobile = preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));

        $this->set(compact('id', 'clone', 'company', 'categories', 'book', 'page', 'is_mobile'));
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

                if($attr->field_type == 'text')
                    $attrlist['text'][] = array_values($this->objectToArray($attr))[0];

                if($attr->field_type == 'image')
                    $attrlist['image'][] = array_values($this->objectToArray($attr))[0];

                if($attr->field_type == 'video')
                    $attrlist['video'][] = array_values($this->objectToArray($attr))[0];

                if($attr->field_type == 'map')
                    $attrlist['map'][] = array_values($this->objectToArray($attr))[0];

                if($attr->field_type == 'background')
                    $attrlist['background'] = array_values($this->objectToArray($attr))[0];
            }

            $tmp['template_attributes'] = $attrlist;

            return $tmp;
    }

    public function sendLink()
    {
        $this->autoRender = false;

        $email = new Email('default');
        $email->from(['me@example.com' => 'My Site'])
            ->to($_POST['mail'])
            ->subject('Mybuzztm nook link')
            ->send('You/Your friend shared a Buzztm book link . /n Book: '.$_POST['book_name'].' /n '.$_POST['link']);
    }
}
