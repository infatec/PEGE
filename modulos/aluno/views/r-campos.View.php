<tr>
    <td colspan="2" align="left" class="text_bold_preto">
        <div id="caixa">

            <!-- Início: Seleção de abas -->

            <p id="abas">

                <a href="#aba1" class="selected">Dados Pessoais</a>
                <a href="#aba5">Exame Biométrico</a>
                <a href="#aba2">Mãe</a>
                <a href="#aba3">Pai</a>
                <a href="#aba4">Responsável</a>

            </p>

            <ul id="conteudos">

                <li id="aba1">
                    <?php include(DOMAIN_PATH."modulos/aluno/views/r-camposDadosGerais.View.php")?>
                </li>

                <li id="aba5">
                    <?php include(DOMAIN_PATH."modulos/aluno/views/r-camposExameBiometrico.View.php")?>
                </li>

                <li id="aba2">
                    <?php include(DOMAIN_PATH."modulos/aluno/views/r-camposMae.View.php")?>
                </li>

                <li id="aba3">
                    <?php include(DOMAIN_PATH."modulos/aluno/views/r-camposPai.View.php")?>
                </li>

                <li id="aba4">
                    <?php include(DOMAIN_PATH."modulos/aluno/views/r-camposResponsavel.View.php")?>
                </li>

            </ul>

            <script>
                $(document).ready(function()
                {
                    abasSimples();

                });
            </script>
        </div>
    </td>
</tr>



