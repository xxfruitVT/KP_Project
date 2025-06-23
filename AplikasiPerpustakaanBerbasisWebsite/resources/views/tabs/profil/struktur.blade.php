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
      background: #f9f9f9;
      padding: 20px;
      position: relative;
    }

    #connectorCanvas {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 0;
      pointer-events: none;
    }

    .tree {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 40px;
      position: relative;
      z-index: 1;
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

    .orange { background-color: #ffd59e; }
    .blue { background-color: #a5d8ff; }
    .pink { background-color: #f9c7d5; }
    .green { background-color: #a9f7a3; }
    .yellow { background-color: #fff799; }
  </style>
</head>
<body>

<canvas id="connectorCanvas"></canvas>

<h2 style="text-align:center; margin-bottom: 30px;">STRUKTUR ORGANISASI SMP PADMAJAYA</h2>

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

<script>
 function drawLine(fromId, toId, ctx) {
  const fromEl = document.getElementById(fromId);
  const toEl = document.getElementById(toId);
  if (!fromEl || !toEl) return;

  const fromRect = fromEl.getBoundingClientRect();
  const toRect = toEl.getBoundingClientRect();

  const startX = fromRect.left + fromRect.width / 2 + window.scrollX;
  const startY = fromRect.bottom + window.scrollY;

  const endX = toRect.left + toRect.width / 2 + window.scrollX;
  const endY = toRect.top + window.scrollY;

  const midY = (startY + endY) / 2;

  ctx.beginPath();
  ctx.moveTo(startX, startY);     // down from source
  ctx.lineTo(startX, midY);       // vertical down halfway
  ctx.lineTo(endX, midY);         // horizontal to target X
  ctx.lineTo(endX, endY);         // vertical down to target
  ctx.strokeStyle = "#999";
  ctx.lineWidth = 2;
  ctx.stroke();
}


  function drawAllConnections() {
    const canvas = document.getElementById("connectorCanvas");
    const ctx = canvas.getContext("2d");

    canvas.width = document.body.scrollWidth;
    canvas.height = document.body.scrollHeight;

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

    connections.forEach(([from, to]) => drawLine(from, to, ctx));
  }

  window.addEventListener("load", drawAllConnections);
  window.addEventListener("resize", () => {
    // redraw on resize
    const canvas = document.getElementById("connectorCanvas");
    const ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawAllConnections();
  });
</script>

</body>
</html>
