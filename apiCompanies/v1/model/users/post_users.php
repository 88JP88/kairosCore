<?php
    
    class model_functions {
        function model_user($dta) {
    
            require_once 'database/db_users.php'; // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
         
            // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
            $conectar = conn();
    
            // Verifica si la conexión se realizó correctamente
            if (!$conectar) {
                return "Error de conexión a la base de datos";
            }
    
            

            // Escapa los valores para prevenir inyección SQL
            $name = mysqli_real_escape_string($conectar, $dta['name']);
            $lastName = mysqli_real_escape_string($conectar, $dta['lastName']);
            $personalMail = mysqli_real_escape_string($conectar, $dta['personalMail']);
            $username = mysqli_real_escape_string($conectar, $dta['userName']);
            $userid = mysqli_real_escape_string($conectar, $dta['userId']);
            $profileId = mysqli_real_escape_string($conectar, $dta['profileId']);
            $apiToken = mysqli_real_escape_string($conectar, $dta['apiToken']);
            $ranCode = mysqli_real_escape_string($conectar, $dta['ranCode']);
            $rolId = mysqli_real_escape_string($conectar, $dta['rolId']);
            $contact = mysqli_real_escape_string($conectar, $dta['contact']);
            //$dato_encriptado = $keyword;
            
    
            $query= mysqli_query($conectar,"SELECT mail FROM users where mail='$personalMail'");
            $nr=mysqli_num_rows($query);
        
            if($nr>=1){
                echo "false|¡Correo electrónico inscrito en KOIOS y LUGMA previamente: ".$personalMail;
             //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
            }else{
        
              
                
                    if (strpos($username, " ") === false && strlen($username) > 5 && preg_match('/^[^@#%&,:ñÑ]+$/', $username)) {
                                  
        
                          // require_once 'model/modelSecurity/crypt/cryptic.php';
                           // $dato_encriptado1= $encriptar($keyword);

                           date_default_timezone_set('America/Bogota'); // Cambia 'America/Montevideo' por tu zona horaria deseada

// Obtener la fecha actual
$fechaActual = date('Y-m-d'); // Formato: Año-Mes-Día
$horaActual = date('H:i:s'); // Formato: Hora:Minutos:Segundos

$apiToken=  $dta['apk'];
                            $query= mysqli_query($conectar,"INSERT INTO users (userId,mail,profileId,userName,contact,name,lastName,rolId,subDays,startSub,endLog) VALUES ('$userid','$personalMail','$profileId','$username','$contact','$name','$lastName','$rolId',30,'$fechaActual','$fechaActual')");
                            $query2= mysqli_query($conectar,"INSERT INTO userTokens (profileId,tokenValue,ranCode,clientKey) VALUES ('$profileId','$apiToken','$ranCode','$apiToken')");
                                  
       







                            $dta1 = [
                
                                'profileId' => $profileId
                            ];
                         
                            $sub_domaincon=new model_domain();
                            $sub_domain=$sub_domaincon->domIntegrations();
                            $url = $sub_domain."/koiosIntegrations/apiControlTower/v1/postSchedule/".$apiToken;
                            
                            $curl = curl_init();
                            
                            // Configurar las opciones de la sesión cURL
                            curl_setopt($curl, CURLOPT_URL, $url);
                            curl_setopt($curl, CURLOPT_POST, true);
                            curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            
                            $headers1 = array(
                                'Api-Key: ' . $apiToken,
                                'x-api-Key: ' . $apiToken
                            );
                            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers1);
                            
                            // Ejecutar la solicitud y obtener la respuesta
                            $response3 = curl_exec($curl);


                          
                            echo "true|¡Usuario creado con exito, vincuado a LUGMA y KOIOS!";
                        //echo "true"; // muestra "/mi-pagina.php?id=123"
            
            
                            //echo "La cadena contiene números, letras mayúsculas, minúsculas y símbolos";
                        
        
                       
                        
                    } else {
                        return "false|¡usuario con espacios o cadena de texto menor a 5 caracteres!";
                       // echo "usuario con espacios o cadena de texto mayor a 12 caracteres";
                    }
                                  
                                    
                                }
            
        }


    }
    
    
?>