<?php
session_start();

if (isset($_POST['register'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $city = $_POST['city'];
  $event_location = $_POST['event_location'];
  $event_date = $_POST['event_date'];
  $preferred_comic_genre = $_POST['comic_genre'];
  $favourite_comic_char = $_POST['favourite_character'];
  $comic_interest = $_POST['comic_interest'];
  $cosplay_preference = $_POST['cosplay_preference'];
  $cosplay_experience = $_POST['cosplay_experience'];
  $cosplay_awards = $_POST['cosplay_awards'];
  $instagram_handle = $_POST['instagram_handle'];
  $preferred_guest = $_POST['preferred_guest'];
  $subscribe_newsletter = $_POST['subscribe_newsletter'];

  $subscribe_newsletter = filter_var($subscribe_newsletter, FILTER_VALIDATE_BOOLEAN);

  // Connect to MySQL database
  $conn = mysqli_connect('localhost', 'root', '', 'comicon_db');

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Check if username already exists
  $sql = "SELECT * FROM guest_registration WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    header('Location: acc_exists.html');
  } else {
    // Insert new user into database
    $sql = "INSERT INTO guest_registration (first_name, last_name, email, phone_number, age, gender, city, event_location, event_date, preferred_comic_genre, favourite_comic_char, comic_interest, cosplay_preference, cosplay_experience, cosplay_awards, instagram_handle, preferred_guest, subscribe_newsletter)
    VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$age', '$gender', '$city', '$event_location', '$event_date', '$preferred_comic_genre', '$favourite_comic_char', '$comic_interest', '$cosplay_preference', '$cosplay_experience', '$cosplay_awards', '$instagram_handle', '$preferred_guest', '$subscribe_newsletter');
    ";

    if (mysqli_query($conn, $sql)) {
      // Registration successful
      header('Location: welcome.html');
    } else {
      // Registration failed
      header('Location: register_failed.html');
    }
  }

  mysqli_close($conn);
}
?>