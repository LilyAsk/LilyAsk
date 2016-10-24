<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:18
 */

require_once (dirname(__FILE__).'/class.Db.php');
require_once (dirname(__FILE__).'/ConstConservation.php');

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
        $q = "INSERT INTO ". ANSWER_INFO . " (uid, qid, answer, a_time, agree_num, oppose_num, comment_num) VALUES ($uid, '$qid', '$answer', '$a_time', $agree_num, $oppose_num, $comment_num)";

        $result = $this->dbc->query($q);

        $this->addAnswerNum($qid);

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
        $q = "DELETE FROM " . ANSWER_INFO . " WHERE aid=$aid";

        $result = $this->dbc->query($q);

        if($this->isExist($aid)){
            if ($result != 0){
                echo 'Delete answer succeeded.<br/>';
            }else{
                echo 'Delete answer failed.<br/>';
            }
        }else{
            echo 'No answer is found.';
        }


    }


    /**
     * 修改回答 TODO 暂定功能
     * @param $aid
     * @param $answer
     */
    public function modify($aid, $answer)
    {
        $q = "UPDATE " . ANSWER_INFO . " SET answer='$answer'                   
              WHERE aid=$aid";

        if($this->isExist($aid)){
            $result = $this->dbc->query($q);

            if ($result != 0){
                echo 'Modify question succeeded.<br/>';
            }else{
                echo 'Modify question failed.<br/>';
            }

        }else{
            echo 'No answer is found.';
        }



    }


    /**
     * 通过回答id查找答案
     * @param $aid
     * @return array|null
     */
    public function getAnswerById($aid)
    {
        $q = "SELECT * FROM " . ANSWER_INFO . " WHERE aid=$aid";

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
        $q = "SELECT * FROM " . ANSWER_INFO . " WHERE qid=$qid";

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
        $q = "SELECT * FROM " . ANSWER_INFO . " WHERE uid=$uid";

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


    /**
     * 增加相应问题的回答数
     * @param $qid
     */
    private function addAnswerNum($qid)
    {

        $q1 = "SELECT answer_num FROM " . QUESTION_INFO . " WHERE qid = $qid";

        $result = $this->dbc->query($q1);
        // 将获取的用户信息保存在一个一维数组内
        $row = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "getQuestion_AnswerNumById: 0 results";
        }

//        echo "row " . $row['answer_num'];

        $newAnswerNum = $row['answer_num'] + 1;

//        echo "newAnswerNum " . $newAnswerNum . ' <br />';

        $q2 = "UPDATE " . QUESTION_INFO . " SET answer_num = $newAnswerNum                 
              WHERE qid=$qid";

        $result2 = $this->dbc->query($q2);

        if ($result2 != 0){
            echo 'Add answer num succeeded.<br/>';
        }else{
            echo 'Add answer num failed.<br/>';
        }
    }



    /**
     * 判断回答是否存在
     * @param $aid
     * @return bool
     */
    public function isExist($aid)
    {
        $q = "SELECT * FROM " . QUESTION_INFO . " WHERE aid=$aid";
        $result = $this->dbc->query($q);

        if(mysqli_num_rows($result) > 0){
            return true;
        }else{
            return false;
        }

    }


}

$an = new Answer();
$an->add(123, 1,'yes', date("Y-m-d"));
