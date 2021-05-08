$('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
});

document.addEventListener('DOMContentLoaded', function(){
    if(document.querySelector("#formLogin")){

    let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function(e) {
            e.preventDefault();

            let strEmail = document.querySelector('#txtEmail').value;
            let strPassword = document.querySelector('#txtPassword').value;

            if(strEmail == "" || strPassword == "")
            {
                swal("Por favor", "Escribe usuario y contraseña.", "error");
                return false;
            }else{
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            }   var ajaxUrl = base_url+'login/loginUser';
            var formData = new FormData(formLogin);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){

                if(request.readyState != 4) return;
                if(request.status == 200){
                    var objData= JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        switch (objData.msg){
                            case '1':
                                window.location = base_url+'administrador';
                                break;
                            case '3':
                                window.location = base_url+'tienda';
                                break;
                            default:
                                window.location = base_url+'tienda';
                                break;
                        }
                    }else{
                        swal("Atención", objData.msg, "error");
                        document.querySelector('#txtPassword').value = "";
                    }
                }else{
                    swal("Atención", "Error en el proceso","error");
                }

                return false;
             
            }
          }       
    }
}, false);