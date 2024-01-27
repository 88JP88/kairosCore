<?php
    require_once 'database/db_users.php';
    require_once 'model/modelSecurity/uuid/uuidd.php';
class modelPost {
          
        public static function postRoom($dta) {
            
                


                                // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                                
                                    // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                                    $conectar = conn();
                            
                                    // Verifica si la conexión se realizó correctamente
                                    if (!$conectar) {
                                        return "Error de conexión a la base de datos";
                                    }
                            
                                    
                                        
                                    $gen_uuid = new generateUuid();
                                    $myuuid = $gen_uuid->guidv4();
                                    $roomId = substr($myuuid, 0, 8);

                                    // Escapa los valores para prevenir inyección SQL
                                    $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
                                    $comments = mysqli_real_escape_string($conectar, $dta['comments']);
                                   
                            
                                    $query= mysqli_query($conectar,"INSERT INTO rooms (roomId,comments,clientId) VALUES ('$roomId','$comments','$clientId')");

                                    if($query){
                                        $filasAfectadas = mysqli_affected_rows($conectar);
                                        if ($filasAfectadas > 0) {
                                            // Éxito: La actualización se realizó correctamente
                                        $response="true";
                                        $message="Creación exitosa. Filas afectadas: $filasAfectadas";
                                        $apiMessage="¡Room creado con éxito!";
                                            $status="201";
                                        } else {
                                            $response="false";
                                        $message="Creación no exitosa. Filas afectadas: $filasAfectadas";
                                            $status="500";
                                            $apiMessage="¡Room no credo con éxito!";
                                        }
                                    //  return "true";
                                    //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                                    }else{
                                        $response="true";
                                        $message="Error en la actualización: " . mysqli_error($conectar);
                                        $status="404";
                                        $apiMessage="¡Room no creado con éxito!";
                                    
                                                        }

                                                        $values=[];

                                                        $value=[
                                                            'response' => $response,
                                                            'message' => $message,
                                                            'apiMessage' => $apiMessage,
                                                            'status' => $status
                                                            
                                                        ];
                                                        
                                                        array_push($values,$value);
                                                        
                                            
                                                //echo json_encode($students) ;
                                                return json_encode(['response'=>$values]);
                                    
            }
            
