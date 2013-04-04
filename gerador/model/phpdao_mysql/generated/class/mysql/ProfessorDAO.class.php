<?php
/**
 * Classe operadora da tabela 'professor'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class ProfessorDAO extends Model implements ProfessorI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Professor 
	 */
	public function load($id){
		$sql = 'SELECT * FROM professor WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Professor      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM professor '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM professor '.$criterio.'';
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
		$sql = 'SELECT * FROM professor ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param professor primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM professor WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Professor professor
 	 */
	public function insert($professor){
		$sql = 'INSERT INTO professor (curso_id, nome, titulacao, cpf, rg, endereco, numero, bairro, cep, complemento, telefone1, telefone2, celular, email, estado_id, cidade_id, area, matricula, senha, data_admissao, CPTS, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($professor->cursoId);
		$sqlQuery->set($professor->nome);
		$sqlQuery->set($professor->titulacao);
		$sqlQuery->set($professor->cpf);
		$sqlQuery->set($professor->rg);
		$sqlQuery->set($professor->endereco);
		$sqlQuery->set($professor->numero);
		$sqlQuery->set($professor->bairro);
		$sqlQuery->set($professor->cep);
		$sqlQuery->set($professor->complemento);
		$sqlQuery->set($professor->telefone1);
		$sqlQuery->set($professor->telefone2);
		$sqlQuery->set($professor->celular);
		$sqlQuery->set($professor->email);
		$sqlQuery->setNumber($professor->estadoId);
		$sqlQuery->setNumber($professor->cidadeId);
		$sqlQuery->set($professor->area);
		$sqlQuery->set($professor->matricula);
		$sqlQuery->set($professor->senha);
		$sqlQuery->set($professor->dataAdmissao);
		$sqlQuery->set($professor->cPTS);
		$sqlQuery->set($professor->created);
		$sqlQuery->setNumber($professor->status);

		$id = $this->executeInsert($sqlQuery);	
		$professor->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Professor professor
 	 */
	public function update($professor){
		$campos = "";
        
        
		 if(!empty($professor->cursoId)) $campos .=' curso_id = ?,';
		 if(!empty($professor->nome)) $campos .=' nome = ?,';
		 if(!empty($professor->titulacao)) $campos .=' titulacao = ?,';
		 if(!empty($professor->cpf)) $campos .=' cpf = ?,';
		 if(!empty($professor->rg)) $campos .=' rg = ?,';
		 if(!empty($professor->endereco)) $campos .=' endereco = ?,';
		 if(!empty($professor->numero)) $campos .=' numero = ?,';
		 if(!empty($professor->bairro)) $campos .=' bairro = ?,';
		 if(!empty($professor->cep)) $campos .=' cep = ?,';
		 if(!empty($professor->complemento)) $campos .=' complemento = ?,';
		 if(!empty($professor->telefone1)) $campos .=' telefone1 = ?,';
		 if(!empty($professor->telefone2)) $campos .=' telefone2 = ?,';
		 if(!empty($professor->celular)) $campos .=' celular = ?,';
		 if(!empty($professor->email)) $campos .=' email = ?,';
		 if(!empty($professor->estadoId)) $campos .=' estado_id = ?,';
		 if(!empty($professor->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($professor->area)) $campos .=' area = ?,';
		 if(!empty($professor->matricula)) $campos .=' matricula = ?,';
		 if(!empty($professor->senha)) $campos .=' senha = ?,';
		 if(!empty($professor->dataAdmissao)) $campos .=' data_admissao = ?,';
		 if(!empty($professor->cPTS)) $campos .=' CPTS = ?,';
		 if(!empty($professor->created)) $campos .=' created = ?,';
		 if(!empty($professor->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE professor SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($professor->cursoId)) 		$sqlQuery->setNumber($professor->cursoId);
		 if(!empty($professor->nome)) 		$sqlQuery->set($professor->nome);
		 if(!empty($professor->titulacao)) 		$sqlQuery->set($professor->titulacao);
		 if(!empty($professor->cpf)) 		$sqlQuery->set($professor->cpf);
		 if(!empty($professor->rg)) 		$sqlQuery->set($professor->rg);
		 if(!empty($professor->endereco)) 		$sqlQuery->set($professor->endereco);
		 if(!empty($professor->numero)) 		$sqlQuery->set($professor->numero);
		 if(!empty($professor->bairro)) 		$sqlQuery->set($professor->bairro);
		 if(!empty($professor->cep)) 		$sqlQuery->set($professor->cep);
		 if(!empty($professor->complemento)) 		$sqlQuery->set($professor->complemento);
		 if(!empty($professor->telefone1)) 		$sqlQuery->set($professor->telefone1);
		 if(!empty($professor->telefone2)) 		$sqlQuery->set($professor->telefone2);
		 if(!empty($professor->celular)) 		$sqlQuery->set($professor->celular);
		 if(!empty($professor->email)) 		$sqlQuery->set($professor->email);
		 if(!empty($professor->estadoId)) 		$sqlQuery->setNumber($professor->estadoId);
		 if(!empty($professor->cidadeId)) 		$sqlQuery->setNumber($professor->cidadeId);
		 if(!empty($professor->area)) 		$sqlQuery->set($professor->area);
		 if(!empty($professor->matricula)) 		$sqlQuery->set($professor->matricula);
		 if(!empty($professor->senha)) 		$sqlQuery->set($professor->senha);
		 if(!empty($professor->dataAdmissao)) 		$sqlQuery->set($professor->dataAdmissao);
		 if(!empty($professor->cPTS)) 		$sqlQuery->set($professor->cPTS);
		 if(!empty($professor->created)) 		$sqlQuery->set($professor->created);
		 if(!empty($professor->status)) 		$sqlQuery->setNumber($professor->status);

		$sqlQuery->setNumber($professor->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM professor';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCursoId($value){
		$sql = 'SELECT * FROM professor WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM professor WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulacao($value){
		$sql = 'SELECT * FROM professor WHERE titulacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpf($value){
		$sql = 'SELECT * FROM professor WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRg($value){
		$sql = 'SELECT * FROM professor WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM professor WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM professor WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM professor WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCep($value){
		$sql = 'SELECT * FROM professor WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComplemento($value){
		$sql = 'SELECT * FROM professor WHERE complemento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone1($value){
		$sql = 'SELECT * FROM professor WHERE telefone1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone2($value){
		$sql = 'SELECT * FROM professor WHERE telefone2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCelular($value){
		$sql = 'SELECT * FROM professor WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM professor WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadoId($value){
		$sql = 'SELECT * FROM professor WHERE estado_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM professor WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByArea($value){
		$sql = 'SELECT * FROM professor WHERE area = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMatricula($value){
		$sql = 'SELECT * FROM professor WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM professor WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataAdmissao($value){
		$sql = 'SELECT * FROM professor WHERE data_admissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCPTS($value){
		$sql = 'SELECT * FROM professor WHERE CPTS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM professor WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM professor WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCursoId($value){
		$sql = 'DELETE FROM professor WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM professor WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulacao($value){
		$sql = 'DELETE FROM professor WHERE titulacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpf($value){
		$sql = 'DELETE FROM professor WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRg($value){
		$sql = 'DELETE FROM professor WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM professor WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM professor WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM professor WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCep($value){
		$sql = 'DELETE FROM professor WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComplemento($value){
		$sql = 'DELETE FROM professor WHERE complemento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone1($value){
		$sql = 'DELETE FROM professor WHERE telefone1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone2($value){
		$sql = 'DELETE FROM professor WHERE telefone2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCelular($value){
		$sql = 'DELETE FROM professor WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM professor WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadoId($value){
		$sql = 'DELETE FROM professor WHERE estado_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM professor WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByArea($value){
		$sql = 'DELETE FROM professor WHERE area = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMatricula($value){
		$sql = 'DELETE FROM professor WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM professor WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataAdmissao($value){
		$sql = 'DELETE FROM professor WHERE data_admissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCPTS($value){
		$sql = 'DELETE FROM professor WHERE CPTS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM professor WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM professor WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Professor 
	 */
	protected function readRow($row){
		$professor = new Professor();
		
		$professor->id = $row['id'];
		$professor->cursoId = $row['curso_id'];
		$professor->nome = $row['nome'];
		$professor->titulacao = $row['titulacao'];
		$professor->cpf = $row['cpf'];
		$professor->rg = $row['rg'];
		$professor->endereco = $row['endereco'];
		$professor->numero = $row['numero'];
		$professor->bairro = $row['bairro'];
		$professor->cep = $row['cep'];
		$professor->complemento = $row['complemento'];
		$professor->telefone1 = $row['telefone1'];
		$professor->telefone2 = $row['telefone2'];
		$professor->celular = $row['celular'];
		$professor->email = $row['email'];
		$professor->estadoId = $row['estado_id'];
		$professor->cidadeId = $row['cidade_id'];
		$professor->area = $row['area'];
		$professor->matricula = $row['matricula'];
		$professor->senha = $row['senha'];
		$professor->dataAdmissao = $row['data_admissao'];
		$professor->cPTS = $row['CPTS'];
		$professor->created = $row['created'];
		$professor->status = $row['status'];

		return $professor;
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
	 * @return Professor 
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