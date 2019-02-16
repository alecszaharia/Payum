<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;

use net\authorize\api\contract\v1\CustomerPaymentProfileExType;
use Payum\AuthorizeNet\Arb\Transform\ArrayObjectTransform;
use Payum\Core\Request\Generic;

class UpdateCustomerPaymentProfileRequest extends Generic
{
    use ArrayObjectTransform;

    /**
     * @var string
     */
    private $customerProfileId;


    /**
     * @var CustomerPaymentProfileExType
     */
    protected $customerPaymentProfile;

    /**
     * @param CustomerPaymentProfileExType $customerPaymentProfile
     */
    public function setCustomerPaymentProfile(CustomerPaymentProfileExType $customerPaymentProfile)
    {
        $this->customerPaymentProfile = $customerPaymentProfile;

        if ($this instanceof Generic) {
            $this->toArrayObject($this->customerPaymentProfile, $this->getModel());
        }
    }

    /**
     * @return CustomerPaymentProfileExType
     */
    public function getCustomerPaymentProfile()
    {
        return $this->customerPaymentProfile;
    }

    /**
     * @return mixed
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * @param mixed $customerProfileId
     * @return CreateCustomerProfileRequest
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }


}