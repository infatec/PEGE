<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface AlunoTurmaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AlunoTurma 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AlunoTurma      
	 */
	public function queryAll($campos="*",$criterio="");
    
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio="");
	
    /**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Deleta registro da tabela
 	 * @param alunoTurma primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AlunoTurma alunoTurma
 	 */
	public function insert($alunoTurma);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AlunoTurma alunoTurma
 	 */
	public function update($alunoTurma);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByAlunoId($value);

	public function queryByTurmaId($value);

	public function queryByOcorreAcadId($value);

	public function queryByDataMatricula($value);

	public function queryByNumero($value);

	public function queryByNota1($value);

	public function queryByNota2($value);

	public function queryByNota3($value);

	public function queryByNota4($value);

	public function queryByNota5($value);

	public function queryByMediaProva($value);

	public function queryByMedia($value);

	public function queryByFinal($value);

	public function queryByExameDesempenho($value);


	public function deleteByAlunoId($value);

	public function deleteByTurmaId($value);

	public function deleteByOcorreAcadId($value);

	public function deleteByDataMatricula($value);

	public function deleteByNumero($value);

	public function deleteByNota1($value);

	public function deleteByNota2($value);

	public function deleteByNota3($value);

	public function deleteByNota4($value);

	public function deleteByNota5($value);

	public function deleteByMediaProva($value);

	public function deleteByMedia($value);

	public function deleteByFinal($value);

	public function deleteByExameDesempenho($value);


}
?>