function dataBlog(){$("#blog").DataTable({responsive:!0,ajax:{url:"/admin/blog_P",method:"POST"},columnDefs:[{className:"id",targets:[0]},{className:"imagen",targets:[1]},{className:"nombre",targets:[2]},{className:"titulo",targets:[3]},{className:"texto",targets:[4]},{className:"estrellas",targets:[5]},{className:"creada",targets:[6]},{className:"elimina",targets:[7]}],columns:[{data:"id"},{data:"imagen",sortable:!1,searchable:!1,render:function(a){return 0==a?"N/A":'<img src="'+("/imagenes_comentarios/"+a)+'"/>'}},{data:"nombre"},{data:"titulo"},{data:"texto"},{data:"estrellas"},{data:"creada"},{data:"id",sortable:!1,searchable:!1,render:function(a){return`<a onclick="abre_modal(${a}, 'comentario');" ><img class="P_eliminar" src="/build/img/papelera-de-reciclaje.png"></a>`}}],language:idioma})}$(document).ready((function(){dataBlog()}));