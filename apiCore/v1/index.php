<?php

require 'flight/Flight.php';

require_once 'database/db_users.php';
require_once 'env/domain.php';

Flight::route('POST /postUsersIntegration/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
       






        
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response11 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response11 == 'true' ) {

          

            $sub_domaincon1=new model_domain();
            $sub_domain1=$sub_domaincon1->dom();
            
$url1 = $sub_domain1 . "/lugmagateway/apiCore/v1/postUsersIntegration/".$apk."/".$xapk;
// Definir los datos a enviar en la solicitud POST
$data = array(
    'name' => Flight::request()->data->name,
            'lastName' => Flight::request()->data->lastName,
            'personalMail' => Flight::request()->data->personalMail,
            'keyWord' => Flight::request()->data->keyWord,
            'contact' => Flight::request()->data->contact
);

// Convertir los datos a formato JSON
$json_data = json_encode($data);

// Inicializar la sesión cURL
$curl1 = curl_init();

// Configurar las opciones de la sesión cURL
curl_setopt($curl1, CURLOPT_URL, $url1);
curl_setopt($curl1, CURLOPT_POST, true);
curl_setopt($curl1, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);



// Ejecutar la solicitud y obtener la respuesta
$response1 = curl_exec($curl1);

// Cerrar la sesión cURL
curl_close($curl1);


$responsefull = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
$array = explode("|", $responsefull);
$response=$array[0];
$message=$array[1];
$userid=$array[2];
$rancode=$array[3];
$apiToken=$array[4];
$userName=$array[5];
//echo $_SESSION['key'];

$responsefu = trim($response); // Eliminar espacios en blanco alrededor de la respuesta

if($responsefu=="true"){




    $dta = [
            
        'name' => Flight::request()->data->name,
        'lastName' => Flight::request()->data->lastName,
        'personalMail' => Flight::request()->data->personalMail,
        'userId' => $userid,
        'contact' => Flight::request()->data->contact,
        'rolId' => Flight::request()->data->rolId,
        'ranCode' => $rancode,
        'apiToken' => $apiToken,
        'userName' => $userName,
        'apk' => $xapk,
        
        'clientId' => Flight::request()->data->clientId
        
    ];
    require_once('../../apiCore/v1/controller/users/post_functions.php');
            
    $post_users = new post_functions();
    echo $post_users->post_users($dta);
  
    //$response2=$post_users->post_users($dta);
    //var_dump($response2);
    //echo $response1;
    
    
    
}else{

    //echo $message;


    $dta = [
            
        'name' => Flight::request()->data->name,
        'lastName' => Flight::request()->data->lastName,
        'personalMail' => Flight::request()->data->personalMail,
        'userId' => $userid,
        'contact' => Flight::request()->data->contact,
        'rolId' => Flight::request()->data->rolId,
        'ranCode' => $rancode,
        'apiToken' => $apiToken,
        'userName' => $userName,
        'apk' => $xapk,
        
        'clientId' => Flight::request()->data->clientId
        
    ];
    require_once('../../apiCore/v1/controller/users/post_functions.php');
            
    $post_users = new post_functions();
    echo $post_users->post_users($dta);
  
//$response2=$post_users->post_users($dta);
//var_dump($response2);
//echo $response1;


           
}
           // echo json_encode($response1);
        } else {
            echo 'false|¡Autenticación fallida!';
           // echo json_encode($data);
        }
    } else {
        echo 'false|¡Encabezados faltantes!';
    }
});




Flight::route('POST /postInternalUsersIntegration/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
       






        
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response11 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response11 == 'true' ) {

          

            $sub_domaincon1=new model_domain();
            $sub_domain1=$sub_domaincon1->dom();
            
$url1 = $sub_domain1 . "/lugmagateway/apiCore/v1/postUsersIntegration/".$apk."/".$xapk;
// Definir los datos a enviar en la solicitud POST
$data = array(
    'name' => Flight::request()->data->name,
            'lastName' => Flight::request()->data->lastName,
            'personalMail' => Flight::request()->data->personalMail,
            'keyWord' => Flight::request()->data->keyWord,
            'contact' => Flight::request()->data->contact

);

// Convertir los datos a formato JSON
$json_data = json_encode($data);

// Inicializar la sesión cURL
$curl1 = curl_init();

// Configurar las opciones de la sesión cURL
curl_setopt($curl1, CURLOPT_URL, $url1);
curl_setopt($curl1, CURLOPT_POST, true);
curl_setopt($curl1, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);



// Ejecutar la solicitud y obtener la respuesta
$response1 = curl_exec($curl1);

// Cerrar la sesión cURL
curl_close($curl1);


$responsefull = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
$array = explode("|", $responsefull);
$response=$array[0];
$message=$array[1];
$userid=$array[2];
$rancode=$array[3];
$apiToken=$array[4];
$userName=$array[5];
//echo $_SESSION['key'];

$responsefu = trim($response); // Eliminar espacios en blanco alrededor de la respuesta

if($responsefu=="true"){




    $dta = [
            
        'name' => Flight::request()->data->name,
        'lastName' => Flight::request()->data->lastName,
        'personalMail' => Flight::request()->data->personalMail,
        'userId' => $userid,
        'contact' => Flight::request()->data->contact,
        'rolId' => Flight::request()->data->rolId,
        'ranCode' => $rancode,
        'apiToken' => $apiToken,
        'userName' => $userName,
        'apk' => $xapk,
         'clientId' => Flight::request()->data->clientId
        
    ];
    require_once('../../apiCore/v1/controller/users/post_functions.php');
            
    $post_users = new post_functions();
    echo $post_users->post_internalusers($dta);
  
    //$response2=$post_users->post_users($dta);
    //var_dump($response2);
    //echo $response1;
    
    
    
}else{

    //echo $message;


    $dta = [
            
        'name' => Flight::request()->data->name,
        'lastName' => Flight::request()->data->lastName,
        'personalMail' => Flight::request()->data->personalMail,
        'userId' => $userid,
        'contact' => Flight::request()->data->contact,
        'rolId' => Flight::request()->data->rolId,
        'ranCode' => $rancode,
        'apiToken' => $apiToken,
        'userName' => $userName,
        'apk' => $xapk,
        
        'clientId' => Flight::request()->data->clientId
        
    ];
    require_once('../../apiCore/v1/controller/users/post_functions.php');
            
    $post_users = new post_functions();
    echo $post_users->post_users($dta);
  
//$response2=$post_users->post_users($dta);
//var_dump($response2);
//echo $response1;


           
}
           // echo json_encode($response1);
        } else {
            echo 'false|¡Autenticación fallida!';
           // echo json_encode($data);
        }
    } else {
        echo 'false|¡Encabezados faltantes!';
    }
});








Flight::route('POST /postUsersIntegrationAdmin/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
       






        
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response11 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response11 == 'true' ) {

          

            $sub_domaincon1=new model_domain();
            $sub_domain1=$sub_domaincon1->dom();
            
$url1 = $sub_domain1 . "/lugmagateway/apiCore/v1/postUsersIntegration/".$apk."/".$xapk;
// Definir los datos a enviar en la solicitud POST
$data = array(
    'name' => Flight::request()->data->name,
            'lastName' => Flight::request()->data->lastName,
            'personalMail' => Flight::request()->data->personalMail,
            'keyWord' => Flight::request()->data->keyWord,
            'contact' => Flight::request()->data->contact
);

// Convertir los datos a formato JSON
$json_data = json_encode($data);

// Inicializar la sesión cURL
$curl1 = curl_init();

// Configurar las opciones de la sesión cURL
curl_setopt($curl1, CURLOPT_URL, $url1);
curl_setopt($curl1, CURLOPT_POST, true);
curl_setopt($curl1, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);



// Ejecutar la solicitud y obtener la respuesta
$response1 = curl_exec($curl1);

// Cerrar la sesión cURL
curl_close($curl1);


$responsefull = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
$array = explode("|", $responsefull);
$response=$array[0];
$message=$array[1];
$userid=$array[2];
$rancode=$array[3];
$apiToken=$array[4];
$userName=$array[5];
//echo $_SESSION['key'];

$responsefu = trim($response); // Eliminar espacios en blanco alrededor de la respuesta

if($responsefu=="true"){




    $dta = [
            
        'name' => Flight::request()->data->name,
        'lastName' => Flight::request()->data->lastName,
        'personalMail' => Flight::request()->data->personalMail,
        'userId' => $userid,
        'contact' => Flight::request()->data->contact,
        'rolId' => Flight::request()->data->rolId,
        'ranCode' => $rancode,
        'apiToken' => $apiToken,
        'userName' => $userName,
        'apk' => $xapk,
        'clientId' => Flight::request()->data->clientId,
        
    ];
    require_once('../../apiCore/v1/controller/users/post_functions.php');
            
    $post_users = new post_functions();
    $post_users->post_users($dta);
  echo $responsefull;
    //$response2=$post_users->post_users($dta);
    //var_dump($response2);
    //echo $response1;
    
    
    
}else{

    //echo $message;


    $dta = [
            
        'name' => Flight::request()->data->name,
        'lastName' => Flight::request()->data->lastName,
        'personalMail' => Flight::request()->data->personalMail,
        'userId' => $userid,
        'contact' => Flight::request()->data->contact,
        'rolId' => Flight::request()->data->rolId,
        'ranCode' => $rancode,
        'apiToken' => $apiToken,
        'userName' => $userName,
        'apk' => $xapk,
        'clientId' => Flight::request()->data->clientId
        
    ];
    require_once('../../apiCore/v1/controller/users/post_functions.php');
            
    $post_users = new post_functions();
    $post_users->post_users($dta);
    echo $responsefull;
//$response2=$post_users->post_users($dta);
//var_dump($response2);
//echo $response1;


           
}
           // echo json_encode($response1);
        } else {
            echo 'false|¡Autenticación fallida!';
           // echo json_encode($data);
        }
    } else {
        echo 'false|¡Encabezados faltantes!';
    }
});






