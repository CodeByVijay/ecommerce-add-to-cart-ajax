<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Login form css */
        body {
            margin: 0px;
            padding: 0px;
            text-align: center;
            width: 100%;
            background-color: #e6e6fae8;
        }

        input[type=text],
        input[type=password] {
            width: 20%;
            padding: 7px 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            width: 10%;
            padding: 9px 5px;
            margin: 10px 0px 0px 35px;
            cursor: pointer;
            border: none;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
        }

        button:hover {
            opacity: 0.8;
        }

        #un,
        #ps {
            font-family: 'Lato', sans-serif;
            color: gray;
        }


        #container {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 600;
            height: 300px;
            text-align: center;
        }

        /* Login form css */
    </style>
</head>

<body>

    <div id="container">
        @if (session()->get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session()->get('success') }}</strong>
            </div>
        @elseif (session()->get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session()->get('error') }}</strong>
            </div>
        @endif
        <form action="{{ route('adminLogin') }}" method="post" id="flogin">
            @csrf
            <div class="border-box">
                <h2>Login Form</h2>
                <label for="uname" id="un">Username:</label>
                <input type="text" name="email" placeholder="Enter Username" id="uname"><br />

                <label for="upass" id="ps">Password:</label>
                <input type="password" name="password" placeholder="Enter Password" id="upass"><br />

                <button type="submit" value="Login" id="submit">Login</button>
            </div>

        </form>
    </div>

</body>

</html>
