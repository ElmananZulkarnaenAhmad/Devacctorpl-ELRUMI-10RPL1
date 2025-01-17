<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login, Register, and Address</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #89fffd, #ef32d9);
            color: #fff;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
        }

        .form-group input:focus {
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.8);
        }

        .btn {
            width: 100%;
            padding: 0.8rem;
            background: #ef32d9;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #89fffd;
        }

        .toggle {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .toggle a {
            color: #fff;
            text-decoration: underline;
            cursor: pointer;
        }

        .error, .success {
            font-size: 0.9rem;
            margin-top: 1rem;
            text-align: center;
        }

        .error {
            color: #ff6b6b;
        }

        .success {
            color: #6bff6b;
        }
    </style>
</head>
<body>
    <div class="container" id="form-container">
        <h1 id="form-title">Login</h1>
        <?php
        session_start();
        $db = new mysqli('localhost', 'root', '', 'register');

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];
            $username = $db->real_escape_string($_POST['username']);
            $password = $db->real_escape_string($_POST['password']);

            if ($action === 'login') {
                $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $result = $db->query($query);

                if ($result->num_rows > 0) {
                    $_SESSION['username'] = $username;
                    echo "<div class='success'>Login berhasil! Selamat datang, $username.</div>";
                } else {
                    echo "<div class='error'>Username atau password salah!</div>";
                }
            } elseif ($action === 'register') {
                $address = $db->real_escape_string($_POST['address']);
                $query = "INSERT INTO users (username, password, address) VALUES ('$username', '$password', '$address')";

                if ($db->query($query)) {
                    echo "<div class='success'>Registrasi berhasil! Silakan login.</div>";
                } else {
                    echo "<div class='error'>Terjadi kesalahan: " . $db->error . "</div>";
                }
            }
        }
        ?>

        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <div class="form-group" id="address-group" style="display: none;">
                <label for="address">Alamat</label>
                <input type="text" id="address" name="address" placeholder="Masukkan alamat">
            </div>
            <input type="hidden" id="action" name="action" value="login">
            <button type="submit" class="btn" id="submit-btn">Login</button>
        </form>

        <div class="toggle">
            Belum punya akun? <a id="toggle-link" onclick="toggleForm()">Daftar</a>
        </div>
    </div>

    <script>
        function toggleForm() {
            const formTitle = document.getElementById('form-title');
            const submitBtn = document.getElementById('submit-btn');
            const toggleLink = document.getElementById('toggle-link');
            const actionInput = document.getElementById('action');
            const addressGroup = document.getElementById('address-group');

            if (actionInput.value === 'login') {
                formTitle.textContent = 'Register';
                submitBtn.textContent = 'Daftar';
                toggleLink.textContent = 'Login';
                actionInput.value = 'register';
                addressGroup.style.display = 'block';
            } else {
                formTitle.textContent = 'Login';
                submitBtn.textContent = 'Login';
                toggleLink.textContent = 'Daftar';
                actionInput.value = 'login';
                addressGroup.style.display = 'none';
            }
        }
    </script>
</body>
</html>