Flight::route('POST /postClient/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
       




        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response11 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response11 == 'true' ) {



            $clientName= Flight::request()->data->clientName;
            $comments= Flight::request()->data->comments;
            $clientType= Flight::request()->data->clientType;
            $ownerName= Flight::request()->data->ownerName;
            $ownerLastName= Flight::request()->data->ownerLastName;
            $rolId= Flight::request()->data->rolId;
            $contact= Flight::request()->data->contact;
            $email= Flight::request()->data->email;
            $keyWord= Flight::request()->data->keyWord;


            require_once '../../apiCore/v1/model/modelSecurity/uuid/uuidd.php';
           
   

            $gen_uuid = new generateUuid();
            $myuuid = $gen_uuid->guidv4();
            $myuuid1 = $gen_uuid->guidv4();
            $myuuid2 = $gen_uuid->guidv4();
            $myuuid3 = $gen_uuid->guidv4();

            $clientId = substr($myuuid, 0, 8);
            
            $secretId = substr($myuuid1, 0, 8);
            
            $subId = substr($myuuid2, 0, 8);

            $styleId = substr($myuuid3, 0, 8);
          

            $conectar=conn();
           
                       


            $sub_domain=$sub_domaincon->domIntegrations();

            $url = $sub_domain . "/kairosGateway/apiCore/v1/postUsersIntegrationAdmin/fL2jz91ptFMA3UwVkBbu/6WclAmsaP9H7SR2WmpDbl1OL9";

            // Definir los datos a enviar en la solicitud POST
            $data = array(
                'name' => $ownerName, 
                'lastName' => $ownerLastName,
                'personalMail' => $email,
            
                'keyWord' => $keyWord,
                'contact' => $contact,
                'rolId' => $rolId,
                'clientId' => $clientId
                
            );
            
            // Convertir los datos a formato JSON
            $json_data = json_encode($data);
            
            // Inicializar la sesión cURL
            $curl = curl_init();
            
            // Configurar las opciones de la sesión cURL
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            // Ejecutar la solicitud y obtener la respuesta
            $response1 = curl_exec($curl);
            
            // Cerrar la sesión cURL
            curl_close($curl);



            
            $array = explode("|", $response1);
            $response=$array[0];
            $message=$array[2];
            $userid=$array[3];
            $rancode=$array[4];
            $apiToken1=$array[5];
            $userName=$array[6];




function generateApiTokenadmin() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $token = '';
  
    $characterCount = strlen($characters);
    for ($i = 0; $i < 20; $i++) {
      $randomIndex = rand(0, $characterCount - 1);
      $token .= $characters[$randomIndex];
    }
  
    return $token;
  }
  
  $apiToken = generateApiTokenadmin();
 
  

 function generateRandomCodeadmin() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $token = '';
  
    $characterCount = strlen($characters);
    for ($i = 0; $i < 8; $i++) {
      $randomIndex = rand(0, $characterCount - 1);  
      $token .= $characters[$randomIndex];
    }
  
    return $token;
  }
  
  $ranCode = generateRandomCodeadmin();




     $query= mysqli_query($conectar,"INSERT INTO clients (clientId,clientName,comments,ownerId,styleId,subId,clientType) VALUES ('$clientId','$clientName','$comments','$userid','$styleId','$subId','$clientType')");
     $query= mysqli_query($conectar,"INSERT INTO clientSecrets (secretId,apiKey,secRanCode,clientId) VALUES ('$secretId','$apiToken','$ranCode','$clientId')");

    
    
     $query= mysqli_query($conectar,"UPDATE generalUsers SET clientId='$clientId' WHERE userId='$userid'");
     $query= mysqli_query($conectar,"UPDATE userSecrets SET apiKey='$apiToken1' WHERE userId='$userid'");
     $query= mysqli_query($conectar,"INSERT INTO owners (ownerId,userId,name,lastName,contact,email) VALUES ('$userid','$userid','$ownerName','$ownerLastName','$contact','$email')");
     $query= mysqli_query($conectar,"INSERT INTO subList (subId,clientId) VALUES ('$subId','$clientId')");
     
     $query= mysqli_query($conectar,"INSERT INTO clientStyle (styleId,clientId,bgColor,textColor) VALUES ('$styleId','$clientId','000000','FFFFFF')");
     
            echo "true|¡Cliente creado con exito!";
        
           // echo json_encode($response1);
        } else {
            echo 'false|¡Autenticación fallida!';
           // echo json_encode($data);
        }
    } else {
        echo 'false|¡Encabezados faltantes!';
    }
});








Flight::route('POST /putExtClient/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
       




        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response11 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response11 == 'true' ) {



            $clientId= Flight::request()->data->clientId;
            $filter= Flight::request()->data->filter;
            $value= Flight::request()->data->value;
            $param= Flight::request()->data->param;


            require_once '../../apiCore/v1/model/modelSecurity/uuid/uuidd.php';
           
   

            $conectar=conn();
           if($value=="del"){
       
            $query= mysqli_query($conectar,"DELETE FROM owners WHERE ownerId IN (SELECT ownerId FROM clients WHERE clientId = '$clientId')");
           
            $query= mysqli_query($conectar,"DELETE FROM subList WHERE clientId='$clientId'");
            $query= mysqli_query($conectar,"DELETE FROM clientSecrets WHERE clientId='$clientId'");
            $query= mysqli_query($conectar,"DELETE FROM clients WHERE clientId='$clientId'");
            echo "true|¡Cliente removido con exito!";
           }
           else if($value=="delAll"){
            $query= mysqli_query($conectar,"DELETE FROM owners WHERE ownerId IN (SELECT ownerId FROM clients WHERE clientId = '$clientId')");
            $query= mysqli_query($conectar,"DELETE FROM userSecrets WHERE userId IN (SELECT userId FROM generalUsers WHERE clientId = '$clientId')");
            $query= mysqli_query($conectar,"DELETE FROM sessionLog WHERE userId IN (SELECT userId FROM generalUsers WHERE clientId = '$clientId')");
 
            $query= mysqli_query($conectar,"DELETE FROM generalUsers WHERE clientId='$clientId'");
            $query= mysqli_query($conectar,"DELETE FROM clientSecrets WHERE clientId='$clientId'");
            $query= mysqli_query($conectar,"DELETE FROM subList WHERE clientId='$clientId'");
            $query= mysqli_query($conectar,"DELETE FROM clients WHERE clientId='$clientId'");
           
            $dta = array(
            
                'clientId' => Flight::request()->data->clientId
                
            );
            $dt=json_encode($dta);
            
            $url = $sub_domain."/kairosCore/apiCompanies/v1/putExtClient/$apk/$xapk";
      
            $curl = curl_init();
            
            // Configurar las opciones de la sesión cURL
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dt);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      
            $headers = array(
              'Content-Type: application/json'
          );
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            
            // Ejecutar la solicitud y obtener la respuesta
            $response2 = curl_exec($curl);
            
      
       
          curl_close($curl);







            echo "true|¡Cliente removido con toda su información con exito! -> ".$response2;
           }
           else if($value=="client"){
            $query= mysqli_query($conectar,"UPDATE clients SET $filter='$param' WHERE clientId='$clientId'");
 

            echo "true|¡Cliente actualizado con exito!";
           }
          else if($value=="style"){
            $query= mysqli_query($conectar,"UPDATE clientStyle SET $filter='$param' WHERE clientId='$clientId'");
 

            echo "true|¡Estilo de cliente actualizado con exito!";
           }

    
     
        
           // echo json_encode($response1);
        } else {
            echo 'false|¡Autenticación fallida!';
           // echo json_encode($data);
        }
    } else {
        echo 'false|¡Encabezados faltantes!';
    }
});





Flight::route('POST /putIntUser/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
       




        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response11 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response11 == 'true' ) {



            $userId= Flight::request()->data->userId;
            $filter= Flight::request()->data->filter;
            $value= Flight::request()->data->value;


            require_once '../../apiCore/v1/model/modelSecurity/uuid/uuidd.php';
           
   

            $conectar=conn();
           if($value=="del"){
       
           
            $query= mysqli_query($conectar,"DELETE FROM userSecrets WHERE userId='$userId'");
            
            $query= mysqli_query($conectar,"DELETE FROM sessionLog WHERE userId ='$userId'");
            $query= mysqli_query($conectar,"DELETE FROM internalUsers WHERE userId='$userId'");
 
            echo "true|¡Usuario interno removido con exito!";
           }
          
           else if($value!="del"){
            $query= mysqli_query($conectar,"UPDATE internalUsers SET $filter='$value' WHERE userId='$userId'");
 

            echo "true|¡Usuario interno actualizado con exito!";
           }

    
     
        
           // echo json_encode($response1);
        } else {
            echo 'false|¡Autenticación fallida!';
           // echo json_encode($data);
        }
    } else {
        echo 'false|¡Encabezados faltantes!';
    }
});





Flight::route('POST /putGenUser/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
       




        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response11 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response11 == 'true' ) {



            $userId= Flight::request()->data->userId;
            $filter= Flight::request()->data->filter;
            $value= Flight::request()->data->value;


            require_once '../../apiCore/v1/model/modelSecurity/uuid/uuidd.php';
           
   

            $conectar=conn();
           if($value=="del"){
       
           
            $query= mysqli_query($conectar,"DELETE FROM userSecrets WHERE userId='$userId'");
            
            $query= mysqli_query($conectar,"DELETE FROM sessionLog WHERE userId ='$userId'");
            $query= mysqli_query($conectar,"DELETE FROM generalUsers WHERE userId='$userId'");
 
            echo "true|¡Usuario removido con exito!";
           }
          
           else if($value!="del"){
            $query= mysqli_query($conectar,"UPDATE generalUsers SET $filter='$value' WHERE userId='$userId'");
 

            echo "true|¡Usuario actualizado con exito!";
           }

    
     
        
           // echo json_encode($response1);
        } else {
            echo 'false|¡Autenticación fallida!';
           // echo json_encode($data);
        }
    } else {
        echo 'false|¡Encabezados faltantes!';
    }
});















