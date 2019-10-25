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

class ValidateCustomerPaymentProfileRequest extends Generic
{
    use ArrayObjectTransform;

    /**
     * @var string
     */
    private $customerProfileId = '';

    /**
     * @var string
     */
    private $customerPaymentProfileId = '';

    /**
     * @var string
     */
    private $validationMode = 'testMode';

    /**
     * @var string
     */
    private $cardCode = '';

    /**
     * @return string
     */
    public function getCustomerProfileId(): string
    {
        return $this->customerProfileId;
    }

    /**
     * @param string $customerProfileId
     * @return ValidateCustomerPaymentProfileRequest
     */
    public function setCustomerProfileId(string $customerProfileId): ValidateCustomerPaymentProfileRequest
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerPaymentProfileId(): string
    {
        return $this->customerPaymentProfileId;
    }

    /**
     * @param string $customerPaymentProfileId
     * @return ValidateCustomerPaymentProfileRequest
     */
    public function setCustomerPaymentProfileId(string $customerPaymentProfileId): ValidateCustomerPaymentProfileRequest
    {
        $this->customerPaymentProfileId = $customerPaymentProfileId;
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
     * @return ValidateCustomerPaymentProfileRequest
     */
    public function setValidationMode(string $validationMode): ValidateCustomerPaymentProfileRequest
    {
        $this->validationMode = $validationMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardCode(): string
    {
        return $this->cardCode;
    }

    /**
     * @param string $cardCode
     * @return ValidateCustomerPaymentProfileRequest
     */
    public function setCardCode(string $cardCode): ValidateCustomerPaymentProfileRequest
    {
        $this->cardCode = $cardCode;
        return $this;
    }

}