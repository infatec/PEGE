<?php
/**
 * Classe operadora da tabela 'cardapio_restaurante'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class CardapioRestauranteDAO extends Model implements CardapioRestauranteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CardapioRestaurante 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cardapio_restaurante WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CardapioRestaurante      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cardapio_restaurante '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cardapio_restaurante '.$criterio.'';
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
		$sql = 'SELECT * FROM cardapio_restaurante ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param cardapioRestaurante primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cardapio_restaurante WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CardapioRestaurante cardapioRestaurante
 	 */
	public function insert($cardapioRestaurante){
		$sql = 'INSERT INTO cardapio_restaurante (restaurante_id) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cardapioRestaurante->restauranteId);

		$id = $this->executeInsert($sqlQuery);	
		$cardapioRestaurante->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CardapioRestaurante cardapioRestaurante
 	 */
	public function update($cardapioRestaurante){
		$campos = "";
        
        
		 if(!empty($cardapioRestaurante->restauranteId)) $campos .=' restaurante_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cardapio_restaurante SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($cardapioRestaurante->restauranteId)) 		$sqlQuery->setNumber($cardapioRestaurante->restauranteId);

		$sqlQuery->setNumber($cardapioRestaurante->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cardapio_restaurante';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRestauranteId($value){
		$sql = 'SELECT * FROM cardapio_restaurante WHERE restaurante_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRestauranteId($value){
		$sql = 'DELETE FROM cardapio_restaurante WHERE restaurante_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CardapioRestaurante 
	 */
	protected function readRow($row){
		$cardapioRestaurante = new CardapioRestaurante();
		
		$cardapioRestaurante->id = $row['id'];
		$cardapioRestaurante->restauranteId = $row['restaurante_id'];

		return $cardapioRestaurante;
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
	 * @return CardapioRestaurante 
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