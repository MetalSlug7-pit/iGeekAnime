$(function(){
    $("#pesquisaObra").keyup(function(){
        var pesquisaObra = $(this).val();
        var x = document.getElementById('mostrarObras');
        if(pesquisaObra != ''){
            var dados = {
                nomeObra : pesquisaObra
            }
            $.post('../php/pesquisaObraD.php', dados,function(retorna){
                $(".resultBusca").html(retorna);
                x.style.display = 'none';
            });
                
        }
        else{
            $(".resultBusca").html('');
            x.style.display = 'block';
        }
    });
});

$(function(){
    $("#pesquisaObraE").keyup(function(){
        var pesquisaObraE = $(this).val();
        var x = document.getElementById('mostrarObrasE');
        if(pesquisaObraE != ''){
            var sodad = {
                nomeObra : pesquisaObraE
            }
            $.post('../php/pesquisaObraED.php', sodad,function(retornaE){
                $(".resultBusca").html(retornaE);
                x.style.display = 'none';
            });
                
        }
        else{
            $(".resultBusca").html('');
            x.style.display = 'block';
        }
    });
});
