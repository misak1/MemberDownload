<?php
class Query {
	private $db_type = 'mysql';
	private $db_host = 'localhost';
	private $db_name = 'pdo_test';
	private $db_user = 'root';
	private $db_pass = 'iwimagica';
	private $pdo = NULL;

	public function __construct() {
		try {
			if ($this -> db_type === 'mysql' || $this -> db_type === 'pgsql') {
				$dsn = $this -> db_type . ':dbname=' . $this -> db_name . ';host=' . $this -> db_host;
			} else {
				echo 'Unsupported $db_type ' . __LINE__;
			}
			$this -> pdo = new PDO($dsn, $this -> db_user, $this -> db_pass);
			$this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this -> pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch (PDOException $e) {
			print('Error:' . $e -> getMessage());
			die();
		}
	}

	public function __destruct() {
		$this -> pdo = NULL;
	}

	/*** table infomation ***/
	public function show_columns($table_name) {
		$sql = "SHOW COLUMNS FROM " . $table_name;
		$stmt = $this -> pdo -> prepare($sql);
		$bool = $stmt -> execute();
		$table_fields = $stmt -> fetchAll();
		return $table_fields;
	}

	public function get_column_names($table_name) {
		$column_names = array();
		$table_fields = $this -> show_columns($table_name);
		foreach ($table_fields as $ary) {
			$column_names[] = $ary['Field'];
		}
		return $column_names;
	}

	public function get_column_types($table_name) {
		$column_names = array();
		$table_fields = $this -> show_columns($table_name);
		foreach ($table_fields as $ary) {
			$column_names[$ary['Field']] = $ary['Type'];
		}
		return $column_names;
	}

	public function get_column_TypeAndLength($table_name) {
		$column_names = array();
		$table_fields = $this -> show_columns($table_name);
		foreach ($table_fields as $ary) {
			preg_match_all("/\((\d+)\)/", $ary['Type'], $matches, PREG_SET_ORDER);
			if (count($matches) == 0) {
				$column_names[$ary['Field']] = array('Type' => $ary['Type']);
			} else {
				$column_names[$ary['Field']] = array('Type' => str_replace($matches[0][0], "", $ary['Type']), 'Length' => $matches[0][1]);
			}

		}
		return $column_names;
	}

	/*** auth table ***/
	/**
	 * @param $login_id1 = 'email'; $login_id2 = 'id'; $login_pw = 'password';
	 */
	public function checkPassword($login_id1, $login_id2, $login_pw) {
		// メールアドレスと比較
		$sql = 'SELECT `password` FROM `auth` WHERE `user_id1` = :login_id1';
		$stmt = $this -> pdo -> prepare($sql);
		$bool = $stmt -> execute(array(':login_id1' => $login_id1));
		while ($r = $stmt -> fetchObject()) {
			//パスワード確認
			if ($login_pw === $r -> password) {
				$stmt -> closeCursor();
				return true;
			}
		}
		// IDと比較
		$sql = 'SELECT `password` FROM `auth` WHERE `user_id2` = :login_id2';
		$stmt = $this -> pdo -> prepare($sql);
		$bool = $stmt -> execute(array(':login_id2' => $login_id2));
		while ($r = $stmt -> fetchObject()) {
			//パスワード確認
			if ($login_pw === $r -> password) {
				$stmt -> closeCursor();
				return true;
			}
		}
		return false;
	}

	public function getUsers($login_id1, $login_id2) {
		$aryUuer = array();

		$sql = 'SELECT `user_id1`, `user_id2`, `password` FROM `auth` WHERE `user_id1` = :login_id1';
		$stmt = $this -> pdo -> prepare($sql);
		$bool = $stmt -> execute(array(':login_id1' => $login_id1));
		while ($r = $stmt -> fetchObject()) {
			$aryUuer[] = $r;
		}
		$stmt -> closeCursor();

		$sql = 'SELECT `user_id1`, `user_id2`, `password` FROM `auth` WHERE `user_id2` = :login_id2';
		$stmt = $this -> pdo -> prepare($sql);
		$bool = $stmt -> execute(array(':login_id2' => $login_id2));
		while ($r = $stmt -> fetchObject()) {
			$aryUuer[] = $r;
		}
		$stmt -> closeCursor();

		return $aryUuer;
	}

}

$q = new Query();
echo "<pre>";
//$a = $q -> checkPassword("a", "g", "hoge2");
//$a = $q -> getUsers("a", "g");
//var_dump($a[0] -> user_id2);
//$a = $q -> show_columns("auth");
//$a = $q -> get_column_names("auth");
//$a = $q -> get_column_types("auth");
$a = $q -> get_column_TypeAndLength("auth");


var_dump($a);
echo "</pre>";
unset($q);
?>
