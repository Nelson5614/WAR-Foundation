<!DOCTYPE html>
<html>
<head>
    <title>Student File Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header .logo {
            max-width: 100px;
        }
        .header .student-id {
            font-weight: bold;
            color: red;
        }
        .info {
            margin-top: 20px;
        }
        .info div {
            margin-bottom: 10px;
        }
        .info label {
            font-weight: bold;
        }
        .info p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <!-- Replace with your logo image path -->
               <!-- <img src="{{ asset('path/to/logo.png') }}" alt="Logo" class="logo"> -->
               <h1>logo</h1>
            </div>
            <div class="student-id">
                ID: #00{{ $studentfile->id }}
            </div>
        </div>
        <div class="info">
            <div>
                <label>Name:</label>
                <p>{{ $studentfile->name }}</p>
            </div>
            <div>
                <label>Last Name:</label>
                <p>{{ $studentfile->surname }}</p>
            </div>
            <div>
                <label>Email:</label>
                <p>{{ $studentfile->email }}</p>
            </div>
            <div>
                <label>Address:</label>
                <p>{{ $studentfile->address }}</p>
            </div>
            <div>
                <label>Phone:</label>
                <p>{{ $studentfile->phone }}</p>
            </div>
            <div>
                <label>Note:</label>
                <p>{{ $studentfile->description }}</p>
            </div>
        </div>
    </div>
</body>
</html>
