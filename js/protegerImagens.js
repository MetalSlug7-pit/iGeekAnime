// Desabilita a seleção de texto
document.addEventListener('selectstart', event => event.preventDefault());

// Desabilita o arrastar de imagens
document.addEventListener('dragstart', event => event.preventDefault());

window.onload = function() {
    // Selecione todas as imagens da página
    const imagens = document.querySelectorAll('img');
  
    // Percorra todas as imagens e adicione o atributo oncontextmenu
    for (let i = 0; i < imagens.length; i++) {
      imagens[i].setAttribute('oncontextmenu', 'return false;');
    }
}
  