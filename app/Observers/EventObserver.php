<?php

namespace App\Observers;
use App\Models\Event;

use AcmePhp\Core\AcmeClient;
use AcmePhp\Core\Challenge\HttpChallenge;
use AcmePhp\Core\Challenge\SolverInterface;
use AcmePhp\Core\Protocol\AuthorizationChallenge;
use AcmePhp\Core\Protocol\Challenge;
use AcmePhp\Core\Protocol\Authorization;
use Illuminate\Support\Facades\Http;

class EventObserver
{
    public function created(Event $event)
    {
        // Configure acme-php
        $acmeClient = new AcmeClient(/* configuration */);

        // Define your subdomains
        $subdomains = [$event->titre];

        // Generate SSL certificates for each subdomain
        foreach ($subdomains as $subdomain) {
            // Generate certificate for $subdomain using acme-php
            // Example code to request certificate:
            $authorization = $acmeClient->requestAuthorization($subdomain);

            /** @var HttpChallenge $httpChallenge */
            $httpChallenge = $authorization->findChallengeByType(Challenge::TYPE_HTTP);

            // Deploy challenge to web server
            $solver = new MyHttpSolver(); // Implement your own solver class
            $solver->solve($httpChallenge);

            // Check challenge status
            $acmeClient->verifyChallenge($httpChallenge);

            // Request certificate
            $csr = ''; // Generate Certificate Signing Request
            $certificate = $acmeClient->requestCertificate($authorization, $csr);

            // Upload certificate to Laravel Forge
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $forgeToken,
                'Accept' => 'application/json',
            ])->post("https://forge.laravel.com/api/v1/servers/{$serverId}/sites/{$subdomain}.example.com/ssl", [
                'certificate' => $certificate,
                'private_key' => $privateKey,
                // Additional parameters if needed
            ]);

            // Check if association was successful
            if (!$response->successful()) {
                echo "Failed to associate SSL certificate with site {$subdomain}.";
            }
        }

        echo 'SSL certificates set up for all subdomains successfully!';
    }
}
