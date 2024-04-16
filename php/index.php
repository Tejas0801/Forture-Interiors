<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "snani.1997@gmail.com"; // Replace with your email address

    // Set email headers
    $headers = "From: $name <$to>\r\n";
    $headers .= "Reply-To: $name <$to>\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Construct email body
    $email_body = "<h2>New Message from Contact Form</h2>";
    $email_body .= "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Phone:</strong> $phone</p>";
    $email_body .= "<p><strong>Subject:</strong> $subject</p>";
    $email_body .= "<p><strong>Message:</strong> $message</p>";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        // Email sent successfully
        echo json_encode(array("status" => "success", "message" => "Your message has been sent successfully."));
    } else {
        // Failed to send email
        echo json_encode(array("status" => "error", "message" => "Failed to send message. Please try again later."));
    }
} else {
    // Invalid request method
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>