        public static function postCalendar($dta) {
            
                
                // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                
                    // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                    $conectar = conn();
            
                    // Verifica si la conexión se realizó correctamente
                    if (!$conectar) {
                        return "Error de conexión a la base de datos";
                    }
            
                    
                        
                    $gen_uuid = new generateUuid();
                    $myuuid = $gen_uuid->guidv4();
                    $calendarId = substr($myuuid, 0, 8);

                    // Escapa los valores para prevenir inyección SQL
                    $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
                    $month = mysqli_real_escape_string($conectar, $dta['month']);
                    $monthDays = mysqli_real_escape_string($conectar, $dta['monthDays']);
                    $dayWeek = mysqli_real_escape_string($conectar, $dta['dayWeek']);
                    
                     

                    $numVeces=6;
                    $query= mysqli_query($conectar,"INSERT INTO calendarDays (calendarId,clientId,month,monthDays) VALUES ('$calendarId','$clientId','$month','$monthDays')");
                    
                    $s=-$dayWeek+1;
               
                    for ($i = 0; $i < $numVeces; $i++) {
               
               
               
                       $myuuid1 = $gen_uuid->guidv4();
                       $regestId = substr($myuuid1, 0, 8);
                       $s++;
                       if($s<1 || $s>$monthDays){
                           $ss="0";
                       }
                       if($s>0 && $s<=$monthDays){
                           $ss=$s;
                       }
                    $query= mysqli_query($conectar,"INSERT INTO calendarDaysAssign (calendarId,calendarDay,calendarNumber,clientId,registId) VALUES ('$calendarId','sunday',$ss,'$clientId','$regestId')");
                   
                    $numVeces1=24;
                    $ht=0;
                    if($ss==0){
               
                    }
                    if($ss>0){
               
                   
                    for ($ii = 0; $ii < $numVeces1; $ii++) {
                       $myuuid1 = $gen_uuid->guidv4();
                       $registId1 = substr($myuuid1, 0, 8);
                       $tt=$ht.":"."00";
                     
                    $query= mysqli_query($conectar,"INSERT INTO calendarTime (registId,calendarTime,clientId,timeId) VALUES ('$regestId','$tt','$clientId','$registId1')");
                    $ht++;
                   }
               
               
                    }
               
               
                   $myuuid1 = $gen_uuid->guidv4();
                   $regestId = substr($myuuid1, 0, 8);
                   $s++;
                   if($s<1 || $s>$monthDays){
                       $ss="0";
                   }
                   if($s>0 && $s<=$monthDays){
                       $ss=$s;
                   }
                    $query= mysqli_query($conectar,"INSERT INTO calendarDaysAssign (calendarId,calendarDay,calendarNumber,clientId,registId) VALUES ('$calendarId','monday','$ss','$clientId','$regestId')");
                    
                    
                    $ht=0;
                    $numVeces1=24;
                    if($ss==0){
               
                    }
                    if($ss>0){
               
                    for ($ii = 0; $ii < $numVeces1; $ii++) {
                       $myuuid1 = $gen_uuid->guidv4();
                       $registId1 = substr($myuuid1, 0, 8);
                       $tt=$ht.":"."00";
                     
                    $query= mysqli_query($conectar,"INSERT INTO calendarTime (registId,calendarTime,clientId,timeId) VALUES ('$regestId','$tt','$clientId','$registId1')");
                    $ht++;
                   }
               
                    }
               
               
                   
                   $myuuid1 = $gen_uuid->guidv4();
                   $regestId = substr($myuuid1, 0, 8);
                   $s++;
                   if($s<1 || $s>$monthDays){
                       $ss="0";
                   }
                   if($s>0 && $s<=$monthDays){
                       $ss=$s;
                   }
                    $query= mysqli_query($conectar,"INSERT INTO calendarDaysAssign (calendarId,calendarDay,calendarNumber,clientId,registId) VALUES ('$calendarId','tuesday','$ss','$clientId','$regestId')");
                   
                    $ht=0;
                    $numVeces1=24;
                    if($ss==0){
               
                    }
                    if($ss>0){
               
                    for ($ii = 0; $ii < $numVeces1; $ii++) {
                       $myuuid1 = $gen_uuid->guidv4();
                       $registId1 = substr($myuuid1, 0, 8);
                       $tt=$ht.":"."00";
                     
                    $query= mysqli_query($conectar,"INSERT INTO calendarTime (registId,calendarTime,clientId,timeId) VALUES ('$regestId','$tt','$clientId','$registId1')");
                    $ht++;
                   }
               
                    }
                   
                   $myuuid1 = $gen_uuid->guidv4();
                   $regestId = substr($myuuid1, 0, 8);
                   $s++;
                   if($s<1 || $s>$monthDays){
                       $ss="0";
                   }
                   if($s>0 && $s<=$monthDays){
                       $ss=$s;
                   }
                    $query= mysqli_query($conectar,"INSERT INTO calendarDaysAssign (calendarId,calendarDay,calendarNumber,clientId,registId) VALUES ('$calendarId','wednesday','$ss','$clientId','$regestId')");
                    
                    $ht=0;
                    $numVeces1=24;
                    if($ss==0){
               
                    }
                    if($ss>0){
               
                    for ($ii = 0; $ii < $numVeces1; $ii++) {
                       $myuuid1 = $gen_uuid->guidv4();
                       $registId1 = substr($myuuid1, 0, 8);
                       $tt=$ht.":"."00";
                     
                    $query= mysqli_query($conectar,"INSERT INTO calendarTime (registId,calendarTime,clientId,timeId) VALUES ('$regestId','$tt','$clientId','$registId1')");
                    $ht++;
                   }
                    }
                   
                   $myuuid1 = $gen_uuid->guidv4();
                   $regestId = substr($myuuid1, 0, 8);
                   $s++;
                   if($s<1 || $s>$monthDays){
                       $ss="0";
                   }
                   if($s>0 && $s<=$monthDays){
                       $ss=$s;
                   }
                    $query= mysqli_query($conectar,"INSERT INTO calendarDaysAssign (calendarId,calendarDay,calendarNumber,clientId,registId) VALUES ('$calendarId','thursday','$ss','$clientId','$regestId')");
                  
                    $ht=0;
                    $numVeces1=24;
                    if($ss==0){
               
                    }
                    if($ss>0){
               
                    for ($ii = 0; $ii < $numVeces1; $ii++) {
                       $myuuid1 = $gen_uuid->guidv4();
                       $registId1 = substr($myuuid1, 0, 8);
                       $tt=$ht.":"."00";
                     
                    $query= mysqli_query($conectar,"INSERT INTO calendarTime (registId,calendarTime,clientId,timeId) VALUES ('$regestId','$tt','$clientId','$registId1')");
                    $ht++;
                   }
                    }
                   
                   $myuuid1 = $gen_uuid->guidv4();
                   $regestId = substr($myuuid1, 0, 8);
                   $s++;
                   if($s<1 || $s>$monthDays){
                       $ss="0";
                   }
                   if($s>0 && $s<=$monthDays){
                       $ss=$s;
                   }
                    $query= mysqli_query($conectar,"INSERT INTO calendarDaysAssign (calendarId,calendarDay,calendarNumber,clientId,registId) VALUES ('$calendarId','friday','$ss','$clientId','$regestId')");
                    
                    $ht=0;
                    $numVeces1=24;
                    if($ss==0){
               
                    }
                    if($ss>0){
               
                    for ($ii = 0; $ii < $numVeces1; $ii++) {
                       $myuuid1 = $gen_uuid->guidv4();
                       $registId1 = substr($myuuid1, 0, 8);
                       $tt=$ht.":"."00";
                     
                    $query= mysqli_query($conectar,"INSERT INTO calendarTime (registId,calendarTime,clientId,timeId) VALUES ('$regestId','$tt','$clientId','$registId1')");
                    $ht++;
                   }
                    }
               
                   
                   $myuuid1 = $gen_uuid->guidv4();
                   $regestId = substr($myuuid1, 0, 8);
                   $s++;
                   if($s<1 || $s>$monthDays){
                       $ss="0";
                   }
                   if($s>0 && $s<=$monthDays){
                       $ss=$s;
                   }
                    $query= mysqli_query($conectar,"INSERT INTO calendarDaysAssign (calendarId,calendarDay,calendarNumber,clientId,registId) VALUES ('$calendarId','saturday','$ss','$clientId','$regestId')");
                    
                    $ht=0;
                    $numVeces1=24;
                    if($ss==0){
               
                    }
                    if($ss>0){
               
                    for ($ii = 0; $ii < $numVeces1; $ii++) {
                       $myuuid1 = $gen_uuid->guidv4();
                       $registId1 = substr($myuuid1, 0, 8);
                       $tt=$ht.":"."00";
                     
                    $query= mysqli_query($conectar,"INSERT INTO calendarTime (registId,calendarTime,clientId,timeId) VALUES ('$regestId','$tt','$clientId','$registId1')");
                    $ht++;
                   }
                    }
                   }
                    if($query){
                                $filasAfectadas = mysqli_affected_rows($conectar);
                                    if ($filasAfectadas > 0) 
                                        {
                                            // Éxito: La actualización se realizó correctamente
                                            $response="true";
                                            $message="Creación exitosa. Filas afectadas: $filasAfectadas";
                                            $apiMessage="¡Calendario creado con éxito!";
                                            $status="201";
                                        } 
                                        else {
                                            $response="false";
                                            $message="Creación no exitosa. Filas afectadas: $filasAfectadas";
                                            $status="500";
                                            $apiMessage="¡Calendario no credo con éxito!";
                                            }
                            //  return "true";
                            //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                    }
                    else{
                            $response="true";
                            $message="Error en la actualización: " . mysqli_error($conectar);
                            $status="404";
                            $apiMessage="¡Calendario no creado con éxito!";
                        
                        }

                        $values=[];

                        $value=[
                            'response' => $response,
                            'message' => $message,
                            'apiMessage' => $apiMessage,
                            'status' => $status
                            
                        ];
                        
                        array_push($values,$value);
                                            
                                
                                    //echo json_encode($students) ;
                                    return json_encode(['response'=>$values]);
                    
            }


        public static function postSrore($dta) {
    
           


        // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
    
        // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
        $conectar = conn();

        // Verifica si la conexión se realizó correctamente
        if (!$conectar) {
            return "Error de conexión a la base de datos";
        }

        
            
        $gen_uuid = new generateUuid();
        $myuuid = $gen_uuid->guidv4();
        $storeId = substr($myuuid, 0, 8);

        // Escapa los valores para prevenir inyección SQL
        $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
        $storeName = mysqli_real_escape_string($conectar, $dta['storeName']);
        $comments = mysqli_real_escape_string($conectar, $dta['comments']);
        $storeType = mysqli_real_escape_string($conectar, $dta['storeType']);
        //$dato_encriptado = $keyword;
        

        $keywords=$storeName." ".$comments." ".$storeType;
        $query = mysqli_query($conectar, "INSERT INTO generalStores (storeId, storeName, clientId, comments, storeType,keyWords) VALUES ('$storeId', '$storeName', '$clientId', '$comments', '$storeType','$keywords')");

        if($query){
            $filasAfectadas = mysqli_affected_rows($conectar);
            if ($filasAfectadas > 0) {
                // Éxito: La actualización se realizó correctamente
            $response="true";
            $message="Creación exitosa. Filas afectadas: $filasAfectadas";
            $apiMessage="¡Tienda creada con éxito!";
                $status="201";
            } else {
                $response="false";
            $message="Creación no exitosa. Filas afectadas: $filasAfectadas";
                $status="500";
                $apiMessage="¡Tienda no creda con éxito!";
            }
        //  return "true";
        //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
        }else{
            $response="true";
            $message="Error en la actualización: " . mysqli_error($conectar);
            $status="404";
            $apiMessage="¡Tienda no creada con éxito!";
        
                            }

                            $values=[];

                            $value=[
                                'response' => $response,
                                'message' => $message,
                                'apiMessage' => $apiMessage,
                                'status' => $status
                                
                            ];
                            
                            array_push($values,$value);
                            
                
                    //echo json_encode($students) ;
                    return json_encode(['response'=>$values]);
        
    }

    public static function postCategorie($dta) {
    
           


        // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
    
        // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
        $conectar = conn();

        // Verifica si la conexión se realizó correctamente
        if (!$conectar) {
            return "Error de conexión a la base de datos";
        }

        
            
        $gen_uuid = new generateUuid();
        $myuuid = $gen_uuid->guidv4();
        $categoryId = substr($myuuid, 0, 8);

        // Escapa los valores para prevenir inyección SQL
        $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
        $categoryName = mysqli_real_escape_string($conectar, $dta['categoryName']);
        $comments = mysqli_real_escape_string($conectar, $dta['comments']);
        $parentId = mysqli_real_escape_string($conectar, $dta['parentId']);
        $categoryType = mysqli_real_escape_string($conectar, $dta['categoryType']);
        //$dato_encriptado = $keyword;
        
        $keywords=$categoryName." ".$comments." ".$categoryType;

        if($categoryType=="main"){
$parentId=$categoryId;
        }
        
        $query = mysqli_query($conectar, "INSERT INTO generalCategories (catId, clientId, catName, comments, parentId,catType,keyWords) VALUES ('$categoryId', '$clientId', '$categoryName', '$comments', '$parentId','$categoryType','$keywords')");

        if($query){
            $filasAfectadas = mysqli_affected_rows($conectar);
            if ($filasAfectadas > 0) {
                // Éxito: La actualización se realizó correctamente
            $response="true";
            $message="Creación exitosa. Filas afectadas: $filasAfectadas";
            $apiMessage="¡Categoría creada con éxito!";
                $status="201";
            } else {
                $response="false";
            $message="Creación no exitosa. Filas afectadas: $filasAfectadas";
                $status="500";
                $apiMessage="¡Categoría no creda con éxito!";
            }
        //  return "true";
        //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
        }else{
            $response="true";
            $message="Error en la actualización: " . mysqli_error($conectar);
            $status="404";
            $apiMessage="¡Categoría no creada con éxito!";
        
                            }

                            $values=[];

                            $value=[
                                'response' => $response,
                                'message' => $message,
                                'apiMessage' => $apiMessage,
                                'status' => $status
                                
                            ];
                            
                            array_push($values,$value);
                            
                
                    //echo json_encode($students) ;
                    return json_encode(['response'=>$values]);
        
    }
    }


class modelPut{

      
            public static function putRoom($dta) {
            
                // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
            
                // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                $conectar = conn();
        
                // Verifica si la conexión se realizó correctamente
                if (!$conectar) {
                    return "Error de conexión a la base de datos";
                }
        
                
        
                // Escapa los valores para prevenir inyección SQL
                $reason = mysqli_real_escape_string($conectar, $dta['reason']);
                $filter = mysqli_real_escape_string($conectar, $dta['filter']);
                $value = mysqli_real_escape_string($conectar, $dta['value']);
                $roomId = mysqli_real_escape_string($conectar, $dta['roomId']);
            
                //$dato_encriptado = $keyword;
                
        
                if($reason=="comments"){
                    $query= mysqli_query($conectar,"UPDATE rooms SET $filter = '$value' WHERE roomId='$roomId'");
             
                   
        
                   }
                   if($reason=="isActive"){
                    $query= mysqli_query($conectar,"UPDATE rooms SET $filter = '$value' WHERE roomId='$roomId'");
        
                     }
                   if($reason=="del"){
                    $query= mysqli_query($conectar,"DELETE FROM rooms WHERE roomId='$roomId'");
             
                   }
                if($query){
                    $filasAfectadas = mysqli_affected_rows($conectar);
                    if ($filasAfectadas > 0) {
                        // Éxito: La actualización se realizó correctamente
                    $response="true";
                    $message="Actualización exitosa. Filas afectadas: $filasAfectadas";
                    $apiMessage="¡Room actualizado con éxito!";
                        $status="201";
                    } else {
                        $response="false";
                    $message="Actualización no exitosa. Filas afectadas: $filasAfectadas";
                        $status="500";
                        $apiMessage="¡Room no actualizado con éxito!";
                    }
                //  return "true";
                //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                }else{
                    $response="true";
                    $message="Error en la actualización: " . mysqli_error($conectar);
                    $status="404";
                    $apiMessage="¡Room no actualizado con éxito!";
                
                                    }
        
                                    $values=[];
        
                                    $value=[
                                        'response' => $response,
                                        'message' => $message,
                                        'apiMessage' => $apiMessage,
                                        'status' => $status
                                        
                                    ];
                                    
                                    array_push($values,$value);
                                    
                        
                            //echo json_encode($students) ;
                            return json_encode(['response'=>$values]);
        
                    }

