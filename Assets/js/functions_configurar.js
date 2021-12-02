//Funcion para mostrar el listado de las configuracioens
let tableConfig;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    tableConfig = $('#tableConfig').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Configurar/getConfigurar",
            "dataSrc":""
        },
        "columns":[
            {"data":"idConfig"},
            {"data":"Descripcion"},
            {"data":"Valor"},
            {"data":"Comentario"},
            {"data":"options"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });


    //NUEVA CONFIGURACION
    let formConfigurar = document.querySelector("#formConfigurar");
    formConfigurar.onsubmit = function(e) {
        e.preventDefault();

        let intIdConfig = document.querySelector('#idConfig').value;
        let strDescripcion = document.querySelector('#txtDescripcion').value;
        let strValor = document.querySelector('#txtValor').value;
        let strComentario = document.querySelector('#txtComentario').value;        
        if(strDescripcion == '' || strValor == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        divLoading.style.display = "flex";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Configurar/setConfigurar'; //setConfigurar lo creamos en el controlador
        let formData = new FormData(formConfigurar);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){             
                let objData = JSON.parse(request.responseText);

                if(objData.status)
                {

                    if(rowTable == ""){
                        tableConfig.api().ajax.reload();//refresca f5 de la tabla principal
                    }else{
                        rowTable.cells[1].textContent = strDescripcion;
                        rowTable.cells[2].textContent = strValor;
                        rowTable.cells[3].textContent = strComentario;
                        rowTable = "";
                    }
              
                    $('#modalFormConfigurar').modal("hide");//ocultamos el modal
                    formConfigurar.reset();//resetemos el formulario
                    swal("Configuracion", objData.msg ,"success");//Mensaje Configuracion
                    
            
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            divLoading.style.display = "none";
            return false;
        }
    }

    }, false);


//funcion para visualizar los productos por boton
function fntViewInfo(idConfig){
    //let idConfig = idConfig;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/configurar/getConfig/'+idConfig;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#celId").innerHTML = objData.data.idConfig;
                document.querySelector("#celDescripcion").innerHTML = objData.data.Descripcion;
                document.querySelector("#celValor").innerHTML = objData.data.Valor;
                document.querySelector("#celComentario").innerHTML = objData.data.Comentario;
                $('#modalViewConfigurar').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntEditInfo(element,idConfig){
    rowTable = element.parentNode.parentNode.parentNode;//obtenemos el elemento padre
    document.querySelector('#titleModal').innerHTML ="Actualizar Configuracion";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Configurar/getConfig/'+idConfig;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idConfig").innerHTML = objData.data.idConfig;
                document.querySelector("#txtDescripcion").innerHTML = objData.data.Descripcion;
                document.querySelector("#txtValor").innerHTML = objData.data.Valor;
                document.querySelector("#txtComentario").innerHTML = objData.data.Comentario;
                $('#modalFormConfigurar').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelInfo(idConfig){
    swal({
        title: "Eliminar Configuracion",
        text: "¿Realmente quiere eliminar al categoría?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/configurar/delConfig';
            let strData = "idConfig="+idConfig;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableConfig.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });
}


function openModal()
{
    rowTable = "";
    document.querySelector('#idConfig').value ="";//llama al id formulario
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Configuracion";
    document.querySelector("#formConfigurar").reset();
    $('#modalFormConfigurar').modal('show');

}