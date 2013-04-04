<?php
/**
 * Classe operadora da tabela 'aluno_turma'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class AlunoTurmaDAO extends Model implements AlunoTurmaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AlunoTurma 
	 */
	public function load($id){
		$sql = 'SELECT * FROM aluno_turma WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AlunoTurma      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM aluno_turma '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM aluno_turma '.$criterio.'';
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
		$sql = 'SELECT * FROM aluno_turma ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param alunoTurma primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM aluno_turma WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AlunoTurma alunoTurma
 	 */
	public function insert($alunoTurma){
		$sql = 'INSERT INTO aluno_turma (aluno_id, turma_id, ocorre_acad_id, data_matricula, numero, nota1, nota2, nota3, nota4, nota5, media_prova, media, final, exame_desempenho) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($alunoTurma->alunoId);
		$sqlQuery->setNumber($alunoTurma->turmaId);
		$sqlQuery->setNumber($alunoTurma->ocorreAcadId);
		$sqlQuery->set($alunoTurma->dataMatricula);
		$sqlQuery->setNumber($alunoTurma->numero);
		$sqlQuery->set($alunoTurma->nota1);
		$sqlQuery->set($alunoTurma->nota2);
		$sqlQuery->set($alunoTurma->nota3);
		$sqlQuery->set($alunoTurma->nota4);
		$sqlQuery->set($alunoTurma->nota5);
		$sqlQuery->set($alunoTurma->mediaProva);
		$sqlQuery->set($alunoTurma->media);
		$sqlQuery->set($alunoTurma->final);
		$sqlQuery->set($alunoTurma->exameDesempenho);

		$id = $this->executeInsert($sqlQuery);	
		$alunoTurma->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AlunoTurma alunoTurma
 	 */
	public function update($alunoTurma){
		$campos = "";
        
        
		 if(!empty($alunoTurma->alunoId)) $campos .=' aluno_id = ?,';
		 if(!empty($alunoTurma->turmaId)) $campos .=' turma_id = ?,';
		 if(!empty($alunoTurma->ocorreAcadId)) $campos .=' ocorre_acad_id = ?,';
		 if(!empty($alunoTurma->dataMatricula)) $campos .=' data_matricula = ?,';
		 if(!empty($alunoTurma->numero)) $campos .=' numero = ?,';
		 if(!empty($alunoTurma->nota1)) $campos .=' nota1 = ?,';
		 if(!empty($alunoTurma->nota2)) $campos .=' nota2 = ?,';
		 if(!empty($alunoTurma->nota3)) $campos .=' nota3 = ?,';
		 if(!empty($alunoTurma->nota4)) $campos .=' nota4 = ?,';
		 if(!empty($alunoTurma->nota5)) $campos .=' nota5 = ?,';
		 if(!empty($alunoTurma->mediaProva)) $campos .=' media_prova = ?,';
		 if(!empty($alunoTurma->media)) $campos .=' media = ?,';
		 if(!empty($alunoTurma->final)) $campos .=' final = ?,';
		 if(!empty($alunoTurma->exameDesempenho)) $campos .=' exame_desempenho = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE aluno_turma SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($alunoTurma->alunoId)) 		$sqlQuery->setNumber($alunoTurma->alunoId);
		 if(!empty($alunoTurma->turmaId)) 		$sqlQuery->setNumber($alunoTurma->turmaId);
		 if(!empty($alunoTurma->ocorreAcadId)) 		$sqlQuery->setNumber($alunoTurma->ocorreAcadId);
		 if(!empty($alunoTurma->dataMatricula)) 		$sqlQuery->set($alunoTurma->dataMatricula);
		 if(!empty($alunoTurma->numero)) 		$sqlQuery->setNumber($alunoTurma->numero);
		 if(!empty($alunoTurma->nota1)) 		$sqlQuery->set($alunoTurma->nota1);
		 if(!empty($alunoTurma->nota2)) 		$sqlQuery->set($alunoTurma->nota2);
		 if(!empty($alunoTurma->nota3)) 		$sqlQuery->set($alunoTurma->nota3);
		 if(!empty($alunoTurma->nota4)) 		$sqlQuery->set($alunoTurma->nota4);
		 if(!empty($alunoTurma->nota5)) 		$sqlQuery->set($alunoTurma->nota5);
		 if(!empty($alunoTurma->mediaProva)) 		$sqlQuery->set($alunoTurma->mediaProva);
		 if(!empty($alunoTurma->media)) 		$sqlQuery->set($alunoTurma->media);
		 if(!empty($alunoTurma->final)) 		$sqlQuery->set($alunoTurma->final);
		 if(!empty($alunoTurma->exameDesempenho)) 		$sqlQuery->set($alunoTurma->exameDesempenho);

		$sqlQuery->setNumber($alunoTurma->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM aluno_turma';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM aluno_turma WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurmaId($value){
		$sql = 'SELECT * FROM aluno_turma WHERE turma_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOcorreAcadId($value){
		$sql = 'SELECT * FROM aluno_turma WHERE ocorre_acad_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataMatricula($value){
		$sql = 'SELECT * FROM aluno_turma WHERE data_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM aluno_turma WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNota1($value){
		$sql = 'SELECT * FROM aluno_turma WHERE nota1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNota2($value){
		$sql = 'SELECT * FROM aluno_turma WHERE nota2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNota3($value){
		$sql = 'SELECT * FROM aluno_turma WHERE nota3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNota4($value){
		$sql = 'SELECT * FROM aluno_turma WHERE nota4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNota5($value){
		$sql = 'SELECT * FROM aluno_turma WHERE nota5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMediaProva($value){
		$sql = 'SELECT * FROM aluno_turma WHERE media_prova = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMedia($value){
		$sql = 'SELECT * FROM aluno_turma WHERE media = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFinal($value){
		$sql = 'SELECT * FROM aluno_turma WHERE final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByExameDesempenho($value){
		$sql = 'SELECT * FROM aluno_turma WHERE exame_desempenho = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM aluno_turma WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurmaId($value){
		$sql = 'DELETE FROM aluno_turma WHERE turma_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOcorreAcadId($value){
		$sql = 'DELETE FROM aluno_turma WHERE ocorre_acad_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataMatricula($value){
		$sql = 'DELETE FROM aluno_turma WHERE data_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM aluno_turma WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNota1($value){
		$sql = 'DELETE FROM aluno_turma WHERE nota1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNota2($value){
		$sql = 'DELETE FROM aluno_turma WHERE nota2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNota3($value){
		$sql = 'DELETE FROM aluno_turma WHERE nota3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNota4($value){
		$sql = 'DELETE FROM aluno_turma WHERE nota4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNota5($value){
		$sql = 'DELETE FROM aluno_turma WHERE nota5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMediaProva($value){
		$sql = 'DELETE FROM aluno_turma WHERE media_prova = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMedia($value){
		$sql = 'DELETE FROM aluno_turma WHERE media = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFinal($value){
		$sql = 'DELETE FROM aluno_turma WHERE final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByExameDesempenho($value){
		$sql = 'DELETE FROM aluno_turma WHERE exame_desempenho = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return AlunoTurma 
	 */
	protected function readRow($row){
		$alunoTurma = new AlunoTurma();
		
		$alunoTurma->id = $row['id'];
		$alunoTurma->alunoId = $row['aluno_id'];
		$alunoTurma->turmaId = $row['turma_id'];
		$alunoTurma->ocorreAcadId = $row['ocorre_acad_id'];
		$alunoTurma->dataMatricula = $row['data_matricula'];
		$alunoTurma->numero = $row['numero'];
		$alunoTurma->nota1 = $row['nota1'];
		$alunoTurma->nota2 = $row['nota2'];
		$alunoTurma->nota3 = $row['nota3'];
		$alunoTurma->nota4 = $row['nota4'];
		$alunoTurma->nota5 = $row['nota5'];
		$alunoTurma->mediaProva = $row['media_prova'];
		$alunoTurma->media = $row['media'];
		$alunoTurma->final = $row['final'];
		$alunoTurma->exameDesempenho = $row['exame_desempenho'];

		return $alunoTurma;
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
	 * @return AlunoTurma 
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