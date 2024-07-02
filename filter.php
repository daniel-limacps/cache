<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Plate Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #itemList li {
            list-style-type: none;
            padding: 8px;
            border: 1px solid #ccc;
            margin-top: -1px; /* Prevent double borders */
            background-color: #f6f6f6;
            display: none;
        }
    </style>
</head>
<body>
    <input type="text" id="filterInput" placeholder="Filter by car plate...">
    <ul id="itemList"></ul>
    
    <script src="filter.js"></script>

</body>
</html>