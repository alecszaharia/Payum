<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:48 PM
 */

namespace Payum\AuthorizeNet\Arb\Action;

use net\authorize\api\contract\v1\GetCustomerPaymentProfileResponse;
use net\authorize\api\contract\v1\SubscriptionDetailType;
use Payum\AuthorizeNet\Arb\AuthorizeNetARBApi;
use Payum\AuthorizeNet\Arb\Request\GetCustomerPaymentProfileRequest;
use Payum\AuthorizeNet\Arb\Request\GetCustomerProfileRequest;
use Payum\AuthorizeNet\Arb\Request\GetSubscriptionRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\GatewayAwareInterface;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;
use \Payum\Core\GatewayAwareTrait;
use Payum\Core\Model\ArrayObject;

class GetCustomerPaymentProfileAction implements ActionInterface, GatewayAwareInterface, ApiAwareInterface
{
    use ApiAwareTrait;
    use GatewayAwareTrait;

    public function __construct()
    {
        $this->apiClass = AuthorizeNetARBApi::class;
    }

    /**
     * @param GetCustomerPaymentProfileRequest $request
     *
     * @throws RequestNotSupportedException if the action dose not support the request.
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $customerPaymentProfileId = $request->getCustomerPaymentProfileId();
        $customerProfileId = $request->getCustomerProfileId();

        /**
         * @var GetCustomerPaymentProfileResponse $response ;
         */
        $response = $this->api->getCustomerPaymentProfile($customerProfileId, $customerPaymentProfileId);

        $request->setCustomerPaymentProfile($response->getPaymentProfile());
    }

    /**
     * @param mixed $request
     *
     * @return boolean
     */
    public function supports($request)
    {
        return $request instanceof GetCustomerPaymentProfileRequest && $request->getModel() instanceof ArrayObject;
    }
}