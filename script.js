// script.js

function formatRupiah(n) {
  return "Rp " + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

const addButtons = document.querySelectorAll(".add-to-cart");
const cartBtn = document.getElementById("cartBtn");
const cartCount = document.getElementById("cartCount");
const cartItemsList = document.getElementById("cartItemsList");
const cartTotal = document.getElementById("cartTotal");
const checkoutBtn = document.getElementById("checkoutBtn");
const offcanvasEl = document.getElementById("cartOffcanvas");
const bsOffcanvas = new bootstrap.Offcanvas(offcanvasEl);

let cart = JSON.parse(localStorage.getItem("cart") || "[]");

function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
  renderCart();
}

function renderCart() {
  cartCount.textContent = cart.length;
  cartItemsList.innerHTML = "";

  if (cart.length === 0) {
    cartItemsList.innerHTML =
      '<p class="text-muted">Keranjang masih kosong 💗</p>';
    cartTotal.textContent = "Rp 0";
    return;
  }

  let total = 0;
  cart.forEach((item, index) => {
    total += item.price * item.qty;

    const div = document.createElement("div");
    div.className = "d-flex justify-content-between align-items-center mb-2";
    div.innerHTML = `
      <div>
        <strong>${item.name}</strong><br>
        <small class="text-muted">${formatRupiah(item.price)} × ${
      item.qty
    }</small>
      </div>
      <button class="btn btn-sm btn-outline-danger btn-remove" data-index="${index}">Hapus</button>
    `;
    cartItemsList.appendChild(div);
  });

  cartTotal.textContent = formatRupiah(total);

  document.querySelectorAll(".btn-remove").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const index = e.target.dataset.index;
      Swal.fire({
        title: "Hapus produk?",
        text: "Yakin ingin menghapus dari keranjang?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          cart.splice(index, 1);
          saveCart();
          Swal.fire("Terhapus!", "Produk berhasil dihapus.", "success");
        }
      });
    });
  });
}

addButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    const id = parseInt(btn.dataset.id);
    const name = btn.dataset.name;
    const price = parseInt(btn.dataset.price);

    const exist = cart.find((item) => item.id === id);
    if (exist) {
      Swal.fire("Info", `${name} sudah ada di keranjang 💕`, "info");
      return;
    }

    cart.push({ id, name, price, qty: 1 });
    saveCart();
    Swal.fire("Berhasil!", `${name} ditambahkan ke keranjang 💗`, "success");
  });
});

cartBtn.addEventListener("click", () => {
  renderCart();
  bsOffcanvas.show();
});

checkoutBtn.addEventListener("click", () => {
  if (cart.length === 0) {
    Swal.fire("Oops!", "Keranjang masih kosong 😅", "info");
    return;
  }

  Swal.fire({
    title: "Checkout?",
    text: "Apakah kamu yakin ingin melakukan checkout?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Ya, Checkout",
  }).then((result) => {
    if (result.isConfirmed) {
      cart = [];
      saveCart();
      bsOffcanvas.hide();
      Swal.fire(
        "Terima kasih 💕",
        "Pesanan kamu telah diproses (simulasi).",
        "success"
      );
    }
  });
});

renderCart();
