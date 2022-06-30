<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserPMedModel;
use App\Models\ProviderModel;
use App\Models\AdminUserModel;
use App\Models\LocaisTrabalhoModel;
use App\Models\AdminUserCommentsModel;
use App\Controllers\UserActiveDirectory;

class Search extends BaseController
{
    private $session;

    public function __construct()
    {
        
        // Create a shared instance of the model
        $this->UserModel = new UserModel();
        $this->UserPMedModel = new UserPMedModel();
        $this->ProviderModel = new ProviderModel();
        $this->AdminUserModel = new AdminUserModel();
        $this->LocaisTrabalhoModel = new LocaisTrabalhoModel();
        $this->AdminUserCommentsModel = new AdminUserCommentsModel();
        $this->UserActiveDirectory = new UserActiveDirectory();
        $this->session = session();
        helper('validation');
        helper('profile');        
        /*
        $users = $this->UserModel->getByUsername('VALMORPF');
        $users = $this->UserModel->findByUsername('VALMORPF');
        var_dump($users);
        */
    }

    public function index()
    {        
        
        if (trim(me()) ==''){
            return redirect()->to(base_url() . '/public/login');  
        } else {
            if ($this->isError()){
                $data['error'] = 1;
                $data['message'] = $this->session->get('message');
                $this->clear();
            }
            else {
                $data['error'] = 0;
            }
            return $this->searchform();
        }
    }

    function isError(){
        $error = ( $this->session->get('error') == 1 );
        return $error;
    }

    function getMessage() { 
        return $this->session->get('message');
    }


    function set_message( $message ) 
    {
        $newdata = [
            'message'  => $message,
            'error'    => 0,
        ];       
        $this->session->set($newdata);
    }

    function set_error($message ) 
    {
        $newdata = [
            'message'  => $message,
            'error'    => 1,
        ];       
        $this->session->set($newdata);    
    }

    function clear()
    {
        $newdata = [
            'message'  => '',
            'error'    => 0,
        ];       
        $this->session->set($newdata);
    }

    public function searchform() 
    {  
        if (trim(me()) ==''){
            return redirect()->to(base_url() . '/public/login');  
        } else {
            $username = $this->session->get('username');
            $data['username'] = $username;
            if ($this->isError()){
                $data['error'] = 1;
                $data['message'] = $this->session->get('message');
                $this->clear();
            }
            else {
                $data['error'] = 0;
            }
            $data['content'] = 'search/search';
            return view('Design/default_page',$data);
        }
    }

    public function do() {
        $data = [];
        $nome = $_POST['nome'];
        $data['ds_nome'] = $nome;
        $data['limit'] = 25;
        $data['offset'] = 0;
        $data['resultDatarecord'] = $this->UserModel->search($data);
        $data['search_content'] = $nome;
        $data['content'] = 'search/search_result';
        return view('Design/default_page',$data);
    }

    public function select($username) 
    {      
        $data['username'] = $username;
        if ($this->isError()){
            $data['error'] = 1;
            $data['message'] = $this->session->get('message');
            $this->clear();
        }
        else {
            $data['error'] = 0;
        }
        $activeDirectoryUser = $this->UserActiveDirectory->getinfo($username);
        $useractivedirectoryExact = false; 
        if ($activeDirectoryUser['count']>0) {
            if (isset($activeDirectoryUser[0]['samaccountname'][0])) {
                $usernameAD = $activeDirectoryUser[0]['samaccountname'][0];
                if (strtoupper($usernameAD)==strtoupper($username)){
                    $useractivedirectoryExact = true;
                }
            }
        }
        /*foreach ($activeDirectoryUser as $row){
            var_dump($row[0]);
        }*/               
        $data['useractivedirectoryExact'] = $useractivedirectoryExact;
        $userPMed = $this->UserPMedModel->getByUserlogin($username);
        $data['userrecord'] = $this->UserModel->getByUserlogin($username);
        $data['userpmedrecord'] = $userPMed;
        $data['useractivedirectory'] = $activeDirectoryUser;
        $data['content'] = 'search/selected';
        return view('Design/default_page',$data);
    }
}