<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

const MAX_FILE_SIZE = 5 * 1024 * 1024;
const CONNECT_TIMEOUT = 8;
const REQUEST_TIMEOUT = 12;

function out(array $data, int $code=200): never {
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_SLASHES);
    exit;
}

function clean_proxy(string $line): ?array {
    $line = trim($line);
    if ($line === '' || str_starts_with($line, '#')) return null;

    $line = preg_replace('/^\s*(https?|socks[45]):\/\//i', '', $line);
    $parts = explode(':', $line);

    if (count($parts) < 2) return null;

    $host = trim($parts[0]);
    $port = (int)trim($parts[1]);
    if (!filter_var($host, FILTER_VALIDATE_IP) || $port < 1 || $port > 65535) return null;

    return ['host'=>$host, 'port'=>$port, 'proxy'=>$host.':'.$port];
}

function curl_proxy_check(string $host, int $port): array {
    $ch = curl_init('https://api.ipify.org?format=json');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_CONNECTTIMEOUT => CONNECT_TIMEOUT,
        CURLOPT_TIMEOUT => REQUEST_TIMEOUT,
        CURLOPT_PROXY => $host,
        CURLOPT_PROXYPORT => $port,
        CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
    ]);
    $start = microtime(true);
    $body = curl_exec($ch);
    $err = curl_error($ch);
    $errno = curl_errno($ch);
    $http = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $time = round((microtime(true)-$start)*1000);
    curl_close($ch);

    $ip = null;
    if ($body) {
        $json = json_decode($body, true);
        $ip = $json['ip'] ?? null;
    }

    $live = !$errno && $http >= 200 && $http < 400 && filter_var($ip, FILTER_VALIDATE_IP);
    return [
        'live'=>$live,
        'ip'=>$ip,
        'http'=>$http,
        'ms'=>$time,
        'error'=>$live ? null : ($err ?: 'Connection failed')
    ];
}

function geo(string $ip): array {
    if (!filter_var($ip, FILTER_VALIDATE_IP)) return ['country'=>'Unknown','city'=>'Unknown','isp'=>'Unknown','asn'=>'Unknown'];
    $ctx = stream_context_create(['http'=>['timeout'=>4,'header'=>"User-Agent: ProxyChecker/1.0\r\n"]]);
    $raw = @file_get_contents('https://ipwho.is/'.rawurlencode($ip), false, $ctx);
    $j = $raw ? json_decode($raw, true) : null;
    if (!is_array($j) || empty($j['success'])) return ['country'=>'Unknown','city'=>'Unknown','isp'=>'Unknown','asn'=>'Unknown'];
    return [
        'country'=>$j['country'] ?? 'Unknown',
        'city'=>$j['city'] ?? 'Unknown',
        'isp'=>$j['connection']['isp'] ?? 'Unknown',
        'asn'=>isset($j['connection']['asn']) ? 'AS'.$j['connection']['asn'] : 'Unknown'
    ];
}

$action = $_GET['action'] ?? '';

if ($action === 'upload') {
    if (!isset($_FILES['proxy_file']) || $_FILES['proxy_file']['error'] !== UPLOAD_ERR_OK) out(['ok'=>false,'error'=>'Upload failed'],400);
    if ($_FILES['proxy_file']['size'] > MAX_FILE_SIZE) out(['ok'=>false,'error'=>'File is too large'],400);

    $lines = file($_FILES['proxy_file']['tmp_name'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $list = [];
    $seen = [];
    foreach ($lines as $line) {
        $p = clean_proxy($line);
        if ($p && !isset($seen[$p['proxy']])) {
            $seen[$p['proxy']] = true;
            $list[] = $p;
        }
    }
    if (!$list) out(['ok'=>false,'error'=>'No valid IP:PORT proxies found'],400);
    $_SESSION['x'] = 1;
    out(['ok'=>true,'total'=>count($list),'items'=>$list]);
}

if ($action === 'check') {
    $host = $_GET['host'] ?? '';
    $port = (int)($_GET['port'] ?? 0);
    if (!filter_var($host,FILTER_VALIDATE_IP) || $port<1 || $port>65535) out(['ok'=>false,'error'=>'Invalid proxy'],400);
    $r = curl_proxy_check($host,$port);
    if ($r['live']) $r += geo($r['ip']);
    else $r += ['country'=>'Unknown','city'=>'Unknown','isp'=>'Unknown','asn'=>'Unknown'];
    out(['ok'=>true,'result'=>array_merge(['proxy'=>$host.':'.$port],$r)]);
}

out(['ok'=>false,'error'=>'Unknown action'],404);