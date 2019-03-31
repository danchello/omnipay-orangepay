<?php
namespace Omnipay\Orangepay\Message;
/**
 * Purchase Request
 *
 * @method Response send()
 */
class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount');
        $data = $this->getBaseData();

        $data['reference_id'] = $this->getTransactionId();
        $data['amount'] =  $this->getAmount();


        //return_success_url
        //return_error_url
        //callback_url
        //$data['LANDINGPAGE'] = $this->getLandingPage();
        //$data['RETURNURL'] = $this->getReturnUrl();
       // $data['CANCELURL'] = $this->getCancelUrl();


        return $data;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }

    public function getMessage()
    {
        return isset($this->data['data']['charge']['attributes']['failure']) ? $this->data['data']['charge']['attributes']['failure'] : null;
    }
}
