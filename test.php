<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
    <script>
        function searchPersonell(str) {
            if (str.length == 0) {
                document.getElementById("results").innerHTML = "";
                return;
            }
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("results").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "search_personnel.php?q=" + str, true);
            xhr.send();
        }
    </script>
</head>
<body>

<h2>Search Personell</h2>
<input type="text" onkeyup="searchPersonell(this.value)" placeholder="Search by name...">

<div id="results"></div>

</body>
</html>
