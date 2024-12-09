-- Create the IS436 database if it doesn't exist
CREATE DATABASE IF NOT EXISTS IS436;

-- Use the IS436 database
USE IS436;

-- Step 1: Create the Users table for authentication (Sign Up / Log In)
CREATE TABLE IF NOT EXISTS Users (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Unique user ID
    username VARCHAR(50) NOT NULL UNIQUE,       -- Username must be unique
    email VARCHAR(100) NOT NULL UNIQUE,         -- Email must be unique
    password VARCHAR(255) NOT NULL,             -- Hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Record creation time
);

-- Step 2: Create the User table for profile data
CREATE TABLE IF NOT EXISTS User (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    auth_user_id INT UNIQUE,                    -- Link to Users table
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    age INT,
    gender ENUM('Male', 'Female', 'Other'),
    FOREIGN KEY (auth_user_id) REFERENCES Users(id) -- Foreign key constraint
);

-- Step 3: Create the HealthMetrics table, linked to User
CREATE TABLE IF NOT EXISTS HealthMetrics (
    metric_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    heart_rate INT,
    steps INT,
    sleep_duration FLOAT,
    calories INT,
    timestamp DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

-- Step 4: Create the WearableDevice table, linked to User
CREATE TABLE IF NOT EXISTS WearableDevice (
    device_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    device_type VARCHAR(50),
    manufacturer VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

-- Step 5: Create the Goal table, linked to User
CREATE TABLE IF NOT EXISTS Goal (
    goal_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    goal_type ENUM('Steps', 'Calories', 'Exercise Duration') NOT NULL,
    target_value FLOAT NOT NULL,
    status ENUM('Active', 'Completed', 'Inactive') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

-- Step 6: Create the HealthcareProvider table
CREATE TABLE IF NOT EXISTS HealthcareProvider (
    provider_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    specialty VARCHAR(100),
    contact_info VARCHAR(150)
);

-- Step 7: Create the DataSharingConsent table, linking User and HealthcareProvider
CREATE TABLE IF NOT EXISTS DataSharingConsent (
    consent_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    provider_id INT NOT NULL,
    shared_data VARCHAR(255),
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (provider_id) REFERENCES HealthcareProvider(provider_id)
);

-- Step 8: Insert Sample Data into Users table
INSERT INTO Users (username, email, password)
VALUES
('testuser', 'test@example.com', '$2y$10$e1Nv8s9l2ykm6FkqQOv3f.kqRxMZOh9wxFu6E6gI4B7f6QVe/q8Sa'); -- Password: test123

-- Step 9: Insert Sample Data into User table
INSERT INTO User (auth_user_id, name, email, age, gender)
VALUES
(1, 'Alice Johnson', 'alice.j@example.com', 28, 'Female');

-- Step 10: Insert Sample Data into HealthMetrics table
INSERT INTO HealthMetrics (user_id, heart_rate, steps, sleep_duration, calories, timestamp)
VALUES
(1, 80, 12000, 7.2, 2300, NOW());

-- Step 11: Insert Sample Data into WearableDevice table
INSERT INTO WearableDevice (user_id, device_type, manufacturer)
VALUES
(1, 'SmartWatch', 'Fitbit');

-- Step 12: Insert Sample Data into Goal table
INSERT INTO Goal (user_id, goal_type, target_value, status)
VALUES
(1, 'Steps', 10000, 'Active');

-- Step 13: Insert Sample Data into HealthcareProvider table
INSERT INTO HealthcareProvider (name, specialty, contact_info)
VALUES
('Dr. Emily Chen', 'Cardiology', 'emily.chen@healthcare.com');

-- Step 14: Insert Sample Data into DataSharingConsent table
INSERT INTO DataSharingConsent (user_id, provider_id, shared_data)
VALUES
(1, 1, 'heart_rate, steps');
