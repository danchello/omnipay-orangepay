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

        var_dump($data);

        $response = $this->httpClient->request(
            'GET',
            $this->getEndpoint()."/".$data['charge_id'],
            $headers
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
}
