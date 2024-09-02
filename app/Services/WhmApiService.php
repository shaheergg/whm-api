<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhmApiService
{
    protected $whm_host;
    protected $whm_api_token;
    protected $whm_port;
    protected $whm_api_version;
    protected $whm_username;
    protected $whm_password;

    public function __construct()
    {
        $this->whm_host = config('whm.whm_host');
        $this->whm_api_token = config('whm.whm_api_token');
        $this->whm_port = config('whm.whm_port');
        $this->whm_api_version = 1;
        $this->whm_password = config('whm.whm_password');
        $this->whm_username = config('whm.whm_username');
    }

    public function getAppList($function)
    {
        $response = Http::withHeaders([
            'Authorization' => 'whm ' . $this->whm_username . ':' . $this->whm_api_token
        ])->get("{$this->whm_host}:{$this->whm_port}/json-api/{$function}?api.version={$this->whm_api_version}");

        if ($response->successful()) {
            return $response->json();
        }
        throw new \Exception('Failed to get services status');
    }

    public function changePassword()
    {
        $response = Http::withHeaders([
            'Authorization' => 'whm ' . $this->whm_username . ':' . $this->whm_api_token
        ])->get("{$this->whm_host}:{$this->whm_port}/json-api/passwd?api.version={$this->whm_api_version}&user=jasuhreer&password=randompassword12234");

        if ($response->successful()) {
            return $response->json();
        }
        throw new \Exception('Failed to change password');
    }
}
