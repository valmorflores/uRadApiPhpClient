<?php

namespace App\Controllers;

const DEFAULT_LIMIT = 25;

class Dashboard extends BaseController
{
    private $session;
    private $api;

    public function __construct()
    {
        // Create a shared instance of the model
        $this->api = new ApiController();
        $this->session = session();
        helper('profile');
    }

    public function index()
    {   
        
        //$tables = $this->api->getWithAuthorization('/tables');
        //var_dump($tables);die;
        /*
        $data['datatable'] = $dataList;
        $data['content'] = 'Main/dashboard';
        return view('Design/default_page',$data);
        */
        
    }

    public function tables($token)
    {   
       
        $tables = $this->api->getWithAuthorization('/tables',$token);
        $data['token'] = $token;
        $data['datatable'] = $tables;
        $data['content'] = 'Main/dashboard';
        return view('Design/default_page',$data);
    }

}
