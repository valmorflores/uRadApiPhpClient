<?php

namespace App\Controllers;

class ApiController extends BaseController
{
    private $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        $login = '{
            "email" : "valmorflores@gmail.com",
            "password" : "0"
        }';
        echo $this->get('/about');
        echo $this->post('/user/login', $login);
        die;
    }

    public function get($uri){
        $proxy = '';
        $url = getenv('APP_API_URL') . $uri;
        if ( getenv('APP_API_URL') ) {
           $proxy = getenv('APP_API_PROXY');
        }
        
        //var_dump($url);
        //$proxyauth = 'user:password';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        //curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        return $curl_scraped_page;
    }
   
    public function post($uri,$data){
 
        $url = getenv('APP_API_URL') . $uri;
        if ( getenv('APP_API_PROXY') ) {
           $proxy = getenv('APP_API_PROXY');
        }
             
        $ch = curl_init($url);
        
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json')
        );
            
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        return $curl_scraped_page;
    }

    public function postAndStoreAuthorization($uri,$data){
 
        $url = getenv('APP_API_URL') . $uri;
        if ( getenv('APP_API_PROXY') ) {
           $proxy = getenv('APP_API_PROXY');
        }
             
        $ch = curl_init($url);
        
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json')
        );
            
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode(((array) $curl_scraped_page)[0]);
        if (isset($obj->error)) {
            $this->session->setFlashdata('token','');
        }
        else
        {
            if (!isset($obj->token)){
                var_dump($curl_scraped_page);
                die;
            }
            //var_dump($obj->token);
            $this->session->setFlashdata('token',$obj->token);
        }
        return $curl_scraped_page;
    }

    public function postWithAuthorization($uri, $data, $auth=''){
        
        $url = getenv('APP_API_URL') . $uri;
        if ( getenv('APP_API_PROXY') ) {
           $proxy = getenv('APP_API_PROXY');
        }
             
        $ch = curl_init($url);
        if ($auth!=''){
            $authorization = $auth;
        } else{
            $authorization = $this->session->getFlashdata('token');
        }
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $authorization)
        );
            
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        return $curl_scraped_page;

    }

    public function getWithAuthorization($uri, $auth=''){
        
        $url = getenv('APP_API_URL') . $uri;
        if ( getenv('APP_API_PROXY') ) {
           $proxy = getenv('APP_API_PROXY');
        }
             
        $ch = curl_init($url);
        if ($auth!=''){
            $authorization = $auth;
        } else {
            $authorization = $this->session->getFlashdata('token');
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $authorization)
        );
            
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        return $curl_scraped_page;

    }

    public function send_notification_FCM($notification_id, $title, $message, $id,$type) {
        $accesstoken = 'fcm_key';
     
        $URL = 'https://fcm.googleapis.com/fcm/send';
     
     
            $post_data = '{
                "to" : "' . $notification_id . '",
                "data" : {
                  "body" : "",
                  "title" : "' . $title . '",
                  "type" : "' . $type . '",
                  "id" : "' . $id . '",
                  "message" : "' . $message . '",
                },
                "notification" : {
                     "body" : "' . $message . '",
                     "title" : "' . $title . '",
                      "type" : "' . $type . '",
                     "id" : "' . $id . '",
                     "message" : "' . $message . '",
                    "icon" : "new",
                    "sound" : "default"
                    },
     
              }';
            // print_r($post_data);die;
     
        $crl = curl_init();
     
        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: ' . $accesstoken;
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
     
        curl_setopt($crl, CURLOPT_URL, $URL);
        curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);
     
        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
     
        $rest = curl_exec($crl);
     
        if ($rest === false) {
            // throw new Exception('Curl error: ' . curl_error($crl));
            //print_r('Curl error: ' . curl_error($crl));
            $result_noti = 0;
        } else {
     
            $result_noti = 1;
        }
     
        //curl_close($crl);
        //print_r($result_noti);die;
        return $result_noti;
    }

}
