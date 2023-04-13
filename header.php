<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokeBattle</title>
    <style>
        nav ul {
            display: flex;
            justify-content: flex-start;
            gap: 0.5em;
        }

        nav ul li {
            list-style: none;
            border: 1px solid;
            padding: 1em;
        }

        nav ul li:hover {
            background-color: hsl(200, 0%, 80%);
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="/">Home</a>
            </li>

            <li>
                <a href="/trainers/trainers_list.php">Trainers</a>
            </li>
        </ul>
    </nav>
