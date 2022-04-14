<?php
namespace VenYuanBSN;

class Config {

    /**
     * 获取应用信息
     */
    static $appInfoUrl = "/api/app/getAppInfo";


    /***
     * 
     * 初始化配置
     * 
     */
    static function initConfig($config){
        
        $config=Config::init($config);
        return $config;
    }

    /**
     * 初始化应用信息
     */
    static function init($config){
        $res=SendHelper::post($config["reqUrl"].Config::$appInfoUrl,["header"=>[
            "userCode" => $config["userCode"],
            "appCode" => $config["appInfo"]["AppCode"]
        ]]);
        $config["appInfo"]["AppType"] = $res->body->appType;
        $config["appInfo"]["CAType"] = $res->body->caType;
        $config["appInfo"]["AlgorithmType"] = $res->body->algorithmType;
        $config["appInfo"]["ChannelId"] = $res->body->channelId;
        $config["appInfo"]["MspId"] = $res->body->mspId;
        return $config;
    }

    /**
     * 获取应用信息
     */
    static function GetAppInfo($config)
    {
        try
        {
            $res="";
            //Get the unsigned signature of DApp
            if ($res != null)
            {
                //Check the status codes in turn

            }
        }
        catch (Exception $e)
        {
            throw $e;
        }
        return ;
    }
}