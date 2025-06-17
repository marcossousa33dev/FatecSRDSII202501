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

    <title>Mapeamento</title>
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
        <section class="secao4" id="cadastroMapeamento">

            <div id="btnCadastroModal" style="display: flex; gap: 10px; align-items: center;">
                <input type="text" id="inputPesquisa" class="form-control" placeholder="Pesquisar"
                    onkeyup="filtrarTabela()" style="max-width: 250px; height: 100%;">
                <button id="botaoModal" type="button" class="btn btn-outline-primary btnAcao" data-toggle="modal"
                    data-target="#cadastroMapeamentoModal" style="height: 100%;">
                    Cadastrar Nova Reserva
                </button>

                <!-- Botão Deletar Selecionados, inicialmente escondido -->
                <button id="btnDeletarSelecionados" type="button" class="btn btn-outline-primary btnAcao"
                    style="height: 100%;  margin-top: 15px;">Deletar Selecionados</button>
            </div>

            <div class="modal fade" id="cadastroMapeamentoModal" tabindex="-1" role="dialog"
                aria-labelledby="cadastroMapeamentoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cadastroMapeamentoModalLabel">Cadastrar Nova Reserva</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form id="formCadastroMapeamento" method="post" class="modal-content">
                            <div class="modal-body">

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="selectSalas" class="col-form-label">Sala</label>
                                        <select id="selectSalas" name="selectSalas" class="form-control" required>
                                            <option value="">Selecione uma sala</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="selectTurma" class="col-form-label">Turma</label>
                                        <select id="selectTurma" name="selectTurma" class="form-control" required>
                                            <option value="">Selecione uma Turma</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="selectProfessor" class="col-form-label">Docente</label>
                                        <select id="selectProfessor" name="selectProfessor" class="form-control"
                                            required>
                                            <option value="">Selecione um Docente</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="dataInicio" class="col-form-label">Data Inicial</label>
                                        <input type="date" id="dataInicio" name="dataInicio" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dataFim" class="col-form-label">Data Final</label>
                                        <input type="date" id="dataFim" name="dataFim" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="selectHorario" class="col-form-label">Horário</label>
                                        <select id="selectHorario" name="selectHorario" class="form-control" required>
                                            <option value="">Selecione um Horário</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="selectDiaSemana" class="col-form-label">Dias da Semana</label>
                                        <div id="selectDiaSemana" class="d-flex justify-content-between"
                                            style="font-size: 0.85rem;">
                                            <label>
                                                <input type="checkbox" name="diasSemana[]" value="1"> Segunda
                                            </label>
                                            <label>
                                                <input type="checkbox" name="diasSemana[]" value="2"> Terça
                                            </label>
                                            <label>
                                                <input type="checkbox" name="diasSemana[]" value="3"> Quarta
                                            </label>
                                            <label>
                                                <input type="checkbox" name="diasSemana[]" value="4"> Quinta
                                            </label>
                                            <label>
                                                <input type="checkbox" name="diasSemana[]" value="5"> Sexta
                                            </label>
                                            <label>
                                                <input type="checkbox" name="diasSemana[]" value="6"> Sábado
                                            </label>
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
        </section>
        <section>
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Editar Mapeamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formEditMapeamento" method="post">
                            <div class="modal-body">
                                <input type="hidden" id="editId" name="editId">

                                <div class="form-group">
                                    <label for="editSelectSalas" class="col-form-label">Sala</label>
                                    <select id="editSelectSalas" name="editSelectSalas" class="form-control" required>
                                        <option value="">Selecione uma sala</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="editSelectTurma" class="col-form-label">Turma</label>
                                    <select id="editSelectTurma" name="editSelectTurma" class="form-control" required>
                                        <option value="">Selecione uma Turma</option>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="editSelectProfessor" class="col-form-label">Professor</label>
                                        <select id="editSelectProfessor" name="editSelectProfessor" class="form-control"
                                            required>
                                            <option value="">Selecione um Docente</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <label for="dataEditar" class="col-form-label">Data</label>
                                        <input type="date" id="dataEditar" name="dataEditar" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-7">
                                        <label for="editSelectHorario" class="col-form-label">Horário</label>
                                        <select id="editSelectHorario" name="editSelectHorario" class="form-control"
                                            required>
                                            <option value="">Selecione um Horário</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btnAcao" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btnAcao"
                                    onclick="editarMapeamento(event);">Salvar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </section>
        <section id="mostrarCadastro">
            <div class="table-responsive tabela-scroll">
                <div id="spinner" style="display: none; text-align: center; margin-top: 10px;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Carregando...</span>
                    </div>
                </div>

                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selecionarTodos"></th>
                            <th>Sala</th>
                            <th>Descrição da Sala</th>
                            <th>Turma</th>
                            <th>Docente</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="conteudo-Mapeamento">
                        <!-- As linhas serão geradas dinamicamente via JavaScript -->
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
                const sala = document.getElementById('selectSalas').value;
                const turma = document.getElementById('selectTurma').value;
                const professor = document.getElementById('selectProfessor').value;
                const horario = document.getElementById('selectHorario').value;
                const dataFim = document.getElementById('dataFim').value;
                const dataInicio = document.getElementById('dataInicio').value;
                const checkMarcado = document.querySelectorAll('#selectDiaSemana input[type="checkbox"]:checked');
                const diaSemana = Array.from(checkMarcado).map(checkbox => checkbox.value);

                const response = await fetch('../Mapa/inserirNovo', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codSala: sala,
                        codHorario: horario,
                        codTurma: turma,
                        codProfessor: professor,
                        dataInicio: dataInicio,
                        dataFim: dataFim,
                        diaSemana: diaSemana
                    })
                });

                const result = await response.json();

                if (result.codigo == 1) {
                    // Fechar o modal
                    $('#cadastroMapeamentoModal').modal('hide');

                    // Mostrar uma mensagem de sucesso (opcional)
                    Swal.fire('Sucesso!', result.msg, 'success');

                    // Atualizar a tabela
                    carregarDados();
                } else {
                    Swal.fire('Erro', result.msg, 'error');
                }
            } catch (error) {
                console.error('Erro ao cadastrar o Mapeamento:', error);
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }
        }

        const spinner = document.getElementById('spinner');

        async function carregarDados() {
            try {
                spinner.style.display = 'block'; // Mostrar spinner

                const response = await fetch('../Mapa/consultar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codigo: '',
                        dataReserva: '',
                        codSala: '',
                        codHorario: '',
                        codTurma: '',
                        codProfessor: ''
                    })
                });

                const data = await response.json();

                const conteudoAcesso = document.getElementById('conteudo-Mapeamento');
                conteudoAcesso.innerHTML = ''; // Limpa o conteúdo existente

                if (data && Array.isArray(data.dados) && data.dados.length > 0) {
                    const fragmento = document.createDocumentFragment();

                    data.dados.forEach(item => {
                        const linha = document.createElement('tr');
                        linha.classList.add('alert', 'alert-warning');
                        linha.innerHTML = `
                            <td><input type="checkbox" class="selecionar-item" value="${item.codigo}"></td>
                            <td>${item.sala}</td>
                            <td>${item.descsala}</td>  
                            <td>${item.descturma}</td>
                            <td style="display:none">${item.codigo_turma}</td>   
                            <td>${item.nome_professor}</td>
                            <td style="display:none">${item.codigo_professor}</td>   
                            <td>${item.datareservabra}</td>  
                            <td style="display:none">${item.datareserva}</td>                           
                            <td>${item.deshorario}</td>
                            <td style="display:none">${item.codigo_horario}</td>   
                            <td>
                                <div class="row">
                                    <div id="btnEditModal" style="display: flex; gap: 10px; align-items: center;">
                                        <button class="btn btn-warning btnAcao" onclick="openEditModal(this, ${item.codigo})">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                    </div>
                                    <button class="btn btn-danger btnAcao btnAcaoExcluir" onclick="deletarMapeamento(${item.codigo})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>`;
                        fragmento.appendChild(linha);
                    });

                    conteudoAcesso.appendChild(fragmento);
                } else {
                    conteudoAcesso.innerHTML = '<tr><td colspan="10">Nenhum dado encontrado.</td></tr>';
                }
            } catch (error) {
                console.error('Erro ao carregar os dados:', error);
            } finally {
                spinner.style.display = 'none'; // Ocultar spinner
            }
        }

        function debounce(func, delay) {
            let timer;
            return (...args) => {
                clearTimeout(timer);
                timer = setTimeout(() => func(...args), delay);
            };
        }

        const carregarDadosDebounced = debounce(carregarDados, 300);

        $(document).ready(function() {
            carregarDados();

            $('#cadastroMapeamentoModal').on('show.bs.modal', function() {
                $('#formCadastroMapeamento')[0].reset();
            });
        });

        function openEditModal(button, codigo) {
            // A linha do botão clicado
            const row = button.closest('tr');

            // Pegar os dados da linha
            const sala = row.cells[1].innerText; // Sala            
            const turma = row.cells[4].innerText; // Turma
            const professor = row.cells[6].innerText; // Professor
            const dataMapeamento = row.cells[8].innerText; // Data
            const horario = row.cells[10].innerText; // Horário
            document.getElementById('editId').value = codigo;

            // Preenche o modal com os dados da Mapeamento
            document.getElementById('editSelectSalas').value = sala;
            document.getElementById('editSelectTurma').value = turma;
            document.getElementById('editSelectProfessor').value = professor;
            document.getElementById('dataEditar').value = dataMapeamento;
            document.getElementById('editSelectHorario').value = horario;

            // Abre o modal
            $('#editModal').modal('show');
        }

        async function editarMapeamento() {
            event.preventDefault();
            try {
                const codigo = document.getElementById('editId').value;
                const sala = document.getElementById('editSelectSalas').value;
                const turma = document.getElementById('editSelectTurma').value;
                const professor = document.getElementById('editSelectProfessor').value;
                const dataMapeamento = document.getElementById('dataEditar').value;
                const horario = document.getElementById('editSelectHorario').value;
                const response = await fetch('../Mapa/alterar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        codigo: codigo,
                        dataReserva: dataMapeamento,
                        codSala: sala,
                        codHorario: horario,
                        codTurma: turma,
                        codProfessor: professor

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
                $('#cadastroMapeamentoModal').modal('hide');
                carregarDados(); // Atualiza a tabela com os novos dados

            } catch (error) {
                console.error('Erro ao editar Mapeamento:', error);
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }

        }

        async function deletarMapeamentoMultiplos(codigos) {
            Swal.fire({
                title: 'Atenção!',
                text: 'Tem certeza que deseja remover esses Mapeamentos?',
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
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            codigos: codigos // Enviar a chave 'codigos' como esperado pelo backend
                        }),
                        headers: {
                            'Content-Type': 'application/json' // Certifique-se de incluir o cabeçalho correto
                        }
                    };

                    const request = await fetch('../Mapa/desativarMultiplos', config); // Novo endpoint para desativar múltiplos
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
                    carregarDados(); // Atualiza os dados na tabela após a exclusão
                }
            });
        }

        async function deletarMapeamento(codigo) {
            Swal.fire({
                title: 'Atenção!',
                text: 'Tem certeza que deseja remover essa Mapeamento?',
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
                    const request = await fetch('../Mapa/desativar', config);
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
            const filter = input.value.trim().toLowerCase();
            const tabela = document.getElementById("conteudo-Mapeamento");
            const linhas = tabela.getElementsByTagName("tr");

            for (let linha of linhas) {
                const celulas = linha.getElementsByTagName("td");
                
                if (celulas.length > 0) {
                    const conteudoLinha = Array.from(celulas)
                        .map(celula => celula.textContent.trim().toLowerCase())
                        .join(" ");

                    linha.style.display = conteudoLinha.includes(filter) ? "" : "none";
                }
            }
        }

        $(document).ready(function() {
            // Faz a requisição para listar as salas
            $.ajax({
                url: '../Sala/listar', // URL para chamar o método listar no controlador
                method: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    // Popula o select com as salas recebidas
                    if (retorno.codigo == 1) {
                        $.each(retorno.dados, function(index, item) {
                            $('#selectSalas').append($('<option>', {
                                value: item.codigo,
                                text: item.codigo + " - " + item.descricao // ou qualquer atributo que você deseja mostrar
                            }));
                        });
                    } else {
                        $('#selectSalas').append('<option value="">Nenhuma sala cadastrada</option>');
                    }
                },
                error: function() {
                    alert('Erro ao carregar as salas.');
                }
            });

            // Faz a requisição para listar as salas em edição
            $.ajax({
                url: '../Sala/listar', // URL para chamar o método listar no controlador
                method: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    // Popula o select com as salas recebidas
                    if (retorno.codigo == 1) {
                        $.each(retorno.dados, function(index, item) {
                            $('#editSelectSalas').append($('<option>', {
                                value: item.codigo,
                                text: item.codigo + " - " + item.descricao // ou qualquer atributo que você deseja mostrar
                            }));
                        });
                    } else {
                        $('#editSelectSalas').append('<option value="">Nenhuma sala cadastrada</option>');
                    }
                },
                error: function() {
                    alert('Erro ao carregar as salas.');
                }
            });

            // Faz a requisição para listar os professores
            $.ajax({
                url: '../Professor/listar', // URL para chamar o método listar no controlador
                method: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    // Popula o select com aos professores recebidos
                   if (retorno.codigo == 1) {
                         $.each(retorno.dados, function(index, item) {
                            $('#selectProfessor').append($('<option>', {
                                value: item.codigo,
                                text: item.nome // ou qualquer atributo que você deseja mostrar
                            }));
                        });
                    } else {
                        $('#selectProfessor').append('<option value="">Nenhum professor cadastrado</option>');
                    }
                },
                error: function() {
                    alert('Erro ao carregar informações.');
                }
            });

            // Faz a requisição para listar os professores em edição
            $.ajax({
                url: '../Professor/listar', // URL para chamar o método listar no controlador
                method: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    // Popula o select com aos professores recebidos
                    if (retorno.codigo == 1) {
                        $.each(retorno.dados, function(index, item) {
                            $('#editSelectProfessor').append($('<option>', {
                                value: item.codigo,
                                text: item.nome // ou qualquer atributo que você deseja mostrar
                            }));
                        });
                    } else {
                        $('#editSelectProfessor').append('<option value="">Nenhum professor cadastrado</option>');
                    }
                },
                error: function() {
                    alert('Erro ao carregar informações.');
                }
            });

            // Faz a requisição para listar as turmas
            $.ajax({
                url: '../Turma/listar', // URL para chamar o método listar no controlador
                method: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    // Popula o select com as turmas recebidas
                    if (retorno.codigo == 1) {
                        $.each(retorno.dados, function(index, item) {
                            $('#selectTurma').append($('<option>', {
                                value: item.codigo,
                                text: item.descricao // ou qualquer atributo que você deseja mostrar
                            }));
                        });
                    } else {
                        $('#selectTurma').append('<option value="">Nenhuma turma cadastrada</option>');
                    }
                },
                error: function() {
                    alert('Erro ao carregar informações.');
                }
            });

            // Faz a requisição para listar as turmas em edição
            $.ajax({
                url: '../Turma/listar', // URL para chamar o método listar no controlador
                method: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    // Popula o select com as turmas recebidas
                    if (retorno.codigo == 1) {
                        $.each(retorno.dados, function(index, item) {
                            $('#editSelectTurma').append($('<option>', {
                                value: item.codigo,
                                text: item.descricao // ou qualquer atributo que você deseja mostrar
                            }));
                        });
                    } else {
                        $('#editSelectTurma').append('<option value="">Nenhuma turma cadastrada</option>');
                    }
                },
                error: function() {
                    alert('Erro ao carregar informações.');
                }
            });

            // Faz a requisição para listar os horários
            $.ajax({
                url: '../Horario/listar', // URL para chamar o método listar no controlador
                method: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    // Popula o select com os horários recebidos
                    if (retorno.codigo == 1) {
                        $.each(retorno.dados, function(index, item) {
                            $('#selectHorario').append($('<option>', {
                                value: item.codigo,
                                text: item.descricao // ou qualquer atributo que você deseja mostrar
                            }));
                        });
                    } else {
                        $('#selectHorario').append('<option value="">Nenhum horário cadastrado</option>');
                    }
                },
                error: function() {
                    alert('Erro ao carregar informações.');
                }
            });

            // Faz a requisição para listar os horários em edição
            $.ajax({
                url: '../Horario/listar', // URL para chamar o método listar no controlador
                method: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    // Popula o select com os horários recebidos
                    if (retorno.codigo == 1) {
                        $.each(retorno.dados, function(index, item) {
                            $('#editSelectHorario').append($('<option>', {
                                value: item.codigo,
                                text: item.descricao // ou qualquer atributo que você deseja mostrar
                            }));
                        });
                    } else {
                        $('#editSelectHorario').append('<option value="">Nenhum horário cadastrado</option>');
                    }
                },
                error: function() {
                    alert('Erro ao carregar informações.');
                }
            });


        });

        document.getElementById('btnDeletarSelecionados').addEventListener('click', function() {
            let selecionados = [];
            document.querySelectorAll('.selecionar-item:checked').forEach(item => {
                selecionados.push(item.value);
            });

            if (selecionados.length > 0) {
                deletarMapeamentoMultiplos(selecionados);
            } else {
                Swal.fire({
                    title: 'Atenção!',
                    text: 'Selecione pelo menos um item para excluir!',
                    icon: 'warning',
                    customClass: {
                        popup: 'my-swal-popup',
                        title: 'my-swal-title',
                        html: 'my-swal-text',
                        confirmButton: 'btn btn-primary btnAcao',
                    },
                    buttonsStyling: false
                });
            }
        });
    </script>
</body>
</html>