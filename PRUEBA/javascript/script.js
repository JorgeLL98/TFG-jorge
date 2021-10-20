
/*function hazAjax(url) {
    return new Promise(function (exito) {
        let r = new XMLHttpRequest()
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                exito(this)
            }
        }
        r.open("GET", url)
        r.send()
    })
}



window.addEventListener("load", function () {
    let req = hazAjax("conexion.php")
    req.then(function (respuesta) {
        console.log("Repuesta recibida: " + respuesta.responseText)
    })
})*/

function ver() {
    document.getElementById("opcionesMenu").style.display = "block"
}

function ocultar() {
    document.getElementById("opcionesMenu").style.display = "none"
}