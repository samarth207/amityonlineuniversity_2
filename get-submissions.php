<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');

require_once 'config.php';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed'
    ]);
    exit;
}

try {
    // Get all submissions ordered by most recent first
    $sql = "SELECT id, form_type, course, phone, name, email, submitted_at 
            FROM form_submissions 
            ORDER BY submitted_at DESC 
            LIMIT 100";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get stats
    $statsSql = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN form_type = 'apply' THEN 1 ELSE 0 END) as apply,
                    SUM(CASE WHEN form_type = 'enquire' THEN 1 ELSE 0 END) as enquire,
                    SUM(CASE WHEN form_type = 'brochure' THEN 1 ELSE 0 END) as brochure
                 FROM form_submissions";
    
    $statsStmt = $conn->prepare($statsSql);
    $statsStmt->execute();
    $stats = $statsStmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'submissions' => $submissions,
        'stats' => [
            'total' => (int)$stats['total'],
            'apply' => (int)$stats['apply'],
            'enquire' => (int)$stats['enquire'],
            'brochure' => (int)$stats['brochure']
        ]
    ]);
    
} catch(PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error occurred'
    ]);
}

$conn = null;
?>
