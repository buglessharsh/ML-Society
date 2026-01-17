<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ML Projects - ML Portal</title>
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
                <li><a href="projects.php" class="active">Projects</a></li>
                <li><a href="community.php">Community</a></li>
            </ul>
        </div>
    </nav>

    <!-- Projects Content -->
    <section class="page-container">
        <div class="container">
            <h1 class="page-title">Beginner-Friendly ML Projects</h1>
            <p class="page-subtitle">Hands-on projects to build your ML portfolio</p>

            <!-- Project Cards Grid -->
            <div class="content-grid">
                <!-- Project 1 -->
                <div class="content-card fade-in">
                    <h3>🏠 House Price Prediction</h3>
                    <p><strong>Difficulty:</strong> Beginner</p>
                    <p>Predict house prices based on features like size, location, number of rooms. Learn linear regression, data preprocessing, and feature engineering. Use datasets from Kaggle or UCI repository.</p>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-top: 1rem;">
                        <strong>Skills:</strong> Linear Regression, Pandas, Data Cleaning
                    </p>
                </div>

                <!-- Project 2 -->
                <div class="content-card fade-in">
                    <h3>📧 Email Spam Classifier</h3>
                    <p><strong>Difficulty:</strong> Beginner</p>
                    <p>Build a classifier that can distinguish between spam and legitimate emails. Practice text preprocessing, feature extraction, and classification algorithms like Naive Bayes or Logistic Regression.</p>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-top: 1rem;">
                        <strong>Skills:</strong> Text Processing, Naive Bayes, Classification
                    </p>
                </div>

                <!-- Project 3 -->
                <div class="content-card fade-in">
                    <h3>🐱 Cat vs Dog Image Classifier</h3>
                    <p><strong>Difficulty:</strong> Intermediate</p>
                    <p>Create a deep learning model to classify images of cats and dogs. Learn about CNNs, image preprocessing, data augmentation, and using pre-trained models like VGG or ResNet.</p>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-top: 1rem;">
                        <strong>Skills:</strong> CNN, TensorFlow/Keras, Image Processing
                    </p>
                </div>

                <!-- Project 4 -->
                <div class="content-card fade-in">
                    <h3>💬 Sentiment Analysis of Reviews</h3>
                    <p><strong>Difficulty:</strong> Beginner-Intermediate</p>
                    <p>Analyze customer reviews to determine if they're positive, negative, or neutral. Work with text data, use NLP techniques, and train classification models. Great for learning NLP basics.</p>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-top: 1rem;">
                        <strong>Skills:</strong> NLP, Text Classification, Sentiment Analysis
                    </p>
                </div>

                <!-- Project 5 -->
                <div class="content-card fade-in">
                    <h3>🛒 Customer Segmentation</h3>
                    <p><strong>Difficulty:</strong> Intermediate</p>
                    <p>Group customers into segments based on their purchasing behavior using clustering algorithms like K-Means. Visualize segments and create targeted marketing strategies.</p>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-top: 1rem;">
                        <strong>Skills:</strong> Clustering, K-Means, Data Visualization
                    </p>
                </div>

                <!-- Project 6 -->
                <div class="content-card fade-in">
                    <h3>🎵 Music Genre Classifier</h3>
                    <p><strong>Difficulty:</strong> Intermediate</p>
                    <p>Classify music tracks into genres using audio features. Extract features from audio files, preprocess data, and train a classifier. Introduces you to audio signal processing.</p>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-top: 1rem;">
                        <strong>Skills:</strong> Audio Processing, Feature Extraction, Classification
                    </p>
                </div>

                <!-- Project 7 -->
                <div class="content-card fade-in">
                    <h3>🎮 Handwritten Digit Recognition</h3>
                    <p><strong>Difficulty:</strong> Beginner</p>
                    <p>Build a neural network to recognize handwritten digits (0-9) using the famous MNIST dataset. Perfect first deep learning project to understand neural networks and training process.</p>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-top: 1rem;">
                        <strong>Skills:</strong> Neural Networks, MNIST, Deep Learning Basics
                    </p>
                </div>

                <!-- Project 8 -->
                <div class="content-card fade-in">
                    <h3>📊 Sales Forecasting</h3>
                    <p><strong>Difficulty:</strong> Intermediate</p>
                    <p>Predict future sales based on historical data. Learn time series analysis, work with temporal data, and use regression or LSTM models for forecasting.</p>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-top: 1rem;">
                        <strong>Skills:</strong> Time Series, Regression, Data Analysis
                    </p>
                </div>
            </div>

            <!-- Project Tips -->
            <div class="content-card fade-in" style="margin-top: 3rem; text-align: center;">
                <h3 style="color: white; margin-bottom: 1rem;">💡 Tips for ML Projects</h3>
                <p style="color: rgba(255, 255, 255, 0.85); line-height: 1.8;">
                    <strong>Start simple:</strong> Begin with basic projects and gradually increase complexity.<br>
                    <strong>Use public datasets:</strong> Kaggle, UCI, and Google Dataset Search have tons of free data.<br>
                    <strong>Document everything:</strong> Write clear README files explaining your approach and results.<br>
                    <strong>GitHub is your friend:</strong> Share your code, get feedback, and build your portfolio.<br>
                    <strong>Focus on learning:</strong> Don't worry about perfection, focus on understanding the process.
                </p>
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
