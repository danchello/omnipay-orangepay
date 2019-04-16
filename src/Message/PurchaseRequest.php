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
        $this->setTestMode(true);

        $this->validate('amount');
        $data = $this->getBaseData();

        //$data['reference_id'] = $this->getTransactionId();
        $data['amount'] =  $this->getAmount();
        $data['return_error_url'] = $this->getCancelUrl();
        $data['return_success_url'] = $this->getReturnUrl();

        return $data;
    }

    public function getBaseData()
    {
        $data = parent::getBaseData();

        $data = $data + [
                'currency'     => 'EUR',
                'pay_method'   => 'card',
                'description'  => 'The Great Modernists ticket purchase',
                'email'        => 'info@modernists.lv'
            ];

        return $data;
    }
}
