<?php
/**
 * Classe operadora da tabela 'imagem_destaque'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class ImagemDestaqueDAO extends Model implements ImagemDestaqueI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ImagemDestaque 
	 */
	public function load($id){
		$sql = 'SELECT * FROM imagem_destaque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ImagemDestaque      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM imagem_destaque '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM imagem_destaque '.$criterio.'';
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
		$sql = 'SELECT * FROM imagem_destaque ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param imagemDestaque primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM imagem_destaque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ImagemDestaque imagemDestaque
 	 */
	public function insert($imagemDestaque){
		$sql = 'INSERT INTO imagem_destaque (posicao, imagem, status) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($imagemDestaque->posicao);
		$sqlQuery->set($imagemDestaque->imagem);
		$sqlQuery->set($imagemDestaque->status);

		$id = $this->executeInsert($sqlQuery);	
		$imagemDestaque->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ImagemDestaque imagemDestaque
 	 */
	public function update($imagemDestaque){
		$campos = "";
        
        
		 if(!empty($imagemDestaque->posicao)) $campos .=' posicao = ?,';
		 if(!empty($imagemDestaque->imagem)) $campos .=' imagem = ?,';
		 if(!empty($imagemDestaque->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE imagem_destaque SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($imagemDestaque->posicao)) 		$sqlQuery->setNumber($imagemDestaque->posicao);
		 if(!empty($imagemDestaque->imagem)) 		$sqlQuery->set($imagemDestaque->imagem);
		 if(!empty($imagemDestaque->status)) 		$sqlQuery->set($imagemDestaque->status);

		$sqlQuery->setNumber($imagemDestaque->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM imagem_destaque';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPosicao($value){
		$sql = 'SELECT * FROM imagem_destaque WHERE posicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM imagem_destaque WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM imagem_destaque WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPosicao($value){
		$sql = 'DELETE FROM imagem_destaque WHERE posicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagem($value){
		$sql = 'DELETE FROM imagem_destaque WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM imagem_destaque WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ImagemDestaque 
	 */
	protected function readRow($row){
		$imagemDestaque = new ImagemDestaque();
		
		$imagemDestaque->id = $row['id'];
		$imagemDestaque->posicao = $row['posicao'];
		$imagemDestaque->imagem = $row['imagem'];
		$imagemDestaque->status = $row['status'];

		return $imagemDestaque;
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
	 * @return ImagemDestaque 
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