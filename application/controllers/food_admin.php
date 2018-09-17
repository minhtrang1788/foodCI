<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/30/2018
 * Time: 12:03 AM
 */
class food_admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('foodModel');
		$this->load->library('session','upload');
		$this->load->library('form_validation');
	}
	public function image_handler($source_image,$destination,$tn_w = 1350,$tn_h = 900,$quality = 100,$wmsource = false) {
		// The getimagesize functions provides an "imagetype" string contstant, which can be passed to the image_type_to_mime_type function for the corresponding mime type
		$info = getimagesize($source_image);
		$imgtype = image_type_to_mime_type($info[2]);
		// Then the mime type can be used to call the correct function to generate an image resource from the provided image
		switch ($imgtype) {
		case 'image/jpeg':
		  $source = imagecreatefromjpeg($source_image);
		  break;
		case 'image/gif':
		  $source = imagecreatefromgif($source_image);
		  break;
		case 'image/png':
		  $source = imagecreatefrompng($source_image);
		  break;
		default:
		  die('Invalid image type.');
		}
		// Now, we can determine the dimensions of the provided image, and calculate the width/height ratio
		$src_w = imagesx($source);
		$src_h = imagesy($source);
		$src_ratio = $src_w/$src_h;
		// Now we can use the power of math to determine whether the image needs to be cropped to fit the new dimensions, and if so then whether it should be cropped vertically or horizontally. We're just going to crop from the center to keep this simple.
		if ($tn_w/$tn_h > $src_ratio) {
		$new_h = $tn_w/$src_ratio;
		$new_w = $tn_w;
		} else {
		$new_w = $tn_h*$src_ratio;
		$new_h = $tn_h;
		}
		$x_mid = $new_w/2;
		$y_mid = $new_h/2;
		// Now actually apply the crop and resize!
		$newpic = imagecreatetruecolor(round($new_w), round($new_h));
		imagecopyresampled($newpic, $source, 0, 0, 0, 0, $new_w, $new_h, $src_w, $src_h);
		$final = imagecreatetruecolor($tn_w, $tn_h);
		imagecopyresampled($final, $newpic, 0, 0, ($x_mid-($tn_w/2)), ($y_mid-($tn_h/2)), $tn_w, $tn_h, $tn_w, $tn_h);
		// If a watermark source file is specified, get the information about the watermark as well. This is the same thing we did above for the source image.
		if($wmsource) {
		$info = getimagesize($wmsource);
		$imgtype = image_type_to_mime_type($info[2]);
		switch ($imgtype) {
		  case 'image/jpeg':
			$watermark = imagecreatefromjpeg($wmsource);
			break;
		  case 'image/gif':
			$watermark = imagecreatefromgif($wmsource);
			break;
		  case 'image/png':
			$watermark = imagecreatefrompng($wmsource);
			break;
		  default:
			die('Invalid watermark type.');
		}
		// Determine the size of the watermark, because we're going to specify the placement from the top left corner of the watermark image, so the width and height of the watermark matter.
		$wm_w = imagesx($watermark);
		$wm_h = imagesy($watermark);
		// Now, figure out the values to place the watermark in the bottom right hand corner. You could set one or both of the variables to "0" to watermark the opposite corners, or do your own math to put it somewhere else.
		$wm_x = $tn_w - $wm_w;
		$wm_y = $tn_h - $wm_h;
		// Copy the watermark onto the original image
		// The last 4 arguments just mean to copy the entire watermark
		imagecopy($final, $watermark, $wm_x, $wm_y, 0, 0, $tn_w, $tn_h);
		}
		// Ok, save the output as a jpeg, to the specified destination path at the desired quality.
		// You could use imagepng or imagegif here if you wanted to output those file types instead.
		if(Imagejpeg($final,$destination,$quality)) {
		return true;
		}
		// If something went wrong
		return false;
	  }
	public function template_admin($action="allposts",$id=0,$dataGet=null){
		
		if(!isset($_SESSION['username'])){
			 $this->login();
			 return;
		}
		
	//	$data['username'] = $_SESSION['username'];
		$data['model'] = $this->foodModel;
		$data['profile'] = $this->session->userdata('username');// $_SESSION['username'];
		$data['nav'] = $this->foodModel->getNav();
		$data['action'] = $action;
		$data['dataGet'] = $dataGet;
		$this->load->view('admin/header',$data);
		switch ($action) {
			
			case "allPages":
				$data['body'] = $this->foodModel->getPages();
				$this->load->view("admin/allPages",$data);
				break;
			case "createPage":
				$this->load->view("admin/createPage",$data);
				break;
			case "allPosts":
				$data['body'] = $this->foodModel->content();
				$this->load->view("admin/allPosts",$data);
				break;
			case "editPost":
				$data['body'] = $this->foodModel->getPost($id);
				$this->load->view("admin/editPost",$data);
				break;
			case "createPost":
				$data['body'] = $this->foodModel->content();
				$this->load->view("admin/createPost",$data);
				break;
			case "allBanners":
				$data['body'] = $this->foodModel->getAllBanner();
				$this->load->view("admin/allBanners",$data);
				break;
			case "createBanner":
				$data['body'] = $this->foodModel->content();
				$this->load->view("admin/createBanner",$data);
				break;
			case "editBanner":
				$data['body'] = $this->foodModel->getBannerId($id);
				$this->load->view("admin/editBanner",$data);
				break;
			case "allFB":
				$data['body'] = $this->foodModel->content();
				$this->load->view("admin/allFB",$data);
				break;
			case "createFB":
				$data['body'] = $this->foodModel->content();
				$this->load->view("admin/createFB",$data);
				break;
			case "allAccs":
				$data['body'] = $this->foodModel->getAccs();
				$this->load->view("admin/allAccs",$data);
				break;
			case "editAcc":
				$data['body'] = $this->foodModel->getAcc($id);
				$this->load->view("admin/editAcc",$data);
				break;
			case "createAcc":
				$this->load->view("admin/createAcc",$data);
				break;
			case "changeProfile":
				$data['body'] = $this->foodModel->content();
				$this->load->view("admin/changeProfile",$data);
				break;
			case "editPage":
				if($id!= -1)
					$data['body'] = $this->foodModel->getPageId($id);
				
				$this->load->view("admin/editPage",$data);
				break;
			default:
				$data['body'] = $this->foodModel->content();
				$this->load->view('admin/dashboard',$data);
				break;
		}
		$this->load->view('admin/footer');
	}
	public function index(){
		$this->load->view('admin/index');

	}
	public function all_pages(){
		$this->template_admin("allPages");
	}
	public function create_page(){
	/*	$data['model'] = $this->foodModel;
		$data['profile'] = $this->session->userdata('username');// $_SESSION['username'];
		$data['nav'] = $this->foodModel->getNav();
		$data['action'] = "createPage";
		$this->load->view('admin/header',$data);
		*/
		
		if(isset($_POST['create'])){
			$t = $_POST['title'];
			echo $_POST['content'];
			$ct = $_POST['content'];
			$st = $_POST['status'];
			if(isset($_POST['seo']))
				$seo = $_POST['seo'];
			else $seo="";
			if(isset($_POST['slug']))
				$slug = $_POST['slug'];
			else $slug="";
			if(isset($_POST['desc']))
				$desc = $_POST['desc'];
			else $desc="";
			echo '111111111';
			date_default_timezone_set('Asia/Karachi'); # add your city to set local time zone
			$now = date('Y-m-d H:i:s');
			$dataGet = array(
				"title_vn"=> $t,
				"content_vn" => $ct,
				"status" => $st,
				"seo"=>$seo,
				"slug"=>$slug,
				"description_vn"=>$desc,
				"created_date"=>$now,
			);
			$data['dataGet'] = $dataGet;
			$this->form_validation->set_rules('title', 'Title', 'required|is_unique[pages.title_vn]',
			array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        		)
			);
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			$this->form_validation->set_rules('desc', 'Description', 'required');
			$this->form_validation->set_rules('slug', 'Slug', 'required');
			if($this->form_validation->run() == FALSE){
				echo 'eror validation!';
				$this->template_admin("createPage",-1,$dataGet);
				//$this->load->view("admin/createPage",$data);
			}
			else {
				$this->foodModel->createPage($dataGet);
				$this->template_admin("allPages");
			}
		} else {
			$dataGet = array(
				"title_vn"=> "",
				"content_vn" => "",
				"status" =>1,
				"seo"=>"",
				"slug"=>"",
				"description_vn"=>"",
				"created_date"=>"",
			);
			$data['dataGet'] = $dataGet;
		$this->template_admin("createPage",-1,$dataGet);
		//	$this->load->view("admin/createPage",$data);
		}
	//	$this->load->view('admin/footer');
	}
	public function all_posts(){
		$this->template_admin("allPosts");
		//$data = Array();
		//$this->load->view("admin/allPosts",$data);
	}
	public function create_post(){
		
		if(isset($_POST['create'])){
			$t = $_POST['title'];
			$d = $_POST['desc'];
			$ct = htmlspecialchars($_POST['content']);
			$st = $_POST['status'];
			
			if(isset($_FILES['image_hash'])){
				if($_FILES["image_hash"]["name"]){
					
					move_uploaded_file($_FILES["image_hash"]["tmp_name"],"style/img/blog-img-rs/" . $_FILES["image_hash"]["name"]);
						$hinhanh=$_FILES["image_hash"]["name"];	
					}
				$img = $_FILES["image_hash"]["name"];
				$src_img = "style/img/blog-img-rs/" . $_FILES["image_hash"]["name"];
				$des_img = "style/img/blog-img/" . $_FILES["image_hash"]["name"];
				$this->image_handler($src_img,$des_img,1350,900,80,false);
				//$this->resizeImage($_FILES["image_hash"]["name"]);
				if (file_exists($src_img)) {
					unlink($src_img);
				  }
			}
			else $img="";
			if(isset($_POST['parent_cat']))
				$pc = $_POST['parent_cat'];
			else $pc="";
			date_default_timezone_set('Asia/Karachi'); # add your city to set local time zone
			$now = date('Y-m-d H:i:s');
			$data = array(
				"title"=> $t,
				"des"=> $d,
				"content" => $ct,
				"status" => $st,
				"time_write"=>$now,
				"image_hash"=>$img,
				"parent_id"=>$pc,
				"like"=>0,
			);
			
			$this->form_validation->set_rules('title','Title','required|is_unique[posts.title]');
			$this->form_validation->set_rules('content','Content','required');
			$this->form_validation->set_rules('desc','Desc','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('parent_cat','Parent_cat','required');
			if($this->form_validation->run()== FALSE){
				$this->template_admin("createPost",-1,$data);
			}else {
				$this->foodModel->createPost($data);
				$this->template_admin("allPosts");
			}
		} else
			$this->template_admin("createPost");
	}
	public function edit_post($id){
		if(isset($_POST['edit'])){
			$t = $_POST['title'];
			$d = $_POST['desc'];
			$ct = htmlspecialchars($_POST['content']);
			$st = $_POST['status'];
			print_r($_FILES);
			$img="";
			if(isset($_FILES['image_hash'])){
				if($_FILES["image_hash"]["name"]){
					move_uploaded_file($_FILES["image_hash"]["tmp_name"],"style/img/blog-img-rs/" . $_FILES["image_hash"]["name"]);
					$hinhanh=$_FILES["image_hash"]["name"];	
				
					$img = $_FILES["image_hash"]["name"];
					$src_img = "style/img/blog-img-rs/" . $_FILES["image_hash"]["name"];
					$des_img = "style/img/blog-img/" . $_FILES["image_hash"]["name"];
					$this->image_handler($src_img,$des_img,1350,900,80,false);
					//$this->resizeImage($_FILES["image_hash"]["name"]);
					if (file_exists($src_img)) 
						unlink($src_img);
						
				}
				
			}
			
			if(isset($_POST['parent_cat']))
				$pc = $_POST['parent_cat'];
			else $pc="";
			date_default_timezone_set('Asia/Karachi'); # add your city to set local time zone
			$now = date('Y-m-d H:i:s');
			$data = array(
				"title"=> $t,
				"des"=> $d,
				"content" => $ct,
				"status" => $st,
				"time_write"=>$now,
				"image_hash"=>$img,
				"parent_id"=>$pc,
				"like"=>0,
			);
			
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('content','Content','required');
			$this->form_validation->set_rules('desc','Desc','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('parent_cat','Parent_cat','required');
			if($this->form_validation->run()== FALSE){
				$this->template_admin("editPost",-1,$data);
			}else {
				$this->foodModel->editPost($data,$id);
				$this->template_admin("allPosts");
			}
		} else {
			$d = $this->foodModel->getPostId($id);
			$data = array(
				"title"=> $d[0]->title,
				"des"=> $d[0]->des,
				"content" => $d[0]->content,
				"status" => $d[0]->status,
				"time_write"=>$d[0]->time_write,
				"image_hash"=>$d[0]->image_hash,
				"parent_id"=>$d[0]->parent_id,
				"like"=>$d[0]->like,
			);
			$this->template_admin("editPost",-1,$data);
		}
			
	}
	public function all_fb(){
		$this->template_admin("allFB");
	}
	public function create_fb(){
		$this->template_admin("createFB");
	}
	public function all_banner(){
		$this->template_admin("allBanners");
	}
	public function create_bn(){
		if(isset($_POST['create'])){
			$t = $_POST['title'];
			$st = $_POST['status'];
			if(isset($_FILES['image'])){
				if($_FILES["image"]["name"]){
					
					move_uploaded_file($_FILES["image"]["tmp_name"],"style/img/banner-img/" . $_FILES["image"]["name"]);
						$hinhanh=$_FILES["image"]["name"];	
					}
				$img = $_FILES["image"]["name"];
			}
			else $img="";
			date_default_timezone_set('Asia/Karachi'); # add your city to set local time zone
			$now = date('Y-m-d H:i:s');
			$data = array(
				"title"=> $t,
				"status" => $st,
				"image"=>$img,
				"Created_date"=>$now,
				
			);
			$this->foodModel->createBanner($data);
			$this->template_admin("allBanners");
		}
		$this->template_admin("createBanner");
	}
	public function edit_banner($id){
		if(isset($_POST['edit'])){
			$t = $_POST['title'];
			$st = $_POST['status'];
			if(isset($_FILES['image'])){
				
				if($_FILES["image"]["name"]){
					
					move_uploaded_file($_FILES["image"]["tmp_name"],"style/img/banner-img/" . $_FILES["image"]["name"]);
						$hinhanh=$_FILES["image"]["name"];	
					}
				$img = $_FILES["image"]["name"];
			}
			else $img="";
			date_default_timezone_set('Asia/Karachi'); # add your city to set local time zone
			$now = date('Y-m-d H:i:s');
			$data = array(
				"title"=> $t,
				"status" => $st,
				"image"=>$img,
				"Created_date"=>$now,
				
			);
			$this->foodModel->editBanner($data,$id);
			$this->template_admin("allBanners",$id);
		} else
		$this->template_admin("editBanner",$id);
	}
	public function del_banner($id){
		$this->foodModel->delBanner($id);
		$this->template_admin("allBanners");

	}
	public function all_account(){
		$this->template_admin("allAccs");
	}
	public function change_profile(){
		$user = $this->foodModel->getIdAccount($_SESSION['username']);
		$id = $user[0]->id;
		$this->edit_Acc($id);
	}
	public function edit_page($id){
		if (isset($_POST['edit'])){
			$t = $_POST['title'];
			$ct = $_POST['content'];
			$st = $_POST['status'];
			if(isset($_POST['seo']))
				$seo = $_POST['seo'];
			else $seo="";
			if(isset($_POST['slug']))
				$slug = $_POST['slug'];
			else $slug="";
			if(isset($_POST['desc']))
				$desc = $_POST['desc'];
			else $desc="";
			date_default_timezone_set('Asia/Karachi'); # add your city to set local time zone
			$now = date('Y-m-d H:i:s');
			$dataGet = array(
				"title_vn"=> $t,
				"content_vn" => $ct,
				"status" => $st,
				"seo"=>$seo,
				"slug"=>$slug,
				"description_vn"=>$desc,
				"updated_date"=>$now,
			);
			$this->form_validation->set_rules('title', 'Title', 'required|is_unique[pages.title_vn]');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			$this->form_validation->set_rules('desc', 'Description', 'required');
			$this->form_validation->set_rules('slug', 'Slug', 'required');
			if($this->form_validation->run() == FALSE)
			{
				$this->template_admin("editPage",-1,$dataGet);	

			} else{
				$this->foodModel->editPage($dataGet,$id);
				$this->template_admin("allPages");
			}
		} else{
			
			$this->template_admin("editPage",$id);
		}
		
	}
	public function del_Page($id){
		$this->foodModel->delPage($id);
		$this->template_admin("allPages");

	}
	public function del_post($id){
		$this->foodModel->delPost($id);
		$this->template_admin("allPosts");
	}
	
	public function data_all_posts()
     {
		if(isset($_GET['draw'])){
          // Datatables Variables
          $draw = intval($_GET['draw']);
          $start = intval($_GET['start']);
		  $length = intval($_GET['length']);
		  $order = $_GET['order'];
		  $col = 0;
          $dir = "";
          if(!empty($order)) {
               foreach($order as $o) {
                    $col = $o['column'];
                    $dir= $o['dir'];
               }
          }
		  $posts = $this->foodModel->getDataPosts($start,$length,$col,$dir);
		} else  $posts = $this->foodModel->getDataPosts();
		
          $data = array();
		 
          foreach($posts->result() as $r) {
			$text = '<a href="'.base_url().'index.php/food_admin/edit_post/'.$r->id.'">Edit</a>||<a href="'.base_url().'index.php/food_admin/del_post/'.$r->id.'"  onClick="javascript:return confirmDel();">Delete</a>';	
			
               $data[] = array(
                    $r->title,
                    $r->des,
                    $r->status,
                    $r->like,
					$r->time_write,
					$text,
					//'<a href="'.base_url().'/index.php/food_admin/edit_page/'.$r->id.'>Edit</a>||<a href="'.base_url().'/index.php/food_admin/del_page/'.$r->id.'">Delete</a>';	
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $this->foodModel->getNumPost(),
                 "recordsFiltered" =>$this->foodModel->getNumPost(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
	 }
	 public function edit_Acc($id){
		if (isset($_POST['edit'])){
			$u = $_POST['username'];
			$pw = $_POST['password'];
			$st = $_POST['email'];
			$role = $_POST['role'];
			//if(isset($_POST['status']))
			//$status = $_POST['status'];
				$img = "";	
			if(isset($_FILES['image'])){
				if($_FILES["image"]["name"]){
					echo ('move image to style/img/blog-avt-rs/' . $_FILES["image"]["name"]);
					move_uploaded_file($_FILES["image"]["tmp_name"],"style/img/blog-avt-rs/" . $_FILES["image"]["name"]);
						$img = $_FILES["image"]["name"];
					
					
					$src_img = "style/img/blog-avt-rs/" . $_FILES["image"]["name"];
					$des_img = "style/img/blog-avt/" . $_FILES["image"]["name"];
					$this->image_handler($src_img,$des_img,220,220,50,false);
					//$this->resizeImage($_FILES["image_hash"]["name"]);
					if (file_exists($src_img)) {
						unlink($src_img);
					}
				}
			}
			$data = array(
				"username"=> $u,
				"password" => $pw,
				"email"=>$st,
				"role"=>$role,
				"image"=>$img,
			);
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[accounts.username]',
			array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
    	    	)
			);
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');
			$this->form_validation->set_rules('role', 'Role', 'required');
			if($this->form_validation->run() == FALSE)

				$this->template_admin("editAcc",-1,$data);
			else {
				
				$this->foodModel->editAcc($data,$id);
				$this->template_admin("allAccs");
			}
		} else {
			$user = $this->foodModel->getAccId($id);
			$data = array(
				"username"=> $user[0]->username,
				"password" =>  $user[0]->password,
				"email"=>$user[0]->email,
				"role"=>$user[0]->role,
				//"status"=>$user[0]->status,
				"image"=>$user[0]->image,
			);	
			$this->template_admin("editAcc",-1, $data);
		}
	}
	public function create_acc(){
		if (isset($_POST['create'])){
			$u = $_POST['username'];
			$pw = $_POST['password'];
			$st = $_POST['email'];
			$role = $_POST['role'];
			//if(isset($_POST['status']))
			//$status = $_POST['status'];
				$img = "";	
			if(($_FILES['image'])){
				if($_FILES["image"]["name"]){
					echo ('move image to style/img/blog-avt-rs/' . $_FILES["image"]["name"]);
					
					move_uploaded_file($_FILES["image"]["tmp_name"],"style/img/blog-avt-rs/" . $_FILES["image"]["name"]);
						$img = $_FILES["image"]["name"];
					
					
					$src_img = "style/img/blog-avt-rs/" . $_FILES["image"]["name"];
					$des_img = "style/img/blog-avt/" . $_FILES["image"]["name"];
					$this->image_handler($src_img,$des_img,220,220,50,false);
					//$this->resizeImage($_FILES["image_hash"]["name"]);
					if (file_exists($src_img)) {
						unlink($src_img);
					}
				}
			}
			$data = array(
				"username"=> $u,
				"password" => $pw,
				"email"=>$st,
				"role"=>$role,
				"image"=>$img,
			);
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[accounts.username]',
			array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
    	    	)
			);
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');
			$this->form_validation->set_rules('role', 'Role', 'required');
			if($this->form_validation->run() == FALSE)

				$this->template_admin("createAcc",-1,$data);
			else {
				
				$this->foodModel->createAcc($data);
				$this->template_admin("allAccs");
			}
		} else {
			
			$this->template_admin("createAcc");
		}
	}
	public function del_Acc($id){
		$this->foodModel->delAcc($id);
		$this->template_admin("allAccs");
	}
	 public function login(){
		$data['error'] = "";
		if(isset($_POST['login'])){
			$isOk = $this->foodModel->isLogin($_POST['username'],$_POST['password']);
			if($isOk){
				$this->session->set_userdata("username",$_POST['username']);
				 $this->template_admin("allPosts");
				}
			else {
				$data['error'] = "Your username and password are not matched with data!";
				$this->load->view("admin/login",$data);
			}
		} else
			$this->load->view("admin/login",$data);
	 }
	 public function logout(){
		 unset($_SESSION['username']);
		 $this->login();
	 }
	public function resizeImage($file_image){
	
	   //echo "to souce".base_url()."style/blog-img/" . $_FILES["image_hash"]["name"];
		$imageName                  = 'set_'.'style/img/blog-img/'.$file_image;
		print_r($imageName);
        $config['image_library']    = 'gd2';
        $config['source_image']     = $imageName;
        $config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']     = 75;
		$config['height']   = 50;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

	}
	

}
