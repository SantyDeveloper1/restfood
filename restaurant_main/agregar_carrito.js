$(document).ready(function() {
    $(".agregar-al-carrito").click(function() {
        var idProd = $(this).data("id");
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'El producto se agregará al carrito.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, agregar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía la solicitud al servidor para agregar el producto al carrito
                $.ajax({
                    type: 'POST',
                    url: 'agregar_al_carrito.php',
                    data: { id: idProd },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                // Recargar la página después del mensaje de éxito
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Error al agregar el producto al carrito.');
                    }
                });
            }
        });
    });
});