<?php

require_once get_safe_path('helpers/mailer.php');

use Src\Mailer;

/**
 * Build and send an HTML formatted email.
 */
function sendAlertEmail(string $to, array $data, string $ip, array $geo): void
{
    try {
        $subject = "Portfolio Visitor Alert: [" . ($data['tracking']['source'] ?? 'Direct') . "]";

        $source  = htmlspecialchars($data['tracking']['source'] ?? 'Direct');
        $page    = htmlspecialchars($data['context']['landingPage'] ?? '/');
        $country = htmlspecialchars($geo['country'] ?? 'Unknown');
        $city    = htmlspecialchars($geo['city'] ?? 'Unknown');
        $org     = htmlspecialchars($geo['org'] ?? 'Unknown');
        $device  = htmlspecialchars($data['device']['userAgent'] ?? 'Unknown');
        $time    = date('Y-m-d H:i:s');

        // Clean, modern HTML email template
        $message = "
    <html>
    <head>
        <style>
            body { font-family: sans-serif; color: #333; line-height: 1.5; }
            .card { background: #f8f9fa; border-radius: 8px; padding: 20px; border: 1px solid #e9ecef; max-width: 600px; }
            h2 { color: #212529; margin-top: 0; }
            ul { padding-left: 20px; }
            li { margin-bottom: 8px; }
            .highlight { font-weight: bold; color: #0d6efd; }
        </style>
    </head>
    <body>
        <div class='card'>
            <h2>⚡ New Portfolio Interaction</h2>
            <p>Someone just loaded your portfolio via a tracked channel.</p>
            <hr style='border: 0; border-top: 1px solid #dee2e6;'>
            <ul>
                <li><span class='highlight'>Source:</span> {$source}</li>
                <li><span class='highlight'>Target Page:</span> {$page}</li>
                <li><span class='highlight'>Location:</span> {$city}, {$country}</li>
                <li><span class='highlight'>Network/Org:</span> {$org}</li>
                <li><span class='highlight'>IP Address:</span> {$ip}</li>
                <li><span class='highlight'>Time:</span> {$time}</li>
                <li><span class='highlight'>Device Context:</span> <small style='color:#6c757d;'>{$device}</small></li>
            </ul>
        </div>
    </body>
    </html>
    ";

        $mailer = new Mailer();
        $mailer->to($to)
            ->subject($subject)
            ->html($message)
            ->send();
    } catch (Exception $e) {
        error_log("API Script Processing Error: " . $e->getMessage());
    }
}

/**
 * Perform an external API call to geolocate the IP address.
 */
function fetchGeoData(string $ip): array
{
    if ($ip === '127.0.0.1' || $ip === '::1') {
        return ['country' => 'Localhost', 'city' => 'Localhost', 'org' => 'Development Network'];
    }

    $url = "http://ip-api.com/json/{$ip}?fields=status,country,city,org";

    // Set a short 2-second timeout so it doesn't hang your API if ip-api.com is slow
    $ctx = stream_context_create(['http' => ['timeout' => 2]]);
    $response = @file_get_contents($url, false, $ctx);

    if ($response) {
        $result = json_decode($response, true);
        if (($result['status'] ?? '') === 'success') {
            return $result;
        }
    }
    return ['country' => 'Unknown', 'city' => 'Unknown', 'org' => 'Unknown'];
}

/**
 * Get the real client IP address, handling proxies and Cloudflare.
 */
function getClientIp(): string {
    $ipHeaders = [
        'HTTP_CF_CONNECTING_IP', // Cloudflare
        'HTTP_X_FORWARDED_FOR',  // Standard Proxy
        'HTTP_X_REAL_IP',        // Nginx proxy
        'REMOTE_ADDR'            // Default fallback
    ];

    foreach ($ipHeaders as $header) {
        if (!empty($_SERVER[$header])) {
            // X_FORWARDED_FOR can be a comma-separated list; get the first (original) IP
            $ips = explode(',', $_SERVER[$header]);
            $ip = trim($ips[0]);
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
    return '127.0.0.1';
}