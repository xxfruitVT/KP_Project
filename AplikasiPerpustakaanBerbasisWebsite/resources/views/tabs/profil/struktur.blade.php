<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struktur Organisasi</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f8f9fa;
        }

        .org-chart {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
        }

        .org-node {
            text-align: center;
            margin: 10px;
            position: relative;
        }

        .org-node img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .line-down {
            width: 1px;
            height: 30px;
            background-color: rgba(0, 0, 0, 0.3); /* Lebih tipis dan transparan */
        }

        .connector {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            position: relative;
            margin: 0 auto;
        }

        .children {
            display: flex;
            gap: 60px;
            position: relative;
            padding: 0 10px;
        }

        .children::before {
            content: "";
            position: absolute;
            top: -20px;
            left: 0;
            right: 0;
            height: 1px;
            background-color: rgba(0, 0, 0, 0.3); /* Garis horizontal tipis */
        }

        .child {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .child::before {
            content: '';
            position: absolute;
            top: -20px;
            width: 1px;
            height: 20px;
            background-color: rgba(0, 0, 0, 0.3); /* Garis vertikal tipis */
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
    <div class="org-chart">
        <!-- Admin -->
        <div class="org-node">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/67/User_Avatar.png" alt="Admin">
            <div><strong>Admin</strong></div>
        </div>

        <!-- Garis vertikal ke bawah -->
        <div class="line-down"></div>

        <!-- Garis horizontal & cabang -->
        <div class="connector">
            <div class="children">
                <!-- Anak 1 -->
                <div class="child">
                    <div class="org-node">
                        <img src="https://via.placeholder.com/100x100" alt="Cabang1">
                        <div><strong>Air Quality</strong></div>
                    </div>
                </div>
                <!-- Anak 2 -->
                <div class="child">
                    <div class="org-node">
                        <img src="https://via.placeholder.com/100x100" alt="Cabang2">
                        <div><strong>Filter HPA</strong></div>
                    </div>
                </div>
                <!-- Anak 3 -->
                <div class="child">
                    <div class="org-node">
                        <img src="https://via.placeholder.com/100x100" alt="Cabang3">
                        <div><strong>Greenroom</strong></div>
                    </div>
                </div>
                <!-- Anak 4 -->
                <div class="child">
                    <div class="org-node">
                        <img src="https://via.placeholder.com/100x100" alt="Cabang4">
                        <div><strong>Gunshot Detection</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
