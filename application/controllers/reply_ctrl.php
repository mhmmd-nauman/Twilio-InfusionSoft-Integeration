<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reply_ctrl extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
        $this->load->model(array('conversation_model','setting_model','contact_model'));
        $this->data['setting'] = $this->setting_model->getSetting();
        define('INF_HOSTNAME', $this->data['setting']->Infusionsoft_App);
        define('INF_API_KEY', $this->data['setting']->Infusionsoft_API_Key);
        include APPPATH . 'third_party/infusion/vendor/infusionsoft/php-isdk/src/isdk.php';
        
    }
    function quotestoascii($strValue) {
        $strValue = (!get_magic_quotes_gpc()) ? htmlspecialchars($strValue, ENT_QUOTES) : $strValue;
        $strValue = ($strValue != "") ? $strValue : "";
        return $strValue;
    }
    public function tags(){
        exit;
        $infObject = new iNFUSION();
        $contactTags = $infObject->getContactTags();
        foreach ($contactTags as $tag) {
            $data = array();

            $data['inf_id'] = $tag->Id;
            $data['name'] = $this->quotestoascii($tag->GroupName);
            $data['inf_category_id'] = $tag->GroupCategoryId;
            $data['inf_description'] = $this->quotestoascii($tag->GroupDescription);
            $data['user_id'] = 1;
            $this->db->insert('tag', $data); 
           // $id = $db_util->InsertRecords($tblName, $data);
                
            
        }
    }
    public function index()
    {  
        
        $phone   = $_REQUEST['From'] ;
        $message = $_REQUEST['Body'] ;
        $this->data['conversation'] = $this->conversation_model->getConversation();
        $this->data['contact'] = $this->contact_model->get_single_contact($phone);
        if(empty($this->data['contact'])){
            $this->contact_model->add(array("phone"=>$phone));
            $this->data['message'] = $this->data['conversation']->first_reply_name;
            $this->load->view('admin/conversation/reply_messages.php',$this->data);
            exit();
        }
        if(empty($this->data['contact']->first_name)){
            // first reply needs to be sent
            $this->contact_model->update($this->data['contact']->id,array("first_name"=>$message));
            $this->data['message'] = $this->data['conversation']->second_reply_email;
           
        }elseif (empty($this->data['contact']->email)) {
            // second reply needs to be sent
            $this->contact_model->update($this->data['contact']->id,array("email"=>$message));
            $this->data['message'] = $this->data['conversation']->third_reply_thanks;
            // process infusion soft
            $app = new iSDK;
            if ($app->cfgCon("connectionName")) {
                $email = $message;
                $returnFields = array('Id');
                $data = $app->findByEmail($email, $returnFields);
                $conID = $data[0]['Id'];
                if(empty($conID)){
                    // create new contact
                    $contactData = array('FirstName' => $this->data['contact']->first_name,
                    //'LastName'  => 'Doe',
                    'Email'     => $email);
                    $conID = $app->addCon($contactData);
                    // apply the infusion soft tag 1677
                    
                    $app->grpAssign($conID, $this->data['setting']->Apply_Tag);
                } else {
                    // only apply the tag 1677
                    $app->grpAssign($conID, $this->data['setting']->Apply_Tag);
                }
            }
            
            
            //AddTag($ContactId, $TagId)
            //getContactTags
        } else{
            //$infObject = new iNFUSION();
            //$contacts = $infObject->getContactDetailsNew(array('Email' => 'martin@creativeavenue.co.uk'),0);
           // $id = $infObject->AddContact(array("Email"=>'mhmmd.nauman@gmail.com',"FirstName"=>"Muhammad"));
            //$infusionsoft = new Infusionsoft();
            //$infusionsoft->refreshAccessToken();
            //$id = $infusionsoft->contacts()->add(array("Email"=>'mhmmd.nauman@gmail.com',"FirstName"=>"Muhammad"));
            //print($id);
            foreach ($contacts as $contact) {
                $data = array();

                $data['inf_id'] = $contact->Id;
                $data['first_name'] = $contact->FirstName;
                $data['email'] = $contact->Email;
                $data['phone'] = $contact->Phone1;
                //$this->db->insert('contacts', $data);
            }
            $this->data['message'] ="done";
        }
        
        /*
        header("content-type: text/xml");
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        */
        $this->load->view('admin/conversation/reply_messages.php',$this->data);
        
    }
                   
    public function test(){
        
        $app = new iSDK;
        //echo "created object!<br/>";
        
        
        if ($app->cfgCon("connectionName")) {

            echo "app connected!<br/>";
            $contactData = array('FirstName' => 'John',
                'LastName'  => 'Doe',
                'Email'     => 'JDoe@email.com');

            //$conID = $app->addCon($contactData);
            $email = 'JDoe@email.com';
            $returnFields = array('Id');
            $data = $app->findByEmail($email, $returnFields);
            print($data[0]['Id']);

            
            /*
            if ($totalRecords > 0) {
                $totalPages = ceil($totalRecords / 1000);
                $contacts = array();
                $page = 0;
                do {
                    $contact = $app->dsQuery("Contact", 1000, $page++, array('Email' => $email), array('Id', 'FirstName', 'LastName', 'Email', 'Phone1'));

                    foreach ($contact as $c) {
                        $contacts[] = $c;
                    }
                } while ($page < $totalPages);

                echo "<pre>";
                print_r($contacts);
                echo "</pre>";

            } else {
                echo "There were no contacts found with the specified email";
            }
            */
            } else {
                echo "connection failed!<br/>";
            }
    }      
	
    public function save_setting()
    { 
        $this->form_validation->set_rules('first_reply_name', 'First Reply: Name Capture', 'required');
        $this->form_validation->set_rules('second_reply_email', 'Second Reply: Email Capture', 'required');
        $this->form_validation->set_rules('third_reply_thanks', 'Third Reply: Thank You', 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $this->data['status'] = " Validation Errors";
        
        } else {
          
            $settings=array
            (
            'first_reply_name'  =>$this->input->post('first_reply_name'),
            'second_reply_email'  =>$this->input->post('second_reply_email'),
            'third_reply_thanks'  =>$this->input->post('third_reply_thanks'),
            
            );
            $this->db->where('id', 1);
            $this->db->update('conversations', $settings);

            $this->data['status'] = " Setting saved";
            
        }
        $this->data['setting'] = $this->conversation_model->getConversation();
        $this->load->view("admin/layout/dashboard_header.php");
        $this->load->view('admin/conversation/conversations',$this->data);
        $this->load->view('admin/layout/footer.php');
    }
}