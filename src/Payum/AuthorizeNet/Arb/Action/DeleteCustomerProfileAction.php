<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:48 PM
 */

namespace Payum\AuthorizeNet\Arb\Action;

use net\authorize\api\contract\v1\GetCustomerProfileResponse;
use net\authorize\api\contract\v1\SubscriptionDetailType;
use Payum\AuthorizeNet\Arb\AuthorizeNetARBApi;
use Payum\AuthorizeNet\Arb\Request\DeleteCustomerProfileRequest;
use Payum\AuthorizeNet\Arb\Request\GetCustomerProfileRequest;
use Payum\AuthorizeNet\Arb\Request\GetSubscriptionRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\GatewayAwareInterface;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;
use \Payum\Core\GatewayAwareTrait;

class DeleteCustomerProfileAction implements ActionInterface, ApiAwareInterface
{
    use ApiAwareTrait;

    public function __construct()
    {
        $this->apiClass = AuthorizeNetARBApi::class;
    }

    /**
     * @param mixed $request
     * @throws \Exception
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $customerProfileId = $request->getCustomerProfileId();

        /**
         * @var GetCustomerProfileResponse $response ;
         */
        $response = $this->api->deleteCustomerProfile($customerProfileId);

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            // do nothing
        } else {
            $errorMessages = $response->getMessages()->getMessage();
            throw new \Exception($errorMessages[0]->getText());
        }
    }

    /**
     * @param DeleteCustomerProfileRequest $request
     *
     * @return boolean
     */
    public function supports($request)
    {
        return $request instanceof DeleteCustomerProfileRequest && $request->getCustomerProfileId();
    }
}