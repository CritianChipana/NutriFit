$(document).ready(function () {
    $("#loginForm").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function(){
                $("#loginForm button[type=submit]").html("enviando...");
                $("#loginForm button[type=submit]").attr("disabled","disabled");
            },
            afterSend: window.setInterval (function(){
                $("#loginForm button[type=submit").text("Log In");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }, 2500),
            success: function (response) {
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario encontrado, redireccionando...",
                        callback: function() {
                            window.location.href = "admin.php";
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "Usuario o Password incorrecto",
                        closeConfirm: true
                    });
                }
                /*$("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");*/
            },
            error: function(){
                $("body").overhang({
                    type: "error",
                    message: "Usuario o Password incorrecto",
                    closeConfirm: true
                });
              /*  $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");*/
            }
        });

        return false;
    });
});