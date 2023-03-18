function usuarioNaoExiste(){
    
  Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Usuário não existe',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
}

function usuarioCadastrado(){
    
  Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Usuário cadastrado com sucesso',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
}

function emailExiste(){
  Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'E-mail já cadastrado',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
}


function cadastroObra(){
    
  Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Obra cadastrada com sucesso',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
}

function imagemObra(){
  Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Formato da imagem não suportado',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
}

function wallpaperObra(){
  Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Formato do wallpaper não suportado',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
}

function perfilAtt(){
  Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Perfil atualizado com sucesso',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
}

function usuarioRemovido(){
  Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Conta exluida com sucesso',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
}

function obraAtt(){
  
Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Obra atualizada com sucesso',
    showConfirmButton: false,
    timer: 1500
  })
  event.preventDefault();
}

function obraFavoritada(){
  
  Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Obra favoritada com sucesso',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
  }

  function obraDesfavoritada(){
  
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Obra removida dos favoritos com sucesso',
        showConfirmButton: false,
        timer: 1500
      })
      event.preventDefault();
    }

function obraExiste(){
Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Obra já existente',
    showConfirmButton: false,
    timer: 1500
  })
  event.preventDefault();
}

function obraExcluida(){
Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Obra excluida com sucesso',
    showConfirmButton: false,
    timer: 1500
  })
  event.preventDefault();
}

function zeroObras(){
Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Não há obras adicionadas',
    showConfirmButton: true,
    confirmButtonText: 'Ok'
  }).then((result)=>{
    if(result.isConfirmed){
      window.location.href = '../paginas/gerenciarObras.php'
    }
    else{
      window.location.href = '../paginas/gerenciarObras.php'
    }
  })
}

function addGen(){
const { value: nomeGen } = Swal.fire({
  icon:'question',
  position: 'center',
  title: 'Qual gênero deseja adicionar?',
  input:'text',
  showConfirmButton: true,
  confirmButtonColor:'#3085d6',
  showCloseButton:true,
  customClass:'alertGen',
  confirmButtonText: 'Adicionar',
  inputValidator: (value) => {
    if (!value) {
      return 'Infome um gênero!'
    }
  }
}).then((result)=>{
  if(result.isConfirmed){
    window.location.href = '../php/cadastrarGenero.php?nomeGen='+result.value
  }
})
event.preventDefault();
}

var genero = [];
var objAux;
var cont;
$.ajax({
  url : '../php/buscaGenero.php',
  method : 'GET', 
  success : function(dados){
    var obj = JSON.parse(dados);
    objAux = obj;
    for(cont=0;cont<Object.keys(obj).length;cont++){
          genero[cont] = obj[cont].Genero; 
    }
  }
});



function delGen(){
Swal.fire({
  position: 'center',
  input:'select',
  inputOptions:genero,
  title: 'Selecione o gênero que deseja excluir',
  showConfirmButton: true,
  showCloseButton:true,
  confirmButtonText: 'Deletar'
}).then(function (inputValue) {
    if (inputValue.isConfirmed) {
        window.location.href = '../php/excluirGenero.php?nomeGen='+objAux[inputValue.value].Genero;
      
    } 
});
event.preventDefault();
}

function generoExiste(){
Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'Gênero já existente',
  showConfirmButton: false,
  timer: 1500
})
event.preventDefault();
}

function generoAdicionado(){
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Gênero adicionado com sucesso!',
  showConfirmButton: false,
  timer: 1500
})
event.preventDefault();
}

function generoInvalido(){
Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'Gênero inserido inválido!',
  showConfirmButton: false,
  timer: 1500
})
event.preventDefault();
}

function generoRemovido(){
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Gênero removido com sucesso!',
  showConfirmButton: false,
  timer: 1500
})
event.preventDefault();
}

function buscaObras(){
Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'Obra não encontrada!',
  showConfirmButton: true,
  confirmButtonText: 'Ok'
}).then((result)=>{
  if(result.isConfirmed){
    window.location.href = '../index.php'
  }
  else{
    window.location.href = '../index.php'
  }
})
}

function addAutor(){
  const { value: nomeAutor } = Swal.fire({
    icon:'question',
    position: 'center',
    title: 'Qual o nome do autor deseja adicionar?',
    input:'text',
    showConfirmButton: true,
    confirmButtonColor:'#3085d6',
    showCloseButton:true,
    customClass:'alertAutor',
    confirmButtonText: 'Adicionar',
    inputValidator: (value) => {
      if (!value) {
        return 'Infome um autor!'
      }
    }
  }).then((result)=>{
    if(result.isConfirmed){
      window.location.href = '../php/cadastrarAutor.php?nomeAutor='+result.value
    }
  })
  event.preventDefault();
}


var autor = [];
var objAuxAutor;
var contAutor;
$.ajax({
  url : '../php/buscaAutor.php',
  method : 'GET', 
  success : function(dadosAutor){
    var objAutor = JSON.parse(dadosAutor);
    objAuxAutor = objAutor;
    for(contAutor=0;contAutor<Object.keys(objAutor).length;contAutor++){
          autor[contAutor] = objAutor[contAutor].Autor; 
    }
  }
});

function delAutor(){
Swal.fire({
  position: 'center',
  input:'select',
  inputOptions:autor,
  title: 'Selecione o autor que deseja excluir',
  showConfirmButton: true,
  showCloseButton:true,
  confirmButtonText: 'Deletar'
}).then(function (inputValue) {
    if (inputValue.isConfirmed) {
        window.location.href = '../php/excluirAutor.php?nomeAutor='+objAuxAutor[inputValue.value].Autor;
      
    } 
});
event.preventDefault();
}

function autorAdicionado(){
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Autor adicionado com sucesso!',
    showConfirmButton: false,
    timer: 1500
  })
  event.preventDefault();
  }
  
  function autorExiste(){
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Autor já existente',
      showConfirmButton: false,
      timer: 1500
    })
    event.preventDefault();
    }
  
  function autorRemovido(){
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Autor removido com sucesso!',
    showConfirmButton: false,
    timer: 1500
  })
  event.preventDefault();
  }

  function obraNaoEncontrada(){
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Obra não encontrada!',
      showConfirmButton: false,
      timer: 1500
  }).then((result)=>{
    if(result.isConfirmed){
      window.location.href = '../index.php'
    }
    else{
      window.location.href = '../index.php'
    }
  })
}


