<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Customer Registration</title>
    <style>
        body {
            margin: 100px;
            text-align: center;
            align: center;
        }

        input[type=text],
        [type=password],
        [type=number] ,
        [type=email] {
            width: 20%;
            margin: 8px 0;
            padding: 7px 10px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            width: 10%;
            padding: 9px 5px;
            margin: 5px 0;
            cursor: pointer;
            border: none;
            color: #ffffff;
            margin-left: 80px;
        }

        button:hover {
            opacity: 0.8;
        }

        #fn,
        #ln,
        #pwd,
        #em,
        #mn,
        #fm,
        #cy {
            font-family: 'Lato', sans-serif;
            color: gray;
        }

        #em {
            margin-left: 30px;
        }
    </style>
</head>

<body bgcolor="#E6E6FA">

    <form name="regi" action="{{route('customerRegister')}}" method="post">
        @csrf
        <h2>Registration Form</h2>

        <label for="r1" id="fn">First Name :</label>
        <input type="text" name="fname" id="r1" value="{{old('fname')}}">
        @error('fname')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br />

        <label for="r2" id="ln">Last Name :</label>
        <input type="text" name="lname" id="r2" value="{{old('lname')}}">
        @error('lname')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br />

        <label for="r5" id="em">Email :</label>
        <input type="email" name="email" id="r5" value="{{old('email')}}">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br />

        <label for="r4" id="pwd">Password :</label>
        <input type="password" name="password" id="r4" value="{{old('password')}}">
        @error('password')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br />

        <label for="r6" id="mn">Mobile No :</label>
        <input type="text" name="mobile" id="r6" value="{{old('mobile')}}">
        @error('mobile')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br />

        <button type="submit" value="Submit" id="button">Register</button>
        <a href="{{route('userLogin')}}">Login</a>

    </form>

    <script type="text/javascript">
        function save() {
            var user = document.getElementById("user").value;
            var pwd = document.getElementById("pwd").value;
            alert("username" + user + "password" + pwd);
        }
    </script>

</body>

</html>
