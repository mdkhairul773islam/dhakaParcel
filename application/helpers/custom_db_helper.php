<?php 

	/*this method for reading data from database*/
	function read($data=null, $Extra_cond=null, $Extra_order_by='id DESC', $Extra_limit=null, $Extra_offset=null){
		$ci =& get_instance();
		/*check data is array or not*/
		if(is_array($data)){
			$table 	   = isset($data['table']) ? $data['table'] : null;
			$cond  	   = isset($data['cond']) ? $data['cond'] : null;//['status'=>0,'id'=>15]
			$offset    = isset($data['offset']) ? $data['offset'] : null;
			$limit     = isset($data['limit']) ? $data['limit'] : null;
			$order_by  = isset($data['order_by']) ? $data['order_by'] : null;//'id ASC, name DESC'
			$group_by  = isset($data['group_by']) ? $data['group_by'] : null;//["title", "date"]
			$distinct  = isset($data['distinct']) ? $data['distinct'] : null;//["title", "date"]
			$select    = isset($data['select']) ? $data['select'] : '*';//'title, content, date'

			// read table
        			$ci->db->select($select);
					$ci->db->order_by($order_by);
					if($distinct!==null) $ci->db->distinct($distinct);
					if($group_by!==null) $ci->db->group_by($group_by);
			$result = $ci->db->get_where($table,$cond,$limit, $offset);
			/* EX:
			/*  $query = [
		    /*        'table'=>'tablename',
		    /*        'limit'=>4,
		    /*        'offset'=>0,
		    /*        'order_by'=>'id DESC',
		    /*        'group_by'=>['date'],
		    /*        'distinct'=>["title", "date"]
		    /*    ];
		    /*    read($query);
			*/

		}else{
			$Extra_table = $data;
					  $ci->db->order_by($Extra_order_by);
			$result = $ci->db->get_where($Extra_table, $Extra_cond, $Extra_limit, $Extra_offset);
			/*
			/* read('tablename', $where, 10, 0);
			*/
		}

		if(empty($result->result())){
			return false;
		}else{
			return $result->result();
		}
	}


	/**this method for join read from database
	/* Ex:

        $select    = 'news.*, category.name as cat_name';
        $join_cond = 'news.cat_id=category.id';
        $where     = ['category.status'=>1];

        $this->data['result'] = join_read('news', 'category', $join_cond,$where, $select);

	/*  $order_by=null, $limit=null, $offset=0
	*/

	function join_read($from=null, $join=null, $joinCond=null, $where=null, $select=null, $limit=null, $offset=0, $order_by=null) {
		$ci =& get_instance();

		$ci->db->select($select);
		$ci->db->from($from);
		$ci->db->join($join, $joinCond);
		if($order_by!==null){
			$ci->db->order_by($order_by);
		}else{
			$ci->db->order_by("$from.id DESC");
		}
		if($where!==null){
			$ci->db->where($where);
		}
		if($limit!==null){
			$ci->db->limit($limit, $offset);
		}
		$query = $ci->db->get();
		$result = $query->result();

		if(count($result)>0){
			return $result;
		}else{
			return false;
		}
	}


	/*this method for chacking existance data into database*/
	function exist($tablename=null,$cond = []){
		$ci =& get_instance();
		if($tablename !== null && is_array($cond) && count($cond) > 0){
			if(!empty($ci->db->get_where($tablename, $cond)->result())){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	/*this method for inserting data into database*/
	function save($tablename=null,$data = []){
		$ci =& get_instance();
		if($tablename !== null && is_array($data) && count($data) > 0){
			if($ci->db->insert($tablename, $data)){
				return  $ci->db->insert_id();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*this method to update database table*/
	function update($tablename=null, $data = null, $cond=null){
		$ci =& get_instance();
		if($tablename !== null && is_array($data) && count($data) > 0 &&  is_array($cond) && count($cond) > 0){
			$ci->db->where($cond);
			$result = $ci->db->update($tablename, $data);

			if($result){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	/*this method for deleting data from database*/
	function delete($table=null, $cond=null){
		$ci =& get_instance();
		if($table!==null && is_array($cond) && count($cond)>0){
			if($ci->db->delete($table, $cond)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	function query($query){
		$ci =& get_instance();
		$query = $ci->db->query($query)->result();
		if($query){
			return $query;
		}else{
			return false;
		}
	}


	//image upload mathod
    /** 
    /*you have need to send 5 argument by upload() function following this sequence
    /*  (01) input field name attribute value (<input type='file' name="img">)
    /*  (02) allowed types as array like: array('jpg','png','gif')
    /*  (03) allowed file size in kb
    /*  (04) upload location with '/' at the end like: "path/img/"
    /*  (05) file name without extenssion like: fileName
    /*
    /* Then this function return the file location with file name you cane save this 
    /*  in to database for future use.

        //image size, path and name setup Example
        ---------------------------------------------
        $types = array('jpg','JPG','png','PNG','gif','GIF'); //(optional)
        $path  = "frontend/images/banner/";
        $name  = 'multimedia'.(strtotime(date('Y-m-d h:i:s'))*10);////(optional)
        $size  = '1024';//(optional)

        if($path = upload_img("banner", $types, $size="1024", $path, $name)){
            $data['path'] = $path;
        }
    */

    function upload_img($file=null,$types=null,$size=null,$path=null,$name=null){
        
        if(is_null($file)){
            echo 'Please Set Your File Name from input field';
            return false;
        }
        $upload_path  = '';
        $allowed_types= array('jpg','JPG','png','PNG','gif','GIF');
        $max_size     = 1000;
        $file_name    = pathinfo($_FILES[$file]['name'])['filename'];
        $error_msg = null;

        //chacking argument and setting value
        if(!empty($types) || !is_null($types)){
            $allowed_types = $types;
        }
        if(!empty($size) || !is_null($size)){
            $max_size = $size;
        }
        if(!empty($path) || !is_null($path)){
            $upload_path = $path;
        }
        if(!empty($name) || !is_null($name)){
            $file_name = $name;
        }

        //if this directory not exist creat automatically this directory
        if(!is_dir($upload_path)){
            mkdir($upload_path);
        }


        //chacking file type
        $file_type = pathinfo($_FILES[$file]['name'])['extension'];
        if (in_array($file_type, $allowed_types)) {

            //chacking file size
            if ($_FILES[$file]['size']<=$max_size*1000) {
                //now time to upload the image
                if(copy($_FILES[$file]['tmp_name'], $upload_path."/".$file_name.".".$file_type)){
                    $upload_path = $upload_path.$file_name.".".$file_type;
                    return $upload_path;
                }else{
                    return false;
                }
            }else{
                $error_msg['img_type'] = "File size must be less than ".$max_size."kb";
            }
            echo pathinfo($_FILES[$file]['name'])['extension'];
        }else{
            $error_msg['img_type'] = "This file type is not supported";
        }
    }



    //set msg like: $_SESSION['msg'] = set_msg('warning', 'Warning', 'success');
	function set_msg($type=null, $title=null, $msg=null,$btn=true,$name="msg"){
	    $ci =& get_instance();
	    $ci->load->library('session');

	    $msg = "";
	    switch ($type) {
	        case 'success':
	            $msg = "<script>toastr.success('{$title}')</script>";
	            break;

	        case 'warning':
	            $msg = "<script>toastr.warning('{$title}')</script>";
	            break;

	        case 'danger':
	            $msg = "<script>toastr.error('{$title}')</script>";
	            break;
	    }


	    $ci->session->set_flashdata($name, $msg);
	}

	// for db sessional massage print
	function msg($msg='msg'){
	    $ci =& get_instance();
	    $ci->load->library('session');
	    echo $ci->session->flashdata($msg);
	}

	function redirect_back($arg='') {
		return redirect($_SERVER['HTTP_REFERER'].$arg);
	}


	function short_text($text=null, $limit=250){
		if($text !== null){
			$text 	  = strip_tags($text);
			$text 	  = substr($text,0,$limit);
			$position = strripos($text, ' ');
			$text 	  = substr($text,0,$position)."...";
			return $text;
		}
	}

    
    // $custom_system_id passed by developer from code
	function redirect_to($ctrl=null,$custom_system_id=null){
        $system_id = isset($_GET['system_id']) ? $_GET['system_id'] : '';
        if($ctrl!==null){
            if($custom_system_id==null){
                return redirect($ctrl."?system_id=".$system_id);
            }else{
                return redirect($ctrl."?system_id=".$custom_system_id);
            }
        }
	}


	function get_url($controller=null, $urlQuery=null){
	    $system_id = isset($_GET['system_id']) ? $_GET['system_id'] : '';
        if($controller!==null){
            if($urlQuery==null){
                return site_url($controller."?system_id=".$system_id);
            }else{
                return site_url($controller."?system_id=".$system_id."&$urlQuery");
            }
        }
	}
	
	
	function str_secure($str=null){
	    $str = strip_tags($str);
	    $str = trim($str);
	    $str = strtolower($str);
	    return $str;
	}
	
	function str_case_secure($str=null){
	    $str = strip_tags($str);
	    $str = trim($str);
	    return $str;
	}
	
	
	
	
	