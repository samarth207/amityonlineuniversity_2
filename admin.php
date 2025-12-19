<?php
require_once 'admin-auth.php';

// If not logged in, show login page
if (!isLoggedIn()):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Amity Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        .login-header {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .login-header i {
            font-size: 48px;
            margin-bottom: 15px;
        }
        .login-header h1 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        .login-header p {
            opacity: 0.8;
            font-size: 14px;
        }
        .login-form {
            padding: 40px 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 600;
            font-size: 14px;
        }
        .form-group .input-wrapper {
            position: relative;
        }
        .form-group input {
            width: 100%;
            padding: 14px 14px 14px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .form-group .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        .login-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(59, 130, 246, 0.4);
        }
        .error-message {
            background: #fef2f2;
            color: #dc2626;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .timeout-message {
            background: #fef3c7;
            color: #92400e;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
        }
        .back-link a:hover {
            color: #1e3a8a;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fas fa-shield-alt"></i>
            <h1>Admin Dashboard</h1>
            <p>Amity Online University</p>
        </div>
        <form class="login-form" method="POST">
            <?php if (isset($_GET['timeout'])): ?>
                <div class="timeout-message">
                    <i class="fas fa-clock"></i>
                    Your session has expired. Please login again.
                </div>
            <?php endif; ?>
            
            <?php if ($loginError): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo htmlspecialchars($loginError); ?>
                </div>
            <?php endif; ?>
            
            <div class="form-group">
                <label>Username</label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" name="username" placeholder="Enter username" required autofocus>
                </div>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" name="password" placeholder="Enter password" required>
                </div>
            </div>
            
            <button type="submit" name="login" class="login-btn">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
            
            <div class="back-link">
                <a href="index.html"><i class="fas fa-arrow-left"></i> Back to Website</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
exit;
endif;
// User is logged in - show dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Amity Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
        }
        
        .header {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .live-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.1);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .live-dot {
            width: 10px;
            height: 10px;
            background: #22c55e;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
        }
        
        .stat-card h3 {
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e3a8a;
        }
        
        .stat-card.apply { border-left: 4px solid #3b82f6; }
        .stat-card.enquire { border-left: 4px solid #10b981; }
        .stat-card.brochure { border-left: 4px solid #f59e0b; }
        .stat-card.total { border-left: 4px solid #8b5cf6; }
        
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .table-header {
            padding: 20px 25px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table-header h2 {
            font-size: 1.2rem;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .filter-tabs {
            display: flex;
            gap: 10px;
        }
        
        .filter-tab {
            padding: 8px 16px;
            border: none;
            background: #f3f4f6;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            color: #6b7280;
            transition: all 0.2s;
        }
        
        .filter-tab:hover {
            background: #e5e7eb;
        }
        
        .filter-tab.active {
            background: #1e3a8a;
            color: white;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: #f9fafb;
            padding: 15px 20px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e5e7eb;
        }
        
        td {
            padding: 15px 20px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 14px;
            color: #374151;
        }
        
        tr:hover {
            background: #f9fafb;
        }
        
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }
        
        .badge.apply {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .badge.enquire {
            background: #d1fae5;
            color: #065f46;
        }
        
        .badge.brochure {
            background: #fef3c7;
            color: #92400e;
        }
        
        .new-row {
            animation: highlight 3s ease-out;
        }
        
        @keyframes highlight {
            0% { background: #fef3c7; }
            100% { background: transparent; }
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }
        
        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .refresh-btn {
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            transition: background 0.2s;
        }
        
        .refresh-btn:hover {
            background: #1e40af;
        }
        
        .refresh-btn.loading i {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .last-updated {
            font-size: 13px;
            color: #9ca3af;
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.1);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.2);
        }
        
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-direction: column;
                gap: 15px;
            }
            
            .table-header {
                flex-direction: column;
                gap: 15px;
            }
            
            .filter-tabs {
                flex-wrap: wrap;
            }
            
            td, th {
                padding: 12px 15px;
            }
        }
        
        /* Toast notification for new submissions */
        .toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #1e3a8a;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 12px;
            transform: translateX(400px);
            transition: transform 0.3s ease;
            z-index: 1000;
        }
        
        .toast.show {
            transform: translateX(0);
        }
        
        .toast i {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1><i class="fas fa-graduation-cap"></i> Amity Online Admin</h1>
        <div class="header-right">
            <div class="live-indicator">
                <span class="live-dot"></span>
                <span>Live Updates</span>
            </div>
            <span class="last-updated">Last updated: <span id="lastUpdated">--</span></span>
            <a href="admin.php?logout=1" class="logout-btn" title="Logout">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </header>
    
    <div class="container">
        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card total">
                <h3><i class="fas fa-chart-line"></i> Total Submissions</h3>
                <div class="number" id="totalCount">0</div>
            </div>
            <div class="stat-card apply">
                <h3><i class="fas fa-user-plus"></i> Applications</h3>
                <div class="number" id="applyCount">0</div>
            </div>
            <div class="stat-card enquire">
                <h3><i class="fas fa-question-circle"></i> Enquiries</h3>
                <div class="number" id="enquireCount">0</div>
            </div>
            <div class="stat-card brochure">
                <h3><i class="fas fa-file-download"></i> Brochure Downloads</h3>
                <div class="number" id="brochureCount">0</div>
            </div>
        </div>
        
        <!-- Submissions Table -->
        <div class="table-container">
            <div class="table-header">
                <h2><i class="fas fa-inbox"></i> Recent Submissions</h2>
                <div style="display: flex; gap: 15px; align-items: center;">
                    <div class="filter-tabs">
                        <button class="filter-tab active" data-filter="all">All</button>
                        <button class="filter-tab" data-filter="apply">Applications</button>
                        <button class="filter-tab" data-filter="enquire">Enquiries</button>
                        <button class="filter-tab" data-filter="brochure">Brochures</button>
                    </div>
                    <button class="refresh-btn" onclick="fetchSubmissions()">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                </div>
            </div>
            
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody id="submissionsTable">
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="fas fa-spinner fa-spin"></i>
                                    <p>Loading submissions...</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <i class="fas fa-bell"></i>
        <span id="toastMessage">New submission received!</span>
    </div>
    
    <script>
        let currentFilter = 'all';
        let lastSubmissionId = 0;
        let allSubmissions = [];
        
        // Fetch submissions from API
        async function fetchSubmissions() {
            const refreshBtn = document.querySelector('.refresh-btn');
            refreshBtn.classList.add('loading');
            
            try {
                const response = await fetch('get-submissions.php');
                const data = await response.json();
                
                if (data.success) {
                    // Check for new submissions
                    if (allSubmissions.length > 0 && data.submissions.length > allSubmissions.length) {
                        const newCount = data.submissions.length - allSubmissions.length;
                        showToast(`${newCount} new submission${newCount > 1 ? 's' : ''} received!`);
                    }
                    
                    allSubmissions = data.submissions;
                    updateStats(data.stats);
                    renderTable(filterSubmissions(allSubmissions, currentFilter));
                    
                    // Update last updated time
                    document.getElementById('lastUpdated').textContent = new Date().toLocaleTimeString();
                }
            } catch (error) {
                console.error('Error fetching submissions:', error);
            }
            
            refreshBtn.classList.remove('loading');
        }
        
        // Update stats cards
        function updateStats(stats) {
            animateNumber('totalCount', stats.total || 0);
            animateNumber('applyCount', stats.apply || 0);
            animateNumber('enquireCount', stats.enquire || 0);
            animateNumber('brochureCount', stats.brochure || 0);
        }
        
        // Animate number change
        function animateNumber(elementId, newValue) {
            const element = document.getElementById(elementId);
            const currentValue = parseInt(element.textContent) || 0;
            
            if (currentValue !== newValue) {
                element.textContent = newValue;
                element.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    element.style.transform = 'scale(1)';
                }, 200);
            }
        }
        
        // Filter submissions
        function filterSubmissions(submissions, filter) {
            if (filter === 'all') return submissions;
            return submissions.filter(s => s.form_type === filter);
        }
        
        // Render table
        function renderTable(submissions) {
            const tbody = document.getElementById('submissionsTable');
            
            if (submissions.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <i class="fas fa-inbox"></i>
                                <p>No submissions yet</p>
                            </div>
                        </td>
                    </tr>
                `;
                return;
            }
            
            tbody.innerHTML = submissions.map((submission, index) => {
                const isNew = index === 0 && submission.id > lastSubmissionId;
                if (submission.id > lastSubmissionId) {
                    lastSubmissionId = submission.id;
                }
                
                return `
                    <tr class="${isNew ? 'new-row' : ''}">
                        <td><strong>#${submission.id}</strong></td>
                        <td><span class="badge ${submission.form_type}">${submission.form_type}</span></td>
                        <td>${escapeHtml(submission.name)}</td>
                        <td><a href="mailto:${escapeHtml(submission.email)}" style="color: #3b82f6;">${escapeHtml(submission.email)}</a></td>
                        <td><a href="tel:${escapeHtml(submission.phone)}" style="color: #3b82f6;">${escapeHtml(submission.phone)}</a></td>
                        <td>${escapeHtml(submission.course)}</td>
                        <td>${formatDate(submission.submitted_at)}</td>
                    </tr>
                `;
            }).join('');
        }
        
        // Escape HTML to prevent XSS
        function escapeHtml(text) {
            if (!text) return '';
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
        
        // Format date
        function formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffMs = now - date;
            const diffMins = Math.floor(diffMs / 60000);
            const diffHours = Math.floor(diffMs / 3600000);
            
            if (diffMins < 1) return 'Just now';
            if (diffMins < 60) return `${diffMins} min${diffMins > 1 ? 's' : ''} ago`;
            if (diffHours < 24) return `${diffHours} hour${diffHours > 1 ? 's' : ''} ago`;
            
            return date.toLocaleDateString('en-IN', {
                day: 'numeric',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }
        
        // Show toast notification
        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            toastMessage.textContent = message;
            toast.classList.add('show');
            
            // Play notification sound (optional)
            try {
                const audio = new Audio('data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVgodDbq2EcBj+a2teleVMxQYq84teleU8yQYq80dWjb0QxR4e5yNimZ0EvS4q8x9WgaEMwR4a8x9SfZ0MwR4i9x9KeZ0MwR4i9x9KeZ0IwSIi+xtOdZkIvSIm+xtOdZUEvSYq/xdKbZEEuSou/xNGaY0AuS4zA');
                audio.volume = 0.3;
                audio.play();
            } catch (e) {}
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }
        
        // Filter tab click handler
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                currentFilter = this.dataset.filter;
                renderTable(filterSubmissions(allSubmissions, currentFilter));
            });
        });
        
        // Initial fetch
        fetchSubmissions();
        
        // Auto-refresh every 5 seconds for live updates
        setInterval(fetchSubmissions, 5000);
    </script>
</body>
</html>
