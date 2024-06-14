/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("search").addEventListener("keyup", function (event) {
    // Verifica se a tecla pressionada é Enter (código 13)
    if (event.key === "Enter") {
      // Obtém o valor do input
      var searchQuery = this.value.trim();

      // Redireciona para a rota 'noticias' com o parâmetro 'search'
      if (searchQuery !== "") {
        window.location.href = "/?search=" + encodeURIComponent(searchQuery);
      } else {
        // Caso não haja valor de busca, redireciona sem parâmetros
        window.location.href = "/";
      }
    }
  });
});
/******/ })()
;