<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */
namespace Payum\AuthorizeNet\Arb\Request;

use Payum\AuthorizeNet\Arb\Request\Concern\AuthorizeCustomerProfileTypeAware;
use Payum\Core\Request\Generic;

class GetCustomerProfileRequest extends Generic
{
    use AuthorizeCustomerProfileTypeAware;

    /**
     * @var string
     */
    private $customerProfileId;


    /**
     * @return string
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * @param $customerProfileId
     * @return $this
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }
}