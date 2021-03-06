<?php
/**
 * PM Proxy Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
return [
    'mcproxy' => [
        /**
         * PM Proxy base URI
         */
        'base_uri' => 'http://mco01.puppet.mbs:3000/',

        /**
         * Http client options
         *
         * See http://framework.zend.com/manual/2.3/en/modules/zend.http.client.html#configuration
         */
        //'http_options' => [
        //    'adapter' => 'Zend\Http\Client\Adapter\Socket',
        //],
    ],
];