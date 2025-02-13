/*$("#form_carrito").submit(function(event) {
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
});*/
   