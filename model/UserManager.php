<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class UserManager extends Manager {
    public function register($pseudo, $password) {
        $db = $this->dbConnect();
        $this->checkUser($pseudo);
        $users = $db->prepare('INSERT INTO user(pseudo, password, createdAt) VALUES(?, ?, NOW())');
        $dataUser = $users->execute(array($pseudo, $password));
    }

}