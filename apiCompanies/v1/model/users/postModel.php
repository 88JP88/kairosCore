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
            
        public static function postCatalog($dta) {
            
                
                // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
                
                    // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
                    $conectar = conn();
            
                    // Verifica si la conexión se realizó correctamente
                    if (!$conectar) {
                        return "Error de conexión a la base de datos";
                    }
            
                    
                        
                    $gen_uuid = new generateUuid();
                    $myuuid = $gen_uuid->guidv4();
                    $catalogId = substr($myuuid, 0, 8);

                    // Escapa los valores para prevenir inyección SQL
                    $clientId = mysqli_real_escape_string($conectar, $dta['clientId']);
                    $productId = mysqli_real_escape_string($conectar, $dta['productId']);
                    $categoryId = mysqli_real_escape_string($conectar, $dta['categoryId']);
                    $stock = mysqli_real_escape_string($conectar, $dta['stock']);
                    $secStock = mysqli_real_escape_string($conectar, $dta['secStock']);
                    $minQty = mysqli_real_escape_string($conectar, $dta['minQty']);
                    $maxQty = mysqli_real_escape_string($conectar, $dta['maxQty']);
                    $storeId = mysqli_real_escape_string($conectar, $dta['storeId']);
                    $outPrice = mysqli_real_escape_string($conectar, $dta['outPrice']);
                    $promoId = mysqli_real_escape_string($conectar, $dta['promoId']);
                    $discount = mysqli_real_escape_string($conectar, $dta['discount']);
                    $unit = mysqli_real_escape_string($conectar, $dta['unit']);
                    $readUnit = mysqli_real_escape_string($conectar, $dta['readUnit']);
                    $unitQty = mysqli_real_escape_string($conectar, $dta['unitQty']);
                    $unitUnit = mysqli_real_escape_string($conectar, $dta['unitUnit']);
                    //$dato_encriptado = $keyword;
                    
            
                    $query = mysqli_query($conectar, "INSERT INTO generalCatalogs (catalogId, clientId, productId, categoryId, stock, secStock, minQty, maxQty, storeId, outPrice, promoId, discount,unit,readUnit,unitQty,unitUnit) VALUES ('$catalogId', '$clientId', '$productId', '$categoryId', $stock, $secStock, $minQty, $maxQty, '$storeId', $outPrice, '$promoId', $discount,'$unit','$readUnit',$unitQty,'$unitUnit')");

                    if($query){
                                $filasAfectadas = mysqli_affected_rows($conectar);
                                    if ($filasAfectadas > 0) 
                                        {
                                            // Éxito: La actualización se realizó correctamente
                                            $response="true";
                                            $message="Creación exitosa. Filas afectadas: $filasAfectadas";
                                            $apiMessage="¡Catálogo creado con éxito!";
                                            $status="201";
                                        } 
                                        else {
                                            $response="false";
                                            $message="Creación no exitosa. Filas afectadas: $filasAfectadas";
                                            $status="500";
                                            $apiMessage="¡Catálogo no credo con éxito!";
                                            }
                            //  return "true";
                            //echo "ups! el id del repo está repetido , intenta nuevamente, gracias.";
                    }
                    else{
                            $response="true";
                            $message="Error en la actualización: " . mysqli_error($conectar);
                            $status="404";
                            $apiMessage="¡Catálogo no creado con éxito!";
                        
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