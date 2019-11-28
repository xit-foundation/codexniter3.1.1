<?php 
function inc_header(){
    $CI =& get_instance();
    $CI->load->view('inc/header');
}

function inc_footer(){
    $CI =& get_instance();
    $CI->load->view('inc/footer');
}
function inc_script(){
    $CI =& get_instance();
    $CI->load->view('inc/script');
}

function dec64($string){
    return base64_decode($string);
}
function enc64($string){
    return base64_encode($string);
}

function post($str){
    $CI =& get_instance();
    return $CI->input->post($str);
}

function get($str){
    $CI =& get_instance();
    return $CI->input->get($str);
}

function get_csrf_name(){
    $CI =& get_instance();
    return $CI->security->get_csrf_token_name();
}
function get_hash(){
    $CI =& get_instance();
    return $CI->security->get_csrf_hash();
}
function view($str, $data=null){
    $CI =& get_instance();
    return $CI->load->view($str,$data);
}

function xss($str){
    $CI =& get_instance();
    return $CI->security->xss_clean($str);
}

function esc($str ){
    $CI =& get_instance();
    return $CI->db->escape_str($str);
}

function clean($str ){
    $CI =& get_instance();
    $data = ($CI->security->xss_clean($str));
    return $data;
}


function do_upload_img($file){
    $CI =& get_instance();
    $config['upload_path']          = './upload';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 10000;
    $config['max_width']            = 10000;
    $config['max_height']           = 10000;
    $config['encrypt_name']         = TRUE;
    $config['file_ext_tolower']     = TRUE;
    $CI->upload->initialize($config);

    $data['status_upload'] = FALSE;
    $data['file_name'] = $CI->upload->data('orig_name');
    $data['encrypt_name'] =  $CI->upload->data('file_name');

    if($CI->upload->do_upload($file)){
        $data['status_upload'] = TRUE; 
    } else {
        $data['error'] = $CI->upload->display_errors();
    }

    return $data;

}

// ======================================
// ==        function database         ==
// ======================================

function select_all($table){
    $CI =& get_instance();
    return $CI->db->get($table)->result();
}
function select_all_desc($table){
    $CI =& get_instance();
    return $CI->db->order_by('created_at', 'DESC')->get($table)->result();
}
function select_all_where($table , $key){
  $CI =& get_instance();
  return $CI->db->get_where($table , $key)->result();
}

function select($table , $field){
    $CI =& get_instance();
    return $CI->db->select($field)->get($table)->result();
}

function select_where($table , $field , $key){
    $CI =& get_instance();
    return $CI->db->select($field)->get_where($table , $key)->result();
}

function insert($table , $data){
    $CI =& get_instance();
    return $CI->db->insert($table , $data);
}
function insert_batch($table , $data){
    $CI =& get_instance();
    return $CI->db->insert_batch($table , $data);
}
function update($table , $data , $key){
    $CI =& get_instance();
    return $CI->db->update($table , $data , $key);
}
function delete($table ,  $key){
    $CI =& get_instance();
    return $CI->db->delete($table , $key);
}

// ============================================

/* End of file X.php */
    
                        