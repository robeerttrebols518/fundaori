var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');



document.addEventListener('DOMContentLoaded', function(){

    var btn_search = document.getElementById('btn_search');
    var form_search = document.getElementById('form_search');
    if(btn_search){
        btn_search.addEventListener('click', function(e){
            e.preventDefault();
            if(form_search.style.display == 'block'){
                form_search.style.display = 'none';
            }else{
                form_search.style.display = 'block';
            }
        });
    }
    if(route == 'product_edit' || route == 'add'){
        var btn_product_file_image = document.getElementById('btn_product_file_image');
        var product_file_image = document.getElementById('product_file_image');
        btn_product_file_image.addEventListener('click', function(){
            product_file_image.click();
        }, false);
        product_file_image.addEventListener('change', function(){
            document.getElementById('form_product_gallery').submit();
        });
    }

    
    route_active = document.getElementsByClassName('lk-'+route)[0].classList.add('active');

    btn_deleted = document.getElementsByClassName('btn-deleted');
    for(i=0; i<btn_deleted.length; i++){
        btn_deleted[i].addEventListener('click', delete_object);
    }
    //console.log(btn_deleted);

});




$(document).ready(function(){
    editor_init('editor');
})

function editor_init(field){
    CKEDITOR.replace(field,{
        toolbar: [
            { name: 'document', groups: [ 'document', 'doctools' ], items: [ 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
        ]
    });
}


function delete_object(e){
    e.preventDefault();
    var object = this.getAttribute('data-object');
    var path = this.getAttribute('data-path');
    var action = this.getAttribute('data-action');
    var url = base + '/' + path + '/' + object + '/' + action;
    //console.log(object, path, url);

    var title, text, icon;

    if(action == "delete"){
        title = "Estas seguro de eliminar este producto";
        text = "Recuerda que esta acción enviará este elemento a la papelera";
        icon = "warning";
    }
    if(action == "restore"){
        title = "Estas seguro de restaurar este producto";
        text = "Esta acción restaurá este producto";
        icon = "info";
    }

    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
      })
      .then((result) => {          
        if (result.value) {
            window.location.href = url;
        }
      });
}