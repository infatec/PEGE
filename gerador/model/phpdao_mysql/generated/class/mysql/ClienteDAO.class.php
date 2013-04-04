<?php
/**
 * Classe operadora da tabela 'cliente'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class ClienteDAO extends Model implements ClienteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Cliente 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cliente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Cliente      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cliente '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cliente '.$criterio.'';
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
		$sql = 'SELECT * FROM cliente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param cliente primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cliente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Cliente cliente
 	 */
	public function insert($cliente){
		$sql = 'INSERT INTO cliente (nome, rg, cpf, data_nascimento, telefone, usuario_id, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cliente->nome);
		$sqlQuery->set($cliente->rg);
		$sqlQuery->set($cliente->cpf);
		$sqlQuery->set($cliente->dataNascimento);
		$sqlQuery->set($cliente->telefone);
		$sqlQuery->setNumber($cliente->usuarioId);
		$sqlQuery->set($cliente->created);
		$sqlQuery->setNumber($cliente->status);

		$id = $this->executeInsert($sqlQuery);	
		$cliente->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Cliente cliente
 	 */
	public function update($cliente){
		$campos = "";
        
        
		 if(!empty($cliente->nome)) $campos .=' nome = ?,';
		 if(!empty($cliente->rg)) $campos .=' rg = ?,';
		 if(!empty($cliente->cpf)) $campos .=' cpf = ?,';
		 if(!empty($cliente->dataNascimento)) $campos .=' data_nascimento = ?,';
		 if(!empty($cliente->telefone)) $campos .=' telefone = ?,';
		 if(!empty($cliente->usuarioId)) $campos .=' usuario_id = ?,';
		 if(!empty($cliente->created)) $campos .=' created = ?,';
		 if(!empty($cliente->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cliente SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($cliente->nome)) 		$sqlQuery->set($cliente->nome);
		 if(!empty($cliente->rg)) 		$sqlQuery->set($cliente->rg);
		 if(!empty($cliente->cpf)) 		$sqlQuery->set($cliente->cpf);
		 if(!empty($cliente->dataNascimento)) 		$sqlQuery->set($cliente->dataNascimento);
		 if(!empty($cliente->telefone)) 		$sqlQuery->set($cliente->telefone);
		 if(!empty($cliente->usuarioId)) 		$sqlQuery->setNumber($cliente->usuarioId);
		 if(!empty($cliente->created)) 		$sqlQuery->set($cliente->created);
		 if(!empty($cliente->status)) 		$sqlQuery->setNumber($cliente->status);

		$sqlQuery->setNumber($cliente->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cliente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM cliente WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRg($value){
		$sql = 'SELECT * FROM cliente WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpf($value){
		$sql = 'SELECT * FROM cliente WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataNascimento($value){
		$sql = 'SELECT * FROM cliente WHERE data_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM cliente WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioId($value){
		$sql = 'SELECT * FROM cliente WHERE usuario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM cliente WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM cliente WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM cliente WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRg($value){
		$sql = 'DELETE FROM cliente WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpf($value){
		$sql = 'DELETE FROM cliente WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataNascimento($value){
		$sql = 'DELETE FROM cliente WHERE data_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM cliente WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioId($value){
		$sql = 'DELETE FROM cliente WHERE usuario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM cliente WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM cliente WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Cliente 
	 */
	protected function readRow($row){
		$cliente = new Cliente();
		
		$cliente->id = $row['id'];
		$cliente->nome = $row['nome'];
		$cliente->rg = $row['rg'];
		$cliente->cpf = $row['cpf'];
		$cliente->dataNascimento = $row['data_nascimento'];
		$cliente->telefone = $row['telefone'];
		$cliente->usuarioId = $row['usuario_id'];
		$cliente->created = $row['created'];
		$cliente->status = $row['status'];

		return $cliente;
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
	 * @return Cliente 
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