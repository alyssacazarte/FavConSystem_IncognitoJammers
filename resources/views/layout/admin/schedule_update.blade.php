<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Schedule</title>
  <style>
     body {
      background: linear-gradient(to right, #F8AF5B, #f8f6f2);
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 20px;
    }

    .form-container {
      width: 90%;
      max-width: 500px;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #726767;
    }

    label {
      margin-top: 10px;
      color: #FF7C03;
      font-weight: 600;
    }

    input{
      width: 96%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #F8AF5B;
      border-radius: 4px;
      color: #FF7C03;
      outline: none;

    }
    textarea {
      width: 96%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #F8AF5B;
      border-radius: 4px;
      color: #FF7C03;
      outline: none;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #FF7C03;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #FF7C03;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="form-container">
      <form action="/admin/schedule/update" method="POST">
        @csrf <!-- Include this line if using Laravel's CSRF protection -->
        <h1>Update Schedule</h1>
        <a href="/schedule-dashboard">Back</a>
        <input type="hidden" name="id" value="{{ $data['id'] }}">

        <label for="service_id">Service ID:</label>
        <input type="text" id="service_id" value="{{ $data['service_id'] }}" name="service_id" required>

        <label for="date">Date:</label>
        <input type="date" id="date" value="{{ $data['date'] }}" name="date" required>

        <label for="status">Status:</label>
        <input type="text" id="status" value="{{ $data['status'] }}" name="status" required><br>
        <br>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>