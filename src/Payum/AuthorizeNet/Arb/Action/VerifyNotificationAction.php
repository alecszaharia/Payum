<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:49 PM
 */

namespace Payum\AuthorizeNet\Arb\Action;

use Payum\AuthorizeNet\Arb\AuthorizeNetARBApi;
use Payum\AuthorizeNet\Arb\Request\HandleNotificationRequest;
use Payum\AuthorizeNet\Arb\Request\UpdateSubscriptionRequest;
use Payum\AuthorizeNet\Arb\Request\VerifyNotificationRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\GatewayAwareInterface;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;
use \Payum\Core\GatewayAwareTrait;
use Payum\Core\Model\ArrayObject;
use Payum\Core\Request\GetHttpRequest;

class VerifyNotificationAction implements ActionInterface, GatewayAwareInterface, ApiAwareInterface
{
    use ApiAwareTrait;
    use GatewayAwareTrait;

    public function __construct()
    {
        $this->apiClass = AuthorizeNetARBApi::class;
    }

    /**
     * @param VerifyNotificationRequest $request
     *
     * @throws RequestNotSupportedException if the action dose not support the request.
     */
    public function execute($request)
    {
        $getHttpRequest = $request->getRequest();
        $signatureKey = $request->getSignatureKey();
        $headerHash = \substr($getHttpRequest->headers['x-anet-signature'][0],7);
        $bodyHash = hash_hmac("sha512", $getHttpRequest->content, $signatureKey);
        $request->setValid(hash_equals($headerHash, \strtoupper($bodyHash)));
    }

    /**
     * @param mixed $request
     *
     * @return boolean
     */
    public function supports($request)
    {
        return $request instanceof VerifyNotificationRequest && !$request->isValid() && $request->getRequest() instanceof GetHttpRequest;
    }
}