<?php
/**
 * Classe operadora da tabela 'cartao_venda'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class CartaoVendaDAO extends Model implements CartaoVendaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CartaoVenda 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cartao_venda WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CartaoVenda      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cartao_venda '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cartao_venda '.$criterio.'';
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
		$sql = 'SELECT * FROM cartao_venda ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param cartaoVenda primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cartao_venda WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CartaoVenda cartaoVenda
 	 */
	public function insert($cartaoVenda){
		$sql = 'INSERT INTO cartao_venda (descricao, porcentagem_cartao, dia_mes_recebimento, dia_semana_recebimento, valor_aluguel_maquina, valor_servico_mensal, caixa_id_recebimento, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cartaoVenda->descricao);
		$sqlQuery->set($cartaoVenda->porcentagemCartao);
		$sqlQuery->setNumber($cartaoVenda->diaMesRecebimento);
		$sqlQuery->setNumber($cartaoVenda->diaSemanaRecebimento);
		$sqlQuery->set($cartaoVenda->valorAluguelMaquina);
		$sqlQuery->set($cartaoVenda->valorServicoMensal);
		$sqlQuery->setNumber($cartaoVenda->caixaIdRecebimento);
		$sqlQuery->set($cartaoVenda->created);
		$sqlQuery->setNumber($cartaoVenda->status);

		$id = $this->executeInsert($sqlQuery);	
		$cartaoVenda->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CartaoVenda cartaoVenda
 	 */
	public function update($cartaoVenda){
		$campos = "";
        
        
		 if(!empty($cartaoVenda->descricao)) $campos .=' descricao = ?,';
		 if(!empty($cartaoVenda->porcentagemCartao)) $campos .=' porcentagem_cartao = ?,';
		 if(!empty($cartaoVenda->diaMesRecebimento)) $campos .=' dia_mes_recebimento = ?,';
		 if(!empty($cartaoVenda->diaSemanaRecebimento)) $campos .=' dia_semana_recebimento = ?,';
		 if(!empty($cartaoVenda->valorAluguelMaquina)) $campos .=' valor_aluguel_maquina = ?,';
		 if(!empty($cartaoVenda->valorServicoMensal)) $campos .=' valor_servico_mensal = ?,';
		 if(!empty($cartaoVenda->caixaIdRecebimento)) $campos .=' caixa_id_recebimento = ?,';
		 if(!empty($cartaoVenda->created)) $campos .=' created = ?,';
		 if(!empty($cartaoVenda->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cartao_venda SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($cartaoVenda->descricao)) 		$sqlQuery->set($cartaoVenda->descricao);
		 if(!empty($cartaoVenda->porcentagemCartao)) 		$sqlQuery->set($cartaoVenda->porcentagemCartao);
		 if(!empty($cartaoVenda->diaMesRecebimento)) 		$sqlQuery->setNumber($cartaoVenda->diaMesRecebimento);
		 if(!empty($cartaoVenda->diaSemanaRecebimento)) 		$sqlQuery->setNumber($cartaoVenda->diaSemanaRecebimento);
		 if(!empty($cartaoVenda->valorAluguelMaquina)) 		$sqlQuery->set($cartaoVenda->valorAluguelMaquina);
		 if(!empty($cartaoVenda->valorServicoMensal)) 		$sqlQuery->set($cartaoVenda->valorServicoMensal);
		 if(!empty($cartaoVenda->caixaIdRecebimento)) 		$sqlQuery->setNumber($cartaoVenda->caixaIdRecebimento);
		 if(!empty($cartaoVenda->created)) 		$sqlQuery->set($cartaoVenda->created);
		 if(!empty($cartaoVenda->status)) 		$sqlQuery->setNumber($cartaoVenda->status);

		$sqlQuery->setNumber($cartaoVenda->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cartao_venda';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM cartao_venda WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPorcentagemCartao($value){
		$sql = 'SELECT * FROM cartao_venda WHERE porcentagem_cartao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDiaMesRecebimento($value){
		$sql = 'SELECT * FROM cartao_venda WHERE dia_mes_recebimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDiaSemanaRecebimento($value){
		$sql = 'SELECT * FROM cartao_venda WHERE dia_semana_recebimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorAluguelMaquina($value){
		$sql = 'SELECT * FROM cartao_venda WHERE valor_aluguel_maquina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorServicoMensal($value){
		$sql = 'SELECT * FROM cartao_venda WHERE valor_servico_mensal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaIdRecebimento($value){
		$sql = 'SELECT * FROM cartao_venda WHERE caixa_id_recebimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM cartao_venda WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM cartao_venda WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM cartao_venda WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPorcentagemCartao($value){
		$sql = 'DELETE FROM cartao_venda WHERE porcentagem_cartao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDiaMesRecebimento($value){
		$sql = 'DELETE FROM cartao_venda WHERE dia_mes_recebimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDiaSemanaRecebimento($value){
		$sql = 'DELETE FROM cartao_venda WHERE dia_semana_recebimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorAluguelMaquina($value){
		$sql = 'DELETE FROM cartao_venda WHERE valor_aluguel_maquina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorServicoMensal($value){
		$sql = 'DELETE FROM cartao_venda WHERE valor_servico_mensal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaIdRecebimento($value){
		$sql = 'DELETE FROM cartao_venda WHERE caixa_id_recebimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM cartao_venda WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM cartao_venda WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CartaoVenda 
	 */
	protected function readRow($row){
		$cartaoVenda = new CartaoVenda();
		
		$cartaoVenda->id = $row['id'];
		$cartaoVenda->descricao = $row['descricao'];
		$cartaoVenda->porcentagemCartao = $row['porcentagem_cartao'];
		$cartaoVenda->diaMesRecebimento = $row['dia_mes_recebimento'];
		$cartaoVenda->diaSemanaRecebimento = $row['dia_semana_recebimento'];
		$cartaoVenda->valorAluguelMaquina = $row['valor_aluguel_maquina'];
		$cartaoVenda->valorServicoMensal = $row['valor_servico_mensal'];
		$cartaoVenda->caixaIdRecebimento = $row['caixa_id_recebimento'];
		$cartaoVenda->created = $row['created'];
		$cartaoVenda->status = $row['status'];

		return $cartaoVenda;
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
	 * @return CartaoVenda 
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