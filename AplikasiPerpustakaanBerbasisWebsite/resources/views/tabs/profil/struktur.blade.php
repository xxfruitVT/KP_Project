<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Struktur Organisasi SMP Padmajaya</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      padding: 40px 10px;
      background: #f9f9f9;
    }

    .tree ul {
      display: flex;
      justify-content: center;
      position: relative;
      padding-top: 20px;
    }

    .tree li {
      list-style-type: none;
      text-align: center;
      padding: 20px 5px 0 5px;
      position: relative;
    }

    .tree li::before, .tree li::after {
      content: '';
      position: absolute;
      top: 0;
      border-top: 1px solid #ccc;
      width: 50%;
      height: 20px;
    }

    .tree li::before {
      right: 50%;
      border-right: 1px solid #ccc;
    }

    .tree li::after {
      left: 50%;
      border-left: 1px solid #ccc;
    }

    .tree li:only-child::before,
    .tree li:only-child::after {
      display: none;
    }

    .tree li:only-child {
      padding-top: 0;
    }

    .tree li > ul::before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      border-left: 1px solid #ccc;
      height: 20px;
    }

    .tree a {
      display: inline-block;
      padding: 10px;
      background: white;
      color: #333;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      border: 1px solid #ccc;
      border-radius: 5px;
      min-width: 160px;
    }

    .tree a.yellow { background-color: #fff799; }
    .tree a.green { background-color: #a9f7a3; }
    .tree a.pink { background-color: #f9c7d5; }
    .tree a.blue { background-color: #a5d8ff; }
    .tree a.orange { background-color: #ffd59e; }

    .tree {
      width: 100%;
    }

    .node-group {
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .line-down {
      height: 20px;
      width: 1px;
      background: #ccc;
      margin: 0 auto;
    }

    .spacer {
      height: 40px;
    }
  </style>
</head>
<body>

  <h2 style="text-align:center; margin-bottom: 20px;">STRUKTUR ORGANISASI SMP PADMAJAYA</h2>

  <div class="tree">
    <!-- Ketua Yayasan -->
    <ul>
      <li>
        <a class="orange" href="#">Ketua Yayasan<br><small>Zewwy Salim</small></a>
        <ul>
          <li>
            <!-- Garis horizontal -->
            <div class="node-group">
              <a class="orange" href="#">Komite Sekolah<br><small>Sholihin, S.Pd.I</small></a>
              <a class="blue" href="#">Kepala Sekolah<br><small>Jenny Chintia, S.Pd</small></a>
            </div>

            <!-- Bendahara & Operator -->
            <div class="spacer"></div>
            <div class="node-group">
              <a class="pink" href="#">Bendahara<br><small>Guntur Autura Syana, S.E</small></a>
              <a class="pink" href="#">Operator<br><small>Guntur Autura Syana, S.E</small></a>
            </div>

            <!-- Waka & TU -->
            <div class="spacer"></div>
            <div class="node-group">
              <a class="green" href="#">Tata Usaha<br><small>Revi Mariska, S.Pd</small></a>
              <a class="green" href="#">Waka Kurikulum<br><small>Evita Dewi Harnis, S.Pd</small></a>
              <div>
                <a class="green" href="#">Waka Kesiswaan<br><small>Angga Reka Saputra, S.Pd</small></a>
                <div class="line-down"></div>
                <a class="yellow" href="#">Koordinator BK<br><small>Revi Mariska, S.Pd</small></a>
              </div>
              <div>
                <a class="green" href="#">Waka Sarpras<br><small>Angga Reka Saputra, S.Pd</small></a>
                <div class="line-down"></div>
                <div class="node-group">
                  <a class="yellow" href="#">Ka Perpustakaan<br><small>Irma Suryani, S.Pd</small></a>
                  <a class="yellow" href="#">Ka Laboratorium<br><small>Evita Dewi Harnis, S.Pd</small></a>
                </div>
              </div>
            </div>

            <!-- Wali Kelas, Guru Mapel, Siswa -->
            <div class="spacer"></div>
            <div class="line-down"></div>
            <div class="node-group">
              <a class="yellow" href="#">Wali Kelas</a>
              <a class="yellow" href="#">Guru Mapel</a>
              <a class="yellow" href="#">Siswa</a>
            </div>

          </li>
        </ul>
      </li>
    </ul>
  </div>

</body>
</html>
