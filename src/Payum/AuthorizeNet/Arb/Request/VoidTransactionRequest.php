<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:56 AM
 */
namespace Payum\AuthorizeNet\Arb\Request;


class VoidTransactionRequest
{
    /**
     * @var string
     */
    private $transactionId;

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return self
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

}