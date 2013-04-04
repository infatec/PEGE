<?php
/**
 * Classe operadora da tabela 'novidades_cidade'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class NovidadesCidadeDAO extends Model implements NovidadesCidadeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return NovidadesCidade 
	 */
	public function load($id){
		$sql = 'SELECT * FROM novidades_cidade WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return NovidadesCidade      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM novidades_cidade '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM novidades_cidade '.$criterio.'';
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
		$sql = 'SELECT * FROM novidades_cidade ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param novidadesCidade primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM novidades_cidade WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param NovidadesCidade novidadesCidade
 	 */
	public function insert($novidadesCidade){
		$sql = 'INSERT INTO novidades_cidade (cidade_id, titulo, texto, foto, created, status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($novidadesCidade->cidadeId);
		$sqlQuery->set($novidadesCidade->titulo);
		$sqlQuery->set($novidadesCidade->texto);
		$sqlQuery->set($novidadesCidade->foto);
		$sqlQuery->set($novidadesCidade->created);
		$sqlQuery->set($novidadesCidade->status);

		$id = $this->executeInsert($sqlQuery);	
		$novidadesCidade->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param NovidadesCidade novidadesCidade
 	 */
	public function update($novidadesCidade){
		$campos = "";
        
        
		 if(!empty($novidadesCidade->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($novidadesCidade->titulo)) $campos .=' titulo = ?,';
		 if(!empty($novidadesCidade->texto)) $campos .=' texto = ?,';
		 if(!empty($novidadesCidade->foto)) $campos .=' foto = ?,';
		 if(!empty($novidadesCidade->created)) $campos .=' created = ?,';
		 if(!empty($novidadesCidade->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE novidades_cidade SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($novidadesCidade->cidadeId)) 		$sqlQuery->setNumber($novidadesCidade->cidadeId);
		 if(!empty($novidadesCidade->titulo)) 		$sqlQuery->set($novidadesCidade->titulo);
		 if(!empty($novidadesCidade->texto)) 		$sqlQuery->set($novidadesCidade->texto);
		 if(!empty($novidadesCidade->foto)) 		$sqlQuery->set($novidadesCidade->foto);
		 if(!empty($novidadesCidade->created)) 		$sqlQuery->set($novidadesCidade->created);
		 if(!empty($novidadesCidade->status)) 		$sqlQuery->set($novidadesCidade->status);

		$sqlQuery->setNumber($novidadesCidade->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM novidades_cidade';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM novidades_cidade WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM novidades_cidade WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTexto($value){
		$sql = 'SELECT * FROM novidades_cidade WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM novidades_cidade WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM novidades_cidade WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM novidades_cidade WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM novidades_cidade WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM novidades_cidade WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTexto($value){
		$sql = 'DELETE FROM novidades_cidade WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM novidades_cidade WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM novidades_cidade WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM novidades_cidade WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return NovidadesCidade 
	 */
	protected function readRow($row){
		$novidadesCidade = new NovidadesCidade();
		
		$novidadesCidade->id = $row['id'];
		$novidadesCidade->cidadeId = $row['cidade_id'];
		$novidadesCidade->titulo = $row['titulo'];
		$novidadesCidade->texto = $row['texto'];
		$novidadesCidade->foto = $row['foto'];
		$novidadesCidade->created = $row['created'];
		$novidadesCidade->status = $row['status'];

		return $novidadesCidade;
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
	 * @return NovidadesCidade 
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