<?php

class Database {
	private static $conexao;

	private static function conectar () {
		try {
			$config = [
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHARSET,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
				PDO::ATTR_CASE => PDO::CASE_NATURAL,
			];

			self::$conexao = new PDO('mysql:host=' . DB_SERVER . '; dbname=' . DB_DATABASE . '; charset=' . DB_CHARSET, DB_USER, DB_PASSWORD, $config);
			self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			self::desconectar();
            die($e->getTraceAsString());
		}
	}

	private static function desconectar () {
		self::$conexao = null;
	}

	public static function EXECUTE_NON_QUERY (string $sql, array $parametros = []) : bool {
		self::conectar();

		if (!is_null(self::$conexao)):
			self::$conexao->beginTransaction();

			try {
				$comando = self::$conexao->prepare($sql);

				if (is_array($parametros) && !empty($parametros)) $comando->execute($parametros);
				else $comando->execute();

				self::$conexao->commit();
				self::desconectar();

				return true;
			} catch(PDOException $e) {
				self::$conexao->rollBack();
				self::desconectar();

				return false;
			}
		endif;

		self::desconectar();
		return false;
	}

	public static function EXECUTE_QUERY (string $sql, array $parametros = []) : array {
		self::conectar();

		if (!is_null(self::$conexao)):

			try {
				$comando = self::$conexao->prepare($sql);

				if (is_array($parametros) && !empty($parametros)) $comando->execute($parametros);
				else $comando->execute();

				self::desconectar();

				return $comando->fetchAll();
			} catch(PDOException $e) {
				self::desconectar();

				return [];
			}
		endif;

		self::desconectar();
		return [];
	}
}
