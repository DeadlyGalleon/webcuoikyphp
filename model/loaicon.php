<?php 
class loaicon{
private $idloaicon, $tenloaicon,$idloaicha;

function __construct(){
$this->idloaicon=0;
$this->tenloaicon='';


}


public function getidloaicon(){
return $this->idloaicon;
}
public function setidloaicon($value){
   $this->idloaicon=$value;
    }

    public function getidloaicha(){
      return $this->idloaicon;
      }
      public function setidloaicha($value){
         $this->idloaicon=$value;
          }

    public function gettenloaicon(){
        return $this->tenloaicon;
        }
        public function settenloaicon($value){
           $this->tenloaicon=$value;
            }


}


?> 