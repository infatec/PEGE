<?php
/**
 * Classe operadora da tabela 'destaque'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-07-16 14:25
 */
class DestaqueDAO extends Model implements DestaqueI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Destaque 
	 */
	public function load($id){
		$sql = 'SELECT * FROM destaque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Destaque      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM destaque '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM destaque '.$criterio.'';
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
		$sql = 'SELECT * FROM destaque ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param destaque primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM destaque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Destaque destaque
 	 */
	public function insert($destaque){
		$sql = 'INSERT INTO destaque (posicao, jogo_id, titulo, subtitulo, imagem, url) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($destaque->posicao);
		$sqlQuery->setNumber($destaque->jogoId);
		$sqlQuery->set($destaque->titulo);
		$sqlQuery->set($destaque->subtitulo);
		$sqlQuery->set($destaque->imagem);
		$sqlQuery->set($destaque->url);

		$id = $this->executeInsert($sqlQuery);	
		$destaque->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Destaque destaque
 	 */
	public function update($destaque){
		$campos = "";
        
        
		 if(!empty($destaque->posicao)) $campos .=' posicao = ?,';
		 if(!empty($destaque->jogoId)) $campos .=' jogo_id = ?,';
		 if(!empty($destaque->titulo)) $campos .=' titulo = ?,';
		 if(!empty($destaque->subtitulo)) $campos .=' subtitulo = ?,';
		 if(!empty($destaque->imagem)) $campos .=' imagem = ?,';
		 if(!empty($destaque->url)) $campos .=' url = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE destaque SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($destaque->posicao)) 		$sqlQuery->setNumber($destaque->posicao);
		 if(!empty($destaque->jogoId)) 		$sqlQuery->setNumber($destaque->jogoId);
		 if(!empty($destaque->titulo)) 		$sqlQuery->set($destaque->titulo);
		 if(!empty($destaque->subtitulo)) 		$sqlQuery->set($destaque->subtitulo);
		 if(!empty($destaque->imagem)) 		$sqlQuery->set($destaque->imagem);
		 if(!empty($destaque->url)) 		$sqlQuery->set($destaque->url);

		$sqlQuery->setNumber($destaque->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM destaque';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPosicao($value){
		$sql = 'SELECT * FROM destaque WHERE posicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByJogoId($value){
		$sql = 'SELECT * FROM destaque WHERE jogo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM destaque WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubtitulo($value){
		$sql = 'SELECT * FROM destaque WHERE subtitulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM destaque WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM destaque WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPosicao($value){
		$sql = 'DELETE FROM destaque WHERE posicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJogoId($value){
		$sql = 'DELETE FROM destaque WHERE jogo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM destaque WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubtitulo($value){
		$sql = 'DELETE FROM destaque WHERE subtitulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagem($value){
		$sql = 'DELETE FROM destaque WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrl($value){
		$sql = 'DELETE FROM destaque WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Destaque 
	 */
	protected function readRow($row){
		$destaque = new Destaque();
		
		$destaque->id = $row['id'];
		$destaque->posicao = $row['posicao'];
		$destaque->jogoId = $row['jogo_id'];
		$destaque->titulo = $row['titulo'];
		$destaque->subtitulo = $row['subtitulo'];
		$destaque->imagem = $row['imagem'];
		$destaque->url = $row['url'];

		return $destaque;
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
	 * @return Destaque 
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