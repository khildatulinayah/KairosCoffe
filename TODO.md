# TODO - Landing Dinamis (Menu & Books)

## Step 1
- Review struktur menu & books di database dan model (Menu/MenuCategory, Book/BookCategory).

## Step 2
- Update `routes/web.php` supaya `/` dan `/landing` mengirim data:
  - kategori menu (opsional)
  - menu featured (`is_featured = true`, fallback ambil beberapa jika kosong)
  - kategori buku
  - beberapa book untuk grid "Top Books Collection".

## Step 3
- Update `resources/views/landing.blade.php`:
  - Ganti card menu statis menjadi loop dari `menus` ✅
  - Ganti chips kategori buku statis menjadi loop dari `bookCategories` ✅
  - Ganti section "Top Books Collection" menjadi loop dari `topBooks` ✅
  - Pastikan fallback jika data kosong.

## Step 4
- Update interaksi:
  - Klik kategori di landing mengarah ke halaman buku per kategori.

## Step 5
- Testing cepat:
  - Jalankan `php artisan serve` / cek browser `/`.
  - Klik kategori buku → harus masuk ke halaman `/book-categories/{id}`.



