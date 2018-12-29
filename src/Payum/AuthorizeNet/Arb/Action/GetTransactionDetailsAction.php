<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:48 PM
 */

namespace Payum\AuthorizeNet\Arb\Action;

use net\authorize\api\contract\v1\GetTransactionDetailsResponse;
use Payum\AuthorizeNet\Arb\AuthorizeNetARBApi;
use Payum\AuthorizeNet\Arb\Request\GetTransactionDetailsRequest;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use \Payum\Core\ApiAwareInterface;
use \Payum\Core\ApiAwareTrait;

class GetTransactionDetailsAction implements ActionInterface, ApiAwareInterface
{
    use ApiAwareTrait;

    public function __construct()
    {
        $this->apiClass = AuthorizeNetARBApi::class;
    }

    /**
     * @param GetTransactionDetailsRequest $request
     *
     * @throws RequestNotSupportedException if the action dose not support the request.
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        /**
         * @var GetTransactionDetailsResponse $transactionResponse ;
         */
        $transactionId = $request->getTransactionId();

        $transactionResponse = $this->api->getTransactionDetails($transactionId);

        if (($transactionResponse != null) && ($transactionResponse->getMessages()->getResultCode() == "Ok")) {
            $request->setTransaction($transactionResponse->getTransaction());
        } else {
            $errorMessages = $transactionResponse->getMessages()->getMessage();
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
        return $request instanceof GetTransactionDetailsRequest && $request->getTransactionId();
    }
}