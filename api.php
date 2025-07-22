<?php
require 'db.php';
header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $age = intval($_POST['age']);
    $conn->query("INSERT INTO users (name, age) VALUES ('$name', $age)");
    echo json_encode(['success'=>true]);
}
elseif ($action === 'fetch') {
    $res = $conn->query("SELECT * FROM users ORDER BY id DESC");
    $data = [];
    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}
elseif ($action === 'toggle') {
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT status FROM users WHERE id = $id");
    if ($row = $res->fetch_assoc()) {
        $new = $row['status'] == 1 ? 0 : 1;
        $conn->query("UPDATE users SET status = $new WHERE id = $id");
    }
    echo json_encode(['success'=>true]);
}
else {
    http_response_code(400);
    echo json_encode(['error'=>'Invalid action']);
}

$conn->close();
