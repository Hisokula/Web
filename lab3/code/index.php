<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport"
          content = "width=device-width, user-scalable, initia;-scale=1.0, maximum-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title> Site </title>
</head>
<body>
    <div id = "form">
        <form action = "save.php" method = "post">

            <label for = "email">Email</label>
            <input type = "email" name = "email" required>

            <label for = "category">Category</label>
            <select name = "category" required>

                <option value = "cars">Cars</option>
                <option value = "other">Other</option>

            </select>

            <label for = "title">Title</label>
            <input type = "text" name = "title" required>

            <label for = "description">Description</label>
            <textarea rows = "3" name = "description" required></textarea>

            <input type = "submit" value = "Save">


        </form>
    </div>
    <div id = "table">
        <table>
            <thead>
            <th>Category</th>
            <th>Email</th>
            <th>Title</th>
            <th>Description</th>
            </thead>
            <tbody>
                <tr>
                    <td>other</td>
                    <td>fun@f.f</td>
                    <td>Joke#1</td>
                    <td>Maybe that's not that bad</td>
                </tr>
                <tr>
                    <td>cars</td>
                    <td>fun@f.f</td>
                    <td>Yamaha</td>
                    <td>Car.</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>