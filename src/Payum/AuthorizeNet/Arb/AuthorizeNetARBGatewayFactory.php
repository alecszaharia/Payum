<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:41 PM
 */

namespace Payum\AuthorizeNet\Arb;

use Payum\AuthorizeNet\Arb\Action\CancelSubscriptionAction;
use Payum\AuthorizeNet\Arb\Action\CreateCustomerPaymentProfileAction;
use Payum\AuthorizeNet\Arb\Action\CreateCustomerProfileAction;
use Payum\AuthorizeNet\Arb\Action\CreateSubscriptionAction;
use Payum\AuthorizeNet\Arb\Action\DeleteCustomerProfileAction;
use Payum\AuthorizeNet\Arb\Action\GetCustomerPaymentProfileAction;
use Payum\AuthorizeNet\Arb\Action\GetCustomerProfileAction;
use Payum\AuthorizeNet\Arb\Action\GetSubscriptionAction;
use Payum\AuthorizeNet\Arb\Action\GetSubscriptionListAction;
use Payum\AuthorizeNet\Arb\Action\GetSubscriptionStatusAction;
use Payum\AuthorizeNet\Arb\Action\GetTransactionDetailsAction;
use Payum\AuthorizeNet\Arb\Action\UpdateSubscriptionAction;
use Payum\AuthorizeNet\Arb\Action\VerifyNotificationAction;
use Payum\AuthorizeNet\Arb\Request\CreateCustomerProfileRequest;
use Payum\Core\GatewayFactory;
use Payum\Core\Bridge\Spl\ArrayObject;

class AuthorizeNetARBGatewayFactory extends GatewayFactory
{
    /**
     * {@inheritDoc}
     */
    protected function populateConfig(ArrayObject $config)
    {
        if (!class_exists(\AuthorizeNetAIM::class)) {
            throw new \LogicException('You must install "authorizenet/authorizenet" library.');
        }

        $config->defaults(array(
            'payum.factory_name' => 'authorize_net_arb',
            'payum.factory_title' => 'Authorize.NET ARB',

            'payum.action.create_subscription' => new CreateSubscriptionAction(),
            'payum.action.cancel_subscription' => new CancelSubscriptionAction(),
            'payum.action.subscription' => new GetSubscriptionAction(),
            'payum.action.subscription_list' => new GetSubscriptionListAction(),
            'payum.action.subscription_status' => new GetSubscriptionStatusAction(),
            'payum.action.update_subscription' => new UpdateSubscriptionAction(),
            'payum.action.create_customer_profile' => new CreateCustomerProfileAction(),
            'payum.action.create_customer_payment_profile' => new CreateCustomerPaymentProfileAction(),
            'payum.action.get_customer_profile' => new GetCustomerProfileAction(),
            'payum.action.get_customer_payment_profile' => new GetCustomerPaymentProfileAction(),
            'payum.action.verify_notification_request' => new VerifyNotificationAction(),
            'payum.action.get_transaction_details' => new GetTransactionDetailsAction(),
            'payum.action.delete_customer_profile' => new DeleteCustomerProfileAction(),
        ));

        if (false == $config['payum.api']) {
            $config['payum.default_options'] = array(
                'login_id' => '',
                'transaction_key' => '',
                'sandbox' => true,
            );
            $config->defaults($config['payum.default_options']);
            $config['payum.required_options'] = array('login_id', 'transaction_key');
            $config['payum.api'] = function (ArrayObject $config) {
                $config->validateNotEmpty($config['payum.required_options']);
                return new AuthorizeNetARBApi($config['login_id'], $config['transaction_key'], $config['sandbox']);
            };
        }
    }
}