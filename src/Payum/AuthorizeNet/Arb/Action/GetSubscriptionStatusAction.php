<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:49 PM
 */
namespace Payum\AuthorizeNet\Arb\Action;

use Payum\AuthorizeNet\Arb\AuthorizeNetARBApi;
use Payum\AuthorizeNet\Arb\Request\GetSubscriptionStatusRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\GatewayAwareInterface;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;
use \Payum\Core\GatewayAwareTrait;

/**
 * Class GetSubscriptionStatusAction
 */
class GetSubscriptionStatusAction implements ActionInterface, GatewayAwareInterface, ApiAwareInterface
{
    use ApiAwareTrait;
    use GatewayAwareTrait;

    public function __construct()
    {
        $this->apiClass = AuthorizeNetARBApi::class;
    }

    /**
     * @param GetSubscriptionStatusRequest $request
     *
     * @throws RequestNotSupportedException if the action dose not support the request.
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $status = $this->api->getSubscriptionStatus($request->getSubscriptionId());

        $request->setStatus($status);
    }

    /**
     * @param mixed $request
     *
     * @return boolean
     */
    public function supports($request)
    {
        return $request instanceof GetSubscriptionStatusRequest;
    }
}