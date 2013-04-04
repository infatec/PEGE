<?php
/**
 * Classe operadora da tabela 'noticia'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class NoticiaDAO extends Model implements NoticiaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Noticia 
	 */
	public function load($id){
		$sql = 'SELECT * FROM noticia WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Noticia      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM noticia '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM noticia '.$criterio.'';
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
		$sql = 'SELECT * FROM noticia ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param noticia primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM noticia WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Noticia noticia
 	 */
	public function insert($noticia){
		$sql = 'INSERT INTO noticia (id_bd_antigo, editoria_id, tipo_destaque_id, url, titulo, subtitulo, assinatura, conteudo, data_entrada, palavra_chave, foto_destaque, legenda_foto_interna, foto_interna, created, status, clicks, credito_foto, fonte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($noticia->idBdAntigo);
		$sqlQuery->setNumber($noticia->editoriaId);
		$sqlQuery->setNumber($noticia->tipoDestaqueId);
		$sqlQuery->set($noticia->url);
		$sqlQuery->set($noticia->titulo);
		$sqlQuery->set($noticia->subtitulo);
		$sqlQuery->set($noticia->assinatura);
		$sqlQuery->set($noticia->conteudo);
		$sqlQuery->set($noticia->dataEntrada);
		$sqlQuery->set($noticia->palavraChave);
		$sqlQuery->set($noticia->fotoDestaque);
		$sqlQuery->set($noticia->legendaFotoInterna);
		$sqlQuery->set($noticia->fotoInterna);
		$sqlQuery->set($noticia->created);
		$sqlQuery->set($noticia->status);
		$sqlQuery->setNumber($noticia->click);
		$sqlQuery->set($noticia->creditoFoto);
		$sqlQuery->set($noticia->fonte);

		$id = $this->executeInsert($sqlQuery);	
		$noticia->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Noticia noticia
 	 */
	public function update($noticia){
		$campos = "";
        
        
		 if(!empty($noticia->idBdAntigo)) $campos .=' id_bd_antigo = ?,';
		 if(!empty($noticia->editoriaId)) $campos .=' editoria_id = ?,';
		 if(!empty($noticia->tipoDestaqueId)) $campos .=' tipo_destaque_id = ?,';
		 if(!empty($noticia->url)) $campos .=' url = ?,';
		 if(!empty($noticia->titulo)) $campos .=' titulo = ?,';
		 if(!empty($noticia->subtitulo)) $campos .=' subtitulo = ?,';
		 if(!empty($noticia->assinatura)) $campos .=' assinatura = ?,';
		 if(!empty($noticia->conteudo)) $campos .=' conteudo = ?,';
		 if(!empty($noticia->dataEntrada)) $campos .=' data_entrada = ?,';
		 if(!empty($noticia->palavraChave)) $campos .=' palavra_chave = ?,';
		 if(!empty($noticia->fotoDestaque)) $campos .=' foto_destaque = ?,';
		 if(!empty($noticia->legendaFotoInterna)) $campos .=' legenda_foto_interna = ?,';
		 if(!empty($noticia->fotoInterna)) $campos .=' foto_interna = ?,';
		 if(!empty($noticia->created)) $campos .=' created = ?,';
		 if(!empty($noticia->status)) $campos .=' status = ?,';
		 if(!empty($noticia->click)) $campos .=' clicks = ?,';
		 if(!empty($noticia->creditoFoto)) $campos .=' credito_foto = ?,';
		 if(!empty($noticia->fonte)) $campos .=' fonte = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE noticia SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($noticia->idBdAntigo)) 		$sqlQuery->setNumber($noticia->idBdAntigo);
		 if(!empty($noticia->editoriaId)) 		$sqlQuery->setNumber($noticia->editoriaId);
		 if(!empty($noticia->tipoDestaqueId)) 		$sqlQuery->setNumber($noticia->tipoDestaqueId);
		 if(!empty($noticia->url)) 		$sqlQuery->set($noticia->url);
		 if(!empty($noticia->titulo)) 		$sqlQuery->set($noticia->titulo);
		 if(!empty($noticia->subtitulo)) 		$sqlQuery->set($noticia->subtitulo);
		 if(!empty($noticia->assinatura)) 		$sqlQuery->set($noticia->assinatura);
		 if(!empty($noticia->conteudo)) 		$sqlQuery->set($noticia->conteudo);
		 if(!empty($noticia->dataEntrada)) 		$sqlQuery->set($noticia->dataEntrada);
		 if(!empty($noticia->palavraChave)) 		$sqlQuery->set($noticia->palavraChave);
		 if(!empty($noticia->fotoDestaque)) 		$sqlQuery->set($noticia->fotoDestaque);
		 if(!empty($noticia->legendaFotoInterna)) 		$sqlQuery->set($noticia->legendaFotoInterna);
		 if(!empty($noticia->fotoInterna)) 		$sqlQuery->set($noticia->fotoInterna);
		 if(!empty($noticia->created)) 		$sqlQuery->set($noticia->created);
		 if(!empty($noticia->status)) 		$sqlQuery->set($noticia->status);
		 if(!empty($noticia->click)) 		$sqlQuery->setNumber($noticia->click);
		 if(!empty($noticia->creditoFoto)) 		$sqlQuery->set($noticia->creditoFoto);
		 if(!empty($noticia->fonte)) 		$sqlQuery->set($noticia->fonte);

		$sqlQuery->setNumber($noticia->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM noticia';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdBdAntigo($value){
		$sql = 'SELECT * FROM noticia WHERE id_bd_antigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEditoriaId($value){
		$sql = 'SELECT * FROM noticia WHERE editoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoDestaqueId($value){
		$sql = 'SELECT * FROM noticia WHERE tipo_destaque_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM noticia WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM noticia WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubtitulo($value){
		$sql = 'SELECT * FROM noticia WHERE subtitulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAssinatura($value){
		$sql = 'SELECT * FROM noticia WHERE assinatura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConteudo($value){
		$sql = 'SELECT * FROM noticia WHERE conteudo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEntrada($value){
		$sql = 'SELECT * FROM noticia WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPalavraChave($value){
		$sql = 'SELECT * FROM noticia WHERE palavra_chave = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFotoDestaque($value){
		$sql = 'SELECT * FROM noticia WHERE foto_destaque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLegendaFotoInterna($value){
		$sql = 'SELECT * FROM noticia WHERE legenda_foto_interna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFotoInterna($value){
		$sql = 'SELECT * FROM noticia WHERE foto_interna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM noticia WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM noticia WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClicks($value){
		$sql = 'SELECT * FROM noticia WHERE clicks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreditoFoto($value){
		$sql = 'SELECT * FROM noticia WHERE credito_foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFonte($value){
		$sql = 'SELECT * FROM noticia WHERE fonte = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdBdAntigo($value){
		$sql = 'DELETE FROM noticia WHERE id_bd_antigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEditoriaId($value){
		$sql = 'DELETE FROM noticia WHERE editoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoDestaqueId($value){
		$sql = 'DELETE FROM noticia WHERE tipo_destaque_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrl($value){
		$sql = 'DELETE FROM noticia WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM noticia WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubtitulo($value){
		$sql = 'DELETE FROM noticia WHERE subtitulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAssinatura($value){
		$sql = 'DELETE FROM noticia WHERE assinatura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConteudo($value){
		$sql = 'DELETE FROM noticia WHERE conteudo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEntrada($value){
		$sql = 'DELETE FROM noticia WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPalavraChave($value){
		$sql = 'DELETE FROM noticia WHERE palavra_chave = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFotoDestaque($value){
		$sql = 'DELETE FROM noticia WHERE foto_destaque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLegendaFotoInterna($value){
		$sql = 'DELETE FROM noticia WHERE legenda_foto_interna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFotoInterna($value){
		$sql = 'DELETE FROM noticia WHERE foto_interna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM noticia WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM noticia WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClicks($value){
		$sql = 'DELETE FROM noticia WHERE clicks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreditoFoto($value){
		$sql = 'DELETE FROM noticia WHERE credito_foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFonte($value){
		$sql = 'DELETE FROM noticia WHERE fonte = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Noticia 
	 */
	protected function readRow($row){
		$noticia = new Noticia();
		
		$noticia->id = $row['id'];
		$noticia->idBdAntigo = $row['id_bd_antigo'];
		$noticia->editoriaId = $row['editoria_id'];
		$noticia->tipoDestaqueId = $row['tipo_destaque_id'];
		$noticia->url = $row['url'];
		$noticia->titulo = $row['titulo'];
		$noticia->subtitulo = $row['subtitulo'];
		$noticia->assinatura = $row['assinatura'];
		$noticia->conteudo = $row['conteudo'];
		$noticia->dataEntrada = $row['data_entrada'];
		$noticia->palavraChave = $row['palavra_chave'];
		$noticia->fotoDestaque = $row['foto_destaque'];
		$noticia->legendaFotoInterna = $row['legenda_foto_interna'];
		$noticia->fotoInterna = $row['foto_interna'];
		$noticia->created = $row['created'];
		$noticia->status = $row['status'];
		$noticia->click = $row['clicks'];
		$noticia->creditoFoto = $row['credito_foto'];
		$noticia->fonte = $row['fonte'];

		return $noticia;
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
	 * @return Noticia 
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