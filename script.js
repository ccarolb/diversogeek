$(document).ready(function () {

    // Aqui os elementos que possuem a classe .hidden são escondidos no momento do carregamento da página
    $(".hidden").hide();

    // Aqui é definida uma função para, quando o usuário clicar no botão "Ler mais notícias", os elementos com a classe hidden são mostrados, e o botão "Ler mais notícias" é escondido (simulando que o usuário já carregou todos os posts.)
    $(".ler-mais").click(function () {
        $(".hidden").show();
        $(".ler-mais").hide();
    })


    // Aqui é definida outra função para, quando a página for scrollada 500px para baixo, o botão de "Voltar ao topo" é mostrado. Do contrário, ele fica escondido.
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $("#voltaTopo").css({ "display": "block" });
        } else {
            $("#voltaTopo").css({ "display": "none" });
        }
    });

    // Aqui a função que determina que o usuário voltará ao topo da página quando clicar no botão "Voltar ao topo".
    $("#voltaTopo").click(function () {
        $("html").animate({ scrollTop: 0 }, 500);

    })

    // Função que ao clicar no botão enviar valida se o campo de nome e o campo de mensagem estão vazios ou estão preenchidos apenas por espaço, e se uma das condições forem verdadeiras, o navegador exibe uma mensagem pedindo para o usuário preencher de forma correta.
    $("#enviar").click(function () {

        function apenasEspaco(string) {
            let str = string.val()

            return str.trim().length === 0
        }

        if (apenasEspaco($("#nome")) || nome == null) {
            alert("Por favor preencha o campo de nome corretamente.");
        }
        if (apenasEspaco($("#mensagem")) || mensagem == null) {
            alert("Por favor preencha o campo de mensagem corretamente.");
        }

    })


});