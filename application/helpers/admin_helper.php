<?php

// save data
if (!function_exists('save_data')) {
    function save_data($table, $data = [], $where = [], $action = false)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($table) && !empty($data)) {
            if(!empty($where)){
                $ci->db->where($where);
                $ci->db->update($table, $data);
                return true;
            }else{
                if($action){
                    $ci->db->insert($table, $data);
                    return  $ci->db->insert_id();
                }else{
                    $ci->db->insert($table, $data);
                    return true;
                }
            }
        } 
        return false;
    }
}


// delete data
if (!function_exists('delete_data')) {
    function delete_data($table, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();
        if (!empty($table) && !empty($where)) {
            $ci->db->where($where);
            $ci->db->delete($table);
            return true;
        } 
        return false;
    }
}


// get row
if (!function_exists('get_row')) {
    function get_row($table, $where = [], $select = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($where)) {

            // get select column
            if (!empty($select)) {
                $ci->db->select($select);
            }

            $query = $ci->db->where($where)->get($table);
            
            return $query->row();
        } 
        return false;
    }
}


// get name
if (!function_exists('get_name')) {
    function get_name($table, $select_column = null, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($table) && !empty($select_column) && !empty($where)) {
			
            // get select column
            $ci->db->select($select_column);
			$ci->db->where($where);
			
            $query = $ci->db->get($table);
			
            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result->$select_column;
            } 
			
            return false;
        } 
		
        return false;
    }
}


// get all data
if (!function_exists('get_result')) {
    function get_result($table, $where = null, $select = null, $groupBy = null, $order_col = null, $order_by = 'ASC', $limit = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();
		
		if(!empty($table)){
			// select column
			if (!empty($select)) {
				$ci->db->select($select);
			}

			//get where
			if (!empty($where)) {
				$ci->db->where($where);
			}

			// get group by
			if (!empty($groupBy)) {
				$ci->db->group_by($groupBy);
			}

			// order by
			if (!empty($order_col) && !empty($order_by)) {
				$ci->db->order_by($order_col, $order_by);
			}

			// limit
			if (!empty($limit)) {
				$ci->db->limit($limit);
			}

			// get query
			$query = $ci->db->get($table);
			return $query->result();
        }
		return false;
    }
}

// get join all data
if (!function_exists('get_join')) {
    function get_join($tableFrom, $tableTo, $joinCond, $where = [], $select = null, $groupBy = null, $order_col = null, $order_by = 'ASC', $limit = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();
		
		if(!empty($tableFrom) && !empty($tableTo) && !empty($joinCond)){

			// get all query
			if (!empty($select)) {
				$ci->db->select($select);
			}

			$ci->db->from($tableFrom);

			if (!empty($tableTo) && !empty($joinCond)) {
				if (is_array($tableTo) && is_array($tableTo)) {
					foreach ($tableTo as $_key => $to_value) {
						$ci->db->join($to_value, $joinCond[$_key]);
					}
				} else {
					$ci->db->join($tableTo, $joinCond);
				}
			}

			// get where
			if (!empty($where)) {
				$ci->db->where($where);
			}

			// get group by
			if (!empty($groupBy)) {
				$ci->db->group_by($groupBy);
			}

			// get order by
			if (!empty($order_col) && !empty($order_by)) {
				$ci->db->order_by($order_col, $order_by);
			}

			// get limit
			if (!empty($limit)) {
				$ci->db->limit($limit);
			}

			// get query
			$query = $ci->db->get();
			return $query->result();
			
		} else {
			return false;
		}	
    }
}// get join all data
if (!function_exists('get_left_join')) {
    function get_left_join($tableFrom, $tableTo, $joinCond, $where = [], $select = null, $groupBy = null, $order_col = null, $order_by = 'ASC', $limit = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();
        
        if(!empty($tableFrom) && !empty($tableTo) && !empty($joinCond)){

            // get all query
            if (!empty($select)) {
                $ci->db->select($select);
            }

            $ci->db->from($tableFrom);

            if (!empty($tableTo) && !empty($joinCond)) {
                if (is_array($tableTo) && is_array($tableTo)) {
                    foreach ($tableTo as $_key => $to_value) {
                        $ci->db->join($to_value, $joinCond[$_key], 'left');
                    }
                } else {
                    $ci->db->join($tableTo, $joinCond, 'left');
                }
            }

            // get where
            if (!empty($where)) {
                $ci->db->where($where);
            }

            // get group by
            if (!empty($groupBy)) {
                $ci->db->group_by($groupBy);
            }

            // get order by
            if (!empty($order_col) && !empty($order_by)) {
                $ci->db->order_by($order_col, $order_by);
            }

            // get limit
            if (!empty($limit)) {
                $ci->db->limit($limit);
            }

            // get query
            $query = $ci->db->get();
            return $query->result();
            
        } else {
            return false;
        }   
    }
}


// get row join
if (!function_exists('get_row_join')) {
    function get_row_join($tableFrom, $tableTo, $joinCond, $where = [], $select = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();
		
		

        if (!empty($tableFrom) && !empty($tableTo) && !empty($joinCond) && !empty($where)) {
            
			// get all query
            if (!empty($select)) {
                $ci->db->select($select);
            }

            $ci->db->from($tableFrom);

            if (!empty($tableTo) && !empty($joinCond)) {
                if (is_array($tableTo) && is_array($tableTo)) {
                    foreach ($tableTo as $_key => $to_value) {
                        $ci->db->join($to_value, $joinCond[$_key]);
                    }
                } else {
                    $ci->db->join($tableTo, $joinCond);
                }
            }

            $ci->db->where($where);

            // get query
            $query = $ci->db->get();
            return $query->row();
        }
        return false;
    }
}


