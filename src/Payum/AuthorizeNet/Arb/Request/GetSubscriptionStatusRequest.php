<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:56 AM
 */

use Payum\Core\Request\Generic;

class GetSubscriptionStatusRequest
{
    /**
     * @var string
     */
    private $subscriptionId;


    /**
     * @var string
     */
    private $status;

    /**
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $subscriptionId
     * @return GetSubscriptionStatusRequest
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
        return $this;
    }


    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return GetSubscriptionStatusRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

}