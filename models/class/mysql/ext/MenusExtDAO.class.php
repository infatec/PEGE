<?php
/**
 * Class that operate on table 'menus'. Database MsSql.
 *
 * @author: http://phpdao.com
 * @date: 2010-02-19 23:50
 */
class MenusExtDAO extends MenusDAO{
    
     /**
     * Retorna o Menu diacordo com as permissões
     *
     * 
     * @return ArrayMenu 
     */
    public function getMenu($url,$gera=0)
    {
      //  session_start();
        $idtipo_mvf_g=$_SESSION["idtipo_mvf_g"];//tipo de usuario 1- super usuario 0-usuario comum
        $grupo_id=$_SESSION["idgrupo_mvf_g"];
        //exit;
        if(!$idtipo_mvf_g) //caso n seja super usuario verificar os menus que o usuario logado tem permissão
            $sql = "SELECT     menus.nome,menus.id, menus.ordem, menus.status, grupo_usuario_menus.permissao, 
                      grupo_usuario_menus.grupo_id
FROM         grupo_usuario_menus INNER JOIN
                      menus ON grupo_usuario_menus.menu_id = menus.id WHERE 
                      status = 1 and permissao<>0 and grupo_usuario_menus.grupo_id=? ".$criterio_a." order by ordem asc";   
        else
            $sql="select id,nome from menus where status = 1 ".$criterio_a." order by ordem asc";
        
        $query_menu = new SqlQuery($sql);
        if(!$idtipo_mvf_g) $query_menu->setNumber($grupo_id);
        
        $rs_menu = $this->Execute($query_menu);
        $menu_str = '<ul>
			<li>
				<a href="'.$url.'/index.php">Principal</a>
				
			</li>';
        foreach($rs_menu as $dados)
        {
            
            $menu_str .='<li >
						 <a class="qmparent" href="javascript:;">'.$dados["nome"].'</a>';
            
            $tabelas = $this->getTabelas($dados["id"],$url);
            
            if(!empty($tabelas))
            {
                $menu_str .='<ul>';
                $menu_str .=$tabelas;            
                                            
                $menu_str .='</ul>';
            } 
            $menu_str .='</li>';                 
        }
        $menu_str.= '<li class="qmclear">&nbsp;</li>';
		$menu_str.= '</ul>';
        
        return $menu_str;
                      
    }
    /**
     * Retorna as tabelas diacordo com as permissões
     *
     * @param Integer $menu_id 
     * @return ArrayTabelas
     */
    public function getTabelas($menu_id,$url,$gera=0)
    {
       // session_start();
        $idtipo_mvf_g=$_SESSION["idtipo_mvf_g"];//tipo de usuario 1- super usuario 0-usuario comum
        $grupo_id=$_SESSION["idgrupo_mvf_g"];
        if(!$idtipo_mvf_g)
            $sql="SELECT grupo_usuario_tabelas.permissao, grupo_usuario_tabelas.grupo_id, 
                    tabelas.id, tabelas.nome, tabelas.pasta,tabelas.tabela_id,
                    tabelas.status,tabelas.menu_id FROM tabelas INNER JOIN
                     grupo_usuario_tabelas ON tabelas.id = grupo_usuario_tabelas.tabela_id WHERE 
                      status = 1 and menu_id =? and permissao<>0 and 
                      grupo_id=? and (tabelas.tabela_id=0 or tabelas.tabela_id is NULL) order by tabelas.ordem asc ";
        else
            $sql="select * from tabelas where 
                  status = 1 and menu_id =? and (tabela_id=0 or tabela_id is NULL) order by tabelas.ordem asc";
                  
        $query_tbl = new SqlQuery($sql);
        $query_tbl->setNumber($menu_id);
        if(!$idtipo_mvf_g) $query_tbl->setNumber($grupo_id);
        
        $rs_tbl = $this->Execute($query_tbl);
        
        $tabelas_str="";
        
        foreach($rs_tbl as $dados)
        {
            
            $submenu = $this->getSubMenu($dados["id"],$url);
            if(empty($submenu))
            {
                $tabelas_str.= '
				<li>
					<a href="'.$url.'/modulos/'.$dados['pasta'].'/">'.$dados['nome'].'</a>
				</li>
				';
                //print_r($dados);
            }
            else
            {
                $tabelas_str.='
				<li>
					<a class="qmparent" href="javascript:;">'.$dados['nome'].'</a>
					'.$submenu.'
				</li>
				';
            }
        }
        return $tabelas_str;
    }
    /**
     * Retorna submenu
     *
     * @param Integer $tabela_id primary key
     * @return ArraySubMenu
     */
    public function getSubMenu($tabela_id,$url,$gera=0)
    {
      //  session_start();
        $idtipo_mvf_g=$_SESSION["idtipo_mvf_g"];//tipo de usuario 1- super usuario 0-usuario comum
        $grupo_id=$_SESSION["idgrupo_mvf_g"];
        if(!$idtipo_mvf_g)
            $sql="SELECT grupo_usuario_tabelas.permissao, grupo_usuario_tabelas.grupo_id, 
                    tabelas.id, tabelas.nome, tabelas.pasta,tabelas.tabela_id,
                    tabelas.status,tabelas.menu_id FROM tabelas INNER JOIN
                     grupo_usuario_tabelas ON tabelas.id = grupo_usuario_tabelas.tabela_id WHERE 
                      status = 1 and permissao<>0 and 
                      grupo_id=? and tabelas.tabela_id=? order by tabelas.ordem asc ";
        else
            $sql="select * from tabelas where 
                  status = 1 and tabela_id=? order by tabelas.ordem asc";
                  
        $query_sub = new SqlQuery($sql);
        
        if(!$idtipo_mvf_g) $query_sub->setNumber($grupo_id);
        $query_sub->setNumber($tabela_id);
        
        $rs_sub = $this->execute($query_sub);
        
        $submenu_str='';
        if(count($rs_sub)>0)
        {
            $submenu_str.='<ul>';
            foreach($rs_sub as $dados)
            {
                
                $submenu = $this->getSubMenu($dados["id"],$url);
                if(empty($submenu))   
                {
                    $submenu_str.='<li>
								<a href="'.$url.'/modulos/'.$dados['pasta'].'/">'.$dados['nome'].'</a>
							</li>';
                    
                }
                else
                {
                    
                    $submenu_str.= '<li>
							<a class="qmparent" href="javascript:;">'.$dados['nome'].'</a>
							'.$submenu.'
						</li>
						'; 
                }
            }
            $submenu_str.='</ul>';
        }
      
        return $submenu_str;        
    }	
    public function permissoesMenu($grupo_id,$gera=0)
    {
        $sql="select id,nome,
             (select count(id) from grupo_usuario_menus where menu_id=menus.id and grupo_id= ".$grupo_id." ) 
             as permissao from menus where status=1";
        $query = new SqlQuery($sql);
        $rs_menus = $this->execute($query);
        return $rs_menus;
        
    }
}
?>