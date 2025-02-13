/*$(document).ready(function () {
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
*/