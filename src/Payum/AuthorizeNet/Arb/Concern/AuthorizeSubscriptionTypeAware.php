<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/5/18
 * Time: 12:07 AM
 */

namespace Payum\AuthorizeNet\Arb\Request\Concern;


use net\authorize\api\contract\v1\SubscriptionDetailType;
use Payum\AuthorizeNet\Arb\Transform\ArrayObjectTransform;
use Payum\Core\Request\Generic;

trait AuthorizeSubscriptionTypeAware
{
    use ArrayObjectTransform;

    /**
     * @var SubscriptionDetailType
     */
    protected $subscription;

    /**
     * @param SubscriptionDetailType $subscription
     */
    public function setSubscription(SubscriptionDetailType $subscription)
    {
        $this->subscription = $subscription;

        if($this  instanceof Generic) {
            $arrayObject = $this->toArrayObject($this->subscription);

            $this->setModel($arrayObject);
        }
    }

    /**
     * @return SubscriptionDetailType
     */
    public function getSubscription()
    {
        return $this->subscription;
    }
}