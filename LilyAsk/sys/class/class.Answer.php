<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:18
 */

require_once (dirname(__FILE__).'/class.Db.php');

class Answer extends Db
{
//    private $aid;
//    private $uid;
//    private $qid;
//    private $answer;
//    private $a_time;
//    private $agree_num;
//    private $oppose_num;
//    private $comment_num;

    const ANSWER_INFO = 'answer_info';


    /**
     * Answer constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }


    /**
     * 增加回答
     * @param $uid
     * @param $qid
     * @param $answer
     * @param $a_time
     * @param $agree_num
     * @param $oppose_num
     * @param $comment_num
     */
    public function add($uid, $qid, $answer, $a_time, $agree_num=0, $oppose_num=0, $comment_num=0)
    {
        $q = "INSERT INTO ". Answer::ANSWER_INFO . " (uid, qid, answer, a_time, agree_num, oppose_num, comment_num) VALUES ($uid, '$qid', '$answer', '$a_time', $agree_num, $oppose_num, $comment_num)";

        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Answer succeeded.<br/>';
        }else{
            echo 'Answer failed<br/>';
        }

    }


    /**
     * 删除回答 TODO 预备功能
     * @param $aid
     */
    public function delete($aid){
        $q = "DELETE FROM " . Answer::ANSWER_INFO . " WHERE aid=$aid";

        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Delete answer succeeded.<br/>';
        }else{
            echo 'Delete answer failed.<br/>';
        }
    }


    /**
     * 修改回答 TODO 暂定功能
     * @param $aid
     * @param $answer
     */
    public function modify($aid, $answer)
    {
        $q = "UPDATE " . Answer::ANSWER_INFO . " SET answer='$answer'                   
              WHERE aid=$aid";

        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Modify question succeeded.<br/>';
        }else{
            echo 'Modify question failed.<br/>';
        }

    }


    /**
     * 通过回答id查找答案
     * @param $aid
     * @return array|null
     */
    public function getAnswerById($aid)
    {
        $q = "SELECT * FROM " . Answer::ANSWER_INFO . " WHERE aid=$aid";

        $result = $this->dbc->query($q);

        // 将获取的用户信息保存在一个一维数组内
        $row = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "getAnswerById: 0 results";
        }

        return $row;
    }


    /**
     * 通过问题id查找答案
     * @param $qid
     * @return array
     */
    public function getAnswerByQid($qid)
    {
        $q = "SELECT * FROM " . Answer::ANSWER_INFO . " WHERE qid=$qid";

        $result = $this->dbc->query($q);

        // 将获取的答案信息保存在一个二维数组
        $resultSet = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $resultSet[] = $row;
            }
        }else {
            echo "getAnswerByQid: 0 results";
        }

        return $resultSet;

    }


    /**
     * 通过用户id查找答案
     * @param $uid
     * @return array
     */
    public function getAnswerByUid($uid)
    {
        $q = "SELECT * FROM " . Answer::ANSWER_INFO . " WHERE uid=$uid";

        $result = $this->dbc->query($q);

        // 将获取的答案信息保存在一个二维数组
        $resultSet = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $resultSet[] = $row;
            }
        }else {
            echo "getAnswerByUid: 0 results";
        }

        return $resultSet;
    }

    /**
     * 通过回答ID获取评论数量
     * @param $aid
     * @return int
     */
    public function getCommentNum($aid)
    {
        $q = "SELECT * FROM " . Comment::COMMENT_INFO . " WHERE aid=$aid";
        $result = $this->dbc->query($q);
        return mysqli_num_rows($result);

    }





}