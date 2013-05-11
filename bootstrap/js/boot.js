$(function() {

    /*$("#message_error_registro").alert();
    // Ajax para enviar a newuser.php para registrar usuario
    $("#submit_registro").click(function() {
        if(($("#email1").val()!=""&&$("#email2").val()!="")) {
            if($("#email1").val()==$("#email2").val()) {
                $.ajax({
                    type:"post",
                    url: "controller/newuser.php",
                    dataType:"json",
                    data: {
                        usuario:$("#usuario").val(),
                        email:$("#email2").val(),
                        password:$("#password").val()
                    },
                    success: function( data ) {
                        console.log(data);
                        if(data.add) {
                            // Ok Reg
                        } else {
                            $("#message_error_registro").addClass("alert alert-error");
                            $("#message_error_registro").prepend("<h4>Warning!</h4>");
                            $("#message_error_registro").html(data.error);
                            $('#message_error_registro').fadeOut(6000, "linear");
                        }
                    }
                });
            } else {
                alert("No son iguales");
            }
        }
    });

    $("#submit_login").click(function() {
       if($("#user").val()!=""&&$("#pwd").val()!="") {
           $.ajax({
               type:"post",
               url: "controller/login.php",
               dataType:"json",
               data: {
                   usuario:$("#user").val(),
                   password:$("#pwd").val()
               },
               success: function( data ) {
                   console.log(data);
                   if(data.session) {
                       $(location).attr("href", "home/");
                   }
               }
           });
       }
    });

    $("#submit_agregar_usuario").click(function() {
        if($("#text_agregar_usuario").val()!="") {
            $.ajax({
                type:"post",
                url: "../controller/adduser.php",
                dataType:"json",
                data: {
                    usuario:$("#text_agregar_usuario").val()
                },
                success: function( data ) {
                    console.log(data);
                    if(data.add) {
                        $("#myModal").modal('hide');
                        $("#text_agregar_usuario").val("");
                    } else {
                        $("#message_error_registro").show();
                        $("#message_error_registro").addClass("alert alert-error");
                        $("#message_error_registro").html(data.error);
                        $('#message_error_registro').fadeOut(4000,function(){
                            $("#message_error_registro").empty();
                        });
                    }
                }
            });
        }
    });

    var user = {};

    $(".btn").click(function() {
        var msj;
        var $mensaje = $(this).prev();
        var $chat = $(this).parent().prev();
        if($mensaje.val()!="") {
            var mensaje = "["+$("#user_session").text()+"]: "+$mensaje.val();
            msj = $chat.val();
            msj = msj + mensaje+"\n";
            $chat.val(msj);
            save_msg(mensaje);
            $mensaje.val("");
        }
    });

    $('#chatt a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        user = {};
        user.contacto_id = $(this).attr("id");
        user.usuario = $(this).text();
        console.log(user);
    })

    function save_msg(message) {
        $.ajax({
            type:"post",
            url: "../controller/sendmsg.php",
            dataType:"json",
            data: {
                contacto_id:user.contacto_id,
                message:message
            },
            success: function( data ) {
                console.log(data);
            }
        });
    }


    $("#salir").click(function(){
        $(location).attr("href", "../");
    });
 */
});