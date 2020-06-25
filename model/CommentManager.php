<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager {
    public function getComments($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    public function postComment($postId, $pseudo, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $pseudo, $comment));

        return $affectedLines;
    }
    public function getComment($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($id));
        $comment = $req->fetch();

        return $comment;
    }
    public function updateComment($id, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET comment = ?, comment_date = NOW() WHERE id = ?');
        $newComment = $comments->execute(array($comment, $id));

        return $newComment;
    }
    public function reportComment($id) {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET report = report +1 WHERE id = ?');
        $reportedComment = $comments->execute(array($id));
    }
    public function deleteComment($id) {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deletedComment = $comments->execute(array($id));
    }
    public function getFlagComments() {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT author, comment, comment_date FROM comments WHERE report > 0');
        
        return $comments;
    }
}
