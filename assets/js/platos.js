let categorias = 1;
//funcion para recuperar el json de la tabla platos
function listar(cat) {
    var token = $("#token").val();
    $.ajax({
        data: { token: token, cat: cat },
        type: "POST",
        url: "../backend/listarPlatos.php",
        success: function (data) {
            document.getElementById('platos').innerHTML = data;
        },
    });
}

listar(1);


function buscar_ahora(buscar) {
    // Obtener el término de búsqueda
    busca = buscar.toLowerCase();
    // Obtener la lista de nombres
    var con = document.getElementsByClassName('lp');
    var nombres = document.getElementsByClassName('lblPlato');

    // Iterar sobre la lista de nombres y mostrar/ocultar según la coincidencia con el término de búsqueda
    for (var i = 0; i < nombres.length; i++) {
        var nombre = nombres[i].innerText.toLowerCase();
        var mostrar = nombre.includes(busca);
        con[i].style.display = mostrar ? 'block' : 'none';
    }
}

document.getElementById("btnD").addEventListener("click", function () {
    listar(1);
});

document.getElementById("btnA").addEventListener("click", function () {
    listar(2);
});

document.getElementById("btnS").addEventListener("click", function () {
    listar(3);
});

document.getElementById("btnJ").addEventListener("click", function () {
    listar(4);
});

document.getElementById("btnB").addEventListener("click", function () {
    listar(5);
});

document.getElementById("btnE").addEventListener("click", function () {
    listar(6);
});


//funcion para listar la cookie
function listar_cookie() {
    var token = $("#token").val();
    $.ajax({
        data: { token: token },
        type: "POST",
        url: "../backend/listarCarrito.php",
        success: function (data) {
            document.getElementById('carrito').innerHTML = data;
        },
    });
}

listar_cookie();

//agragar a carrito
function agregar(id,precio,nombre) {
    var token = $("#token").val();
    $.ajax({
        data: { token: token, id: id, precio: precio, nombre: nombre },
        type: "POST",
        url: "../backend/agregarCarrito.php",
        success: function (data) {
            document.getElementById("cuerpo-noti").innerHTML = data;
            $("#noti").modal("show");
            listar_cookie();
        },
    });
}

//separar datos del split
function mandar_agregar(datos){
    var datos = datos.split("||");
    var id = datos[0];
    var precio = datos[1];
    var nombre = datos[2];

    agregar(id,precio,nombre)
}

//eliminar del carrito
function eliminar(id) {
    $("#meliminar").modal("show");
    //poner un boton en el modal que ejecute la funcion mandar_php
    $("#btnEliminarNoti").click(function () {
        eliminacion(id);
    });
}

function eliminacion(id) {
    var token = $("#token").val();
    $.ajax({
        data: { token: token, id: id },
        type: "POST",
        url: "../backend/eliminarProducto.php",
        success: function (data) {
            document.getElementById("cuerpo-noti").innerHTML = data;
            $("#noti").modal("show");
            listar_cookie();
        },
    });
}

//aumentar cantidad
function aumentar(id) {
    var token = $("#token").val();
    $.ajax({
        data: { token: token, id: id},
        type: "POST",
        url: "../backend/aumentarCarrito.php",
        success: function (data) {
            document.getElementById("cuerpo-noti").innerHTML = data;
            $("#noti").modal("show");
            listar_cookie();
        },
    });
}

//disminuir cantidad
function disminuir(id) {
    var token = $("#token").val();
    $.ajax({
        data: { token: token, id: id},
        type: "POST",
        url: "../backend/disminuirCarrito.php",
        success: function (data) {
            document.getElementById("cuerpo-noti").innerHTML = data;
            $("#noti").modal("show");
            listar_cookie();
        },
    });
}

//funcion para registrar
function pagar(total) {
    var token = $("#token").val();
    $.ajax({
        data: { token: token, total: total},
        type: "POST",
        url: "../backend/guardarCarrito.php",
        success: function (data) {
            document.getElementById("cuerpo-noti").innerHTML = data;
            $("#noti").modal("show");
            listar_cookie();
        },
    });
}