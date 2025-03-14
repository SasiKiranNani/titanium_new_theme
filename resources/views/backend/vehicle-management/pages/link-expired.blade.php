<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Link Expired</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      /* background: radial-gradient(circle, #ff9a9e, #fad0c4); */
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: #333;
      overflow: hidden;
    }

    .container {
      text-align: center;
      background: linear-gradient(135deg, #ffffff, #f8f9fa);
      border: 2px solid #e74c3c;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      animation: fadeIn 1s ease-in-out;
      position: relative;
    }

    h1 {
      font-size: 2.5rem;
      color: #e74c3c;
      margin-bottom: 15px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    p {
      font-size: 1.2rem;
      margin-bottom: 30px;
      line-height: 1.6;
      color: #555;
    }

    a {
      text-decoration: none;
      color: #fff;
      background: linear-gradient(135deg, #3498db, #6dd5fa);
      padding: 12px 25px;
      border-radius: 50px;
      font-weight: bold;
      font-size: 1rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: inline-block;
      box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
    }

    a:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 15px rgba(52, 152, 219, 0.5);
    }

    .overlay {
      position: absolute;
      top: -20px;
      left: -20px;
      right: -20px;
      bottom: -20px;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.2));
      border-radius: 20px;
      z-index: -1;
      filter: blur(10px);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(0.9);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    /* Add responsive design */
    @media (max-width: 768px) {
      h1 {
        font-size: 2rem;
      }

      p {
        font-size: 1rem;
      }

      a {
        font-size: 0.9rem;
        padding: 10px 20px;
      }

      .container {
        padding: 30px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="overlay"></div>
    <h1>Link Expired</h1>
    <p>Oops! The link you are trying to access is no longer valid. If you need help, please contact support or try again.</p>
    <a href="/">Go Back Home</a>
  </div>
</body>
</html>
