<?php

namespace Omnipay\Orangepay\Message;

use GuzzleHttp\Psr7\Request;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    const CHARGE_ENDPOINT = "https://o-payments.com/api/charges";

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

    public function getChargeId()
    {
        return $this->getParameter('chargeId');
    }

    public function setChargeId($value)
    {
        return $this->setParameter('chargeId', $value);
    }

    public function sendData($data)
    {
        $headers = [
            'Authorization' => 'Bearer ' .$this->getApiKey(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];

        $response = $this->httpClient->request(
            'POST',
            $this->getEndpoint(),
            $headers,
            json_encode($data)
        );

        /*   $client = new \GuzzleHttp\Client(['base_uri' => 'https://o-payments.com/']);

           $request = new Request('POST', '/api/charges', [
               'Authorization' => 'Bearer ' .$this->getApiKey(),
               'Content-Type' => 'application/json',
               'Accept' => 'application/json'
           ], json_encode($data));

           $response = $client->send($request, ['debug' => true, 'headers' => $headers]);

           echo json_encode($data);
           die;*/

        $data = json_decode($response->getBody()->getContents(), true);

        return $this->createResponse($data);
    }

    protected function getBaseData()
    {
        return [
            'language' => app()->getLocale(),
        ];
    }

    public function getMessage()
    {
        isset($this->data['data']['charge']['attributes']['failure']) ?
            $this->data['data']['charge']['attributes']['failure'] : null;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }

    public function getEndpoint()
    {
        return $this->getApiUrl();
    }
}
