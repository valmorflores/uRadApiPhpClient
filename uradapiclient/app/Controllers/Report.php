<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserPMedModel;
use App\Models\ProviderModel;
use App\Models\AdminUserModel;
use App\Models\LocaisTrabalhoModel;
use App\Models\AdminUserCommentsModel;

class Report extends BaseController
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
        }
        if ($this->isError()){
            $data['error'] = 1;
            $data['message'] = $this->session->get('message');
            $this->clear();
        }
        else {
            $data['error'] = 0;
        }
        $data['content'] = 'login/login';
        return view('Design/default_page',$data);
    }

    public function r($fileReport) 
    {  

        $username = $this->session->get('username');
        $data['username'] = $username;
        $data['error'] = 0;
        $data['content'] = 'user/new';
        echo 'param = ' . $fileReport;
        if ($fileReport == 'rel_mapa_dieta_por_atendimento_lista'){
            echo '<br>starting report';
            $path = 'c:\\xampp\\htdocs\\reports\\';
            $fileReportComplete = $path . 'wsreport\\reports\\' . 'rel_mapa_dieta_por_atendimento_lista';
            $cmd = $path . 'wsreport\\wsreport.exe -r ' . $fileReportComplete . ' ' . $path . 'download\\file_report.pdf parameters=0';
            echo '<br>' . $cmd;
            $retInfo = shell_exec($cmd);
            //$retInfo = popen( $cmd, 'r' );
            //exec($cmd,$retInfo,$rv);
            echo 'run.bat';
            //$retInfo = popen('c:\\xampp\\htdocs\\reports\\wsreport\\run.bat','r');
            var_dump($retInfo);die;
            //echo '<br>'.nl2br($retInfo);die;
        }
        return view('Design/default_page',$data);       
    }
    
}

