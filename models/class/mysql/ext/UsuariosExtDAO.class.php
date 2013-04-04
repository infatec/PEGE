<?php
/**
 * Class that operate on table 'usuarios'. Database MsSql.
 *
 * @author: http://phpdao.com
 * @date: 2010-02-19 23:50
 */
class UsuariosExtDAO extends UsuariosDAO{

	public function logar($login,$senha)
    {
        $dataDoBanco = date("Y-m-d H:i:s"); 
        $sql= " select id,( select tipo from grupo_usuarios where id = usuarios.grupo_id )
                as tipo,grupo_id, nome, email, login, ultimoacesso, acessos from usuarios where 
                login = ? and senha = ? and status = 1";
                
        $query = new SqlQuery($sql);
        $query->setString($login);
        $query->setString($senha);
               
        $rs = $this->getRow($query);
        
        if(count($rs)>0)
        {
            session_start();
			$_SESSION["idusuario_mvf_g"]   = $rs->id;
			$_SESSION["idgrupo_mvf_g"]   = $rs->grupoId;
			$_SESSION["idtipo_mvf_g"]   = $rs->tipo;
			$_SESSION["loginusuario_mvf_g"] = $rs->login;
			$_SESSION["nomeusuario_mvf_g"] = $rs->nome;
			$_SESSION["emailusuario_mvf_g"] = $rs->email;
			$_SESSION["ultimoacessousuario_mvf_g"] = $rs->ultimoacesso;
			$_SESSION["acessosusuario_mvf_g"] = $rs->acessos+1;
			$_SESSION["timeout_mvf_g"] = time();
			//exit;
			$sqlu= "update usuarios set acessos=acessos+1, ultimoacesso = ? where login = ?";
            
            $query_u = new SqlQuery($sqlu);
            $query_u->setString($dataDoBanco);
            $query_u->setString($login);
                    
            $this->executeUpdate($query_u);
            //exit;
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>