function iniciar_app(){oculta_pass(),mostrar_pass()}function mostrar_pass(){document.querySelector("#ima-2").addEventListener("click",(function(e){const t=document.querySelector("#password");(t.type="password")&&(t.type="text"),document.querySelector("#ima-1").classList.add("mostrar"),document.querySelector("#ima-1").classList.remove("ocultar"),document.querySelector("#ima-2").classList.add("ocultar"),document.querySelector("#ima-2").classList.remove("mostrar")}))}function oculta_pass(){document.querySelector("#ima-1").addEventListener("click",(function(e){const t=document.querySelector("#password");(t.type="text")&&(t.type="password"),document.querySelector("#ima-1").classList.add("ocultar"),document.querySelector("#ima-1").classList.remove("mostrar"),document.querySelector("#ima-2").classList.add("mostrar"),document.querySelector("#ima-2").classList.remove("ocultar")}))}document.addEventListener("DOMContentLoaded",(function(){iniciar_app()}));