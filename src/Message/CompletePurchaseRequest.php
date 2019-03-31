<?php
namespace Omnipay\Orangepay\Message;

/**
 * Complete Purchase Request
 *
 * @method Response send()
 */
class CompletePurchaseRequest extends AbstractRequest
{
    public function sendData($data)
    {
        $url = $this->getEndpoint().'?'.http_build_query($data, '', '&');
        $response = $this->httpClient->get($url, [
            'Authorization: Bearer ' . $this->getApiKey(),
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $data = json_decode($response->getBody(), true);

        return $this->createResponse($data);
    }

    public function getData()
    {
        return $data = [
            'charge_id' => $this->getTransactionId()
        ];
    }
}
