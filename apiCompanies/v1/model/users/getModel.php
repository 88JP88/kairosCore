<?php
    require_once 'database/db_users.php';
class modelGet {
          
        public static function getRooms($dta) {
            
                


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
                                   
                            
                                    if($param=="all"){
                                        $query= mysqli_query($conectar,"SELECT roomId,comments,isActive,status,clientId FROM rooms WHERE clientId='$clientId'");
                                           
                                      }    
                                      if($param!="all"){
                                        $query= mysqli_query($conectar,"SELECT r.roomId, r.comments, r.isActive, r.status, r.clientId FROM rooms r WHERE r.roomId NOT IN (SELECT ra.roomId FROM roomAssign ra WHERE ra.timeId = '$param') and r.clientId='$clientId' and r.isActive=1");
                                           
                                      }        
                                    if($query){
                                        $numRows = mysqli_num_rows($query);

    if ($numRows > 0) {
                                        $response="true";
                                        $message="Consulta exitosa";
                                        $status="202";
                                        $apiMessage="¡Rooms seleccionados ($numRows)!";
                                        $values=[];
                
                                        while ($row = $query->fetch_assoc()) {
                                            $value=[
                                                'roomId' => $row['roomId'],
                                                'comments' => $row['comments'],
                                                'isActive' => $row['isActive'],
                                                'status' => $row['status'],
                                                
                                                'clientId' => $row['clientId']
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
                                            'clientRoom' => $values
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
                                            'clientRoom' => $values
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
                                        $apiMessage="¡Rooms no selleccionados con éxito!";
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
                                            'clientRoom' => $values
                                        ];
                                        array_push($values,$value);
                                        
                            
                                //echo json_encode($students) ;
                                return json_encode($responseData);
                                                        }

                                                        
                                    
            }

            
        public static function getElements($dta) {
            
                


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
                $value1 = mysqli_real_escape_string($conectar, $dta['value']);
                $value2 = mysqli_real_escape_string($conectar, $dta['value']);
               
        
                if($param=="all"){
                    $query= mysqli_query($conectar,"SELECT elementId,elementName,caracts,comments,isActive,status,brand,type,clientId,isApply,imgElements,amount,roomId FROM clientElements WHERE clientId='$clientId'");
              }
              if($param=="free"){
                $query= mysqli_query($conectar,"SELECT elementId,elementName,caracts,comments,isActive,status,brand,type,clientId,isApply,imgElements,amount,roomId FROM clientElements WHERE clientId='$clientId' and isActive=1 and isApply=0 OR clientId='$clientId' and roomId='$value' and isApply=1 and isActive=1");
          }
          if($param=="hold"){
            $query= mysqli_query($conectar,"SELECT e.elementId,e.elementName,e.caracts,e.comments,e.isActive,e.status,e.brand,e.type,e.clientId,e.isApply,e.imgElements,e.amount,e.roomId FROM clientElements e JOIN elementAssign ea ON e.elementId=ea.elementId WHERE ea.clientId='$clientId' and ea.assignId='$value'");
      }
      if($param=="assign"){
        $query= mysqli_query($conectar,"SELECT elementId,elementName,caracts,comments,isActive,status,brand,type,clientId,isApply,imgElements,amount,roomId FROM clientElements where clientId='$clientId' and isActive=1 and isApply=0 and elementId NOT IN (SELECT elementId from elementAssign where userId='$value1' and assignId='$value2') OR clientId='$clientId' and roomId='$value' and isApply=1 and isActive=1 and elementId NOT IN (SELECT elementId from elementAssign where userId='$value1' and assignId='$value2')");
    }
    if($param=="usedbyclient"){
        $query= mysqli_query($conectar,"SELECT elementId,elementName,caracts,comments,isActive,status,brand,type,clientId,isApply,imgElements,amount,roomId FROM clientElements WHERE clientId='$clientId' and roomId='$value'");
    }
    if($param=="notusedbyclient"){
        $query= mysqli_query($conectar,"SELECT elementId,elementName,caracts,comments,isActive,status,brand,type,clientId,isApply,imgElements,amount,roomId FROM clientElements WHERE clientId='$clientId' and roomId='' OR clientId='$clientId' and roomId='NULL' OR clientId='$clientId' and roomId='null'");
    }
                if($query){
                    $numRows = mysqli_num_rows($query);

if ($numRows > 0) {
                    $response="true";
                    $message="Consulta exitosa";
                    $status="202";
                    $apiMessage="¡Elementos seleccionados ($numRows)!";
                    $values=[];

                    while ($row = $query->fetch_assoc()) {
                        $value=[
                            'elementId' => $row['elementId'],
                            'elementName' => $row['elementName'],
                            'caracts' => $row['caracts'],
                            'comments' => $row['comments'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'brand' => $row['brand'],
                            'type' => $row['type'],
                            'clientId' => $row['clientId'],
                            'isApply' => $row['isApply'],
                            'imgElements' => $row['imgElements'],
                             'amount' => $row['amount'],
                              'roomId' => $row['roomId']
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
                        'clientElement' => $values
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
                        'clientElement' => $values
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
                    $apiMessage="¡Elementos no seleccionados con éxito!";
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
                        'clientElement' => $values
                    ];
                    array_push($values,$value);
                    
        
            //echo json_encode($students) ;
            return json_encode($responseData);
                                    }

                                    
                
}


public static function getElementsAssign($dta) {
            
                


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
       
        $query= mysqli_query($conectar,"SELECT ar.assignId,ar.roomId,ar.timeId,ar.isActive,ar.status,ar.userName,ar.userId,ar.clientId,r.comments FROM roomAssign ar JOIN rooms r ON r.roomId=ar.roomId WHERE timeId='$filter'");
        
        if($query){
            $numRows = mysqli_num_rows($query);

if ($numRows > 0) {
            $response="true";
            $message="Consulta exitosa";
            $status="202";
            $apiMessage="¡Elementos asignados seleccionados ($numRows)!";
            $values=[];

            while ($row = $query->fetch_assoc()) {
                $value=[
                    'assignId' => $row['assignId'],
                    'roomId' => $row['roomId'],
                    'timeId' => $row['timeId'],
                    'isActive' => $row['isActive'],
                    'status' => $row['status'],
                    
                    'userName' => $row['userName'],
                    'userId' => $row['userId'],
                    'clientId' => $row['clientId'],
                    'comments' => $row['comments']
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
                'assignRoom' => $values
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
                'assignRoom' => $values
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
            $apiMessage="¡Elementos asignados no seleccionados con éxito!";
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
                'assignRoom' => $values
            ];
            array_push($values,$value);
            

    //echo json_encode($students) ;
    return json_encode($responseData);
                            }

                            
        
}
            public static function getCalendarDAYS($dta) {
            
                


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
                   

           
            $conectar=conn();
            
        
            if($param=="admin"){
                $query= mysqli_query($conectar,"SELECT calendarId,clientId,isActive,status,month,monthDays FROM calendarDays WHERE clientId='$clientId' and status = 1 and isActive=1");
           
            }
          
            if($param=="all"){

              
                $query= mysqli_query($conectar,"SELECT calendarId,clientId,isActive,status,month,monthDays FROM calendarDays WHERE clientId='$clientId'");
           
            }

                    if($query){
                        $numRows = mysqli_num_rows($query);

if ($numRows > 0) {
                        $response="true";
                        $message="Consulta exitosa";
                        $status="202";
                        $apiMessage="¡Dias de calendario seleccionados ($numRows)!";
                        $values=[];

                        while ($row = $query->fetch_assoc()) {
                            $calid=$row['calendarId'];
                    $query1= mysqli_query($conectar,"SELECT COUNT(registId) as counterId FROM calendarDaysAssign WHERE calendarId='$calid' and status=1 and calendarNumber>0 and calendarNumber<32 and isActive=1");
                    $row1 = mysqli_fetch_assoc($query1);
                    $counterId = $row1['counterId'];
                            $value=[
                                'calendarId' => $row['calendarId'],
                                'clientId' => $row['clientId'],
                                'isActive' => $row['isActive'],
                                'status' => $row['status'],
                                'month' => $row['month'],
                                'monthDays' => $row['monthDays'],
                                'counterId' => $counterId
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
                            'calendarDays' => $values
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
                            'calendarDays' => $values
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
                        $apiMessage="¡Dias de calendario no selleccionados con éxito!";
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
                            'calendarDays' => $values
                        ];
                        array_push($values,$value);
                        
            
                //echo json_encode($students) ;
                return json_encode($responseData);
                                        }

                                        
                    
}


public static function getCalendarDAYSASSIGN($dta) {
            
                


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
       
        if($param=="all"){
           
            $query= mysqli_query($conectar,"SELECT calendarId,calendarDay,calendarNumber,clientId,status,isActive,calendarTime,registId FROM calendarDaysAssign where calendarId='$value' and calendarNumber>0");
      }
      if($param=="admin"){
       
        $query= mysqli_query($conectar,"SELECT calendarId,calendarDay,calendarNumber,clientId,status,isActive,calendarTime,registId FROM calendarDaysAssign where calendarId='$value' and calendarNumber>0 and isActive=1 and status=1");
  }
        if($query){
            $numRows = mysqli_num_rows($query);

if ($numRows > 0) {
            $response="true";
            $message="Consulta exitosa";
            $status="202";
            $apiMessage="¡Dias de calendario asignados seleccionadas ($numRows)!";
            $values=[];

            while ($row = $query->fetch_assoc()) {
                $calid=$row['registId'];
                $query1= mysqli_query($conectar,"SELECT COUNT(timeId) as counterId FROM calendarTime WHERE registId='$calid' and status=1 and notApply='free' and isActive=1");
                $row1 = mysqli_fetch_assoc($query1);
                $counterId = $row1['counterId'];
                    $value=[
                        'calendarId' => $row['calendarId'],
                        'calendarDay' => $row['calendarDay'],
                        'calendarNumber' => $row['calendarNumber'],
                        'clientId' => $row['clientId'],
                        'status' => $row['status'],
                        'isActive' => $row['isActive'],
                        'calendarTime' => $row['calendarTime'],
                        'registId' => $row['registId'],
                        'counterId' => $counterId
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
                'calendarDaysAssign' => $values
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
                'calendarDaysAssign' => $values
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
            $apiMessage="¡Dias de calendario asignados no selleccionados con éxito!";
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
                'calendarDaysAssign' => $values
            ];
            array_push($values,$value);
            

    //echo json_encode($students) ;
    return json_encode($responseData);
                            }

                            
        
}


public static function getCalendarTIME($dta) {
            
                


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
                    
                    
        if($param=="all"){

          
           
            $query= mysqli_query($conectar,"SELECT registId,calendarTime,clientId,status,isActive,notApply,userApply,timeId FROM calendarTime where registId='$filter'");
    }
     
    if($param=="admin"){

      
       
        $query= mysqli_query($conectar,"SELECT registId,calendarTime,clientId,status,isActive,notApply,userApply,timeId FROM calendarTime where registId='$filter' and status= 1 and isActive=1");
}

        if($query){
            $numRows = mysqli_num_rows($query);

if ($numRows > 0) {
            $response="true";
            $message="Consulta exitosa";
            $status="202";
            $apiMessage="¡Categorías seleccionadas ($numRows)!";
            $values=[];

            while ($row = $query->fetch_assoc()) {
                $cid=$row['clientId'];
                $calid=$row['timeId'];
                $query1= mysqli_query($conectar,"SELECT COUNT(r.roomId) as counterId FROM rooms r WHERE r.roomId NOT IN (SELECT ra.roomId FROM roomAssign ra WHERE ra.timeId = '$calid') and r.clientId='$cid' and r.status=1 and r.isActive=1");
                $row1 = mysqli_fetch_assoc($query1);
                $counterId = $row1['counterId'];

                    $value=[
                        'registId' => $row['registId'],
                        'userApply' => $row['userApply'],
                        'clientId' => $row['clientId'],
                        'status' => $row['status'],
                        'isActive' => $row['isActive'],
                        'calendarTime' => $row['calendarTime'],
                        'notApply' => $row['notApply'],
                        
                        'timeId' => $row['timeId'],
                        'counterId' => $counterId
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
                'calendarTime' => $values
            ];
            
            return json_encode($responseData);
          //return "hello";
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
                'calendarTime' => $values
            ];
            array_push($values,$value);
            

    //echo json_encode($students) ;
    return json_encode($responseData);
        }

        //  return "true";
        //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
        }else{
            $response="false";
            $message="Error en la consulta: ";
            $status="404";
            $apiMessage="¡Categorías no selleccionados con éxito!";
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
                'calendarTime' => $values
            ];
            array_push($values,$value);
            

    //echo json_encode($students) ;
    return json_encode($responseData);
                            }

                         
        
}



public static function getCalendarTIMEDES($dta) {
            
                


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
                    
                    
        $query= mysqli_query($conectar,"SELECT ar.assignId,ar.roomId,ar.timeId,ar.isActive,ar.status,ar.userName,ar.userId,ar.clientId,r.comments FROM roomAssign ar JOIN rooms r ON r.roomId=ar.roomId WHERE timeId='$filter'");
         
        if($query){
            $numRows = mysqli_num_rows($query);

if ($numRows > 0) {
            $response="true";
            $message="Consulta exitosa";
            $status="202";
            $apiMessage="¡Registros seleccionados ($numRows)!";
            $values=[];

            while ($row = $query->fetch_assoc()) {
       

                $value=[
                    'assignId' => $row['assignId'],
                    'roomId' => $row['roomId'],
                    'timeId' => $row['timeId'],
                    'isActive' => $row['isActive'],
                    'status' => $row['status'],
                    
                    'userName' => $row['userName'],
                    'userId' => $row['userId'],
                    'clientId' => $row['clientId'],
                    'comments' => $row['comments']
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
                'assignRoom' => $values
            ];
            
            return json_encode($responseData);
          //return "hello";
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
                'assignRoom' => $values
            ];
            array_push($values,$value);
            

    //echo json_encode($students) ;
    return json_encode($responseData);
        }

        //  return "true";
        //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
        }else{
            $response="false";
            $message="Error en la consulta: ";
            $status="404";
            $apiMessage="¡Registros no seleccionados con éxito!";
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
                'assignRoom' => $values
            ];
            array_push($values,$value);
            

    //echo json_encode($students) ;
    return json_encode($responseData);
                            }

                         
        
}
    }


    
?>