<?php
/**
 * Classe operadora da tabela 'emitente'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class EmitenteDAO extends Model implements EmitenteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Emitente 
	 */
	public function load($id){
		$sql = 'SELECT * FROM emitente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Emitente      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM emitente '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM emitente '.$criterio.'';
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
		$sql = 'SELECT * FROM emitente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param emitente primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM emitente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Emitente emitente
 	 */
	public function insert($emitente){
		$sql = 'INSERT INTO emitente (nome, cep, endereco, numero, bairro, estado_id, cidade_id, fone, celular, rg, cpf, nome_referencia, tel_referencia, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($emitente->nome);
		$sqlQuery->set($emitente->cep);
		$sqlQuery->set($emitente->endereco);
		$sqlQuery->set($emitente->numero);
		$sqlQuery->set($emitente->bairro);
		$sqlQuery->setNumber($emitente->estadoId);
		$sqlQuery->setNumber($emitente->cidadeId);
		$sqlQuery->set($emitente->fone);
		$sqlQuery->set($emitente->celular);
		$sqlQuery->set($emitente->rg);
		$sqlQuery->set($emitente->cpf);
		$sqlQuery->set($emitente->nomeReferencia);
		$sqlQuery->set($emitente->telReferencia);
		$sqlQuery->set($emitente->created);
		$sqlQuery->set($emitente->status);

		$id = $this->executeInsert($sqlQuery);	
		$emitente->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Emitente emitente
 	 */
	public function update($emitente){
		$campos = "";
        
        
		 if(!empty($emitente->nome)) $campos .=' nome = ?,';
		 if(!empty($emitente->cep)) $campos .=' cep = ?,';
		 if(!empty($emitente->endereco)) $campos .=' endereco = ?,';
		 if(!empty($emitente->numero)) $campos .=' numero = ?,';
		 if(!empty($emitente->bairro)) $campos .=' bairro = ?,';
		 if(!empty($emitente->estadoId)) $campos .=' estado_id = ?,';
		 if(!empty($emitente->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($emitente->fone)) $campos .=' fone = ?,';
		 if(!empty($emitente->celular)) $campos .=' celular = ?,';
		 if(!empty($emitente->rg)) $campos .=' rg = ?,';
		 if(!empty($emitente->cpf)) $campos .=' cpf = ?,';
		 if(!empty($emitente->nomeReferencia)) $campos .=' nome_referencia = ?,';
		 if(!empty($emitente->telReferencia)) $campos .=' tel_referencia = ?,';
		 if(!empty($emitente->created)) $campos .=' created = ?,';
		 if(!empty($emitente->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE emitente SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($emitente->nome)) 		$sqlQuery->set($emitente->nome);
		 if(!empty($emitente->cep)) 		$sqlQuery->set($emitente->cep);
		 if(!empty($emitente->endereco)) 		$sqlQuery->set($emitente->endereco);
		 if(!empty($emitente->numero)) 		$sqlQuery->set($emitente->numero);
		 if(!empty($emitente->bairro)) 		$sqlQuery->set($emitente->bairro);
		 if(!empty($emitente->estadoId)) 		$sqlQuery->setNumber($emitente->estadoId);
		 if(!empty($emitente->cidadeId)) 		$sqlQuery->setNumber($emitente->cidadeId);
		 if(!empty($emitente->fone)) 		$sqlQuery->set($emitente->fone);
		 if(!empty($emitente->celular)) 		$sqlQuery->set($emitente->celular);
		 if(!empty($emitente->rg)) 		$sqlQuery->set($emitente->rg);
		 if(!empty($emitente->cpf)) 		$sqlQuery->set($emitente->cpf);
		 if(!empty($emitente->nomeReferencia)) 		$sqlQuery->set($emitente->nomeReferencia);
		 if(!empty($emitente->telReferencia)) 		$sqlQuery->set($emitente->telReferencia);
		 if(!empty($emitente->created)) 		$sqlQuery->set($emitente->created);
		 if(!empty($emitente->status)) 		$sqlQuery->set($emitente->status);

		$sqlQuery->setNumber($emitente->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM emitente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM emitente WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCep($value){
		$sql = 'SELECT * FROM emitente WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM emitente WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM emitente WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM emitente WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadoId($value){
		$sql = 'SELECT * FROM emitente WHERE estado_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM emitente WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFone($value){
		$sql = 'SELECT * FROM emitente WHERE fone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCelular($value){
		$sql = 'SELECT * FROM emitente WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRg($value){
		$sql = 'SELECT * FROM emitente WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpf($value){
		$sql = 'SELECT * FROM emitente WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeReferencia($value){
		$sql = 'SELECT * FROM emitente WHERE nome_referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelReferencia($value){
		$sql = 'SELECT * FROM emitente WHERE tel_referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM emitente WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM emitente WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM emitente WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCep($value){
		$sql = 'DELETE FROM emitente WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM emitente WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM emitente WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM emitente WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadoId($value){
		$sql = 'DELETE FROM emitente WHERE estado_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM emitente WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFone($value){
		$sql = 'DELETE FROM emitente WHERE fone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCelular($value){
		$sql = 'DELETE FROM emitente WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRg($value){
		$sql = 'DELETE FROM emitente WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpf($value){
		$sql = 'DELETE FROM emitente WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeReferencia($value){
		$sql = 'DELETE FROM emitente WHERE nome_referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelReferencia($value){
		$sql = 'DELETE FROM emitente WHERE tel_referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM emitente WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM emitente WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Emitente 
	 */
	protected function readRow($row){
		$emitente = new Emitente();
		
		$emitente->id = $row['id'];
		$emitente->nome = $row['nome'];
		$emitente->cep = $row['cep'];
		$emitente->endereco = $row['endereco'];
		$emitente->numero = $row['numero'];
		$emitente->bairro = $row['bairro'];
		$emitente->estadoId = $row['estado_id'];
		$emitente->cidadeId = $row['cidade_id'];
		$emitente->fone = $row['fone'];
		$emitente->celular = $row['celular'];
		$emitente->rg = $row['rg'];
		$emitente->cpf = $row['cpf'];
		$emitente->nomeReferencia = $row['nome_referencia'];
		$emitente->telReferencia = $row['tel_referencia'];
		$emitente->created = $row['created'];
		$emitente->status = $row['status'];

		return $emitente;
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
	 * @return Emitente 
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