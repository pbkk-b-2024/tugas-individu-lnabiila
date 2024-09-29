<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Pegawai table
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('NIK')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->integer('umur');
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->foreignId('user_id')->constrained('id')->on('user')->onDelete('cascade');
            $table->timestamps();
        });

        // Customer table
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        // Membership table
        Schema::create('membership', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->integer('poin')->default(0);
            $table->date('tanggal_pembuatan');
            $table->date('tanggal_kedaluwarsa');
            $table->foreignId('customer_id')->constrained('customer')->onDelete('cascade');
            $table->timestamps();
        });

        // Transaksi table
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->decimal('total', 8, 2);
            $table->string('metode_pembayaran');
            $table->foreignId('pegawai_id')->constrained('pegawai')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customer')->onDelete('cascade');
            $table->timestamps();
        });

        // Barang table
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->integer('stok');
            $table->decimal('harga', 8, 2);
            $table->timestamps();
        });

        // Transaksi Barang (pivot) table
        Schema::create('transaksi_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade');
            $table->integer('jumlah_barang');
            $table->timestamps();
        });

        // Supplier table
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->timestamps();
        });

        // Barang Supplier (pivot) table
        Schema::create('barang_supplier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('supplier')->onDelete('cascade');
            $table->timestamps();
        });

        // Kategori table
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->timestamps();
        });

        // Barang Kategori (pivot) table
        Schema::create('barang_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->timestamps();
        });

        // Jadwal Shift table
        Schema::create('jadwalshift', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });

        // Pegawai Jadwal Shift (pivot) table
        Schema::create('pegawai_jadwalshift', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawai')->onDelete('cascade');
            $table->foreignId('jadwalshift_id')->constrained('jadwalshift')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExist('transaksi_barang');
        Schema::dropIfExist('transaksi');
        Schema::dropIfExist('membership');
        Schema::dropIfExist('customer');
        Schema::dropIfExist('pegawai_jadwalshift');
        Schema::dropIfExist('jadwalshift');
        Schema::dropIfExist('pegawai');
        Schema::dropIfExist('barang_supplier');
        Schema::dropIfExist('supplier');
        Schema::dropIfExist('barang_kategori');
        Schema::dropIfExist('kategori');
        Schema::dropIfExist('barang');
    }
};