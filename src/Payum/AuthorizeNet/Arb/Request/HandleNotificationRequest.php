<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:56 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;


class HandleNotificationRequest
{
    /**
     * @var object
     */
    private $notificationObject;

    /**
     * @return object
     */
    public function getNotificationObject()
    {
        return $this->notificationObject;
    }

    /**
     * @param \stdClass $notificationObject
     * @return HandleNotificationRequest
     */
    public function setNotificationObject(\stdClass $notificationObject): HandleNotificationRequest
    {
        $this->notificationObject = $notificationObject;
        return $this;
    }
}