Flight::route('GET /getModeratorInfo/@profileId/', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
 
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
       

    $conectar=conn();
            
          
    $query= mysqli_query($conectar,"SELECT profileId FROM users where mail='$profileId'");
       
  
        
  
        while($row = $query->fetch_assoc())
        {
                
                    $_SESSION['pId']=$row['profileId'];
                
              
                
        }
        $row=$query->fetch_assoc();
        //echo json_encode($students) ;
        echo $_SESSION['pId'];
  
       


           
           

        
});














Flight::route('GET /getUserGroups/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
 
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
       

    $conectar=conn();
            
          
    $query= mysqli_query($conectar,"SELECT profileId,name,lastName,mail,rolId,userName FROM users");
       
  
        
    $values=[];
          
    while($row = $query->fetch_assoc())
    {
            $value=[
                'profileId' => $row['profileId'],
                'name' => $row['name'],
                'lastName' => $row['lastName'],
                'mail' => $row['mail'],
                'rolId' => $row['rolId'],
                'userName' => $row['userName']
            ];
            
            array_push($values,$value);
            
    }
    $row=$query->fetch_assoc();
    //echo json_encode($students) ;
    $response1= json_encode(['users'=>$values]);
  
       

echo $response1;
           
           

        
});




Flight::route('GET /getInternalUsersClient/@filter/@cid', function ($filter,$cid) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyKairos/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          if($filter=="unlock"){
            $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId FROM generalUsers u WHERE u.status=1 and u.clientId=$cid");
          
          }
          if($filter=="lock"){
            $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId FROM generalUsers u WHERE u.status=0 and u.clientId=$cid");
          echo "hola";
          }
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'email' => $row['email'],
                            'userName' => $row['userName'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'rolId' => $row['rolId'],
                            'contact' => $row['contact'],
                            'sessionCounter' => $row['sessionCounter'],
                            'clientId' => $row['clientId']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
              //  echo json_encode(['users'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});











Flight::route('GET /getInternalUsers/@filter', function ($filter) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyKairos/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          if($filter=="unlock"){
            $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM internalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=1");
          
          }
          if($filter=="lock"){
            $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM internalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=0");
          
          }
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'email' => $row['email'],
                            'userName' => $row['userName'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'rolId' => $row['rolId'],
                            'contact' => $row['contact'],
                            'sessionCounter' => $row['sessionCounter'],
                            'clientId' => $row['clientId'],
                            'clientName' => $row['clientName']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});





Flight::route('GET /getGeneralUsers/@filter/@user', function ($filter,$user) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyKairos/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            if($user=="all"){
                if($filter=="unlock"){
                    $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM generalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=1");
                  
                  }
                  if($filter=="lock"){
                    $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM generalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=0");
                  
                  }

            }
            if($user!="all"){
                
                    $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM generalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=1 and u.clientId='$user'");
                

            }
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'email' => $row['email'],
                            'userName' => $row['userName'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'rolId' => $row['rolId'],
                            'contact' => $row['contact'],
                            'sessionCounter' => $row['sessionCounter'],
                            'clientId' => $row['clientId'],
                            'clientName' => $row['clientName']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});






Flight::route('GET /getInternalClients/@filter', function ($filter) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyKairos/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            if($filter=="unlock"){
                $query= mysqli_query($conectar,"SELECT c.clientId,c.clientName,c.comments,c.isActive,c.status,c.ownerId,c.styleId,c.subId,c.clientType,o.name,o.lastName,o.contact,o.email,s.apiKey FROM clients c JOIN owners o ON c.ownerId=o.ownerId JOIN clientSecrets s ON s.clientId=c.clientId WHERE c.status=1");
           
            }
          
            if($filter=="lock"){
                $query= mysqli_query($conectar,"SELECT c.clientId,c.clientName,c.comments,c.isActive,c.status,c.ownerId,c.styleId,c.subId,c.clientType,o.name,o.lastName,o.contact,o.email,s.apiKey FROM clients c JOIN owners o ON c.ownerId=o.ownerId JOIN clientSecrets s ON s.clientId=c.clientId WHERE c.status=0");
           
            }
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'ownerId' => $row['ownerId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'email' => $row['email'],
                            'key' => $row['apiKey'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'styleId' => $row['styleId'],
                            'contact' => $row['contact'],
                            'subId' => $row['subId'],
                            'clientId' => $row['clientId'],
                            'clientName' => $row['clientName'],
                            'comments' => $row['comments'],
                            'clientType' => $row['clientType']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['clients'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getClientStyle/@filter', function ($filter) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyKairos/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
                $query= mysqli_query($conectar,"SELECT styleId,bgColor,textColor,imgLogo,imgIcon,imgGif,clientId FROM clientStyle WHERE clientId='$filter'");
           
            
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'styleId' => $row['styleId'],
                            'bgColor' => $row['bgColor'],
                            'textColor' => $row['textColor'],
                            'imgLogo' => $row['imgLogo'],
                            'imgIcon' => $row['imgIcon'],
                            'imgGif' => $row['imgGif'],
                            'clientId' => $row['clientId']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['clientStyle'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});











Flight::route('POST /postUsersByAdmin/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
        $dta = [
            
            'name' => Flight::request()->data->name,
            'lastName' => Flight::request()->data->lastName,
            'personalMail' => Flight::request()->data->personalMail,
            'companyMail' => Flight::request()->data->companyMail,
           
            
            'ownerId' => Flight::request()->data->ownerId,
            'rolId' => Flight::request()->data->rolId,
            'imageUrl' => Flight::request()->data->imageUrl
        ];






        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {



            $url1 = $sub_domain.'/crystalCore/apiAuth/v1/validatePermisions/';
      
            $dat = array(
              'profileId' =>$profileId
              
              );
          $curl = curl_init();
          
          // Configurar las opciones de la sesión cURL
          curl_setopt($curl, CURLOPT_URL, $url1);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $dat);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          
          // Ejecutar la solicitud y obtener la respuesta
          $response2 = curl_exec($curl);
    
          
    
    
          curl_close($curl);
    
        //  echo $response1;

if($response2=="true"){

    require_once('../../apiUsers/v1/controller/users/post_functions.php');
            
    $post_users = new post_functions();
  // echo $post_users->post_usersAdmin($dta);
  $response2=$post_users->post_usersAdmin($dta);
//var_dump($response2);
if(strlen($response2) == 8){


    
$dta1 = [
            
    'profileId' => $response2
];
         // $rectify=$response2;
         $sub_domaincon=new model_domain();
         $sub_domain=$sub_domaincon->domIntegrations();
$url = $sub_domain.'/crystalIntegrations/apiControlTower/v1/postSchedule/';

$curl = curl_init();

// Configurar las opciones de la sesión cURL
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers1 = array(
    'Api-Key: ' . $apiKey,
    'x-api-Key: ' . $xApiKey
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers1);

// Ejecutar la solicitud y obtener la respuesta
$response3 = curl_exec($curl);


//echo json_encode($headers);

//echo $response2;
/*
curl_close($curl);
//*/
echo $response3."*¡Usuario creado con exito!";
}
else{
echo "false*¡Token invalido!";
}
 // echo $response1;

}else{

    echo "false*No tienes permisos para realizar esta acción!";
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});





Flight::route('POST /putUsersByAdmin/@profileId/@putId', function ($profileId,$putId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
        
            
            $name= Flight::request()->data->name;
            $lastName=Flight::request()->data->lastName;
            $personalMail=Flight::request()->data->personalMail;
            $imageUrl= Flight::request()->data->imageUrl;
       






        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {



            $url1 = $sub_domain.'/crystalCore/apiAuth/v1/validatePermisionsUpdate/';
      
            $dat = array(
              'profileId' =>$profileId
              
              );
          $curl = curl_init();
          
          // Configurar las opciones de la sesión cURL
          curl_setopt($curl, CURLOPT_URL, $url1);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $dat);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          
          // Ejecutar la solicitud y obtener la respuesta
          $response2 = curl_exec($curl);
    
          
    
    
          curl_close($curl);
    
        //  echo $response1;

if($response2=="true"){

    $conectar=conn();

    $query2= mysqli_query($conectar,"UPDATE generalProfiles set name='$name', lastName='$lastName', imageUrl='$imageUrl' where profileId='$putId'");
             
    $query2= mysqli_query($conectar,"UPDATE generalUsers set personalMail='$personalMail' where profileId='$putId'");
                           
 echo "true*¡Usuario actualizado con exito!";

}else{

    echo "false*¡No tienes permisos para realizar esta acción!";
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});


Flight::route('POST /putUsersBySuperAdmin/@apk/@xapk/@putId', function ($apk,$xapk,$putId) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
        
            
            $name= Flight::request()->data->name;
            $lastName=Flight::request()->data->lastName;
            $personalMail=Flight::request()->data->personalMail;
            $internalMail=Flight::request()->data->internalMail;
            $companyMail=Flight::request()->data->companyMail;
            $imageUrl= Flight::request()->data->imageUrl;
       








        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {



           

    $conectar=conn();

    $query2= mysqli_query($conectar,"UPDATE generalProfiles set name='$name', lastName='$lastName', imageUrl='$imageUrl' where profileId='$putId'");
             
    $query2= mysqli_query($conectar,"UPDATE generalUsers set personalMail='$personalMail',internalMail='$internalMail',companyMail='$companyMail' where profileId='$putId'");
                           
 echo "true*¡Usuario actualizado con exito!";

}else {
    echo 'false*¡Autenticación fallida!';
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
    } 
);





Flight::route('POST /putUserStatusBySuperAdmin/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
        
            
            $profileId= Flight::request()->data->profileId;
            $value=Flight::request()->data->value;
       


        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      
      curl_close($curl);

      

        if ($response1 == 'true' ) {

                  
    $conectar=conn();
         
    if($value=="act"){

        $query2= mysqli_query($conectar,"UPDATE generalProfiles set isActive=1 where profileId='$profileId'");
             
        $query2= mysqli_query($conectar,"UPDATE generalUsers set isActive=1 where profileId='$profileId'");
        echo "true*!Estado editado con exito!";
    }
    if($value=="dec"){
        $query2= mysqli_query($conectar,"UPDATE generalProfiles set isActive=0 where profileId='$profileId'");
             
        $query2= mysqli_query($conectar,"UPDATE generalUsers set isActive=0,sessionCounter=0 where profileId='$profileId'");
        $query2= mysqli_query($conectar,"UPDATE sessionList SET isActive=0 where userName IN (SELECT userName from generalUsers where profileId='$profileId') and isActive=1");
    
        echo "true*!Estado editado con exito!";
    }
    if($value=="sho"){
        $query2= mysqli_query($conectar,"UPDATE generalProfiles set status=1 where profileId='$profileId'");
             
        $query2= mysqli_query($conectar,"UPDATE generalUsers set status=1 where profileId='$profileId'");
        echo "true*!Estado editado con exito!";
    }
    if($value=="hid"){
        $query2= mysqli_query($conectar,"UPDATE generalProfiles set isActive=0,status=0 where profileId='$profileId'");
             
        $query2= mysqli_query($conectar,"UPDATE generalUsers set isActive=0,status=0,sessionCounter=0 where profileId='$profileId'");
        $query2= mysqli_query($conectar,"UPDATE sessionList SET isActive=0 where userName IN (SELECT userName from generalUsers where profileId='$profileId') and isActive=1");
    


        
        $query1= mysqli_query($conectar,"SELECT p.name,p.lastName,u.companyMail,u.personalMail FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId where p.profileId='$profileId'");
               
          
        if ($query1) {
            while ($row = $query1->fetch_assoc()) {
                

               $name= $row['name'];
               $lname= $row['lastName'];
               $companym= $row['companyMail'];
               $personalm= $row['personalMail'];
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = "soporte@crystalmodels.online";
$subject = "Usuario Oculto";

$message = 'Eliminar o Desactivar correo Empresarial.   '.$companym.' Para el usuario: '.$name.' '.$lname;



$headers = "From:" . $from;
mail($to,$subject,$message, $headers);



ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = $personalm;
$subject = "Usuario Desactivado";

$message = 'Tu usuario fue desactivado temporalmente.';



$headers = "From:" . $from;
mail($to,$subject,$message, $headers);


}
echo "true*!Estado editado con exito!";
        }else{
            echo "false*¡Consulta fallida!";
            }
        
    }
                       
 

}else {
    echo 'false*¡Autenticación fallida!';
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
    } 
);


Flight::route('POST /putUsersBySuperAdminGeneral/@putId', function ($putId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
        
            
            $name= Flight::request()->data->name;
            $lastName=Flight::request()->data->lastName;
            $personalMail=Flight::request()->data->personalMail;
            $companyMail=Flight::request()->data->companyMail;
            $internalMail=Flight::request()->data->internalMail;
            $imageUrl= Flight::request()->data->imageUrl;
       






        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {



           

    $conectar=conn();

    $query2= mysqli_query($conectar,"UPDATE generalProfiles set name='$name', lastName='$lastName', imageUrl='$imageUrl' where profileId='$putId'");
             
    $query2= mysqli_query($conectar,"UPDATE generalUsers set personalMail='$personalMail',companyMail='$companyMail',internalMail='$internalMail' where profileId='$putId'");
                           
 echo "true*¡Usuario actualizado con exito!";

}else {
    echo 'false*¡Autenticación fallida!';
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
    } 
);



Flight::route('POST /putUsersRolByAdmin/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
        
            
            $rolId= Flight::request()->data->rolId;
            $putId= Flight::request()->data->putId;
       






        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {



            $url1 = $sub_domain.'/crystalCore/apiAuth/v1/validatePermisionsUpdate/';
      
            $dat = array(
              'profileId' =>$profileId
              
              );
          $curl = curl_init();
          
          // Configurar las opciones de la sesión cURL
          curl_setopt($curl, CURLOPT_URL, $url1);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $dat);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          
          // Ejecutar la solicitud y obtener la respuesta
          $response2 = curl_exec($curl);
    
          
    
    
          curl_close($curl);
    
        //  echo $response1;

if($response2=="true"){

    $conectar=conn();

    $query2= mysqli_query($conectar,"UPDATE generalProfiles set rolId='$rolId' where profileId='$putId'");
             
                         
 echo "true*¡Rol editado con exito!";

}else{

    echo "false*¡No tienes permisos para realizar esta acción!";
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /putKeyword/@profileId/', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
        
            
            $keyword= Flight::request()->data->keyWord;
            $newkeyword= Flight::request()->data->newkeyWord;
       






        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
            $conectar=conn();
            require_once '../../apiUsers/v1/model/modelSecurity/crypt/cryptic.php';

          
            $dato_encriptado = $encriptar($keyword);
            $dato_encriptado2 = $encriptar($newkeyword);
            $query= mysqli_query($conectar,"SELECT userId FROM generalUsers where keyWord='$dato_encriptado' and profileId='$profileId'");
            $nr=mysqli_num_rows($query);
        
            if($nr>=1){
    

    $query2= mysqli_query($conectar,"UPDATE generalUsers set keyWord='$dato_encriptado2' where profileId='$profileId'");
             
                         
 echo "true*¡Contraseña actualizada con exito!";
            }else{

                echo "false*¡Contraseña incorrecta!";
            }
}else {
    echo 'false*¡Autenticación fallida!';
}

           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});



Flight::route('POST /forgotKeyword/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        if ($response1 == 'true' ) {
            $conectar=conn();
            require_once '../../apiUsers/v1/model/modelSecurity/crypt/cryptic.php';

            $userName= Flight::request()->data->userName;
          
            
            $query= mysqli_query($conectar,"SELECT companyMail FROM generalUsers where userName='$userName' and status=1 and companyMail not in('','null',' ','   ','0','@','.com')");
            $nr=mysqli_num_rows($query);
        
            if($nr>=1){
    
                $query1= mysqli_query($conectar,"SELECT companyMail FROM generalUsers where userName='$userName'");
               
          
                if ($query1) {
                    while ($row = $query->fetch_assoc()) {
                        

                        $caracteresPermitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                        $longitud = 6; // Longitud deseada para la cadena aleatoria
                        
                        $numeroAleatorio = substr(str_shuffle($caracteresPermitidos), 0, $longitud);
                        
                       
                        
$userMail= $row['companyMail'];

                  $query2= mysqli_query($conectar,"UPDATE generalUsers SET validationCode='$numeroAleatorio' where companyMail='$userMail'");
                  

                  $sub_domaincon=new model_domain();
                  $sub_domain=$sub_domaincon->dom_mail();
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = $userMail;
$subject = "Código de Validación";

$message = 'Tu código de validación es: '.$numeroAleatorio.' Ingresa este código para recuperar tu contrasena. Ingresa a-> '.$sub_domain.'/crystal/validationCode.php';



$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

                 
                    }
                    echo "true*¡Código enviado con exito!";
                } else {
                    // Manejar el error de la consulta
                    echo "false*¡Error en la consulta! " . mysqli_error($conectar);
                }
          
                
             
                         
 
            }else{

                echo "false*¡No se puede validar usuario!";
            }
}else {
    echo 'false*¡Autenticación fallida!';
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});




Flight::route('POST /forgotKeywordValidate/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);
        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
            $conectar=conn();
            require_once '../../apiUsers/v1/model/modelSecurity/crypt/cryptic.php';

            $code= Flight::request()->data->code;
            $userName= Flight::request()->data->userName;
            $newkeyWord= Flight::request()->data->newkeyWord;
          
            
            $query= mysqli_query($conectar,"SELECT validationCode FROM generalUsers where userName='$userName' and status=1 and companyMail not in('','null',' ','   ','0','@','.com')");
            $nr=mysqli_num_rows($query);
        
            if($nr>=1){
    
                $query1= mysqli_query($conectar,"SELECT userName,validationCode,companyMail,personalMail FROM generalUsers where userName='$userName'");
               
          
                if ($query1) {
                    while ($row = $query1->fetch_assoc()) {
                        

                        $uname= $row['userName'];               
$code1= $row['validationCode'];
$cmail= $row['companyMail'];
$pmail= $row['personalMail'];
                

if($code1==$code){

                        $dato_encriptado = $encriptar($newkeyWord);
                        $query2= mysqli_query($conectar,"UPDATE generalUsers SET keyWord='$dato_encriptado',validationCode='0',sessionCounter=0 where userName='$userName'");
                        $query3= mysqli_query($conectar,"UPDATE sessionList SET isActive=0 where userName='$uname'");
    

                        date_default_timezone_set('America/Bogota');

                        // Obtener la fecha y hora actual en Colombia
                        $fechaActual = date('Y-m-d H:i:s');

                        ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = $cmail;
$subject = "Contrasena Editada";

$message = 'Tu contrasena fue editada correctamente el '.$fechaActual;



$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

                 
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = $pmail;
$subject = "Contrasena Editada";

$message = 'Tu contrasena fue editada correctamente el: '.$fechaActual;



$headers = "From:" . $from;
mail($to,$subject,$message, $headers);


                        echo "true*¡Contraseña editada coon exito!";
}else{

    echo "false*¡Código de validación no coincide!";
}

              
                    }
                } else {
                    // Manejar el error de la consulta
                    echo "false*¡Error en la consulta! " . mysqli_error($conectar);
                }
          

            }else{

                echo "false*¡No se puede validar uausario!";
            }
}else {
    echo 'false*¡Autenticación fallida!';
}


           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});


Flight::route('POST /changeKeywordSession/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);
        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
            $conectar=conn();
            require_once '../../apiUsers/v1/model/modelSecurity/crypt/cryptic.php';

            $newkeyword= Flight::request()->data->newkeyWord;
            $userName= Flight::request()->data->userName;
            $keyword= Flight::request()->data->keyword;
          
          
            $dato_encriptado = $encriptar($keyword);
            
           
    
                $query1= mysqli_query($conectar,"SELECT companyMail,personalMail FROM generalUsers where userName='$userName' and keyWord='$dato_encriptado'");
               
          
                if ($query1) {
                    while ($row = $query1->fetch_assoc()) {
                        

                                     

$cmail= $row['companyMail'];
$pmail= $row['personalMail'];
                
$containsMinLength = strlen($newkeyword) >= 8;
$containsUppercase = preg_match("/[A-Z]/", $newkeyword);
$containsLowercase = preg_match("/[a-z]/", $newkeyword);
$containsSymbols = preg_match("/[$@$!%*?&.]/", $newkeyword);
$containsNumber = preg_match("/\d/", $newkeyword);

if ($containsMinLength && $containsUppercase && $containsLowercase && $containsSymbols && $containsNumber) {      $dato_encriptado2 = $encriptar($newkeyword);
                        $query2= mysqli_query($conectar,"UPDATE generalUsers SET keyWord='$dato_encriptado2' where userName='$userName'");
                       

                        date_default_timezone_set('America/Bogota');

                        // Obtener la fecha y hora actual en Colombia
                        $fechaActual = date('Y-m-d H:i:s');

                        ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = $cmail;
$subject = "Contrasena Editada";

$message = 'Tu contrasena fue editada correctamente el '.$fechaActual;



$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

                 
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = $pmail;
$subject = "Contrasena Editada";

$message = 'Tu contrasena fue editada correctamente el: '.$fechaActual;



$headers = "From:" . $from;
mail($to,$subject,$message, $headers);


                        echo "true*¡Contraseña editada con exito!";
    } 
    else {
        echo "false*¡La contraseña no cumple con los requisitos!";
    }


              
                    }
                } else {
                    // Manejar el error de la consulta
                    echo "false*" . mysqli_error($conectar);
                }
          

           
}else {
    echo 'false*¡Autenticación fallida!';
}


           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});



Flight::route('POST /validateLogIn/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
            $conectar=conn();
            require_once '../../apiCore/v1/model/modelSecurity/crypt/cryptic.php';

            
            $mail= Flight::request()->data->mail;
            $browser= Flight::request()->data->browser;
            $ipId= Flight::request()->data->ipId;
           
    
                $query1= mysqli_query($conectar,"SELECT u.userName,u.name,u.lastName,u.status,u.isActive,u.contact,u.email,u.userId,u.rolId,u.sessionCounter,t.userRanCode,tk.apiKey,s.subDays,s.bonusDays,s.subId,s.endSub,s.startSub,u.clientId,gc.clientName,cs.bgColor,cs.textColor,cs.imgLogo,cs.imgIcon,cs.imgGif,cs.styleId FROM generalUsers u JOIN userSecrets t ON t.userId=u.userId JOIN clientSecrets tk ON tk.clientId=u.clientId JOIN subList s ON s.clientId=tk.clientId JOIN clients gc ON gc.clientId=u.clientId JOIN clientStyle cs ON cs.clientId=u.clientId where u.email='$mail'");
               
               

               
                if ($query1) {
                    
                    while ($row = $query1->fetch_assoc()) {
                        

                       $countersession= $row['sessionCounter'];
                       $userId= $row['userId'];
                       $name= $row['name'];
                       $lastName= $row['lastName'];

                       $status= $row['status'];
                       $isActive= $row['isActive'];
                       $contact= $row['contact'];
                        $subDays= $row['subDays'];
                        $bonusDays= $row['bonusDays'];
                       $rolId= $row['rolId'];
                       $subId= $row['subId'];
                      // $sessionCounter= $row['sessionCounter'];
                       $userName1= $row['userName'];
                       $clientKey= $row['apiKey'];
                       $ranCode= $row['userRanCode'];
                       $endSub= $row['endSub'];
                       $startSub= $row['startSub'];
                       $clientId= $row['clientId'];
                       $clientName= $row['clientName'];
                       $txtColor= $row['textColor'];
                       $bgColor= $row['bgColor'];
                       $cIcon= $row['imgIcon'];
                       $cLogo= $row['imgLogo'];
                       $cGif= $row['imgGif'];
                       $styleId= $row['styleId'];


                       if($countersession<0){
                        $countersession=0;
                       }

                       $counterLoged=$countersession +1;
                        if($counterLoged==1){

                            date_default_timezone_set('America/Bogota'); // Cambia 'America/Montevideo' por tu zona horaria deseada

                            // Obtener la fecha actual
                            $fechaActual = date('Y-m-d'); // Formato: Año-Mes-Día
                            $horaActual = date('H:i:s'); // Formato: Hora:Minutos:Segundos
      



                           // $fechaActual = new DateTime(); // Crear un objeto DateTime para la fecha actual
                            //$startSub = new DateTime();
                            //$intervalo = $startSub->diff($fechaActual);
                            
                            //$diferenciaEnDias = $intervalo->days;
                            //$subTotal = $diferenciaEnDias;
                            


                    require_once '../../apiCore/v1/model/modelSecurity/uuid/uuidd.php';
                  
                   
           
        
                    $gen_uuid = new generateUuid();
                    $myuuid = $gen_uuid->guidv4();
                    $sessionId = substr($myuuid, 0, 8);
                    $decoded_data = base64_decode($browser);
                            $query2= mysqli_query($conectar,"UPDATE generalUsers SET sessionCounter='$counterLoged' where email='$mail'");
                            $query3= mysqli_query($conectar,"UPDATE subList SET subDays=0 where clientId='$clientId'");
                      
                            $query4= mysqli_query($conectar,"INSERT INTO sessionLog (sessionId,userId,browser,logInTime,logInDate,ipId) VALUES ('$sessionId','$userId','$decoded_data','$horaActual','$fechaActual','$ipId')");
                      
                      
                      
                            $values= array();
                            $value=array(
                                'userId' => $userId,
                                'mail' => $mail,
                                'userName' => $userName1,
                                'sessionCounter' => $counterLoged,
                                'name' => $name,
                                'lastName' => $lastName,
                                'rolId' => $rolId,
                                'isActive' => $isActive,
                                'status' => $status,
                                'contact' => $contact,
                                'clientId' => $clientId,
                                'imgLogo' => $cLogo,
                                'imgIcon' => $cIcon,
                                'imgGif' => $cGif,
                                'textColor' => $txtColor,
                                'bgColor' => $bgColor,
                                'styleId' => $styleId,
                                
                                'subDays' => $subDays,
                                'subId' => $subId,
                                'clientName' => $clientName,
                                'sessionId' => $sessionId,
                                'key' => $clientKey,
                                'ranCode' => $ranCode,
                                'response' => "true",
                                        'message' => "¡Bienvenid@ ".$name." ".$lastName
                            );
                            
                            array_push($values,$value);
                           // echo "false|";
                           echo json_encode(['users'=>$values]);
                      
                      
                      
                        } else{
                            $values= array();
                            $value=array(
                                'profileId' => '',
                                'mail' => '',
                                'userName' => '',
                                'sessionCounter' => '',
                                'name' => '',
                                'lastName' => '',
                                'rolId' => '',
                                'isActive' => '',
                                'status' => '',
                                'contact' => '',
                                'clientName' => $clientName,
                                'subDays' => '',
                                'subId' => '',
                                'sessionId' => '',
                                'clientKey' => $clientKey,
                                
                                'imgLogo' => $cLogo,
                                'imgIcon' => $cIcon,
                                'imgGif' => $cGif,
                                'textColor' => $txtColor,
                                'bgColor' => $bgColor,
                                'styleId' => $styleId,
                                'ranCode' => '',
                                'isPublic' => '',
                                'response' => 'false',
                                'message' => '¡Exedes el número de sesiones abiertas ('.$counterLoged.')!'
                            );
                            
                            array_push($values,$value);
                           // echo "false|";
                           echo json_encode(['users'=>$values]);
                        }

                      // $userName2= $row['sessionCounter'];
                      
                    

              
                    }
                } else {
                    // Manejar el error de la consulta
                    echo "false*¡Error en la consulta! " . mysqli_error($conectar);
                }
          

            
}else {
    
    echo 'false|¡Autenticación fallida!';
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);

        }

        
});


