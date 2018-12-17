<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/5/18
 * Time: 12:07 AM
 */

namespace Payum\AuthorizeNet\Arb\Request\Concern;


use net\authorize\api\contract\v1\ARBSubscriptionType;
use net\authorize\api\contract\v1\CustomerProfileType;
use Payum\AuthorizeNet\Arb\Transform\ArrayObjectTransform;
use Payum\Core\Request\Generic;

trait AuthorizeCustomerProfileTypeAware
{
    use ArrayObjectTransform;

    /**
     * @var CustomerProfileType
     */
    protected $customerProfileType;

    /**
     * @param CustomerProfileType $customerProfileType
     */
    public function setCustomerProfileType(CustomerProfileType $customerProfileType)
    {
        $this->customerProfileType = $customerProfileType;

        if ($this instanceof Generic) {
            $this->toArrayObject($this->customerProfileType, $this->getModel());
        }
    }

    /**
     * @return CustomerProfileType
     */
    public function getCustomerProfileType()
    {
        return $this->customerProfileType;
    }
}