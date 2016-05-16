<?php


include_once("Db.class.php");

class Comment {
    private $m_iCommentId;
    private $m_iFotoId;
    private $m_iUserId;
    private $m_sComment;

    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty){
            case "CommentId":
                $this->m_iCommentId = $p_vValue;
                break;
            case "FotoId":
                $this->m_iFotoId = $p_vValue;
                break;
            case "UserId":
                $this->m_iUserId = $p_vValue;
                break;
            case "Comment":
                $this->m_sComment = $p_vValue;
                break;
        }
    }
    public function __get($p_sProperty)
    {
        switch($p_sProperty){
            case "CommentId":
                return $this->m_iCommentId;
                break;
            case "FotoId":
                return $this->m_iFotoId;
                break;
            case "UserId":
                return $this->m_iUserId;
                break;
            case "Comment":
                return $this->m_sComment;
                break;
        }
        return $this;
    }

    public function saveComment() {
        $PDO = Db::getInstance();

        $stmt = $PDO->prepare("INSERT INTO comments(userId, fotoId, comment) VALUES (:userId, :fotoId, :commentaar)");
        $stmt->bindValue(":userId", $this->m_iUserId);
        $stmt->bindValue(":fotoId", $this->m_iFotoId);
        $stmt->bindValue(":commentaar", $this->m_sComment);
        if($stmt->execute()) {
            $this->m_iCommentId = $PDO->lastInsertId();
            return true;
        } else {
            throw new Exception('The comment can not be saved, sorry!');
        }
    }

    public function removeComment() {
        $PDO = Db::getInstance();

        $stmt = $PDO->prepare("DELETE FROM comments WHERE commentId = :commentId");
        $stmt->bindValue(':commentId', $this->m_iCommentId, PDO::PARAM_INT);
        if($stmt->execute()) {
            return true;
        } else {
            throw new Exception('Comment can not be romoved');
        }
    }

    public function showComments() {
        $PDO = Db::getInstance();

        $stmt = $PDO->prepare("SELECT c.commentId, c.comment, u.id, u.username FROM comments AS c JOIN users AS u ON(c.userId = u.id) WHERE fotoId = :fotoId");
        $stmt->bindValue(':fotoId', $this->m_iFotoId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
