<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\ApiController;

class Login extends BaseController
{

    private $session;

    public function __construct()
    {
        // Create a shared instance of the model
        $this->ApiController = new ApiController();
        $this->session = session();
    }


    public function index()
    {
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

    public function auth(){
        $email = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $login = '{
            "email" : "'.$email.'",
            "password" : "'. $password .'"
        }';
        //echo $this->ApiController->get('/about');
        $info = (array) $this->ApiController->postAndStoreAuthorization('/user/login', $login);
        $obj = json_decode($info[0]);
        if (isset( $obj->error )){
            if ($obj->status==404){
                $this->set_error('Dados inválidos');
            } else if ($obj->status==403){
                $this->set_error('Acesso negado, usuário ou senha incorretos');
            } else {
                $this->set_error('Dados invalidos ou servidor indisponível');
            }
        } else 
        if ( strlen( $obj->token ) > 32 ) {
            //$this->set_error('Sucesso de login, continue');
            $this->clear();
        }

        $error = $this->isError();
        if ($error){
            //var_dump($this->getMessage());
            $data['error'] = 1;
            $data['message'] = $this->getMessage();
            $data['content'] = '/login/login';
            $this->clear();
            return view('Design/default_page',$data);
        }
        else
        {
            $data['token'] = $this->session->getFlashData('token');
            $data['content'] = '/welcome_message';
            return view('Design/default_page',$data);
            //redirect()->to(base_url("dashboard"));
        }
    }


    function off(){
        $this->session->setFlashdata('token','');
        $this->clear();
        $data['error']='';
        $data['content'] = 'login/login';
        return view('Design/default_page',$data);
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


}
