var senha_confirmacao = document.getElementById("senha_confirmacao");
var senha = document.getElementById("senha");

var formulario = document.getElementById("formulario");

function validacaoCampos () {

    let valido = true;
    var div = document.getElementById("erro_senha_confirmacao");
    if (!formulario.checkValidity()) {
        valido = false;
        console.log(formulario.elements);
        for(const element of Array.from(formulario.elements)){
            if (!element.checkValidity()) {
                element.reportValidity();
                break;
            }
        }
    }
    if (senha_confirmacao.value != senha.value) {
        div.classList.remove("hidden");
        valido = false;
    } else if(!div.classList.contains("hidden")) {
        div.classList.add("hidden");
    }
    if (!valido) return;

    formulario.submit();

}