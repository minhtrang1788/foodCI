<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/25/2018
 * Time: 10:05 PM
 */
class Food extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('foodModel');
	}
	public function template($body="index",$param=""){
		
		if($param == "" && ($body == "viewpost" || $body == "page" || $body == "pageView" )){
			$this->load->view('index.html');
		} else {
			$data['social_bar'] = $this->foodModel->getSocialBar();
			$data['cat']= $this->foodModel->getCategory();
			$data['model'] = $this->foodModel;
			$data['msg'] = 0;
			$data['favPosts'] = $this->foodModel->getPostFav();
			$data['pages'] = $this->foodModel->getPagesCurrent();
			$data['banner'] = $this->foodModel->getBannerCurrent();
			$this->load->view('template/header',$data);
			$this->load->view('template/nav',$data);
			
			switch ($body){
				case "index":
					$data['listPosts'] = $this->foodModel->getPostInCat();
					$this->load->view('template/listPost',$data);
					break;
				case "viewpost":
					if($param)
						$data['body'] = $this->foodModel->getPostId($param);
					$this->load->view('template/body',$data);
					break;
				case "page":
					if($param)
						$data['listPosts'] = $this->foodModel->getPostInCat($param);
					$this->load->view('template/listPost',$data);
					break;
				case "about":
					$this->load->view('template/about',$data);
					break;
				case "contact":

					if(isset($_POST['submit'])){
						$data['msg'] = 1;
					}
					$this->load->view('template/contact', $data);
					break;
				case "pageView":
					$data['content'] = $this->foodModel->getPageId($param);
					$this->load->view('template/viewPage',$data);
					break;
					
			}
			$this->load->view('template/slidebar',$data);
			$this->load->view('template/footer',$data);
		}
	}
	public function index(){
		$this->template("index");
	}
	public function viewpost($id=""){

		$this->template("viewpost",$id);
	}
	public function page($id=""){

		if($id < 5)
			$this->template("page",$id);
		else if($id == 6)
			$this->template("about",$id);
		else if($id == 7)
			$this->template("contact",$id);
		else $this->template("page",$id);
	}
	public function pageView($id=""){
		$this->template("pageView",$id);
	}
}
