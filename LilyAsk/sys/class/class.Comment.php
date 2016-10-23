<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:18
 */
class Comment extends Db
{
    private $cid;
    private $uid;
    private $aid;
    private $comment;
    private $c_time;
    private $agree_num;
    private $oppose_num;

    /**
     * Comment constructor.
     * @param $cid
     * @param $uid
     * @param $aid
     * @param $comment
     * @param $c_time
     * @param $agree_num
     * @param $oppose_num
     */
    public function __construct($cid, $uid, $aid, $comment, $c_time, $agree_num, $oppose_num)
    {
        $this->cid = $cid;
        $this->uid = $uid;
        $this->aid = $aid;
        $this->comment = $comment;
        $this->c_time = $c_time;
        $this->agree_num = $agree_num;
        $this->oppose_num = $oppose_num;
    }


    /**
     * 增加评论
     * @param $uid
     * @param $aid
     * @param $comment
     * @param $c_time
     * @param int $agree_num
     * @param int $oppose_num
     */
    public function add($uid, $aid, $comment, $c_time, $agree_num=0, $oppose_num=0)
    {

    }

    /**
     * 删除评论
     * @param $cid
     */
    public function delete($cid){

    }


    /**
     * 通过id查找评论
     * @param $cid
     */
    public function getCommentById($cid){

    }


    /**
     * 通过回答id查找评论
     * @param $aid
     */
    public function getCommentByAid($aid){

    }




}