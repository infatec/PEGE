<?php

/**
 * DAOFactory
 * @author: frame arser
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AlunoDAO
	 */
	public static function getAlunoDAO(){
		return new AlunoExtDAO();
	}

	/**
	 * @return AnoDAO
	 */
	public static function getAnoDAO(){
		return new AnoExtDAO();
	}

	/**
	 * @return AnoEscolaDAO
	 */
	public static function getAnoEscolaDAO(){
		return new AnoEscolaExtDAO();
	}

	/**
	 * @return AnoLetivoDAO
	 */
	public static function getAnoLetivoDAO(){
		return new AnoLetivoExtDAO();
	}

	/**
	 * @return AulaDAO
	 */
	public static function getAulaDAO(){
		return new AulaExtDAO();
	}

	/**
	 * @return CargosEscolaDAO
	 */
	public static function getCargosEscolaDAO(){
		return new CargosEscolaExtDAO();
	}

	/**
	 * @return CargosMecDAO
	 */
	public static function getCargosMecDAO(){
		return new CargosMecExtDAO();
	}

	/**
	 * @return CarteiraEstudantilDAO
	 */
	public static function getCarteiraEstudantilDAO(){
		return new CarteiraEstudantilExtDAO();
	}

	/**
	 * @return CedDAO
	 */
	public static function getCedDAO(){
		return new CedExtDAO();
	}

	/**
	 * @return ChavesDAO
	 */
	public static function getChavesDAO(){
		return new ChavesExtDAO();
	}

	/**
	 * @return ConfiguracaoEscolaDAO
	 */
	public static function getConfiguracaoEscolaDAO(){
		return new ConfiguracaoEscolaExtDAO();
	}

	/**
	 * @return DisciplinasEscolaDAO
	 */
	public static function getDisciplinasEscolaDAO(){
		return new DisciplinasEscolaExtDAO();
	}

	/**
	 * @return DisciplinasMecDAO
	 */
	public static function getDisciplinasMecDAO(){
		return new DisciplinasMecExtDAO();
	}

	/**
	 * @return DistritosEscolaDAO
	 */
	public static function getDistritosEscolaDAO(){
		return new DistritosEscolaExtDAO();
	}

	/**
	 * @return DistritosMecDAO
	 */
	public static function getDistritosMecDAO(){
		return new DistritosMecExtDAO();
	}

	/**
	 * @return EscolaDAO
	 */
	public static function getEscolaDAO(){
		return new EscolaExtDAO();
	}

	/**
	 * @return FaltaAlunoDAO
	 */
	public static function getFaltaAlunoDAO(){
		return new FaltaAlunoExtDAO();
	}

	/**
	 * @return FuncoesEscolaDAO
	 */
	public static function getFuncoesEscolaDAO(){
		return new FuncoesEscolaExtDAO();
	}

	/**
	 * @return FuncoesMecDAO
	 */
	public static function getFuncoesMecDAO(){
		return new FuncoesMecExtDAO();
	}

	/**
	 * @return GrupoUsuarioMenusDAO
	 */
	public static function getGrupoUsuarioMenusDAO(){
		return new GrupoUsuarioMenusExtDAO();
	}

	/**
	 * @return GrupoUsuarioTabelasDAO
	 */
	public static function getGrupoUsuarioTabelasDAO(){
		return new GrupoUsuarioTabelasExtDAO();
	}

	/**
	 * @return GrupoUsuariosDAO
	 */
	public static function getGrupoUsuariosDAO(){
		return new GrupoUsuariosExtDAO();
	}

	/**
	 * @return HabilitacoesEscolaDAO
	 */
	public static function getHabilitacoesEscolaDAO(){
		return new HabilitacoesEscolaExtDAO();
	}

	/**
	 * @return HabilitacoesMecDAO
	 */
	public static function getHabilitacoesMecDAO(){
		return new HabilitacoesMecExtDAO();
	}

	/**
	 * @return HorarioDAO
	 */
	public static function getHorarioDAO(){
		return new HorarioExtDAO();
	}

	/**
	 * @return LogDAO
	 */
	public static function getLogDAO(){
		return new LogExtDAO();
	}

	/**
	 * @return LogacessoDAO
	 */
	public static function getLogacessoDAO(){
		return new LogacessoExtDAO();
	}

	/**
	 * @return LogadminDAO
	 */
	public static function getLogadminDAO(){
		return new LogadminExtDAO();
	}

	/**
	 * @return MatriculaDAO
	 */
	public static function getMatriculaDAO(){
		return new MatriculaExtDAO();
	}

	/**
	 * @return MenusDAO
	 */
	public static function getMenusDAO(){
		return new MenusExtDAO();
	}

	/**
	 * @return ModalidadeEnsinoEscolaDAO
	 */
	public static function getModalidadeEnsinoEscolaDAO(){
		return new ModalidadeEnsinoEscolaExtDAO();
	}

	/**
	 * @return ModalidadeEnsinoMecDAO
	 */
	public static function getModalidadeEnsinoMecDAO(){
		return new ModalidadeEnsinoMecExtDAO();
	}

	/**
	 * @return NivelEnsinoEscolaDAO
	 */
	public static function getNivelEnsinoEscolaDAO(){
		return new NivelEnsinoEscolaExtDAO();
	}

	/**
	 * @return NivelEnsinoMecDAO
	 */
	public static function getNivelEnsinoMecDAO(){
		return new NivelEnsinoMecExtDAO();
	}

	/**
	 * @return NotaDAO
	 */
	public static function getNotaDAO(){
		return new NotaExtDAO();
	}

	/**
	 * @return PortariaDAO
	 */
	public static function getPortariaDAO(){
		return new PortariaExtDAO();
	}

	/**
	 * @return SalaDAO
	 */
	public static function getSalaDAO(){
		return new SalaExtDAO();
	}

	/**
	 * @return ServidorDAO
	 */
	public static function getServidorDAO(){
		return new ServidorExtDAO();
	}

	/**
	 * @return ServidorCargoEscolaDAO
	 */
	public static function getServidorCargoEscolaDAO(){
		return new ServidorCargoEscolaExtDAO();
	}

	/**
	 * @return ServidorEscolaDAO
	 */
	public static function getServidorEscolaDAO(){
		return new ServidorEscolaExtDAO();
	}

	/**
	 * @return ServidorFuncaoEscolaDAO
	 */
	public static function getServidorFuncaoEscolaDAO(){
		return new ServidorFuncaoEscolaExtDAO();
	}

	/**
	 * @return TabelasDAO
	 */
	public static function getTabelasDAO(){
		return new TabelasExtDAO();
	}

	/**
	 * @return TiposBemEscolaDAO
	 */
	public static function getTiposBemEscolaDAO(){
		return new TiposBemEscolaExtDAO();
	}

	/**
	 * @return TiposBemMecDAO
	 */
	public static function getTiposBemMecDAO(){
		return new TiposBemMecExtDAO();
	}

	/**
	 * @return TiposDependenciaEscolaDAO
	 */
	public static function getTiposDependenciaEscolaDAO(){
		return new TiposDependenciaEscolaExtDAO();
	}

	/**
	 * @return TiposDependenciaMecDAO
	 */
	public static function getTiposDependenciaMecDAO(){
		return new TiposDependenciaMecExtDAO();
	}

	/**
	 * @return TiposDespesaEscolaDAO
	 */
	public static function getTiposDespesaEscolaDAO(){
		return new TiposDespesaEscolaExtDAO();
	}

	/**
	 * @return TiposDespesaMecDAO
	 */
	public static function getTiposDespesaMecDAO(){
		return new TiposDespesaMecExtDAO();
	}

	/**
	 * @return TiposEnsinoEscolaDAO
	 */
	public static function getTiposEnsinoEscolaDAO(){
		return new TiposEnsinoEscolaExtDAO();
	}

	/**
	 * @return TiposEnsinoMecDAO
	 */
	public static function getTiposEnsinoMecDAO(){
		return new TiposEnsinoMecExtDAO();
	}

	/**
	 * @return TiposFrequenciaEscolaDAO
	 */
	public static function getTiposFrequenciaEscolaDAO(){
		return new TiposFrequenciaEscolaExtDAO();
	}

	/**
	 * @return TiposFrequenciaMecDAO
	 */
	public static function getTiposFrequenciaMecDAO(){
		return new TiposFrequenciaMecExtDAO();
	}

	/**
	 * @return TiposMaterialEscolaDAO
	 */
	public static function getTiposMaterialEscolaDAO(){
		return new TiposMaterialEscolaExtDAO();
	}

	/**
	 * @return TiposMaterialMecDAO
	 */
	public static function getTiposMaterialMecDAO(){
		return new TiposMaterialMecExtDAO();
	}

	/**
	 * @return TurmaDAO
	 */
	public static function getTurmaDAO(){
		return new TurmaExtDAO();
	}

	/**
	 * @return TurmaDisciplinaDAO
	 */
	public static function getTurmaDisciplinaDAO(){
		return new TurmaDisciplinaExtDAO();
	}

	/**
	 * @return TurmaDisciplinaHorarioDAO
	 */
	public static function getTurmaDisciplinaHorarioDAO(){
		return new TurmaDisciplinaHorarioExtDAO();
	}

	/**
	 * @return TurnoDAO
	 */
	public static function getTurnoDAO(){
		return new TurnoExtDAO();
	}

	/**
	 * @return UsuariosDAO
	 */
	public static function getUsuariosDAO(){
		return new UsuariosExtDAO();
	}


}
?>