<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:56 AM
 */
namespace Payum\AuthorizeNet\Arb\Request;

class GetSubscriptionListRequest
{
    protected $subscriptions;

    /**
     * @return mixed
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @param mixed $subscriptions
     * @return GetSubscriptionListRequest
     */
    public function setSubscriptions($subscriptions)
    {
        $this->subscriptions = $subscriptions;
        return $this;
    }
}