<?php

// Save Data In The Table
if (!function_exists('save')) {
    function save($table, $data=[]){
        $ci = & get_instance();
        if (!empty($table) && !empty($data)) {
            $ci->db->insert($table, $data);
            return $ci->db->insert_id();
        }
        return false;
    }
}
// Save Data In The Table
if (!function_exists('update')) {
    function update($table, $data=[], $where){
        $ci =& get_instance();
        if (!empty($table) && !empty($data)) {
            $ci->db->where($where);
            $ci->db->update($table, $data);
            return true;
        }
        return false;
    }
}

// Read Sigle Table
if (!function_exists('readTable')) {
    function readTable($table, $where=[], $nidle=[]){
        $ci =& get_instance();
        if (isset($nidle['select'])) {
            $ci->db->select($nidle['select']);
        }
        // get group by
        if (isset($nidle['groupBy'])) {
            $ci->db->group_by($nidle['groupBy']);
        } 
        
        if (isset($nidle['notIn']) && count($nidle['notIn'])>1) 
        {
            $ci->db->where_not_in($nidle['notIn'][0], $nidle['notIn'][1]);
        }
        
        // get limit
        if (isset($nidle['limit']) && isset($nidle['offset'])) 
        {
            $ci->db->limit($nidle['offset'], $nidle['limit']);
        } 
        else if(isset($nidle['limit'])) 
        {
            $ci->db->limit($nidle['limit']);
        }   
        
        // OrderBy
        if(isset($nidle['orderBy'])){
            if(is_array($nidle['orderBy']) && count($nidle['orderBy'])==2){
                $ci->db->order_by($nidle['orderBy'][0], $nidle['orderBy'][1]);
            }
            else{
                $ci->db->order_by('id', $nidle['orderBy']);
            }
        }

        $query = $ci->db->where($where)->get($table);

        return $query->result();
    }
}

// Delete Data From Table
if (!function_exists('remove')) {
    function remove($table, $where=[]) {
        $ci =& get_instance();
        if (!empty($table) && !empty($where)) {
            $ci->db->where($where);
            $ci->db->delete($table);
            return true;
        }
        return false;
    }
}

// Pages View Like Laravel
if (!function_exists('view')) {
    function view($location)
    {
        $ci =& get_instance();
        $ci->data['page'] = $location;
        $ci->load->view('frontend/layout/master', $ci->data);
    }
}
// Pages View Like Laravel
if (!function_exists('load')) {
    function load($location)
    {
        $ci =& get_instance();
        $ci->load->view(str_replace('.', '/', $location), $ci->data);
    }
}

// Print_r
if (!function_exists('dd')) {
    function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if(!function_exists('uploadFile')){
    function uploadFile($location=null, $tag_name=null, $file_name=null){
        if($location && $tag_name && isset($_FILES[$tag_name]) && $_FILES[$tag_name]['name']!=''){
            $suffix = substr($location, strlen($location)-1);
            $exten  = pathinfo($_FILES[$tag_name]['name'], PATHINFO_EXTENSION);
            $path   = ($suffix=='/'?$location:$location.'/').($file_name ? $file_name : time()).'.'.$exten;

            if(file_exists($location)){
                copy($_FILES[$tag_name]['tmp_name'], $path);
                return $path;
            }
        }
    }
}

if (!function_exists('uploadToWebp')) {
    function uploadToWebp($file, $path = 'public/upload/', $name = null, $new_width=null, $new_height=null, $quality = 50)
    {
        if($file["name"]!=''){

            if(!is_dir($path)){
                if (!mkdir($path, 0777, true)) {
                    die('Failed to create folders...');
                }
            }
            
            if(!is_array($file['name'])){
                $filePath       = $file["tmp_name"];
                $fileName       = strtolower(pathinfo($file["name"], PATHINFO_FILENAME));
                $fileExtension  = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
            }

            list($orig_width, $orig_height) = getimagesize($filePath);

            $width  = $orig_width;
            $height = $orig_height;

            if($new_width!=null && $new_height==null){
                $height = ($new_width/$orig_width) * $orig_height;
                $width  = $new_width;
            }
            else if($new_width!=null && $new_height!=null){
                $width  = $new_width;
                $height = $new_height;
            }


            // allowed file extension
            $allowedExtension = ['gif', 'jpg', 'jpeg', 'png', 'webp'];  

            if (!in_array($fileExtension, $allowedExtension)) {
                return false;
            } 
        
            // convert image
            switch ($fileExtension) {
                case 'webp' :
                    $image = imagecreatefromwebp($filePath);
                    break;
                case 'gif' :
                    $image = imageCreateFromGif($filePath);
                    break;
                case 'png' :
                    $image = imageCreateFromPng($filePath);
                    break;
                case 'jpg':
                case 'jpeg':
                    $image = imageCreateFromJpeg($filePath);
                    break;
            }

            // resize image
            $image_p = imagecreatetruecolor($width, $height);

            imagepalettetotruecolor($image_p);
            imagealphablending($image_p, true);
            imagesavealpha($image_p, true);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

            // create file name
            $image_name =  ($name!=null ? $name : time()).'.webp';
            $new_path   = $path.$image_name;

            // upload file
            imagewebp($image_p, $new_path, $quality);
            //imagedestroy($image_p);

            return $new_path;
        }

        return false;
    }
}

// Title to Slug
if (!function_exists('titleToSlug')) {
    function titleToSlug($title){
       $title = str_replace('null', '..', $title);
       $title = str_replace('&', 'and', $title);
       $title = str_replace(',', ' ', $title);
       $title = str_replace('@', 'at', $title);
       return $title;
    }
}
