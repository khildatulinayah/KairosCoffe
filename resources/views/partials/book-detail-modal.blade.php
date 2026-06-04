<!-- Buku Detail Modal (aktif untuk Landing Top Books) -->
<div id="bookDetailModal"
     class="fixed inset-0 z-[100] hidden">

    <!-- Backdrop -->
    <div id="bookModalBackdrop"
         class="absolute inset-0 bg-black/70 backdrop-blur-sm">
    </div>

    <!-- Modal -->
    <div class="relative z-[101] min-h-screen flex items-center justify-center p-4">

        <div class="
            w-full
            max-w-4xl
            bg-white
            rounded-[32px]
            overflow-hidden
            shadow-[0_30px_80px_rgba(0,0,0,.25)]
            border border-gray-100">

            <!-- Header -->
            <div class="px-8 py-6 border-b border-gray-100">

                <div class="flex items-start justify-between">

                    <div>
                        <span class="text-xs uppercase tracking-[0.3em] text-[#D4B996]">
                            Book Detail
                        </span>

                        <h3 id="bookModalTitle"
                            class="mt-2 text-3xl font-serif font-bold text-[#4A3525]">
                            Judul Buku
                        </h3>

                        <p id="bookModalAuthorTop"
                           class="text-gray-500 mt-2">
                            Penulis
                        </p>
                    </div>

                    <button id="bookModalCloseBtn"
                            type="button"
                            class="
                                w-10 h-10
                                rounded-full
                                bg-gray-100
                                hover:bg-gray-200
                                transition">
                        ✕
                    </button>

                </div>

            </div>

            <!-- Content -->
            <div class="p-8">

                <div class="grid lg:grid-cols-[280px_1fr] gap-8">

                    <!-- Cover -->
                    <div>

                        <div id="bookModalImageWrap"
                             class="hidden overflow-hidden rounded-[24px] bg-gray-100 shadow-lg">

                            <img id="bookModalImage"
                                 class="w-full h-[400px] object-cover"
                                 alt="">
                        </div>

                    </div>

                    <!-- Detail -->
                    <div>

                        <div class="flex flex-wrap gap-3 mb-6">

                            <span id="bookModalCategory"
                                  class="
                                      px-4 py-2
                                      rounded-full
                                      bg-[#F3ECE3]
                                      text-[#4A3525]
                                      text-sm font-medium">
                                Kategori
                            </span>

                            <span class="
                                  px-4 py-2
                                  rounded-full
                                  bg-green-50
                                  text-green-700
                                  text-sm font-medium">

                                Stok:
                                <span id="bookModalStockCount">
                                    0
                                </span>

                            </span>

                        </div>

                        <div>

                            <h4 class="font-semibold text-lg text-[#4A3525] mb-3">
                                Sinopsis
                            </h4>

                            <p id="bookModalDescription"
                               class="text-gray-600 leading-8">
                                Deskripsi buku
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Footer -->
            <div class="border-t border-gray-100 p-6 bg-[#FBF9F4]">

                <a id="bookModalActionLink"
                   href="#"
                   class="
                       inline-flex
                       justify-center
                       items-center
                       w-full
                       py-4
                       rounded-2xl
                       bg-[#4A3525]
                       text-white
                       font-semibold
                       hover:bg-[#2C1A11]
                       transition">

                    Lihat Detail Buku

                </a>

            </div>

        </div>

    </div>

</div>

<script>
    (function () {
        const modal = document.getElementById('bookDetailModal');
        if (!modal) return;


        const closeBtn = document.getElementById('bookModalCloseBtn');
        const bg = document.getElementById('bookModalBackdrop');

        const titleEl = document.getElementById('bookModalTitle');
        const authorEl = document.getElementById('bookModalAuthor');
        const categoryEl = document.getElementById('bookModalCategory');
        const stockCountEl = document.getElementById('bookModalStockCount');
        const descEl = document.getElementById('bookModalDescription');
        const imgWrap = document.getElementById('bookModalImageWrap');
        const imgEl = document.getElementById('bookModalImage');
        const actionLink = document.getElementById('bookModalActionLink');


        function openModal(data) {
            if (titleEl) titleEl.textContent = data.title || '';
            if (authorEl) authorEl.textContent = data.author || '';
            if (categoryEl) categoryEl.textContent = data.category ? `Kategori: ${data.category}` : 'Kategori';
            if (stockCountEl) stockCountEl.textContent = (data.stockCount ?? 0);
            if (descEl) descEl.textContent = data.description || '';

            if (imgWrap && imgEl) {
                if (data.image) {
                    imgWrap.classList.remove('hidden');
                    imgEl.src = data.image;
                } else {
                    imgWrap.classList.add('hidden');
                    imgEl.removeAttribute('src');
                }
            }

            if (actionLink) actionLink.href = data.actionUrl || '#';

            modal.classList.remove('hidden');
        }


        function closeModal() {
            modal.classList.add('hidden');
        }

        document.querySelectorAll('[data-book-detail]').forEach((btn) => {
                    btn.addEventListener('click', () => {
                openModal({
                    title: btn.getAttribute('data-book-title'),
                    author: btn.getAttribute('data-book-author'),
                    category: btn.getAttribute('data-book-category'),
                    stockCount: btn.getAttribute('data-book-stock'),
                    description: btn.getAttribute('data-book-description'),
                    image: btn.getAttribute('data-book-image'),
                    actionUrl: btn.getAttribute('data-book-action-url')
                });
            });
        });



        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (bg) bg.addEventListener('click', closeModal);

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });
    })();
</script>

