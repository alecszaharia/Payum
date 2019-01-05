<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:48 PM
 */

namespace Payum\AuthorizeNet\Arb\Action;

use Payum\AuthorizeNet\Arb\AuthorizeNetARBApi;
use Payum\AuthorizeNet\Arb\Request\CancelSubscriptionRequest;
use Payum\AuthorizeNet\Arb\Request\VoidTransactionRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\GatewayAwareInterface;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;
use \Payum\Core\GatewayAwareTrait;

class VoidTransactionAction implements ActionInterface, ApiAwareInterface
{
    use ApiAwareTrait;

    /**
     * CancelSubscriptionAction constructor.
     */
    public function __construct()
    {
        $this->apiClass = AuthorizeNetARBApi::class;
    }

    /**
     * @param VoidTransactionRequest $request
     *
     * @throws RequestNotSupportedException if the action dose not support the request.
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);
        $getTransactionId = $request->getTransactionId();
        $this->api->voidTransaction($getTransactionId);
    }

    /**
     * @param mixed $request
     *
     * @return boolean
     */
    public function supports($request)
    {
        return $request instanceof VoidTransactionRequest && $request->getTransactionId();
    }
}