Flight::route('POST /validateLogInInternal/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
            $conectar=conn();
            require_once '../../apiCore/v1/model/modelSecurity/crypt/cryptic.php';

            
            $mail= Flight::request()->data->mail;
            $browser= Flight::request()->data->browser;
            $ipId= Flight::request()->data->ipId;
           
    
                $query1= mysqli_query($conectar,"SELECT u.userName,u.name,u.lastName,u.status,u.isActive,u.contact,u.email,u.userId,u.rolId,u.sessionCounter,t.userRanCode,tk.apiKey,u.clientId FROM internalUsers u JOIN userSecrets t ON t.userId=u.userId JOIN clientSecrets tk ON u.clientId=tk.clientId where u.email='$mail'");
               
               

               
                if ($query1) {
                    
                    while ($row = $query1->fetch_assoc()) {
                        

                       $countersession= $row['sessionCounter'];
                       $userId= $row['userId'];
                       $name= $row['name'];
                       $lastName= $row['lastName'];

                       $status= $row['status'];
                       $isActive= $row['isActive'];
                       $contact= $row['contact'];
                       $apiKey= $row['apiKey'];
                       
                       $rolId= $row['rolId'];
                      // $sessionCounter= $row['sessionCounter'];
                       $userName1= $row['userName'];
                     
                       $ranCode= $row['userRanCode'];
                       $clientId= $row['clientId'];
                      
                      


                       if($countersession<0){
                        $countersession=0;
                       }

                       $counterLoged=$countersession +1;
                        if($counterLoged<=3){

                            date_default_timezone_set('America/Bogota'); // Cambia 'America/Montevideo' por tu zona horaria deseada

                            // Obtener la fecha actual
                            $fechaActual = date('Y-m-d'); // Formato: Año-Mes-Día
                            $horaActual = date('H:i:s'); // Formato: Hora:Minutos:Segundos
      



                           // $fechaActual = new DateTime(); // Crear un objeto DateTime para la fecha actual
                            //$startSub = new DateTime();
                            //$intervalo = $startSub->diff($fechaActual);
                            
                            //$diferenciaEnDias = $intervalo->days;
                            //$subTotal = $diferenciaEnDias;
                            


                    require_once '../../apiCore/v1/model/modelSecurity/uuid/uuidd.php';
                  
                   
           
        
                    $gen_uuid = new generateUuid();
                    $myuuid = $gen_uuid->guidv4();
                    $sessionId = substr($myuuid, 0, 8);
                    $decoded_data = base64_decode($browser);
                            $query2= mysqli_query($conectar,"UPDATE internalUsers SET sessionCounter='$counterLoged' where email='$mail'");
                           // $query3= mysqli_query($conectar,"UPDATE subList SET subDays=0 where clientId='$clientId'");
                      
                            $query4= mysqli_query($conectar,"INSERT INTO sessionLog (sessionId,userId,browser,logInTime,logInDate,ipId) VALUES ('$sessionId','$userId','$decoded_data','$horaActual','$fechaActual','$ipId')");
                      
                      
                      
                            $values= array();
                            $value=array(
                                'userId' => $userId,
                                'mail' => $mail,
                                'userName' => $userName1,
                                'sessionCounter' => $counterLoged,
                                'name' => $name,
                                'lastName' => $lastName,
                                'rolId' => $rolId,
                                'isActive' => $isActive,
                                'status' => $status,
                                'contact' => $contact,
                                'key' => $apiKey,
                                
                               'sessionId' => $sessionId,
                               'clientId' => $clientId,
                                'ranCode' => $ranCode,
                                'response' => "true",
                                        'message' => "¡Bienvenid@ ".$name." ".$lastName
                            );
                            
                            array_push($values,$value);
                           // echo "false|";
                           echo json_encode(['users'=>$values]);
                      
                      
                      
                        } else{
                            $values= array();
                            $value=array(
                                'profileId' => '',
                                'mail' => '',
                                'userName' => '',
                                'sessionCounter' => '',
                                'name' => '',
                                'lastName' => '',
                                'rolId' => '',
                                'isActive' => '',
                                'status' => '',
                                'contact' => '',
                                'key' => $apiKey,
                                'sessionId' => '',
                                'ranCode' => '',
                                'clientId' => $clientId,
                                'response' => 'false',
                                'message' => '¡Exedes el número de sesiones abiertas ('.$counterLoged.')!'
                            );
                            
                            array_push($values,$value);
                           // echo "false|";
                           echo json_encode(['users'=>$values]);
                        }

                      // $userName2= $row['sessionCounter'];
                      
                    

              
                    }
                } else {
                    // Manejar el error de la consulta
                    echo "false*¡Error en la consulta! " . mysqli_error($conectar);
                }
          

            
}else {
    
    echo 'false|¡Autenticación fallida!';
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);

        }

        
});



