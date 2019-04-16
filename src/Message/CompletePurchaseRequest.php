<?php
namespace Omnipay\Orangepay\Message;

/**
 * Complete Purchase Request
 *
 * @method Response send()
 */
class CompletePurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        return $data = [
            'charge_id' => $this->getChargeId()
        ];
    }

    public function sendData($data)
    {
        $headers = [
            'Authorization' => 'Bearer ' .$this->getApiKey(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];

        $response = $this->httpClient->request(
            'GET',
            $this->getEndpoint()."/".$data['charge_id'],
            $headers
        );

        $data = json_decode($response->getBody()->getContents(), true);

        return $this->createResponse($data);
    }
}
