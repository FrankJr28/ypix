<?php

class ModeloCrud{

    static public function mdlObtenerClientes(){
        
        $sql = "SELECT * from cliente";

        $stmt = Conect::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }

        $stmt->close();

        $stmt=NULL;

    }

    static public function mdlInsertarCliente($datos){
        
        //INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `apellidoM`, `direccion`, `fecha_edad`, `activo`) VALUES (NULL, 'José', 'Guadalupe', 'Bernardino', 'Gutierrez', '1993-05-12 00:35:02', b'1');
    
        $sql = "INSERT INTO cliente (id, nombre, apellido, apellidoM, direccion, fecha_edad, token, activo) VALUES (NULL, :nom, :app, :apm, :dir,:fecha,:token,'1')";

        //$stmt = Conect::conectar()->prepare($sql);

        $pdo=Conect::conectar();

        $stmt=$pdo->prepare($sql);

        $stmt->bindParam(":nom",$datos["nombre"],PDO::PARAM_STR);

        $stmt->bindParam(":app",$datos["apellido"],PDO::PARAM_STR);

        $stmt->bindParam(":apm",$datos["apellidoMaterno"],PDO::PARAM_STR);

        $stmt->bindParam(":dir",$datos["direccion"],PDO::PARAM_STR);

        $stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);

        $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);

        if($stmt->execute()){

            return $pdo->lastInsertId();
        
        }
        else{

            return "error";

        }

        $stmt->close();

        $stmt=NULL;


    }

    static public function mdlObtenerCliente($token){
        
        //INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `apellidoM`, `direccion`, `fecha_edad`, `activo`) VALUES (NULL, 'José', 'Guadalupe', 'Bernardino', 'Gutierrez', '1993-05-12 00:35:02', b'1');
    
        $sql = "SELECT * FROM cliente WHERE token = :tok";

        $pdo=Conect::conectar();

        $stmt=$pdo->prepare($sql);

        $stmt->bindParam(":tok",$token,PDO::PARAM_STR);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }

        $stmt->close();

        $stmt=NULL;


    }

    static public function mdlEliminarCliente($token){
        
        //INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `apellidoM`, `direccion`, `fecha_edad`, `activo`) VALUES (NULL, 'José', 'Guadalupe', 'Bernardino', 'Gutierrez', '1993-05-12 00:35:02', b'1');
    
        $sql = "DELETE FROM cliente WHERE token = :tok";

        $pdo=Conect::conectar();

        $stmt=$pdo->prepare($sql);

        $stmt->bindParam(":tok",$token,PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        
        }
        else{

            return "error";

        }

        $stmt->close();

        $stmt=NULL;

    }

    static public function mdlActualizarCliente($datos){
        
        //UPDATE `cliente` SET `apellidoM`='[value-4]',`direccion`='[value-5]',`fecha_edad`='[value-6]',`token`='[value-7]',`activo`='[value-8]' WHERE 1

        $sql = "UPDATE cliente SET nombre=:nom, apellido=:app, apellidoM=:apm, activo=:act, direccion=:dir, fecha_edad=:fecha WHERE token=:tok";

        //$stmt = Conect::conectar()->prepare($sql);

        $pdo=Conect::conectar();

        $stmt=$pdo->prepare($sql);

        $stmt->bindParam(":nom",$datos["nombre"],PDO::PARAM_STR);

        $stmt->bindParam(":app",$datos["apellido"],PDO::PARAM_STR);

        $stmt->bindParam(":apm",$datos["apellidoMaterno"],PDO::PARAM_STR);

        $stmt->bindParam(":act",$datos["activo"],PDO::PARAM_INT);

        $stmt->bindParam(":dir",$datos["direccion"],PDO::PARAM_STR);

        $stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);

        $stmt->bindParam(":tok",$datos["token"],PDO::PARAM_STR);

        if($stmt->execute()){

            $token = md5($datos["nombre"]."+".$datos["fecha"]."+".$datos["direccion"]);

            $sql = "UPDATE cliente SET token=:tokN WHERE token=:tok";    
            
            $pdo=Conect::conectar();

            $stmt=$pdo->prepare($sql);
        
            $stmt->bindParam(":tokN",$token,PDO::PARAM_STR);

            $stmt->bindParam(":tok",$datos["token"],PDO::PARAM_STR);

            if($stmt->execute()){

                return "ok";

            }
        
        }

        else{

            return "error";

        }

        $stmt->close();

        $stmt=NULL;


    }

}