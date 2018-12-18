<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;

use Payum\AuthorizeNet\Arb\Concern\AuthorizeCustomerProfileTypeAware;
use Payum\Core\Request\Generic;

class CreateCustomerProfileRequest extends Generic
{
    use AuthorizeCustomerProfileTypeAware;

    /**
     * @var string
     */
    protected $customerProfileId;

    /**
     * @var array
     */
    protected $customerPaymentProfiles = array();

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

    /**
     * @return array
     */
    public function getCustomerPaymentProfiles(): array
    {
        return $this->customerPaymentProfiles;
    }

    /**
     * @param array $customerPaymentProfiles
     * @return CreateCustomerProfileRequest
     */
    public function setCustomerPaymentProfiles(array $customerPaymentProfiles): CreateCustomerProfileRequest
    {
        $this->customerPaymentProfiles = $customerPaymentProfiles;
        return $this;
    }

}