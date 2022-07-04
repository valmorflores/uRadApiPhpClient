<?php

namespace App\Controllers;

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


}
