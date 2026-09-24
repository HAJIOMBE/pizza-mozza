<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Pizza Mozza & Snack</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-amber-50/40 min-h-screen pb-24">

    <!-- Header / Navbar -->
    <header class="bg-gradient-to-r from-red-700 via-red-600 to-amber-600 text-white shadow-lg sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <span class="text-3xl">🍕</span>
                <div>
                    <h1 class="text-xl md:text-2xl font-bold tracking-wide">PIZZA MOZZA</h1>
                    <p class="text-xs text-amber-200">Pesan Menu Favoritmu Sekarang!</p>
                </div>
            </div>

            <!-- Ringkasan Keranjang Belanja -->
            <button onclick="toggleCartModal()" class="relative bg-amber-400 hover:bg-amber-300 text-red-950 font-bold px-4 py-2 rounded-xl shadow transition flex items-center gap-2 text-sm">
                <i class="fa-solid fa-cart-shopping text-lg"></i>
                <span class="hidden sm:inline">Keranjang</span>
                <span id="cartBadge" class="bg-red-600 text-white text-xs px-2 py-0.5 rounded-full font-bold">0</span>
            </button>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="max-w-7xl mx-auto px-4 mt-8">
        
        <!-- Filter Bar & Search -->
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-amber-100 mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Filter Kategori Buttons -->
            <div class="flex flex-wrap gap-2 w-full md:w-auto">
                <button onclick="filterCategory('All')" id="btn-All" class="category-btn active bg-red-600 text-white font-medium px-4 py-2 rounded-xl text-sm transition shadow-sm">
                    Semua Menu
                </button>
                <button onclick="filterCategory('Pizza')" id="btn-Pizza" class="category-btn bg-gray-100 hover:bg-amber-100 text-gray-700 font-medium px-4 py-2 rounded-xl text-sm transition">
                    🍕 Pizza Mozza
                </button>
                <button onclick="filterCategory('Snack')" id="btn-Snack" class="category-btn bg-gray-100 hover:bg-amber-100 text-gray-700 font-medium px-4 py-2 rounded-xl text-sm transition">
                    🍠 Tape & Snack
                </button>
                <button onclick="filterCategory('Nastar')" id="btn-Nastar" class="category-btn bg-gray-100 hover:bg-amber-100 text-gray-700 font-medium px-4 py-2 rounded-xl text-sm transition">
                    🍍 Kue Nastar
                </button>
            </div>

            <!-- Search Input -->
            <div class="relative w-full md:w-72">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="searchInput" oninput="renderCards()" placeholder="Cari menu lezat..." 
                    class="w-full pl-10 pr-4 py-2 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
        </div>

        <!-- Cards Grid Area -->
        <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card produk diisi oleh Javascript -->
        </div>

    </main>

    <!-- Modal Keranjang Belanja -->
    <div id="cartModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center hidden p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
            <div class="bg-red-600 text-white px-6 py-4 flex justify-between items-center">
                <h3 class="font-bold text-lg flex items-center gap-2">
                    <i class="fa-solid fa-basket-shopping"></i> Keranjang Belanja
                </h3>
                <button onclick="toggleCartModal()" class="text-white/80 hover:text-white text-xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div id="cartItemsList" class="p-6 max-h-80 overflow-y-auto divide-y divide-gray-100">
                <!-- Item pesanan muncul di sini -->
            </div>

            <div class="p-6 bg-amber-50/50 border-t border-amber-100">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm font-semibold text-gray-600">Total Pembayaran:</span>
                    <span id="cartTotalPrice" class="text-xl font-extrabold text-red-600">Rp 0</span>
                </div>
                <button onclick="checkoutWhatsApp()" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl shadow-lg transition flex items-center justify-center gap-2">
                    <i class="fa-brands fa-whatsapp text-xl"></i> Pesan via WhatsApp
                </button>
            </div>
        </div>
    </div>

    <!-- Script Logika Katalog & Keranjang Pelanggan -->
    <script>
        const WHATSAPP_NUMBER = "6281234567890"; // Ganti dengan nomor WhatsApp Toko

        let products = [
            {
                id: "P001",
                name: "Original Mozza",
                category: "Pizza",
                desc: "Saus racikan, daging ayam, bawang bombay, jagung manis, baso sapi, mozzarella, oregano.",
                image: "/images/Original Mozza.jpeg",
                variants: [
                    { size: "Medium", price: 50000 },
                    { size: "Large", price: 75000 }
                ]
            },
            {
                id: "P002",
                name: "Cheese Volcano",
                category: "Pizza",
                desc: "Original + extra gunung keju / saus keju melimpah di tengah pizza.",
                image: "Images/Cheese Volcano.jpeg",
                variants: [
                    { size: "Medium", price: 63000 },
                    { size: "Large", price: 88000 }
                ]
            },
            {
                id: "P003",
                name: "Smoked Beef",
                category: "Pizza",
                desc: "Original mozza dengan topping irisan Smoked Beef premium melimpah.",
                image: "Images/Smoked Beef.jpeg",
                variants: [
                    { size: "Medium", price: 63000 },
                    { size: "Large", price: 88000 }
                ]
            },
            {
                id: "P004",
                name: "Extra Beef",
                category: "Pizza",
                desc: "Original mozza dengan ekstra topping daging sapi cincang lezat.",
                image: "https://images.unsplash.com/photo-1534308983496-4fabb1a015ee?auto=format&fit=crop&w=600&q=80",
                variants: [
                    { size: "Medium", price: 70000 },
                    { size: "Large", price: 100000 }
                ]
            },
            {
                id: "S001",
                name: "Tape Bakar Original",
                category: "Snack",
                desc: "Tape bakar khas aroma wangi tanpa topping tambahan.",
                image: "Images/Tape Bakar Original.jpeg",
                variants: [
                    { size: "Box Kecil", price: 12000 },
                    { size: "Box Sedang", price: 17000 },
                    { size: "Box Besar", price: 25000 }
                ]
            },
            {
                id: "S002",
                name: "Singkong Keju",
                category: "Snack",
                desc: "Singkong renyah dengan topping susu manis dan parutan keju melimpah.",
                image: "Images/Singkong Keju.jpeg",
                variants: [
                    { size: "Box Kecil", price: 12000 },
                    { size: "Box Sedang", price: 17000 },
                    { size: "Box Besar", price: 25000 }
                ]
            },
            {
                id: "S003",
                name: "Tape Bakar Toping Keju",
                category: "Snack",
                desc: "Tape bakar lembut dilengkapi topping madu, susu, dan taburan keju.",
                image: "https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?auto=format&fit=crop&w=600&q=80",
                variants: [
                    { size: "Box Kecil", price: 12000 },
                    { size: "Box Sedang", price: 17000 },
                    { size: "Box Besar", price: 25000 }
                ]
            },
            {
                id: "N001",
                name: "Nastar Keju Premium",
                category: "Nastar",
                desc: "Kue nastar lembut lumer di mulut dengan isian selai nanas asli dan taburan keju melimpah.",
                image: "Images/Kue Nastar.jpeg",
                variants: [
                    { size: "Toples 250g", price: 45000 },
                    { size: "Toples 500g", price: 85000 }
                ]
            }
        ];

        let selectedCategory = 'All';
        let activeVariants = {};
        let cart = [];

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(number);
        }

        function renderCards() {
            const grid = document.getElementById('productGrid');
            const searchKeyword = document.getElementById('searchInput').value.toLowerCase();
            grid.innerHTML = '';

            const filteredProducts = products.filter(p => {
                const matchCategory = selectedCategory === 'All' || p.category === selectedCategory;
                const matchSearch = p.name.toLowerCase().includes(searchKeyword) || p.desc.toLowerCase().includes(searchKeyword);
                return matchCategory && matchSearch;
            });

            if (filteredProducts.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full py-12 text-center text-gray-400">
                        <i class="fa-solid fa-utensils text-4xl mb-3"></i>
                        <p class="text-base font-medium">Menu tidak ditemukan</p>
                    </div>`;
                return;
            }

            filteredProducts.forEach(product => {
                if (!activeVariants[product.id]) {
                    activeVariants[product.id] = {
                        variantIndex: 0
                    };
                }

                const currentVariantState = activeVariants[product.id];
                const selectedVariant = product.variants[currentVariantState.variantIndex] || product.variants[0];
                const totalPrice = selectedVariant.price;

                let sizeOptionsHTML = product.variants.map((v, idx) => `
                    <label class="flex items-center gap-1.5 cursor-pointer text-xs bg-amber-50 hover:bg-amber-100/80 px-2.5 py-1.5 rounded-lg border border-amber-200/60 font-medium text-amber-900 transition">
                        <input type="radio" name="variant_${product.id}" ${idx === currentVariantState.variantIndex ? 'checked' : ''} 
                            onchange="selectVariant('${product.id}', ${idx})" class="accent-red-600">
                        <span>${v.size}</span>
                    </label>
                `).join('');

                const cardHTML = `
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-amber-100 flex flex-col justify-between group">
                        <div>
                            <div class="relative h-48 overflow-hidden bg-gray-100">
                                <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-800 leading-snug mb-1">${product.name}</h3>
                                <p class="text-xs text-gray-500 line-clamp-2 mb-4">${product.desc}</p>

                                <div class="mb-3">
                                    <span class="text-[11px] font-bold uppercase text-gray-400 tracking-wider block mb-1.5">Pilih Ukuran:</span>
                                    <div class="flex flex-wrap gap-1.5">
                                        ${sizeOptionsHTML}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-5 py-4 bg-amber-50/50 border-t border-amber-100/80 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-gray-400 block font-medium">Harga:</span>
                                <span class="text-lg font-extrabold text-red-600">${formatRupiah(totalPrice)}</span>
                            </div>

                            <button onclick="addToCart('${product.id}')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-1.5 shadow-md">
                                <i class="fa-solid fa-cart-plus"></i> + Keranjang
                            </button>
                        </div>
                    </div>
                `;

                grid.innerHTML += cardHTML;
            });
        }

        function selectVariant(productId, idx) {
            activeVariants[productId].variantIndex = idx;
            renderCards();
        }

        function filterCategory(cat) {
            selectedCategory = cat;
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('bg-red-600', 'text-white', 'shadow-sm');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });
            const activeBtn = document.getElementById(`btn-${cat}`);
            if (activeBtn) {
                activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
                activeBtn.classList.add('bg-red-600', 'text-white', 'shadow-sm');
            }
            renderCards();
        }

        // Fungsi Tambah ke Keranjang
        function addToCart(productId) {
            const product = products.find(p => p.id === productId);
            const state = activeVariants[productId];
            const variant = product.variants[state.variantIndex];
            const unitPrice = variant.price;
            const itemKey = `${productId}_${variant.size}`;

            const existingItem = cart.find(item => item.key === itemKey);

            if (existingItem) {
                existingItem.qty += 1;
            } else {
                cart.push({
                    key: itemKey,
                    name: product.name,
                    size: variant.size,
                    price: unitPrice,
                    qty: 1
                });
            }

            updateCartUI();
        }

        function updateCartUI() {
            const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
            document.getElementById('cartBadge').innerText = totalQty;

            const cartList = document.getElementById('cartItemsList');
            if (cart.length === 0) {
                cartList.innerHTML = `<p class="text-center text-gray-400 py-6 text-sm">Keranjang kamu masih kosong</p>`;
            } else {
                cartList.innerHTML = cart.map((item, index) => `
                    <div class="py-3 flex justify-between items-center gap-2">
                        <div>
                            <h4 class="font-bold text-sm text-gray-800">${item.name}</h4>
                            <p class="text-xs text-gray-500">${item.size}</p>
                            <span class="text-xs font-semibold text-red-600">${formatRupiah(item.price)}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="changeQty(${index}, -1)" class="w-6 h-6 bg-gray-200 hover:bg-gray-300 rounded-full text-xs font-bold">-</button>
                            <span class="text-sm font-semibold">${item.qty}</span>
                            <button onclick="changeQty(${index}, 1)" class="w-6 h-6 bg-amber-400 hover:bg-amber-300 rounded-full text-xs font-bold">+</button>
                        </div>
                    </div>
                `).join('');
            }

            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            document.getElementById('cartTotalPrice').innerText = formatRupiah(totalPrice);
        }

        function changeQty(index, delta) {
            cart[index].qty += delta;
            if (cart[index].qty <= 0) {
                cart.splice(index, 1);
            }
            updateCartUI();
        }

        function toggleCartModal() {
            document.getElementById('cartModal').classList.toggle('hidden');
        }

        // Fitur Checkout Langsung Mengirimkan Format Pesanan ke WhatsApp
        function checkoutWhatsApp() {
            if (cart.length === 0) {
                alert("Keranjang kamu masih kosong!");
                return;
            }

            let text = "Halo Pizza Mozza, saya mau pesan:\n\n";
            cart.forEach((item, i) => {
                text += `${i + 1}. *${item.name}* (${item.size})\n`;
                text += `   ${item.qty}x @ ${formatRupiah(item.price)} = *${formatRupiah(item.price * item.qty)}*\n\n`;
            });

            const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            text += `*Total Pembayaran: ${formatRupiah(total)}*`;

            const encodedText = encodeURIComponent(text);
            window.open(`https://wa.me/${WHATSAPP_NUMBER}?text=${encodedText}`, '_blank');
        }

        // Inisialisasi Tampilan
        renderCards();
    </script>
</body>
</html>