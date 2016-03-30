<?php
/*
 * follow 关注的 modal
 *
 */
class follow_m extends CI_Model{

    function __construction(){
        parent::__construct();
    }

    /*
     * 根据不同的两个用户ID,建立关注连接
     * @param uid1,uid2
     */
    function add_follow($uid1,$uid2){

    }

    /*
     * 根据不同的两个用户ID,取消关注连接
     * @param uid1,uid2
     */
    function un_follow($uid1,$uid2){

    }

    /*
     * 查找单个用户id关注的所有的用户
     * @param uid
     * @param 数量 num
     */
    function get_followings_by_uid($uid,$num){

    }

    /*
     * 查找单个用户id被关注的所有用户信息
     * @param uid
     * @param 数量 num
     */
    function get_followers_by_uid($uid,$num){

    }
}