<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:17
 */
class Question extends Db
{
    private $qid;
    private $uid;
    private $question;
    private $q_description;
    private $q_time;
    private $answer_num;


    /**
     * Question constructor.
     * @param $qid
     * @param $uid
     * @param $question
     * @param $q_description
     * @param $q_time
     * @param $answer_num
     */
    public function __construct($qid, $uid, $question, $q_description, $q_time, $answer_num)
    {
        $this->qid = $qid;
        $this->uid = $uid;
        $this->question = $question;
        $this->q_description = $q_description;
        $this->q_time = $q_time;
        $this->answer_num = $answer_num;

    }


    /**
     * 新增问题
     * @param $uid
     * @param $question
     * @param string $q_description
     * @param $q_time
     * @param int $answer_num
     */
    public function add($uid, $question, $q_description="", $q_time, $answer_num=0)
    {



    }


    /**
     * 删除问题
     * @param $qid
     */
    public function delete($qid)
    {

    }


    /**
     * 修改问题 TODO 暂定功能
     * @param $qid
     * @param $uid
     * @param $question
     * @param $q_description
     * @param $q_time
     * @param $answer_num
     */
    public function modify($qid, $uid, $question, $q_description, $q_time, $answer_num)
    {


    }


    /**
     * 通过id查找问题
     * @param $qid
     */
    public function getQuestionById($qid)
    {

    }


    /**
     * 通过内容查找问题 TODO 暂定功能
     * @param $question
     */
    public function getQuestionByTitle($question)
    {


    }


    /**
     * 通过用户id查找问题
     * @param $uid
     */
    public function getQuestionByUid($uid)
    {

    }



}