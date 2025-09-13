<?php
// index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Loket - Sistem Antrian</title>
  <style>
  /* RESET */
  * { margin:0; padding:0; box-sizing:border-box; font-family:"Segoe UI", Arial, sans-serif; }
  body { display:flex; flex-direction:column; min-height:100vh; background:#f5f7fa; color:#333; }

  /* HEADER */
  header { background:#423f90; color:#fff; padding:20px; text-align:center; box-shadow:0 2px 4px rgba(0,0,0,0.15); }
  header h1 { margin:0; font-size:28px; font-weight:600; }

  /* MAIN */
  main { flex:1; display:flex; justify-content:center; align-items:center; padding:40px 20px; }
  .grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:30px; width:100%; max-width:1000px; }

  /* CARD */
  .card {
    background:#fff;
    border-radius:12px;
    padding:30px 20px;
    text-align:center;
    box-shadow:0 4px 8px rgba(0,0,0,0.08);
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow:0 6px 14px rgba(0,0,0,0.15);
  }
  .card h2 { margin-bottom:15px; font-size:22px; color:#423f90; }
  .card p { font-size:14px; margin-bottom:20px; color:#555; }
  .card a {
    display:inline-block;
    background:#f58436;
    color:#fff;
    text-decoration:none;
    padding:12px 20px;
    border-radius:8px;
    font-size:16px;
    transition:background 0.2s;
  }
  .card a:hover { background:#d2732f; }

  /* FOOTER */
  footer { background:#1e293b; color:#fff; padding:15px 20px; text-align:center; }
  footer p { margin:0; font-size:14px; color:#cbd5e1; }
  </style>
</head>
<body>

<header>
  <h1>Loket Antrian RS Permata Pamulang</h1>
</header>

<main>
  <div class="grid">
    <div class="card">
      <h2>Loket 1</h2>
      <p>Antrian Umum Loket 1</p>
      <a href="http://localhost/countertest/counterumumloket1.php?act=default">Buka Loket</a>
    </div>
    <div class="card">
      <h2>Loket 2</h2>
      <p>Antrian Umum Loket 2</p>
      <a href="http://localhost/countertest/counterumumloket2.php?act=default">Buka Loket</a>
    </div>
    <div class="card">
      <h2>Loket 3</h2>
      <p>Antrian BPJS Loket 3</p>
      <a href="http://localhost/countertest/counterumumloket3.php?act=default">Buka Loket</a>
    </div>
    <div class="card">
      <h2>Loket 4</h2>
      <p>Antrian BPJS Loket 4</p>
      <a href="http://localhost/countertest/counterumumloket4.php?act=default">Buka Loket</a>
    </div>
    <div class="card">
      <h2>Loket 5</h2>
      <p>Customer Service</p>
      <a href="http://localhost/countertest/counterumumloket5.php?act=default">Buka Loket</a>
    </div>
  </div>
</main>

<footer>
  <p>&copy; <?php echo date("Y"); ?> RS Permata Pamulang - Sistem Antrian</p>
</footer>

</body>
</html>
