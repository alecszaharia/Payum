<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/26/18
 * Time: 12:27 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;

use net\authorize\api\contract\v1\TransactionDetailsType;
use Payum\Core\Request\Generic;

class GetTransactionDetailsRequest
{

    /**
     * @var string
     */
    private $transactionId;

    /**
     * @var TransactionDetailsType
     */
    private $transaction;

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return GetTransactionDetailsRequest
     */
    public function setTransactionId(string $transactionId): GetTransactionDetailsRequest
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return TransactionDetailsType
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param TransactionDetailsType $transaction
     * @return GetTransactionDetailsRequest
     */
    public function setTransaction(TransactionDetailsType $transaction): GetTransactionDetailsRequest
    {
        $this->transaction = $transaction;
        return $this;
    }


}

