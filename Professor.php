<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../senac/assets/css/reset.css">
    <link rel="stylesheet" href="../../senac/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../senac/assets/css/styleCadastro.css">

    <title>Professor</title>
    <link rel="icon" href="../../fatecsrdsii202501/assets/img/icone_fatecSR.ico" type="image/x-icon">
    <style>
        .navbar-nav {
            width: 100%;
            display: flex;
            justify-content: space-around;
        }

        .nav-item {
            flex-grow: 1;
            text-align: center;
        }

        .nav-link {
            display: block;
            color: #ffffff !important;
            font-weight: bold;
            padding: 0px;
        }

        .nav-link:hover {
            background-color: #495057;
        }
    </style>

</head>

<body>
    <header>
        <a href="../Funcoes/indexPagina">
            <h1 id="headerTitle">Mapeamento de Salas</h1>
        </a>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../funcoes/abreSala">Sala de Aula</a></li>
                    <li class="nav-item"><a class="nav-link" href="../funcoes/abreProfessor">Docente</a></li>
                    <li class="nav-item"><a class="nav-link" href="../funcoes/abreTurma">Turma</a></li>
                    <li class="nav-item"><a class="nav-link" href="../funcoes/abrePeriodo">Período</a></li>
                    <li class="nav-item"><a class="nav-link" href="../funcoes/abreMapa">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link" href="../funcoes/abreRelatorio">Relatório</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section class="secao4" id="cadastroProfessor">
            <div id="btnCadastroModal">
                <input type="text" id="inputPesquisa" class="form-control" placeholder="Pesquisar"
                    onkeyup="filtrarTabela()">

                <button id="botaoModal" type="button" class="btn btn-outline-primary btnAcao" data-toggle="modal"
                    data-target="#cadastroProfessorModal">
                    Cadastrar Novo Docente
                </button>
            </div>
            <div class="modal fade" id="cadastroProfessorModal" tabindex="-1" role="dialog"
                aria-labelledby="cadastroProfessorModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cadastroProfessorModalLabel">Cadastrar Novo Docente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formCadastroProfessor" method="post" class="modal-content">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" id="nome" name="nome" class="form-control" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="cpf" class="col-form-label">CPF</label>
                                        <input type="number" id="cpf" name="cpf" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="tipo" class="col-form-label">Tipo</label>
                                        <select name="tipo" id="tipo" class="form-control" required>
                                            <option value="">Selecione</option>
                                            <option value="F">Funcionário</option>
                                            <option value="C">Carta Convite</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btnAcao" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btnAcao" onclick="cadastro();">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal de Edição -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Editar Docente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formEditProfessor" method="post">
                            <div class="modal-body">
                                <input type="hidden" id="editId" name="editId">
                                <div class="form-group">
                                    <label for="editNome">Nome</label>
                                    <input type="text" id="editNome" name="editNome" class="form-control" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="editCpf" class="col-form-label">CPF</label>
                                        <input type="number" id="editCpf" name="editCpf" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="editTipo" class="col-form-label">Tipo</label>
                                        <select name="editTipo" id="editTipo" class="form-control" required>
                                            <option value="">Selecione</option>
                                            <option value="F">Funcionário</option>
                                            <option value="C">Carta Convite</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btnAcao" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btnAcao" onclick="editarProfessor();">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

        <section id="mostrarCadastro">
            <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Docente</th>
                            <th>CPF</th>
                            <th>Tipo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody id="conteudo-Professor">
                    </tbody>
                </table>
            </div>
        </section>

    </main>
    <footer>
        <!-- Rodapé pode seguir os estilos do CSS já definido para uma aparência coerente -->
    </footer>

    <script src="../../senac/assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../../senac/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../senac/assets/js/sweetalert2.all.min.js" type="text/javascript"></script>

    <script>
        async function cadastro() {
            event.preventDefault();
            try {
                event.preventDefault();
                const nome = document.getElementById('nome').value;
                const cpf = document.getElementById('cpf').value;
                const tipo = document.getElementById('tipo').value;


                const response = await fetch('../Professor/inserir', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nome: nome,
                        cpf: cpf,
                        tipo: tipo

                    })
                });


                const result = await response.json();

                if (result.codigo == 1) {
                    $('#cadastroProfessorModal').modal('hide');
                    Swal.fire('Sucesso!', result.msg, 'success');

                    // Atualizar a tabela
                    carregarDados();
                } else {
                    Swal.fire('Erro', result.msg, 'error');
                }
            } catch (error) {
                console.error('Erro ao cadastrar o professor:', error);
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }
        }

        async function carregarDados() {
            try {


                const response = await fetch('../Professor/consultar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codigo: '',
                        nome: '',
                        cpf: '',
                        tipo: ''
                    })
                });

                const data = await response.json();
                const conteudoAcesso = document.getElementById('conteudo-Professor');

                // Limpar a tabela antes de preencher com novos dados
                conteudoAcesso.innerHTML = '';

                // Preencher a tabela com os dados recebidos
                data.dados.forEach(item => {
                    tipo = item.tipo;
                    if (tipo == 'F') {
                        tipo = 'Funcionário'
                    } else {
                        tipo = 'Carta Convite'
                    }
                    codigo = item.codigo;
                    conteudoAcesso.innerHTML += `
                        <tr class="alert alert-warning">
                            <td>${item.nome}</td>
                            <td>${item.cpf}</td>
                            <td>${tipo}</td>                      
                            <td>
                                <div class="row">
                                    <button class="btn btn-warning btnAcao" onclick="openEditModal(${item.codigo}, this)">
                                        <i class="fas fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger btnAcao btnAcaoExcluir" onclick="deletarProfessor(${item.codigo})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>`;
                });

            } catch (error) {
                console.error('Erro ao carregar os dados:', error);
            }
        }

        $(document).ready(function() {
            carregarDados();

            $('#cadastroProfessorModal').on('show.bs.modal', function() {
                $('#formCadastroProfessor')[0].reset();
            });
        });

        function openEditModal(codigo, button) {
            // A linha do botão clicado
            const row = button.closest('tr');
            // Pegar os dados da linha
            const nome = row.cells[0].innerText;
            const cpf = row.cells[1].innerText;
            const tipo = row.cells[2].innerText.charAt(0);

            // Preenche o modal com os dados da Professor
            document.getElementById('editId').value = codigo;
            document.getElementById('editNome').value = nome;
            document.getElementById('editCpf').value = cpf;
            document.getElementById('editTipo').value = tipo;

            // Abre o modal
            $('#editModal').modal('show');
        }

        async function editarProfessor() {
            event.preventDefault();
            try {
                const codigo = document.getElementById('editId').value;
                const nome = document.getElementById('editNome').value;
                const cpf = document.getElementById('editCpf').value;
                const tipo = document.getElementById('editTipo').value;


                const response = await fetch('../Professor/alterar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codigo: codigo,
                        nome: nome,
                        cpf: cpf,
                        tipo: tipo
                    })
                });

                const result = await response.json();

                if (result.codigo == 1) {
                    // Fechar o modal
                    $('#editModal').modal('hide');

                    // Mostrar uma mensagem de sucesso (opcional)
                    Swal.fire('Sucesso!', result.msg, 'success');

                    // Atualizar a tabela
                    carregarDados();

                } else {
                    Swal.fire('Erro', result.msg, 'error');
                }
                $('#cadastroProfessorModal').modal('hide');
                carregarDados(); // Atualiza a tabela com os novos dados

            } catch (error) {
                console.error('Erro ao cadastrar o professor:', error);
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }
        }

        async function deletarProfessor(codigo) {
            event.preventDefault();
            Swal.fire({
                title: 'Atenção!',
                text: 'Tem certeza que deseja remover esse Professor?',
                icon: 'question',
                showConfirmButton: true,
                showCancelButton: true,
                customClass: {
                    popup: 'my-swal-popup',
                    title: 'my-swal-title',
                    html: 'my-swal-text',
                    confirmButton: 'btn btn-danger btnAcao my-swal-button',
                    cancelButton: 'btn btn-secondary btnAcao my-swal-button',
                },
                buttonsStyling: false
            }).then(async function(res) {
                if (res.isConfirmed) {
                    const config = {
                        method: 'post',
                        body: JSON.stringify({
                            codigo: codigo
                        })
                    };

                    const request = await fetch('../Professor/desativar', config);
                    const response = await request.json();


                    Swal.fire({
                        title: 'Atenção!',
                        text: response.msg,
                        icon: response.codigo == 1 ? 'success' : 'error',
                        customClass: {
                            popup: 'my-swal-popup',
                            title: 'my-swal-title',
                            html: 'my-swal-text',
                            confirmButton: 'btn btn-primary btnAcao',
                        },
                        buttonsStyling: false
                    });
                    carregarDados();
                }
            });
        }

        function filtrarTabela() {
            const input = document.getElementById("inputPesquisa");
            const filter = input.value.toLowerCase();
            const tabela = document.getElementById("conteudo-Professor");
            const linhas = tabela.getElementsByTagName("tr");
            for (let i = 0; i < linhas.length; i++) {
                const colProfessor = linhas[i].getElementsByTagName("td")[0]; // Coluna do nome do professor
                const colCpf = linhas[i].getElementsByTagName("td")[1]; // Coluna do tipo do Cpf
                const colTipo = linhas[i].getElementsByTagName("td")[2]; // Coluna do tipo do professor

                if (colProfessor) { // Verifica se as colunas existem
                    const professorTexto = colProfessor.textContent || colProfessor.innerText;
                    const tipoTexto = colTipo.textContent || colTipo.innerText;
                    const cpfTexto = colCpf.textContent || colCpf.innerText;
                    // Verifica se o filtro corresponde ao nome do professor ou ao CPF
                    if ((professorTexto.toLowerCase().indexOf(filter) > -1) || (tipoTexto.toLowerCase().indexOf(filter) > -1)) {
                        linhas[i].style.display = ""; // Exibe a linha
                    } else {
                        linhas[i].style.display = "none"; // Oculta a linha
                    }
                }
            }
        }
    </script>
</body>
</html>