// get pagination
if (!function_exists('get_pagination')) {
    function get_pagination($pag_query = [])
    {
        //get main CodeIgniter object
        $CI =& get_instance();

        if (array_key_exists('select', $pag_query)) {
            $CI->db->select($pag_query['select']);
        }

        if (array_key_exists('where', $pag_query)) {
            $CI->db->where($pag_query['where']);
        }

        $search = '';
        if (!empty($_GET)) {
            $CI->db->where($_GET);

            $search .= '?';

            $i     = 1;
            $count = count($_GET);
            foreach ($_GET as $_key => $s_value) {
                if ($count == 1) {
                    $search .= $_key . '=' . $s_value;
                } else {
                    if ($i != $count) {
                        $search .= $_key . '=' . $s_value . '&';
                    } else {
                        $search .= $_key . '=' . $s_value;
                    }
                    $i++;
                }
            }
        }

        $total_row = $CI->db->count_all_results($pag_query['table']);

        if (array_key_exists('per_page', $pag_query)) {
            $per_page = $pag_query['per_page'];
        } else {
            $per_page = 10;
        }

        // pagination config
        $config               = [];
        $config["base_url"]   = base_url() . $pag_query['url'] . '/';
        $config["total_rows"] = $total_row;
        $config["per_page"]   = $per_page;
        $config['suffix']     = $search;

        // initialize pagination
        $CI->pagination->initialize($config);

        $page = ($CI->uri->segment($pag_query['segment'])) ? $CI->uri->segment($pag_query['segment']) : 0;

        $return_data["links"] = $CI->pagination->create_links();


        if (array_key_exists('where', $pag_query)) {
            $CI->db->where($pag_query['where']);
        }

        if (!empty($_GET)) {
            $CI->db->where($_GET);
        }

        $CI->db->limit($per_page, $page);

        $query = $CI->db->get($pag_query['table']);

        if ($query->num_rows() > 0) {
            $return_data['results'] = $query->result();
            return $return_data;
        }
        return false;
    }
}


// get sum
if (!function_exists('get_sum')) {
    function get_sum($table, $column, $where = [], $groupBy = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($where) && $ci->db->field_exists($column, $table)) {
            //get data from databasea
            $ci->db->select_sum($column);
            $ci->db->where($where);
            //get group by
            if (!empty($groupBy)) {
                $ci->db->group_by($groupBy);
            }
            $query = $ci->db->get($table);
         
            if ($query->num_rows > 0) {
                $result = $query->row();
                return $result->$column;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }
}


// get max value
if (!function_exists('get_max')) {
    function get_max($table, $column, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($where) && $ci->db->field_exists($column, $table)) {
            //get data from databasea
            $ci->db->select_max($column);
            $ci->db->where($where);
            $query = $ci->db->get($table);

            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result->$column;
            } else {
                return 0.00;
            }
        } else {
            return false;
        }
    }
}


// file upload
if (!function_exists('file_upload')) {
    function file_upload($fileName, $dir_path = "upload", $file_type = null, $prefix = "img")
    {
        if ($_FILES[$fileName]["name"] != null or $_FILES[$fileName]["name"] != "") {

            if (!empty($file_type)) {
                $f_type = $file_type;
            } else {
                $f_type = 'png|jpeg|jpg|gif';
            }
            $config                  = [];
            $config['upload_path']   = './public/' . $dir_path;
            $config['allowed_types'] = $f_type;
            $config['max_size']      = '5120';
            $config['max_width']     = '2560';
            $config['max_height']    = '2045';
            $config['file_name']     = $prefix . '-' . time() . rand();
            $config['overwrite']     = true;

            $ci = &get_instance();
            $ci->upload->initialize($config);

            if ($ci->upload->do_upload($fileName)) {
                $upload_data = $ci->upload->data();

                $filePath = 'public/' . $dir_path . '/' . $upload_data['file_name'];

                return $filePath;
            } else {
                return false;
            }
        }
    }
}


// get input data
if (!function_exists('input_data')) {
    function input_data($input_name = null)
    {
        if (!empty($input_name)) {
            if (is_array($input_name)) {
                $new_data = [];
                foreach ($input_name as $val) {
                    $new_data[$val] = htmlspecialchars(trim($_POST[$val]));
                }
                return $new_data;
            } else {
                return htmlspecialchars(trim($_POST[$input_name]));
            }
        } else {
            return false;
        }
    }
}


// check exists
if (!function_exists('check_exists')) {
    function check_exists($table, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        if (!empty($table) && !empty($where)) {

            $ci->db->where($where);
            $query = $ci->db->get($table);
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}


// check null
if (!function_exists('check_null')) {
    function check_null($input_data = null)
    {  
        if(!empty($input_data)){
			return $input_data;
		}else{
			return 'N/A';
		}
    }
}



// Crop word form sentence
if(!function_exists('crop')){
    function crop($strings=null, $length=8){
        if($strings)
        {
            $strings = strip_tags($strings);
            $words   = explode(' ', $strings);
            
            if(count($words)>$length){
                return implode(' ', array_slice($words, 0, $length)).'...';
            }
            return $strings;
        }
    }
}