<?php
/**
 * Classe operadora da tabela 'fornecedor'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class FornecedorDAO extends Model implements FornecedorI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Fornecedor 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fornecedor WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Fornecedor      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM fornecedor '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM fornecedor '.$criterio.'';
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
		$sql = 'SELECT * FROM fornecedor ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param fornecedor primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM fornecedor WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Fornecedor fornecedor
 	 */
	public function insert($fornecedor){
		$sql = 'INSERT INTO fornecedor (nome_fantasia, razao_social, tipo_doc, numdoc, im, endereco, bairro, cep, estado_id, cidade_id, site, email, fone1, fone2, fax, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fornecedor->nomeFantasia);
		$sqlQuery->set($fornecedor->razaoSocial);
		$sqlQuery->set($fornecedor->tipoDoc);
		$sqlQuery->set($fornecedor->numdoc);
		$sqlQuery->set($fornecedor->im);
		$sqlQuery->set($fornecedor->endereco);
		$sqlQuery->set($fornecedor->bairro);
		$sqlQuery->set($fornecedor->cep);
		$sqlQuery->setNumber($fornecedor->estadoId);
		$sqlQuery->setNumber($fornecedor->cidadeId);
		$sqlQuery->set($fornecedor->site);
		$sqlQuery->set($fornecedor->email);
		$sqlQuery->set($fornecedor->fone1);
		$sqlQuery->set($fornecedor->fone2);
		$sqlQuery->set($fornecedor->fax);
		$sqlQuery->set($fornecedor->created);
		$sqlQuery->set($fornecedor->status);

		$id = $this->executeInsert($sqlQuery);	
		$fornecedor->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Fornecedor fornecedor
 	 */
	public function update($fornecedor){
		$campos = "";
        
        
		 if(!empty($fornecedor->nomeFantasia)) $campos .=' nome_fantasia = ?,';
		 if(!empty($fornecedor->razaoSocial)) $campos .=' razao_social = ?,';
		 if(!empty($fornecedor->tipoDoc)) $campos .=' tipo_doc = ?,';
		 if(!empty($fornecedor->numdoc)) $campos .=' numdoc = ?,';
		 if(!empty($fornecedor->im)) $campos .=' im = ?,';
		 if(!empty($fornecedor->endereco)) $campos .=' endereco = ?,';
		 if(!empty($fornecedor->bairro)) $campos .=' bairro = ?,';
		 if(!empty($fornecedor->cep)) $campos .=' cep = ?,';
		 if(!empty($fornecedor->estadoId)) $campos .=' estado_id = ?,';
		 if(!empty($fornecedor->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($fornecedor->site)) $campos .=' site = ?,';
		 if(!empty($fornecedor->email)) $campos .=' email = ?,';
		 if(!empty($fornecedor->fone1)) $campos .=' fone1 = ?,';
		 if(!empty($fornecedor->fone2)) $campos .=' fone2 = ?,';
		 if(!empty($fornecedor->fax)) $campos .=' fax = ?,';
		 if(!empty($fornecedor->created)) $campos .=' created = ?,';
		 if(!empty($fornecedor->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE fornecedor SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($fornecedor->nomeFantasia)) 		$sqlQuery->set($fornecedor->nomeFantasia);
		 if(!empty($fornecedor->razaoSocial)) 		$sqlQuery->set($fornecedor->razaoSocial);
		 if(!empty($fornecedor->tipoDoc)) 		$sqlQuery->set($fornecedor->tipoDoc);
		 if(!empty($fornecedor->numdoc)) 		$sqlQuery->set($fornecedor->numdoc);
		 if(!empty($fornecedor->im)) 		$sqlQuery->set($fornecedor->im);
		 if(!empty($fornecedor->endereco)) 		$sqlQuery->set($fornecedor->endereco);
		 if(!empty($fornecedor->bairro)) 		$sqlQuery->set($fornecedor->bairro);
		 if(!empty($fornecedor->cep)) 		$sqlQuery->set($fornecedor->cep);
		 if(!empty($fornecedor->estadoId)) 		$sqlQuery->setNumber($fornecedor->estadoId);
		 if(!empty($fornecedor->cidadeId)) 		$sqlQuery->setNumber($fornecedor->cidadeId);
		 if(!empty($fornecedor->site)) 		$sqlQuery->set($fornecedor->site);
		 if(!empty($fornecedor->email)) 		$sqlQuery->set($fornecedor->email);
		 if(!empty($fornecedor->fone1)) 		$sqlQuery->set($fornecedor->fone1);
		 if(!empty($fornecedor->fone2)) 		$sqlQuery->set($fornecedor->fone2);
		 if(!empty($fornecedor->fax)) 		$sqlQuery->set($fornecedor->fax);
		 if(!empty($fornecedor->created)) 		$sqlQuery->set($fornecedor->created);
		 if(!empty($fornecedor->status)) 		$sqlQuery->set($fornecedor->status);

		$sqlQuery->setNumber($fornecedor->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM fornecedor';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNomeFantasia($value){
		$sql = 'SELECT * FROM fornecedor WHERE nome_fantasia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRazaoSocial($value){
		$sql = 'SELECT * FROM fornecedor WHERE razao_social = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoDoc($value){
		$sql = 'SELECT * FROM fornecedor WHERE tipo_doc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumdoc($value){
		$sql = 'SELECT * FROM fornecedor WHERE numdoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIm($value){
		$sql = 'SELECT * FROM fornecedor WHERE im = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM fornecedor WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM fornecedor WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCep($value){
		$sql = 'SELECT * FROM fornecedor WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadoId($value){
		$sql = 'SELECT * FROM fornecedor WHERE estado_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM fornecedor WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySite($value){
		$sql = 'SELECT * FROM fornecedor WHERE site = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM fornecedor WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFone1($value){
		$sql = 'SELECT * FROM fornecedor WHERE fone1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFone2($value){
		$sql = 'SELECT * FROM fornecedor WHERE fone2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value){
		$sql = 'SELECT * FROM fornecedor WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM fornecedor WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM fornecedor WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNomeFantasia($value){
		$sql = 'DELETE FROM fornecedor WHERE nome_fantasia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRazaoSocial($value){
		$sql = 'DELETE FROM fornecedor WHERE razao_social = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoDoc($value){
		$sql = 'DELETE FROM fornecedor WHERE tipo_doc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumdoc($value){
		$sql = 'DELETE FROM fornecedor WHERE numdoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIm($value){
		$sql = 'DELETE FROM fornecedor WHERE im = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM fornecedor WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM fornecedor WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCep($value){
		$sql = 'DELETE FROM fornecedor WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadoId($value){
		$sql = 'DELETE FROM fornecedor WHERE estado_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM fornecedor WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySite($value){
		$sql = 'DELETE FROM fornecedor WHERE site = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM fornecedor WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFone1($value){
		$sql = 'DELETE FROM fornecedor WHERE fone1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFone2($value){
		$sql = 'DELETE FROM fornecedor WHERE fone2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM fornecedor WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM fornecedor WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM fornecedor WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Fornecedor 
	 */
	protected function readRow($row){
		$fornecedor = new Fornecedor();
		
		$fornecedor->id = $row['id'];
		$fornecedor->nomeFantasia = $row['nome_fantasia'];
		$fornecedor->razaoSocial = $row['razao_social'];
		$fornecedor->tipoDoc = $row['tipo_doc'];
		$fornecedor->numdoc = $row['numdoc'];
		$fornecedor->im = $row['im'];
		$fornecedor->endereco = $row['endereco'];
		$fornecedor->bairro = $row['bairro'];
		$fornecedor->cep = $row['cep'];
		$fornecedor->estadoId = $row['estado_id'];
		$fornecedor->cidadeId = $row['cidade_id'];
		$fornecedor->site = $row['site'];
		$fornecedor->email = $row['email'];
		$fornecedor->fone1 = $row['fone1'];
		$fornecedor->fone2 = $row['fone2'];
		$fornecedor->fax = $row['fax'];
		$fornecedor->created = $row['created'];
		$fornecedor->status = $row['status'];

		return $fornecedor;
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
	 * @return Fornecedor 
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