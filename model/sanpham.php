<?php
class sanpham {
    private $idsanpham, $tensanpham, $mota, $hinhanh, $giaban, $loai, $loaicon,$tenloaicon,$tenloai;

    public function __construct() {
        
        $this->idsanpham = 0;
        $this->tensanpham = '';
        $this->mota = '';
        $this->hinhanh = '';
        $this->giaban = 0;
        $this->loai=null;
        $this->loaicon=0;
    }

    public function getidsanpham() {
        return $this->idsanpham;
    }

    public function setidsanpham($value) {
        $this->idsanpham = $value;
    }
    public function gettenloaicon() {
        return $this->tenloaicon;
    }

    public function settenloaicon($value) {
        $this->tenloaicon = $value;
    }
    public function gettenloai() {
        return $this->tenloai;
    }

    public function settenloai($value) {
        $this->tenloai = $value;
    }

    public function gettensanpham() {
        return $this->tensanpham;
    }

    public function settensanpham($value) {
        $this->tensanpham = $value;
    }

    public function getmota() {
        return $this->mota;
    }

    public function setmota($value) {
        $this->mota = $value;
    }

    public function gethinhanh() {
        return $this->hinhanh;
    }

    public function sethinhanh($value) {
        $this->hinhanh = $value;
    }

    public function getgiaban() {
       
        return $this->giaban;
    }

    public function setgiaban($value) {
        $this->giaban = $value;
    }

    public function getloai() {
       return $this->loai;
    }
    public function setloai($value){
        $this->loai=$value;
    }

    public function getloaicon() {
        return $this->loaicon;
     }
     public function setloaicon($value){
         $this->loaicon=$value;
     }

   

   

    public function getImageFilename() {
        $image_filename = $this->hinhanh . '.png';
        return $image_filename;
    }

    public function getImagePath() {
        $image_path = '../images/' . $this->getImageFilename();
        return $image_path;
    }

    public function getImageAltText() {
        $image_alt = 'Image: ' . $this->getImageFilename();
        return $image_alt;
    }
}
?>