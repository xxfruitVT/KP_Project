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

    html, body {
      height: 100%;
      font-family: 'Poppins', sans-serif;
      background: #f9f9f9;
    }

   

    .container {
      position: relative;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    #connectorCanvas {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 0;
      pointer-events: none;
    }

    .tree {
      position: relative;
      z-index: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 40px;
    }

    .level {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }

    .box {
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 10px;
      min-width: 160px;
      text-align: center;
      font-size: 14px;
      font-weight: 600;
      position: relative;
    }

    .box small {
      display: block;
      font-weight: normal;
      font-size: 12px;
      margin-top: 4px;
    }

    .orange { background-color: #ffd59e; }
    .blue   { background-color: #a5d8ff; }
    .pink   { background-color: #f9c7d5; }
    .green  { background-color: #a9f7a3; }
    .yellow { background-color: #fff799; }

  </style>
</head>
<body>

<div class="container" id="treeContainer">
  <canvas id="connectorCanvas"></canvas>

  <h2>STRUKTUR ORGANISASI SMP PADMAJAYA</h2>

  <div class="tree">
    <!-- Level 1 -->
    <div class="level" id="level1">
      <div class="box orange" id="yayasan">Ketua Yayasan<br><small>Zewwy Salim</small></div>
    </div>

    <!-- Level 2 -->
    <div class="level" id="level2">
      <div class="box orange" id="komite">Komite Sekolah<br><small>Sholihin, S.Pd.I</small></div>
      <div class="box blue" id="kepala">Kepala Sekolah<br><small>Jenny Chintia, S.Pd</small></div>
    </div>

    <!-- Level 3 -->
    <div class="level" id="level3">
      <div class="box pink" id="bendahara">Bendahara<br><small>KMS. Guntur Autura Syanai, S.E</small></div>
      <div class="box pink" id="operator">Operator<br><small>Guntur Autura Syana, S.E</small></div>
    </div>

    <!-- Level 4 -->
    <div class="level" id="level4">
      <div class="box green" id="tu">Tata Usaha<br><small>Revi Mariska, S.Pd</small></div>
      <div class="box green" id="kurikulum">Waka Kurikulum<br><small>Evita Dewi Harnis, S.Pd</small></div>
      <div class="box green" id="kesiswaan">Waka Kesiswaan<br><small>Angga Reka Saputra, S.Pd</small></div>
      <div class="box green" id="sarpras">Waka Sarpras<br><small>Angga Reka Saputra, S.Pd</small></div>
    </div>

    <!-- Level 5 -->
    <div class="level" id="level5">
      <div class="box yellow" id="bk">Koordinator BK<br><small>Revi Mariska, S.Pd</small></div>
      <div class="box yellow" id="perpus">Ka Perpustakaan<br><small>Irma Suryani, S.Pd</small></div>
      <div class="box yellow" id="lab">Ka Laboratorium<br><small>Evita Dewi Harnis, S.Pd</small></div>
    </div>

    <!-- Level 6 -->
    <div class="level" id="level6">
      <div class="box yellow" id="walas">Wali Kelas</div>
      <div class="box yellow" id="mapel">Guru Mapel</div>
      <div class="box yellow" id="siswa">Siswa</div>
    </div>
  </div>
</div>


<script>
  function drawLine(fromId, toId, ctx, offsetTop) {
    const fromEl = document.getElementById(fromId);
    const toEl = document.getElementById(toId);
    if (!fromEl || !toEl) return;

    const fromRect = fromEl.getBoundingClientRect();
    const toRect = toEl.getBoundingClientRect();

    const startX = fromRect.left + fromRect.width / 2 + window.scrollX;
    const startY = fromRect.bottom + window.scrollY - offsetTop;

    const endX = toRect.left + toRect.width / 2 + window.scrollX;
    const endY = toRect.top + window.scrollY - offsetTop;

    const midY = (startY + endY) / 2;

    ctx.beginPath();
    ctx.moveTo(startX, startY);
    ctx.lineTo(startX, midY);
    ctx.lineTo(endX, midY);
    ctx.lineTo(endX, endY);
    ctx.strokeStyle = "#999";
    ctx.lineWidth = 2;
    ctx.stroke();
  }

  function drawAllConnections() {
    const canvas = document.getElementById("connectorCanvas");
    const container = document.getElementById("treeContainer");
    const ctx = canvas.getContext("2d");

    // Hitung posisi absolut container
    const containerRect = container.getBoundingClientRect();
    const offsetTop = container.offsetTop;

    // Atur ukuran canvas hanya sebesar container, bukan seluruh dokumen
    canvas.width = container.offsetWidth;
    canvas.height = container.offsetHeight;

    canvas.style.top = container.offsetTop + "px";
    canvas.style.left = container.offsetLeft + "px";

    const connections = [
      ["yayasan", "komite"],
      ["yayasan", "kepala"],
      ["kepala", "bendahara"],
      ["kepala", "operator"],
      ["operator", "tu"],
      ["operator", "kurikulum"],
      ["operator", "kesiswaan"],
      ["operator", "sarpras"],
      ["kesiswaan", "bk"],
      ["sarpras", "perpus"],
      ["sarpras", "lab"],
      ["lab", "walas"],
      ["lab", "mapel"],
      ["lab", "siswa"]
    ];

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    connections.forEach(([from, to]) => drawLine(from, to, ctx, offsetTop));
  }

  window.addEventListener("load", () => {
    setTimeout(drawAllConnections, 100); // supaya box sempat dirender
  });
  window.addEventListener("resize", drawAllConnections);
</script>


</body>
</html>