Flight::route('POST /validateLogInClose/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/koiosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
            $conectar=conn();
            require_once '../../apiUsers/v1/model/modelSecurity/crypt/cryptic.php';

            
            $mail= Flight::request()->data->mail;
            $browser= Flight::request()->data->browser;
            $ipId= Flight::request()->data->ipId;
           
    
                $query1= mysqli_query($conectar,"SELECT u.userName,u.name,u.lastName,u.status,u.isActive,u.contact,u.mail,u.profileId,u.rolId,u.subDays,u.subId,u.sessionCounter,u.endLog,u.isPublic,t.ranCode FROM users u JOIN userTokens t ON t.profileId=u.profileId where u.mail='$mail'");
               
               


                if ($query1) {
                    while ($row = $query1->fetch_assoc()) {
                        

                       $countersession= $row['sessionCounter'];
                       $profileId= $row['profileId'];
                       $name= $row['name'];
                       $lastName= $row['lastName'];

                       $status= $row['status'];
                       $isActive= $row['isActive'];
                       $contact= $row['contact'];
                        $subDays= $row['subDays'];
                       $rolId= $row['rolId'];
                       $subId= $row['subId'];
                      // $sessionCounter= $row['sessionCounter'];
                       $userName1= $row['userName'];
                       $endLog= $row['endLog'];
                       $ranCode= $row['ranCode'];
                       $isPublic= $row['isPublic'];
                       if($countersession<0){
                        $countersession=0;
                       }

                       $counterLoged=$countersession;
                        if($counterLoged<=3){

                            date_default_timezone_set('America/Bogota'); // Cambia 'America/Montevideo' por tu zona horaria deseada

                            // Obtener la fecha actual
                            $fechaActual = date('Y-m-d'); // Formato: Año-Mes-Día
                            $horaActual = date('H:i:s'); // Formato: Hora:Minutos:Segundos
        if($fechaActual!=$endLog){
$subTotal=$subDays-1;
        }
        elseif($fechaActual=$endLog){
            $subTotal=$subDays;
                    }

                    require_once '../../apiUsers/v1/model/modelSecurity/uuid/uuidd.php';
                  
                   
           
        
                    $gen_uuid = new generateUuid();
                    $myuuid = $gen_uuid->guidv4();
                    $sessionId = substr($myuuid, 0, 8);
                    $decoded_data = base64_decode($browser);
                         
                      
                      
                            $values= array();
                            $value=array(
                                'profileId' => $profileId,
                                'mail' => $mail,
                                'userName' => $userName1,
                                'sessionCounter' => $counterLoged,
                                'name' => $name,
                                'lastName' => $lastName,
                                'rolId' => $rolId,
                                'isActive' => $isActive,
                                'status' => $status,
                                'contact' => $contact,
                                
                                'subDays' => $subDays,
                                'subId' => $subId,
                                'sessionId' => $sessionId,
                                'xApiKey' => $headerslink,
                                'ranCode' => $ranCode,
                                'isPublic' => $isPublic,
                                'response' => "true",
                                        'message' => "¡Bienvenid@ ".$name." ".$lastName
                            );
                            
                            array_push($values,$value);
                           // echo "false|";
                           echo json_encode(['users'=>$values]);
                      
                      
                      
                        } else{
                            $values= array();
                            $value=array(
                                'profileId' => '',
                                'mail' => '',
                                'userName' => '',
                                'sessionCounter' => '',
                                'name' => '',
                                'lastName' => '',
                                'rolId' => '',
                                'isActive' => '',
                                'status' => '',
                                'contact' => '',
                                
                                'subDays' => '',
                                'subId' => '',
                                'sessionId' => '',
                                'xApiKey' => $headerslink,
                                'ranCode' => '',
                                'isPublic' => '',
                                'response' => 'false',
                                'message' => '¡Exedes el número de sesiones abiertas ('.$counterLoged.')!'
                            );
                            
                            array_push($values,$value);
                           // echo "false|";
                           echo json_encode(['users'=>$values]);
                        }

                      // $userName2= $row['sessionCounter'];
                      
                    

              
                    }
                } else {
                    // Manejar el error de la consulta
                    echo "false*¡Error en la consulta! " . mysqli_error($conectar);
                }
          

            
}else {
    
    echo 'false|¡Autenticación fallida!';
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});



