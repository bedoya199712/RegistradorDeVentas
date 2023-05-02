
$("#formulario_venta").submit(function(event) {
        event.preventDefault();
        crearVenta();
    });

function crearVenta(){
    
        var nombreVideojuego = document.getElementById("videojuego").value;
        var valorVideojuego = document.getElementById("valor").value;

        if (nombreVideojuego.length != 0 && valorVideojuego.length != 0) {
            $.ajax({
                url: "http://localhost/videojuegos",
                type: "POST",
                data: JSON.stringify({
                    console: nombreVideojuego,
                    valor: valorVideojuego
                }),
                contentType: 'application/json; charset=utf-8',
                
                success: function (data) { 
                    alert(JSON.stringify(data));
                },
                error: function (data){
                    alert(data.responseText);
                }
            });
        }else{
            alert('Debe llenar los campos');
        }

}
