/*
$(document).ready(function () {
    // Manejar clic en el botón de eliminar producto
    $(".delete-product-btn").click(function () {
        var idCarrito = $(this).data("idcarrito");

        // Enviar solicitud para eliminar el producto
        $.ajax({
            type: "POST",
            url: "query/delete_producto.php", // Cambia esto a la ubicación correcta
            data: { idCarrito: idCarrito },
            success: function (response) {
                // Actualizar la página o hacer otras acciones necesarias
                location.reload();
            },
            error: function () {
                alert("Error al eliminar el producto.");
            }
        });
    });
});*/
