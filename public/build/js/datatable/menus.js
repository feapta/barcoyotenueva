function dataMenus(){$("#menus").DataTable({responsive:!0,ajax:{url:"/menus/listarDash",method:"POST"},columnDefs:[{className:"id",targets:[0]},{className:"imagen",targets:[1]},{className:"menus",targets:[2]},{className:"descripcion",targets:[3]},{className:"creada",targets:[4]},{className:"actualiza",targets:[5]},{className:"elimina",targets:[6]}],columns:[{data:"id"},{data:"imagen",sortable:!1,searchable:!1,render:function(a){return 0==a?"N/A":'<img src="'+("/imagenes_menus/"+a)+'"/>'}},{data:"nombre"},{data:"descripcion"},{data:"creada"},{data:"id",sortable:!1,searchable:!1,render:function(a){return`<a href="/menus/actualizarDash?id=${a}"><img class="P_actualizar" src="/build/img/actualizado.png"> </a>`}},{data:"id",sortable:!1,searchable:!1,render:function(a){return`<a onclick="abre_modal(${a}, 'menus');" ><img class="P_eliminar" src="/build/img/papelera-de-reciclaje.png"></a>`}}],language:idioma})}$(document).ready((function(){dataMenus()}));