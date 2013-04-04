<?php
/**
 * Classe operadora da tabela 'fonte'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-07-02 08:49
 */
class FonteDAO extends Model implements FonteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Fonte 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fonte WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Fonte      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM fonte '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM fonte '.$criterio.'';
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
		$sql = 'SELECT * FROM fonte ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param fonte primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM fonte WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Fonte fonte
 	 */
	public function insert($fonte){
		$sql = 'INSERT INTO fonte (subcategoria_id, nome, imagem, descricao, arquivo_rar, arquivo_ttf, created, status, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($fonte->subcategoriaId);
		$sqlQuery->set($fonte->nome);
		$sqlQuery->set($fonte->imagem);
		$sqlQuery->set($fonte->descricao);
		$sqlQuery->set($fonte->arquivoRar);
		$sqlQuery->set($fonte->arquivoTtf);
		$sqlQuery->set($fonte->created);
		$sqlQuery->set($fonte->status);
		$sqlQuery->set($fonte->url);

		$id = $this->executeInsert($sqlQuery);	
		$fonte->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Fonte fonte
 	 */
	public function update($fonte){
		$campos = "";
        
        
		 if(!empty($fonte->subcategoriaId)) $campos .=' subcategoria_id = ?,';
		 if(!empty($fonte->nome)) $campos .=' nome = ?,';
		 if(!empty($fonte->imagem)) $campos .=' imagem = ?,';
		 if(!empty($fonte->descricao)) $campos .=' descricao = ?,';
		 if(!empty($fonte->arquivoRar)) $campos .=' arquivo_rar = ?,';
		 if(!empty($fonte->arquivoTtf)) $campos .=' arquivo_ttf = ?,';
		 if(!empty($fonte->created)) $campos .=' created = ?,';
		 if(!empty($fonte->status)) $campos .=' status = ?,';
		 if(!empty($fonte->url)) $campos .=' url = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE fonte SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($fonte->subcategoriaId)) 		$sqlQuery->setNumber($fonte->subcategoriaId);
		 if(!empty($fonte->nome)) 		$sqlQuery->set($fonte->nome);
		 if(!empty($fonte->imagem)) 		$sqlQuery->set($fonte->imagem);
		 if(!empty($fonte->descricao)) 		$sqlQuery->set($fonte->descricao);
		 if(!empty($fonte->arquivoRar)) 		$sqlQuery->set($fonte->arquivoRar);
		 if(!empty($fonte->arquivoTtf)) 		$sqlQuery->set($fonte->arquivoTtf);
		 if(!empty($fonte->created)) 		$sqlQuery->set($fonte->created);
		 if(!empty($fonte->status)) 		$sqlQuery->set($fonte->status);
		 if(!empty($fonte->url)) 		$sqlQuery->set($fonte->url);

		$sqlQuery->setNumber($fonte->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM fonte';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySubcategoriaId($value){
		$sql = 'SELECT * FROM fonte WHERE subcategoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM fonte WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM fonte WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM fonte WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByArquivoRar($value){
		$sql = 'SELECT * FROM fonte WHERE arquivo_rar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByArquivoTtf($value){
		$sql = 'SELECT * FROM fonte WHERE arquivo_ttf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM fonte WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM fonte WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM fonte WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySubcategoriaId($value){
		$sql = 'DELETE FROM fonte WHERE subcategoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM fonte WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagem($value){
		$sql = 'DELETE FROM fonte WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM fonte WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByArquivoRar($value){
		$sql = 'DELETE FROM fonte WHERE arquivo_rar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByArquivoTtf($value){
		$sql = 'DELETE FROM fonte WHERE arquivo_ttf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM fonte WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM fonte WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrl($value){
		$sql = 'DELETE FROM fonte WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Fonte 
	 */
	protected function readRow($row){
		$fonte = new Fonte();
		
		$fonte->id = $row['id'];
		$fonte->subcategoriaId = $row['subcategoria_id'];
		$fonte->nome = $row['nome'];
		$fonte->imagem = $row['imagem'];
		$fonte->descricao = $row['descricao'];
		$fonte->arquivoRar = $row['arquivo_rar'];
		$fonte->arquivoTtf = $row['arquivo_ttf'];
		$fonte->created = $row['created'];
		$fonte->status = $row['status'];
		$fonte->url = $row['url'];

		return $fonte;
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
	 * @return Fonte 
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