$(".bi-pencil-square").click((e) => {
    cliente = e.currentTarget;
    $("#idEditar").val(cliente.dataset.id);
    $("#nombreEditar").val(cliente.dataset.nombre);
    $("#apellidoPEditar").val(cliente.dataset.apellidop);
    $("#apellidoMEditar").val("materno");
    $("#direccionEditar").val(cliente.dataset.direccion);
    $("#fechaEditar").val(cliente.dataset.fecha);
    $("#activoEditar").val(cliente.dataset.activo);
    $("#tokenEditar").val(cliente.dataset.token);
});

$(".bi-trash").click((e) => {
    cliente = e.currentTarget;
    $("#idTextC").text("¿Desea eliminar el cliente con el id: " + cliente.dataset.id);
    $("#tokenEliminar").val(cliente.dataset.token);
});


$('#tablacrud').DataTable();