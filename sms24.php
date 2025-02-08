<?php

header('Content-Type: application/json');

function get_messages($num) {
    $url = 'https://sms24.me/en/numbers/' . $num;
    $response = file_get_contents($url);
    if ($response === FALSE) {
        return ['error' => 'Error occurred while fetching messages'];
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($response);
    $xpath = new DOMXPath($dom);

    $messages = [];
    $senders = [];
    $created = [];

    // Fetch messages
    foreach ($xpath->query('//span[@class="placeholder text-break"]') as $span) {
        $messages[] = ['message' => trim($span->nodeValue)];
    }
    
    // Fetch senders
    foreach ($xpath->query('//label[@class="mb-1"]') as $span) {
        $senders[] = ['from' => trim($span->nodeValue)];
    }

    // Fetch created dates
    foreach ($xpath->query('//div[contains(@class, "placeholder")]') as $div) {
        $created[] = strtotime($div->getAttribute('data-created'));
    }

    $formatted_messages = [];
    for ($i = 0; $i < count($messages); $i++) {
        $time_ago = time_elapsed_string($created[$i]);
        $actual_time = date('Y-m-d H:i:s', $created[$i]);
        $formatted_messages[] = [
            'message' => $messages[$i]['message'],
            'from' => $senders[$i]['from'],
            'time_ago' => $time_ago,
            'actual_time' => $actual_time
        ];
    }

    return $formatted_messages;
}

// Function to calculate time ago
function time_elapsed_string($datetime, $full = false) {
    $now = time();
    $ago = $now - $datetime;
    
    if ($ago < 60) {
        return $ago . 's ago';
    } elseif ($ago < 3600) {
        $minutes = floor($ago / 60);
        $seconds = $ago % 60;
        if ($seconds > 0) {
            return $minutes . 'm ' . $seconds . 's ago';
        } else {
            return $minutes . 'm ago';
        }
    } elseif ($ago < 86400) {
        $hours = floor($ago / 3600);
        $minutes = floor(($ago % 3600) / 60);
        return $hours . 'h ' . $minutes . 'm ago';
    } else {
        $days = floor($ago / 86400);
        return $days . 'd ago';
    }
}

$num = $_GET['num'] ?? null;

if ($num) {
    $data = get_messages($num);
    echo json_encode(['messages' => $data], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['error' => 'Number parameter is missing'], JSON_PRETTY_PRINT);
}

?>