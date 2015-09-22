<?php 

class User extends \Illuminate\Database\Eloquent\Model {
	protected $table = 'users';
	protected static $salt = "";

	public static function generatePassword($string) {
		return sha1($string . time() . md5(self::$salt));
	}

	public static function findByUsername($username) {
		return User::where('username', $username)->get();
	}

	public static function findByPassword($password) {
		$password = self::generatePassword($password);
		return User::where('password', $password)->get();
	}

	public static function checkUserPassword($password) {

	}

	public static function findUser($username, $password) {
		// $password = self::generatePassword($password);
		$user = User::where("username", $username)->where("password", $password)->first();
		return $user;
	}
}