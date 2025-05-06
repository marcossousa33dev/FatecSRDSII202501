<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistema Mapa de Sala</title>
    <link rel="icon" href="../../fatecsrdsii202501/assets/img/icone_fatecSR.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../fatecsrdsii202501/assets/css/reset.css">
    <link rel="stylesheet" href="../../fatecsrdsii202501/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fatecsrdsii202501/assets/css/styleCadastro.css">
    <link rel="stylesheet" href="../../fatecsrdsii202501/assets/css/stylePassword.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="container" >
        <!-- Logo acima do formulário -->
        <div class="text-center">
            <img src="../../fatecsrdsii202501/assets/img/logo_fatecSR.png" alt="Logo da Empresa" style="max-width: 200px; 
                      margin-bottom: 20px;">
        </div>
        <div class="panel-body">
            <form autocomplete="off" id="login">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Usuário" id="txtUsuario" name="txtUsuario" 
                               type="text" autofocus required>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" placeholder="Senha" id="txtSenha" name="txtSenha" type="password" required>
                            <div class="input-group-append">
                                <i id="togglePassword" class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <button type="buttom" id="btnEntrar" class="btn btn-block btnAcao" onclick="validaLogin()">Entrar</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
<script src="../../fatecsrdsii202501/assets/js/jquery-3.6.0.min.js"></script>
<script src="../../fatecsrdsii202501/assets/js/bootstrap.min.js"></script>
<script src="../../fatecsrdsii202501/assets/js/sweetalert2.all.min.js"></script>

<script>    
    async function validaLogin(){
        event.preventDefault();
        try{
            const usuario = document.getElementById('txtUsuario').value;
            const senha = document.getElementById('txtSenha').value;
            const base_url = function(url='') {
                return "<?= base_url()?>"+url
            }
            
            const response = await fetch('Usuario/logar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        usuario: usuario,
                        senha: senha
                    })
                });

            const result = await response.json();

            if (result.codigo == 1) {                    
                // Mostrar uma mensagem de sucesso (opcional)
                Swal.fire('Sucesso!', result.msg, 'success');

                // Atualizar a tabela
                window.location.href = base_url("Funcoes/indexPagina")

            } else {                
                Swal.fire('Erro', result.msg, 'error');                
            }

        } catch (error) {            
            console.error('Errou', error);
        }
    }

    // Script para alternar a visibilidade da senha
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('txtSenha');

    togglePassword.addEventListener('click', function () {
        // Alterna o tipo de campo (password -> text)
        const type = passwordField.type === 'password' ? 'text' : 'password';            
        passwordField.type = type;           

        // Alterna o ícone (olho aberto/fechado)
        this.classList.toggle('fa-eye-slash');
    });   

</script>