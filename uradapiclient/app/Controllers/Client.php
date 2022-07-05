<?php

namespace App\Controllers;
use HTTP\IncomingRequest;


class Client extends BaseController
{
    private $session;
    private $api;

    public function __construct()
    {
        $this->session = session();
        $this->api = new ApiController();
        helper('profile');
    }

    public function index($token='')
    {
        $info = $this->api->getWithAuthorization('/tables/data/table_client',$token);
        $data['token'] = $token;
        $data['info'] = json_decode( $info );
        $data['error']='';
        $data['content'] = 'client/client_view';
        return view('Design/default_page',$data);
    }

    public function postdo($token='')
    {                
         
	$datainfo = '{
            "autoinc" : "id",
            "name" : "'. $this->request->getVar('name') .'"
        }';

	$url = '/tables/data/table_client';
        $info = $this->api->postWithAuthorization($url,$datainfo,$token);
        echo var_dump($info);
	echo var_dump($url);
	echo var_dump($datainfo);

        die;
    }

    public function addnew($token='')
    {
        $data['token'] = $token;
        $data['content'] = 'client/client_new';
        return view('Design/default_page',$data);
        
    }


}
