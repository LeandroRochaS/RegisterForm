<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../Styles/global.css">
  <link rel="stylesheet" href="../Styles/formulario.css">
  <title>Registrar</title>
</head>

<body>
  <main>
    <div class="container">

      <div class="row">
        <div class="col-lg-2"></div>

        <div class="col-lg-8 my-5">
          <h1 class="text-center mt-5">Preencha com seus dados</h1>

          <form onsubmit="return validarFormulario()" action="processa_dados.php" method="POST" id="formulario">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName4">Nome Completo</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputName4">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputConfirmPassword">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                  placeholder="Confirmar Senha" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputBirthdate">Data de Nascimento</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputCEP">CEP</label>
                <input type="text" class="form-control" name="cep" id="cep">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Endereço</label>
              <input readonly type="text" class="form-control" name="endereco" id="address"
                placeholder="Rua dos Bobos, nº 0">

            </div>

            <div class="form-group ">
              <label for="inputAddress2">Complemento</label>
              <input type="text" class="form-control" name="endereco2" id="address2"
                placeholder="Apartamento, hotel, casa, etc.">
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputCity">Número</label>
                <input required type="text" class="form-control" name="numero" id="numero">
              </div>
              <div class="form-group col-md-6">
                <label for="inputCity">Cidade</label>
                <input readonly type="text" class="form-control" name="cidade" id="city">
              </div>
              <div class="form-group col-md-4">
                <label for="inputEstado">Estado</label>
                <input readonly type="text" class="form-control" name="estado" id="estado">
              </div>

            </div>

            <div id="errorMessages"></div> <!-- Nova div para exibir mensagens de erro -->

            <button type="submit" name="btnsubmit" class="btn btn-primary btn-registrar">Registrar</button>

          </form>
        </div>

        <script src="main.js"></script>

  </main>




</body>

</html>