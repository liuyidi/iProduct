<?php
/*
 * follow 关注的 modal
 *
 */
class Follow_m extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    /*
     * 根据不同的两个用户ID,建立关注连接
     * @param uid1(follower关注者),uid2(被关注者)
     */
    public function add_follow($data){
//        $this->db->set('follower_id',$data.);
//        $this->db->set('followed_id',$data.);
//        $this->db->set('add_time',$data.add_time);
        $this->db->insert('follows',$data);
        return ($this->db->affected_rows()>0)?true:false;
    }

    /*
     * 根据不同的两个用户ID,取消关注连接
     * @param uid1,uid2
     */
    public function un_follow($uid1,$uid2){

    }

    /*
     * 查找单个用户id关注的所有的用户
     * @param uid
     * @param 数量 num
     */
    public function get_followings_by_uid($uid,$num){

    }

    /*
     * 查找单个用户id被关注的所有用户信息
     * @param uid
     * @param 数量 num
     */
    public function get_followers_by_uid($uid,$num){

    }
}