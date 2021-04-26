var tableClientes;
document.addEventListener('DOMContentLoaded', function(){

    tableClientes = $('#tableClientes').dataTable({
    "aProcessing":true,
    "aServerSide":true,
    "language":{
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
},
"ajax":{
    "url": " "+base_url+"/Clientes/getClientes",
    "dataSrc":""
},
        "columns":[
            {"data":"id_cliente"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"fecha_nacimiento"},
            {"data":"email"},
            {"data":"direccion"},
            {"data":"telefono"},
            {"data":"status"},
            {"data":"id_usuario"},
            {"data":"options"}
    ],
    "resonsieve":"true",
    "bDestroy":true,
    "iDisplayLength":10,
    "order":[[0,"desc"]]
    });

    //NUEVO ROL
    
    var formCliente = document.querySelector("#formCliente");
    formCliente.onsubmit = function(e) {
        e.preventDefault();


        var intIdRol = document.querySelector('#idCliente').value;


        var strNombre = document.querySelector('#txtNombre').value;
        var strApellidos = document.querySelector('#txtApellido').value;
        var strFechanacimiento = document.querySelector('#txtFecha').value;
        var strEmail = document.querySelector('#txtEmail').value;
        var strDireccion = document.querySelector('#txtDireccion').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var intStatus = document.querySelector('#listStatus').value;
        var intIdusuario = document.querySelector('#idUsuario').value;
        if(strNombre == '' || strApellidos == '' || strFechanacimiento == '' || strEmail == '' || strDireccion == '' || strTelefono == '' || intStatus == '' || intIdusuario == '' )
        {
            swal('Atención',"Todos los campos son obligatorios.", "error");
            return false;
        }
        //VERIFICA EL NAVEGADOR Y CREA UN ELEMENTO  
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Clientes/setCliente';
        var formData = new FormData(formCliente);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormCliente').modal("hide");
                    formCliente.reset();
                    swal("Clientes", objData.msg,"success");
                    tableClientes.api().ajax.reload(function(){  
                        fntEditCliente();
                    });
              }else{
                    swal("Error", objData.msg ,"error");
                    
                }
            }
        }
    }
});

$('#tableClientes').DataTable();

function openModal(){
    document.querySelector('#idCliente').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Cliente";
    document.querySelector('#formCliente').reset();
    $('#modalFormCliente').modal('show');
}
window.addEventListener("load", function() {
    setTimeout(() => { 
        fntEditCliente();
        fntDelCliente();
    }, 500);
  }, false);

function fntEditCliente(){
    var btnEditCliente = document.querySelectorAll(".btnEditCliente");
    btnEditCliente.forEach(function(btnEditCliente) {
        btnEditCliente.addEventListener('click', function(){

            document.querySelector('#titleModal').innerHTML = "Actualizar Cliente";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary","btn-info");
            document.querySelector('#btnText').innerHTML ="Actualizar";

            var id_cliente = this.getAttribute("rl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'Clientes/getCliente/'+id_cliente;
            request.open("GET",ajaxUrl ,true);
            request.send();
            
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){

                    var objData = JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        document.querySelector("#idCliente").value = objData.data.id_cliente;
                        document.querySelector("#txtNombre").value = objData.data.nombres;
                        document.querySelector("#txtApellido").value = objData.data.apellidos;
                        document.querySelector("#txtFecha").value = objData.data.fecha_nacimiento;
                        document.querySelector("#txtEmail").value = objData.data.email;
                        document.querySelector("#txtDireccion").value = objData.data.direccion;
                        document.querySelector("#txtTelefono").value = objData.data.telefono;

                        if(objData.data.status == 1)
                        {
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        }else{
                            var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                        }

                        document.querySelector("#idUsuario").value = objData.data.id_usuario;

                        var htmlSelect ='${optionSelect}<option value="1">Activo</option><option value="2">Inactivo</option>';
                        document.querySelector("#listStatus").innerHTML = htmlSelect;
                        $('modalFormCliente').modal('show');
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
            }

            $('#modalFormCliente').modal('show');
        });
    });
}
function fntDelCliente(){
    var btnDelCliente = document.querySelectorAll(".btnDelCliente");
    btnDelCliente.forEach(function(btnDelCliente){
        btnDelCliente.addEventListener('click', function(){
            var id_cliente = this.getAttribute("rl");
            
            swal({
                title: "Eliminar Cliente",
                text: "¿Realmente quiere eliminar el Cliente?",
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
                    var ajaxUrl = base_url+'/Clientes/delCliente';
                    var strData = "id_cliente="+id_cliente;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg, "success");
                                tableClientes.api().ajax.reload(function(){
                                    fntEditCliente();
                                    fntDelCliente();
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