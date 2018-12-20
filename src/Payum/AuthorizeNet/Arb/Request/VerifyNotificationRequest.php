<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 12:56 AM
 */

namespace Payum\AuthorizeNet\Arb\Request;


use Payum\Core\Request\GetHttpRequest;

class VerifyNotificationRequest
{
    /**
     * @var GetHttpRequest
     */
    private $request;

    /**
     * @var bool
     */
    private $validated = false;

    /**
     * @var bool
     */
    private $valid = false;

    /**
     * @return GetHttpRequest
     */
    public function getRequest(): GetHttpRequest
    {
        return $this->request;
    }

    /**
     * @param GetHttpRequest $request
     * @return VerifyNotificationRequest
     */
    public function setRequest(GetHttpRequest $request): VerifyNotificationRequest
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     * @return VerifyNotificationRequest
     */
    public function setValid(bool $valid): VerifyNotificationRequest
    {
        $this->valid = $valid;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidated(): bool
    {
        return $this->validated;
    }

    /**
     * @param bool $validated
     * @return VerifyNotificationRequest
     */
    public function setValidated(bool $validated): VerifyNotificationRequest
    {
        $this->validated = $validated;
        return $this;
    }
}