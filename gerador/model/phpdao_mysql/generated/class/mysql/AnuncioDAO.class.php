<?php
/**
 * Classe operadora da tabela 'anuncio'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class AnuncioDAO extends Model implements AnuncioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Anuncio 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anuncio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Anuncio      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM anuncio '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM anuncio '.$criterio.'';
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
		$sql = 'SELECT * FROM anuncio ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param anuncio primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM anuncio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Anuncio anuncio
 	 */
	public function insert($anuncio){
		$sql = 'INSERT INTO anuncio (img, titulo, preco_normal, preco_desconto, porcento_desconto, descricao_anuncio, endereco, bairro, cidade, estado, created, status, compra_coletiva_id, data_inicio, data_fim, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($anuncio->img);
		$sqlQuery->set($anuncio->titulo);
		$sqlQuery->set($anuncio->precoNormal);
		$sqlQuery->set($anuncio->precoDesconto);
		$sqlQuery->set($anuncio->porcentoDesconto);
		$sqlQuery->set($anuncio->descricaoAnuncio);
		$sqlQuery->set($anuncio->endereco);
		$sqlQuery->set($anuncio->bairro);
		$sqlQuery->set($anuncio->cidade);
		$sqlQuery->set($anuncio->estado);
		$sqlQuery->set($anuncio->created);
		$sqlQuery->set($anuncio->status);
		$sqlQuery->setNumber($anuncio->compraColetivaId);
		$sqlQuery->set($anuncio->dataInicio);
		$sqlQuery->set($anuncio->dataFim);
		$sqlQuery->set($anuncio->latitude);
		$sqlQuery->set($anuncio->longitude);

		$id = $this->executeInsert($sqlQuery);	
		$anuncio->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Anuncio anuncio
 	 */
	public function update($anuncio){
		$campos = "";
        
        
		 if(!empty($anuncio->img)) $campos .=' img = ?,';
		 if(!empty($anuncio->titulo)) $campos .=' titulo = ?,';
		 if(!empty($anuncio->precoNormal)) $campos .=' preco_normal = ?,';
		 if(!empty($anuncio->precoDesconto)) $campos .=' preco_desconto = ?,';
		 if(!empty($anuncio->porcentoDesconto)) $campos .=' porcento_desconto = ?,';
		 if(!empty($anuncio->descricaoAnuncio)) $campos .=' descricao_anuncio = ?,';
		 if(!empty($anuncio->endereco)) $campos .=' endereco = ?,';
		 if(!empty($anuncio->bairro)) $campos .=' bairro = ?,';
		 if(!empty($anuncio->cidade)) $campos .=' cidade = ?,';
		 if(!empty($anuncio->estado)) $campos .=' estado = ?,';
		 if(!empty($anuncio->created)) $campos .=' created = ?,';
		 if(!empty($anuncio->status)) $campos .=' status = ?,';
		 if(!empty($anuncio->compraColetivaId)) $campos .=' compra_coletiva_id = ?,';
		 if(!empty($anuncio->dataInicio)) $campos .=' data_inicio = ?,';
		 if(!empty($anuncio->dataFim)) $campos .=' data_fim = ?,';
		 if(!empty($anuncio->latitude)) $campos .=' latitude = ?,';
		 if(!empty($anuncio->longitude)) $campos .=' longitude = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE anuncio SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($anuncio->img)) 		$sqlQuery->set($anuncio->img);
		 if(!empty($anuncio->titulo)) 		$sqlQuery->set($anuncio->titulo);
		 if(!empty($anuncio->precoNormal)) 		$sqlQuery->set($anuncio->precoNormal);
		 if(!empty($anuncio->precoDesconto)) 		$sqlQuery->set($anuncio->precoDesconto);
		 if(!empty($anuncio->porcentoDesconto)) 		$sqlQuery->set($anuncio->porcentoDesconto);
		 if(!empty($anuncio->descricaoAnuncio)) 		$sqlQuery->set($anuncio->descricaoAnuncio);
		 if(!empty($anuncio->endereco)) 		$sqlQuery->set($anuncio->endereco);
		 if(!empty($anuncio->bairro)) 		$sqlQuery->set($anuncio->bairro);
		 if(!empty($anuncio->cidade)) 		$sqlQuery->set($anuncio->cidade);
		 if(!empty($anuncio->estado)) 		$sqlQuery->set($anuncio->estado);
		 if(!empty($anuncio->created)) 		$sqlQuery->set($anuncio->created);
		 if(!empty($anuncio->status)) 		$sqlQuery->set($anuncio->status);
		 if(!empty($anuncio->compraColetivaId)) 		$sqlQuery->setNumber($anuncio->compraColetivaId);
		 if(!empty($anuncio->dataInicio)) 		$sqlQuery->set($anuncio->dataInicio);
		 if(!empty($anuncio->dataFim)) 		$sqlQuery->set($anuncio->dataFim);
		 if(!empty($anuncio->latitude)) 		$sqlQuery->set($anuncio->latitude);
		 if(!empty($anuncio->longitude)) 		$sqlQuery->set($anuncio->longitude);

		$sqlQuery->setNumber($anuncio->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM anuncio';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByImg($value){
		$sql = 'SELECT * FROM anuncio WHERE img = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM anuncio WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecoNormal($value){
		$sql = 'SELECT * FROM anuncio WHERE preco_normal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecoDesconto($value){
		$sql = 'SELECT * FROM anuncio WHERE preco_desconto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPorcentoDesconto($value){
		$sql = 'SELECT * FROM anuncio WHERE porcento_desconto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricaoAnuncio($value){
		$sql = 'SELECT * FROM anuncio WHERE descricao_anuncio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM anuncio WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM anuncio WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM anuncio WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM anuncio WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM anuncio WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM anuncio WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCompraColetivaId($value){
		$sql = 'SELECT * FROM anuncio WHERE compra_coletiva_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInicio($value){
		$sql = 'SELECT * FROM anuncio WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFim($value){
		$sql = 'SELECT * FROM anuncio WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM anuncio WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM anuncio WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByImg($value){
		$sql = 'DELETE FROM anuncio WHERE img = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM anuncio WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecoNormal($value){
		$sql = 'DELETE FROM anuncio WHERE preco_normal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecoDesconto($value){
		$sql = 'DELETE FROM anuncio WHERE preco_desconto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPorcentoDesconto($value){
		$sql = 'DELETE FROM anuncio WHERE porcento_desconto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricaoAnuncio($value){
		$sql = 'DELETE FROM anuncio WHERE descricao_anuncio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM anuncio WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM anuncio WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM anuncio WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM anuncio WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM anuncio WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM anuncio WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCompraColetivaId($value){
		$sql = 'DELETE FROM anuncio WHERE compra_coletiva_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInicio($value){
		$sql = 'DELETE FROM anuncio WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFim($value){
		$sql = 'DELETE FROM anuncio WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM anuncio WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM anuncio WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Anuncio 
	 */
	protected function readRow($row){
		$anuncio = new Anuncio();
		
		$anuncio->id = $row['id'];
		$anuncio->img = $row['img'];
		$anuncio->titulo = $row['titulo'];
		$anuncio->precoNormal = $row['preco_normal'];
		$anuncio->precoDesconto = $row['preco_desconto'];
		$anuncio->porcentoDesconto = $row['porcento_desconto'];
		$anuncio->descricaoAnuncio = $row['descricao_anuncio'];
		$anuncio->endereco = $row['endereco'];
		$anuncio->bairro = $row['bairro'];
		$anuncio->cidade = $row['cidade'];
		$anuncio->estado = $row['estado'];
		$anuncio->created = $row['created'];
		$anuncio->status = $row['status'];
		$anuncio->compraColetivaId = $row['compra_coletiva_id'];
		$anuncio->dataInicio = $row['data_inicio'];
		$anuncio->dataFim = $row['data_fim'];
		$anuncio->latitude = $row['latitude'];
		$anuncio->longitude = $row['longitude'];

		return $anuncio;
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
	 * @return Anuncio 
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