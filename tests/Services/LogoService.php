<?php

namespace Tests\Services;

class LogoService
{
    protected $baseUrl = "https://github.com/ciareis/bypass/blob/main";

    public function setBaseUrl(string $url)
    {
        $this->baseUrl = $url;

        return $this;
    }

    public function getLogo()
    {
        return \file_get_contents("{$this->baseUrl}/docs/img/logo.png");
    }
}
