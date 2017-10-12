<?php 

/* 
 * Author: chandra.
 * date created : 2016-08-17
 * class API models.
 */

class Basedata extends CI_Model {
    function __construct(){
	parent::__construct();
    }
    public function getMenu(){
        $query=$this->db->query("SELECT * FROM as_menu ORDER BY sort ASC");
        return $query->result();
    }
    
    /*---------------------customer---------------*/
    public function getCust($id,$batas,$offset){
        if($id!="all"){
            $where="WHERE cus.id='$id'";
        }else{
            $where="";
        }
        if($batas==""){
            $limit="";
        }else{
            $limit="LIMIT $offset,$batas";
        }
        $query=$this->db->query("SELECT cus.*
                FROM customer cus
                $where ORDER BY id DESC $limit");
        return $query->result();
    }
    public function count_cust(){
        $query = $this->db->get("customer")->num_rows();
        return $query;
    }
    public function setCustomer($post){
        $batas="";
        $offset="";
        $cek=$this->getCust($post['idRec'],$batas,$offset);
        $data = array(
            'customer'=>$post['customer'],
            'ktp'=>$post['ktp'],
            'alamat'=>$post['alamat'],
            'phone1'=>$post['phone1'],
            'phone2'=>$post['phone2'],
            'email'=>$post['email']
        );
        if(sizeof($cek)==0){
            $this->db->insert('customer',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('customer', $data);
        }
    }
    public function delCustomer($id){
        $this->db->query("DELETE FROM customer WHERE id='$id'");
    }
    /*---------------------end customer---------------*/
    
    /*---------------------user---------------*/
    public function getUser($id){
        if($id!="all"){
            $where="WHERE id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT * FROM as_user $where ORDER BY id DESC");
        return $query->result();
    }
    public function setUser($post){
        $cek=$this->getUser($post['idRec']);
        $data = array(
            'nama'=>$post['name'],
            'username'=>$post['username'],
            'password'=>md5($post['password'])
        );
        if(sizeof($cek)==0){
            $this->db->insert('as_user',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('as_user', $data);
        }
    }
    public function delUser($id){
        $this->db->query("DELETE FROM as_user WHERE id='$id'");
    }
    /*---------------------end kategori---------------*/
    
    /*---------------------dashboard---------------*/
    function getDashBeliM(){
        $query=$this->db->query("SELECT a.tanggal,
        (SELECT SUM(b.total)
        FROM faktur b
        WHERE b.tanggal =a.tanggal AND b.faktur_type_id='1') as jumlah 
        FROM faktur a
        WHERE a.tanggal BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
        AND a.faktur_type_id='1'
        GROUP BY a.tanggal");
        return $query->result();
    }
    function getDashJualM(){
        $query=$this->db->query("SELECT a.tanggal,
        (SELECT SUM(b.total)
        FROM faktur b
        WHERE b.tanggal =a.tanggal AND b.faktur_type_id='2') as total 
        FROM faktur a
        WHERE a.tanggal BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
        AND a.faktur_type_id='2'
        GROUP BY a.tanggal");
        return $query->result();
    }
    function getDashBrgJualM(){
        $query=$this->db->query("SELECT bar.nama,
            (SELECT SUM(fo1.jumlah*bar1.harga_jual)
            FROM faktur_order fo1
            INNER JOIN faktur fak1 ON fak1.id=fo1.faktur_id
            INNER JOIN barang bar1 ON bar1.id=fo1.barang_id
            WHERE fak1.faktur_type_id='2'
            AND fak1.tanggal=fak.tanggal
            ) as total
            FROM faktur_order fo
            INNER JOIN faktur fak ON fak.id=fo.faktur_id
            INNER JOIN barang bar ON bar.id=fo.barang_id
            WHERE fak.faktur_type_id='2'
            AND fak.tanggal BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
            GROUP BY fo.barang_id
            ");
        return $query->result();
    }
    /*---------------------end dashboard---------------*/
    
    /*-----------------------login------------------*/
    public function cekLogin($post){
        $pass=md5($post['password']);
        $query=$this->db->query("SELECT id,nama,role
        FROM as_user
        WHERE username='$post[username]'
        AND password='$pass'");
        return $query->result();
    }
    
    
    /*-----------------------end login------------------*/
}
