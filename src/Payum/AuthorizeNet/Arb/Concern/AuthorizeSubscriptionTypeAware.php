<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/5/18
 * Time: 12:07 AM
 */

namespace Payum\AuthorizeNet\Arb\Request\Concern;


use net\authorize\api\contract\v1\ARBSubscriptionType;
use Payum\AuthorizeNet\Arb\Transform\ArrayObjectTransform;
use Payum\Core\Request\Generic;

trait AuthorizeSubscriptionTypeAware
{
    use ArrayObjectTransform;

    /**
     * @var ARBSubscriptionType
     */
    protected $subscription;

    /**
     * @param ARBSubscriptionType $subscription
     */
    public function setSubscription(ARBSubscriptionType $subscription)
    {
        $this->subscription = $subscription;

        if ($this instanceof Generic) {
            $this->toArrayObject($this->subscription, $this->getModel());
        }
    }

    /**
     * @return ARBSubscriptionType
     */
    public function getSubscription()
    {
        return $this->subscription;
    }
}