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
        $infoJson = json_decode($info);
        if (!isset($infoJson->status)){
            echo 'Erro, resultado desconhecido';
            if (isset($infoJson->message)){
                echo '<br>' . $infoJson->message;
            }
            echo var_dump($info);
	        echo var_dump($url);
	        echo var_dump($datainfo);
            return false;
        }
        if ($infoJson->status==200){
            echo 'Sucesso na inclusao dos dados';
        }
        else
        {
            echo 'Erro ao inserir informações';
            echo var_dump($info);
	        echo var_dump($url);
	        echo var_dump($datainfo);
            return false;
        }
        return true;
    }

    public function addnew($token='')
    {
        $data['token'] = $token;
        $data['content'] = 'client/client_new';
        return view('Design/default_page',$data);
        
    }


}
