<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:48 PM
 */

namespace Payum\AuthorizeNet\Arb\Action;

use Payum\AuthorizeNet\Arb\Request\CreateCustomerPaymentProfileRequest;
use Payum\AuthorizeNet\Arb\Request\CreateCustomerProfileRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\GatewayAwareInterface;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;
use \Payum\Core\GatewayAwareTrait;
use Payum\Core\Bridge\Spl\ArrayObject;


class CreateCustomerPaymentProfileAction implements ActionInterface, GatewayAwareInterface, ApiAwareInterface
{
    use ApiAwareTrait;
    use GatewayAwareTrait;

    /**
     * @param CreateCustomerPaymentProfileRequest $request
     *
     * @throws RequestNotSupportedException if the action dose not support the request.
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $profile = $request->getCustomerPaymentProfile();

        $profile = $this->api->createCustomerPaymentProfile($profile);

        $request->setCustomerPaymentProfile($profile);
    }

    /**
     * @param mixed $request
     *
     * @return boolean
     */
    public function supports($request)
    {
        return $request instanceof CreateCustomerPaymentProfileRequest && $request->getModel() instanceof ArrayObject;
    }

}