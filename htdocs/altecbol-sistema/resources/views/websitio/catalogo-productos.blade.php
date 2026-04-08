<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#050b14" />
    <title>Altecbol | Catálogo de Productos</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="/websitio/css/styles.css?v={{ filemtime(public_path('websitio/css/styles.css')) }}">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            background-color: #050b14;
            color: #eaeaea;
            min-height: 100%;
        }

        body {
            background:
                radial-gradient(circle at top, rgba(1, 211, 209, 0.08), transparent 28%),
                linear-gradient(180deg, #050b14 0%, #07111f 100%);
        }
        .tech-grid {
        position: fixed;
        inset: 0;
        background-image:
            linear-gradient(rgba(1, 211, 209, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(1, 211, 209, 0.05) 1px, transparent 1px);
        background-size: 26px 26px;
        mask-image: radial-gradient(circle at center, black 45%, transparent 100%);
        pointer-events: none;
        z-index: 0;
    }

    .glass {
        background: rgba(7, 14, 25, 0.88);
        border: 1px solid rgba(1, 211, 209, 0.16);
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
    }
    </style>
</head>

<body class="min-h-screen flex justify-center py-6 md:py-10 px-4 relative bg-[#050b14] text-[#eaeaea]">
    <div class="tech-grid"></div>

    <div class="w-full max-w-md md:max-w-3xl xl:max-w-7xl relative z-10">
        <div class="fade-in">

            <!-- CABECERA -->
            <div class="flex items-center justify-between mb-6 border-b border-[#01d3d1]/30 pb-4">
                <div class="flex items-center min-w-0">
                    <a href="{{ route('mini.home') }}"
                        class="text-[#01d3d1] hover:text-white transition-colors p-2 -ml-2 bg-[#0050b0]/20 rounded-lg border border-[#0050b0] shrink-0">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </a>

                    <h2 class="text-base sm:text-lg md:text-xl xl:text-2xl font-bold ml-3 text-[#eaeaea] tracking-wider uppercase leading-tight">
                        Catálogo de Productos
                    </h2>
                </div>

                <button onclick="toggleCart()"
                    class="relative bg-[#0050b0]/20 border border-[#01d3d1]/30 rounded-lg px-3 py-2 text-[#01d3d1] hover:bg-[#01d3d1] hover:text-[#050b14] transition shrink-0">
                    <i class="fas fa-cart-shopping"></i>
                    <span id="cart-count"
                        class="absolute -top-2 -right-2 bg-[#01d3d1] text-[#050b14] text-[10px] font-bold rounded-full w-5 h-5 flex items-center justify-center">0</span>
                </button>
            </div>

            <p
                class="font-sys text-[10px] sm:text-[11px] text-[#01d3d1] mb-6 tracking-widest border-l-2 border-[#01d3d1] pl-2 bg-[#0050b0]/10 py-1">
                PRODUCTOS DISPONIBLES PARA COTIZACIÓN, CONSULTA Y VENTA CORPORATIVA.
            </p>

            <!-- FILTROS -->
            <div class="space-y-3 mb-6">
                <input id="searchInput" type="text" placeholder="Buscar por nombre, modelo, código o marca..."
                    class="w-full bg-[#0b1524] border border-[#01d3d1]/20 rounded-xl px-4 py-3 text-sm text-white placeholder:text-gray-400 focus:outline-none focus:border-[#01d3d1]" />

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3">
                    <select id="categoryFilter"
    class="bg-[#0b1524] border border-[#01d3d1]/20 rounded-xl px-3 py-3 text-sm text-white focus:outline-none focus:border-[#01d3d1]">
    <option value="">Todas las categorías</option>
    @foreach($categorias as $categoria)
        <option value="{{ $categoria['value'] }}">{{ $categoria['label'] }}</option>
    @endforeach
</select>

                    <select id="brandFilter"
    class="bg-[#0b1524] border border-[#01d3d1]/20 rounded-xl px-3 py-3 text-sm text-white focus:outline-none focus:border-[#01d3d1]">
    <option value="">Todas las marcas</option>
    @foreach($marcas as $marca)
        <option value="{{ $marca['value'] }}">{{ $marca['label'] }}</option>
    @endforeach
</select>

                    <button onclick="clearFilters()"
                        class="bg-[#0050b0]/20 border border-[#01d3d1]/20 rounded-xl px-4 py-3 text-sm text-[#01d3d1] hover:bg-[#01d3d1] hover:text-[#050b14] transition sm:col-span-2 xl:col-span-1">
                        Limpiar filtros
                    </button>
                </div>
            </div>

            <!-- PRODUCTOS -->
            <div id="productsGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5"></div>

            <p class="text-gray-400 text-[11px] mt-6 text-center leading-relaxed">
                * Los productos mostrados están sujetos a disponibilidad y cotización actualizada al momento de la consulta.
            </p>
        </div>
    </div>

    <!-- PANEL CARRITO -->
    <div id="cart-panel"
        class="hidden fixed top-0 right-0 h-full w-full sm:w-[420px] bg-[#050b14] border-l border-[#01d3d1]/20 z-50 shadow-2xl overflow-y-auto">
        <div class="p-5">
            <div class="flex items-center justify-between border-b border-[#01d3d1]/20 pb-4 mb-4">
                <h3 class="text-[#eaeaea] font-bold text-base sm:text-lg uppercase tracking-wide">Carrito de Cotización</h3>
                <button onclick="toggleCart()" class="text-[#01d3d1] text-xl hover:text-white transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div id="cart-items" class="space-y-3"></div>

            <div class="mt-6 border-t border-[#01d3d1]/20 pt-4">
                <div class="flex justify-between text-sm text-[#eaeaea] items-start gap-3">
                    <span>Productos seleccionados</span>
                    <span id="cart-total-items" class="font-bold text-[#01d3d1] text-right">0 ítems</span>
                </div>

                <button onclick="sendWhatsAppQuote()"
                    class="w-full mt-4 bg-[#01d3d1] text-[#050b14] font-bold py-3 rounded-lg hover:opacity-90 transition">
                    <i class="fab fa-whatsapp mr-2"></i>Solicitar cotización
                </button>
            </div>
        </div>
    </div>

    <script>
    const products = @json($productos);

    // carrito agrupado por código
    let cart = [];

    const productsGrid = document.getElementById("productsGrid");
    const searchInput = document.getElementById("searchInput");
    const categoryFilter = document.getElementById("categoryFilter");
    const brandFilter = document.getElementById("brandFilter");

    function getCartItem(productId) {
        return cart.find(item => item.codigo === productId);
    }

    function getProductById(productId) {
        return products.find(product => product.id === productId);
    }

    function getTotalUnits() {
        return cart.reduce((sum, item) => sum + item.quantity, 0);
    }

    function addToCart(productId) {
        const product = getProductById(productId);
        if (!product) return;

        const existingItem = getCartItem(productId);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                codigo: product.id,
                nombre: product.name,
                modelo: product.model,
                quantity: 1
            });
        }

        renderProducts();
        renderCart();
    }

    function increaseQty(productId) {
        const item = getCartItem(productId);
        if (!item) return;

        item.quantity += 1;
        renderProducts();
        renderCart();
    }

    function decreaseQty(productId) {
        const item = getCartItem(productId);
        if (!item) return;

        item.quantity -= 1;

        if (item.quantity <= 0) {
            cart = cart.filter(cartItem => cartItem.codigo !== productId);
        }

        renderProducts();
        renderCart();
    }

    function removeFromCartByCode(productId) {
        cart = cart.filter(item => item.codigo !== productId);
        renderProducts();
        renderCart();
    }

    function renderQuantityControls(productId, compact = false) {
        const item = getCartItem(productId);
        if (!item) return "";

        if (compact) {
            return `
                <div class="flex items-center gap-2">
                    <button onclick="decreaseQty('${productId}')"
                        class="w-8 h-8 rounded-lg border border-[#01d3d1]/20 bg-[#0050b0]/20 text-[#01d3d1] hover:bg-[#01d3d1] hover:text-[#050b14] transition">
                        <i class="fas fa-minus text-[11px]"></i>
                    </button>

                    <span class="min-w-[28px] text-center text-sm font-bold text-[#01d3d1]">
                        ${item.quantity}
                    </span>

                    <button onclick="increaseQty('${productId}')"
                        class="w-8 h-8 rounded-lg border border-[#01d3d1]/20 bg-[#0050b0]/20 text-[#01d3d1] hover:bg-[#01d3d1] hover:text-[#050b14] transition">
                        <i class="fas fa-plus text-[11px]"></i>
                    </button>
                </div>
            `;
        }

        return `
            <div class="w-full sm:w-auto flex items-center justify-center gap-2">
                <button onclick="decreaseQty('${productId}')"
                    class="w-9 h-9 rounded-lg border border-[#01d3d1]/20 bg-[#0050b0]/20 text-[#01d3d1] hover:bg-[#01d3d1] hover:text-[#050b14] transition">
                    <i class="fas fa-minus text-[11px]"></i>
                </button>

                <span class="min-w-[36px] text-center text-sm font-bold text-[#01d3d1]">
                    ${item.quantity}
                </span>

                <button onclick="increaseQty('${productId}')"
                    class="w-9 h-9 rounded-lg border border-[#01d3d1]/20 bg-[#0050b0]/20 text-[#01d3d1] hover:bg-[#01d3d1] hover:text-[#050b14] transition">
                    <i class="fas fa-plus text-[11px]"></i>
                </button>
            </div>
        `;
    }

    function renderProducts() {
        const search = searchInput.value.toLowerCase().trim();
        const category = categoryFilter.value;
        const brand = brandFilter.value;

        const filtered = products.filter(product => {
            const matchesSearch =
    (product.name || '').toLowerCase().includes(search) ||
    (product.model || '').toLowerCase().includes(search) ||
    (product.id || '').toLowerCase().includes(search) ||
    (product.brandLabel || '').toLowerCase().includes(search);

            const matchesCategory = !category || product.category === category;
            const matchesBrand = !brand || product.brand === brand;

            return matchesSearch && matchesCategory && matchesBrand;
        });

        productsGrid.innerHTML = "";

        if (filtered.length === 0) {
            productsGrid.innerHTML = `
                <div class="project-card tech-corner p-5 md:col-span-2 xl:col-span-3">
                    <p class="text-gray-300 text-sm">No se encontraron productos con esos filtros.</p>
                </div>
            `;
            return;
        }

        filtered.forEach(product => {
            const cartItem = getCartItem(product.id);

            productsGrid.innerHTML += `
                <div class="project-card tech-corner overflow-hidden h-full flex flex-col">
                    <div class="project-image-wrap">
                        <img src="${product.image}" alt="${product.name}">
                        <div class="project-overlay"></div>
                        <div class="project-id-badge">COD: ${product.id}</div>
                    </div>

                    <div class="p-5 flex flex-col flex-1">
                        <div class="project-client">${product.categoryLabel}</div>
                        <div class="project-title">${product.name}</div>

                        <div class="project-tags">
                            <span class="project-tag">MODELO: ${product.model}</span>
                            <span class="project-tag">MARCA: ${product.brandLabel}</span>
                        </div>

                        <p class="project-summary flex-1">${product.summary}</p>

                        <div class="mt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div>
                                <p class="text-gray-400 text-[11px]">Código: ${product.id}</p>
                            </div>

                            ${
                                cartItem
                                    ? renderQuantityControls(product.id)
                                    : `
                                        <button
                                            onclick="addToCart('${product.id}')"
                                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl border border-[#01d3d1]/20 bg-[#0050b0]/20 text-[#01d3d1] text-xs font-bold hover:bg-[#01d3d1] hover:text-[#050b14] transition">
                                            <i class="fas fa-cart-plus"></i> Agregar
                                        </button>
                                    `
                            }
                        </div>
                    </div>
                </div>
            `;
        });
    }

    function renderCart() {
        const cartItems = document.getElementById("cart-items");
        const cartCount = document.getElementById("cart-count");
        const cartTotalItems = document.getElementById("cart-total-items");

        cartItems.innerHTML = "";

        if (cart.length === 0) {
            cartItems.innerHTML = `
                <div class="bg-[#0b1524] border border-[#01d3d1]/15 rounded-xl p-4">
                    <p class="text-gray-400 text-sm">Tu carrito está vacío.</p>
                </div>
            `;
        } else {
            cart.forEach((item) => {
                cartItems.innerHTML += `
                    <div class="bg-[#0b1524] border border-[#01d3d1]/15 rounded-xl p-4">
                        <div class="flex justify-between items-start gap-3">
                            <div class="flex-1">
                                <h4 class="text-[#eaeaea] font-bold text-sm">${item.nombre}</h4>
                                <p class="text-gray-400 text-xs mt-1">Modelo: ${item.modelo}</p>
                                <p class="text-gray-400 text-xs">Código: ${item.codigo}</p>

                                <div class="mt-3 flex items-center justify-between gap-3">
                                    ${renderQuantityControls(item.codigo, true)}

                                    <button onclick="removeFromCartByCode('${item.codigo}')"
                                        class="text-red-400 hover:text-red-300 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        cartCount.textContent = getTotalUnits();
        cartTotalItems.textContent = `${getTotalUnits()} ítems`;
    }

    function toggleCart() {
        document.getElementById("cart-panel").classList.toggle("hidden");
    }

    function clearFilters() {
        searchInput.value = "";
        categoryFilter.value = "";
        brandFilter.value = "";
        renderProducts();
    }

    function sendWhatsAppQuote() {
        if (cart.length === 0) {
            alert("Tu carrito está vacío.");
            return;
        }

        let mensaje = "Hola, quiero solicitar cotización de los siguientes productos:\n\n";

        cart.forEach((item, i) => {
            mensaje += `${i + 1}. ${item.nombre}\n`;
            mensaje += `Modelo: ${item.modelo}\n`;
            mensaje += `Código: ${item.codigo}\n`;
            mensaje += `Cantidad: ${item.quantity}\n\n`;
        });

        mensaje += `Cantidad total de ítems: ${getTotalUnits()}`;

        window.open(`https://wa.me/59164347465?text=${encodeURIComponent(mensaje)}`, "_blank");
    }

    searchInput.addEventListener("input", renderProducts);
    categoryFilter.addEventListener("change", renderProducts);
    brandFilter.addEventListener("change", renderProducts);

    renderProducts();
    renderCart();
</script>
</body>

</html>