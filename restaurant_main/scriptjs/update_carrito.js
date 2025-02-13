    /*document.addEventListener('DOMContentLoaded', function () {
        const actualizarBotones = document.querySelectorAll('.actualizar-cantidad');
        
        actualizarBotones.forEach(function (boton) {
            boton.addEventListener('click', function () {
                const idCarrito = boton.getAttribute('data-idcarrito');
                const nuevaCantidad = document.querySelector('#product_cant_' + idCarrito).value;
                
                // Enviar la solicitud al servidor para actualizar la cantidad
                fetch('query/update_carrito.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'idCarrito=' + encodeURIComponent(idCarrito) + '&nuevaCantidad=' + encodeURIComponent(nuevaCantidad),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Éxito: muestra una notificación o realiza alguna otra acción
                        console.log(data.message);
                        
                        // Puedes recargar la página o actualizar la sección relevante
                        location.reload(); // Para recargar la página
                        // Aquí puedes agregar código para actualizar solo la sección relevante
                    } else {
                        // Error: muestra una notificación de error
                        console.error(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud:', error);
                });
            });
        });
    });*/