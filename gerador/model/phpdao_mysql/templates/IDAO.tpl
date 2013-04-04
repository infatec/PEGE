<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: ${date}
 */
interface ${dao_clazz_name}I{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ${dao_clazz_name} 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ${dao_clazz_name}      
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
 	 * @param ${var_name} primary key
 	 */
	public function delete($${pk});
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ${dao_clazz_name} ${var_name}
 	 */
	public function insert($${var_name});
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ${dao_clazz_name} ${var_name}
 	 */
	public function update($${var_name});	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

${queryByFieldFunctions}
${deleteByFieldFunctions}
}
?>