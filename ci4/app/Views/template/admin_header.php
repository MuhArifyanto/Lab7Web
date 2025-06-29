<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?? 'Admin Portal' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-3">
        <h2 class="fw-bold">Admin Portal Berita</h2>

        <!-- Menu Navigasi -->
        <div class="d-flex justify-content-between align-items-center bg-primary p-2 mb-3 rounded">
            <div class="d-flex gap-2">
                <a class="btn btn-primary text-white <?= uri_string() == 'admin/artikel' ? 'active' : '' ?>" href="<?= base_url('admin/artikel'); ?>">Dashboard</a>
                <a class="btn btn-primary text-white" href="<?= base_url('admin/artikel'); ?>">Artikel</a>
                <a class="btn btn-primary text-white" href="<?= base_url('admin/artikel/add'); ?>">Tambah Artikel</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="text-white">Selamat datang, <?= session()->get('username'); ?>!</span>
                <a class="btn btn-light btn-sm" href="<?= base_url('user/logout'); ?>">Logout</a>
            </div>
        </div>

        <!-- Content Area -->
