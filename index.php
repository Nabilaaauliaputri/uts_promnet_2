<?php
// ====== DATA PRODUK SKINCARE ======
$products = [
    [
        "id" => 1,
        "name" => "Facial Wash Brightening",
        "price" => 1145000,
        "img" => "img/fw.png",
        "desc" => "Membersihkan wajah dari kotoran dan minyak berlebih tanpa membuat kulit kering."
    ],
    [
        "id" => 2,
        "name" => "Toner Brightening",
        "price" => 1240000,
        "img" => "img/toner.png",
        "desc" => "Menyegarkan kulit dan membantu mengembalikan pH alami setelah mencuci wajah."
    ],
    [
        "id" => 3,
        "name" => "Day Cream Brightening",
        "price" => 1560000,
        "img" => "img/day.png",
        "desc" => "Melembapkan dan melindungi kulit wajah dari paparan sinar matahari di siang hari."
    ],
    [
        "id" => 4,
        "name" => "Night Cream Brightening",
        "price" => 1665000,
        "img" => "img/night.png",
        "desc" => "Menutrisi kulit dan membantu regenerasi sel saat malam hari."
    ],
    // 🌸 Produk tambahan: Paket lengkap skincare
    [
        "id" => 5,
        "name" => "Paket Lengkap Skincare Brightening",
        "price" => 5000000, // harga promo bundling (lebih murah dari total)
        "img" => "img/all.png",
        "desc" => "Satu paket berisi Facial Wash, Toner, Day Cream, dan Night Cream — solusi lengkap untuk kulit sehat dan cerah alami!"
    ],
    // 🌿 Acne Skin Series
    [
        "id" => 6,
        "name" => "Acne Facial Wash",
        "price" => 1500000,
        "img" => "img/fwa.png",
        "desc" => "Membersihkan kulit berjerawat dengan lembut dan membantu mengurangi minyak berlebih.",
        "series" => "Acne"
    ],
    [
        "id" => 7,
        "name" => "Acne Toner",
        "price" => 1550000,
        "img" => "img/tna.png",
        "desc" => "Mengandung salicylic acid untuk membantu mengatasi jerawat dan menyegarkan kulit.",
        "series" => "Acne"
    ],
    [
        "id" => 8,
        "name" => "Acne Spot Treatment",
        "price" => 1550000,
        "img" => "img/aspot.png",
        "desc" => "Diformulasikan khusus untuk mengurangi jerawat dan kemerahan secara cepat.",
        "series" => "Acne"
    ],
    [
        "id" => 9,
        "name" => "Acne Day Cream",
        "price" => 1565000,
        "img" => "img/dna.png",
        "desc" => "Melembapkan kulit berjerawat tanpa membuatnya berminyak, dengan perlindungan UV.",
        "series" => "Acne"
    ],
    [
        "id" => 10,
        "name" => "Acne Night Cream",
        "price" => 1570000,
        "img" => "img/nna.png",
        "desc" => "Membantu menenangkan kulit dan mempercepat regenerasi sel saat malam hari.",
        "series" => "Acne"
    ],
        [
        "id" => 11,
        "name" => "Paket Hemat Acne Series",
        "price" => 5245000, // harga promo bundling
        "img" => "img/pahe.png",
        "desc" => "Satu paket lengkap untuk perawatan kulit berjerawat: Acne Facial Wash, Toner, Spot Treatment, Day Cream. Hemat & efektif untuk jerawat membandel!",
        "series" => "Acne",
        
    ],


];

function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NABEaute.co</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="#">
  <img src="img/logo.png" alt="Logo NABEaute " 
       style="height:40px; width:auto; margin-right:10px; border-radius:50%;">
  NABEaute
</a>

    <button class="btn btn-outline-primary position-relative" id="cartBtn">
      <i class="bi bi-cart"></i> <span id="cartCount" class="badge bg-danger">0</span>
    </button>
  </div>
</nav>

<!-- ===== PRODUK SECTION ===== -->
<main class="container py-5 mt-5">
  <h1 class="text-center mb-4 text-primary">Produk Skincare Kami</h1>

  <div class="row g-4">
    <?php foreach($products as $p): ?>
      <div class="col-md-3">
        <div class="card h-100 shadow-sm">
          <img src="<?= htmlspecialchars($p['img']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" style="height:220px;object-fit:cover;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlspecialchars($p['name']) ?></h5>
            <p class="card-text text-muted small"><?= htmlspecialchars($p['desc']) ?></p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
              <span class="fw-bold"><?= rupiah($p['price']) ?></span>
              <button class="btn btn-sm btn-primary add-to-cart" 
                      data-id="<?= $p['id'] ?>" 
                      data-name="<?= htmlspecialchars($p['name'], ENT_QUOTES) ?>" 
                      data-price="<?= $p['price'] ?>">
                <i class="bi bi-cart-plus"></i> Tambah
              </button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<!-- ===== KERANJANG (OFFCANVAS) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas">
  <div class="offcanvas-header">
    <h5>Keranjang Belanja</h5>
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <div id="cartItemsList"></div>
    <hr>
    <div class="d-flex justify-content-between">
      <strong>Total:</strong>
      <span id="cartTotal">Rp 0</span>
    </div>
    <button id="checkoutBtn" class="btn btn-success w-100 mt-3">Checkout</button>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="script.js"></script>
<footer class="text-center py-3 text-muted" style="background:#ffe6eb;">
  <small>© 2025 Nabila Aulia Putri</small>
</footer>

</body>
</html>
