<?php

/**
* Response Class
*/
class Rs
{
    
    public static function p($status= 1,$msg = null,$data = [], $code = 200){
        
        if (method_exists($msg,'getMessage')) {
            $msg = $msg->getMessage();
        }
        
        $response = new \Phalcon\Http\Response();
        
        $response->setHeader("Content-Type", "application/json");
        
        if($status)
        {
            $response->setStatusCode(200); 
        }
        else
        {
            $response->setStatusCode($code);
        }
        
        $response->setJsonContent(array(
                'status' => $status == 1 ? 'success' : 'error',
                'msg' => $msg,
                'data' => $data,
            ));
        
        $response->send();
    }
}