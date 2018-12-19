<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:56 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;


class NotificationRequest
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
     * @return NotificationRequest
     */
    public function setNotificationObject(\stdClass $notificationObject): NotificationRequest
    {
        $this->notificationObject = $notificationObject;
        return $this;
    }
}