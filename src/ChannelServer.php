<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/2
 * Time: 9:31
 */

namespace Channel;


class ChannelServer extends Server
{
    /**
     * Construct.
     * @param string $ip
     * @param int $port
     */
    public function __construct($ip = '0.0.0.0', $port = 2206)
    {
        parent::__construct($ip, $port);
        $this->_worker->onConnect = array($this, 'onConnect');
    }

    public function onConnect($connection)
    {
//        Dlog(self::getConnectionInfo($connection) . " 已连接");
    }

    public static function getConnectionInfo($connection)
    {
        return $connection->getRemoteIp() . ":" . $connection->getRemotePort();
    }

    public function onClose($connection)
    {
        parent::onClose($connection);
//        Dlog(self::getConnectionInfo($connection) . " 已断开");
    }

    public function onMessage($connection, $data)
    {
        parent::onMessage($connection, $data);
        if ($data)
        {
//            Dlog(self::getConnectionInfo($connection) . "发送消息  " . print_r($data, true));
        }
    }

}