<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */
namespace Payum\AuthorizeNet\Arb\Request;

use net\authorize\api\contract\v1\CustomerProfileMaskedType;
use Payum\AuthorizeNet\Arb\Concern\AuthorizeCustomerProfileTypeAware;
use Payum\Core\Request\Generic;

class GetCustomerProfileRequest extends Generic
{
    use AuthorizeCustomerProfileTypeAware;


    /**
     * @var CustomerProfileMaskedType
     */
    private $maskedCustomerProfile;

    /**
     * @return CustomerProfileMaskedType
     */
    public function getMaskedCustomerProfile(): CustomerProfileMaskedType
    {
        return $this->maskedCustomerProfile;
    }

    /**
     * @param CustomerProfileMaskedType $maskedCustomerProfile
     * @return GetCustomerProfileRequest
     */
    public function setMaskedCustomerProfile(CustomerProfileMaskedType $maskedCustomerProfile): GetCustomerProfileRequest
    {
        $this->maskedCustomerProfile = $maskedCustomerProfile;
        return $this;
    }

}