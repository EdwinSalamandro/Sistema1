var tableUsuarios;
document.addEventListener('DOMContentLoaded', function(){

    tableUsuarios = $('#tableUsuarios').dataTable({
    "aProcessing":true,
    "aServerSide":true,
    "language":{
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
},
"ajax":{
    "url": " "+base_url+"/Usuarios/getUsuarios",
    "dataSrc":""
},
        "columns":[
            {"data":"id_usuario"},
            {"data":"email"},
            {"data":"contraseña"},
            {"data":"tipoUsuario"},
            {"data":"status"},
            {"data":"options"}
    ],
    "resonsieve":"true",
    "bDestroy":true,
    "iDisplayLength":10,
    "order":[[0,"desc"]]
    });

    //NUEVO USUARIO
    
    var formUsuario = document.querySelector("#formUsuario");
    formUsuario.onsubmit = function(e) {
        e.preventDefault();

        var intIdusuario = document.querySelector('#idUsuario').value;
        var strNombre = document.querySelector('#txtEmail').value;
        var strContraseña = document.querySelector('#txtPassword').value;
        var strTipousuario = document.querySelector('#txtTipo').value;
        var intStatus = document.querySelector('#listStatus').value;
        if(intIdusuario == '' || strNombre == '' || strContraseña == '' || strTipousuario == '' || intStatus == '')
        {
            swal('Atención',"Todos los campos son obligatorios.", "error");
            return false;
        }
        //VERIFICA EL NAVEGADOR Y CREA UN ELEMENTO  
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Usuarios/setUsuario';
        var formData = new FormData(formUsuario);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormUsuario').modal("hide");
                    formUsuario.reset();
                    swal("Usuarios", objData.msg,"success");
                    tableUsuarios.api().ajax.reload(function(){  
                        fntEditUsuario();
                    });
              }else{
                    swal("Error", objData.msg ,"error");
                    
                }
            }
        }
    }
});

$('#tableUsuarios').DataTable();

function openModal()
{
    document.querySelector('#idUsuario').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formUsuario').reset();
    $('#modalFormUsuario').modal('show');
}
window.addEventListener("load", function() {
    setTimeout(() => { 
        fntEditUsuario();
        fntDelUsuario();
    }, 500);
  }, false);

function fntEditUsuario(){
    var btnEditUsuario = document.querySelectorAll(".btnEditUsuario");
    btnEditUsuario.forEach(function(btnEditUsuario) {
        btnEditUsuario.addEventListener('click', function(){

            document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary","btn-info");
            document.querySelector('#btnText').innerHTML ="Actualizar";

            var id_usuario = this.getAttribute("rl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'Usuarios/getUsuario/'+id_usuario;
            request.open("GET",ajaxUrl ,true);
            request.send();
            
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){

                    var objData = JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        document.querySelector("#idUsuario").value = objData.data.id_usuario;
                        document.querySelector("#txtEmail").value = objData.data.email;
                        document.querySelector("#txtPassword").value = objData.data.contraseña;
                        document.querySelector("#txtTipo").value = objData.data.tipoUsuario;

                        if(objData.data.status == 1)
                        {
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        }else{
                            var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                        }

                        var htmlSelect ='${optionSelect}<option value="1">Activo</option><option value="2">Inactivo</option>';
                        document.querySelector("#listStatus").innerHTML = htmlSelect;
                        $('modalFormUsuario').modal('show');
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
            }

            $('#modalFormUsuario').modal('show');
        });
    });
}
function fntDelUsuario(){
    var btnDelUsuario = document.querySelectorAll(".btnDelUsuario");
    btnDelUsuario.forEach(function(btnDelUsuario){
        btnDelUsuario.addEventListener('click', function(){
            var id_usuario = this.getAttribute("rl");
            
            swal({
                title: "Eliminar Usuario",
                text: "¿Realmente quiere eliminar el Usuario?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText:"Si, eliminar!",
                cancelButtonText:"No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            },function(isConfirm){

                if (isConfirm)
                {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url+'/Usuarios/delUsuario';
                    var strData = "id_usuario="+id_usuario;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg, "success");
                                tableUsuarios.api().ajax.reload(function(){
                                    fntEditUsuario();
                                    fntDelUsuario();
                                });
                            }else{
                                swal("Atención!", objData.msg, "error");
                            }
                        }
                    }
                }
            });
        });
    });
}