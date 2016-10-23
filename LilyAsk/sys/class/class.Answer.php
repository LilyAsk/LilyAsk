<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:18
 */
class Answer extends Db
{
    private $aid;
    private $uid;
    private $qid;
    private $answer;
    private $a_time;
    private $agree_num;
    private $oppose_num;
    private $comment_num;

    /**
     * Answer constructor.
     * @param $aid
     * @param $uid
     * @param $qid
     * @param $answer
     * @param $a_time
     * @param $agree_num
     * @param $oppose_num
     * @param $comment_num
     */
    public function __construct($aid, $uid, $qid, $answer, $a_time, $agree_num, $oppose_num, $comment_num)
    {
        parent::__construct();
        $this->aid = $aid;
        $this->uid = $uid;
        $this->qid = $qid;
        $this->answer = $answer;
        $this->a_time = $a_time;
        $this->agree_num = $agree_num;
        $this->oppose_num = $oppose_num;
        $this->comment_num = $comment_num;
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
    public function add($uid, $qid, $answer, $a_time, $agree_num, $oppose_num, $comment_num)
    {


    }


    /**
     * 删除回答
     * @param $aid
     */
    public function delete($aid){

    }


    /**
     * 修改回答 TODO 暂定功能
     * @param $uid
     * @param $qid
     * @param $answer
     * @param $a_time
     * @param $agree_num
     * @param $oppose_num
     * @param $comment_num
     */
    public function modify($uid, $qid, $answer, $a_time, $agree_num, $oppose_num, $comment_num)
    {


    }


    /**
     * 通过回答id查找答案
     * @param $aid
     */
    public function getAnswerById($aid){

    }


    /**
     * 通过问题id查找答案
     * @param $qid
     */
    public function getAnswerByQid($qid){

    }


    /**
     * 通过用户id查找答案
     * @param $uid
     */
    public function getAnswerByUid($uid){

    }








}