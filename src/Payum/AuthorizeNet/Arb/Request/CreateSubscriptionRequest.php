<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */

use Concern\AuthorizeSubscriptionTypeAware;
use Payum\Core\Request\Generic;

class CreateSubscriptionRequest extends Generic
{
    use AuthorizeSubscriptionTypeAware;
}