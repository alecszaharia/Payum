<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;

use Payum\AuthorizeNet\Arb\Concern\AuthorizeCustomerPaymentProfileTypeAware;
use Payum\Core\Request\Generic;

class CreateCustomerPaymentProfileRequest extends Generic
{
    use AuthorizeCustomerPaymentProfileTypeAware;

    /**
     * @var string
     */
    private $customerPaymentProfileId;


    /**
     * @var string
     */
    private $customerProfileId;

    /**
     * @var string
     */
    private $validationMode = null;

    /**
     * @return mixed
     */
    public function getCustomerPaymentProfileId()
    {
        return $this->customerPaymentProfileId;
    }

    /**
     * @param mixed $customerPaymentProfileId
     * @return CreateCustomerPaymentProfileRequest
     */
    public function setCustomerPaymentProfileId($customerPaymentProfileId)
    {
        $this->customerPaymentProfileId = $customerPaymentProfileId;
        return $this;
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

    /**
     * @return string
     */
    public function getValidationMode(): string
    {
        return $this->validationMode;
    }

    /**
     * @param string $validationMode
     * @return CreateCustomerPaymentProfileRequest
     */
    public function setValidationMode(string $validationMode): CreateCustomerPaymentProfileRequest
    {
        $this->validationMode = $validationMode;
        return $this;
    }

}