<?php
class userBase {
	protected $userId;
	protected $userEmail;
	protected $userName;
	protected $userAvatar;
	protected $userOnline;
		
	function __get($type) {
		return $this->$type;
	}
		
	function __set($type, $value) {
		switch($type) {
			case "userId" :
				$this->userId = $value;
				break;
			case "userEmail" :
				$this->userEmail = $value;
				break;
			case "userName" :
				$this->userName = $value;
				break;
			case "userAvatar" :
				$this->userAvatar = $value;
				break;
			case "userOnline" :
				$this->userOnline = $value;
		}
	}
}
?>