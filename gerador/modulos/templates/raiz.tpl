<?php
    include("includes.php");
    
    include(DOMAIN_PATH."modulos/${table_name}/controllers/${pagina}.Controller.php");
    
    ##### VIEW  ###############
    
    include(DOMAIN_PATH."modulos/${table_name}/views/${pagina}.View.php");
      
?>