<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:17
 */

require_once (dirname(__FILE__).'/class.Db.php');

class Question extends Db
{
//    private $qid;
//    private $uid;
//    private $question;
//    private $q_description;
//    private $q_time;
//    private $answer_num;

    const QUESTION_INFO = 'question_info';


    /**
     * Question constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 新增问题
     * @param $uid
     * @param $question
     * @param string $q_description
     * @param $q_time
     * @param int $answer_num
     */
    public function add($uid, $question, $q_time, $q_description="", $answer_num=0)
    {
        $q = "INSERT INTO ". Question::QUESTION_INFO . " (uid, question, q_description, q_time, answer_num) VALUES ($uid, '$question', '$q_description', '$q_time', $answer_num)";

        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Ask question succeeded.<br/>';
        }else{
            echo 'Ask question failed<br/>';
        }


    }


    /**
     * 删除问题 TODO 预备功能
     * @param $qid
     */
    public function delete($qid)
    {
        $q = "DELETE FROM " . Question::QUESTION_INFO . " WHERE qid=$qid";

        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Delete question succeeded.<br/>';
        }else{
            echo 'Delete question failed.<br/>';
        }


    }


    /**
     * 修改问题 TODO 暂定功能
     * @param $qid
     * @param $question
     * @param $q_description
     */
    public function modify($qid, $question, $q_description)
    {
        $q = "UPDATE " . Question::QUESTION_INFO . " SET question='$question', q_description='$q_description'                      
              WHERE qid=$qid";

        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Modify question succeeded.<br/>';
        }else{
            echo 'Modify question failed.<br/>';
        }

    }


    /**
     * 通过问题ID查找问题
     * @param $qid
     * @return array|null
     */
    public function getQuestionById($qid)
    {
        $q = "SELECT * FROM " . Question::QUESTION_INFO . " WHERE qid=$qid";

        $result = $this->dbc->query($q);

        // 将获取的用户信息保存在一个一维数组内
        $row = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "getQuestionById: 0 results";
        }

        return $row;
    }


    /**
     * 通过内容查找问题 TODO 暂定功能 待实现
     * @param $question
     */
    public function getQuestionByTitle($question)
    {

    }


    /**
     * 通过用户ID查找问题列表
     * @param $uid
     * @return array
     */
    public function getQuestionByUid($uid)
    {
        $q = "SELECT * FROM " . Question::QUESTION_INFO . " WHERE uid=$uid";

        $result = $this->dbc->query($q);

        // 将获取的问题信息保存在一个二维数组
        $resultSet = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $resultSet[] = $row;
            }
        }else {
            echo "getQuestionByUid: 0 results";
        }

        return $resultSet;

    }


    /**
     * 通过问题ID获取问题的回答数
     * @param $qid
     * @return int
     */
    public function getAnswerNum($qid)
    {
        $q = "SELECT * FROM " . Answer::ANSWER_INFO . " WHERE qid=$qid";
        $result = $this->dbc->query($q);
        return mysqli_num_rows($result);

    }




}