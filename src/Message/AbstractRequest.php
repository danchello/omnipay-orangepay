<?php

namespace Omnipay\Orangepay\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    const CHARGE_ENDPOINT = "https://o-payments.com/api/charges";

    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    public function sendData($data)
    {
        $response = $this->httpClient->post($this->getEndpoint(), [
            'Authorization: Bearer ' . $this->getApiKey(),
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $data = json_decode($response->getBody(), true);

        return $this->createResponse($data);
    }

    protected function getBaseData()
    {
        return [
            'currency'     => 'EUR',
            'pay_method'   => 'card',
            'description'  => 'The Great Modernists ticket purchase',
            'email'        => 'info@modernists.lv',
            //'language' => '',
        ];
    }

    public function getMessage()
    {
        return isset($this->data['data']['charge']['attributes']['failure']) ?
            $this->data['data']['charge']['attributes']['failure'] : null;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }

    public function getEndpoint()
    {
        return self::CHARGE_ENDPOINT; //$this->getApiUrl();
    }
}
