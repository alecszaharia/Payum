<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */
namespace Payum\AuthorizeNet\Arb\Request;

use Payum\AuthorizeNet\Arb\Request\Concern\AuthorizeCustomerPaymentProfileTypeAware;
use Payum\Core\Request\Generic;

class CreateCustomerPaymentProfileRequest extends Generic
{
    use AuthorizeCustomerPaymentProfileTypeAware;
}