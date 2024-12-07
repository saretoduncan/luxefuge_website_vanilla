<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Email settings
    $to = "franklinkiplagat679@gmail.com"; // Replace with your email address
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Email content
    $email_subject = "New message from: $name";
    $email_body = "You have received a new message from the contact form.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message:\n$message";
    
    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "success"; // Send a success response
    } else {
        echo "error"; // Send an error response
    }
} else {
    echo "invalid"; // Invalid request
}
?>
