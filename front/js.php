<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>


<script>


    //Llamdo de la duncionalidad inicial y lectura del archivo 
    function firstFunction(){
        $.ajax({
            url:'front/login.php',
            type:"POST",
            success:function(respuesta){
                $("#respDiv").html(respuesta);
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Algo anda mal'+ textStatus); console.log(XMLHttpRequest);
            }
        })
    }
    //validar Login en front
    function validarLogin(){
        const usr = $('#usr').val();
        const pw = $('#pw').val();

        if(usr.length === 0 ){
            new Noty({
                text: '<b>El campo Email es requerido y debe de ser un correo electronico</b>',
                type: 'error',
                layout: 'topRight',
                theme: 'bootstrap-v4',
                killer:true,
                progressBar:true,
                timeout:4000
            }).show();
            return;
        } 
        if(pw.length === 0 ){
            new Noty({
                text: '<b>El campo Password es requerido y debe de ser un correo electronico</b>',
                type: 'error',
                layout: 'topRight',
                theme: 'bootstrap-v4',
                killer:true,
                progressBar:true,
                timeout:4000
            }).show();
            return;
        } 
        verificarLoginDb(usr,pw);
    }
    //Validar Datos Ingresados Base de Datos
    function verificarLoginDb(usr,pw){
        $.ajax({
            url:'back/validarLoginUser.php',
            type:"POST",
            data: {usr:usr,pw:pw},
            success:function(r){
                if(r === 0){
                    new Noty({
                        text: '<b>Los datos ingresados son incorrectos por favor verifiquelos</b>',
                        type: 'error',
                        layout: 'topRight',
                        theme: 'bootstrap-v4',
                        killer:true,
                        progressBar:true,
                        timeout:4000
                    }).show();
                    
                }else{
                    llamarMenu();
                }
            },
        })
    }
    //Llamado del menu de la aplicacion
    function llamarMenu(){
        $.ajax({
            url:'front/menu.php',
            type:"POST",
            success:function(respuesta){
                $("#respDiv").html(respuesta);
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Algo anda mal'+ textStatus); console.log(XMLHttpRequest);
            }
        })
    }
    //eliminar item de la Base de Datos
    function deleteItem(item){
        $.ajax({
            url:'back/deleteItem.php',
            type:"POST",
            data: {item:item},
            success:function(){
                llamarMenu(); 
            },
        })
    }
    //Apertura del modal para editar item
    function modItem(id,nombre,desc){
        $.ajax({
            url:'front/modalModItem.php',
            type:"POST",
            data: {id:id,nombre:nombre,desc:desc},
            success:function(respuesta){
                $("#respuestaModal").html(respuesta);
            },
        })
    }
    //Registrar modificaion
    function registroModificacion(){
        const nombre = $('#nombre').val();
        const apellido = $('#apellido').val();
        const cedula = $('#cedula').val();
        const celular = $('#celular').val();
        const direccion = $('#direccion').val();
        const valor = validarDatosGenerales();
        if(valor !== 0){
            $.ajax({
                url:'back/editarItem.php',
                type:"POST",
                data: {nombre:nombre,apellido:apellido,cedula:cedula,celular:celular,direccion:direccion},
                success:function(){
                    $('#myModal').modal('hide');
                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                    llamarMenu(); 
                },
            })
        }
    }
    //Apertura del modal para adicionar item
    function modalAddItem(){
        $.ajax({
            url:'front/modalAddItem.php',
            type:"POST",
            success:function(respuesta){
                $("#respuestaModal").html(respuesta);
            },
        })
    }

    //registro back del nuevo item
    function registrarNuevoItem(){

        const nombre = $('#nombre').val();
        const apellido = $('#apellido').val();
        const cedula = $('#cedula').val();
        const celular = $('#celular').val();
        const direccion = $('#direccion').val();
        const valor = validarDatosGenerales();
        if(valor !== 0){
            $.ajax({
                url:'back/registrarItem.php',
                type:"POST",
                data: {nombre:nombre,apellido:apellido,cedula:cedula,celular:celular,direccion:direccion},
                success:function(){
                    $('#myModal').modal('hide');
                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                    llamarMenu(); 
                },
            })
        }
    }

    //Validar Datos generales
    function notyError(msg){
        new Noty({
            text: msg,
            type: 'error',
            layout: 'topRight',
            theme: 'bootstrap-v4',
            killer:true,
            progressBar:true,
            timeout:4000
        }).show();
    }
    function validarDatosGenerales(){
        const nombre = $('#nombre').val();
        const apellido = $('#apellido').val();
        const cedula = $('#cedula').val();
        const celular = $('#celular').val();
        const direccion = $('#direccion').val();
        
        if(nombre.length === 0 ){
            notyError('<b>El campo Nombre es requerido</b>');
            return 0;
        } 
        if(apellido.length === 0 ){
            notyError('<b>El campo Apellido es requerido</b>');
            return 0;
        } 
        if(cedula.length === 0 ){
            notyError('<b>El campo Cedula es requerido</b>');
            return 0;
        } 
        if(celular.length === 0 ){
            notyError('<b>El campo Celular es requerido</b>');
            return 0;
        } 
        if(direccion.length === 0 ){
            notyError('<b>El campo Direccion es requerido</b>');
            return 0;
        } 
    }

  
 
</script>