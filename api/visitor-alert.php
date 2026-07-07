<?php
declare(strict_types=1);

require get_safe_path('helpers/api-helpers.php');

// 1. HTTP Headers & CORS Setup
header("Access-Control-Allow-Origin: *"); // Adjust to your portfolio's domain in production
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Handle preflight OPTIONS requests from the browser
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit();
}

$DB_HOST = env('DB_HOST', 'localhost');
$DB_NAME = env('DB_NAME');
$DB_PASS = env('DB_PASS');
$DB_USER = env('DB_USER');
$NOTIFICATION_EMAIL = env('NOTIFICATION_EMAIL');

try {
    // 3. Capture Frontend Payload
    $rawInput = file_get_contents('php://input');
    $data = json_decode($rawInput, true);

    if (!$data) {
        throw new Exception("Invalid or missing JSON payload");
    }

    // 4. Resolve Visitor's Real IP Address
    $ipAddress = getClientIp();

    // 5. Fetch Geolocation Data (Using ip-api.com - free for non-commercial/testing)
    $geoData = fetchGeoData($ipAddress);

    // 6. Database Connection (PDO)
    $dsn = "mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);

    // 7. Insert Into Database
    $sql = "INSERT INTO portfolio_visits (
                tracking_source, tracking_type, landing_page, full_url, 
                browser_language, ip_address, country, city, 
                organization, screen_resolution, viewport_size, user_agent
            ) VALUES (
                :tracking_source, :tracking_type, :landing_page, :full_url, 
                :browser_language, :ip_address, :country, :city, 
                :organization, :screen_resolution, :viewport_size, :user_agent
            )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':tracking_source'  => $data['tracking']['source'] ?? 'Direct / Unknown',
        ':tracking_type'    => $data['tracking']['type'] ?? 'direct',
        ':landing_page'     => $data['context']['landingPage'] ?? '/',
        ':full_url'         => $data['context']['fullUrl'] ?? '',
        ':browser_language' => $data['context']['language'] ?? null,
        ':ip_address'       => $ipAddress,
        ':country'          => $geoData['country'] ?? null,
        ':city'             => $geoData['city'] ?? null,
        ':organization'     => $geoData['org'] ?? null,
        ':screen_resolution' => $data['device']['screenResolution'] ?? null,
        ':viewport_size'    => $data['device']['viewportSize'] ?? null,
        ':user_agent'       => $data['device']['userAgent'] ?? null
    ]);

    // 8. Send Email Notification
    sendAlertEmail($NOTIFICATION_EMAIL, $data, $ipAddress, $geoData);

    // 9. Respond to Frontend (Silently success)
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Logged"]);
} catch (Exception $e) {
    // Fail silently to the client so the portfolio visitor notices nothing
    http_response_code(200);
    echo json_encode(["status" => "error", "message" => "Internal processes completed silently"]);

    // Log the actual error on your server for debugging
    writeLog("Portfolio Tracker Error: " . $e->getMessage(), 'ERROR');
}
