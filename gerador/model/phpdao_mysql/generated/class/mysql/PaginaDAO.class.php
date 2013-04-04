<?php
/**
 * Classe operadora da tabela 'pagina'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class PaginaDAO extends Model implements PaginaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Pagina 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pagina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Pagina      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM pagina '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM pagina '.$criterio.'';
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
		$sql = 'SELECT * FROM pagina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param pagina primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pagina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Pagina pagina
 	 */
	public function insert($pagina){
		$sql = 'INSERT INTO pagina (menu_id, nome, titulo, keyword, conteudo, ordem, created, status, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pagina->menuId);
		$sqlQuery->set($pagina->nome);
		$sqlQuery->set($pagina->titulo);
		$sqlQuery->set($pagina->keyword);
		$sqlQuery->set($pagina->conteudo);
		$sqlQuery->setNumber($pagina->ordem);
		$sqlQuery->set($pagina->created);
		$sqlQuery->set($pagina->status);
		$sqlQuery->set($pagina->url);

		$id = $this->executeInsert($sqlQuery);	
		$pagina->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Pagina pagina
 	 */
	public function update($pagina){
		$campos = "";
        
        
		 if(!empty($pagina->menuId)) $campos .=' menu_id = ?,';
		 if(!empty($pagina->nome)) $campos .=' nome = ?,';
		 if(!empty($pagina->titulo)) $campos .=' titulo = ?,';
		 if(!empty($pagina->keyword)) $campos .=' keyword = ?,';
		 if(!empty($pagina->conteudo)) $campos .=' conteudo = ?,';
		 if(!empty($pagina->ordem)) $campos .=' ordem = ?,';
		 if(!empty($pagina->created)) $campos .=' created = ?,';
		 if(!empty($pagina->status)) $campos .=' status = ?,';
		 if(!empty($pagina->url)) $campos .=' url = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE pagina SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($pagina->menuId)) 		$sqlQuery->setNumber($pagina->menuId);
		 if(!empty($pagina->nome)) 		$sqlQuery->set($pagina->nome);
		 if(!empty($pagina->titulo)) 		$sqlQuery->set($pagina->titulo);
		 if(!empty($pagina->keyword)) 		$sqlQuery->set($pagina->keyword);
		 if(!empty($pagina->conteudo)) 		$sqlQuery->set($pagina->conteudo);
		 if(!empty($pagina->ordem)) 		$sqlQuery->setNumber($pagina->ordem);
		 if(!empty($pagina->created)) 		$sqlQuery->set($pagina->created);
		 if(!empty($pagina->status)) 		$sqlQuery->set($pagina->status);
		 if(!empty($pagina->url)) 		$sqlQuery->set($pagina->url);

		$sqlQuery->setNumber($pagina->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM pagina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMenuId($value){
		$sql = 'SELECT * FROM pagina WHERE menu_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM pagina WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM pagina WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByKeyword($value){
		$sql = 'SELECT * FROM pagina WHERE keyword = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConteudo($value){
		$sql = 'SELECT * FROM pagina WHERE conteudo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdem($value){
		$sql = 'SELECT * FROM pagina WHERE ordem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM pagina WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM pagina WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM pagina WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMenuId($value){
		$sql = 'DELETE FROM pagina WHERE menu_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM pagina WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM pagina WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKeyword($value){
		$sql = 'DELETE FROM pagina WHERE keyword = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConteudo($value){
		$sql = 'DELETE FROM pagina WHERE conteudo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdem($value){
		$sql = 'DELETE FROM pagina WHERE ordem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM pagina WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM pagina WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrl($value){
		$sql = 'DELETE FROM pagina WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Pagina 
	 */
	protected function readRow($row){
		$pagina = new Pagina();
		
		$pagina->id = $row['id'];
		$pagina->menuId = $row['menu_id'];
		$pagina->nome = $row['nome'];
		$pagina->titulo = $row['titulo'];
		$pagina->keyword = $row['keyword'];
		$pagina->conteudo = $row['conteudo'];
		$pagina->ordem = $row['ordem'];
		$pagina->created = $row['created'];
		$pagina->status = $row['status'];
		$pagina->url = $row['url'];

		return $pagina;
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
	 * @return Pagina 
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