<?php
//application/models/News_model.php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
    
    public function get_news($slug = FALSE)
        {
            if ($slug === FALSE)
        {
                $query = $this->db->get('sp18_news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
        }
        public function set_news()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);
        //'dash' looks for white space and inserts dash

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text')
    );//associative array

    return $this->db->insert('sp18_news', $data);
}//end set_news()

}//end  New-model