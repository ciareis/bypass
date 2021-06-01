<?php

namespace Tests\Services;

class LogoService
{
    protected string $baseUrl = "https://github.com/ciareis/bypass/blob/main";

    public function setBaseUrl(string $url): static
    {
        $this->baseUrl = $url;

        return $this;
    }

    public function getLogo(): bool|string
    {
        return \file_get_contents("{$this->baseUrl}/docs/img/logo.png");
    }
}
