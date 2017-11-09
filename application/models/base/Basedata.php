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
        $query=$this->db->query("SELECT * FROM as_menu WHERE status_id='1' ORDER BY sort ASC");
        return $query->result();
    }
    
    /*---------------------client---------------*/
    public function getCust($id,$batas,$offset){
        if($id!="all"){
            $where="WHERE ac.client_id='$id'";
        }else{
            $where="";
        }
        if($batas==""){
            $limit="";
        }else{
            $limit="LIMIT $offset,$batas";
        }
        $query=$this->db->query("SELECT ac.*
                FROM as_client ac
                $where ORDER BY ac.client_id DESC $limit");
        return $query->result();
    }
    public function getClientApi($name){
        $query=$this->db->query("SELECT ac.*
                FROM as_client ac
                WHERE ac.client_name LIKE '%$name%' ORDER BY ac.client_id DESC");
        return $query->result();
    }
    public function count_cust(){
        $query = $this->db->get("as_client")->num_rows();
        return $query;
    }
    public function setClient($post){
        $batas="";
        $offset="";
        $cek=$this->getCust($post['idRec'],$batas,$offset);
        $data = array(
            'client_name'=>$post['client_name'],
            'phone_number'=>$post['phone_number'],
            'address'=>$post['address'],
            'email'=>$post['email']
        );
        if(sizeof($cek)==0){
            $this->db->insert('as_client',$data);
        }else{
            $this->db->where('client_id', $post['idRec']);
            $this->db->update('as_client', $data);
        }
    }
    public function delClient($id){
        $this->db->query("DELETE FROM as_client WHERE client_id='$id'");
    }
    /*---------------------end client---------------*/
    
    /*---------------------user---------------*/
    public function getUser($id){
        if($id!="all"){
            $where="WHERE id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT au.*,ar.role_name,ac.client_name FROM as_user au 
                LEFT JOIN as_role ar ON ar.role_id=au.role_id
                LEFT JOIN as_client ac ON ac.client_id=au.client_id
                $where ORDER BY id DESC");
        return $query->result();
    }
    public function setUser($post){
        $cek=$this->getUser($post['idRec']);
        $data = array(
            'nama'=>$post['name'],
            'username'=>$post['username'],
            'password'=>md5($post['password']),
            'role_id'=>$post['role_id'],
            'client_id'=>$post['client_id']
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
    /*---------------------end user---------------*/
    
    /*---------------------type---------------*/
    public function getType($id){
        if($id!="all"){
            $where="WHERE aat.ads_type_id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT aat.*,av.vendor_name FROM as_ads_type aat 
                INNER JOIN as_vendor av ON av.vendor_id=aat.vendor_id
                $where ORDER BY aat.ads_type_id DESC");
        return $query->result();
    }
    public function setType($post){
        $cek=$this->getType($post['idRec']);
        $data = array(
            'ads_type_name'=>$post['type_name'],
            'vendor_id'=>$post['vendor_id']
        );
        if(sizeof($cek)==0){
            $this->db->insert('as_ads_type',$data);
        }else{
            $this->db->where('ads_type_id', $post['idRec']);
            $this->db->update('as_ads_type', $data);
        }
    }
    public function delType($id){
        $this->db->query("DELETE FROM as_ads_type WHERE ads_type_id='$id'");
    }
    /*---------------------end type---------------*/
    
    /*---------------------vendor---------------*/
    public function getVendor($id){
        if($id!="all"){
            $where="WHERE vendor_id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT * FROM as_vendor
                $where ORDER BY vendor_id DESC");
        return $query->result();
    }
    public function setVendor($post){
        $cek=$this->getVendor($post['idRec']);
        $data = array(
            'vendor_name'=>$post['vendor_name']
        );
        if(sizeof($cek)==0){
            $this->db->insert('as_vendor',$data);
        }else{
            $this->db->where('vendor_id', $post['idRec']);
            $this->db->update('as_vendor', $data);
        }
    }
    public function delVendor($id){
        $this->db->query("DELETE FROM as_vendor WHERE vendor_id='$id'");
    }
    /*---------------------end vendor---------------*/
    
    /*---------------------size---------------*/
    public function getSize($id){
        if($id!="all"){
            $where="WHERE ads_size_id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT * FROM as_ads_size
                $where ORDER BY ads_size_id DESC");
        return $query->result();
    }
    public function setSize($post){
        $cek=$this->getSize($post['idRec']);
        $data = array(
            'ads_size_name'=>$post['size_name']
        );
        if(sizeof($cek)==0){
            $this->db->insert('as_ads_size',$data);
        }else{
            $this->db->where('ads_size_id', $post['idRec']);
            $this->db->update('as_ads_size', $data);
        }
    }
    public function delSize($id){
        $this->db->query("DELETE FROM as_ads_size WHERE ads_size_id='$id'");
    }
    /*---------------------end size---------------*/
    
    /*---------------------content---------------*/
    public function getCont($id){
        if($id!="all"){
            $where="WHERE ads_content_id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT aac.*,aat.ads_type_name AS type,aas.ads_size_name AS size,ac.client_name AS client FROM as_ads_content aac
                INNER JOIN as_ads_type aat ON aat.ads_type_id=aac.ads_type_id
                INNER JOIN as_ads_size aas ON aas.ads_size_id=aac.ads_size_id
                INNER JOIN as_client ac ON ac.client_id=aac.client_id
                $where ORDER BY ads_content_id DESC");
        return $query->result();
    }
    /*---------------------end content---------------*/
    
    /*---------------------role---------------*/
    public function getRole(){
        $query=$this->db->query("SELECT * FROM as_role");
        return $query->result();
    }
    /*---------------------end role---------------*/
    
    public function getRbt(){
        $query=$this->db->query("SELECT * FROM as_rbt");
        return $query->result();
    }
    /*----------------------trasaction-----------------*/
    public function setTransac($post){
        $getId=$this->db->query("SELECT transaction_id FROM as_transaction ORDER BY push_date DESC limit 1");
        $num=$getId->result()[0]->transaction_id;
        $id = substr(trim($num), -1);
        $id = (int) $id+1;
        $dateA=date('Ymd');
        $dateB=date('His');
        $transaction_id=$dateA.$dateB.$id;
        $data = array(
            'transaction_id'=>$transaction_id,
            'ads_type_id'=>$post['type'],
            'msisdn'=>$post['msisdn'],
            'content'=>$post['content'],
            'push_date'=>$post['push_date'],
            'status'=>$post['status']
        );
        $this->db->insert('as_transaction',$data);
    }
    /*----------------------end trasaction-----------------*/
    
    
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
        $query=$this->db->query("SELECT id,nama,role_id
        FROM as_user
        WHERE username='$post[username]'
        AND password='$pass'");
        return $query->result();
    }
    
    
    /*-----------------------end login------------------*/
}
