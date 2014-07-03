<?php
class Query {
	private $db_host = 'localhost';
	private $db_name = 'pdo_test';
	private $db_user = 'root';
	private $db_pass = 'iwimagica';
	private $pdo = NULL;

	public function __construct() {
		try {
			$dsn = 'mysql:dbname=' . $this -> db_name . ';host=' . $this -> db_host;
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

	############################
	# auth table
	############################

	public function checkPassword($login_id, $login_pw) {
		$isResult = false;

		$sql = 'SELECT `password` FROM `auth` WHERE `id` like :login_id';
		$stmt = $this -> pdo -> prepare($sql);
		$bool = $stmt -> execute(array(':login_id' => $login_id));
		echo ".";
		while($r = $stmt->fetchObject()){
			var_dump($r);
			if ($login_pw === $r->login_pw) {//パスワード確認
				$isResult = true;
				break;
			}
		}
		$stmt->closeCursor();
		return $isResult;
	}

	public function getUsers($login_id) {
		$link = classDb::connect();
		$sql = sprintf("SELECT `id`, `password` FROM `auth` WHERE `login_id`='%s';", mysql_real_escape_string($login_id));
		$sql = Util::deleteCRLF($sql);
		$result = mysql_query($sql, $link);
		$arrayUser = array();
		while ($row = mysql_fetch_object($result)) {
			$user = array();
			$user['id'] = $row['iw'];
			$user['password'] = $row['password'];
			$arrayUser[] = $user;
		}
		classDb::close($link);
		return $arrayUser;
	}

}

echo "test";
$q = new Query();
$a = $q -> checkPassword("test", "hozo");;
var_dump($a);
unset($q);
?>
