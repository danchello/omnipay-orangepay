<?php

namespace PHPSTORM_META {

    /** @noinspection PhpIllegalArrayKeyTypeInspection */
    /** @noinspection PhpUnusedLocalVariableInspection */
    $STATIC_METHOD_TYPES = [
      \Omnipay\Omnipay::create('') => [
        'Orangepay' instanceof \Omnipay\Orangepay\OrangepayGateway,
      ],
      \Omnipay\Common\GatewayFactory::create('') => [
        'Orangepay' instanceof \Omnipay\Orangepay\OrangepayGateway,
      ],
    ];
}
