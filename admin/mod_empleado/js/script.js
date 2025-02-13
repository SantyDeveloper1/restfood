function usuarios(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/usuarios_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".outer_div_usuarios").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}
function productos(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/productos_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".outer_div_productos").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}
function clientes(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/clientes_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".outer_div_clientes").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}
function empleados(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/empleados_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".outer_div_empleados").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}

function categorias(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/categorias_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".outer_div_categorias").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}
function pedidos(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/pedidos_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".outer_div_pedidos").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}
function detalles(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/detalles_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".outer_div_detalle").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}

$("#form_password").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_password")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/password_update.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_pass').html("Enviando datos");
        },
        success:function(datos){
            $('#div_pass').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_pass').html(datos);
                setTimeout("jQuery('#div_pass').hide();",4000); 
            }else{
                $('#div_pass').html(datos);
                setTimeout("jQuery('#div_pass').hide();",6000); 
            }
        }
    });
})

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

$("#form_Inser_producto").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_Inser_producto")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/productos_insert.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_insert_producto').html("Enviando datos");
        },
        success:function(datos){
            $('#div_insert_producto').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_insert_producto').html(datos);
                setTimeout("jQuery('#div_insert_producto').hide();",4000); 
            }else{
                $('#div_insert_producto').html(datos);
                setTimeout("jQuery('#div_insert_producto').hide();",6000); 
                productos(1);
                $("#form_Inser_producto")[0].reset();
            }
        }
    });
})


//**************Productos */
$('#modal-UpdateProducto').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    var descripcion=button.data('descripcion')
    var precio=button.data('precio')
    var stock=button.data('stock')
    var stock_minimo=button.data('stock_minimo')
    var imagen1=button.data('imagen1')
    var est=button.data('est')
    var modal= $(this)
    modal.find('.modal-title').text('Actualizar datos de '+nom)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #nom').val(nom)
    modal.find('.modal-body #descripcion').val(descripcion)
    modal.find('.modal-body #precio').val(precio)
    modal.find('.modal-body #stock').val(stock)
    modal.find('.modal-body #stock_minimo').val(stock_minimo)
    modal.find('.modal-body #imagen1').val(imagen1)
    if (est == 0) {
        modal.find('.modal-body #est').prop('checked', false); // Estado inactivo (no marcado)
    } else {
        modal.find('.modal-body #est').prop('checked', true);  // Estado activo (marcado)
    }
})

$("#form_Upd_Producto").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_Upd_Producto")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/producto_update.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_update_producto').html("Enviando datos");
        },
        success:function(datos){
            $('#div_update_producto').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_update_producto').html(datos);
                setTimeout("jQuery('#div_update_producto').hide();",4000); 
            }else{
                $('#div_update_producto').html(datos);
                setTimeout("jQuery('#div_update_producto').hide();",6000); 
                productos(1);                
            }
        }
    });
})
$('#modal-DeleteProducto').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    
    var modal= $(this)
    modal.find('.modal-title').text('Eliminar datos de '+nom)
    modal.find('.modal-body #id').val(id)
})
$("#form_del_producto").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_del_producto")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/producto_delete.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_del_producto').html("Enviando datos");
        },
        success:function(datos){
            $('#div_del_producto').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_del_producto').html(datos);
                setTimeout("jQuery('#div_del_producto').hide();",4000); 
            }else{
                $('#div_del_producto').html(datos);
                setTimeout("jQuery('#div_del_producto').hide();",6000); 
                productos(1);                
            }
        }
    });
})
//**************Categorias */
$('#modal-UpdateCategoria').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    var modal= $(this)
    modal.find('.modal-title').text('Actualizar datos de '+nom)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #nom').val(nom)
})

$("#form_Upd_categ").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_Upd_categ")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/categoria_update.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_upd_categ').html("Enviando datos");
        },
        success:function(datos){
            $('#div_upd_categ').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_upd_categ').html(datos);
                setTimeout("jQuery('#div_upd_categ').hide();",4000); 
            }else{
                $('#div_upd_categ').html(datos);
                setTimeout("jQuery('#div_upd_categ').hide();",6000); 
                categorias(1);                
            }
        }
    });
})
//*********pedidos******** */

$('#modal-EstadoPedido').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    var est=button.data('est')
    var modal= $(this)
    modal.find('.modal-title').text('Cambiar estado de su pedido de: '+nom)
    modal.find('.modal-body #id').val(id)
    if (est == 1) {
        modal.find('.modal-body #confirmar').prop('checked', true);
    } else if (est == 2) {
        modal.find('.modal-body #proceso').prop('checked', true);
    } else if (est == 3) {
        modal.find('.modal-body #entregado').prop('checked', true);
    }
})

$("#form_est_Pedido").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_est_Pedido")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/pedido_estado.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_est_pedido').html("Enviando datos");
        },
        success:function(datos){
            $('#div_est_pedido').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_est_pedido').html(datos);
                setTimeout("jQuery('#div_est_pedido').hide();",4000); 
            }else{
                $('#div_est_pedido').html(datos);
                setTimeout("jQuery('#div_est_pedido').hide();",6000); 
                pedidos(1);                
            }
        }
    });
})
$('#modal-DeletePedido').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    var modal= $(this)
    modal.find('.modal-title').text('Eliminar Pedido de '+nom)
    modal.find('.modal-body #id').val(id)
})

$("#form_del_pedido").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_del_pedido")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/pedido_delete.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_del_pedido').html("Enviando datos");
        },
        success:function(datos){
            $('#div_del_pedido').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_del_pedido').html(datos);
                setTimeout("jQuery('#div_del_pedido').hide();",4000); 
            }else{
                $('#div_del_pedido').html(datos);
                setTimeout("jQuery('#div_del_pedido').hide();",6000); 
                pedidos(1);                
            }
        }
    });
})