Flight::route('POST /changePass/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
            $conectar=conn();
            require_once '../../apiUsers/v1/model/modelSecurity/crypt/cryptic.php';

            
            $userName= Flight::request()->data->userName;
            $keyWord= Flight::request()->data->keyWord;
            $newkeyWord= Flight::request()->data->newkeyWord;
          
            $dato_encriptado = $encriptar($keyWord);
            $query1= mysqli_query($conectar,"SELECT userName FROM generalUsers where userName='$userName' and status=1 and companyMail not in('','null',' ','   ','0','@','.com')  and keyWord = '$dato_encriptado' and isActive=1 or internalMail='$userName' and status=1 and companyMail not in('','null',' ','   ','0','@','.com') and keyWord = '$dato_encriptado' and isActive=1 or companyMail='$userName' and status=1 and companyMail not in('','null',' ','   ','0','@','.com') and keyWord = '$dato_encriptado' and isActive=1");
            $nr=mysqli_num_rows($query1);
        
            if($nr>=1){
                $dato_encriptado3 = $encriptar($newkeyWord);
                $query1= mysqli_query($conectar,"UPDATE generalUsers SET keyWord='$dato_encriptado3' where userName='$userName'");
               
                echo "true*¡Contraseña editada con exito!";

            }else{

                echo "false*¡Usuario o contraseña incorrectos!";
               // echo $keyWord;
            }
}else {
    
    echo 'false*¡Autenticación fallida!';
}

           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});



