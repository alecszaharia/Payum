<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;

use net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType;
use Payum\AuthorizeNet\Arb\Concern\AuthorizeCustomerPaymentProfileTypeAware;
use Payum\AuthorizeNet\Arb\Transform\ArrayObjectTransform;
use Payum\Core\Request\Generic;

class GetCustomerPaymentProfileRequest extends Generic
{
    use ArrayObjectTransform;

    /**
     * @var string
     */
    private $customerPaymentProfileId;

    /**
     * @var string
     */
    private $customerProfileId;


    /**
     * @var CustomerPaymentProfileMaskedType
     */
    protected $customerPaymentProfile;

    /**
     * @param CustomerPaymentProfileMaskedType $customerPaymentProfile
     */
    public function setCustomerPaymentProfile(CustomerPaymentProfileMaskedType $customerPaymentProfile)
    {
        $this->customerPaymentProfile = $customerPaymentProfile;

        if ($this instanceof Generic) {
            $this->toArrayObject($this->customerPaymentProfile, $this->getModel());
        }
    }

    /**
     * @return CustomerPaymentProfileMaskedType
     */
    public function getCustomerPaymentProfile()
    {
        return $this->customerPaymentProfile;
    }

    /**
     * @return string
     */
    public function getCustomerPaymentProfileId()
    {
        return $this->customerPaymentProfileId;
    }

    /**
     * @param $customerPaymentProfileId
     * @return $this
     */
    public function setCustomerPaymentProfileId($customerPaymentProfileId)
    {
        $this->customerPaymentProfileId = $customerPaymentProfileId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerProfileId(): string
    {
        return $this->customerProfileId;
    }

    /**
     * @param string $customerProfileId
     * @return GetCustomerPaymentProfileRequest
     */
    public function setCustomerProfileId(string $customerProfileId): GetCustomerPaymentProfileRequest
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }
}