<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/5/18
 * Time: 12:07 AM
 */

namespace Payum\AuthorizeNet\Arb\Request\Concern;


use net\authorize\api\contract\v1\ARBSubscriptionType;
use net\authorize\api\contract\v1\CustomerPaymentProfileType;
use net\authorize\api\contract\v1\CustomerProfileType;
use Payum\AuthorizeNet\Arb\Transform\ArrayObjectTransform;
use Payum\Core\Request\Generic;

trait AuthorizeCustomerPaymentProfileTypeAware
{
    use ArrayObjectTransform;

    /**
     * @var CustomerPaymentProfileType
     */
    protected $customerPaymentProfile;

    /**
     * @param CustomerPaymentProfileType $customerPaymentProfile
     */
    public function setCustomerPaymentProfile(CustomerPaymentProfileType $customerPaymentProfile)
    {
        $this->customerPaymentProfile = $customerPaymentProfile;

        if ($this instanceof Generic) {
            $this->toArrayObject($this->customerPaymentProfile, $this->getModel());
        }
    }

    /**
     * @return CustomerPaymentProfileType
     */
    public function getCustomerPaymentProfile()
    {
        return $this->customerPaymentProfile;
    }
}