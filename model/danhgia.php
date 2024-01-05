<?php 
class DanhGia {
    public $iduser;
    public $idsp;
    public $sosao;
    public $binhluan;
    public $ngaygio;

    // public function __construct($iduser, $idsp, $sosao, $binhluan) {
    //     $this->iduser = '11';
    //     $this->idsp = $idsp;
    //     $this->sosao = $sosao;
    //     $this->binhluan = $binhluan;
    // }

 

    public function getIduser() {
        return $this->iduser;
    }

    public function setIduser($iduser) {
        $this->iduser = $iduser;
    }

    public function getIdSanPham() {
        return $this->idsp;
    }

    public function setIdSanPham($idsp) {
        $this->idsp = $idsp;
    }
    public function getsosao() {
        return $this->sosao;
    }

    public function setsosao($sosao) {
        $this->sosao = $sosao;
    }
    public function getBinhLuan() {
        return $this->binhluan;
    }

    public function setBinhLuan($binhluan) {
        $this->binhluan = $binhluan;
    }
    public function getNgaygio() {
        return $this->ngaygio;
    }

    public function setNgaygio($ngaygio) {
        $this->ngaygio = $ngaygio;
    }

    // Các phương thức khác của lớp DanhGia
}
?>