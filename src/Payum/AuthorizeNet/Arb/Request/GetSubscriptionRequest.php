<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:56 AM
 */

use Concern\AuthorizeSubscriptionTypeAware;
use Payum\Core\Request\Generic;

class GetSubscriptionRequest extends Generic
{
    use AuthorizeSubscriptionTypeAware;

    /**
     * @var string
     */
    private $subscriptionId;


    /**
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $subscriptionId
     * @return GetSubscriptionRequest
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
        return $this;
    }

}