<?php
class ControladorCrud{
    public function ctrObtenerClientes(){
        $datos = ModeloCrud::mdlObtenerClientes();
        $info = "";
        if($datos){
            $info='<table class="table table-striped" id="tablacrud">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Paterno</th>
                    <th>Materno</th>
                    <th>Direccion</th>
                    <th>Nacimiento</th>
                    <th>Activo</hh>
                    <th>Acciones</th>
                </thead>
                <tbody>';
            foreach($datos as $campo){
                $info.= "<tr>
                            <td>".$campo["id"]."</td>
                            <td>".$campo["nombre"]."</td>
                            <td>".$campo["apellido"]."</td>
                            <td>".$campo["apellidoM"]."</td>
                            <td>".$campo["direccion"]."</td>
                            <td>".date('d-m-Y',strtotime($campo["fecha_edad"]))."</td>
                            <td>".$campo["activo"]."</td>
                            <td class='d-flex justify-content-around'>
                                
                                <i class='bi bi-pencil-square' data-bs-toggle='modal' data-bs-target='#editarCliente' 
                                data-id='".$campo["id"]."' data-nombre='".$campo["nombre"]."' data-apellidoP='".$campo["apellido"]."'
                                data-apellidoM='".$campo["apellidoM"]."'data-direccion='".$campo["direccion"]."'data-fecha='".date('Y-m-d',strtotime($campo["fecha_edad"]))."'
                                data-activo='".$campo["activo"]."'data-token='".$campo["token"]."'></i>

                                <i class='bi bi-trash' data-token='".$campo["token"]."' data-id='".$campo["id"]."' data-bs-toggle='modal' data-bs-target='#eliminarCliente'></i>
                            </td>
                        </tr>";
            }
            $info.= "</tbody>
            </table>";
        }
        else{
            $info="<div class='col-10 bg-secundary'>No hay registros</div>";
        }
        echo $info;
    }

    static public function ctrInsertarCliente(){

        if(isset($_POST["nombrei"])){

                $fechaValida= '~(19|20)\d\d[-/.](0[1-9]|[12][0-9]|3[01])[-/.](0[1-9]|1[012])~';
                $nomappValidos = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$~';
                $direccionValida = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\.\#\d\s]+$~';
                
                if(preg_match($nomappValidos,$_POST["nombrei"]) &&
                preg_match($nomappValidos,$_POST["apellidopi"]) &&
                preg_match($nomappValidos,$_POST["apellidomi"]) &&
                preg_match($fechaValida,$_POST["fechai"]) &&
                preg_match($direccionValida,$_POST["direccioni"])){

                    $token = md5($_POST["nombrei"]."+".$_POST["fechai"]."+".$_POST["direccioni"]);

                    $datos=array(
                                'token' => $token,
                                'nombre' => $_POST["nombrei"],
                                'apellido' => $_POST["apellidopi"],
                                'apellidoMaterno' => $_POST["apellidomi"],
                                'direccion' => $_POST["direccioni"],
                                'fecha' => $_POST["fechai"]);
                                
                    $respuesta = ModeloCrud::mdlInsertarCliente($datos);            
                    
                    return $respuesta;

                }
                else{
                    return "caracteres no validos";
                }

        }

    }

    static public function ctrObtenerCliente($token){

        $tokenValido = '~^[a-zA-Z\d\s]+$~';
        
        if(preg_match($tokenValido,$token)){
            
            $respuesta = ModeloCrud::mdlObtenerCliente($token);            
            
            return $respuesta;

        }
        else{
            return "error expresion";
        }

    }

    static public function ctrEliminarCliente(){

        if(isset($_POST["tokend"])){

                $tokenValido = '~^[a-zA-Z\d\s]+$~';
                
                
                if(preg_match($tokenValido,$_POST["tokend"])){
                                
                    $respuesta = ModeloCrud::mdlObtenerCliente($_POST["tokend"]);
                    
                    if($respuesta){
                        if($respuesta[0]["token"]==$_POST["tokend"]){

                            $respuesta = ModeloCrud::mdlEliminarCliente($_POST["tokend"]);

                        }else{

                            $respuesta="error";

                        }
                    }else{
                        return "error";
                    }

                    return $respuesta;

                }
                else{
                    return "error";
                }

        }

    }

    static public function ctrActualizarCliente(){

        if(isset($_POST["nombree"])){

                $tokenValido = '~^[a-zA-Z\d\s]+$~';
                $fechaValida= '~(19|20)\d\d[-/.](0[1-9]|[12][0-9]|3[01])[-/.](0[1-9]|1[012])~';
                $nomappValidos = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$~';
                $direccionValida = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\.\#\d\s]+$~';
                $actvalido = '~^[1|0]+$~';
                
                if(preg_match($nomappValidos,$_POST["nombree"]) &&
                preg_match($nomappValidos,$_POST["apellidope"]) &&
                preg_match($nomappValidos,$_POST["apellidome"]) &&
                preg_match($fechaValida,$_POST["fechae"]) &&
                preg_match($direccionValida,$_POST["direccione"]) &&
                preg_match($actvalido,$_POST["activoe"])){

                    $datos=array(
                                'token' => $_POST["tokene"],
                                'activo' => $_POST["activoe"],
                                'nombre' => $_POST["nombree"],
                                'apellido' => $_POST["apellidope"],
                                'apellidoMaterno' => $_POST["apellidome"],
                                'direccion' => $_POST["direccione"],
                                'fecha' => $_POST["fechae"]);
                                
                    $respuesta = ModeloCrud::mdlObtenerCliente($_POST["tokene"]);
                    
                    if($respuesta){
                        if($respuesta[0]["token"]==$_POST["tokene"]){

                            $respuesta = ModeloCrud::mdlActualizarCliente($datos);

                        }else{

                            $respuesta="errorT";

                        }
                    }else{
                        return "error";
                    }
                    
                    return $respuesta;

                }
                else{
                    return "error";
                }

        }

    }



}