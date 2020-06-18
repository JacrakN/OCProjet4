<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class UserManager extends Manager {
    public function register($pseudo, $password) {
        $db = $this->dbConnect();
        $users = $db->prepare('INSERT INTO user(pseudo, password, createdAt, role_id) VALUES(?, ?, NOW(), ?)');
        $dataUser = $users->execute(array($pseudo, $password, 2));
    }

    public function getPass($pseudo) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT user.id, user.role_id, user.password, role.name FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $result = $req->fetch();

        return $result;
    }
}