<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Toko Bunga</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #ffdde1, #ee9ca7);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
        }

        .header {
            width: 100%;
            padding: 1rem;
            text-align: center;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            border-radius: 8px;
        }

        .header h1 {
            font-size: 2rem;
            color: #ee9ca7;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            width: 100%;
            max-width: 1200px;
        }

        .card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card h2 {
            font-size: 1.5rem;
            color: #ee9ca7;
            margin-bottom: 1rem;
        }

        .card p {
            font-size: 1rem;
            color: #555;
        }

        .btn {
            margin-top: 1rem;
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #ee9ca7;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #ffdde1;
            color: #333;
        }

        .footer {
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Dashboard Toko Bunga</h1>
    </div>

    <div class="dashboard">
        <div class="card">
            <h2>Produk</h2>
            <p>Lihat dan kelola produk yang tersedia.</p>
            <a href="manage_products.php" class="btn">Kelola Produk</a>
        </div>
        <div class="card">
            <h2>Pesanan</h2>
            <p>Kelola pesanan pelanggan Anda.</p>
            <a href="manage_orders.php" class="btn">Kelola Pesanan</a>
        </div>
        <div class="card">
            <h2>Stok</h2>
            <p>Periksa dan perbarui stok bunga.</p>
            <a href="manage_stock.php" class="btn">Kelola Stok</a>
        </div>
        <div class="card">
            <h2>Laporan</h2>
            <p>Lihat laporan penjualan dan statistik.</p>
            <a href="view_reports.php" class="btn">Lihat Laporan</a>
        </div>
        <div class="card">
            <h2>Pengaturan</h2>
            <p>Atur profil toko dan pengaturan lainnya.</p>
            <a href="settings.php" class="btn">Pengaturan</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Toko Bunga Anda. All Rights Reserved.</p>
    </div>
</body>
</html>
