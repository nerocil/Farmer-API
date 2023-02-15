<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
    public function hosts()
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
            'https://www.farmer.wiampro.co.tz',
            'https://farmer.wiampro.co.tz',
            'https://farmer-api.wiampro.co.tz',
            'https://www.farmer-api.wiampro.co.tz',
        ];
    }
}
