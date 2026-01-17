<?php
require_once 'auth.php';
$current_user = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community - ML Nexus</title>
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

        .community-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .community-card {
            background: var(--bg-card);
            padding: 2.5rem;
            border-radius: 15px;
            border: 1px solid rgba(0, 246, 255, 0.2);
            transition: all 0.3s ease;
        }

        .community-card:hover {
            border-color: var(--neon-cyan);
            box-shadow: 0 10px 30px rgba(0, 246, 255, 0.2);
            transform: translateY(-5px);
        }

        .community-card h3 {
            color: var(--neon-purple);
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }

        .community-card ul {
            list-style: none;
        }

        .community-card ul li {
            color: var(--text-secondary);
            padding: 0.8rem 0;
            padding-left: 1.5rem;
            position: relative;
            font-size: 1.05rem;
        }

        .community-card ul li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--neon-cyan);
            font-weight: bold;
        }

        .event-card {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(176, 38, 255, 0.2);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .event-card:hover {
            border-color: var(--neon-purple);
            box-shadow: 0 10px 30px rgba(176, 38, 255, 0.3);
            transform: translateX(10px);
        }

        .event-card h4 {
            color: var(--neon-purple);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .event-card .event-date {
            color: var(--neon-cyan);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .event-card p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .benefit-card {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(0, 102, 255, 0.2);
            transition: all 0.3s ease;
            text-align: center;
        }

        .benefit-card:hover {
            border-color: var(--neon-blue);
            box-shadow: 0 10px 30px rgba(0, 102, 255, 0.3);
            transform: translateY(-5px);
        }

        .benefit-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .benefit-card h4 {
            color: var(--neon-cyan);
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .benefit-card p {
            color: var(--text-secondary);
            line-height: 1.7;
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

        .btn-secondary {
            background: transparent;
            color: var(--neon-cyan);
            border: 2px solid var(--neon-cyan);
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: rgba(0, 240, 255, 0.1);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.5);
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

        .cta-section {
            text-align: center;
            padding: 3rem;
            background: var(--bg-card);
            border-radius: 20px;
            border: 1px solid rgba(0, 246, 255, 0.2);
        }

        .cta-section h3 {
            color: var(--neon-cyan);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .cta-section p {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .community-grid,
            .benefits-grid {
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
                <li><a href="about.php" target="_blank">About</a></li>
                <li><a href="community.php" class="active">Community</a></li>
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
            <h1>Community & Events</h1>
            <p>Join thousands of ML enthusiasts building the future</p>
        </div>

        <div class="section">
            <h2 class="section-title">Upcoming Events</h2>
            <div class="event-card">
                <h4>Monthly ML Project Challenge</h4>
                <div class="event-date">Every First Saturday of the Month</div>
                <p>Participate in our monthly challenge where you'll build real ML projects from scratch. Winners get featured on our platform and receive mentorship opportunities.</p>
            </div>
            <div class="event-card">
                <h4>Model-Building Hackathon</h4>
                <div class="event-date">Next: March 15-17, 2026</div>
                <p>48-hour hackathon focusing on building production-ready ML models. Work in teams, compete for prizes, and network with industry professionals.</p>
            </div>
            <div class="event-card">
                <h4>ML Study Jams</h4>
                <div class="event-date">Every Wednesday at 7 PM EST</div>
                <p>Weekly study sessions where community members come together to learn new ML concepts, solve problems, and share knowledge in a collaborative environment.</p>
            </div>
            <div class="event-card">
                <h4>Paper Reading Sessions</h4>
                <div class="event-date">Every Friday at 6 PM EST</div>
                <p>Deep dive into recent ML research papers. We break down complex papers, discuss methodologies, and explore practical applications together.</p>
            </div>
            <div class="event-card">
                <h4>Guest Speaker Workshops</h4>
                <div class="event-date">Monthly - Last Saturday</div>
                <p>Learn from industry experts and researchers. Topics range from neural architecture search to deploying ML models at scale.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Community Benefits</h2>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">🚀</div>
                    <h4>Build Public ML Projects</h4>
                    <p>Showcase your skills by building and sharing real-world ML projects. Build a portfolio that stands out to employers.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">👥</div>
                    <h4>Learn with Peers</h4>
                    <p>Connect with fellow learners, share ideas, get feedback, and collaborate on exciting ML projects together.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">💼</div>
                    <h4>Improve GitHub & Portfolio</h4>
                    <p>Build a strong GitHub profile with quality ML projects. Our community helps you create portfolio pieces that get noticed.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">🎓</div>
                    <h4>Get Mentorship</h4>
                    <p>Access mentorship from experienced ML engineers and researchers. Get personalized guidance on your learning journey.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">🌐</div>
                    <h4>Network with Professionals</h4>
                    <p>Connect with ML professionals, researchers, and industry leaders. Build relationships that advance your career.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">📚</div>
                    <h4>Access Exclusive Resources</h4>
                    <p>Get access to curated datasets, advanced tutorials, and exclusive learning materials not available elsewhere.</p>
                </div>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Community Guidelines</h2>
            <div class="community-grid">
                <div class="community-card">
                    <h3>Code of Conduct</h3>
                    <ul>
                        <li>Be respectful and inclusive</li>
                        <li>Provide constructive feedback</li>
                        <li>Share knowledge generously</li>
                        <li>Help others learn and grow</li>
                        <li>Maintain professional discourse</li>
                    </ul>
                </div>
                <div class="community-card">
                    <h3>Participation</h3>
                    <ul>
                        <li>Active participation is encouraged</li>
                        <li>Ask questions freely</li>
                        <li>Share your projects</li>
                        <li>Contribute to discussions</li>
                        <li>Help newcomers get started</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="cta-section">
                <h3>Ready to Join Our Community?</h3>
                <p>Start your ML journey today and connect with thousands of learners, builders, and researchers.</p>
                <?php if ($current_user): ?>
                    <p style="color: var(--neon-cyan); margin-top: 1rem;">You're already logged in! Start exploring projects and events.</p>
                    <a href="index.php#projects" class="btn">Explore Projects</a>
                <?php else: ?>
                    <a href="register.php" class="btn">Join Now</a>
                    <a href="login.php" class="btn btn-secondary" style="margin-left: 1rem;">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
