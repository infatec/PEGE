<?php
/**
 * Classe operadora da tabela 'mensalidade'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class MensalidadeDAO extends Model implements MensalidadeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Mensalidade 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mensalidade WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Mensalidade      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM mensalidade '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM mensalidade '.$criterio.'';
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
		$sql = 'SELECT * FROM mensalidade ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param mensalidade primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM mensalidade WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Mensalidade mensalidade
 	 */
	public function insert($mensalidade){
		$sql = 'INSERT INTO mensalidade (aluno_id, periodo_id, parcela, qtd_parcela, valor_parcela, valor_recebido, data_vencimento, created, situacao, data_pagamento, usuario_baixa_id, usuario_edicao_id, data_modificacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($mensalidade->alunoId);
		$sqlQuery->setNumber($mensalidade->periodoId);
		$sqlQuery->setNumber($mensalidade->parcela);
		$sqlQuery->setNumber($mensalidade->qtdParcela);
		$sqlQuery->set($mensalidade->valorParcela);
		$sqlQuery->set($mensalidade->valorRecebido);
		$sqlQuery->set($mensalidade->dataVencimento);
		$sqlQuery->set($mensalidade->created);
		$sqlQuery->set($mensalidade->situacao);
		$sqlQuery->set($mensalidade->dataPagamento);
		$sqlQuery->setNumber($mensalidade->usuarioBaixaId);
		$sqlQuery->setNumber($mensalidade->usuarioEdicaoId);
		$sqlQuery->set($mensalidade->dataModificacao);

		$id = $this->executeInsert($sqlQuery);	
		$mensalidade->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Mensalidade mensalidade
 	 */
	public function update($mensalidade){
		$campos = "";
        
        
		 if(!empty($mensalidade->alunoId)) $campos .=' aluno_id = ?,';
		 if(!empty($mensalidade->periodoId)) $campos .=' periodo_id = ?,';
		 if(!empty($mensalidade->parcela)) $campos .=' parcela = ?,';
		 if(!empty($mensalidade->qtdParcela)) $campos .=' qtd_parcela = ?,';
		 if(!empty($mensalidade->valorParcela)) $campos .=' valor_parcela = ?,';
		 if(!empty($mensalidade->valorRecebido)) $campos .=' valor_recebido = ?,';
		 if(!empty($mensalidade->dataVencimento)) $campos .=' data_vencimento = ?,';
		 if(!empty($mensalidade->created)) $campos .=' created = ?,';
		 if(!empty($mensalidade->situacao)) $campos .=' situacao = ?,';
		 if(!empty($mensalidade->dataPagamento)) $campos .=' data_pagamento = ?,';
		 if(!empty($mensalidade->usuarioBaixaId)) $campos .=' usuario_baixa_id = ?,';
		 if(!empty($mensalidade->usuarioEdicaoId)) $campos .=' usuario_edicao_id = ?,';
		 if(!empty($mensalidade->dataModificacao)) $campos .=' data_modificacao = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE mensalidade SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($mensalidade->alunoId)) 		$sqlQuery->setNumber($mensalidade->alunoId);
		 if(!empty($mensalidade->periodoId)) 		$sqlQuery->setNumber($mensalidade->periodoId);
		 if(!empty($mensalidade->parcela)) 		$sqlQuery->setNumber($mensalidade->parcela);
		 if(!empty($mensalidade->qtdParcela)) 		$sqlQuery->setNumber($mensalidade->qtdParcela);
		 if(!empty($mensalidade->valorParcela)) 		$sqlQuery->set($mensalidade->valorParcela);
		 if(!empty($mensalidade->valorRecebido)) 		$sqlQuery->set($mensalidade->valorRecebido);
		 if(!empty($mensalidade->dataVencimento)) 		$sqlQuery->set($mensalidade->dataVencimento);
		 if(!empty($mensalidade->created)) 		$sqlQuery->set($mensalidade->created);
		 if(!empty($mensalidade->situacao)) 		$sqlQuery->set($mensalidade->situacao);
		 if(!empty($mensalidade->dataPagamento)) 		$sqlQuery->set($mensalidade->dataPagamento);
		 if(!empty($mensalidade->usuarioBaixaId)) 		$sqlQuery->setNumber($mensalidade->usuarioBaixaId);
		 if(!empty($mensalidade->usuarioEdicaoId)) 		$sqlQuery->setNumber($mensalidade->usuarioEdicaoId);
		 if(!empty($mensalidade->dataModificacao)) 		$sqlQuery->set($mensalidade->dataModificacao);

		$sqlQuery->setNumber($mensalidade->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM mensalidade';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM mensalidade WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodoId($value){
		$sql = 'SELECT * FROM mensalidade WHERE periodo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParcela($value){
		$sql = 'SELECT * FROM mensalidade WHERE parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtdParcela($value){
		$sql = 'SELECT * FROM mensalidade WHERE qtd_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorParcela($value){
		$sql = 'SELECT * FROM mensalidade WHERE valor_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorRecebido($value){
		$sql = 'SELECT * FROM mensalidade WHERE valor_recebido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataVencimento($value){
		$sql = 'SELECT * FROM mensalidade WHERE data_vencimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM mensalidade WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySituacao($value){
		$sql = 'SELECT * FROM mensalidade WHERE situacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataPagamento($value){
		$sql = 'SELECT * FROM mensalidade WHERE data_pagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioBaixaId($value){
		$sql = 'SELECT * FROM mensalidade WHERE usuario_baixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioEdicaoId($value){
		$sql = 'SELECT * FROM mensalidade WHERE usuario_edicao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataModificacao($value){
		$sql = 'SELECT * FROM mensalidade WHERE data_modificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM mensalidade WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodoId($value){
		$sql = 'DELETE FROM mensalidade WHERE periodo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParcela($value){
		$sql = 'DELETE FROM mensalidade WHERE parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtdParcela($value){
		$sql = 'DELETE FROM mensalidade WHERE qtd_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorParcela($value){
		$sql = 'DELETE FROM mensalidade WHERE valor_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorRecebido($value){
		$sql = 'DELETE FROM mensalidade WHERE valor_recebido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataVencimento($value){
		$sql = 'DELETE FROM mensalidade WHERE data_vencimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM mensalidade WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySituacao($value){
		$sql = 'DELETE FROM mensalidade WHERE situacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataPagamento($value){
		$sql = 'DELETE FROM mensalidade WHERE data_pagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioBaixaId($value){
		$sql = 'DELETE FROM mensalidade WHERE usuario_baixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioEdicaoId($value){
		$sql = 'DELETE FROM mensalidade WHERE usuario_edicao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataModificacao($value){
		$sql = 'DELETE FROM mensalidade WHERE data_modificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Mensalidade 
	 */
	protected function readRow($row){
		$mensalidade = new Mensalidade();
		
		$mensalidade->id = $row['id'];
		$mensalidade->alunoId = $row['aluno_id'];
		$mensalidade->periodoId = $row['periodo_id'];
		$mensalidade->parcela = $row['parcela'];
		$mensalidade->qtdParcela = $row['qtd_parcela'];
		$mensalidade->valorParcela = $row['valor_parcela'];
		$mensalidade->valorRecebido = $row['valor_recebido'];
		$mensalidade->dataVencimento = $row['data_vencimento'];
		$mensalidade->created = $row['created'];
		$mensalidade->situacao = $row['situacao'];
		$mensalidade->dataPagamento = $row['data_pagamento'];
		$mensalidade->usuarioBaixaId = $row['usuario_baixa_id'];
		$mensalidade->usuarioEdicaoId = $row['usuario_edicao_id'];
		$mensalidade->dataModificacao = $row['data_modificacao'];

		return $mensalidade;
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
	 * @return Mensalidade 
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