Flight::route('POST /validateLogInChange/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
            $conectar=conn();
            require_once '../../apiUsers/v1/model/modelSecurity/crypt/cryptic.php';

            
            $userName= Flight::request()->data->userName;
            $keyWord= Flight::request()->data->keyWord;
            $ipAdd= Flight::request()->data->ipAdd;
            $browser= Flight::request()->data->browser;
          
            $dato_encriptado = $encriptar($keyWord);
            $query1= mysqli_query($conectar,"SELECT userName FROM generalUsers where userName='$userName' and status=1 and companyMail not in('','null',' ','   ','0','@','.com')  and keyWord = '$dato_encriptado' and isActive=1 or internalMail='$userName' and status=1 and companyMail not in('','null',' ','   ','0','@','.com') and keyWord = '$dato_encriptado' and isActive=1 or companyMail='$userName' and status=1 and companyMail not in('','null',' ','   ','0','@','.com') and keyWord = '$dato_encriptado' and isActive=1");
            $nr=mysqli_num_rows($query1);
        
            if($nr>=1){
    
                $query1= mysqli_query($conectar,"SELECT sessionCounter,userName FROM generalUsers where userName='$userName' or companyMail='$userName' or internalMail='$userName'");
               
          
                if ($query1) {
                    while ($row = $query1->fetch_assoc()) {
                        

                       $countersession= $row['sessionCounter'];
                       $userName1= $row['userName'];

                       $counterLoged=$countersession +1;
                        if($counterLoged>1 ){


                            require('../../apiUsers/v1/model/modelSecurity/uuid/uuidd.php');
    $con=new generateUuid();
        $myuuid = $con->guidv4();
        $primeros_ocho = substr($myuuid, 0, 8);
                            date_default_timezone_set('America/Bogota');
                            $horaActual = date('H:i:s');
                            $fechaActual = date('Y-m-d');
                            $browserdecode = base64_decode($browser);

                          
                            echo "true*".$primeros_ocho;
                        } if($counterLoged<2){
                          
                            echo "false*¡Tienes 1 o nungúna sesión activa!";
                        }

                      // $userName2= $row['sessionCounter'];
                      
                     
              
                    }
                } else {
                    // Manejar el error de la consulta
                    echo "Error en la consulta: " . mysqli_error($conectar);
                }
          

            }else{

                echo "false*¡Usuario o contraseña incorrectos!";
               // echo $keyWord;
            }
}else {
    
    echo 'false*¡Autenticación fallida!';
}
          
           // echo json_encode($response1);
        } else {
            echo 'Efalse*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});


Flight::route('POST /closeSession/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
            $conectar=conn();
            $userName= Flight::request()->data->userName;
            $sessionId= Flight::request()->data->sessionId;
            $query1= mysqli_query($conectar,"SELECT sessionCounter FROM generalUsers where userName='$userName'");
               
          
            if ($query1) {
                while ($row = $query1->fetch_assoc()) {
                    
                   $countersession= $row['sessionCounter'];
                  
                  // $userName2= $row['sessionCounter'];
                    $counterLoged=$countersession -1;
                   
                   
                    
               
                    $conectar=conn();
                    $query2= mysqli_query($conectar,"UPDATE sessionList set isActive=0 where sessionId='$sessionId' and userName='$userName'");
                            
                   
                    $query2= mysqli_query($conectar,"UPDATE generalUsers SET sessionCounter='$counterLoged' where userName='$userName'");
                  
                    echo "true*¡Sesión cerrada con exito!";


          
                }

            }else{

                echo "false*¡Usuario incorrecto!";
            }

}else {
    
    echo 'false*¡Autenticación fallida!';
}


           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});




Flight::route('POST /validateLogOutInternal/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
            $conectar=conn();
           // require_once '../../apiUsers/v1/model/modelSecurity/crypt/cryptic.php';

            
            $userId= Flight::request()->data->userId;
  
            $sessionId= Flight::request()->data->sessionId;
            $value= Flight::request()->data->value;
           if($value=="force"){

            $query2= mysqli_query($conectar,"DELETE FROM sessionLog where userId='$userId' and sessionId='$sessionId' and isActive=0");
                      

           }
           if($value=="forceSession"){




            $query1= mysqli_query($conectar,"SELECT userName,name,lastName,status,isActive,contact,email,userId,rolId,sessionCounter FROM internalUsers where userId='$userId'");
               
               


            if ($query1) {
                while ($row = $query1->fetch_assoc()) {
                    

                   $countersession= $row['sessionCounter'];
                   $userId= $row['userId'];
              
                   if($countersession<0){
                    $countersession=0;
                   }

                   $counterLoged=$countersession -1;
                    if($counterLoged<=2 && $counterLoged>=0){



                        
                        $query2= mysqli_query($conectar,"UPDATE internalUsers SET sessionCounter='$counterLoged' where userId='$userId'");
                        $query2= mysqli_query($conectar,"UPDATE sessionLog SET isActive=0 where userId='$userId' and sessionId='$sessionId'");
       //                 $query2= mysqli_query($conectar,"DELETE FROM sessionLog where profileId='$profileId' and sessionId='$sessionId' and isActive=1");
       
                  
                  
                       echo "true|¡Sesión finalizada con exito!";
                  
                  
                  
                    } else{
                        echo "false|Error no se pudo finalizar sesión!";
                    }

                  // $userName2= $row['sessionCounter'];
                  
                

          
                }
            } else {
                // Manejar el error de la consulta
                echo "false*¡Error en la consulta! " . mysqli_error($conectar);
            }



           

           }
    if($value=="logOut"){
                $query1= mysqli_query($conectar,"SELECT userName,name,lastName,status,isActive,contact,email,userId,rolId,sessionCounter FROM internalUsers where userId='$userId'");
               
               


                if ($query1) {
                    while ($row = $query1->fetch_assoc()) {
                        

                       $countersession= $row['sessionCounter'];
                       $userId= $row['userId'];
                  
                       if($countersession<0){
                        $countersession=0;
                       }

                       $counterLoged=$countersession -1;
                        if($counterLoged<=2 && $counterLoged>=0){



                            
                            $query2= mysqli_query($conectar,"UPDATE internalUsers SET sessionCounter='$counterLoged' where userId='$userId'");
                           // $query2= mysqli_query($conectar,"UPDATE sessionLog SET isActive=0 where profileId='$profileId' and sessionId='$sessionId'");
                            $query2= mysqli_query($conectar,"DELETE FROM sessionLog where userId='$userId' and sessionId='$sessionId' and isActive=1");
           
                      
                      
                           echo "true|¡Sesión finalizada con exito!";
                      
                      
                      
                        } else{
                            echo "false|Error no se pudo finalizar sesión!";
                        }

                      // $userName2= $row['sessionCounter'];
                      
                    

              
                    }
                } else {
                    // Manejar el error de la consulta
                    echo "false*¡Error en la consulta! " . mysqli_error($conectar);
                }
          
            }
            
}else {
    
    echo 'false|¡Autenticación fallida!';
}




           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});



Flight::route('POST /putUsersRolBySuperAdmin/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
        
            
            $rolId= Flight::request()->data->rolId;
            $putId= Flight::request()->data->putId;
       

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {



    $conectar=conn();

    $query2= mysqli_query($conectar,"UPDATE generalProfiles set rolId='$rolId' where profileId='$putId'");
             
                         
 echo "true*¡Rol actualizado con exito!";

}else {
    echo 'false*¡Autenticación fallida!';
}


           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});





