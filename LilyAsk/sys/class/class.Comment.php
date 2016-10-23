<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:18
 */

require_once (dirname(__FILE__).'/class.Db.php');

class Comment extends Db
{
//    private $cid;
//    private $uid;
//    private $aid;
//    private $comment;
//    private $c_time;
//    private $agree_num;
//    private $oppose_num;

    const COMMENT_INFO = 'comment_info';


    /**
     * Comment constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }


    /**
     * 增加评论
     * @param $cid
     * @param $uid
     * @param $aid
     * @param $comment
     * @param $c_time
     * @param int $agree_num
     * @param int $oppose_num
     */
    public function add($cid, $uid, $aid, $comment, $c_time, $agree_num=0, $oppose_num=0)
    {
        $q = "INSERT INTO ". Comment::COMMENT_INFO . " (cid, uid, aid, comment, c_time, agree_num, oppose_num) VALUES ($cid, $uid, $aid, '$comment', '$c_time', $agree_num, $oppose_num)";

        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Comment succeeded.<br/>';
        }else{
            echo 'Comment failed<br/>';
        }
    }


    /**
     * 删除评论
     * @param $cid
     */
    public function delete($cid)
    {
        $q = "DELETE FROM " . Comment::COMMENT_INFO . " WHERE cid=$cid";

        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Delete comment succeeded.<br/>';
        }else{
            echo 'Delete comment failed.<br/>';
        }
    }


    /**
     * 通过id查找评论
     * @param $cid
     * @return array|null
     */
    public function getCommentById($cid){
        $q = "SELECT * FROM " . Comment::COMMENT_INFO . " WHERE cid=$cid";

        $result = $this->dbc->query($q);

        // 将获取的用户信息保存在一个一维数组内
        $row = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "getCommentById: 0 results";
        }

        return $row;
    }


    /**
     * 通过回答id查找评论
     * @param $aid
     * @return array
     */
    public function getCommentByAid($aid){
        $q = "SELECT * FROM " . Comment::COMMENT_INFO . " WHERE aid=$aid";

        $result = $this->dbc->query($q);

        // 将获取的答案信息保存在一个二维数组
        $resultSet = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $resultSet[] = $row;
            }
        }else {
            echo "getCommentByAid: 0 results";
        }

        return $resultSet;
    }



}