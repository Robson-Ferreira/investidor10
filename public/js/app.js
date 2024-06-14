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

  // Lógica JavaScript para abrir e fechar o modal
  document.getElementById('openModalButton').addEventListener('click', function () {
    document.getElementById('categoryModal').style.display = 'block';
  });
  document.getElementById('closeModalButton').addEventListener('click', function () {
    document.getElementById('categoryModal').style.display = 'none';
    document.getElementById('categoryName').value = '';
  });
  document.getElementById('cancelButton').addEventListener('click', function () {
    document.getElementById('categoryModal').style.display = 'none';
    document.getElementById('categoryName').value = '';
  });
  document.getElementById('saveCategoryButton').addEventListener('click', function () {
    var categoryName = document.getElementById('categoryName').value.trim();
    if (categoryName.length === 0 || categoryName.length > 255) {
      alert('O nome da categoria é obrigatório e deve ter no máximo 255 caracteres.');
      return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "".concat(window.location.origin, "/newspaper-category"), true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          var categorySelect = document.querySelector('select[name="category_id"]');
          var newOption = document.createElement('option');
          newOption.value = response.category.id;
          newOption.text = response.category.name;
          categorySelect.appendChild(newOption);
          categorySelect.value = response.category.id;
          document.getElementById('categoryModal').style.display = 'none';
          document.getElementById('categoryName').value = '';
        } else {
          alert('Erro ao salvar a categoria. Tente novamente.');
        }
      }
    };
    var data = JSON.stringify({
      name: categoryName
    });
    xhr.send(data);
  });
  window.onclick = function (event) {
    if (event.target == document.getElementById('categoryModal')) {
      document.getElementById('categoryModal').style.display = 'none';
      document.getElementById('categoryName').value = '';
    }
  };
});
/******/ })()
;