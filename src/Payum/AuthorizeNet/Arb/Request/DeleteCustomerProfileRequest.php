<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:55 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;

use Payum\AuthorizeNet\Arb\Concern\AuthorizeCustomerProfileTypeAware;
use Payum\Core\Request\Generic;

class DeleteCustomerProfileRequest extends Generic
{
    /**
     * @var string
     */
    protected $customerProfileId;


    /**
     * @return mixed
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * @param mixed $customerProfileId
     * @return DeleteCustomerProfileRequest
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

}