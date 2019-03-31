<?php

namespace Omnipay\Orangepay;

use Omnipay\Common\AbstractGateway;

/**
 * Omnipay Gateway
 * initialize, purchase, completePurchase
 *  $gateway->refund([
'transactionReference' => $attendee->order->transaction_id,
'amount'               => $refund_amount,
'refundApplicationFee' => false,
]);
 */
class OrangepayGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Orangepay';
    }

    public function getDefaultParameters()
    {
        return array(
            'apiKey' => '',
            'apiUrl' => '',
        );
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    public function getApiUrl()
    {
        return $this->getParameter('apiUrl');
    }

    public function setApiUrl($value)
    {
        return $this->setParameter('apiUrl', $value);
    }

    /**
     * @return Message\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Orangepay\Message\AuthorizeRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PurchaseRequest', $parameters);
    }
}
