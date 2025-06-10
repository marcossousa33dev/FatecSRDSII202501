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

    <title>Periodo</title>

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
        <section class="secao4" id="cadastroPeriodo">
            <div id="btnCadastroModal">
                <input type="text" id="inputPesquisa" class="form-control" placeholder="Pesquisar período"
                    onkeyup="filtrarTabela()" style="max-width: 250px; height: 100%;">

                <button id="botaoModal" type="button" class="btn btn-outline-primary btnAcao" data-toggle="modal"
                    data-target="#cadastroPeriodoModal">
                    Cadastrar Novo Período
                </button>
            </div>
            <div class="modal fade" id="cadastroPeriodoModal" tabindex="-1" role="dialog"
                aria-labelledby="cadastroPeriodoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cadastroPeriodoModalLabel">Cadastrar Novo Período</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formCadastroPeriodo" method="post" class="modal-content">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="descricao" class="col-form-label">Descrição</label>
                                    <input type="text" id="descricao" name="descricao" class="form-control" required>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group">
                                        <label for="horaIni" class="col-form-label">Horário Inícial</label>
                                        <input type="time" id="horaIni" name="horaIni" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="horaFim" class="col-form-label">Horário Final</label>
                                        <input type="time" id="horaFim" name="horaFim" class="form-control"
                                            required>
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
                            <h5 class="modal-title" id="editModalLabel">Editar Periodo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formEditPeriodo" method="post">
                            <div class="modal-body">
                                <input type="hidden" id="editId" name="editId">
                                <div class="form-group">
                                    <label for="editDescricao">Descrição</label>
                                    <input type="text" id="editDescricao" name="descricao" class="form-control"
                                        required>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="editHoraIni" class="col-form-label">Horário Inicial</label>
                                        <input type="time" id="editHoraIni" name="editHoraIni"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="editHoraFim" class="col-form-label">Horário Final</label>
                                        <input type="time" id="editHoraFim" name="editHoraFim"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btnAcao" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btnAcao" onclick="editarPeriodo();">Salvar</button>
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
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Horário Inicial</th>
                            <th>Horário Final</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="conteudo-Periodo">
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
            const horaIni = document.getElementById('horaIni').value;
            const horaFim = document.getElementById('horaFim').value;

            try {
                const response = await fetch('../Horario/inserir', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        descricao: descricao,
                        horaInicial: horaIni,
                        horaFinal: horaFim
                    })
                });

                const result = await response.json();

                if (result.codigo == 1) {
                    // Fechar o modal
                    $('#cadastroPeriodoModal').modal('hide');

                    // Mostrar uma mensagem de sucesso (opcional)
                    Swal.fire('Sucesso!', result.msg, 'success');

                    // Atualizar a tabela
                    carregarDados();
                } else {
                    Swal.fire('Erro', result.msg, 'error');
                }
            } catch (error) {
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }
        }

        async function carregarDados() {
            try {

                const response = await fetch('../Horario/consultar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codigo: '',
                        descricao: '',
                        horaInicial: '',
                        horaFinal: ''
                    })
                });

                const data = await response.json();

                const conteudoAcesso = document.getElementById('conteudo-Periodo');

                // Limpar a tabela antes de preencher com novos dados
                conteudoAcesso.innerHTML = '';

                // Preencher a tabela com os dados recebidos
                data.dados.forEach(item => {

                    conteudoAcesso.innerHTML += `
                        <tr class="alert alert-warning">
                            <td>${item.codigo}</td>
                            <td>${item.descricao}</td>
                            <td>${item.hora_ini}</td>
                            <td>${item.hora_fim}</td>
                            <td>
                                <div class="row">
                                    <button class="btn btn-warning btnAcao" onclick="openEditModal(this)">
                                        <i class="fas fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger btnAcao btnAcaoExcluir" onclick="deletarPeriodo(${item.codigo})">
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

            $('#cadastroPeriodoModal').on('show.bs.modal', function() {
                $('#formCadastroPeriodo')[0].reset();
            });
        });

        function openEditModal(button) {
            // A linha do botão clicado
            const row = button.closest('tr');

            // Pegar os dados da linha
            const codigo = row.cells[0].innerText; // Código da Periodo
            const descricao = row.cells[1].innerText; // Descrição da Periodo
            const horaIni = row.cells[2].innerText;
            const horaFim = row.cells[3].innerText;
            // Preenche o modal com os dados da Periodo
            document.getElementById('editId').value = codigo;
            document.getElementById('editDescricao').value = descricao;
            document.getElementById('editHoraIni').value = horaIni;
            document.getElementById('editHoraFim').value = horaFim;

            // Abre o modal
            $('#editModal').modal('show');
        }

        async function editarPeriodo() {
            event.preventDefault();
            try {
                const codigo = document.getElementById('editId').value;
                const descricao = document.getElementById('editDescricao').value;
                const horaIni = document.getElementById('editHoraIni').value;
                const horaFim = document.getElementById('editHoraFim').value;

                const response = await fetch('../Horario/alterar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codigo: codigo,
                        descricao: descricao,
                        horaInicial: horaIni,
                        horaFinal: horaFim
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
                $('#cadastroPeriodoModal').modal('hide');
                carregarDados(); // Atualiza a tabela com os novos dados

            } catch (error) {
                console.error('Erro ao cadastrar a Periodo:', error);
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }

        }

        async function deletarPeriodo(codigo) {
            Swal.fire({
                title: 'Atenção!',
                text: 'Tem certeza que deseja remover esse Periodo?',
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
                    const request = await fetch('../Horario/desativar', config);
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
            const tabela = document.getElementById("conteudo-Periodo");
            const linhas = tabela.getElementsByTagName("tr");

            for (let i = 0; i < linhas.length; i++) {
                const colDescricao = linhas[i].getElementsByTagName("td")[0]; 
                const colHoraIni = linhas[i].getElementsByTagName("td")[1];
                const colHoraFim = linhas[i].getElementsByTagName("td")[2];

                if (colDescricao) { // Verifica se as colunas existem
                    const descTexto = colDescricao.textContent || colDescricao.innerText;
                    const hrIniTexto = colHoraIni.textContent || colHoraIni.innerText;
                    const hrFimexto = colHoraFim.textContent || colHoraFim.innerText;

                    // Verifica se o filtro corresponde ao nome do professor ou ao CPF
                    if (descTexto.toLowerCase().indexOf(filter) > -1 || hrIniTexto.toLowerCase().indexOf(filter) > -1 
                       || hrFimexto.toLowerCase().indexOf(filter) > -1) {
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