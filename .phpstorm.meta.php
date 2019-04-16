<?php

namespace PHPSTORM_META {

    /** @noinspection PhpIllegalArrayKeyTypeInspection */
    /** @noinspection PhpUnusedLocalVariableInspection */
    $STATIC_METHOD_TYPES = [
      \Omnipay\Omnipay::create('Orangepay') => [
        'Orangepay' instanceof \Omnipay\Orangepay\Gateway,
      ],
      \Omnipay\Common\GatewayFactory::create('Orangepay') => [
        'Orangepay' instanceof \Omnipay\Orangepay\Gateway,
      ],
    ];
}
