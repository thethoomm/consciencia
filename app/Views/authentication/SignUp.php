<?= $components['header'] ?>

<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a class="btn" href="<?= url_to('home') ?>">
            <i class="bi bi-caret-left-fill"></i>
            Voltar
          </a>
        </div>
      </nav>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Crie uma conta</h2>
            <form method="POST">
              <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Nome</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Senha</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirme a Senha" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                <label for="confirmPassword">Confirme a Senha</label>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                  As senhas não se coincidem.
                </div>
              </div>
              <div>
                <div class="mb-3 form-check">
                  <input class="form-check-input" type="checkbox" value="" id="terms" required>
                  <label class="form-check-label" for="invalidCheck">
                    <p>
                      Aceito os
                      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">termos e condições</a>
                    </p>
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
                <div class="mb-3 form-check">
                  <input class="form-check-input" name="receive_emails" type="checkbox" value="">
                  <label class="form-check-label" for="invalidCheck">
                    Quero receber emails
                  </label>
                </div>
              </div>
              <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-dark">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1>Termos e Condições de Uso</h1>

        <p>
          <strong>1. Privacidade e Dados Pessoais:</strong> Ao utilizar nossos serviços, você concorda com a coleta e o uso de informações pessoais de acordo com nossa política de privacidade. Estas informações podem incluir, mas não se limitam a, nome, email, e outros detalhes fornecidos voluntariamente.
        </p>

        <p>
          <strong>2. Uso dos Serviços:</strong> Você concorda em usar nossos serviços apenas para fins legais. Não deve usar nossos serviços para violar leis, prejudicar outros indivíduos, ou realizar atividades ilícitas.
        </p>

        <p>
          <strong>3. Responsabilidades do Usuário:</strong> Você é responsável por qualquer informação fornecida e por manter a segurança de suas credenciais de acesso. Não deve compartilhar sua conta ou credenciais com terceiros.
        </p>

        <p>
          <strong>4. Propriedade Intelectual:</strong> Todo o conteúdo presente em nossos serviços, como texto, imagens, e logotipos, é protegido por direitos autorais e é propriedade exclusiva da nossa empresa. Não é permitida a reprodução ou uso sem autorização.
        </p>

        <p>
          <strong>5. Alterações nos Termos e Condições:</strong> Reservamo-nos o direito de modificar ou revisar estes termos a qualquer momento. Quaisquer alterações serão comunicadas por meio dos nossos canais oficiais.
        </p>

        <p>Ao usar nossos serviços, você concorda com estes termos e condições. Se tiver dúvidas ou preocupações, entre em contato conosco.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Recusar</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="acceptTerms()">Aceitar</button>
      </div>
    </div>
  </div>
</div>

<script>
  function acceptTerms() {
    document.getElementById('terms').checked = true;
  }

  function validatePasswords() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');

    password.addEventListener('input', (e) => {
      if (e.target.value != confirmPassword.value) {
        confirmPassword.classList.add('is-invalid');
      } else {
        confirmPassword.classList.remove('is-invalid');
      }
    })

    confirmPassword.addEventListener('input', (e) => {
      if (e.target.value != password.value) {
        confirmPassword.classList.add('is-invalid');
      } else {
        confirmPassword.classList.remove('is-invalid');
      }
    });
  }
  validatePasswords()
</script>