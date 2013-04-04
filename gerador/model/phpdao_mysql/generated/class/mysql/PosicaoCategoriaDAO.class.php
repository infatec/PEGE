<?php
/**
 * Classe operadora da tabela 'posicao_categoria'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-07-02 08:49
 */
class PosicaoCategoriaDAO extends Model implements PosicaoCategoriaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return PosicaoCategoria 
	 */
	public function load($id){
		$sql = 'SELECT * FROM posicao_categoria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return PosicaoCategoria      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM posicao_categoria '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM posicao_categoria '.$criterio.'';
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
		$sql = 'SELECT * FROM posicao_categoria ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param posicaoCategoria primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM posicao_categoria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param PosicaoCategoria posicaoCategoria
 	 */
	public function insert($posicaoCategoria){
		$sql = 'INSERT INTO posicao_categoria (categoria_id, posicao) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($posicaoCategoria->categoriaId);
		$sqlQuery->setNumber($posicaoCategoria->posicao);

		$id = $this->executeInsert($sqlQuery);	
		$posicaoCategoria->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param PosicaoCategoria posicaoCategoria
 	 */
	public function update($posicaoCategoria){
		$campos = "";
        
        
		 if(!empty($posicaoCategoria->categoriaId)) $campos .=' categoria_id = ?,';
		 if(!empty($posicaoCategoria->posicao)) $campos .=' posicao = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE posicao_categoria SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($posicaoCategoria->categoriaId)) 		$sqlQuery->setNumber($posicaoCategoria->categoriaId);
		 if(!empty($posicaoCategoria->posicao)) 		$sqlQuery->setNumber($posicaoCategoria->posicao);

		$sqlQuery->setNumber($posicaoCategoria->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM posicao_categoria';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoriaId($value){
		$sql = 'SELECT * FROM posicao_categoria WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPosicao($value){
		$sql = 'SELECT * FROM posicao_categoria WHERE posicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoriaId($value){
		$sql = 'DELETE FROM posicao_categoria WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPosicao($value){
		$sql = 'DELETE FROM posicao_categoria WHERE posicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return PosicaoCategoria 
	 */
	protected function readRow($row){
		$posicaoCategoria = new PosicaoCategoria();
		
		$posicaoCategoria->id = $row['id'];
		$posicaoCategoria->categoriaId = $row['categoria_id'];
		$posicaoCategoria->posicao = $row['posicao'];

		return $posicaoCategoria;
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
	 * @return PosicaoCategoria 
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