<?php
namespace VenYuanBSN;

class NodeServer
{
    var $config = null;
    function __construct($config)
    {
        $this->config = $config;
    }
    /// <summary>
    /// User registration URL
    /// </summary>
    private static  $registerUserUrl = "/api/fabric/v1/user/register";

    /// <summary>
    /// user cert registration URL
    /// </summary>
    private static  $EnrollUserUrl = "/api/fabric/v1/user/enroll";

    /// <summary>
    /// get transaction URL
    /// </summary>
    private static  $GetTransUrl = "/api/fabric/v1/node/getTransaction";

    /// <summary>
    /// get transaction data URL
    /// </summary>
    private static  $GetTransDataUrl = "/api/fabric/v1/node/getTransdata";

    /// <summary>
    /// get blockinfo URL
    /// </summary>
    private static  $GetBlockUrl = "/api/fabric/v1/node/getBlockInfo";
    /// <summary>
    /// get blockinfo URL
    /// </summary>
    private static  $GetBlockDataUrl = "/api/fabric/v1/node/getBlockData";

    /// <summary>
    /// get ledgerinfo URL
    /// </summary>
    private static  $GetLedgerUrl = "/api/fabric/v1/node/getLedgerInfo";

    /// <summary>
    /// chaincode event registration URL
    /// </summary>
    private static  $EventRegisterUrl = "/api/fabric/v1/chainCode/event/register";

    /// <summary>
    ///  chaincode event query URL
    /// </summary>
    private static  $EventQueryUrl = "/api/fabric/v1/chainCode/event/query";

    /// <summary>
    /// event chaincode logout URL
    /// </summary>
    private static  $EventRemoveUrl = "/api/fabric/v1/chainCode/event/remove";

    /// <summary>
    /// transaction processing under Key-Trust Mode URL
    /// </summary>
    private static  $ReqChainCodeUrl = "/api/fabric/v1/node/reqChainCode";

    /// <summary>
    /// transaction processing under Public-Key-Upload Mode URL
    /// </summary>
    private static  $TransUrl = "/api/fabric/v1/node/trans";

    function RegisterUser($reqbody)
    {
        $params = [
            "body" => [
                "name"=>$reqbody["name"],
                "secret"=>$reqbody["secret"]
            ],
            "header"=>[
                "appCode" => $this->config["appInfo"]["AppCode"],
                "userCode" => $this->config["userCode"]
            ]
        ];
       $params["mac"]=system(dirname(__FILE__)."\ECDSA.exe sign ".ReqMacExtends::GetRegisterUserReqMac($params));
        $res=SendHelper::post($this->config["reqUrl"].NodeServer::$registerUserUrl,$params);
        return $res;
    }
    function ReqChainCode($reqbody)
    {
        $params = [
            "body" =>$reqbody,
            "header"=>[
                "appCode" => $this->config["appInfo"]["AppCode"],
                "userCode" => $this->config["userCode"]
            ]
        ];
        $params["mac"]=system(dirname(__FILE__)."\ECDSA.exe sign ".ReqMacExtends::ReqChainCodeReqMac($params));
        echo ReqMacExtends::ReqChainCodeReqMac($params)."\n";
        echo 1;
        $res=SendHelper::post($this->config["reqUrl"].NodeServer::$ReqChainCodeUrl,$params);
        return $res;
    }
}