                    public static function putCategorie($dta) {
            
                        // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                    
                        // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                        $conectar = conn();
                
                        // Verifica si la conexión se realizó correctamente
                        if (!$conectar) {
                            return "Error de conexión a la base de datos";
                        }
                
                        
                
                        // Escapa los valores para prevenir inyección SQL
                        $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
                        $param = mysqli_real_escape_string($conectar, $dta['param']);
                        $value = mysqli_real_escape_string($conectar, $dta['value']);
                        $categoryId = mysqli_real_escape_string($conectar, $dta['categoryId']);
                    
                        //$dato_encriptado = $keyword;
                        if($param=="parentId"){
                            if($categoryId==$value){
                                $query = mysqli_query($conectar, "UPDATE generalCategories SET $param='$value' ,catType='main' where clientId='$clientId' and catId='$categoryId'");
                
                            }else{
                                $query = mysqli_query($conectar, "UPDATE generalCategories SET $param='$value' ,catType='sec' where clientId='$clientId' and catId='$categoryId'");
                
                            }
                           
                           }
                           else{
                            $query = mysqli_query($conectar, "UPDATE generalCategories SET $param='$value' where clientId='$clientId' and catId='$categoryId'");
                
                           }
                        if($query){
                            $filasAfectadas = mysqli_affected_rows($conectar);
                            if ($filasAfectadas > 0) {
                                // Éxito: La actualización se realizó correctamente
                            $response="true";
                            $message="Actualización exitosa. Filas afectadas: $filasAfectadas";
                            $apiMessage="¡Categoría actualizada con éxito!";
                                $status="201";
                            } else {
                                $response="false";
                            $message="Actualización no exitosa. Filas afectadas: $filasAfectadas";
                                $status="500";
                                $apiMessage="¡Categoría no actualizado con éxito!";
                            }
                        //  return "true";
                        //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                        }else{
                            $response="true";
                            $message="Error en la actualización: " . mysqli_error($conectar);
                            $status="404";
                            $apiMessage="¡Categoría no actualizado con éxito!";
                        
                                            }
                
                                            $values=[];
                
                                            $value=[
                                                'response' => $response,
                                                'message' => $message,
                                                'apiMessage' => $apiMessage,
                                                'status' => $status
                                                
                                            ];
                                            
                                            array_push($values,$value);
                                            
                                
                                    //echo json_encode($students) ;
                                    return json_encode(['response'=>$values]);
                
                            }

