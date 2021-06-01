<?php

namespace Tests\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class GithubRepoService
{
    protected string $baseUrl = "https://api.github.com";

    public function setBaseUrl(string $url): static
    {
        $this->baseUrl = $url;

        return $this;
    }

    public function getTotalStargazersByUser(string $username)
    {
        $url = "{$this->baseUrl}/users/${username}/repos";

        try {
            $response = Http::get($url);
        } catch (Exception $e) {
            return "Server down.";
        }

        if ($response->status() === 503) {
            return "Server unavailable.";
        }

        return collect($response->json())
            ->sum('stargazers_count');
    }
}
