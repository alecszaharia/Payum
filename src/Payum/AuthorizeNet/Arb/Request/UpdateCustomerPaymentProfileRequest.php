<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;

use net\authorize\api\contract\v1\CustomerPaymentProfileExType;
use net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType;
use Payum\AuthorizeNet\Arb\Transform\ArrayObjectTransform;
use Payum\Core\Request\Generic;
use net\authorize\api\contract\v1 as AnetAPI;

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
     * @return UpdateCustomerPaymentProfileRequest
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

    public function getCustomerPaymentProfileAsExType()
    {
        $billto = $this->getCustomerPaymentProfile()->getBillTo();

        $maskedCard = $this->getCustomerPaymentProfile()->getPayment()->getCreditCard();
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($maskedCard->getCardNumber());
        $creditCard->setExpirationDate($maskedCard->getExpirationDate());

        $paymentCreditCard = new AnetAPI\PaymentType();
        $paymentCreditCard->setCreditCard($creditCard);

        $paymentprofile = new AnetAPI\CustomerPaymentProfileExType();
        $paymentprofile->setBillTo($billto);
        $paymentprofile->setPayment($paymentCreditCard);
        $paymentprofile->setCustomerPaymentProfileId($this->getCustomerPaymentProfile()->getCustomerPaymentProfileId());

        return $paymentprofile;
    }

}