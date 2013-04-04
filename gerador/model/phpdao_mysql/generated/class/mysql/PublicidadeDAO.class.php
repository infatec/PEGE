<?php
/**
 * Classe operadora da tabela 'publicidade'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class PublicidadeDAO extends Model implements PublicidadeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Publicidade 
	 */
	public function load($id){
		$sql = 'SELECT * FROM publicidade WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Publicidade      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM publicidade '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM publicidade '.$criterio.'';
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
		$sql = 'SELECT * FROM publicidade ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param publicidade primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM publicidade WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Publicidade publicidade
 	 */
	public function insert($publicidade){
		$sql = 'INSERT INTO publicidade (descricao, arquivo, data_entrada, data_saida, created, status, tipo, posicao_publicidade_id, duracao_segundos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($publicidade->descricao);
		$sqlQuery->set($publicidade->arquivo);
		$sqlQuery->set($publicidade->dataEntrada);
		$sqlQuery->set($publicidade->dataSaida);
		$sqlQuery->set($publicidade->created);
		$sqlQuery->set($publicidade->status);
		$sqlQuery->set($publicidade->tipo);
		$sqlQuery->setNumber($publicidade->posicaoPublicidadeId);
		$sqlQuery->setNumber($publicidade->duracaoSegundo);

		$id = $this->executeInsert($sqlQuery);	
		$publicidade->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Publicidade publicidade
 	 */
	public function update($publicidade){
		$campos = "";
        
        
		 if(!empty($publicidade->descricao)) $campos .=' descricao = ?,';
		 if(!empty($publicidade->arquivo)) $campos .=' arquivo = ?,';
		 if(!empty($publicidade->dataEntrada)) $campos .=' data_entrada = ?,';
		 if(!empty($publicidade->dataSaida)) $campos .=' data_saida = ?,';
		 if(!empty($publicidade->created)) $campos .=' created = ?,';
		 if(!empty($publicidade->status)) $campos .=' status = ?,';
		 if(!empty($publicidade->tipo)) $campos .=' tipo = ?,';
		 if(!empty($publicidade->posicaoPublicidadeId)) $campos .=' posicao_publicidade_id = ?,';
		 if(!empty($publicidade->duracaoSegundo)) $campos .=' duracao_segundos = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE publicidade SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($publicidade->descricao)) 		$sqlQuery->set($publicidade->descricao);
		 if(!empty($publicidade->arquivo)) 		$sqlQuery->set($publicidade->arquivo);
		 if(!empty($publicidade->dataEntrada)) 		$sqlQuery->set($publicidade->dataEntrada);
		 if(!empty($publicidade->dataSaida)) 		$sqlQuery->set($publicidade->dataSaida);
		 if(!empty($publicidade->created)) 		$sqlQuery->set($publicidade->created);
		 if(!empty($publicidade->status)) 		$sqlQuery->set($publicidade->status);
		 if(!empty($publicidade->tipo)) 		$sqlQuery->set($publicidade->tipo);
		 if(!empty($publicidade->posicaoPublicidadeId)) 		$sqlQuery->setNumber($publicidade->posicaoPublicidadeId);
		 if(!empty($publicidade->duracaoSegundo)) 		$sqlQuery->setNumber($publicidade->duracaoSegundo);

		$sqlQuery->setNumber($publicidade->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM publicidade';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM publicidade WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByArquivo($value){
		$sql = 'SELECT * FROM publicidade WHERE arquivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEntrada($value){
		$sql = 'SELECT * FROM publicidade WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataSaida($value){
		$sql = 'SELECT * FROM publicidade WHERE data_saida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM publicidade WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM publicidade WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM publicidade WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPosicaoPublicidadeId($value){
		$sql = 'SELECT * FROM publicidade WHERE posicao_publicidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDuracaoSegundos($value){
		$sql = 'SELECT * FROM publicidade WHERE duracao_segundos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM publicidade WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByArquivo($value){
		$sql = 'DELETE FROM publicidade WHERE arquivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEntrada($value){
		$sql = 'DELETE FROM publicidade WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataSaida($value){
		$sql = 'DELETE FROM publicidade WHERE data_saida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM publicidade WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM publicidade WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM publicidade WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPosicaoPublicidadeId($value){
		$sql = 'DELETE FROM publicidade WHERE posicao_publicidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDuracaoSegundos($value){
		$sql = 'DELETE FROM publicidade WHERE duracao_segundos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Publicidade 
	 */
	protected function readRow($row){
		$publicidade = new Publicidade();
		
		$publicidade->id = $row['id'];
		$publicidade->descricao = $row['descricao'];
		$publicidade->arquivo = $row['arquivo'];
		$publicidade->dataEntrada = $row['data_entrada'];
		$publicidade->dataSaida = $row['data_saida'];
		$publicidade->created = $row['created'];
		$publicidade->status = $row['status'];
		$publicidade->tipo = $row['tipo'];
		$publicidade->posicaoPublicidadeId = $row['posicao_publicidade_id'];
		$publicidade->duracaoSegundo = $row['duracao_segundos'];

		return $publicidade;
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
	 * @return Publicidade 
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