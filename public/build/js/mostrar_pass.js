function iniciar_app(){oculta_pass(),mostrar_pass(),oculta_pass2(),mostrar_pass2()}function mostrar_pass(){document.querySelector("#ima-2").addEventListener("click",(function(e){const s=document.querySelector("#password");(s.type="password")&&(s.type="text"),document.querySelector("#ima-1").classList.add("mostrarPass"),document.querySelector("#ima-1").classList.remove("ocultarPass"),document.querySelector("#ima-2").classList.add("ocultarPass"),document.querySelector("#ima-2").classList.remove("mostrarPass")}))}function oculta_pass(){document.querySelector("#ima-1").addEventListener("click",(function(e){const s=document.querySelector("#password");(s.type="text")&&(s.type="password"),document.querySelector("#ima-1").classList.add("ocultarPass"),document.querySelector("#ima-1").classList.remove("mostrarPass"),document.querySelector("#ima-2").classList.add("mostrarPass"),document.querySelector("#ima-2").classList.remove("ocultarPass")}))}function mostrar_pass2(){document.querySelector("#ima-4").addEventListener("click",(function(e){const s=document.querySelector("#password2");(s.type="password")&&(s.type="text"),document.querySelector("#ima-3").classList.add("mostrarPass"),document.querySelector("#ima-3").classList.remove("ocultarPass"),document.querySelector("#ima-4").classList.add("ocultarPass"),document.querySelector("#ima-4").classList.remove("mostrarPass")}))}function oculta_pass2(){document.querySelector("#ima-3").addEventListener("click",(function(e){const s=document.querySelector("#password2");(s.type="text")&&(s.type="password"),document.querySelector("#ima-3").classList.add("ocultarPass"),document.querySelector("#ima-3").classList.remove("mostrarPass"),document.querySelector("#ima-4").classList.add("mostrarPass"),document.querySelector("#ima-4").classList.remove("ocultarPass")}))}document.addEventListener("DOMContentLoaded",(function(){iniciar_app()}));