<?php

namespace Openphp\JdDj\Tests;

use Openphp\JdDj\Appaction;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string[]
     */
    protected $config = [
        'url'       => 'https://openo2o.jd.com/djapi',
        'app_key'   => '66012d001c8e46deb178d85d4ff9ce9d',
        'appSecret' => '1da6c434d91148f7966ce64ed6093c97',
        'token'     => 'fdc58d7f-bedf-4660-988e-79b303268534',
    ];

    /**
     * @return Appaction
     */
    public function getAppaction()
    {
        return new Appaction($this->config);
    }
}