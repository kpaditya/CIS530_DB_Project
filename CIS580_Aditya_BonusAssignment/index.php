<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        button[type="submit"],
        button[type="reset"] {
            width: 150px;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>  
    <h1>Employee Search in Company Database</h1>
    <form action="search.php" method="GET">
        <label for="last_name">Enter the Last Name of the Employee to Search:</label>
        <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
        <div class="button-container">
            <button type="submit">Search</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</body>
</html>
