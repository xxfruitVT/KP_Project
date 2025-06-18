<section class="position-relative text-white text-center py-5" 
    style="background: url('/images/sejarah.jpg') center center / cover no-repeat; height: 400px;">

    <div class="position-relative w-100">
        <img src="{{ asset('images/sekolah.jpg') }}" alt="Sarana dan Prasarana" style="width: 100%; height: 400px; object-fit: cover; filter: brightness(60%);">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h2 class="fw-bold">STRUKTUR ORGANISASI</h2>
            <p class="fs-5">SMP PADMAJAYA PALEMBANG</p>
        </div>
    </div>

</section>
<style>
    .sarana-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: flex-start;
        gap: 2rem;
        padding: 2rem;
    }

    .sarana-image {
        flex: 1 1 300px;
        max-width: 500px;
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .sarana-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .sarana-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 1rem;
        color: white;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        width: 100%;
    }

    .sarana-text {
        flex: 1 1 300px;
        max-width: 600px;
    }

    .sarana-text h5 {
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .sarana-text ol {
        padding-left: 1.25rem;
    }
</style

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
