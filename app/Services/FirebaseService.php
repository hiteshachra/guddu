<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FirebaseService
{
    protected $serviceAccount;
    protected $accessToken;
    protected $projectId;

    public function __construct()
    {
        $this->serviceAccount = json_decode(
            file_get_contents(asset('prizoo-c5459-firebase-adminsdk-fbsvc-ff17573e24.json')),
            true
        );

        $this->projectId = 'prizoo-c5459';
        $this->accessToken = $this->generateAccessToken();
    }

    protected function generateAccessToken()
    {
        $now = time();
        $header = [
            'alg' => 'RS256',
            'typ' => 'JWT',
        ];

        $claimSet = [
            'iss' => $this->serviceAccount['client_email'],
            'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
            'aud' => 'https://oauth2.googleapis.com/token',
            'iat' => $now,
            'exp' => $now + 3600,
        ];
  
        $jwtHeader = base64_encode(json_encode($header));
        $jwtClaim = base64_encode(json_encode($claimSet));

        $signatureInput = $jwtHeader . '.' . $jwtClaim;

        // Sign the JWT with the private key
        openssl_sign($signatureInput, $signature, $this->serviceAccount['private_key'], 'sha256WithRSAEncryption');
        $jwtSignature = base64_encode($signature);

        $jwt = $jwtHeader . '.' . $jwtClaim . '.' . $jwtSignature;

        // Exchange JWT for access token
        $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ]);
        
        return $response->json()['access_token'];
    }

    public function sendMessage($deviceToken, $title, $body)
    {
        $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

        $payload = [
            'message' => [
                'token' => $deviceToken,
                'notification' => [
                    'title' => $title,
                    'body' => $body,
                ],
            ],
        ];

        $response = Http::withToken($this->accessToken)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post($url, $payload);

        return $response->json();
    }
}