Flight::route('GET /getAllUsersBySuperAdmin/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'personalMail' => $row['personalMail'],
                            'companyMail' => $row['companyMail'],
                            'internalMail' => $row['internalMail'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userCreation' => $row['userCreation'],
                            'userUpdated' => $row['userUpdated'],
                            'userName' => $row['userName'],
                            'sessionCounter' => $row['sessionCounter'],
                            'lastLoged' => $row['lastLoged'],
                            'ownerId' => $row['ownerId'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'imageUrl' => $row['imageUrl'],
                            'totalHours' => $row['totalHours'],
                            'profileUpdated' => $row['profileUpdated'],
                            'rol' => $row['rol'],
                            'tokenId' => $row['tokenId'],
                            'tokenValue' => $row['tokenValue'],
                            'ranCode' => $row['ranCode'],
                            'lastDate' => $row['lastDate']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getBasicInfoBySuperAdmin/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId  order by p.lastName ASC limit 100");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userName' => $row['userName'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'rol' => $row['rol']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});




Flight::route('GET /getAllModels/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where r.name='MODEL' and u.status=1 order by p.lastName ASC limit 100");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userName' => $row['userName'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'rol' => $row['rol']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['models'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllRoles/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT rolId,name FROM roles where isActive=1 order by name ASC limit 100");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'rolId' => $row['rolId'],
                            'name' => $row['name']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['roles'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getAllRolesAdmin/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT rolId,name FROM roles where isActive=1 and name NOT IN ('SUPERADMIN','ADMIN') order by name ASC limit 100");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'rolId' => $row['rolId'],
                            'name' => $row['name']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['roles'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});

Flight::route('GET /getAllMonitors/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where r.name='MONITOR' order by p.lastName ASC limit 100");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userName' => $row['userName'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'rol' => $row['rol']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['monitors'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllMonitors/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where r.name='MONITOR' order by p.lastName ASC limit 100");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userName' => $row['userName'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'rol' => $row['rol']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['monitors'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllPhotographs/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where r.name='PHOTO' order by p.lastName ASC limit 100");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userName' => $row['userName'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'rol' => $row['rol']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['photographs'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getOneUserBySuperAdmin/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where p.profileId='$profileId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'personalMail' => $row['personalMail'],
                            'companyMail' => $row['companyMail'],
                            'internalMail' => $row['internalMail'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userCreation' => $row['userCreation'],
                            'userUpdated' => $row['userUpdated'],
                            'userName' => $row['userName'],
                            'sessionCounter' => $row['sessionCounter'],
                            'lastLoged' => $row['lastLoged'],
                            'ownerId' => $row['ownerId'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'imageUrl' => $row['imageUrl'],
                            'totalHours' => $row['totalHours'],
                            'profileUpdated' => $row['profileUpdated'],
                            'rol' => $row['rol'],
                            'tokenId' => $row['tokenId'],
                            'tokenValue' => $row['tokenValue'],
                            'ranCode' => $row['ranCode'],
                            'lastDate' => $row['lastDate']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllUsersByAdmin/@adminId', function ($adminId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where p.profileId NOT IN (SELECT profileId from generalProfiles where viewRestrictions like '%$adminId%')");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'personalMail' => $row['personalMail'],
                            'companyMail' => $row['companyMail'],
                            'internalMail' => $row['internalMail'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userCreation' => $row['userCreation'],
                            'userUpdated' => $row['userUpdated'],
                            'userName' => $row['userName'],
                            'sessionCounter' => $row['sessionCounter'],
                            'lastLoged' => $row['lastLoged'],
                            'ownerId' => $row['ownerId'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'imageUrl' => $row['imageUrl'],
                            'totalHours' => $row['totalHours'],
                            'profileUpdated' => $row['profileUpdated'],
                            'rol' => $row['rol'],
                            'tokenId' => $row['tokenId'],
                            'tokenValue' => $row['tokenValue'],
                            'ranCode' => $row['ranCode'],
                            'lastDate' => $row['lastDate']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getBasicInfoByAdmin/@adminId', function ($adminId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where p.profileId NOT IN (SELECT profileId from generalProfiles where viewRestrictions like '%$adminId%')");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userName' => $row['userName'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'rol' => $row['rol']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});




Flight::route('GET /getOneUserByAdmin/@adminId/@profileId', function ($adminId,$profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where p.profileId='$profileId' and p.profileId NOT IN (SELECT profileId from generalProfiles where viewRestrictions like '%$adminId%')");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'personalMail' => $row['personalMail'],
                            'companyMail' => $row['companyMail'],
                            'internalMail' => $row['internalMail'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'userCreation' => $row['userCreation'],
                            'userUpdated' => $row['userUpdated'],
                            'userName' => $row['userName'],
                            'sessionCounter' => $row['sessionCounter'],
                            'lastLoged' => $row['lastLoged'],
                            'ownerId' => $row['ownerId'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'imageUrl' => $row['imageUrl'],
                            'totalHours' => $row['totalHours'],
                            'profileUpdated' => $row['profileUpdated'],
                            'rol' => $row['rol'],
                            'tokenId' => $row['tokenId'],
                            'tokenValue' => $row['tokenValue'],
                            'ranCode' => $row['ranCode'],
                            'lastDate' => $row['lastDate']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});












Flight::route('GET /getProfileInfoLogInternal/@userName/@sessionId/', function ($userName,$sessionId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT isActive from sessionLog where userId='$userName' and sessionId='$sessionId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'isActive' => $row['isActive']
                            
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['sessionStatus'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});





Flight::route('GET /getProfileInfoInternal/@userName', function ($userName) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT name,lastName,sessionCounter from internalUsers where userId='$userName'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'sessionCounter' => $row['sessionCounter']
                            
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getProfileInfoClient/@userName', function ($userName) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT name,lastName,sessionCounter from generalUsers where userId='$userName'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'sessionCounter' => $row['sessionCounter']
                            
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida 23';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});




Flight::route('GET /getMySessions/@headerslink/@userName', function ($headerslink,$userName) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    //$headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headerslink)) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        
        
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->domKairos();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT sessionId,browser,logInTime,logInDate,ipId from sessionLog where userId='$userName' and isActive=1");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'sessionId' => $row['sessionId'],
                            'browser' => $row['browser'],
                            'logInTime' => $row['logInTime'],
                            'logInDate' => $row['logInDate'],
                            'ipId' => $row['ipId']
                            
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['sessions'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getProfileInfoLogChange/@userName/', function ($userName) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.userName,u.sessionCounter,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,r.name as rol,t.ranCode,u.isActive,u.status FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where u.userName='$userName'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'personalMail' => $row['personalMail'],
                            'companyMail' => $row['companyMail'],
                            'internalMail' => $row['internalMail'],
                            'userName' => $row['userName'],
                            'sessionCounter' => $row['sessionCounter'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'imageUrl' => $row['imageUrl'],
                            'totalHours' => $row['totalHours'],
                            'rol' => $row['rol'],
                            'ranCode' => $row['ranCode'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida '.$response1;
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllUsersGeneral/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where p.profileId NOT IN (SELECT profileId from generalProfiles where viewRestrictions like '%$profileId%')");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'userId' => $row['userId'],
                            'personalMail' => $row['personalMail'],
                            'companyMail' => $row['companyMail'],
                            'internalMail' => $row['internalMail'],
                            'userName' => $row['userName'],
                            'profileId' => $row['profileId'],
                            'name' => $row['name'],
                            'lastName' => $row['lastName'],
                            'imageUrl' => $row['imageUrl'],
                            'totalHours' => $row['totalHours'],
                            'profileUpdated' => $row['profileUpdated'],
                            'rol' => $row['rol']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['users'=>$values]);
          
               
           


        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getSessions/@headerslink/@userName', function ($headerslink,$userName) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    
       
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          'xApiKey' => $headerslink
          
          );
      $curl = curl_init();
      $dta1=json_encode($data);
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);


        // Realizar acciones basadas en los valores de los encabezados

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'fase' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT sessionId,userName,sTime,sDate,browser FROM sessionList where isActive=1 and userName='$userName'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'sessionId' => $row['sessionId'],
                            'userName' => $row['userName'],
                            'time' => $row['sTime'],
                            'date' => $row['sDate'],
                            'browser' => $row['browser']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['session'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});





Flight::route('GET /getVersionList/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           
require_once 'versions/versions.php';

$ver=new versiones();
$ver1= $ver->ver_change();

           
               echo $ver1;
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});






Flight::route('POST /sendMailModelEarn/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
        
    
       

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

        
            $startAmmount= Flight::request()->data->startAmmount;
            $discountAmmount= Flight::request()->data->discountAmmount;

            $discountPercent= Flight::request()->data->discountPercent;
            $endAmmount= Flight::request()->data->endAmmount;

            $earnId= Flight::request()->data->earnId;
            $cuttingId= Flight::request()->data->cuttingId;

            $startDate= Flight::request()->data->startDate;
            $endDate= Flight::request()->data->endDate;

            $startTime= Flight::request()->data->startTime;
            $endTime= Flight::request()->data->endTime;

            $totalTime= Flight::request()->data->totalTime;
            $paymentCurrency= Flight::request()->data->paymentCurrency;

            $comments= Flight::request()->data->comments;
            $name= Flight::request()->data->name;
            $profileId= Flight::request()->data->modelId;

    $conectar=conn();



    $query1= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where p.profileId='$profileId'");
               
          
    if ($query1) {
        while ($row = $query1->fetch_assoc()) { 


$cMail=$row['companyMail'];


ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = $cMail;
$subject = "Validación de corte";

$message = 'Transmisión '.$earnId.' fue validada por un monto de $'.$endAmmount.' se realizó un total de descuentos de $'.$discountAmmount.' ('.$discountPercent.'%), sobre el monto inicial $'.$startAmmount.'. Con un total de tiempo de transmisión ('.$totalTime.'), empezando el ('.$startDate.' '.$startTime.'), finalizando el ('.$endDate.' '.$endTime.'), en el sitio '.$name.'. Esta ganancia pertenece al corte '.$cuttingId.' y se hará efectiva en moneda '.$paymentCurrency.'. Comentarios: '.$comments.'.';



$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

        }
    }    



 

}else {
    echo 'false*¡Autenticación fallida!';
}


           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});





Flight::route('POST /sendMessage/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
        
    
       

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

        
            $value= Flight::request()->data->value;
            $profileId= Flight::request()->data->profileId;
            
            $sub= Flight::request()->data->sub;
          
    $conectar=conn();



    $query1= mysqli_query($conectar,"SELECT u.userId,u.personalMail,u.companyMail,u.internalMail,u.isActive,u.status,u.createdAt as userCreation,u.updatedAt as userUpdated,u.userName,u.sessionCounter,u.lastLoged,u.ownerId,p.profileId,p.name,p.lastName,p.imageUrl,p.totalHours,p.updatedAt as profileUpdated,r.name as rol,t.tokenId,t.tokenValue,t.ranCode,t.lastDate FROM generalUsers u JOIN generalProfiles p ON p.profileId=u.profileId JOIN roles r ON r.rolId=p.rolId JOIN apiTokens t ON t.userId=u.userId where p.profileId='$profileId'");
               
          
    if ($query1) {
        while ($row = $query1->fetch_assoc()) { 


$cMail=$row['companyMail'];


ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-responder@crystalmodels.online";
$to = $cMail;
$subject = $sub;

$message = $value;


$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

        }
    }    


    echo 'true*¡Correo enviado con exito!';
 

}else {
    echo 'false*¡Autenticación fallida!';
}


           // echo json_encode($response1);
        } else {
            echo 'false*¡Encabezados faltantes!';
            
             //echo json_encode($response1);
        }
});




Flight::start();
