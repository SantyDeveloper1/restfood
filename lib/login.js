$("#login_php").submit(function (event) {
    event.preventDefault();

    // Verificar geolocalización
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function (position) {
            // El usuario permitió la geolocalización
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Agregar la ubicación al formulario antes de enviarlo
            $("#login_php").append('<input type="hidden" name="latitude" value="' + latitude + '">');
            $("#login_php").append('<input type="hidden" name="longitude" value="' + longitude + '">');

            // Enviar el formulario con la ubicación al servidor
            submitForm();
        }, function (error) {
            if (error.code === error.PERMISSION_DENIED) {
                // El usuario denegó los permisos de geolocalización
                alert("Debes habilitar la geolocalización para iniciar sesión.");
            } else {
                // Ocurrió un error al obtener la ubicación
                alert("Error al obtener la ubicación: " + error.message);
            }
        });
    } else {
        // El navegador no admite geolocalización
        alert("Tu navegador no admite geolocalización.");

        // No se agrega la ubicación al formulario y se envía sin ubicación
        submitForm();
    }
});

function submitForm() {
    // Enviar el formulario sin la ubicación
    $.ajax({
        type: 'POST',
        datatype: 'json',
        data: new FormData($("#login_php")[0]),
        url: "lib/PHP_login.php",
        contentType: false,
        processData: false,
        beforeSend: function (objeto) {
            $('#div_login').html("Enviando datos del login");
        },
        success: function (datos) {
            $('#div_login').show();
            $('#div_login').html(datos);
            setTimeout("jQuery('#div_login').hide();", 6000);
            //$("#login_php")[0].reset();
        }
    });
}
$(document).ready(function() {
    $('#login_pass').submit(function(event) {
        console.log("Formulario enviado"); // Agrega esta línea para verificar si la función se está ejecutando
        event.preventDefault(); // Evitar el envío convencional del formulario

        // Enviar el formulario sin la ubicación
        $.ajax({
            type: 'POST',
            datatype: 'json',
            data: new FormData($(this)[0]), // Utilizar el formulario actual
            url: "lib/password_reset.php",
            contentType: false,
            processData: false,
            beforeSend: function (objeto) {
                $('#div_pass').html("Enviando datos del pass");
            },
            success: function (datos) {
                $('#div_pass').show();
                $('#div_pass').html(datos);
                setTimeout(function() {
                    $('#div_pass').hide();
                }, 6000);
            }
        });
    });
});
$("#login_newpass").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#login_newpass")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"lib/recuperar_password.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_newpass').html("Enviando datos del login");
        },
        success:function(datos){
            $('#div_newpass').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_newpass').html(datos);
                setTimeout("jQuery('#div_newpass').hide();",4000); 
            }else{
                $('#div_newpass').html(datos);
                setTimeout("jQuery('#div_newpass').hide();",6000); 
                $("#login_newpass")[0].reset();
            }
        }
    });
})