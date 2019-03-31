<?php

namespace Omnipay\Orangepay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Response
 */
class Response extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    public function isSuccessful()
    {
        return isset($this->data['data']['charge']['attributes']['status'])
            && $this->data['data']['charge']['attributes']['status'] == "successful";
    }

    public function getTransactionReference()
    {
        if (isset($this->data['data']['charge']['id'])) {
            return $this->data['data']['charge']['id'];
        }
    }

    public function getRedirectUrl()
    {
        if (isset($this->data['data']['links']['redirect_uri'])) {
            return $this->data['data']['links']['redirect_uri'];
        }
    }
}
