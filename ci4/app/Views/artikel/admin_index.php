<?= $this->include('template/admin_header'); ?>

        <!-- Form Pencarian -->
        <form method="get" class="d-flex mb-3" role="search">
            <input type="text" name="q" value="<?= htmlspecialchars($q ?? ''); ?>" placeholder="Cari data" class="form-control me-2" aria-label="Cari data" />
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <!-- Tabel Artikel -->
        <table class="table table-bordered">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($artikel)): ?>
                    <?php foreach ($artikel as $item): ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($item['id']); ?></td>
                            <td class="text-center">
                                <?php if (!empty($item['gambar'])): ?>
                                    <img src="<?= base_url('gambar/' . $item['gambar']); ?>"
                                         alt="<?= htmlspecialchars($item['judul']); ?>"
                                         class="img-thumbnail"
                                         style="width: 80px; height: 60px; object-fit: cover;">
                                <?php else: ?>
                                    <span class="text-muted">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?= htmlspecialchars($item['judul']); ?></strong>
                                <p><small><?= htmlspecialchars(substr($item['isi'], 0, 50)); ?>...</small></p>
                            </td>
                            <td class="text-center"><?= htmlspecialchars($item['status']); ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/artikel/edit/' . $item['id']); ?>" class="btn btn-secondary btn-sm">Ubah</a>
                                <a href="<?= base_url('admin/artikel/delete/' . $item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-start">
            <?= $pager->links(); ?>
        </div>

<?= $this->include('template/admin_footer'); ?>
