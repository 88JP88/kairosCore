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


        public static function postRoomAssign($dta) {
    
           


        // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
    
        // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
        $conectar = conn();

        // Verifica si la conexión se realizó correctamente
        if (!$conectar) {
            return "Error de conexión a la base de datos";
        }

        
            
        $gen_uuid = new generateUuid();
        $myuuid = $gen_uuid->guidv4();
        $assignId = substr($myuuid, 0, 8);

        // Escapa los valores para prevenir inyección SQL
        $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
        $roomId = mysqli_real_escape_string($conectar, $dta['roomId']);
        $userId = mysqli_real_escape_string($conectar, $dta['userId']);
        $timeId = mysqli_real_escape_string($conectar, $dta['timeId']);

        $param = mysqli_real_escape_string($conectar, $dta['param']);

        $assignments = mysqli_real_escape_string($conectar, $dta['assignments']);
        //$dato_encriptado = $keyword;
        
        $array = explode("|", $userId);
        $userid=$array[0];
        $username=$array[1];
        
       if($param=="assign"){

        $query= mysqli_query($conectar,"SELECT COUNT(r.roomId) as counterId FROM rooms r WHERE r.roomId IN (SELECT ra.roomId FROM roomAssign ra WHERE ra.timeId = '$timeId') and r.clientId='$clientId' and r.status=1 and r.isActive=1");
        $row1 = mysqli_fetch_assoc($query);
        $counterId = $row1['counterId'];

        $query= mysqli_query($conectar,"SELECT COUNT(r.roomId) as counterIdr FROM rooms r WHERE r.clientId='$clientId' and r.status=1 and r.isActive=1");
        $row2 = mysqli_fetch_assoc($query);
        $counterIdRoom = $row2['counterIdr'];
$sum= $counterId+1;
        if($sum==$counterIdRoom){

            $query= mysqli_query($conectar,"UPDATE calendarTime SET status=0 WHERE timeId='$timeId'");
            $query= mysqli_query($conectar,"INSERT INTO roomAssign (assignId,roomId,timeId,clientId,userId,userName) VALUES ('$assignId','$roomId','$timeId','$clientId','$userid','$username')");
       
       
            

            // Divide la cadena en un array utilizando '|'
            $elementos = explode("|", $assignments);
            
            // Itera sobre los elementos del array
            foreach ($elementos as $elemento) {
                // Ejecuta tu código para cada elemento
                $myuuid1 = $gen_uuid->guidv4();
                $elId = substr($myuuid1, 0, 8);
                $query= mysqli_query($conectar,"INSERT INTO elementAssign (assignElement,elementId,assignId,clientId,userId,roomId,timeId) VALUES ('$elId','$elemento','$assignId','$clientId','$userid','$roomId','$timeId')");
       


                // Puedes hacer lo que necesites con $elemento en esta iteración
            }
       
       
       
       
       
       
       
       
            $apiMessage="¡Room asignado con éxito!";
       
       
       
       
        }
        if($sum<$counterIdRoom){

            
            $query= mysqli_query($conectar,"INSERT INTO roomAssign (assignId,roomId,timeId,clientId,userId,userName) VALUES ('$assignId','$roomId','$timeId','$clientId','$userid','$username')");
           
           

            // Divide la cadena en un array utilizando '|'
            $elementos = explode("|", $assignments);
            
            // Itera sobre los elementos del array
            foreach ($elementos as $elemento) {
                // Ejecuta tu código para cada elemento
                $myuuid1 = $gen_uuid->guidv4();
                $elId = substr($myuuid1, 0, 8);
                $query= mysqli_query($conectar,"INSERT INTO elementAssign (assignElement,elementId,assignId,clientId,userId,roomId,timeId) VALUES ('$elId','$elemento','$assignId','$clientId','$userid','$roomId','$timeId')");
       


                // Puedes hacer lo que necesites con $elemento en esta iteración
            }
       
       
       
       
       
       
       
       
            $apiMessage="¡Room asignado con éxito!";
        }



        if($sum>$counterIdRoom){
            $apiMessage="¡Room no asignado!";
            
        }
       }
               




       
       if($param=="notassign"){

       

        $query= mysqli_query($conectar,"SELECT status FROM calendarTime WHERE timeId='$timeId'");
        $row2 = mysqli_fetch_assoc($query);
        $status1 = $row2['status'];

        if($status1==1){

            
            $query= mysqli_query($conectar,"DELETE FROM elementAssign where assignId='$clientId' and timeId='$timeId' and userId IN (SELECT userId from roomAssign where assignId='$clientId')");
           
            $query= mysqli_query($conectar,"DELETE FROM roomAssign where assignId='$clientId'");
            $apiMessage="¡Room desasignado con éxito!";
       
       }   
       
       if($status1==0){

        $query= mysqli_query($conectar,"UPDATE calendarTime SET status=1 WHERE timeId='$timeId'");
        $query= mysqli_query($conectar,"DELETE FROM elementAssign where assignId='$clientId' and timeId='$timeId' and userId IN (SELECT userId from roomAssign where assignId='$clientId')");
         
        $query= mysqli_query($conectar,"DELETE FROM roomAssign where assignId='$clientId'");
        $apiMessage="¡Room desasignado con éxito!";
   
   }
 
}


if($param=="revelement"){

    $elementos = explode("|", $assignments);
            
    // Itera sobre los elementos del array
    foreach ($elementos as $elemento) {
        // Ejecuta tu código para cada elemento
        $query= mysqli_query($conectar,"DELETE FROM elementAssign where assignId='$clientId' and timeId='$timeId' and elementId='$elemento'");
       

        // Puedes hacer lo que necesites con $elemento en esta iteración
    }
      

    $apiMessage="¡Elemento desasignado con éxito!";
 
}

if($param=="asigelement"){

$elementos = explode("|", $assignments);
        
// Itera sobre los elementos del array
foreach ($elementos as $elemento) {
    // Ejecuta tu código para cada elemento
    $myuuid1 = $gen_uuid->guidv4();
                $elId = substr($myuuid1, 0, 8);
                $query= mysqli_query($conectar,"INSERT INTO elementAssign (assignElement,elementId,assignId,clientId,userId,roomId,timeId) VALUES ('$elId','$elemento','$username','$clientId','$userid','$roomId','$timeId')");
       

    // Puedes hacer lo que necesites con $elemento en esta iteración
}
  

$apiMessage="¡Elemento asignado con éxito!";
}

if($param=="asigelementroom"){

$elementos = explode("|", $assignments);
        
// Itera sobre los elementos del array
foreach ($elementos as $elemento) {
    // Ejecuta tu código para cada elemento
                $query= mysqli_query($conectar,"UPDATE clientElements SET roomId='$roomId',isApply=1 where elementId='$elemento'");
       

    // Puedes hacer lo que necesites con $elemento en esta iteración
}
  
$apiMessage="¡Elemento asignado con éxito!";
}


if($param=="asigelementroomdes"){

$elementos = explode("|", $assignments);
        
// Itera sobre los elementos del array
foreach ($elementos as $elemento) {
    // Ejecuta tu código para cada elemento
                $query= mysqli_query($conectar,"UPDATE clientElements SET roomId='',isApply=0 where elementId='$elemento'");
       

    // Puedes hacer lo que necesites con $elemento en esta iteración
}
  
$apiMessage="¡Elemento desasignado con éxito!";
    
}

       
 

        if($query){
            $filasAfectadas = mysqli_affected_rows($conectar);
            if ($filasAfectadas > 0) {
                // Éxito: La actualización se realizó correctamente
            $response="true";
            $message="Creación exitosa. Filas afectadas: $filasAfectadas";
           // $apiMessage="¡Tienda creada con éxito!";
                $status="201";
            } else {
                $response="false";
            $message="Creación no exitosa. Filas afectadas: $filasAfectadas";
                $status="500";
                $apiMessage="¡Creación no exitosa!";
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

    public static function postElement($dta) {
    
           


        // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
    
        // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
        $conectar = conn();

        // Verifica si la conexión se realizó correctamente
        if (!$conectar) {
            return "Error de conexión a la base de datos";
        }

        
            
        $gen_uuid = new generateUuid();
        $myuuid = $gen_uuid->guidv4();
        $elementId = substr($myuuid, 0, 8);

        // Escapa los valores para prevenir inyección SQL
        $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
        $name = mysqli_real_escape_string($conectar, $dta['name']);
        $comments = mysqli_real_escape_string($conectar, $dta['comments']);
        $caract = mysqli_real_escape_string($conectar, $dta['caract']);
        $brand = mysqli_real_escape_string($conectar, $dta['brand']);
        $type = mysqli_real_escape_string($conectar, $dta['type']);
        $img = mysqli_real_escape_string($conectar, $dta['img']);
        $val = mysqli_real_escape_string($conectar, $dta['value']);
        //$dato_encriptado = $keyword;
        
        $query= mysqli_query($conectar,"INSERT INTO clientElements (elementId,elementName,caracts,comments,brand,type,clientId,imgElements,amount) VALUES ('$elementId','$name','$caract','$comments','$brand','$type','$clientId','$img','$val')");

        if($query){
            $filasAfectadas = mysqli_affected_rows($conectar);
            if ($filasAfectadas > 0) {
                // Éxito: La actualización se realizó correctamente
            $response="true";
            $message="Creación exitosa. Filas afectadas: $filasAfectadas";
            $apiMessage="¡Elemento creado con éxito!";
                $status="201";
            } else {
                $response="false";
            $message="Creación no exitosa. Filas afectadas: $filasAfectadas";
                $status="500";
                $apiMessage="¡Elemento no credo con éxito!";
            }
        //  return "true";
        //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
        }else{
            $response="true";
            $message="Error en la actualización: " . mysqli_error($conectar);
            $status="404";
            $apiMessage="¡Elemento no creado con éxito!";
        
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

                    public static function putCalendar($dta) {
            
                        // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                    
                        // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                        $conectar = conn();
                
                        // Verifica si la conexión se realizó correctamente
                        if (!$conectar) {
                            return "Error de conexión a la base de datos";
                        }
                
                        
                
                        // Escapa los valores para prevenir inyección SQL
                        $calendarId = mysqli_real_escape_string($conectar, $dta['calendarId']);
                        $filter = mysqli_real_escape_string($conectar, $dta['filter']);
                        $reason = mysqli_real_escape_string($conectar, $dta['reason']);
                        $value = mysqli_real_escape_string($conectar, $dta['value']);
                    
                        //$dato_encriptado = $keyword;
                        if($reason=="calendarDays"){
                            $query= mysqli_query($conectar,"UPDATE calendarDays SET $filter = '$value' WHERE calendarId='$calendarId'");
                     
                           
                
                           }
                           if($reason=="calendarDaysAssign"){
                            $query= mysqli_query($conectar,"UPDATE calendarDaysAssign SET $filter = '$value' WHERE registId='$calendarId'");
                     
                
                           }
                                       
                           if($reason=="calendarTime"){
                            $query= mysqli_query($conectar,"UPDATE calendarTime SET $filter = '$value' WHERE timeId='$calendarId'");
                     
                
                           }
                        if($query){
                            $filasAfectadas = mysqli_affected_rows($conectar);
                            if ($filasAfectadas > 0) {
                                // Éxito: La actualización se realizó correctamente
                            $response="true";
                            $message="Actualización exitosa. Filas afectadas: $filasAfectadas";
                            $apiMessage="¡Calendario actualizad0 con éxito!";
                                $status="201";
                            } else {
                                $response="false";
                            $message="Actualización no exitosa. Filas afectadas: $filasAfectadas";
                                $status="500";
                                $apiMessage="¡Calendario no actualizado con éxito!";
                            }
                        //  return "true";
                        //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                        }else{
                            $response="true";
                            $message="Error en la actualización: " . mysqli_error($conectar);
                            $status="404";
                            $apiMessage="¡Calendario no actualizado con éxito!";
                        
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

                            public static function putElement($dta) {
            
                                // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                            
                                // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                                $conectar = conn();
                        
                                // Verifica si la conexión se realizó correctamente
                                if (!$conectar) {
                                    return "Error de conexión a la base de datos";
                                }
                        
                                
                        
                                // Escapa los valores para prevenir inyección SQL
                                $elementId = mysqli_real_escape_string($conectar, $dta['elementId']);
                                $filter = mysqli_real_escape_string($conectar, $dta['filter']);
                                $reason = mysqli_real_escape_string($conectar, $dta['reason']);
                                $value = mysqli_real_escape_string($conectar, $dta['value']);
                            
                                //$dato_encriptado = $keyword;
                                if($reason=="data"){
                                    $query= mysqli_query($conectar,"UPDATE clientElements SET $filter = '$value' WHERE elementId='$elementId'");
                             
                        
                                   }
                                   if($reason=="isActive"){
                                    $query= mysqli_query($conectar,"UPDATE clientElements SET $filter = '$value' WHERE elementId='$elementId'");
                                                            
                                   }
                                   if($reason=="del"){
                                    $query= mysqli_query($conectar,"DELETE FROM clientElements WHERE elementId='$elementId'");
                                                  
                                   }
                                if($query){
                                    $filasAfectadas = mysqli_affected_rows($conectar);
                                    if ($filasAfectadas > 0) {
                                        // Éxito: La actualización se realizó correctamente
                                    $response="true";
                                    $message="Actualización exitosa. Filas afectadas: $filasAfectadas";
                                    $apiMessage="¡Elemento actualizado con éxito!";
                                        $status="201";
                                    } else {
                                        $response="false";
                                    $message="Actualización no exitosa. Filas afectadas: $filasAfectadas";
                                        $status="500";
                                        $apiMessage="¡Elemento no actualizado con éxito!";
                                    }
                                //  return "true";
                                //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                                }else{
                                    $response="true";
                                    $message="Error en la actualización: " . mysqli_error($conectar);
                                    $status="404";
                                    $apiMessage="¡Elemento no actualizado con éxito!";
                                
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