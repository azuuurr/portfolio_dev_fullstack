-- Database Creation
CREATE DATABASE portfolio;
USE portfolio;

-- Table Creation
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image_link VARCHAR(255),
    competences VARCHAR(255)
);

CREATE TABLE project_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    category VARCHAR(255),
    client VARCHAR(255),
    project_date DATE,
    description TEXT,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);

-- Data Insertion
INSERT INTO projects (name, description, image_link, competences) VALUES
('ArtConnect', 'Platform connecting artists and galleries with augmented reality artwork displays.', 'assets/img/portfolio/artconnect.jpg', 'Compétences interpersonnelles'),
('EcoMarket', 'Marketplace for trading or selling recycled products with ecological tracking.', 'assets/img/portfolio/ecomarket.png', 'Responsabilité'),
('GameForge', 'Collaborative platform to create 2D mini-games directly online.', 'assets/img/portfolio/gameforge.jpg', 'SQL'),
('WellnessLoop', 'Social network focused on mental wellness with meditations and forums.', 'assets/img/portfolio/wellnessloop.png', 'Compétences interpersonnelles'),
('Chef à la Carte', 'Book private chefs based on culinary preferences and location.', 'assets/img/portfolio/alacarte.png', 'Responsabilité'),
('CultureSphere', 'Interactive portal to explore global cultures with videos and quizzes.', 'assets/img/portfolio/sphere.jpg', 'Compétences interpersonnelles');

INSERT INTO project_details (project_id, category, client, project_date, description) VALUES
(1, 'Web Design', 'ASU Company', '2020-03-01', 'ArtConnect is a platform designed to bridge the gap between artists and galleries...'),
(2, 'Web Design', 'ASU Company', '2020-03-01', 'EcoMarket is an online marketplace dedicated to promoting sustainable living...'),
(3, 'Web Design', 'ASU Company', '2020-03-01', 'GameForge empowers creators to design and share 2D mini-games entirely online...'),
(4, 'Web Design', 'ASU Company', '2020-03-01', 'WellnessLoop is a social network focused on mental health and well-being...'),
(5, 'Web Design', 'ASU Company', '2020-03-01', 'Chef à la Carte connects users with professional chefs who create custom dining experiences...'),
(6, 'Web Design', 'ASU Company', '2020-03-01', 'CultureSphere is an educational platform that takes users on a journey through global cultures...');
