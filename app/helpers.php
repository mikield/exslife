<?php

if(!function_exists('vkRequest')){
  function vkRequest($method,$params = ''){
    if($method != 'auth'):
      return json_decode(file_get_contents('https://api.vk.com/method/'.$method.'?'.$params));
    else:
      return json_decode(file_get_contents('https://oauth.vk.com/token?grant_type=password&client_id='.$params[0].'&client_secret='.$params[1].'&username='.urlencode($params[2]).'&password='.urlencode($params[3])));
    endif;
  }
}

if(!function_exists('Message')){
  function Message($type,$message = '',$more = []){
    echo json_encode(['theme'=>$type,'title'=>$message,'more'=>$more]);
  }
}

if(!function_exists('prd')){
  function prd($array){
    echo "<pre>";
    print_r($array);
    die();
  }
}

if(!function_exists('generatePage')){
  function generatePage($viewCode,$title){
    if(Request::ajax()) {
        $view = $viewCode;
        $view = $view->renderSections();
        echo json_encode(array('html' => $view,'newTitle' => $title));
    }else{
    echo $viewCode;
    }
  }
}