                            public static function putStore($dta) {
            
                                // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                            
                                // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                                $conectar = conn();
                        
                                // Verifica si la conexión se realizó correctamente
                                if (!$conectar) {
                                    return "Error de conexión a la base de datos";
                                }
                        
                                
                        
                                // Escapa los valores para prevenir inyección SQL
                                $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
                                $param = mysqli_real_escape_string($conectar, $dta['param']);
                                $value = mysqli_real_escape_string($conectar, $dta['value']);
                                $storeId = mysqli_real_escape_string($conectar, $dta['storeId']);
                            
                                //$dato_encriptado = $keyword;
                                $query = mysqli_query($conectar, "UPDATE generalStores SET $param='$value' where clientId='$clientId' and storeId='$storeId'");

                                if($query){
                                    $filasAfectadas = mysqli_affected_rows($conectar);
                                    if ($filasAfectadas > 0) {
                                        // Éxito: La actualización se realizó correctamente
                                    $response="true";
                                    $message="Actualización exitosa. Filas afectadas: $filasAfectadas";
                                    $apiMessage="¡Tienda actualizada con éxito!";
                                        $status="201";
                                    } else {
                                        $response="false";
                                    $message="Actualización no exitosa. Filas afectadas: $filasAfectadas";
                                        $status="500";
                                        $apiMessage="¡Tienda no actualizado con éxito!";
                                    }
                                //  return "true";
                                //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                                }else{
                                    $response="true";
                                    $message="Error en la actualización: " . mysqli_error($conectar);
                                    $status="404";
                                    $apiMessage="¡Tienda no actualizado con éxito!";
                                
                                                    }
                        
                                                    $values=[];
                        
                                                    $value=[
                                                        'response' => $response,
                                                        'message' => $message,
                                                        'apiMessage' => $apiMessage,
                                                        'status' => $status
                                                        
                                                    ];
                                                    
                                                    array_push($values,$value);
                                                    
                                        
                                            //echo json_encode($students) ;
                                            return json_encode(['response'=>$values]);
                        
                                    }

