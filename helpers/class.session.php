<?php

class Session {

	public static function hasUser() {
		return (empty($_SESSION["user"]) || !isset($_SESSION["user"]));
	}

	public static function clearUser() {
		unset($_SESSION["user"]);
		return true;
	}

	public static function setUser($user) {
		$_SESSION["user"] = array(
            "username" => $user->username,
            "role" => $user->role,
            "admin" => ($user->role == 1) ? true : false
        );

        return $_SESSION["user"];
	}

	public static function getUser() {
		return $_SESSION["user"];
	}

}