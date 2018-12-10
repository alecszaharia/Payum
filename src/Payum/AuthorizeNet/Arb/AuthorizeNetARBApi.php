<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:56 PM
 */

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
     */
    public function createSubscription(AnetAPI\ARBSubscriptionType $subscription)
    {
        $request = new AnetAPI\ARBCreateSubscriptionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscription($subscription);

        $controller = new AnetController\ARBCreateSubscriptionController($request);

        $response = $controller->executeWithApiResponse($this->getEnvironmentUri());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            //echo "SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "\n";
        } else {
            //echo "ERROR :  Invalid response\n";
            //$errorMessages = $response->getMessages()-f>getMessage();
            //echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
    }

    /**
     * @param AnetAPI\ARBGetSubscriptionListSortingType $sorting
     * @param AnetAPI\PagingType $paging
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

        $response = $controller->executeWithApiResponse($this->getEnvironmentUri());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
//            foreach ($response->getSubscriptionDetails() as $subscriptionDetails) {
//                echo "Subscription ID: " . $subscriptionDetails->getId() . "\n";
//            }
        } else {
            //echo "ERROR :  Invalid response\n";
            //$errorMessages = $response->getMessages()-f>getMessage();
            //echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
    }

    /**
     * @param string $subscriptionId
     */
    public function getSubscription($subscriptionId)
    {
        $request = new AnetAPI\ARBGetSubscriptionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscriptionId($subscriptionId);

        $controller = new AnetController\ARBGetSubscriptionController($request);

        $response = $controller->executeWithApiResponse($this->getEnvironmentUri());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            //echo "SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "\n";
        } else {
            //echo "ERROR :  Invalid response\n";
            //$errorMessages = $response->getMessages()-f>getMessage();
            //echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
    }

    /**
     * @param string $subscriptionId
     */
    public function getSubscriptionStatus($subscriptionId)
    {
        $request = new AnetAPI\ARBGetSubscriptionStatusRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscriptionId($subscriptionId);

        $controller = new AnetController\ARBGetSubscriptionStatusController($request);

        $response = $controller->executeWithApiResponse($this->getEnvironmentUri());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            // $response->getStatus()
        } else {
            //echo "ERROR :  Invalid response\n";
            //$errorMessages = $response->getMessages()-f>getMessage();
            //echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
    }

    /**
     * @param $subscriptionId
     * @param AnetAPI\ARBSubscriptionType $subscriptionPartial
     */
    public function updateSubscription($subscriptionId, AnetAPI\ARBSubscriptionType $subscriptionPartial)
    {
        $request = new AnetAPI\ARBUpdateSubscriptionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscriptionId($subscriptionId);
        $request->setSubscription($subscriptionPartial);

        $controller = new AnetController\ARBUpdateSubscriptionController($request);

        $response = $controller->executeWithApiResponse($this->getEnvironmentUri());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            //echo "SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "\n";
        } else {
            //echo "ERROR :  Invalid response\n";
            //$errorMessages = $response->getMessages()-f>getMessage();
            //echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
    }


    /**
     * @param string $subscriptionId
     */
    public function cancelSubscription($subscriptionId)
    {
        $request = new AnetAPI\ARBCancelSubscriptionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($this->generateRefId());
        $request->setSubscriptionId($subscriptionId);

        $controller = new AnetController\ARBCancelSubscriptionController($request);

        $response = $controller->executeWithApiResponse($this->getEnvironmentUri());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            //echo "SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "\n";
        } else {
            //echo "ERROR :  Invalid response\n";
            //$errorMessages = $response->getMessages()-f>getMessage();
            //echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
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