                                    public static function putCatalog($dta) {
            
                                        // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                                    
                                        // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                                        $conectar = conn();
                                
                                        // Verifica si la conexión se realizó correctamente
                                        if (!$conectar) {
                                            return "Error de conexión a la base de datos";
                                        }
                                
                                        
                                
                                        // Escapa los valores para prevenir inyección SQL
                                        $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
                                        $param = mysqli_real_escape_string($conectar, $dta['param']);
                                        $value = mysqli_real_escape_string($conectar, $dta['value']);
                                        $catalogId = mysqli_real_escape_string($conectar, $dta['catalogId']);
                                    
                                        //$dato_encriptado = $keyword;
                                        if($param=="isEcommerce" && $value=="1" || $param=="isPos" && $value=="1"){
                                            $query = mysqli_query($conectar, "UPDATE generalCatalogs SET $param='$value' ,isStocked=0,isInternal=0 where clientId='$clientId' and catalogId='$catalogId'");
                                
                                           }
                                           if($param=="isStocked" && $value=="1"){
                                            $query = mysqli_query($conectar, "UPDATE generalCatalogs SET $param='$value' ,isEcommerce=0,isPos=0,isInternal=0 where clientId='$clientId' and catalogId='$catalogId'");
                                
                                           }
                                           if($param=="isInternal" && $value=="1"){
                                            $query = mysqli_query($conectar, "UPDATE generalCatalogs SET $param='$value' ,isEcommerce=0,isPos=0,isStocked=0 where clientId='$clientId' and catalogId='$catalogId'");
                                
                                           }
                                           if($param=="catalogId" || $param=="clientId"){
                                            $query = mysqli_query($conectar, "UPDATE generalCatalogs SET clientId='$clientId' where clientId='$clientId' and catalogId='$catalogId'");
                                
                                           }
                                           if($param=="del"){
                                            $query = mysqli_query($conectar, "UPDATE generalCatalogs SET status=0,isActive=0 where clientId='$clientId' and catalogId='$catalogId'");
                                
                                           }
                                           else{
                                            $query = mysqli_query($conectar, "UPDATE generalCatalogs SET $param='$value' where clientId='$clientId' and catalogId='$catalogId'");
                                
                                           }
                                        if($query){
                                            $filasAfectadas = mysqli_affected_rows($conectar);
                                            if ($filasAfectadas > 0) {
                                                // Éxito: La actualización se realizó correctamente
                                            $response="true";
                                            $message="Actualización exitosa. Filas afectadas: $filasAfectadas";
                                            $apiMessage="¡Catálogo actualizado con éxito!";
                                                $status="201";
                                            } else {
                                                $response="false";
                                            $message="Actualización no exitosa. Filas afectadas: $filasAfectadas";
                                                $status="500";
                                                $apiMessage="¡Catálogo no actualizado con éxito!";
                                            }
                                        //  return "true";
                                        //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                                        }else{
                                            $response="true";
                                            $message="Error en la actualización: " . mysqli_error($conectar);
                                            $status="404";
                                            $apiMessage="¡Catálogo no actualizado con éxito!";
                                        
                                                            }
                                
                                                            $values=[];
                                
                                                            $value=[
                                                                'response' => $response,
                                                                'message' => $message,
                                                                'apiMessage' => $apiMessage,
                                                                'status' => $status
                                                                
                                                            ];
                                                            
                                                            array_push($values,$value);
                                                            
                                                
                                                    //echo json_encode($students) ;
                                                    return json_encode(['response'=>$values]);
                                
                                            }
   
    }
    
?>