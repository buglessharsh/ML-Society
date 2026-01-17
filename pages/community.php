<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community - ML Portal</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <h2>ML Portal</h2>
            </div>
            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="roadmap.php">Roadmap</a></li>
                <li><a href="resources.php">Resources</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="community.php" class="active">Community</a></li>
            </ul>
        </div>
    </nav>

    <!-- Community Content -->
    <section class="page-container">
        <div class="container">
            <h1 class="page-title">Join Our ML Community</h1>
            <p class="page-subtitle">Connect with fellow learners, share knowledge, and grow together</p>

            <!-- Community Info Section -->
            <div class="content-grid" style="margin-bottom: 3rem;">
                <div class="content-card fade-in">
                    <h3>🤝 What We Offer</h3>
                    <p><strong>Study Groups:</strong> Join study groups and learn together with peers.</p>
                    <p><strong>Project Collaboration:</strong> Find teammates for your ML projects.</p>
                    <p><strong>Mentorship:</strong> Get guidance from experienced students and alumni.</p>
                    <p><strong>Workshops:</strong> Attend regular workshops and coding sessions.</p>
                </div>

                <div class="content-card fade-in">
                    <h3>📢 Community Guidelines</h3>
                    <p><strong>Be Respectful:</strong> Treat everyone with kindness and respect.</p>
                    <p><strong>Share Knowledge:</strong> Help others learn and don't hesitate to ask questions.</p>
                    <p><strong>Stay Active:</strong> Participate in discussions and community events.</p>
                    <p><strong>Give Back:</strong> Share resources, tutorials, and project insights.</p>
                </div>

                <div class="content-card fade-in">
                    <h3>🌟 Why Join Us?</h3>
                    <p><strong>Network:</strong> Build connections with like-minded students.</p>
                    <p><strong>Learn Together:</strong> Collaborative learning accelerates your growth.</p>
                    <p><strong>Real Projects:</strong> Work on real-world problems and build your portfolio.</p>
                    <p><strong>Career Support:</strong> Get advice on internships, jobs, and career paths.</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="form-container fade-in">
                <h2 style="color: white; text-align: center; margin-bottom: 2rem;">Get in Touch</h2>
                <form id="contactForm" method="POST" action="#">
                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Your Email *</label>
                        <input type="email" id="email" name="email" placeholder="your.email@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" placeholder="Tell us about yourself, your interests, or ask any questions..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Send Message</button>
                </form>

                <p style="text-align: center; color: rgba(255, 255, 255, 0.7); margin-top: 1.5rem; font-size: 0.9rem;">
                    We'll get back to you as soon as possible. Looking forward to connecting with you!
                </p>
            </div>

            <!-- Community Links -->
            <div style="text-align: center; margin-top: 3rem;">
                <p style="color: rgba(255, 255, 255, 0.9); font-size: 1.1rem; margin-bottom: 1rem;">
                    Connect with us on social media and join our online communities:
                </p>
                <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                    <div class="content-card" style="max-width: 200px;">
                        <h3 style="font-size: 1.1rem;">💬 Discord</h3>
                        <p style="font-size: 0.9rem;">Join our Discord server for real-time discussions</p>
                    </div>
                    <div class="content-card" style="max-width: 200px;">
                        <h3 style="font-size: 1.1rem;">📱 Telegram</h3>
                        <p style="font-size: 0.9rem;">Stay updated with announcements and events</p>
                    </div>
                    <div class="content-card" style="max-width: 200px;">
                        <h3 style="font-size: 1.1rem;">🐙 GitHub</h3>
                        <p style="font-size: 0.9rem;">Collaborate on open-source ML projects</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Student Tech Community. All rights reserved.</p>
        </div>
    </footer>

    <script src="../assets/js/main.js"></script>
</body>
</html>
