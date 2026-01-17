<?php
require_once 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ML Nexus is a student-driven machine learning community focused on projects, research, collaboration, and real-world ML skills.">
    <meta name="keywords" content="machine learning, ML community, AI projects, ML students, ML research, ML collaboration">
    <title>ML Nexus – Machine Learning Community & Projects</title>
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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 14, 26, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(0, 246, 255, 0.2);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 20px rgba(0, 246, 255, 0.1);
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
            position: relative;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--neon-cyan);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-2);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after,
        .nav-menu a.active::after {
            width: 100%;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-menu span {
            color: var(--text-secondary);
            font-size: 0.9rem;
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

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 4px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--neon-cyan);
            transition: all 0.3s ease;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 120px 2rem 80px;
            background: radial-gradient(ellipse at center, rgba(0, 102, 255, 0.1) 0%, var(--bg-dark) 70%);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(176, 38, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(0, 240, 255, 0.15) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-content {
            max-width: 900px;
            text-align: center;
            z-index: 1;
            animation: fadeInUp 1s ease;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .hero .subheading {
            font-size: 1.3rem;
            color: var(--text-secondary);
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--gradient-1);
            color: white;
            box-shadow: 0 4px 15px rgba(176, 38, 255, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(176, 38, 255, 0.6);
        }

        .btn-secondary {
            background: transparent;
            color: var(--neon-cyan);
            border: 2px solid var(--neon-cyan);
        }

        .btn-secondary:hover {
            background: rgba(0, 240, 255, 0.1);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.5);
            transform: translateY(-3px);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Section Styles */
        section {
            padding: 80px 0;
            position: relative;
        }

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 3rem;
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* About Section */
        .about {
            background: var(--bg-charcoal);
        }

        .about-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .about-item {
            margin-bottom: 3rem;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .about-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .about-item h3 {
            color: var(--neon-cyan);
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .about-item p {
            color: var(--text-secondary);
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* Features Section */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: var(--bg-card);
            padding: 2.5rem;
            border-radius: 15px;
            border: 1px solid rgba(0, 246, 255, 0.2);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(30px);
        }

        .feature-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--neon-cyan);
            box-shadow: 0 10px 30px rgba(0, 246, 255, 0.2);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            color: var(--neon-cyan);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        /* Why Section */
        .why-section {
            background: var(--bg-charcoal);
        }

        .why-list {
            max-width: 800px;
            margin: 0 auto;
            list-style: none;
        }

        .why-list li {
            padding: 1.5rem;
            margin-bottom: 1rem;
            background: var(--bg-card);
            border-left: 4px solid var(--neon-cyan);
            border-radius: 8px;
            opacity: 0;
            transform: translateX(-30px);
            transition: all 0.6s ease;
        }

        .why-list li.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .why-list li strong {
            color: var(--neon-cyan);
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        /* Community Section */
        .community-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .community-card {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(0, 246, 255, 0.2);
        }

        .community-card h3 {
            color: var(--neon-purple);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .community-card ul {
            list-style: none;
        }

        .community-card ul li {
            color: var(--text-secondary);
            padding: 0.8rem 0;
            padding-left: 1.5rem;
            position: relative;
        }

        .community-card ul li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--neon-cyan);
        }

        /* Projects Section */
        .projects {
            background: var(--bg-charcoal);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .project-card {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(176, 38, 255, 0.2);
            transition: all 0.3s ease;
            opacity: 0;
            transform: scale(0.9);
        }

        .project-card.visible {
            opacity: 1;
            transform: scale(1);
        }

        .project-card:hover {
            transform: scale(1.05);
            border-color: var(--neon-purple);
            box-shadow: 0 10px 30px rgba(176, 38, 255, 0.3);
        }

        .project-card h3 {
            color: var(--neon-purple);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .project-card p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .project-tag {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            background: rgba(0, 102, 255, 0.2);
            color: var(--neon-blue);
            border-radius: 20px;
            font-size: 0.85rem;
            margin-top: 1rem;
        }

        /* Blog Section */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .blog-card {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(0, 246, 255, 0.2);
            transition: all 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            border-color: var(--neon-cyan);
            box-shadow: 0 10px 30px rgba(0, 246, 255, 0.2);
        }

        .blog-card h3 {
            color: var(--neon-cyan);
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .blog-card p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        /* Contact Section */
        .contact {
            background: var(--bg-charcoal);
        }

        .contact-content {
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-text {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            text-align: left;
        }

        .form-group label {
            display: block;
            color: var(--neon-cyan);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            background: var(--bg-card);
            border: 1px solid rgba(0, 246, 255, 0.3);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--neon-cyan);
            box-shadow: 0 0 15px rgba(0, 246, 255, 0.3);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        /* Footer */
        footer {
            background: var(--bg-dark);
            padding: 3rem 0;
            text-align: center;
            border-top: 1px solid rgba(0, 246, 255, 0.2);
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--neon-cyan);
        }

        footer p {
            color: var(--text-secondary);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                flex-direction: column;
                background: var(--bg-charcoal);
                width: 100%;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
                padding: 2rem 0;
            }

            .nav-menu.active {
                left: 0;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero .subheading {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .features-grid,
            .projects-grid,
            .blog-grid {
                grid-template-columns: 1fr;
            }

            .hamburger.active span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .hamburger.active span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active span:nth-child(3) {
                transform: rotate(-45deg) translate(7px, -6px);
            }

            .user-menu {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="index.php" class="nav-brand">ML Nexus</a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="index.php" class="nav-link active">Home</a></li>
                <li><a href="about.php" class="nav-link" target="_blank" rel="noopener noreferrer">About</a></li>
                <li><a href="index.php#features" class="nav-link">Features</a></li>
                <li><a href="index.php#projects" class="nav-link">Projects</a></li>
                <li><a href="community.php" class="nav-link" target="_blank" rel="noopener noreferrer">Community</a></li>
                <li><a href="index.php#blog" class="nav-link">Resources</a></li>
                <li><a href="index.php#contact" class="nav-link">Contact</a></li>
                <?php if (isLoggedIn()): 
                    $user = getCurrentUser();
                ?>
                    <li class="user-menu">
                        <span>Welcome, <?php echo htmlspecialchars($user['username']); ?></span>
                        <a href="logout.php" class="btn-logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="user-menu">
                        <a href="login.php" class="nav-link">Login</a>
                        <a href="register.php" class="btn-logout">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>ML Nexus – Build Intelligence. Shape the Future.</h1>
            <p class="subheading">A community-driven Machine Learning portal for learners, builders, and innovators working on real-world AI problems.</p>
            <div class="cta-buttons">
                <a href="community.php" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Join the Community</a>
                <a href="#projects" class="btn btn-secondary">Explore Projects</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <h2 class="section-title">About ML Nexus</h2>
            <div class="about-content">
                <div class="about-item">
                    <h3>Who We Are</h3>
                    <p>ML Nexus is a machine learning-focused community created for students and developers who want to learn, build, and collaborate on real ML projects. We believe machine learning is best learned by building, experimenting, and sharing knowledge with others.</p>
                </div>
                <div class="about-item">
                    <h3>Our Mission</h3>
                    <p>To create a collaborative ML ecosystem where beginners and advanced learners grow together through hands-on projects and shared learning.</p>
                </div>
                <div class="about-item">
                    <h3>Our Vision</h3>
                    <p>To become a leading student-driven machine learning community producing industry-ready ML engineers and researchers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">What We Do</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🤖</div>
                    <h3>ML Projects</h3>
                    <p>Real-world projects using regression, classification, NLP, and computer vision. Build practical ML applications that solve actual problems.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Learning Roadmaps</h3>
                    <p>Structured paths from ML fundamentals to advanced topics. Follow curated learning paths designed for students and professionals.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🧠</div>
                    <h3>Research & Papers</h3>
                    <p>Discussions and breakdowns of important ML and AI research papers. Stay updated with the latest developments in machine learning.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🧪</div>
                    <h3>Experiments & Labs</h3>
                    <p>Hands-on experiments with datasets and models. Test your ideas and validate your ML concepts in our experimental environment.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌐</div>
                    <h3>Community & Collaboration</h3>
                    <p>Work with peers, mentors, and contributors. Join a vibrant community of ML enthusiasts and grow together through collaboration.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why ML Nexus Section -->
    <section class="why-section">
        <div class="container">
            <h2 class="section-title">Why ML Nexus?</h2>
            <ul class="why-list">
                <li>
                    <strong>Project-first learning</strong>
                    Learn by building real projects instead of just theory. Apply concepts immediately and see results.
                </li>
                <li>
                    <strong>Beginner to advanced friendly</strong>
                    Whether you're just starting or looking to advance your skills, we have resources and projects for all levels.
                </li>
                <li>
                    <strong>Real-world datasets</strong>
                    Work with actual datasets used in industry. Experience the challenges and opportunities of real ML problems.
                </li>
                <li>
                    <strong>Community-driven growth</strong>
                    Learn from peers, get feedback from mentors, and contribute to open-source ML projects.
                </li>
                <li>
                    <strong>Career-focused ML skills</strong>
                    Develop skills that employers are looking for. Build a portfolio that showcases your ML expertise.
                </li>
            </ul>
        </div>
    </section>

    <!-- Community & Events Section -->
    <section class="community-section" id="community">
        <div class="container">
            <h2 class="section-title">Community & Events</h2>
            <div class="community-content">
                <div class="community-card">
                    <h3>Upcoming Events</h3>
                    <ul>
                        <li>Monthly ML project challenges</li>
                        <li>Model-building hackathons</li>
                        <li>ML study jams</li>
                        <li>Paper reading sessions</li>
                        <li>Guest speaker workshops</li>
                        <li>Code review sessions</li>
                    </ul>
                </div>
                <div class="community-card">
                    <h3>Community Benefits</h3>
                    <ul>
                        <li>Build public ML projects</li>
                        <li>Learn with peers</li>
                        <li>Improve GitHub & portfolio</li>
                        <li>Get mentorship and feedback</li>
                        <li>Network with ML professionals</li>
                        <li>Access exclusive resources</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="projects" id="projects">
        <div class="container">
            <h2 class="section-title">Featured Projects</h2>
            <div class="projects-grid">
                <div class="project-card">
                    <h3>House Price Prediction</h3>
                    <p>Predict house prices using regression models. Analyze features like location, size, and amenities to build accurate price prediction models.</p>
                    <span class="project-tag">Regression</span>
                </div>
                <div class="project-card">
                    <h3>Spam Email Classifier</h3>
                    <p>Build a machine learning classifier to detect spam emails using NLP techniques and various classification algorithms.</p>
                    <span class="project-tag">Classification</span>
                </div>
                <div class="project-card">
                    <h3>Movie Recommendation System</h3>
                    <p>Create a recommendation engine using collaborative filtering and content-based approaches to suggest movies to users.</p>
                    <span class="project-tag">Recommendation</span>
                </div>
                <div class="project-card">
                    <h3>Image Classification (CNN)</h3>
                    <p>Implement convolutional neural networks for image classification tasks using popular datasets like CIFAR-10 or ImageNet.</p>
                    <span class="project-tag">Deep Learning</span>
                </div>
                <div class="project-card">
                    <h3>Sentiment Analysis (NLP)</h3>
                    <p>Analyze text sentiment using natural language processing techniques. Classify reviews, tweets, and comments as positive or negative.</p>
                    <span class="project-tag">NLP</span>
                </div>
                <div class="project-card">
                    <h3>Stock Price Prediction</h3>
                    <p>Predict stock market trends using time series analysis, LSTM networks, and various forecasting techniques.</p>
                    <span class="project-tag">Time Series</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog / Resources Section -->
    <section class="blog" id="blog">
        <div class="container">
            <h2 class="section-title">Resources & Articles</h2>
            <div class="blog-grid">
                <div class="blog-card">
                    <h3>Introduction to Machine Learning</h3>
                    <p>Learn the fundamentals of machine learning, including supervised and unsupervised learning, key algorithms, and real-world applications.</p>
                </div>
                <div class="blog-card">
                    <h3>ML vs Deep Learning</h3>
                    <p>Understand the differences between traditional machine learning and deep learning, and when to use each approach in your projects.</p>
                </div>
                <div class="blog-card">
                    <h3>How to Build Your First ML Project</h3>
                    <p>A step-by-step guide to building your first machine learning project, from data collection to model deployment.</p>
                </div>
                <div class="blog-card">
                    <h3>ML Roadmap for Students</h3>
                    <p>A comprehensive learning roadmap designed specifically for students, covering everything from basics to advanced topics.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <div class="contact-content">
                <p class="contact-text">Have questions or want to collaborate? Reach out to us.</p>
                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms</a>
                <a href="#">Community Guidelines</a>
            </div>
            <p>&copy; 2026 ML Nexus. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Close menu when clicking on a link (but allow target="_blank" links to work)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                // Only close menu if it's not a link that opens in new tab
                if (!link.hasAttribute('target')) {
                    hamburger.classList.remove('active');
                    navMenu.classList.remove('active');
                } else {
                    // For target="_blank" links, close menu after a short delay to allow navigation
                    setTimeout(() => {
                        hamburger.classList.remove('active');
                        navMenu.classList.remove('active');
                    }, 100);
                }
            });
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Active nav link on scroll
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        function setActiveNavLink() {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}` || link.getAttribute('href').includes(`#${current}`)) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', setActiveNavLink);

        // Smooth scroll for anchor links (only for same-page links)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                // Skip if link has target="_blank" or is external
                if (this.hasAttribute('target') || this.getAttribute('href').startsWith('http')) {
                    return;
                }
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Fade in animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.feature-card, .project-card, .about-item, .why-list li').forEach(el => {
            observer.observe(el);
        });

        // Contact form handling
        const contactForm = document.getElementById('contactForm');
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            contactForm.reset();
        });

        // Initial animation trigger
        window.addEventListener('load', () => {
            const heroContent = document.querySelector('.hero-content');
            heroContent.style.opacity = '1';
        });
    </script>
</body>
</html>
