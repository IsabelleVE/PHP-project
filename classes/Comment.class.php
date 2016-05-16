<?php


include_once("Db.class.php");

class Comment {
    private $m_iCommentId;
    private $m_iPostId;
    private $m_iUserId;
    private $m_sComment;

    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty){
            case "CommentId":
                $this->m_iCommentId = $p_vValue;
                break;
            case "PostId":
                $this->m_iPostId = $p_vValue;
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
            case "PostId":
                return $this->m_iPostId;
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
        $conn =  Db::getInstance();
        $stmt = $conn->prepare("select * from tblComment where postID= :postID");
        $stmt->bindValue(":postID",$this->m_iPostId);
        $stmt->execute();

        $stmt = $conn->prepare("INSERT INTO tblComment (
                            userID,
                            postID,
                            comment

                            )VALUES (:userId, :fotoId, :commentaar)");
        $stmt->bindValue(":userId", $this->m_iUserId);
        $stmt->bindValue(":fotoId", $this->m_iPostId);
        $stmt->bindValue(":commentaar", $this->m_sComment);
        $stmt->execute();
    }

   /* public function removeComment() {
        $PDO = Db::getInstance();

        $stmt = $PDO->prepare("DELETE FROM tblComment WHERE commentID = :commentId");
        $stmt->bindValue(':commentId', $this->m_iCommentId);
        if($stmt->execute()) {
            return true;
        } else {
            throw new Exception('Comment can not be romoved');
        }
    }*/

    public function showComments() {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from tblComment where commentID = :commentId");
        $statement->bindValue(':commentId', $this->m_iCommentId);
        $statement->execute();
        if( $statement->rowCount() > 0){
            $result = $statement->fetchAll();
            return $result;

        }
        else{
            return "No photo found";
        }
    }
}
