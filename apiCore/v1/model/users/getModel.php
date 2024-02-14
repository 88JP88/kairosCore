<?php
    require_once 'database/db_users.php';
class modelGet {
          
        public static function getUsersGENERAL($dta) {
            
                


                                // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                                
                                    // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                                    $conectar = conn();
                            
                                    // Verifica si la conexión se realizó correctamente
                                    if (!$conectar) {
                                        return "Error de conexión a la base de datos";
                                    }
                            
                                    
                                        

                                    // Escapa los valores para prevenir inyección SQL
                                    $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
                                    $filter = mysqli_real_escape_string($conectar, $dta['filter']);
                                    $param = mysqli_real_escape_string($conectar, $dta['param']);
                                    $value = mysqli_real_escape_string($conectar, $dta['value']);
                                   
                            
                                    if($filter=="all"){
                                        if($param=="unlock"){
                                            $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM generalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=1");
                                          
                                          }
                                          if($param=="lock"){
                                            $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM generalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=0");
                                          
                                          }
                        
                                    }
                                    if($filter!="all"){
                                        
                                            $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM generalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=1 and u.clientId='$clientId'");
                                        
                        
                                    }
                                    if($query){
                                        $numRows = mysqli_num_rows($query);

    if ($numRows > 0) {
                                        $response="true";
                                        $message="Consulta exitosa";
                                        $status="202";
                                        $apiMessage="¡Usuarios seleccionados ($numRows)!";
                                        $values=[];
                
                                        while ($row = $query->fetch_assoc()) {
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
                                        
                                        $row = $query->fetch_assoc();
                                       // return json_encode(['products'=>$values]);
                                        
                                        // Crear un array separado para el objeto 'response'
                                        $responseData = [
                                            'response' => [
                                                'response' => $response,
                                                'message' => $message,
                                                'apiMessage' => $apiMessage,
                                                'status' => $status,
                                                'sentData'=>$dta
                                            ],
                                            'users' => $values
                                        ];
                                        
                                        return json_encode($responseData);
                                    }else {
                                        // La consulta no arrojó resultados
                                        $response="false";
                                        $message="Error en la consulta";
                                        $status="204";
                                        $apiMessage="¡La consulta no produjo resultados, filas seleccionadas ($numRows)!";
                                        $values=[];
                                        $value = [
                                            
                                        ];
                                        $responseData = [
                                            'response' => [
                                                'response' => $response,
                                                'message' => $message,
                                                'apiMessage' => $apiMessage,
                                                'status' => $status,
                                                'sentData'=>$dta
                                            ],
                                            'users' => $values
                                        ];
                                        array_push($values,$value);
                                        
                            
                                //echo json_encode($students) ;
                                return json_encode($responseData);
                                    }

                                    //  return "true";
                                    //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                                    }else{
                                        $response="false";
                                        $message="Error en la consulta: " . mysqli_error($conectar);
                                        $status="404";
                                        $apiMessage="¡Usuarios no seleccionados con éxito!";
                                        $values=[];

                                        $value = [
                                            
                                        ];
                                        $responseData = [
                                            'response' => [
                                                'response' => $response,
                                                'message' => $message,
                                                'apiMessage' => $apiMessage,
                                                'status' => $status,
                                                'sentData'=>$dta
                                            ],
                                            'users' => $values
                                        ];
                                        array_push($values,$value);
                                        
                            
                                //echo json_encode($students) ;
                                return json_encode($responseData);
                                                        }

                                                        
                                    
            }

            
        public static function getUsersINTERNAL($dta) {
            
                


            // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
            
                // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                $conectar = conn();
        
                // Verifica si la conexión se realizó correctamente
                if (!$conectar) {
                    return "Error de conexión a la base de datos";
                }
        
                
                    

                // Escapa los valores para prevenir inyección SQL
                $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
                $filter = mysqli_real_escape_string($conectar, $dta['filter']);
                $param = mysqli_real_escape_string($conectar, $dta['param']);
                $value = mysqli_real_escape_string($conectar, $dta['value']);
               
        
                if($filter=="unlock"){
                    $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM internalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=1");
                  
                  }
                  if($filter=="lock"){
                    $query= mysqli_query($conectar,"SELECT u.userId,u.name,u.lastName,u.email,u.userName,u.isActive,u.status,u.rolId,u.contact,u.sessionCounter,u.clientId,c.clientName FROM internalUsers u JOIN clients c ON c.clientId=u.clientId WHERE u.status=0");
                  
                  }
                if($query){
                    $numRows = mysqli_num_rows($query);

if ($numRows > 0) {
                    $response="true";
                    $message="Consulta exitosa";
                    $status="202";
                    $apiMessage="¡Usuarios seleccionados ($numRows)!";
                    $values=[];

                    while ($row = $query->fetch_assoc()) {
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
                    
                    $row = $query->fetch_assoc();
                   // return json_encode(['products'=>$values]);
                    
                    // Crear un array separado para el objeto 'response'
                    $responseData = [
                        'response' => [
                            'response' => $response,
                            'message' => $message,
                            'apiMessage' => $apiMessage,
                            'status' => $status,
                            'sentData'=>$dta
                        ],
                        'users' => $values
                    ];
                    
                    return json_encode($responseData);
                }else {
                    // La consulta no arrojó resultados
                    $response="false";
                    $message="Error en la consulta";
                    $status="204";
                    $apiMessage="¡La consulta no produjo resultados, filas seleccionadas ($numRows)!";
                    $values=[];
                    $value = [
                        
                    ];
                    $responseData = [
                        'response' => [
                            'response' => $response,
                            'message' => $message,
                            'apiMessage' => $apiMessage,
                            'status' => $status,
                            'sentData'=>$dta
                        ],
                        'users' => $values
                    ];
                    array_push($values,$value);
                    
        
            //echo json_encode($students) ;
            return json_encode($responseData);
                }

                //  return "true";
                //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                }else{
                    $response="false";
                    $message="Error en la consulta: " . mysqli_error($conectar);
                    $status="404";
                    $apiMessage="¡Usuarios no seleccionados con éxito!";
                    $values=[];

                    $value = [
                        
                    ];
                    $responseData = [
                        'response' => [
                            'response' => $response,
                            'message' => $message,
                            'apiMessage' => $apiMessage,
                            'status' => $status,
                            'sentData'=>$dta
                        ],
                        'users' => $values
                    ];
                    array_push($values,$value);
                    
        
            //echo json_encode($students) ;
            return json_encode($responseData);
                                    }

                                    
                
}

}