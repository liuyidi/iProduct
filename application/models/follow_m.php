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
        $this->db->insert('follows',$data);
        return ($this->db->affected_rows()>0)?true:false;
    }

    /*
     * 根据不同的两个用户ID,取消关注连接
     * @param uid1,uid2
     */
    public function un_follow($uid1,$uid2){
        $array = array('follower_id' => $uid1, 'followed_id' => $uid2);
        $this->db->delete('follows', $array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    /*
     * 查找两个用户之间的关系
     * uid1->uid2 true  uid1关注uid2
     */
    public function check_follow($uid1,$uid2){
        $array = array('follower_id' => $uid1,'followed_id' => $uid2);
        $value = $this->db->where($array)
                    ->from("follows")
                    ->get();
        if($value->result() == false){
            return false;
        }
        return true;
    }


    /*
     * 查找单个用户id关注的所有的用户
     * @param uid
     * @param 数量 num
     */
    public function get_followings_by_uid($uid,$num){
        return true;
    }

    /*
     * 查找单个用户id被关注的所有用户信息,即粉丝
     * @param uid
     * @param 数量 num
     */
    public function get_followers_by_uid($uid,$num){
        return true;
    }
}