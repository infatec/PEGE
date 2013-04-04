<?php
/**
 * Classe operadora da tabela 'editoria'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class EditoriaDAO extends Model implements EditoriaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Editoria 
	 */
	public function load($id){
		$sql = 'SELECT * FROM editoria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Editoria      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM editoria '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM editoria '.$criterio.'';
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
		$sql = 'SELECT * FROM editoria ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param editoria primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM editoria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Editoria editoria
 	 */
	public function insert($editoria){
		$sql = 'INSERT INTO editoria (tipo_editoria_id, link, descricao, created, status, nome, palavra_chave) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($editoria->tipoEditoriaId);
		$sqlQuery->set($editoria->link);
		$sqlQuery->set($editoria->descricao);
		$sqlQuery->set($editoria->created);
		$sqlQuery->set($editoria->status);
		$sqlQuery->set($editoria->nome);
		$sqlQuery->set($editoria->palavraChave);

		$id = $this->executeInsert($sqlQuery);	
		$editoria->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Editoria editoria
 	 */
	public function update($editoria){
		$campos = "";
        
        
		 if(!empty($editoria->tipoEditoriaId)) $campos .=' tipo_editoria_id = ?,';
		 if(!empty($editoria->link)) $campos .=' link = ?,';
		 if(!empty($editoria->descricao)) $campos .=' descricao = ?,';
		 if(!empty($editoria->created)) $campos .=' created = ?,';
		 if(!empty($editoria->status)) $campos .=' status = ?,';
		 if(!empty($editoria->nome)) $campos .=' nome = ?,';
		 if(!empty($editoria->palavraChave)) $campos .=' palavra_chave = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE editoria SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($editoria->tipoEditoriaId)) 		$sqlQuery->setNumber($editoria->tipoEditoriaId);
		 if(!empty($editoria->link)) 		$sqlQuery->set($editoria->link);
		 if(!empty($editoria->descricao)) 		$sqlQuery->set($editoria->descricao);
		 if(!empty($editoria->created)) 		$sqlQuery->set($editoria->created);
		 if(!empty($editoria->status)) 		$sqlQuery->set($editoria->status);
		 if(!empty($editoria->nome)) 		$sqlQuery->set($editoria->nome);
		 if(!empty($editoria->palavraChave)) 		$sqlQuery->set($editoria->palavraChave);

		$sqlQuery->setNumber($editoria->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM editoria';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTipoEditoriaId($value){
		$sql = 'SELECT * FROM editoria WHERE tipo_editoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM editoria WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM editoria WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM editoria WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM editoria WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM editoria WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPalavraChave($value){
		$sql = 'SELECT * FROM editoria WHERE palavra_chave = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTipoEditoriaId($value){
		$sql = 'DELETE FROM editoria WHERE tipo_editoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM editoria WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM editoria WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM editoria WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM editoria WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM editoria WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPalavraChave($value){
		$sql = 'DELETE FROM editoria WHERE palavra_chave = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Editoria 
	 */
	protected function readRow($row){
		$editoria = new Editoria();
		
		$editoria->id = $row['id'];
		$editoria->tipoEditoriaId = $row['tipo_editoria_id'];
		$editoria->link = $row['link'];
		$editoria->descricao = $row['descricao'];
		$editoria->created = $row['created'];
		$editoria->status = $row['status'];
		$editoria->nome = $row['nome'];
		$editoria->palavraChave = $row['palavra_chave'];

		return $editoria;
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
	 * @return Editoria 
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