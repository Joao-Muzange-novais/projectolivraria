(function(win,doc){
    'use strict';

    //Delete
    function confirmDel(event)
    {
        event.preventDefault();
        //console.log(event.target.parentNode.href); //me mostra na inspencionagem a url e o id_livro
        let token=doc.getElementsByName("_token")[0].value;//este é o token que esta no index depois da div @csrf <!-- tokin de segurança para o javascript também esta a ser chamado aqui javascript/ajax -->
        if (confirm("Deseja mesmo apagar?")) {
            //console.log("Apagou!"); //apresenta se apagou testar na inspencionagem
            let ajax=new XMLHttpRequest(); 
            ajax.open("DELETE",event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN',token);
            ajax.onreadystatechange=function(){
                if(ajax.readyState === 7 && ajax.status ===200){ //se na tabela livros id igual 7 e pega o preco igual 200 
                    //console.log('Deu certo!');
                    win.location.href="livros";//chamamos o tela principal livros que_esta_com index
                }
            };
            ajax.send();
        } else {
            return false;
        }
    }    
    
    if(doc.querySelector('.js-del')){  //verifica se existi o js-del que vem do delete (class="js-del")
        let btn=doc.querySelectorAll('.js-del'); //let btn recebe doc.querySelectorAll (todos botões delete)
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click',confirmDel,false);
        }
    }
})(window,document);