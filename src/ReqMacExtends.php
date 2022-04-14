<?php
namespace venyuanbsn;

class ReqMacExtends{

    public static function GetRegisterUserReqMac($req)
    {
        $arr=[
            $req['header']['userCode'],
            $req['header']['appCode'],
            $req['body']['name'],
            $req['body']['secret']
        ];
        return join("",$arr);
    }

    public static function ReqChainCodeReqMac($req)
    {
        $arr=[
            $req['header']['userCode'],
            $req['header']['appCode'],
            $req['body']['userName'],
            $req['body']['nonce'],
            $req['body']['chainCode'],
            $req['body']['funcName']
        ];
        if(!empty($req['body']['args'])&&count($req['body']['args'])>0){
           foreach($req['body']['args'] as $v){
               $arr[]=$v;
           }
        }
        if(!empty($req['body']['args'])&&count($req['body']['transientData'])>0){
            foreach($req['body']['transientData'] as $k=>$v){
                $arr[]=$k;
                $arr[]=$v;
            }
         }
        return join("",$arr);
    }
}