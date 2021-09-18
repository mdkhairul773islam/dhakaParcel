<?php 
/**
* class controller
*/
class Settings extends Admin_controller{
	function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('action');
    }
	
	public function index($id=null){
        $this->data['meta_title'] = 'Theme Settings';
        $this->data['active'] = 'data-target="theme_settings"';
        $this->data['subMenu'] = 'data-target="img_and_text"';
        $this->data['confirmation'] = null;


		$this->data["settings_info"]    = read('settings', array('id'=>1));
		$settings_info                  = $this->data["settings_info"];

		
		if (isset($_POST['save'])) {
			$data = [];

			//image size and path setup
			$types = array('jpg','JPG','png','PNG','gif','GIF');

			//chacking banner update or not if update execute this statement
			if(!empty($_FILES['banner']['tmp_name'])){
				$path  = "backend/images/settings/";
				//banner upload processing
				$name  = 'banner_'.(strtotime(date('Y-m-d h:i:s'))*10);
				if(empty($banner_path = upload_img('banner',$types,"1000",$path,$name))){
					set_msg('warning', 'Warning', 'Banner Not Uploaded');
					redirect('settings/settings/');
				}else{
					//delete old image
					if(is_file("./".$this->input->post('old_banner'))){
						unlink("./".$this->input->post('old_banner'));
					}
					$data['banner_path'] = $banner_path;
				}
			}


			//chacking header_logo update or not if update execute this statement
			if(!empty($_FILES['header_logo']['tmp_name'])){
				$path  = "backend/images/settings/";
				//header_logo upload processing
				$name  = 'header_logo_'.(strtotime(date('Y-m-d h:i:s'))*10);
				if(empty($header_logo_path = upload_img('header_logo',$types,"1000",$path,$name))){
					set_msg('warning', 'Warning', 'Header Logo Not Uploaded');
					redirect('settings/settings/');
				}else{
					//delete old image
					if(is_file("./".$this->input->post('old_header_logo'))){
						unlink("./".$this->input->post('old_header_logo'));
					}
					$data['header_logo_path'] = $header_logo_path;
				}
			}


			//chacking footer_logo update or not if update execute this statement
			if(!empty($_FILES['footer_logo']['tmp_name'])){
				$path  = "backend/images/settings/";
				//footer_logo upload processing
				$name  = 'footer_logo_'.(strtotime(date('Y-m-d h:i:s'))*10);
				if(empty($footer_logo_path = upload_img('footer_logo',$types,"1000",$path,$name))){
					set_msg('warning', 'Warning', 'Footer Logo Not Uploaded');
					redirect('settings/settings/');
				}else{
					//delete old image
					if(is_file("./".$this->input->post('old_footer_logo'))){
						unlink("./".$this->input->post('old_footer_logo'));
					}
					$data['footer_logo_path'] = $footer_logo_path;
				}
			}


			//chacking favicon update or not if update execute this statement
			if(!empty($_FILES['favicon']['tmp_name'])){
				$path  = "backend/images/settings/";
				//favicon upload processing
				$name  = 'favicon_'.(strtotime(date('Y-m-d h:i:s'))*10);
				if(empty($favicon_path = upload_img('favicon',$types,"1000",$path,$name))){
					set_msg('warning', 'Warning', 'Favicon Not Uploaded');
					redirect('settings/settings/');
				}else{
					//delete old image
					if(is_file("./".$this->input->post('old_favicon'))){
						unlink("./".$this->input->post('old_favicon'));
					}
					$data['favicon'] = $favicon_path;
				}
			}


			//check old data if exist update table or insert into table
			if($settings_info != null){
				if(update('settings', $data, array('id' =>1 ))){
					set_msg('success', 'Success', 'Information Successfully Updated...');
				}else{
					set_msg('warning', 'Warning', 'Information Not Updated...');
				}
			}
			else{
				if(save('settings', $data)){
					set_msg('success', 'Success', 'Information Successfully Added...');
				}else{
					set_msg('warning', 'Warning', 'Information Not Added...');
				}
			}
			
			redirect('themesettings/settings');
		}

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/themesettings/nav', $this->data);
        $this->load->view('components/themesettings/images_and_text', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
	}
	
	public function site_information($id=null){
		$this->data["settings_info"]    = read('settings', array('id'=>1));
		$settings_info                  = $this->data["settings_info"];
		
		$data = array(
				'site_name'      => $this->input->post('site_name'),
				'header_text'    => $this->input->post('header_text'),
				'footer_text'    => $this->input->post('footer_text'),
				'currency'       => $this->input->post('currency'),
				'ref_commission' => $this->input->post('ref_commission')
			);

		//check old data if exist update table or insert into table
		if($settings_info != null){
			if(update('settings', $data, array('id' =>1 ))){
				set_msg('success', 'Success', 'Information Successfully Updated...','msg2');
			}else{
				set_msg('warning', 'Warning', 'Information Not Updated...','msg2');
			}
		}
		else{
			if(save('settings', $data)){
				set_msg('success', 'Success', 'Information Successfully Added...','msg2');
			}else{
				set_msg('warning', 'Warning', 'Information Not Added...','msg2');
			}
		}
		
		redirect('themesettings/settings');
	}

	
	public function address_and_contact(){
        $this->data['meta_title'] = 'Theme Settings';
        $this->data['active'] = 'data-target="theme_settings"';
        $this->data['subMenu'] = 'data-target="address_and_contact"';
        $this->data['confirmation'] = null;

		
		$this->data["settings_info"]   = read('settings', array('id'=>1));
		$settings_info                 = $this->data["settings_info"];

		
		if (isset($_POST['save'])) {
			$data = array(
					'address' => $this->input->post('address'),
					'phone'   => $this->input->post('phone'),
					'email'   => $this->input->post('email')
				);


			//check old data if exist update table or insert into table
			if($settings_info != null){
				if(update('settings', $data, array('id' =>1 ))){
					set_msg('success', 'Success', 'Information Successfully Updated...');
				}else{
					set_msg('warning', 'Warning', 'Information Not Updated...');
				}
			}
			else{
				if(save('settings', $data)){
					set_msg('success', 'Success', 'Information Successfully Added...');
				}else{
					set_msg('warning', 'Warning', 'Information Not Added...');
				}
			}
			
			redirect('themesettings/settings/address_and_contact');
		}


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/themesettings/nav', $this->data);
        $this->load->view('components/themesettings/address_and_contact', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
	}
	
	
	public function social_media(){
        $this->data['meta_title'] = 'Theme Settings';
        $this->data['active'] = 'data-target="theme_settings"';
        $this->data['subMenu'] = 'data-target="social_media"';
        $this->data['confirmation'] = null;
		
		$this->data["settings_info"]   = read('settings', array('id'=>1));
		$settings_info                 = $this->data["settings_info"];
		$social_info                   = $this->data["settings_info"][0]->social_media;

		
		if (isset($_POST['save'])) {
			$media_name  = $this->input->post('media_name');
			$media_link  = $this->input->post('media_link');
			$array_length = count($media_link);
			$i           = 0;

			//creat an asociative array like 'media_name'=>'media_link'
			$social_media_list = array();
			for($i; $i<$array_length; $i++){
				$social_media_list[$media_name[$i]] = $media_link[$i];
			}

			$data = array(
				'social_media' => json_encode($social_media_list)
			);
			
			//check old data if exist update table or insert into table
			if($settings_info != null){
				if(update('settings', $data, array('id' =>1 ))){
					set_msg('success', 'Success', 'Social Media Successfully Updated...');
				}else{
					set_msg('warning', 'Warning', 'Social Media Not Updated...');
				}
			}
			else{
				if(save('settings', $data)){
					set_msg('success', 'Success', 'Social Media Successfully Added...');
				}else{
					set_msg('warning', 'Warning', 'Social Media Not Added...');
				}
			}
			
			redirect('themesettings/settings/social_media');
		}



        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/themesettings/nav', $this->data);
        $this->load->view('components/themesettings/social_media', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
	}



	public function social_media_delete($media_name){
		$media_list = read('settings', array('id'=>1))[0]->social_media;
		$media_list = json_decode($media_list, true);

		foreach ($media_list as $key => $value) {
			if($key != $media_name){
				$social_media_list[$key] = $value;
			}
		}
		$social_media_list = json_encode($social_media_list);
		$data  = array('social_media'=>$social_media_list);
		$where = array('id'=>1);
		if(update('settings', $data, $where)){
			set_msg('success', 'Success', 'Social Media Removed Successfully.');
		}else{
			set_msg('warning', 'Warning', 'Social Media Not Removed.');
		}
		redirect('themesettings/settings/social_media');
	}
}