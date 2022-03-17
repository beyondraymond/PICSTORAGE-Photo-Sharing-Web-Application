<?php

class Picture_model extends CI_Model{

    public function get_pictures($id){
        $query = $this->db->get_where('pictures', ['user_id' => $id]);
        return $query->result();
    }

    public function get_pictures_numrows($id){
        $query = $this->db->get_where('pictures', ['user_id' => $id]);
        return $query->num_rows();
    }

    public function get_picturesLimitOffset($id, $limit, $offset){
        $this->db->limit($limit, $offset);
        $query = $this->db->get_where('pictures', ['user_id' => $id]);
        return $query->result();
    }

    public function get_picturesLimitOffsetSearch($search, $limit, $offset){
        $this->db->from('pictures')->like('picture_name', $search, 'after')->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_single_picture($id){
        $query = $this->db->get_where('pictures', ['picture_id' => $id]);
        return $query->result();
    }

    public function delete_picture($id){
        $this->db->delete('pictures', array('picture_id' => $id));
    }

    public function upload_picture($array){
        $this->db->insert('pictures', $array);
    }

    public function get_pictures_results($search){
        $query = $this->db->from('pictures')->like('picture_name', $search, 'after')->get();
        return $query->result();
    }

    public function get_pictures_results_numrows($search){
        $query = $this->db->from('pictures')->like('picture_name', $search, 'after')->get();
        return $query->num_rows();
    }

    public function update_picture_views($picture_id){
        $getData = $this->db->select('views')->from('pictures')->where('picture_id', $picture_id)->get();
        $newViewCount = (int)($getData->result()[0]->views) + 1;
        $this->db->update('pictures', ['views' => $newViewCount], ['picture_id' => $picture_id]);
    }

    public function incrementLikes($picture_id){
        $getData = $this->db->select('likes')->from('pictures')->where('picture_id', $picture_id)->get();
        $newViewCount = (int)($getData->result()[0]->likes) + 1;
        $this->db->update('pictures', ['likes' => $newViewCount], ['picture_id' => $picture_id]);
    }

    public function decrementLikes($picture_id){
        $getData = $this->db->select('likes')->from('pictures')->where('picture_id', $picture_id)->get();
        $newViewCount = (int)($getData->result()[0]->likes) - 1;
        $this->db->update('pictures', ['likes' => $newViewCount], ['picture_id' => $picture_id]);
    }

    public function getSimilarPhotos($tagReferences){
        // Trash implementation, this is all I could think of hehe - Mar
        $picturesThatHasSimilarTagsArr = [];
        $searchResultContents = $this->db->select('picture_id, tags')->from('pictures')->get()->result();
        $implodedTagReference = implode(" ", $tagReferences);
        
        foreach($searchResultContents as $sc){
            $currTagArr = explode(" ", $sc->tags);
            foreach($currTagArr as $ct){
                if (strpos($implodedTagReference, $ct) !== false){
                    array_push($picturesThatHasSimilarTagsArr, $sc->picture_id);
                    break;
                }
            }
        }
        $query = $this->db->from('pictures')->where_in('picture_id', $picturesThatHasSimilarTagsArr)->get();
        return $query->result();
    }
}
?>