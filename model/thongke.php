<?php 
class thongke {
    private $idthongke;
    private $iddau;
    private $idcuoi;
    private $doanhthu;
    private $ngayxuat;


    public function __construct() {
        $this->idthongke = 0;
        $this->iddau = 0;
        $this->idcuoi=0;
        $this->doanhthu=0;
        $this->ngayxuat='';

    }

    public function getidthongke() {
        return $this->idthongke;
    }

    public function setidthongke($value) {
        $this->idthongke = $value;
    }




    public function getiddau() {
        return $this->iddau;
    }

    public function setiddau($value) {
        $this->iddau = $value;
    }




    public function getidcuoi() {
        return $this->idcuoi;
    }

    public function setidcuoi($value) {
        $this->idthongke = $value;
    }




    public function getdoanhthu() {
        return $this->doanhthu;
    }

    public function setdoanhthu($value) {
        $this->doanhthu = $value;
    }

    public function getngayxuat() {
        return $this->ngayxuat;
    }

    public function setngayxuat($value) {
        $this->ngayxuat = $value;
    }



    
}

?> 