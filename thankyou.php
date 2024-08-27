<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
 body {margin: 0;padding: 0;font-family: Arial, sans-serif;background-color: #000;color: #fff;}
.thank-you-container {display: flex;justify-content: center;align-items: center;height: 100vh;background: linear-gradient(135deg, #000 0%, #c82333 100%); }
.thank-you-message {text-align: center;background-color: #111;padding: 2rem;border-radius: 8px;box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);}
.thank-you-message h1 {font-size: 2.5rem;margin-bottom: 1rem;color: #dc3545; }
.thank-you-message p {font-size: 1.2rem;margin-bottom: 2rem;color: #ccc;}
.go-home-btn {display: inline-block;padding: 0.75rem 1.5rem;font-size: 1rem;color: #fff;background-color: #c82333;border: none;border-radius: 5px;text-decoration: none;transition: background-color 0.3s, transform 0.3s;}
.go-home-btn:hover {background-color: #dc3545;transform: translateY(-3px);}
.go-home-btn:active {background-color: #b00;transform: translateY(1px);}
.button-submit {background-color: #c82333;color: #fff;border: none;padding: 10px 20px;border-radius: 5px;cursor: pointer;width: 100%;font-size: 15px;font-weight: 500;border-radius: 10px;transition: 0.5s ease;text-decoration:none}
.button-submit:hover {background-color: #151717;border:1px solid #c82333}
    </style>
</head>
<body>
    <div class="thank-you-container">
        <div class="thank-you-message">
            <h1>Thank You!</h1>
            <p>Your submission has been received. We will get back to you shortly.</p>
            <a href="index.php" class="button-submit">Go to Home</a>
        </div>
    </div>
</body>
</html>
