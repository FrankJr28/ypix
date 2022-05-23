<div class="d-flex">
    <?php
        $c = new ControladorCrud();
        $c->ctrObtenerClientes();
    ?>

    

</div>

<button type="button" class="btn btn-success col-3 align-self-end mt-4"  data-bs-toggle="modal" data-bs-target="#nuevoCliente">Agregar Cliente</button>

<!--                            MODAL CREAR                         --> 

<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered col-12" role="document">

        <form class="form-mod-mrg-strech modal-content" name="formularioNA" method="post" action="#">

            
                <div class="modal-header modal-head">
                    <div>
                        <i class="bi bi-person-plus-fill"></i>
                        Agregar un Cliente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-mod">
                        
                            <div class="row g-2 m-3">
                                <div class="col-6">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="nombrei">
                                </div>
                                <div class="col-6">
                                    <label>Paterno</label>
                                    <input type="text" class="form-control" name="apellidopi">
                                </div>
                                <div class="col-6">
                                    <label>Materno</label>
                                    <input type="text" class="form-control" name="apellidomi">
                                </div>
                            </div>
                            <div class="row g-2 m-3">
                                
                                <div class="col-12">
                                    <label >Direccion</label>
                                    <input type="text" class="form-control" name="direccioni">
                                </div>
                            </div>
                            <div class="row g-2 m-3">
                                <div class="col-6 col-sm-12">
                                    <label for="obs">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fechai">
                                </div>
                            </div>
                        
                    </div>
                </div><!-- Modal body-->

                <div class="modal-footer">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="mb-4 btn btn-secundary" type="reset" data-bs-dismiss="modal">Cancelar</button>
                        <button class="mb-4 btn btn-success" id="btn-editar" type="submit">Agregar</button>
                    </div>
                </div>

        </form>
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<!--                            FIN MODAL CREAR                         -->

<!--                            MODAL EDITAR                         --> 

<div class="modal fade" id="editarCliente" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered col-12" role="document">

        <form class="form-mod-mrg-strech modal-content" name="formularioNA" method="post" action="#">

            
                <div class="modal-header modal-head">
                    <div>
                        <i class="bi bi-person-plus-fill"></i>
                        Editar Cliente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-mod">
                        
                            <div class="row g-2 m-3">
                                <div class="col-6">
                                    <label>Id</label>
                                    <input type="number" id="idEditar" class="form-control" readonly="readonly" name="ide">
                                    <input type="hidden" id="tokenEditar" class="form-control" readonly="readonly" name="tokene">
                                </div>
                                <div class="col-6">
                                    <label>Nombre</label>
                                    <input type="text" id="nombreEditar" class="form-control" name="nombree">
                                </div>
                                <div class="col-6">
                                    <label>Paterno</label>
                                    <input type="text" id="apellidoPEditar" class="form-control" name="apellidope">
                                </div>
                                <div class="col-6">
                                    <label>Materno</label>
                                    <input type="text" id="apellidoMEditar" class="form-control" name="apellidome">
                                </div>
                            </div>
                            <div class="row g-2 m-3">
                                
                                <div class="col-12">
                                    <label >Direccion</label>
                                    <input type="text" id="direccionEditar" class="form-control" name="direccione">
                                </div>
                            </div>
                            <div class="row g-2 m-3">
                                <div class="col-6 col-sm-12">
                                    <label >Fecha de Nacimiento</label>
                                    <input type="date" id="fechaEditar" class="form-control" name="fechae">
                                </div>
                                <div class="col-6">
                                    <label >Activo</label>
                                    <input type="number" id="activoEditar" class="form-control" name="activoe">
                                </div>
                            </div>
                        
                    </div>
                </div><!-- Modal body-->

                <div class="modal-footer">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="mb-4 btn btn-secundary" type="reset" data-bs-dismiss="modal">Cancelar</button>
                        <button class="mb-4 btn btn-success" id="btn-editar" type="submit">Actualizar</button>
                    </div>
                </div>

        </form>
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<!--                            FIN MODAL EDITAR                         -->

<!---modal eliminar-->

<div class="modal" tabindex="-1" id="eliminarCliente">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form method="post" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <p id="idTextC"></p> 
                <input type="hidden" name="tokend" id="tokenEliminar"> 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>

        </form>
    </div>
  </div>
</div>

<!--fin modal eliminar-->

<?php

    $i=ControladorCrud::ctrInsertarCliente();
    if(is_numeric($i)){
        
        echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Éxito, cliente registrado con el id: ".$i."',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                });

                setTimeout(function(){
                    location.reload();
                },2000);  
            }
            
        </script>";

    }
    else{
        if($i){
            
            echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error ".$i."',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                });
  
            }
            
            </script>";
        
        }
        
    }

    $a=ControladorCrud::ctrActualizarCliente();
    if($a=="ok"){
        echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Información Actualizada Correctamente',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                });

                setTimeout(function(){
                    location.reload();
                },2000);  
            }
            
        </script>";
    }
    else{
        if($a){
            
            echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                });
  
            }
            
            </script>";
        
        }
    }

    $e=ControladorCrud::ctrEliminarCliente();
    if($e=="ok"){
        echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Información Eliminada Correctamente',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                });

                setTimeout(function(){
                    location.reload();
                },2000);  
            }
            
        </script>";
    }
    else{
        if($e){
            
            echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                });
  
            }
            
            </script>";
        
        }
    }

?>