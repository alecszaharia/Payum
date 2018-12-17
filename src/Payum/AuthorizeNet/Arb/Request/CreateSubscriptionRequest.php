<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */
namespace Payum\AuthorizeNet\Arb\Request;

use Payum\AuthorizeNet\Arb\Concern\AuthorizeSubscriptionTypeAware;
use Payum\Core\Request\Generic;

class CreateSubscriptionRequest extends Generic
{
    use AuthorizeSubscriptionTypeAware;
}