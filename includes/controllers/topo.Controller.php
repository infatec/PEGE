<?
if($consulta_menu):
    $menu=DAOFactory::getMenusDAO()->getMenu(URL);
    $_SESSION["menu_sistema"]= NULL;
    $_SESSION["menu_sistema"]=$menu;
elseif(!$estaNaRaiz):
    $menu = $_SESSION["menu_sistema"];
endif;

?>
