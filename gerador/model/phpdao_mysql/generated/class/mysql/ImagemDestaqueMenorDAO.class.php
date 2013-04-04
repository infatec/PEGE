<?php
/**
 * Classe operadora da tabela 'imagem_destaque_menor'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class ImagemDestaqueMenorDAO extends Model implements ImagemDestaqueMenorI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ImagemDestaqueMenor 
	 */
	public function load($id){
		$sql = 'SELECT * FROM imagem_destaque_menor WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ImagemDestaqueMenor      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM imagem_destaque_menor '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM imagem_destaque_menor '.$criterio.'';
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
		$sql = 'SELECT * FROM imagem_destaque_menor ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param imagemDestaqueMenor primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM imagem_destaque_menor WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ImagemDestaqueMenor imagemDestaqueMenor
 	 */
	public function insert($imagemDestaqueMenor){
		$sql = 'INSERT INTO imagem_destaque_menor (titulo, imagem, link, created, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($imagemDestaqueMenor->titulo);
		$sqlQuery->set($imagemDestaqueMenor->imagem);
		$sqlQuery->set($imagemDestaqueMenor->link);
		$sqlQuery->set($imagemDestaqueMenor->created);
		$sqlQuery->set($imagemDestaqueMenor->status);

		$id = $this->executeInsert($sqlQuery);	
		$imagemDestaqueMenor->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ImagemDestaqueMenor imagemDestaqueMenor
 	 */
	public function update($imagemDestaqueMenor){
		$campos = "";
        
        
		 if(!empty($imagemDestaqueMenor->titulo)) $campos .=' titulo = ?,';
		 if(!empty($imagemDestaqueMenor->imagem)) $campos .=' imagem = ?,';
		 if(!empty($imagemDestaqueMenor->link)) $campos .=' link = ?,';
		 if(!empty($imagemDestaqueMenor->created)) $campos .=' created = ?,';
		 if(!empty($imagemDestaqueMenor->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE imagem_destaque_menor SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($imagemDestaqueMenor->titulo)) 		$sqlQuery->set($imagemDestaqueMenor->titulo);
		 if(!empty($imagemDestaqueMenor->imagem)) 		$sqlQuery->set($imagemDestaqueMenor->imagem);
		 if(!empty($imagemDestaqueMenor->link)) 		$sqlQuery->set($imagemDestaqueMenor->link);
		 if(!empty($imagemDestaqueMenor->created)) 		$sqlQuery->set($imagemDestaqueMenor->created);
		 if(!empty($imagemDestaqueMenor->status)) 		$sqlQuery->set($imagemDestaqueMenor->status);

		$sqlQuery->setNumber($imagemDestaqueMenor->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM imagem_destaque_menor';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM imagem_destaque_menor WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM imagem_destaque_menor WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM imagem_destaque_menor WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM imagem_destaque_menor WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM imagem_destaque_menor WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitulo($value){
		$sql = 'DELETE FROM imagem_destaque_menor WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagem($value){
		$sql = 'DELETE FROM imagem_destaque_menor WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM imagem_destaque_menor WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM imagem_destaque_menor WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM imagem_destaque_menor WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ImagemDestaqueMenor 
	 */
	protected function readRow($row){
		$imagemDestaqueMenor = new ImagemDestaqueMenor();
		
		$imagemDestaqueMenor->id = $row['id'];
		$imagemDestaqueMenor->titulo = $row['titulo'];
		$imagemDestaqueMenor->imagem = $row['imagem'];
		$imagemDestaqueMenor->link = $row['link'];
		$imagemDestaqueMenor->created = $row['created'];
		$imagemDestaqueMenor->status = $row['status'];

		return $imagemDestaqueMenor;
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
	 * @return ImagemDestaqueMenor 
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