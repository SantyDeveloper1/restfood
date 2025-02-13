$("#form_perfil").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_perfil")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/perfil_update.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_perfil').html("Enviando datos");
        },
        success:function(datos){
            $('#div_perfil').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_perfil').html(datos);
                setTimeout("jQuery('#div_perfil').hide();",4000); 
            }else{
                $('#div_perfil').html(datos);
                setTimeout("jQuery('#div_perfil').hide();",6000); 
            }
        }
    });
})

$("#form_estado").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_perfil")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/ver_estado.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_perfil').html("Enviando datos");
        },
        success:function(datos){
            $('#div_perfil').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_perfil').html(datos);
                setTimeout("jQuery('#div_perfil').hide();",4000); 
            }else{
                $('#div_perfil').html(datos);
                setTimeout("jQuery('#div_perfil').hide();",6000); 
            }
        }
    });
})



$(document).ready(function () {
    $('#modal_carrito form').submit(function (event) {
        event.preventDefault();
        
        const form = $(this);
        
        const formData = form.serialize();
        
        $.ajax({
            type: 'POST',
            url: 'query/actualizar_carrito.php', // Cambia esto a la ubicación correcta de tu archivo PHP
            data: formData,
            success: function (response) {
                $('#div_carrito').html(response);
                
                // Desaparece el mensaje de respuesta después de 3 segundos
                setTimeout(function () {
                    $('#div_carrito').empty(); // Borra el contenido del div
                }, 3000); // 3000 milisegundos = 3 segundos
            },
            error: function () {
                alert('Error al actualizar la cantidad en el carrito.');
            }
        });
    });
});



//actualizar carrito
document.addEventListener('DOMContentLoaded', function () {
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
});

//para agregar producto al carrtio details.php
$("#form_carrito").submit(function(event) {
    event.preventDefault();
    var formData = new FormData($("#form_carrito")[0]);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: formData,
        url: "query/register_carrito.php",
        contentType: false,
        processData: false,
        beforeSend: function(objeto) {
            $('#div_car').html("Enviando datos al carrito");
        },
        success: function(response) {
            $('#div_car').show();

            if (response.success) {
                $('#div_car').html('<div class="alert alert-success" role="alert">' + response.message + '</div>');
                setTimeout(function() {
                    $('#div_car').hide();
                    location.reload(); // Recargar la página
                }, 6000);
                $("#form_carrito")[0].reset();
            } else {
                $('#div_car').html('<div class="alert alert-danger" role="alert">' + response.message + '</div>');
                setTimeout(function() {
                    $('#div_car').hide();
                }, 4000);
            }
        }
    });
});

//  Eliminar pedido del carrito
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
});