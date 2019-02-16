<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:56 PM
 */

namespace Payum\AuthorizeNet\Arb;

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class AuthorizeNetARBApi
{
    /**
     * @var AnetAPI\MerchantAuthenticationType
     */
    private $merchantAuthentication;

    /**
     * @var bool
     */
    private $sandbox;

    /**
     * AuthorizeNetARBApi constructor.
     * @param string $login_id
     * @param string $transaction_key
     * @param bool $sandbox
     */
    public function __construct($login_id, $transaction_key, $sandbox = true)
    {
        $this->merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $this->merchantAuthentication->setName($login_id);
        $this->merchantAuthentication->setTransactionKey($transaction_key);
        $this->sandbox = $sandbox;
    }

    /**
     * @param AnetAPI\ARBSubscriptionType $subscription
     * @return AnetAPI\AnetApiResponseType
     */
    public function createSubscription(AnetAPI\ARBSubscriptionType $subscription)
    {
        $request = new AnetAPI\ARBCreateSubscriptionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscription($subscription);

        $controller = new AnetController\ARBCreateSubscriptionController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());
    }

    /**
     * @param AnetAPI\ARBGetSubscriptionListSortingType $sorting
     * @param AnetAPI\PagingType $paging
     * @return AnetAPI\AnetApiResponseType
     */
    public function getSubscriptionList(AnetAPI\ARBGetSubscriptionListSortingType $sorting, AnetAPI\PagingType $paging)
    {
        $request = new AnetAPI\ARBGetSubscriptionListRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSearchType("subscriptionInactive");
        $request->setSorting($sorting);
        $request->setPaging($paging);

        $controller = new AnetController\ARBGetSubscriptionListController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());

    }

    /**
     * @param $subscriptionId
     * @return AnetAPI\AnetApiResponseType
     */
    public function getSubscription($subscriptionId)
    {
        $request = new AnetAPI\ARBGetSubscriptionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscriptionId($subscriptionId);

        $controller = new AnetController\ARBGetSubscriptionController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());

    }

    /**
     * @param $subscriptionId
     * @return AnetAPI\AnetApiResponseType
     */
    public function getSubscriptionStatus($subscriptionId)
    {
        $request = new AnetAPI\ARBGetSubscriptionStatusRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscriptionId($subscriptionId);

        $controller = new AnetController\ARBGetSubscriptionStatusController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());


    }

    /**
     * @param $subscriptionId
     * @param AnetAPI\ARBSubscriptionType $subscriptionPartial
     * @return AnetAPI\AnetApiResponseType
     */
    public function updateSubscription($subscriptionId, AnetAPI\ARBSubscriptionType $subscriptionPartial)
    {
        $request = new AnetAPI\ARBUpdateSubscriptionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscriptionId($subscriptionId);
        $request->setSubscription($subscriptionPartial);

        $controller = new AnetController\ARBUpdateSubscriptionController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());


    }


    /**
     * @param $subscriptionId
     * @return AnetAPI\AnetApiResponseType
     */
    public function cancelSubscription($subscriptionId)
    {
        $request = new AnetAPI\ARBCancelSubscriptionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscriptionId($subscriptionId);

        $controller = new AnetController\ARBCancelSubscriptionController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());

    }


    /**
     * @param AnetAPI\CustomerProfileType $customerProfileType
     * @return AnetAPI\AnetApiResponseType
     */
    public function createCustomerProfile(AnetAPI\CustomerProfileType $customerProfileType)
    {
        $request = new AnetAPI\CreateCustomerProfileRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setProfile($customerProfileType);

        $controller = new AnetController\CreateCustomerProfileController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());

    }


    /**
     * @param $customerProfileId
     * @return AnetAPI\AnetApiResponseType
     */
    public function getCustomerProfile($customerProfileId)
    {
        $request = new AnetAPI\GetCustomerProfileRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setCustomerProfileId($customerProfileId);

        $controller = new AnetController\GetCustomerProfileController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());

    }

    /**
     * @param $profileId
     * @return AnetAPI\AnetApiResponseType
     */
    public function deleteCustomerProfile($profileId)
    {
        $request = new AnetAPI\DeleteCustomerProfileRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setCustomerProfileId($profileId);

        $controller = new AnetController\DeleteCustomerProfileController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());

    }

    /**
     * @param AnetAPI\CustomerPaymentProfileType $paymentProfileType
     * @return AnetAPI\AnetApiResponseType+
     */
    public function createCustomerPaymentProfile(AnetAPI\CustomerPaymentProfileType $paymentProfileType)
    {
        $request = new AnetAPI\CreateCustomerPaymentProfileRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setPaymentProfile($paymentProfileType);

        $controller = new AnetController\CreateCustomerPaymentProfileController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());

    }

    /**
     * @param AnetAPI\CustomerPaymentProfileExType $paymentProfileType
     * @return AnetAPI\AnetApiResponseType
     */
    public function updateCustomerPaymentProfile(AnetAPI\CustomerPaymentProfileExType $paymentProfileType)
    {
        $request = new AnetAPI\UpdateCustomerPaymentProfileRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setCustomerProfileId($paymentProfileType->getCustomerPaymentProfileId());
        $request->setPaymentProfile($paymentProfileType);

        $controller = new AnetController\UpdateCustomerPaymentProfileController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());

    }

    /**
     * @param $customerProfileId
     * @param $customerPaymentProfileId
     * @param string $validationmode
     * @return AnetAPI\AnetApiResponseType
     */
    public function validateCustomerPaymentProfile($customerProfileId, $customerPaymentProfileId, $validationmode = "testMode")
    {
        $request = new AnetAPI\ValidateCustomerPaymentProfileRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setCustomerProfileId($customerProfileId);
        $request->setCustomerPaymentProfileId($customerPaymentProfileId);
        $request->setValidationMode($validationmode);

        $controller = new AnetController\ValidateCustomerPaymentProfileController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());
    }


    /**
     * @param $customerProfileId
     * @param $customerPaymentProfileId
     * @return AnetAPI\AnetApiResponseType
     */
    public function getCustomerPaymentProfile($customerProfileId, $customerPaymentProfileId)
    {
        $request = new AnetAPI\GetCustomerPaymentProfileRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setCustomerProfileId($customerProfileId);
        $request->setCustomerPaymentProfileId($customerPaymentProfileId);

        $controller = new AnetController\GetCustomerPaymentProfileController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());
    }


    /**
     * @param AnetAPI\TransactionRequestType $transaction
     * @return AnetAPI\AnetApiResponseType
     */
    public function createTransaction(AnetAPI\TransactionRequestType $transaction)
    {
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setTransactionRequest($transaction);

        $controller = new AnetController\CreateTransactionController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());
    }

    /**
     * @param $transactionId
     * @return AnetAPI\AnetApiResponseType
     */
    public function getTransactionDetails($transactionId)
    {
        $request = new AnetAPI\GetTransactionDetailsRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setTransId($transactionId);

        $controller = new AnetController\GetTransactionDetailsController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());
    }

    /**
     * @param $transactionId
     * @return AnetAPI\AnetApiResponseType
     */
    public function voidTransaction($transactionId)
    {
        $transactionRequest = new AnetAPI\TransactionRequestType();
        $transactionRequest->setTransactionType("voidTransaction");
        $transactionRequest->setRefTransId($transactionId);

        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setTransactionRequest($transactionRequest);

        $controller = new AnetController\CreateTransactionController($request);

        return $controller->executeWithApiResponse($this->getEnvironmentUri());
    }


    /**
     * @return string
     */
    private function getEnvironmentUri()
    {
        if ($this->sandbox)
            return \net\authorize\api\constants\ANetEnvironment::SANDBOX;

        return \net\authorize\api\constants\ANetEnvironment::PRODUCTION;
    }

    private function generateRefId()
    {
        return 'ref' . time();
    }
}