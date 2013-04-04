<?php
/**
 * Classe operadora da tabela 'comentario'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class ComentarioDAO extends Model implements ComentarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Comentario 
	 */
	public function load($id){
		$sql = 'SELECT * FROM comentario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Comentario      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM comentario '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM comentario '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		$rs=$this->execute($sqlQuery);
        return $rs[0]["qtd"];
	}
    
	/**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM comentario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param comentario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM comentario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Comentario comentario
 	 */
	public function insert($comentario){
		$sql = 'INSERT INTO comentario (noticia_id, nome, email, mensagem, created, status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($comentario->noticiaId);
		$sqlQuery->set($comentario->nome);
		$sqlQuery->set($comentario->email);
		$sqlQuery->set($comentario->mensagem);
		$sqlQuery->set($comentario->created);
		$sqlQuery->set($comentario->status);

		$id = $this->executeInsert($sqlQuery);	
		$comentario->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Comentario comentario
 	 */
	public function update($comentario){
		$campos = "";
        
        
		 if(!empty($comentario->noticiaId)) $campos .=' noticia_id = ?,';
		 if(!empty($comentario->nome)) $campos .=' nome = ?,';
		 if(!empty($comentario->email)) $campos .=' email = ?,';
		 if(!empty($comentario->mensagem)) $campos .=' mensagem = ?,';
		 if(!empty($comentario->created)) $campos .=' created = ?,';
		 if(!empty($comentario->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE comentario SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($comentario->noticiaId)) 		$sqlQuery->setNumber($comentario->noticiaId);
		 if(!empty($comentario->nome)) 		$sqlQuery->set($comentario->nome);
		 if(!empty($comentario->email)) 		$sqlQuery->set($comentario->email);
		 if(!empty($comentario->mensagem)) 		$sqlQuery->set($comentario->mensagem);
		 if(!empty($comentario->created)) 		$sqlQuery->set($comentario->created);
		 if(!empty($comentario->status)) 		$sqlQuery->set($comentario->status);

		$sqlQuery->setNumber($comentario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM comentario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNoticiaId($value){
		$sql = 'SELECT * FROM comentario WHERE noticia_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM comentario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM comentario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMensagem($value){
		$sql = 'SELECT * FROM comentario WHERE mensagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM comentario WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM comentario WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNoticiaId($value){
		$sql = 'DELETE FROM comentario WHERE noticia_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM comentario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM comentario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMensagem($value){
		$sql = 'DELETE FROM comentario WHERE mensagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM comentario WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM comentario WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Comentario 
	 */
	protected function readRow($row){
		$comentario = new Comentario();
		
		$comentario->id = $row['id'];
		$comentario->noticiaId = $row['noticia_id'];
		$comentario->nome = $row['nome'];
		$comentario->email = $row['email'];
		$comentario->mensagem = $row['mensagem'];
		$comentario->created = $row['created'];
		$comentario->status = $row['status'];

		return $comentario;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get registro
	 *
	 * @return Comentario 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query para um registro e uma coluna
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Inseri um registro na tabela
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>