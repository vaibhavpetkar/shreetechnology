  <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/autoload.php'; // Path to PHPMailer autoloader
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $description = $_POST['message'];
        // Email setup
        $to = "recipient@example.com"; // Change this to your email address
        $subject = "New Contact Form Submission";
        $message = "Name: $name\n";
        $message = "Email: $email\n";
        $message .= "Phone Number: $phone\n";
        $message .= "Description:\n$description";
    
        // PHPMailer configuration
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'shree.technology6949@gmail.com'; // SMTP username
            $mail->Password   = 'dfyhrxjezmbuhnbh'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `ssl` also accepted
            $mail->Port       = 587; // TCP port to connect to
    
            //Recipients
            $mail->setFrom('shree.technology6949@gmail.com', 'Mailer');
            $mail->addAddress($to); // Add a recipient
    
            // Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body    = $message;
    
            $mail->send();
            echo "Email sent successfully!";
        } catch (Exception $e) {
            echo "Failed to send email. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Access denied.";
    }
    ?>
    