<?php
// key Value from Json
function kvfj($json, $key){
    if($json == null): 
        return null;
    else:
        $json = $json;
        $json = json_decode($json, true);
        if(array_key_exists($key, $json)): 
            return $json[$key];
        else: 
            return null;
        endif;
    endif;  
}

function getNacionalidadArray(){
    $a = [
        '0' => 'Venezolano',
        '1' => 'Extranjero'
    ];
    return $a;   
}


function getEstadoCivildArray(){
    $e = [
        '0' => 'Soltero',
        '1' => 'Casado'
    ];
    return $e;   
}

function getGeneroId(){
    $e = [
        '0' => 'Hombre',
        '1' => 'Mujer'
    ];
    return $e;   
}



function getRoleUserArray($mode,$id){
    $roles = [
        '0' => 'Usuario normal', 
        '1' => 'Administrador'
    ];
    if(!is_null($mode)): 
        return $roles;
    else: 
        return $roles[$id];
    endif;
    
}




function getUserStatusArray($mode,$id){
    $status = [
        '0' => 'Registrado', 
        '1' => 'Verificado', 
        '100' => 'Baneado'
    ];
    if(!is_null($mode)): 
        return $status;
    else: 
        return $status[$id];
    endif;
}

function user_permissions(){
    $p = [
        'dashboard' => [
            'icon' => '<i class="fas fa-home"></i>',
            'title' => 'Módulo Dashboard',
            'keys' => [
                'dashboard' => 'Puede ver el Dashboard'
            ]
         ],
         'user_list' => [
            'icon' => '<i class="fas fa-user-friends"></i>',
            'title' => 'Módulo Usuarios',
            'keys' => [
                'user_list' => 'Puede ver la lista',
                'user_edit' => 'Puede editar',
                'user_banned' => 'Puede banear',
                'user_permissions' => 'Puede administrar permisos'
            ]
        ],
        'plantillas' => [
            'icon' => '<i class="fas fa-cogs"></i>',
            'title' => 'Módulo Plantillas',
            'keys' => [
                'plantilla_add' => 'Puede registrar plantillas'
            ]
        ] 

    ];
    return $p;
}

function getUserYears(){
    $ya = date('Y');
    $ym = $ya - 18;
    $yo = $ym -70;

    return [$ym,$yo];
}

function getMonts($mode, $key){
    $m = [
        '1' => 'Enero',
        '2' => 'Febrero',
        '3' => 'Marzo',
        '4' => 'Abril',
        '5' => 'Mayo',
        '6' => 'Junio',
        '7' => 'Julio',
        '8' => 'Agosto',
        '9' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];
    if($mode == "list"){
        return $m;
    }
    else{
        return $key;
    }
}