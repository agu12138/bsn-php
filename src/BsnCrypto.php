<?php
namespace VenYuanBSN;
class BsnCrypto
 {
     var  $sign;

     public function constructor($_sign)
     {
         $this->sign= $_sign;
     }

     public function Hash($msg)
     {
         return $this->sign->Hash($msg);
     }

     public function Sign($value)
     {
         $digest =  unpack('C*', $value);
         $mac = $this->sign->Sign($digest);
         return base64_encode($mac);
     }

     public function  Verify($mac, $value)
     {
         $digest = unpack('C*', $value);
         $macData = base64_decode($mac);
         return $this->sign->Verify($macData, $digest);
     }
 }