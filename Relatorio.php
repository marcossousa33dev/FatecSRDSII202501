<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Reservas</title>
    <link rel="icon" href="../../fatecsrdsii202501/assets/img/icone_fatecSR.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../senac/assets/css/bootstrap.min.css">
    <script src="../../senac/assets/js/jquery-3.6.0.min.js"></script>
    <script src="../../senac/assets/js/bootstrap.min.js"></script>
    <script src="../../senac/assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../senac/assets/css/styleCadastro.css">

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

        main {
            margin-top: 150px;
            /* Ajuste conforme a altura do seu header */
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
        <div id="conteudoPrincipal">
            <div class="container mt-4">
                <h2 style="color: #C0C0C0;">Relatório de Reservas</h2>
                <div class="row">
                    <div class="col-md-4">
                        <label for="dataRelatorio" style="color: #C0C0C0;">Data da Reserva:</label>
                        <input type="date" id="dataRelatorio" class="form-control">
                    </div>
                    <div class="col-md-8 mt-4">
                        <button class="btn btn-outline-primary btnAcao" onclick="gerarRelatorio()">Gerar
                            Relatório</button>
                        <button class="btn btn-outline-primary btnAcao"
                            onclick="imprimirRelatorio('tabelaRelatorio')">Imprimir Relatório de
                            Chaves</button>
                        <button class="btn btn-outline-primary btnAcao"
                            onclick="imprimirRelatorioVisualizacao()">Imprimir Relatório de
                            Visualização</button>
                        <button class="btn btn-outline-primary btnAcao" 
                                onclick="imprimirRelatorioTV()">Mostrar na TV</button>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered mt-3" id="tabelaRelatorio">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Sala</th>
                            <th>Turma</th>
                            <th>Docente</th>
                            <th>Horário</th>
                            <th>Retirada</th>
                            <th>Entrega</th>
                            <th>Visto</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div id="relatorioTV" style="display: none;"></div>
    </main>

    <script>
        async function gerarRelatorio() {
            try {
                const dataMapa = document.getElementById('dataRelatorio').value;
                if (!dataMapa) {
                    Swal.fire('Erro', 'Por favor, informe uma data.', 'error');
                    return;
                }

                const response = await fetch('../Relatorio/gerarMapaNovo', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        dataMapa
                    })
                });
                const result = await response.json();

                if (result.codigo == 1) {
                    Swal.fire('Sucesso!', result.msg, 'success');
                    preencherTabela(result.dados);
                } else {
                    Swal.fire('Erro', result.msg, 'error');
                    limparTabela();
                }
            } catch (error) {
                Swal.fire('Erro', 'Ocorreu um erro ao processar a requisição.', 'error');
            }
        }

        function preencherTabela(dados) {
            let tabela = document.getElementById('tabelaRelatorio').getElementsByTagName('tbody')[0];
            tabela.innerHTML = "";
            dados.forEach(reserva => {
                let linha = tabela.insertRow();
                linha.insertCell(0).innerText = reserva.datareserva;
                linha.insertCell(1).innerText = reserva.desc_codigo + " - " + reserva.desc_sala;
                linha.insertCell(2).innerText = reserva.desc_turma;
                linha.insertCell(3).innerText = reserva.nome_professor;
                linha.insertCell(4).innerText = reserva.desc_periodo;
                linha.insertCell(5).innerText = " ";
                linha.insertCell(6).innerText = " ";
                linha.insertCell(7).innerText = " ";
            });
        }

        function limparTabela() {
            document.getElementById('tabelaRelatorio').getElementsByTagName('tbody')[0].innerHTML = "";
        }

        function imprimirRelatorio(tabelaId) {
            let tabelaVerifica = document.getElementById(tabelaId);
            
            // Verificar se há pelo menos uma linha de dados (excluindo cabeçalho)
            let linhas = tabelaVerifica.getElementsByTagName('tr');

            if (linhas.length <= 1) {
                Swal.fire('Erro', 'Por favor, gere o relatório primeiro, informando uma data.', 'error');
                return;
            }else{
                let tabela = document.getElementById(tabelaId).outerHTML;
                let janela = window.open('', '', 'width=900,height=600');
                janela.document.write('<html><head><title>Relatório</title>');
                janela.document.write('<style>table { width: 100%; border-collapse: collapse; } th, ');
                janela.document.write('td { border: 1px solid black; padding: 8px; text-align: left; }</style> ');
                janela.document.write('</head><body>');
                janela.document.write('<h2>Relatório de Chaves</h2>');
                janela.document.write(tabela);
                janela.document.write('</body></html>');
                janela.document.close();
                janela.print();
            }
        }

        function imprimirRelatorioVisualizacao() {
            let tabelaVerifica = document.getElementById('tabelaRelatorio');
            
            // Verificar se há pelo menos uma linha de dados (excluindo cabeçalho)
            let linhas = tabelaVerifica.getElementsByTagName('tr');

            if (linhas.length <= 1) {
                Swal.fire('Erro', 'Por favor, gere o relatório primeiro, informando uma data.', 'error');
                return;
            }else{
                let tabela = document.getElementById('tabelaRelatorio').cloneNode(true);
                for (let i = 0; i < 3; i++) {
                    for (let row of tabela.rows) {
                        row.deleteCell(-1);
                    }
                }
                let janela = window.open('', '', 'width=900,height=600');
                janela.document.write('<html><head><title>Relatório</title>');
                janela.document.write('<style>table { width: 100%; border-collapse: collapse; } th, ');
                janela.document.write('td { border: 1px solid black; padding: 8px; text-align: left; }</style>');
                janela.document.write('</head><body>');
                janela.document.write('<h2>Relatório de Visualização</h2>');
                janela.document.write(tabela.outerHTML);
                janela.document.write('</body></html>');
                janela.document.close();
                janela.print();
            }
        }

        function imprimirRelatorioTV() {
            const dadosTabela = document.getElementById('tabelaRelatorio').getElementsByTagName('tbody')[0].rows;
            if (dadosTabela.length === 0) {
                Swal.fire('Erro', 'Nenhum dado disponível para exibição.', 'error');
                return;
            }

            let conteudoHeader = document.querySelector('header');
            let containerRelatorio = document.getElementById('relatorioTV');
            let containerPrincipal = document.getElementById('conteudoPrincipal'); // Adicione um ID no conteúdo original da página

            // Esconde o conteúdo principal e exibe o relatório em tela cheia
            conteudoHeader.style.display = "none";
            containerPrincipal.style.display = "none";
            containerRelatorio.style.display = "flex";

            let estilos = `
                    <style>
                        * { margin: 0; padding: 0; box-sizing: border-box; }
                        body, html { width: 100%; height: 100%; overflow: hidden; background-color: #1C1C1C; 
                        font-family: Arial, sans-serif; }
                        #relatorioTV { position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                        background-color: #1C1C1C; color: white; display: flex; 
                        flex-direction: column; align-items: center; justify-content: flex-start; padding: 20px; }
                        .card-container { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; 
                        max-width: 90vw; overflow-y: auto; margin-top: 100px; }
                        .card { width: 200px; height: 200px; padding: 10px; display: flex; 
                        flex-direction: column; justify-content: center; align-items: center; 
                        border-radius: 10px; 
                        color: white; font-size: 14px; font-weight: bold; text-align: center; }
                        .floor-0 { background-color: rgb(128, 128, 128); }
                        .floor-1 { background-color: rgb(52, 122, 69); }
                        .floor-2 { background-color: rgb(66, 149, 226); }
                        .floor-3 { background-color: rgb(178, 41, 196); }
                        .floor-4 { background-color: #483D8B; }
                        .floor-5 { background-color: #f7941d; }
                        .floor-6 { background-color: rgb(200, 50, 50); }
                        .btn-voltar, .btn-periodo { font-size: 16px; padding: 10px 20px; cursor: pointer; 
                        border-radius: 5px; color: white; }
                        .btn-voltar { position: absolute; top: 20px; left: 20px; background-color: red; }
                        .btn-voltar:hover { background-color: darkred; }
                        .btn-periodo { background-color: #333; margin: 0 10px; padding: 10px 20px; }
                        .btn-periodo:hover { background-color: #555; }

                        /* Agrupando os botões em linha */
                        .btn-container {
                            display: flex;
                            justify-content: center;
                            gap: 10px; /* Espaço entre os botões */
                            position: absolute;
                            top: 60px;
                            width: 100%;
                        }
                    </style>
                `;

            let conteudo = `
                <button class="btn-voltar" onclick="voltarParaPrincipal()">Voltar</button>
                <div class="btn-container">
                    <button class="btn-periodo" onclick="filtrarPeriodo('manha')">Manhã</button>
                    <button class="btn-periodo" onclick="filtrarPeriodo('tarde')">Tarde</button>
                    <button class="btn-periodo" onclick="filtrarPeriodo('noite')">Noite</button>
                </div>
                <div class="card-container" id="cardsContainer">
            `;

            let dadosOrdenados = [];

            // Organizar os dados
            for (let i = 0; i < dadosTabela.length; i++) {
                let sala = dadosTabela[i].cells[1].innerText;
                let turma = dadosTabela[i].cells[2].innerText;
                let professor = dadosTabela[i].cells[3].innerText;
                let horario = dadosTabela[i].cells[4].innerText;

                let andar = parseInt(sala.match(/\d+/)[0].charAt(0)) || 0;
                andar = andar > 6 ? 6 : andar;

                // Definir o período com base no horário
                let periodo = 'manha';  // Exemplo simplificado
                if (horario.includes('Tarde') || horario.includes('13:30')) {
                    periodo = 'tarde';
                } else if (horario.includes('Noite') || horario.includes('19:00')) {
                    periodo = 'noite';
                }

                dadosOrdenados.push({ sala, turma, professor, horario, andar, periodo });
            }

            // Ordena por andar
            dadosOrdenados.sort((a, b) => a.andar - b.andar);

            // Criar os cards
            dadosOrdenados.forEach(dado => {
                conteudo += `
                    <div class="card floor-${dado.andar}" data-periodo="${dado.periodo}">
                        <div>Sala: ${dado.sala}</div>
                        <div>Turma: ${dado.turma}</div>
                        <div>Professor: ${dado.professor}</div>
                        <div>Período: ${dado.horario}</div>
                    </div>
                `;
            });

            conteudo += `</div>`;

            // Insere os estilos e os cards na div
            containerRelatorio.innerHTML = estilos + conteudo;

            // Filtra os cards para exibir apenas os da manhã por padrão
            filtrarPeriodo('manha');
        }

        // Função para voltar à tela principal
        function voltarParaPrincipal() {
            document.getElementById('relatorioTV').style.display = "none";
            document.getElementById('conteudoPrincipal').style.display = "block";
            document.querySelector("header").style.display = "flex";
        }

        // Função para filtrar os cards por período
        function filtrarPeriodo(periodo) {
            let cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                // Exibe ou esconde o card baseado no período
                if (card.getAttribute('data-periodo') === periodo) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

    </script>
</body>
</html>
