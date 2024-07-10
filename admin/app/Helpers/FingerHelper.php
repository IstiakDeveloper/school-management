<?php

namespace App\Helpers;

use Rats\Zkteco\Lib\ZKTeco;

class FingerHelper
{
    /**
     * Initialize the ZKTeco device with the given IP and port.
     *
     * @param string $ip
     * @param int $port
     * @return ZKTeco
     */
    public function init($ip, $port = 4370): ZKTeco
    {
        return new ZKTeco($ip, $port);
    }

    /**
     * Get the connection status of the device.
     *
     * @param ZKTeco $zk
     * @return bool
     */
    public function getStatus(ZKTeco $zk): bool
    {
        return $zk->connect();
    }

    /**
     * Get a formatted status of the device connection.
     *
     * @param ZKTeco $zk
     * @return string
     */
    public function getStatusFormatted(ZKTeco $zk): string
    {
        return $zk->connect() ? "Active" : "Deactivate";
    }

    /**
     * Get the serial number of the connected device.
     *
     * @param ZKTeco $zk
     * @return string|bool
     */
    public function getSerial(ZKTeco $zk)
    {
        if ($zk->connect()) {
            return substr(strstr($zk->serialNumber(), '='), 1);
        }
        return false;
    }


    public function setUser(ZKTeco $zk, $uid, $userid, $name, $password, $role, $cardno)
    {
        return $zk->setUser($uid, $userid, $name, $password, $role, $cardno);
    }

    
}
