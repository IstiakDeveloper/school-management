<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mousumi Biddayaniketon</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    <style>
        .login-container {
            display: flex;
            background-color: #f9f9f9;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-box {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            display: flex;
            flex-direction: column; /* Added */
        }
        @media (min-width: 768px) { /* Added */
            .login-box {
                flex-direction: row;
            }
        }
        .login-form {
            padding: 20px; /* Adjusted */
            flex: 1;
        }
        @media (min-width: 768px) { /* Added */
            .login-form {
                padding: 40px;
            }
        }
        .login-image {
            background-color: #6366f1;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px; /* Adjusted */
            text-align: center;
            flex: 1;
        }
        @media (min-width: 768px) { /* Added */
            .login-image {
                padding: 40px;
            }
        }
        .login-image img {
            border-radius: 50%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div>
        <div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
