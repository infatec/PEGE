<?php
/**
 * Classe operadora da tabela 'mais_servicos'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class MaisServicosDAO extends Model implements MaisServicosI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return MaisServicos 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mais_servicos WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return MaisServicos      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM mais_servicos '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM mais_servicos '.$criterio.'';
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
		$sql = 'SELECT * FROM mais_servicos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param maisServico primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM mais_servicos WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param MaisServicos maisServico
 	 */
	public function insert($maisServico){
		$sql = 'INSERT INTO mais_servicos (cidade_id, nome, descricao, foto, endereco, bairro, cidade, estado, created, status, tipo_servico_id, latitude, longitude, identificacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($maisServico->cidadeId);
		$sqlQuery->set($maisServico->nome);
		$sqlQuery->set($maisServico->descricao);
		$sqlQuery->set($maisServico->foto);
		$sqlQuery->set($maisServico->endereco);
		$sqlQuery->set($maisServico->bairro);
		$sqlQuery->set($maisServico->cidade);
		$sqlQuery->set($maisServico->estado);
		$sqlQuery->set($maisServico->created);
		$sqlQuery->set($maisServico->status);
		$sqlQuery->setNumber($maisServico->tipoServicoId);
		$sqlQuery->set($maisServico->latitude);
		$sqlQuery->set($maisServico->longitude);
		$sqlQuery->set($maisServico->identificacao);

		$id = $this->executeInsert($sqlQuery);	
		$maisServico->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param MaisServicos maisServico
 	 */
	public function update($maisServico){
		$campos = "";
        
        
		 if(!empty($maisServico->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($maisServico->nome)) $campos .=' nome = ?,';
		 if(!empty($maisServico->descricao)) $campos .=' descricao = ?,';
		 if(!empty($maisServico->foto)) $campos .=' foto = ?,';
		 if(!empty($maisServico->endereco)) $campos .=' endereco = ?,';
		 if(!empty($maisServico->bairro)) $campos .=' bairro = ?,';
		 if(!empty($maisServico->cidade)) $campos .=' cidade = ?,';
		 if(!empty($maisServico->estado)) $campos .=' estado = ?,';
		 if(!empty($maisServico->created)) $campos .=' created = ?,';
		 if(!empty($maisServico->status)) $campos .=' status = ?,';
		 if(!empty($maisServico->tipoServicoId)) $campos .=' tipo_servico_id = ?,';
		 if(!empty($maisServico->latitude)) $campos .=' latitude = ?,';
		 if(!empty($maisServico->longitude)) $campos .=' longitude = ?,';
		 if(!empty($maisServico->identificacao)) $campos .=' identificacao = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE mais_servicos SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($maisServico->cidadeId)) 		$sqlQuery->setNumber($maisServico->cidadeId);
		 if(!empty($maisServico->nome)) 		$sqlQuery->set($maisServico->nome);
		 if(!empty($maisServico->descricao)) 		$sqlQuery->set($maisServico->descricao);
		 if(!empty($maisServico->foto)) 		$sqlQuery->set($maisServico->foto);
		 if(!empty($maisServico->endereco)) 		$sqlQuery->set($maisServico->endereco);
		 if(!empty($maisServico->bairro)) 		$sqlQuery->set($maisServico->bairro);
		 if(!empty($maisServico->cidade)) 		$sqlQuery->set($maisServico->cidade);
		 if(!empty($maisServico->estado)) 		$sqlQuery->set($maisServico->estado);
		 if(!empty($maisServico->created)) 		$sqlQuery->set($maisServico->created);
		 if(!empty($maisServico->status)) 		$sqlQuery->set($maisServico->status);
		 if(!empty($maisServico->tipoServicoId)) 		$sqlQuery->setNumber($maisServico->tipoServicoId);
		 if(!empty($maisServico->latitude)) 		$sqlQuery->set($maisServico->latitude);
		 if(!empty($maisServico->longitude)) 		$sqlQuery->set($maisServico->longitude);
		 if(!empty($maisServico->identificacao)) 		$sqlQuery->set($maisServico->identificacao);

		$sqlQuery->setNumber($maisServico->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM mais_servicos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM mais_servicos WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM mais_servicos WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM mais_servicos WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM mais_servicos WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM mais_servicos WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM mais_servicos WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM mais_servicos WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM mais_servicos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM mais_servicos WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM mais_servicos WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoServicoId($value){
		$sql = 'SELECT * FROM mais_servicos WHERE tipo_servico_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM mais_servicos WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM mais_servicos WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM mais_servicos WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM mais_servicos WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM mais_servicos WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM mais_servicos WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM mais_servicos WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM mais_servicos WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM mais_servicos WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM mais_servicos WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM mais_servicos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM mais_servicos WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM mais_servicos WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoServicoId($value){
		$sql = 'DELETE FROM mais_servicos WHERE tipo_servico_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM mais_servicos WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM mais_servicos WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM mais_servicos WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return MaisServicos 
	 */
	protected function readRow($row){
		$maisServico = new MaisServico();
		
		$maisServico->id = $row['id'];
		$maisServico->cidadeId = $row['cidade_id'];
		$maisServico->nome = $row['nome'];
		$maisServico->descricao = $row['descricao'];
		$maisServico->foto = $row['foto'];
		$maisServico->endereco = $row['endereco'];
		$maisServico->bairro = $row['bairro'];
		$maisServico->cidade = $row['cidade'];
		$maisServico->estado = $row['estado'];
		$maisServico->created = $row['created'];
		$maisServico->status = $row['status'];
		$maisServico->tipoServicoId = $row['tipo_servico_id'];
		$maisServico->latitude = $row['latitude'];
		$maisServico->longitude = $row['longitude'];
		$maisServico->identificacao = $row['identificacao'];

		return $maisServico;
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
	 * @return MaisServicos 
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