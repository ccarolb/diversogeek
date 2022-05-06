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
            $("#volta-topo").css({ "display": "block" });
        } else {
            $("#volta-topo").css({ "display": "none" });
        }
    });

    // Aqui a função que determina que o usuário voltará ao topo da página quando clicar no botão "Voltar ao topo".
    $("#volta-topo").click(function () {
        $("html").animate({ scrollTop: 0 }, 500);

    })


    $("#enviar").click(function () {
        let nome = $("#nome").val();
        let mensagem = $("#mensagem").val();

        if (nome.includes(" ") || nome == null) {
            alert("Por favor preencha o campo de nome corretamente.");
        }
        if (mensagem.includes(" ") || mensagem == null) {
            alert("Por favor preencha o campo de mensagem corretamente.");
        }

    })


});