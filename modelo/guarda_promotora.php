<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 
    $rut_ = $_POST["rut_"];
    $nom_ = $_POST["nom_"];
    $tel_ = $_POST["tel_"];
    $ema_ = $_POST["ema_"];
    $id_cam_ = $_POST["id_cam_"];
    $mon_bol_ = $_POST["mon_bol_"];
    $tienda_ = $_POST["tienda_"];
    $num_ticket_ = $_POST["num_ticket_"];   
    $sexo_ = $_POST['sexo_'];
    $hoy_ = date('Y-m-d');
    $nhoy_ = date('Y-m-d', strtotime($hoy_));
   

		
		 if($rut_ == '')
			{
				$sqz = "INSERT INTO log_visitas (id_campana,fecha_visita,numero_ticket,monto_boleta,id_tienda) VALUES ($id_cam_, '$nhoy_', $num_ticket_, $mon_bol_, $tienda_)";
                    $rz = $obj_conexion->query($sqz);  
           }else{

            $sqxx = "select * from clientes where rut ='". $rut_."'";
           $queryx = mysqli_query($obj_conexion,$sqxx);
			$existe_ = mysqli_num_rows($queryx);
            if($existe_ == 1)
            {
            $sql = "UPDATE clientes set nombre = '".$nom_."', telefono = '".$tel_."', email = '".$ema_."' where rut = '".$rut_."'";
               $rs = $obj_conexion->query($sql);
            }else{
            $sql = "INSERT INTO clientes (rut, nombre, telefono, email, sexo) VALUES('".$rut_."', '".$nom_."', '".$tel_."', '".$ema_."','".$sexo_."')";
            	 $rs = $obj_conexion->query($sql);
           }

       $sqz = "INSERT INTO log_visitas (rut,id_campana,fecha_visita,numero_ticket,monto_boleta,id_tienda) VALUES ('$rut_', $id_cam_, '$nhoy_', $num_ticket_, $mon_bol_, $tienda_)";
           $rz = $obj_conexion->query($sqz);          

        }

           $sqx = "SELECT * FROM visitas WHERE fecha=CURDATE() and campana = $id_cam_ limit 1";
			$query = mysqli_query($obj_conexion,$sqx);
			$existe = mysqli_num_rows($query);

			if($existe == 1){
				$sqq = "UPDATE visitas set visitas = visitas + 1 where fecha=CURDATE() and campana = $id_cam_";
				$rq = $obj_conexion->query($sqq);
			}else{
				$sqq = "INSERT INTO visitas (campana,fecha,visitas) VALUES ($id_cam_,'$nhoy_',1)";
				$rq = $obj_conexion->query($sqq);
			}

			echo 1;

 ?>