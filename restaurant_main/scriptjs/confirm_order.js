/*$(document).ready(function () {
    $("form[name='order_form']").submit(function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirmar orden',
            text: '¿Estás seguro de confirmar la orden?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario y procesar la orden
                $.ajax({
                    type: "POST",
                    url: "order_carrito.php", // Ruta al archivo PHP de procesamiento
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === "success") {
                            Swal.fire('¡Pedido confirmado!', 'Su pedido ha sido procesado.', 'success')
                                .then(() => window.location.reload());
                        } else {
                            Swal.fire('Error', 'Ha ocurrido un error al procesar el pedido.', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Ha ocurrido un error al procesar el pedido.', 'error');
                    }
                });
            }
        });
    });
});*/
