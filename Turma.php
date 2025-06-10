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

    <title>Turma</title>
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
        <section class="secao4" id="cadastroTurma">
            <div id="btnCadastroModal">
                <input type="text" id="inputPesquisa" class="form-control" placeholder="Pesquisar"
                    onkeyup="filtrarTabela()">

                <button id="botaoModal" type="button" class="btn btn-outline-primary btnAcao" data-toggle="modal"
                    data-target="#cadastroTurmaModal">
                    Cadastrar Nova Turma
                </button>
            </div>
            <div class="modal fade" id="cadastroTurmaModal" tabindex="-1" role="dialog"
                aria-labelledby="cadastroTurmaModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cadastroTurmaModalLabel">Cadastrar Nova Turma</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formCadastroTurma" method="post" class="modal-content">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="descricao" class="col-form-label">Descrição</label>
                                    <input type="text" id="descricao" name="descricao" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="capacidade" class="col-form-label">Capacidade</label>
                                    <input type="number" id="capacidade" name="capacidade" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="dataInicio" class="col-form-label">Data de Início</label>
                                    <input type="date" id="dataInicio" name="dataInicio" class="form-control" required>
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
                            <h5 class="modal-title" id="editModalLabel">Editar Turma</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formEditTurma" method="post">
                            <div class="modal-body">
                                <input type="hidden" id="editId" name="editId">
                                <div class="form-group">
                                    <label for="editDescricao">Descrição</label>
                                    <input type="text" id="editDescricao" name="descricao" class="form-control"
                                        required>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="editCapacidade" class="col-form-label">Capacidade</label>
                                        <input type="number" id="editCapacidade" name="editCapacidade"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="editDataInicio" class="col-form-label">Data de Início</label>
                                        <input type="date" id="editDataInicio" name="editDataInicio"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btnAcao" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btnAcao" onclick="editarTurma();">Salvar</button>
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
                            <th>Turma</th>
                            <th>Descrição</th>
                            <th>Capacidade</th>
                            <th>Data de Início</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="conteudo-Turma">


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
            const descricao = document.getElementById('descricao').value;
            const capacidade = document.getElementById('capacidade').value;
            const dataInicio = document.getElementById('dataInicio').value;

            try {
                const response = await fetch('../Turma/inserir', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        descricao: descricao,
                        capacidade: capacidade,
                        dataInicio: dataInicio
                    })
                });

                const result = await response.json();

                if (result.codigo == 1) {
                    // Fechar o modal
                    $('#cadastroTurmaModal').modal('hide');

                    // Mostrar uma mensagem de sucesso (opcional)
                    Swal.fire('Sucesso!', result.msg, 'success');

                    // Atualizar a tabela
                    carregarDados();
                } else {
                    Swal.fire('Erro', result.msg, 'error');
                }
            } catch (error) {
                console.error('Erro ao cadastrar a Turma:', error);
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }
        }

        async function carregarDados() {
            try {

                const response = await fetch('../Turma/consultar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codigo: '',
                        descricao: '',
                        capacidade: '',
                        dataInicio: ''
                    })
                });

                const data = await response.json();

                const conteudoAcesso = document.getElementById('conteudo-Turma');

                // Limpar a tabela antes de preencher com novos dados
                conteudoAcesso.innerHTML = '';

                // Preencher a tabela com os dados recebidos
                data.dados.forEach(item => {

                    conteudoAcesso.innerHTML += `
                        <tr class="alert alert-warning">
                            <td>${item.codigo}</td>
                            <td>${item.descricao}</td>
                            <td>${item.capacidade}</td>
                            <td>${item.dataIniciobra}</td>  
                            <td style="display:none">${item.dataInicio}</td>     
                            
                            <td>
                                <div class="row">
                                    <button class="btn btn-warning btnAcao" onclick="openEditModal(this)">
                                        <i class="fas fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger btnAcao btnAcaoExcluir" onclick="deletarTurma(${item.codigo})">
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

            $('#cadastroTurmaModal').on('show.bs.modal', function() {
                $('#formCadastroTurma')[0].reset();
            });
        });

        function openEditModal(button) {
            // A linha do botão clicado
            const row = button.closest('tr');

            // Pegar os dados da linha
            const codigo = row.cells[0].innerText; // Código da Turma
            const descricao = row.cells[1].innerText; // Descrição da Turma
            const capacidade = row.cells[2].innerText;
            const dataInicio = row.cells[4].innerText;
            // Preenche o modal com os dados da Turma
            document.getElementById('editId').value = codigo;
            document.getElementById('editDescricao').value = descricao;
            document.getElementById('editCapacidade').value = capacidade;
            document.getElementById('editDataInicio').value = dataInicio;


            // Abre o modal
            $('#editModal').modal('show');
        }

        async function editarTurma() {
            event.preventDefault();
            try {
                const codigo = document.getElementById('editId').value;
                const descricao = document.getElementById('editDescricao').value;
                const capacidade = document.getElementById('editCapacidade').value;
                const dataInicio = document.getElementById('editDataInicio').value;

                const response = await fetch('../Turma/alterar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codigo: codigo,
                        descricao: descricao,
                        capacidade: capacidade,
                        dataInicio: dataInicio
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
                $('#cadastroTurmaModal').modal('hide');
                carregarDados(); // Atualiza a tabela com os novos dados

            } catch (error) {
                console.error('Erro ao cadastrar a Turma:', error);
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }

        }

        async function deletarTurma(codigo) {
            Swal.fire({
                title: 'Atenção!',
                text: 'Tem certeza que deseja remover essa Turma?',
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
                    const request = await fetch('../Turma/desativar', config);
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
            const tabela = document.getElementById("conteudo-Turma");
            const linhas = tabela.getElementsByTagName("tr");

            for (let i = 0; i < linhas.length; i++) {
                const colDescricao = linhas[i].getElementsByTagName("td")[1]; // Coluna da Descrição
                const colCapacidade = linhas[i].getElementsByTagName("td")[2]; // Coluna da Capacidade
                const colDataIni = linhas[i].getElementsByTagName("td")[3]; // Coluna da Data de Inicio

                if (colDescricao) { // Verifica se as colunas existem
                    const descricaoTexto = colDescricao.textContent || colDescricao.innerText;
                    const capacidadeTexto = colCapacidade.textContent || colCapacidade.innerText;
                    const dataIniTexto = colDataIni.textContent || colDataIni.innerText;

                    if ((descricaoTexto.toLowerCase().indexOf(filter) > -1) || 
                       (capacidadeTexto.toLowerCase().indexOf(filter) > -1) || 
                       (dataIniTexto.toLowerCase().indexOf(filter) > -1)) {
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
