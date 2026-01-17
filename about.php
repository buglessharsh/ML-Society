<?php
require_once 'auth.php';
$current_user = getCurrentUser();
$login_history = $current_user ? getUserLoginHistory($current_user['id'], 5) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ML Nexus</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg-dark: #0a0e1a;
            --bg-charcoal: #14192e;
            --bg-card: #1a1f35;
            --neon-cyan: #00f0ff;
            --neon-purple: #b026ff;
            --neon-blue: #0066ff;
            --text-primary: #ffffff;
            --text-secondary: #b0b8d0;
            --gradient-1: linear-gradient(135deg, #0066ff 0%, #b026ff 100%);
            --gradient-2: linear-gradient(135deg, #00f0ff 0%, #0066ff 100%);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 14, 26, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(0, 246, 255, 0.2);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: bold;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--neon-cyan);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-logout {
            padding: 0.5rem 1rem;
            background: transparent;
            color: var(--neon-cyan);
            border: 1px solid var(--neon-cyan);
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: rgba(0, 240, 255, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 100px 2rem 80px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 4rem;
            padding: 3rem 0;
            background: radial-gradient(ellipse at center, rgba(0, 102, 255, 0.1) 0%, transparent 70%);
            border-radius: 20px;
        }

        .page-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            font-size: 1.2rem;
            color: var(--text-secondary);
        }

        .section {
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .content-card {
            background: var(--bg-card);
            padding: 2.5rem;
            border-radius: 15px;
            border: 1px solid rgba(0, 246, 255, 0.2);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .content-card:hover {
            border-color: var(--neon-cyan);
            box-shadow: 0 10px 30px rgba(0, 246, 255, 0.2);
            transform: translateY(-5px);
        }

        .content-card h3 {
            color: var(--neon-cyan);
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .content-card p {
            color: var(--text-secondary);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat-card {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(176, 38, 255, 0.2);
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: var(--neon-purple);
            box-shadow: 0 10px 30px rgba(176, 38, 255, 0.3);
            transform: translateY(-5px);
        }

        .stat-card .stat-number {
            font-size: 3rem;
            font-weight: bold;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-card .stat-label {
            color: var(--text-secondary);
            margin-top: 0.5rem;
            font-size: 1.1rem;
        }

        .login-history {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(0, 246, 255, 0.2);
        }

        .login-history h3 {
            color: var(--neon-cyan);
            margin-bottom: 1.5rem;
        }

        .login-history table {
            width: 100%;
            border-collapse: collapse;
        }

        .login-history th,
        .login-history td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(0, 246, 255, 0.1);
        }

        .login-history th {
            color: var(--neon-cyan);
            font-weight: 600;
        }

        .login-history td {
            color: var(--text-secondary);
        }

        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--gradient-1);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(176, 38, 255, 0.4);
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(176, 38, 255, 0.6);
        }

        .back-link {
            display: inline-block;
            color: var(--neon-cyan);
            text-decoration: none;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="nav-brand">ML Nexus</a>
            <ul class="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php" class="active">About</a></li>
                <li><a href="community.php" target="_blank">Community</a></li>
                <?php if ($current_user): ?>
                    <li class="user-menu">
                        <span>Welcome, <?php echo htmlspecialchars($current_user['username']); ?></span>
                        <a href="logout.php" class="btn-logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="user-menu">
                        <a href="login.php" class="nav-link">Login</a>
                        <a href="register.php" class="btn-logout">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container">
        <a href="index.php" class="back-link">← Back to Home</a>

        <div class="page-header">
            <h1>About ML Nexus</h1>
            <p>Building the Future of Machine Learning Together</p>
        </div>

        <div class="section">
            <div class="content-card">
                <h3>Who We Are</h3>
                <p>ML Nexus is a machine learning-focused community created for students and developers who want to learn, build, and collaborate on real ML projects. We believe machine learning is best learned by building, experimenting, and sharing knowledge with others.</p>
                <p>Our platform brings together learners from all backgrounds - whether you're a beginner taking your first steps in ML or an experienced researcher pushing the boundaries of AI. We create an inclusive environment where everyone can contribute, learn, and grow.</p>
            </div>

            <div class="content-card">
                <h3>Our Mission</h3>
                <p>To create a collaborative ML ecosystem where beginners and advanced learners grow together through hands-on projects and shared learning. We aim to democratize machine learning education by providing accessible resources, real-world projects, and a supportive community that fosters innovation and knowledge sharing.</p>
                <p>We believe that the best way to learn machine learning is through practice, experimentation, and collaboration. Our mission is to provide the tools, resources, and community support needed to transform curious minds into skilled ML practitioners.</p>
            </div>

            <div class="content-card">
                <h3>Our Vision</h3>
                <p>To become a leading student-driven machine learning community producing industry-ready ML engineers and researchers. We envision a future where anyone passionate about AI and machine learning can access high-quality education, work on meaningful projects, and connect with like-minded individuals.</p>
                <p>We strive to bridge the gap between academic learning and industry requirements, ensuring our community members are well-equipped to tackle real-world ML challenges. Through our collaborative approach, we aim to contribute to the advancement of AI technology while nurturing the next generation of ML experts.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">What Drives Us</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Active Members</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">ML Projects</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Events Hosted</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Community Support</div>
                </div>
            </div>
        </div>

        <?php if ($current_user && !empty($login_history)): ?>
        <div class="section">
            <div class="login-history">
                <h3>Your Recent Login History</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Login Date</th>
                            <th>IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($login_history as $login): ?>
                        <tr>
                            <td><?php echo date('F j, Y g:i A', strtotime($login['login_date'])); ?></td>
                            <td><?php echo htmlspecialchars($login['ip_address']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>

        <div class="section">
            <div class="content-card" style="text-align: center;">
                <h3>Join Our Community</h3>
                <p>Ready to start your ML journey? Join thousands of learners building the future of AI.</p>
                <a href="register.php" class="btn">Get Started Now</a>
            </div>
        </div>
    </div>
</body>
</html>
