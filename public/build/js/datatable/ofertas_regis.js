function dataOferta_regis(){$("#oferta_regis").DataTable({responsive:!0,ajax:{url:"/user/ofertas_P",method:"POST"},columnDefs:[{className:"id",targets:[0]},{className:"imagen",targets:[1]},{className:"titulo",targets:[2]},{className:"descripcion",targets:[3]},{className:"precio",targets:[4]},{className:"valida",targets:[5]},{className:"creada",targets:[6]},{className:"actualiza",targets:[7]},{className:"elimina",targets:[8]}],columns:[{data:"id"},{data:"imagen",sortable:!1,searchable:!1,render:function(a){return 0==a?"N/A":'<img src="'+("/imagenes_ofertas/"+a)+'"/>'}},{data:"titulo"},{data:"descripcion"},{data:"precio"},{data:"valida"},{data:"creada"},{data:"id",sortable:!1,searchable:!1,render:function(a){return`<a href="/user/actualizarOferta?id=${a}"><img class="P_actualizar" src="/build/img/actualizado.png"> </a>`}},{data:"id",sortable:!1,searchable:!1,render:function(a){return`<a onclick="abre_modal(${a}, 'oferta_regis');" ><img class="P_eliminar" src="/build/img/papelera-de-reciclaje.png"></a>`}}],language:idioma})}$(document).ready((function(){dataOferta_regis()}));