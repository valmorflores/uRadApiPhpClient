<?php

namespace App\Controllers;

class About extends BaseController
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
        $info = $this->api->get('/about');
        $data['token'] = $token;
        $data['info'] = json_decode( $info );
        $data['error']='';
        $data['content'] = 'about/credits';
        return view('Design/default_page',$data);
    }


}
