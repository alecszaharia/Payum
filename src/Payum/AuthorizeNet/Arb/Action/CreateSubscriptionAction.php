<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:48 PM
 */

namespace Payum\AuthorizeNet\Arb\Action;

use net\authorize\api\contract\v1\ARBCreateSubscriptionResponse;
use Payum\AuthorizeNet\Arb\AuthorizeNetARBApi;
use Payum\AuthorizeNet\Arb\Request\CreateSubscriptionRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\GatewayAwareInterface;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;
use \Payum\Core\GatewayAwareTrait;
use Payum\Core\Bridge\Spl\ArrayObject;


class CreateSubscriptionAction implements ActionInterface, GatewayAwareInterface, ApiAwareInterface
{
    use ApiAwareTrait;
    use GatewayAwareTrait;

    public function __construct()
    {
        $this->apiClass = AuthorizeNetARBApi::class;
    }

    /**
     * @param CreateSubscriptionRequest $request
     * @throws \Exception
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $subscription = $request->getSubscription();

        /**
         * @var ARBCreateSubscriptionResponse $response ;
         */
        $response = $this->api->createSubscription($subscription);

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            $request->setSubscriptionId($response->getSubscriptionId());
        } else {
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
        return $request instanceof CreateSubscriptionRequest && $request->getModel() instanceof ArrayObject;
    }

}