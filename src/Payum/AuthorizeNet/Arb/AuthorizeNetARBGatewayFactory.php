<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/3/18
 * Time: 11:41 PM
 */

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