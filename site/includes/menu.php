<div id="nav">

    <div id="sn">
        <ul class="sn">

        </ul>
    </div>

    <ul id="topnav" class="sf-menu">
        <li><a href="index.php" class="current">Inicio</a></li>
        <!-- SE O USUÁRIO ESTIVER LOGADO -->
        <? if($_SESSION['nome_usuario']): ?>
            <li><a href="javascript:;">Escola </a>
                <ul>
                    <li><a href="escola.php">Cadastro</a></li>
                    <li><a href="materiais.php">Materiais</a></li>
                    <li><a href="patrimonio.php">Patrimônio</a></li>
                    <li><a href="financeiro.php">Financeiro</a></li>
                    <li><a href="config_escola.php">Configuração da escola</a></li>

                </ul>
            </li>
            <li><a href="javascript:;">Aluno</a>
                <ul>
                    <li><a href="aluno.php">Cadastro</a></li>
                    <li><a href="carteira_estudantil.php">Carteira de Estudante</a></li>

                </ul>
            </li>
            <li><a href="javascript:;">Servidor</a>
                <ul>

                    <li><a href="professor.php">Cadastro</a></li>

                </ul>
            </li>

            <li><a href="javascript:;">Acadêmico</a>

                <ul>
                    <li><a href="#" onclick="carregar_controler('controler_ano_letivo.php')">Ano Letivo</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_periodo.php')">Período</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_curso.php')">Curso</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_classe.php')">Classe</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_turno.php')">Turno</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_disciplina.php')">Disciplina</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_avaliacao.php')">Avaliação</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_turma.php')">Turma</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_matricula.php')">Matrícula</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_notas.php')">Lançar Notas</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_faltas.php')">Lançar Faltas</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_boletim.php')">Boletim</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_pauta.php')">Diário de Classe</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_ficha_individual.php')">Ficha Individual</a></li>
                    <li><a href="#" onclick="carregar_controler('controler_historico.php')">Histórico Escolar</a></li>
                </ul>

            </li>

            <li><a href="javascript:;">Configuração MEC</a>
                <ul>

                    <li><a href="cad_distritos.php">Distritos</a></li>
                    <li><a href="cad_tipo_ensino.php">Tipos de Ensino</a></li>
                    <li><a href="cad_nivel_ensino.php">Nível de ensino</a></li>
                    <li><a href="cad_mod_ensino.php">Modalidades de Ensino</a></li>
                    <li><a href="cad_habilitacao.php">Habilitações</a></li>
                    <li><a href="cad_funcoes.php">Funções</a></li>
                    <li><a href="cad_cargos.php">Cargos</a></li>
                    <li><a href="geraCenso.php">Censo</a></li>

                </ul>
            </li>
            <li><a href="ced.php">CED</a></li>
            <li><a href="portaria.php">Portaria</a></li>
            <li><a href="logout.php">Sair</a></li>
        <? endif; ?>
        <!-- FIM MENU USUÁRIO  ---------------->
    </ul><!-- #topnav -->
</div><!-- #nav -->