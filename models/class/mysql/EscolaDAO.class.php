<?php
/**
 * Classe operadora da tabela 'escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class EscolaDAO extends Model implements EscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Escola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Escola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM escola '.$criterio.'';
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
		$sql = 'SELECT * FROM escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param escola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Escola escola
 	 */
	public function insert($escola){
		$sql = 'INSERT INTO escola (nome, endereco, numero, bairro, cidade, uf, cep, inep, cnpj, cod_escola, dep_administrativo, status_funcionamento, foto, zona, status_censo, quant_aluno, quant_prof, quant_aux, quant_monitores, quant_tradut_libras, telefone, email, latitude, longitude, cod_estado, cod_cidade, ddd, created, status, distrito, assentamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($escola->nome);
		$sqlQuery->set($escola->endereco);
		$sqlQuery->set($escola->numero);
		$sqlQuery->set($escola->bairro);
		$sqlQuery->set($escola->cidade);
		$sqlQuery->set($escola->uf);
		$sqlQuery->set($escola->cep);
		$sqlQuery->set($escola->inep);
		$sqlQuery->set($escola->cnpj);
		$sqlQuery->set($escola->codEscola);
		$sqlQuery->set($escola->depAdministrativo);
		$sqlQuery->set($escola->statusFuncionamento);
		$sqlQuery->set($escola->foto);
		$sqlQuery->set($escola->zona);
		$sqlQuery->set($escola->statusCenso);
		$sqlQuery->setNumber($escola->quantAluno);
		$sqlQuery->setNumber($escola->quantProf);
		$sqlQuery->setNumber($escola->quantAux);
		$sqlQuery->setNumber($escola->quantMonitore);
		$sqlQuery->setNumber($escola->quantTradutLibra);
		$sqlQuery->set($escola->telefone);
		$sqlQuery->set($escola->email);
		$sqlQuery->set($escola->latitude);
		$sqlQuery->set($escola->longitude);
		$sqlQuery->setNumber($escola->codEstado);
		$sqlQuery->setNumber($escola->codCidade);
		$sqlQuery->set($escola->ddd);
		$sqlQuery->set($escola->created);
		$sqlQuery->set($escola->status);
		$sqlQuery->set($escola->distrito);
		$sqlQuery->set($escola->assentamento);

		$id = $this->executeInsert($sqlQuery);	
		$escola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Escola escola
 	 */
	public function update($escola){
		$campos = "";
        
        
		 if(!empty($escola->nome)) $campos .=' nome = ?,';
		 if(!empty($escola->endereco)) $campos .=' endereco = ?,';
		 if(!empty($escola->numero)) $campos .=' numero = ?,';
		 if(!empty($escola->bairro)) $campos .=' bairro = ?,';
		 if(!empty($escola->cidade)) $campos .=' cidade = ?,';
		 if(!empty($escola->uf)) $campos .=' uf = ?,';
		 if(!empty($escola->cep)) $campos .=' cep = ?,';
		 if(!empty($escola->inep)) $campos .=' inep = ?,';
		 if(!empty($escola->cnpj)) $campos .=' cnpj = ?,';
		 if(!empty($escola->codEscola)) $campos .=' cod_escola = ?,';
		 if(!empty($escola->depAdministrativo)) $campos .=' dep_administrativo = ?,';
		 if(!empty($escola->statusFuncionamento)) $campos .=' status_funcionamento = ?,';
		 if(!empty($escola->foto)) $campos .=' foto = ?,';
		 if(!empty($escola->zona)) $campos .=' zona = ?,';
		 if(!empty($escola->statusCenso)) $campos .=' status_censo = ?,';
		 if(!empty($escola->quantAluno)) $campos .=' quant_aluno = ?,';
		 if(!empty($escola->quantProf)) $campos .=' quant_prof = ?,';
		 if(!empty($escola->quantAux)) $campos .=' quant_aux = ?,';
		 if(!empty($escola->quantMonitore)) $campos .=' quant_monitores = ?,';
		 if(!empty($escola->quantTradutLibra)) $campos .=' quant_tradut_libras = ?,';
		 if(!empty($escola->telefone)) $campos .=' telefone = ?,';
		 if(!empty($escola->email)) $campos .=' email = ?,';
		 if(!empty($escola->latitude)) $campos .=' latitude = ?,';
		 if(!empty($escola->longitude)) $campos .=' longitude = ?,';
		 if(!empty($escola->codEstado)) $campos .=' cod_estado = ?,';
		 if(!empty($escola->codCidade)) $campos .=' cod_cidade = ?,';
		 if(!empty($escola->ddd)) $campos .=' ddd = ?,';
		 if(!empty($escola->created)) $campos .=' created = ?,';
		 if(!empty($escola->status)) $campos .=' status = ?,';
		 if(!empty($escola->distrito)) $campos .=' distrito = ?,';
		 if(!empty($escola->assentamento)) $campos .=' assentamento = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($escola->nome)) 		$sqlQuery->set($escola->nome);
		 if(!empty($escola->endereco)) 		$sqlQuery->set($escola->endereco);
		 if(!empty($escola->numero)) 		$sqlQuery->set($escola->numero);
		 if(!empty($escola->bairro)) 		$sqlQuery->set($escola->bairro);
		 if(!empty($escola->cidade)) 		$sqlQuery->set($escola->cidade);
		 if(!empty($escola->uf)) 		$sqlQuery->set($escola->uf);
		 if(!empty($escola->cep)) 		$sqlQuery->set($escola->cep);
		 if(!empty($escola->inep)) 		$sqlQuery->set($escola->inep);
		 if(!empty($escola->cnpj)) 		$sqlQuery->set($escola->cnpj);
		 if(!empty($escola->codEscola)) 		$sqlQuery->set($escola->codEscola);
		 if(!empty($escola->depAdministrativo)) 		$sqlQuery->set($escola->depAdministrativo);
		 if(!empty($escola->statusFuncionamento)) 		$sqlQuery->set($escola->statusFuncionamento);
		 if(!empty($escola->foto)) 		$sqlQuery->set($escola->foto);
		 if(!empty($escola->zona)) 		$sqlQuery->set($escola->zona);
		 if(!empty($escola->statusCenso)) 		$sqlQuery->set($escola->statusCenso);
		 if(!empty($escola->quantAluno)) 		$sqlQuery->setNumber($escola->quantAluno);
		 if(!empty($escola->quantProf)) 		$sqlQuery->setNumber($escola->quantProf);
		 if(!empty($escola->quantAux)) 		$sqlQuery->setNumber($escola->quantAux);
		 if(!empty($escola->quantMonitore)) 		$sqlQuery->setNumber($escola->quantMonitore);
		 if(!empty($escola->quantTradutLibra)) 		$sqlQuery->setNumber($escola->quantTradutLibra);
		 if(!empty($escola->telefone)) 		$sqlQuery->set($escola->telefone);
		 if(!empty($escola->email)) 		$sqlQuery->set($escola->email);
		 if(!empty($escola->latitude)) 		$sqlQuery->set($escola->latitude);
		 if(!empty($escola->longitude)) 		$sqlQuery->set($escola->longitude);
		 if(!empty($escola->codEstado)) 		$sqlQuery->setNumber($escola->codEstado);
		 if(!empty($escola->codCidade)) 		$sqlQuery->setNumber($escola->codCidade);
		 if(!empty($escola->ddd)) 		$sqlQuery->set($escola->ddd);
		 if(!empty($escola->created)) 		$sqlQuery->set($escola->created);
		 if(!empty($escola->status)) 		$sqlQuery->set($escola->status);
		 if(!empty($escola->distrito)) 		$sqlQuery->set($escola->distrito);
		 if(!empty($escola->assentamento)) 		$sqlQuery->set($escola->assentamento);

		$sqlQuery->setNumber($escola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM escola WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM escola WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM escola WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM escola WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM escola WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUf($value){
		$sql = 'SELECT * FROM escola WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCep($value){
		$sql = 'SELECT * FROM escola WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInep($value){
		$sql = 'SELECT * FROM escola WHERE inep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCnpj($value){
		$sql = 'SELECT * FROM escola WHERE cnpj = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodEscola($value){
		$sql = 'SELECT * FROM escola WHERE cod_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDepAdministrativo($value){
		$sql = 'SELECT * FROM escola WHERE dep_administrativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatusFuncionamento($value){
		$sql = 'SELECT * FROM escola WHERE status_funcionamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM escola WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByZona($value){
		$sql = 'SELECT * FROM escola WHERE zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatusCenso($value){
		$sql = 'SELECT * FROM escola WHERE status_censo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantAluno($value){
		$sql = 'SELECT * FROM escola WHERE quant_aluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantProf($value){
		$sql = 'SELECT * FROM escola WHERE quant_prof = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantAux($value){
		$sql = 'SELECT * FROM escola WHERE quant_aux = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantMonitores($value){
		$sql = 'SELECT * FROM escola WHERE quant_monitores = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantTradutLibras($value){
		$sql = 'SELECT * FROM escola WHERE quant_tradut_libras = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM escola WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM escola WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM escola WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM escola WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodEstado($value){
		$sql = 'SELECT * FROM escola WHERE cod_estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodCidade($value){
		$sql = 'SELECT * FROM escola WHERE cod_cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDdd($value){
		$sql = 'SELECT * FROM escola WHERE ddd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM escola WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM escola WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDistrito($value){
		$sql = 'SELECT * FROM escola WHERE distrito = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAssentamento($value){
		$sql = 'SELECT * FROM escola WHERE assentamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM escola WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM escola WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM escola WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM escola WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM escola WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUf($value){
		$sql = 'DELETE FROM escola WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCep($value){
		$sql = 'DELETE FROM escola WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInep($value){
		$sql = 'DELETE FROM escola WHERE inep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCnpj($value){
		$sql = 'DELETE FROM escola WHERE cnpj = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodEscola($value){
		$sql = 'DELETE FROM escola WHERE cod_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDepAdministrativo($value){
		$sql = 'DELETE FROM escola WHERE dep_administrativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusFuncionamento($value){
		$sql = 'DELETE FROM escola WHERE status_funcionamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM escola WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByZona($value){
		$sql = 'DELETE FROM escola WHERE zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusCenso($value){
		$sql = 'DELETE FROM escola WHERE status_censo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantAluno($value){
		$sql = 'DELETE FROM escola WHERE quant_aluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantProf($value){
		$sql = 'DELETE FROM escola WHERE quant_prof = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantAux($value){
		$sql = 'DELETE FROM escola WHERE quant_aux = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantMonitores($value){
		$sql = 'DELETE FROM escola WHERE quant_monitores = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantTradutLibras($value){
		$sql = 'DELETE FROM escola WHERE quant_tradut_libras = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM escola WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM escola WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM escola WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM escola WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodEstado($value){
		$sql = 'DELETE FROM escola WHERE cod_estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodCidade($value){
		$sql = 'DELETE FROM escola WHERE cod_cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDdd($value){
		$sql = 'DELETE FROM escola WHERE ddd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM escola WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM escola WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDistrito($value){
		$sql = 'DELETE FROM escola WHERE distrito = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAssentamento($value){
		$sql = 'DELETE FROM escola WHERE assentamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Escola 
	 */
	protected function readRow($row){
		$escola = new Escola();
		
		$escola->id = $row['id'];
		$escola->nome = $row['nome'];
		$escola->endereco = $row['endereco'];
		$escola->numero = $row['numero'];
		$escola->bairro = $row['bairro'];
		$escola->cidade = $row['cidade'];
		$escola->uf = $row['uf'];
		$escola->cep = $row['cep'];
		$escola->inep = $row['inep'];
		$escola->cnpj = $row['cnpj'];
		$escola->codEscola = $row['cod_escola'];
		$escola->depAdministrativo = $row['dep_administrativo'];
		$escola->statusFuncionamento = $row['status_funcionamento'];
		$escola->foto = $row['foto'];
		$escola->zona = $row['zona'];
		$escola->statusCenso = $row['status_censo'];
		$escola->quantAluno = $row['quant_aluno'];
		$escola->quantProf = $row['quant_prof'];
		$escola->quantAux = $row['quant_aux'];
		$escola->quantMonitore = $row['quant_monitores'];
		$escola->quantTradutLibra = $row['quant_tradut_libras'];
		$escola->telefone = $row['telefone'];
		$escola->email = $row['email'];
		$escola->latitude = $row['latitude'];
		$escola->longitude = $row['longitude'];
		$escola->codEstado = $row['cod_estado'];
		$escola->codCidade = $row['cod_cidade'];
		$escola->ddd = $row['ddd'];
		$escola->created = $row['created'];
		$escola->status = $row['status'];
		$escola->distrito = $row['distrito'];
		$escola->assentamento = $row['assentamento'];

		return $escola;
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
	 * @return Escola 
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