
function openModal()
{
	$('modalFormUsuario').modal('show');


function openModal()
{
	document.querySelector('idUsuario').value ="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
	document.querySelector('#btnActionFore').classList.replace("btn-info", "btn-primary");
	document.querySelector('#btnText').innerHTML ="Guardar";
	document.querySelector('#titleModal').innerHTML ="Nuevo Usuario";
	document.querySelector('#formUsuario').reset();
	$('#modalFormUsuario').modal('show');
}