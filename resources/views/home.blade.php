<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fenwich Tree (Binary Index Tree)</title>
    <link rel="stylesheet" href="">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            height: 100vh;
            padding: 20px;
        }
        .content {
            border: solid 2px green;
            height: 500px;
        }

        .container h1 {
            text-align: center;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        /*tr:nth-child(even) {
            background-color: #dddddd;
        }*/
    </style>
</head>
<body>
    <div class="container">
        <h1>Fenwich Tree (Binary Index Tree)</h1>
        <div class="content">


            <table>
                <tr>
                    <td></td>
                    @foreach($A as $index => $val)
                        <td>{{$index}}</td>
                    @endforeach()
                </tr>
                <tr>
                    <td>A</td>
                    @foreach($A as $val)
                        <td>{{$val}}</td>
                    @endforeach()
                </tr>
                <tr>
                    <td>S</td>
                    @foreach($S as $val)
                        <td>{{$val}}</td>
                    @endforeach()
                </tr>
            </table>


            {{-- <label for="">A</label>
            @foreach($A as $val)
                <span class="number">{{$val}}</span>
            @endforeach()
            <hr>
            <label for="">S</label>
            @foreach($S as $val)
                <span class="number">{{$val}}</span>
            @endforeach() --}}
        </div>
    </div>
</body>
</html>
