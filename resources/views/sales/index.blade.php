<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img class="w-15 h-12" src="img/logo.png" alt="KuramocheezDev">
            </div>
            <div class="hidden md:block">
              <div class="ml-2 flex items-baseline space-x-4">
                <h3 class="font-bold text-white">KuramocheezDev</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  
    <header class="bg-white shadow-sm">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Data Penjualan</h1>
      </div>
    </header>
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 pb-5">
        <div class="max-w-6xl mx-auto bg-white p-5 rounded shadow">
            <h1 class="text-xl font-bold mb-4">Form Tambah Penjualan</h1>
        <form id="addForm">
            <input type="hidden" id="sale_id">
            <div class="col-span-full">
                <label for="customer_name" class="block text-sm/6 font-medium text-gray-900">Nama Pembeli</label>
                <div class="mt-2">
                <input type="text" name="customer_name" id="customer_name" autocomplete="customer_name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 border">
                </div>
            </div>

            <div class="col-span-full mt-2">
                <label for="product_name" class="block text-sm/6 font-medium text-gray-900">Nama Produk</label>
                <div class="mt-2">
                <input type="text" name="product_name" id="product_name" autocomplete="product_name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 border">
                </div>
            </div>

            <div class="col-span-full mt-2">
                <label for="qty" class="block text-sm/6 font-medium text-gray-900">Jumlah</label>
                <div class="mt-2">
                <input type="number" name="qty" id="qty" autocomplete="qty" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 border">
                </div>
            </div>

            <div class="col-span-full mt-2">
                <label for="total_ammount" class="block text-sm/6 font-medium text-gray-900">Jumlah</label>
                <div class="mt-2">
                <input type="text" name="total_ammount" id="total_ammount" autocomplete="total_ammount" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 border">
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" onclick="resetForm()" class="text-sm/6 font-semibold text-gray-900">Reset</button>
                <button type="submit" id="submitButton" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah</button>
            </div>
        </form>
        </div>

        <div class="max-w-6xl mx-auto bg-white p-5 rounded shadow mt-5">
            <h1 class="text-xl font-bold mb-4">Table Penjualan</h1>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2 text-left">Nama Pembeli</th>
                            <th class="p-2 text-left">Produk</th>
                            <th class="p-2 text-center">Jumlah</th>
                            <th class="p-2 text-right">Total Harga</th>
                            <th class="p-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataList">
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</div>

        <table class="w-full border-collapse border">
            
        </table>
    </div>

    <!-- Modal -->
    <div class="relative z-10 hidden" id="detailModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-green-600 sm:mx-0 sm:size-10">
                    <i class="text-white fa-solid fa-circle-info"></i>
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-base font-semibold text-gray-900" id="modal-title">Detail Penjualan</h3>
                    <div class="mt-2">
                      <p><strong>Nama Pembeli:</strong> <span id="detail_customer_name"></span></p>
                      <p><strong>Produk:</strong> <span id="detail_product_name"></span></p>
                      <p><strong>Jumlah:</strong> <span id="detail_qty"></span></p>
                      <p><strong>Total Harga:</strong> <span id="detail_total_ammount"></span></p>
                      <p><strong>Dibuat Pada:</strong> <span id="detail_created_at"></span></p>
                      <p><strong>Diperbarui Pada:</strong> <span id="detail_updated_at"></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" onclick="closeDetailModal()" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Tutup</button>
              </div>
            </div>
          </div>
        </div>
      </div>
<script src="js/ajax.js"></script>


<footer class="bg-gray-800 text-white text-center p-4 mt-10">
    <p>Made by 	<span class="text-red-500">&#10084;</span> | &copy; 2025 KuramocheezDev. All rights reserved.</p>
</footer>
</body>
</html>
