<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/25/2018
 * Time: 10:49 PM
 */
class FoodModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}
	public function getSocialBar(){
		//$query = "select * from social_bar";
		$res = $this->db->get('social_bar');
		return $res->result();
	}
	public function getCategory($id=0){
		$this->db->where('categoryid',$id);
		$res = $this->db->get('articles');
		return $res->result();
	}
	public function getAllCategory(){
		$res = $this->db->get('articles');
		return $res->result();
	}
	public function getPostInCat($id = 1){
		$this->db->where('parent_id',$id);
		$q = $this->db->get('posts');
		return $q->result();
	}
	public function getPostFav(){
		$this->db->order_by("time_write","desc");
		$this->db->limit(4);
		$q = $this->db->get('posts');
		return $q->result();

	}
	public function getPostId($id){
		$this->db->where('id',$id);
		$q = $this->db->get('posts');
		return $q->result();
	}
	public function getNav($pid=0){
		$this->db->where("parent_id",$pid);
		$query = $this->db->get('category_admin');
		return $query->result();
	}
	public function content(){
		;
	}
	public function createPage($data){
		print_r($data);
		$this->db->insert("pages",$data);
	}
	public function getPages(){
		$q = $this->db->get("pages");
		return $q->result();
	} 
	public function getPagesCurrent(){
		$this->db->where("status",1);
		$q = $this->db->get("pages");
		return $q->result();
	} 
	public function getPageId($id){
		$this->db->where("id",$id);
		$q = $this->db->get("pages");
		return $q->result();
	} 
	public function getPageCat($id){
		$this->db->where("parent_id",$id);
		$q = $this->db->get("pages");
		return $q->result();
	} 
	public function editPage($data,$id){
		$this->db->where("id",$id);
		$this->db->update("pages",$data);
	}
	public function delPage($id){
		$this->db->where("id",$id);
		$this->db->delete("pages");
	}
	public function getDataPosts($st = -1 ,$l = 0, $col = -1 , $dir = "acs"){
		if($st != -1)
			$this->db->limit($l,$st);
		if($col != -1)
			$this->db->order_by($col, $dir);
		$q = $this->db->get("posts");
		return $q;
	}
	public function getNumPost(){
		$q = $this->db->get("posts");
		return $q->num_rows();

	}
	public function createPost($data){
		$this->db->insert("posts",$data);
	}
	public function delPost($id){
		$this->db->where("id",$id);
		$this->db->delete("posts");
	}
	public function editPost($data,$id){
		$this->db->where("id",$id);
		$this->db->update("posts",$data);
	}
	public function getPost($id){
		$this->db->where("id",$id);
		$q = $this->db->get("posts");
		return $q->result();
	}
	public function getAccId($id){
		$this->db->where("id",$id);
		$query = $this->db->get("accounts");
		return $query->result();
	}
	public function getIdAccount($username){
		$this->db->where("username",$username);
		$query = $this->db->get("accounts");
		return $query->result();
	}
	public function getAccUsername($un){
		$this->db->where("username",$un);
		$query = $this->db->get("accounts");
		return $query->result();
	} 
	public function getAccs(){
	//	$this->db->where("role",2)
		$query = $this->db->get("accounts");
		return $query->result();
	}
	public function editAcc($data,$id){
		$this->db->where("id",$id);
		$this->db->update("accounts",$data);
	}
	
	public function createAcc($data){
		$this->db->insert("accounts",$data);
	}

	public function delAcc($id){
		$this->db->where("id",$id);
		$this->db->delete("accounts");
	}
	public function getAcc($id){
		$this->db->where("id",$id);
		$q = $this->db->get("accounts");
		return $q->result();
	}
	public function isLogin($us,$pw){
		$con = array(
			"username"=>$us,
			"password"=>$pw
		);
		$this->db->where($con);
		$re = $this->db->get("accounts");
		if($re->num_rows() > 0) return true;
		else return false;
	}
	public function getAllBanner(){
		$q = $this->db->get("banner");
		return $q->result(); 
	}
	public function createBanner($data){
		$this->db->insert("banner",$data);
	}
	public function editBanner($data,$id){
		$this->db->where("id",$id);
		$this->db->update("banner",$data);
	}
	public function delBanner($id){
		$this->db->where("id",$id);
		$this->db->delete("banner");

	}
	public function getBannerId($id){
		$this->db->where("id",$id);
		$q = $this->db->get("banner");
		return $q->result();
	}
	public function getBannerCurrent(){
		$this->db->where("status",1);
		$this->db->order_by("Created_date","acs");
		$q = $this->db->get("banner");
		$re = $q->result();
		return $re[0];

	}
}
?>
