<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:48 PM
 */

namespace Payum\AuthorizeNet\Arb\Action;

use net\authorize\api\contract\v1\CreateCustomerPaymentProfileResponse;
use Payum\AuthorizeNet\Arb\AuthorizeNetARBApi;
use Payum\AuthorizeNet\Arb\Request\CreateCustomerPaymentProfileRequest;
use Payum\AuthorizeNet\Arb\Request\UpdateCustomerPaymentProfileRequest;
use Payum\AuthorizeNet\Arb\Request\ValidateCustomerPaymentProfileRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\GatewayAwareInterface;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;
use \Payum\Core\GatewayAwareTrait;


class ValidateCustomerPaymentProfileAction implements ActionInterface, GatewayAwareInterface, ApiAwareInterface
{
    use ApiAwareTrait;
    use GatewayAwareTrait;

    public function __construct()
    {
        $this->apiClass = AuthorizeNetARBApi::class;
    }

    /**
     * @param ValidateCustomerPaymentProfileRequest $request
     *
     * @throws RequestNotSupportedException if the action dose not support the request.
     * @throws \Exception
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $profileId = $request->getCustomerProfileId();
        $paymentProfileId = $request->getCustomerPaymentProfileId();
        $validationMode = $request->getValidationMode();
        $cardCode = $request->getCardCode();

        /**
         * @var CreateCustomerPaymentProfileResponse $response ;
         */
        $response = $this->api->validateCustomerPaymentProfile($profileId, $paymentProfileId, $cardCode, $validationMode);

        if (\is_null($response) || ($response->getMessages()->getResultCode() != "Ok")) {
            $errorMessages = $response->getMessages()->getMessage();
            throw new \Exception($errorMessages[0]->getText());
        }
    }

    /**
     * @param mixed $request
     *
     * @return boolean
     */
    public function supports($request)
    {
        return $request instanceof ValidateCustomerPaymentProfileRequest;
    }
}