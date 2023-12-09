console.log("carregou");

var form = document.getElementById("formulario");
form.onsubmit = (e) => {
  e.preventDefault();
  if (validarFormulario()) {
    form.submit();
  }
};

let cepInput = document.getElementById("cep");
cepInput.addEventListener("blur", (e) => {
  let cepValue = cepInput.value.trim();
  console.log(cepValue);

  if (cepValue.length === 8) {
    BuscarDados(cepValue);
  }
});

function validarFormulario() {
  limparMensagensErro();

  var emailElement = document.getElementById("email");
  var passwordElement = document.getElementById("password");
  var confirmPasswordElement = document.getElementById("confirmPassword");
  var birthdateElement = document.getElementById("birthdate");
  var checkBox = document.querySelector(".check");

  if (!emailElement || !passwordElement) {
    console.error("Elementos de formulário não encontrados.");
    return false;
  }

  var email = emailElement.value;
  var senha = passwordElement.value;
  var confirmPassword = confirmPasswordElement.value;
  var birthdate = birthdateElement.value;
  var checkBox = checkBox.checked;

  if (!checkBox) {
    exibirMensagemErro("Você deve aceitar os termos de uso.");
    return false;
  }

  if (calcularIdade(new Date(birthdate), new Date()) < 16) {
    exibirMensagemErro(
      "O cadastrado deve ter pelo menos 16 anos para se cadastrar."
    );
    return false;
  }

  if (senha != confirmPassword) {
    exibirMensagemErro("As senhas não coincidem.");
    return false;
  }

  if (senha.length < 3 || senha.length > 50) {
    exibirMensagemErro("A senha deve ter entre 12 e 50 caracteres.");
    return false;
  }

  if (!validarEmail(email)) {
    exibirMensagemErro("Digite um endereço de e-mail válido.");
    return false;
  }

  console.log("Formulário validado com sucesso.");
  return true;
}

async function BuscarDados(cep) {
  let dados = await fetch(`https://viacep.com.br/ws/${cep}/json/`)
    .then((response) => response.json())
    .then((data) => data)
    .catch((e) => console.log("Deu erro: " + e, message));

  if (!dados.erro) {
    PreencherFormulario(dados);
  }
}

function PreencherFormulario(dados) {
  document.getElementById("address").value = dados.logradouro;
  document.getElementById("city").value = dados.localidade;
  document.getElementById("estado").value = dados.uf;
}

function validarEmail(email) {
  var emailRegex = /\S+@\S+\.\S+/;
  return emailRegex.test(email);
}

function exibirMensagemErro(mensagem) {
  var errorMessages = document.getElementById("errorMessages");
  errorMessages.innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;

  setTimeout(() => {
    limparMensagensErro();
  }, 3000);
}

function limparMensagensErro() {
  var errorMessages = document.getElementById("errorMessages");
  errorMessages.innerHTML = "";
}

function calcularIdade(dataNascimento, dataAtual) {
  const diffAnos = dataAtual.getFullYear() - dataNascimento.getFullYear();
  const mesmoMesmoDia =
    dataNascimento.getMonth() === dataAtual.getMonth() &&
    dataNascimento.getDate() === dataAtual.getDate();

  return mesmoMesmoDia ? diffAnos - 1 : diffAnos;
}

/*function verificarEmailCadastrado(email) {
    // Conectar-se ao banco de dados
    let conn = new mysqli("localhost", "root", "", "projectformulario");

    // Verificar se a conexão foi bem-sucedida
    if (conn.connect_error) {
        console.log("Erro ao conectar ao banco de dados: " + conn.connect_error);
        return false;
    }

    // Executar a consulta SQL
    let sql = "SELECT * FROM usuarios WHERE email = '" + email + "'";
    let result = conn.query(sql);

    // Verificar se o resultado da consulta é vazio
    if (result.num_rows === 0) {
        // O email não está cadastrado
        return false;
    } else {
        // O email já está cadastrado
        return true;
    }

    conn.close();
} */
