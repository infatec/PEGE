<!DOCTYPE html>
<html lang="pt">
<head>
    <? include("includes/header.php"); ?>
</head>
<body>

<div id="outer-container">
    <div id="container">
        <div id="header">
            <div id="logo"><a href="index.php"><img src="images/logov2.png" alt=""  /></a></div><!-- end #logo -->
            <!-- INCLUDE PARA O MENU DO SISTEMA -->
            <? include("includes/menu.php"); ?>
            <!-- -->
        </div><!-- end #header -->

        <div id="before-content" class="useimage">
            <div class="line-shadow"></div>
            <img src="images/header-img/page-header1.jpg" alt="" />
            <div class="title-and-desc ">
                <h1 class="pagetitle" style="font-size: 22px;">
                    Secretaria Municipal de Educação<br>Caxias - MA

                </h1><br><div class="pagedesc">Com esta ferramenta digital será bem mais fácil e rápido fazer solicitações de documento e
                acompanhamento <br> dos alunos online, de sua casa ou trabalho. </div>
            </div><!-- title and desc -->
        </div>


        <div id="content">
            <div id="main">
                <div id="maincontent" class="positionleft">
                    <h3>Sobre o PEGE</h3>
                    <p><span>

                        PEGE é um novo sistema desenvolvido especialmente para gestão escolar de forma clara e objetiva. Integrado a
                        modernas tecnolôgias como catraca eletrônica e câmeras de segurança.
                        Use o PEGE e sinta-se avontade com as facilidades INFATEC Rumo ao Futuro Escolar.

                    </span></p>

                    <hr />
                    <h3>Recursos</h3>
                    <div class="one_third firstcols">
                        <div class="imgframe alignleft"><a href="#"><img src="images/content/s1.jpg" alt=""/></a></div>
                        <h4 class="titlecenter"><a href="#">Acesso totalmente WEB</a></h4>
                        <p><span class="textcenter">PEGE é um sistema com acesso via rede interna e externa usando a internet, todos os recursos ao seu alcance. </span><br />
                    </div>
                    <div class="one_third ">
                        <div class="imgframe alignleft"><a href="#"><img src="images/content/s2.jpg" alt=""/></a></div>
                        <h4 class="titlecenter"><a href="#">Acesso via dispósitivo móvel</a></h4>
                        <p><span class="textcenter">PEGE utilizando seu celular ou tablet com acesso a internet ou rede wifi, você pode acessar os serviços disponibilizados.</span><br />
                    </div>

                    <div class="one_third lastcols">
                        <div class="imgframe alignleft"><a href="#"><img src="images/content/s3.jpg" alt=""/></a></div>
                        <h4 class="titlecenter"><a href="#">Indicadores em gráficos</a></h4>
                        <p><span class="textcenter">Através do PEGE a secretária municipal de educação tera todos os indicadores através de gráficos. </span><br />
                    </div>


                    <div class="clear"></div><!-- clear float -->
                </div><!-- #maincontent -->

                <div id="sidebar">
                    <ul>
                        <li class="widget-container">

                            <? if($_SESSION['nome_usuario']): ?>
                                <h2 class="widget-title">Dados Usuário</h2>
                                <ul>
                                    <li><a href="#">Nome:  <?=$_SESSION['nome_usuario']?></a></li>

                                    <li><a href="logout.php">Sair</a></li>
                                </ul>

                            <? else: ?>

                                <h2 class="widget-title">Acesso Administrativo</h2>
                                <form id="form1" method="post" action="logar.php">

                                    <label for="name" id="name_label">Login <span class="note">*</span></label>
                                    <input type="text" name="login" id="login" size="35" value="" class="text-input" />
                                    <label for="email" id="email_label">Senha <span class="note">*</span></label>
                                    <input name="senha" type="password" id="senha" size="35" value="" class="text-input" />
                                    <div class="clear"></div><!-- clear float --> <br />
                                    <input type="submit" name="submit" class="button" id="submit_btn" value="Acessar Sistema"/>

                                </form>
                            <?endif;?>

                        </li>
                        <li class="widget-container latestpost">
                            <h2 class="widget-title">Infatec</h2>
                            <ul class="boxslideshow">
                                <li class="cycle">
                                    <blockquote>
                                        INFATEC é uma empresa com larga e concreta experiência no ramo de gestão escolar, com produtos inovadores em hardware e software.

                                    </blockquote>
                                    <div class="testi-name"></div>
                                </li>

                            </ul>
                        </li>
                    </ul>
                    <div class="clear"></div><!-- clear float -->
                </div><!-- #sidebar -->
                <div class="clear"></div><!-- clear float -->
            </div><!-- end #main -->
        </div>

        <? include("includes/footer.php") ?>
    </div><!-- end #container -->
</div><!-- end #outer-container -->

</body>

</html>