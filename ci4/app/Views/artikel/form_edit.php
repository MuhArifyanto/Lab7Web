<?= $this->include('template/admin_header'); ?>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold"><?= $title; ?></h3>
            <a href="<?= base_url('admin/artikel'); ?>" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin/artikel/edit/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                               value="<?= old('judul', $data['judul']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Artikel</label>
                        <textarea class="form-control" id="isi" name="isi" rows="10" required><?= old('isi', $data['isi']); ?></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="<?= base_url('admin/artikel'); ?>" class="btn btn-secondary me-md-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Artikel</button>
                    </div>
                </form>
            </div>
        </div>

<?= $this->include('template/admin_footer'); ?>