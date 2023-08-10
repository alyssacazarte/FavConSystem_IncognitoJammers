<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Status</title>
    <style>
        /* Add your custom styles here */

        /* Reset default styles for email clients */
        body, h1, h2, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header styles */
        .header {
            background-color: #f5f5f5;
            padding: 10px;
        }

        /* Content styles */
        .content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
        }

        /* Footer styles */
        .footer {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: center;
        }

        /* Link styles */
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Appointment Status</h1>
        </div>

        <div class="content">
            @if ($status === 'Approved')
                <h2>Thank You! Your Appointment has been Approved</h2>
                <br>
                <p>I hope this message finds you well. I am delighted to inform you that your appointment has been successfully approved! We are thrilled to have the opportunity to provide you with our personal services.</p>
                <br>
                <p>We are looking forward to meeting you on the said Date and Time. Rest assured, we will make every effort to ensure that your experience with us is exceptional.</p>
                <br>
                <p>Should you have any questions or require further information before the appointment, please don't hesitate to reach out to us.Once again, thank you for choosing our services. We are excited to serve you and provide you with the best possible experience.</p>
                <br>
                <p>See you soon!</p>
            @elseif ($status === 'Rejected')
                <h2>Appointment Rejected</h2>
                <br>
                <p>I hope this email finds you well. We regret to inform you that, unfortunately, we are unable to accept your appointment request at this time.</p>
                <br>
                <p>Please rest assured that we value your time and interest in our services. If you have any questions or would like to discuss the declined appointment further, please feel free to contact us. We are more than willing to assist you and explore other options that may better suit your needs.</p>
            @else
                <h2>Thank You! Your Appointment Status</h2>
                <p>Your appointment status is: {{ $status }}</p>
            @endif
        </div>

        <div class="footer">
            <p>For any inquiries, please contact us at <a href="fjporras04@gmail.com">fjporras04@gmail.com</a></p>
        </div>
    </div>
</body>
</html>

