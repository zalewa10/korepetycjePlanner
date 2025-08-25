<?php
// public/api/lessons.php
require_once __DIR__ . '/../../app/core/Database.php';
header('Content-Type: application/json');

$db = new Database();
$pdo = $db->getConnection();

$stmt = $pdo->query('SELECT l.id, u.imie, u.nazwisko, l.data, l.godzina_od, l.godzina_do, l.status FROM lessons l JOIN users u ON l.user_id = u.id');
$lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

$events = [];
foreach ($lessons as $lesson) {
    $events[] = [
        'id' => $lesson['id'],
        'title' => $lesson['imie'] . ' ' . $lesson['nazwisko'],
        'start' => $lesson['data'] . 'T' . $lesson['godzina_od'],
        'end' => $lesson['data'] . 'T' . $lesson['godzina_do'],
        'color' => $lesson['status'] === 'odwolana' ? '#e57373' : ($lesson['status'] === 'odbyta' ? '#81c784' : '#64b5f6'),
    ];
}
echo json_encode($events);
