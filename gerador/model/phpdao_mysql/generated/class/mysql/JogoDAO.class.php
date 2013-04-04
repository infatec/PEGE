<?php
/**
 * Classe operadora da tabela 'jogo'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-07-16 14:25
 */
class JogoDAO extends Model implements JogoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Jogo 
	 */
	public function load($id){
		$sql = 'SELECT * FROM jogo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Jogo      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM jogo '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM jogo '.$criterio.'';
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
		$sql = 'SELECT * FROM jogo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param jogo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM jogo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Jogo jogo
 	 */
	public function insert($jogo){
		$sql = 'INSERT INTO jogo (categoria_id, nome, subtitulo, descricao, como_jogar, link_jogo, votos, media, click, url, created, status, foto_destaque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($jogo->categoriaId);
		$sqlQuery->set($jogo->nome);
		$sqlQuery->set($jogo->subtitulo);
		$sqlQuery->set($jogo->descricao);
		$sqlQuery->set($jogo->comoJogar);
		$sqlQuery->set($jogo->linkJogo);
		$sqlQuery->setNumber($jogo->voto);
		$sqlQuery->set($jogo->media);
		$sqlQuery->setNumber($jogo->click);
		$sqlQuery->set($jogo->url);
		$sqlQuery->set($jogo->created);
		$sqlQuery->set($jogo->status);
		$sqlQuery->set($jogo->fotoDestaque);

		$id = $this->executeInsert($sqlQuery);	
		$jogo->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Jogo jogo
 	 */
	public function update($jogo){
		$campos = "";
        
        
		 if(!empty($jogo->categoriaId)) $campos .=' categoria_id = ?,';
		 if(!empty($jogo->nome)) $campos .=' nome = ?,';
		 if(!empty($jogo->subtitulo)) $campos .=' subtitulo = ?,';
		 if(!empty($jogo->descricao)) $campos .=' descricao = ?,';
		 if(!empty($jogo->comoJogar)) $campos .=' como_jogar = ?,';
		 if(!empty($jogo->linkJogo)) $campos .=' link_jogo = ?,';
		 if(!empty($jogo->voto)) $campos .=' votos = ?,';
		 if(!empty($jogo->media)) $campos .=' media = ?,';
		 if(!empty($jogo->click)) $campos .=' click = ?,';
		 if(!empty($jogo->url)) $campos .=' url = ?,';
		 if(!empty($jogo->created)) $campos .=' created = ?,';
		 if(!empty($jogo->status)) $campos .=' status = ?,';
		 if(!empty($jogo->fotoDestaque)) $campos .=' foto_destaque = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE jogo SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($jogo->categoriaId)) 		$sqlQuery->setNumber($jogo->categoriaId);
		 if(!empty($jogo->nome)) 		$sqlQuery->set($jogo->nome);
		 if(!empty($jogo->subtitulo)) 		$sqlQuery->set($jogo->subtitulo);
		 if(!empty($jogo->descricao)) 		$sqlQuery->set($jogo->descricao);
		 if(!empty($jogo->comoJogar)) 		$sqlQuery->set($jogo->comoJogar);
		 if(!empty($jogo->linkJogo)) 		$sqlQuery->set($jogo->linkJogo);
		 if(!empty($jogo->voto)) 		$sqlQuery->setNumber($jogo->voto);
		 if(!empty($jogo->media)) 		$sqlQuery->set($jogo->media);
		 if(!empty($jogo->click)) 		$sqlQuery->setNumber($jogo->click);
		 if(!empty($jogo->url)) 		$sqlQuery->set($jogo->url);
		 if(!empty($jogo->created)) 		$sqlQuery->set($jogo->created);
		 if(!empty($jogo->status)) 		$sqlQuery->set($jogo->status);
		 if(!empty($jogo->fotoDestaque)) 		$sqlQuery->set($jogo->fotoDestaque);

		$sqlQuery->setNumber($jogo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM jogo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoriaId($value){
		$sql = 'SELECT * FROM jogo WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM jogo WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubtitulo($value){
		$sql = 'SELECT * FROM jogo WHERE subtitulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM jogo WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComoJogar($value){
		$sql = 'SELECT * FROM jogo WHERE como_jogar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkJogo($value){
		$sql = 'SELECT * FROM jogo WHERE link_jogo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVotos($value){
		$sql = 'SELECT * FROM jogo WHERE votos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMedia($value){
		$sql = 'SELECT * FROM jogo WHERE media = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClick($value){
		$sql = 'SELECT * FROM jogo WHERE click = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM jogo WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM jogo WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM jogo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFotoDestaque($value){
		$sql = 'SELECT * FROM jogo WHERE foto_destaque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoriaId($value){
		$sql = 'DELETE FROM jogo WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM jogo WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubtitulo($value){
		$sql = 'DELETE FROM jogo WHERE subtitulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM jogo WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComoJogar($value){
		$sql = 'DELETE FROM jogo WHERE como_jogar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkJogo($value){
		$sql = 'DELETE FROM jogo WHERE link_jogo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVotos($value){
		$sql = 'DELETE FROM jogo WHERE votos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMedia($value){
		$sql = 'DELETE FROM jogo WHERE media = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClick($value){
		$sql = 'DELETE FROM jogo WHERE click = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrl($value){
		$sql = 'DELETE FROM jogo WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM jogo WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM jogo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFotoDestaque($value){
		$sql = 'DELETE FROM jogo WHERE foto_destaque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Jogo 
	 */
	protected function readRow($row){
		$jogo = new Jogo();
		
		$jogo->id = $row['id'];
		$jogo->categoriaId = $row['categoria_id'];
		$jogo->nome = $row['nome'];
		$jogo->subtitulo = $row['subtitulo'];
		$jogo->descricao = $row['descricao'];
		$jogo->comoJogar = $row['como_jogar'];
		$jogo->linkJogo = $row['link_jogo'];
		$jogo->voto = $row['votos'];
		$jogo->media = $row['media'];
		$jogo->click = $row['click'];
		$jogo->url = $row['url'];
		$jogo->created = $row['created'];
		$jogo->status = $row['status'];
		$jogo->fotoDestaque = $row['foto_destaque'];

		return $jogo;
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
	 * @return Jogo 
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