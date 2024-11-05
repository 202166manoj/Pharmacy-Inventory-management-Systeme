<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System Interface</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: url('images/fe.jpeg') no-repeat center center fixed; /* Use your photograph here */
            background-size: cover;
            color: #fff;
        }
        header {
            width: 100%;
            padding: 20px 0;
            background-color: rgba(0, 0, 0, 0.7);
            text-align: center;
            position: absolute;
            top: 0;
        }
        header h1 {
            margin: 0;
            font-size: 36px;
        }
        .social-icons {
            margin-top: 10px;
        }
        .social-icons img {
            width: 40px;
            height: 40px;
            margin: 0 10px;
        }
        .pharmacy-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 160px;
        }
        .pharmacy-buttons a {
            margin: 10px;
            text-decoration: none;
        }
        .pharmacy-buttons button {
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            background-color: rgba(255, 152, 0, 0.8);
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .pharmacy-buttons button:hover {
            background-color: rgba(230, 137, 0, 0.8);
            transform: translateY(-3px);
        }
        .pharmacy-buttons button:active {
            transform: translateY(0);
        }
        @media (max-width: 600px) {
            .pharmacy-buttons button {
                width: 100%;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Koswatta Pharmacy (Pvt).Ltd</h1>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><img src="images/images.jpeg" alt="Facebook"></a>
            <a href="https://instagram.com" target="_blank"><img src="images/1.png" alt="Instagram"></a>
            <a href="https://twitter.com" target="_blank"><img src="images/images.png" alt="Twitter"></a>
        </div>
    </header>
    
    <div class="pharmacy-buttons">
        <a href="home.php"><button>Koswatta Pharmacy</button></a>
        <a href="home.php"><button>Rabawewa Pharmacy</button></a>
        <a href="home.php"><button>kobeigane pharmacy</button></a>
        <a href="home.php"><button>Hunugama Pharmacy</button></a>
    </div>
</body>
</html>
