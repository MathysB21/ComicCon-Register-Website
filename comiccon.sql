-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS comicon_db;

-- Switch to the comicon_db database
USE comicon_db;

-- Create the guest_registration table
CREATE TABLE IF NOT EXISTS guest_registration (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  age INT NOT NULL,
  gender VARCHAR(10) NOT NULL,
  city VARCHAR(50) NOT NULL,
  event_location VARCHAR(100) NOT NULL,
  event_date DATE NOT NULL,
  preferred_comic_genre VARCHAR(50) NOT NULL,
  favourite_comic_char VARCHAR(100) NOT NULL,
  comic_interest TEXT NOT NULL,
  cosplay_preference VARCHAR(50) NOT NULL,
  cosplay_experience VARCHAR(50) NOT NULL,
  cosplay_awards VARCHAR(100) NOT NULL,
  instagram_handle VARCHAR(100) NOT NULL,
  preferred_guest VARCHAR(100) NOT NULL,
  subscribe_newsletter BOOLEAN NOT NULL
);
