<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Img {

    public static function upload()
    {
        //Variables
        $uploadPath = './uploads/';

        $allowedTypes = 'gif|jpg|png';

        $CI =& get_instance();

        //Load Librarie
        $CI->load->library('upload');

        $CI->load->library('image_lib');

        //Image upload config
        $config['upload_path']   = $uploadPath;
        $config['allowed_types'] = $allowedTypes;
        $config['file_name']     = uniqid('img');
            
        $CI->upload->initialize($config);
        
        //Do upload
        if($CI->upload->do_upload())
        {
            $results = $CI->upload->data();
        
            // Thumb upload config
            $config['image_library']  = 'gd2';
            $config['source_image']   = $uploadPath . $results['file_name'];
            $config['create_thumb']   = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 150;
            $config['height']         = 150;
            $config['new_image']      = $uploadPath . $results['file_name'];
        
            $CI->image_lib->initialize($config);

            //Create thumb
            $CI->image_lib->resize();
            
            //Create array with image file path and thumb file path
            $data['image']     = $uploadPath.$results['file_name'];
            $data['img_thumb'] = $uploadPath.$results['raw_name'].'_thumb'.$results['file_ext'];
        }
        else
        {
            return false;
        }
        
        // Return arary containing image full path and thumb full path
        return $data;
    }

    public static function deleteImg($handle = '')
    {
        if('' !== $handle)
        {
            @unlink(realpath($handle->image));

            @unlink(realpath($handle->img_thumb));
        }
    }
}