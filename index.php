<div class="mt-4">
    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                    Tambah Data Game
                </button>
            <?php endif; ?>
        </div>
        <div class="col-lg-6">
            <form action="http://localhost/project_uas_game/Home/cari" method="post">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari game..." name="keyword" id="keyword" autocomplete="off">
                <button class="btn btn-outline-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <?php if( !empty($data['game']) ) : ?>
            <?php foreach( $data['game'] as $g ) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-primary">
                                <?php echo htmlspecialchars($g['judul']); ?>
                            </h5>
                            <p class="card-text">
                                <span class="badge bg-secondary"><?php echo htmlspecialchars($g['genre']); ?></span>
                            </p>
                            <p class="card-text text-warning fw-bold">
                                ⭐ <?php echo htmlspecialchars($g['rating']); ?>
                            </p>
                            
                            <hr>
                            <div class="d-flex gap-2">
                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                                    <a href="http://localhost/project_uas_game/Home/hapus/<?= $g['id']; ?>" 
                                       class="btn btn-danger btn-sm flex-fill" 
                                       onclick="return confirm('Yakin ingin menghapus game ini?');">Hapus</a>
                                    
                                    <button type="button" class="btn btn-success btn-sm flex-fill tampilModalUbah" 
                                       data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $g['id']; ?>">Ubah</button>
                                <?php else : ?>
                                    <button class="btn btn-outline-secondary btn-sm flex-fill" disabled>Mode Lihat Saja</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 text-center">
                <p class="text-muted">Data game tidak ditemukan.</p>
            </div>
        <?php endif; ?>
    </div>

    <?php if( isset($data['jumlahHalaman']) && $data['jumlahHalaman'] > 1 ) : ?>
    <nav aria-label="Page navigation" class="mt-2">
      <ul class="pagination justify-content-center">
        <?php if($data['halamanAktif'] > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="http://localhost/project_uas_game/Home/index/&p=<?= $data['halamanAktif'] - 1; ?>">Previous</a>
            </li>
        <?php endif; ?>

        <?php for($i = 1; $i <= $data['jumlahHalaman']; $i++) : ?>
            <li class="page-item <?= ($i == $data['halamanAktif']) ? 'active' : ''; ?>">
                <a class="page-link" href="http://localhost/project_uas_game/Home/index/&p=<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if($data['halamanAktif'] < $data['jumlahHalaman']) : ?>
            <li class="page-item">
                <a class="page-link" href="http://localhost/project_uas_game/Home/index/&p=<?= $data['halamanAktif'] + 1; ?>">Next</a>
            </li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalLabel">Tambah Data Game</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/project_uas_game/Home/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul Game</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
          </div>
          <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" class="form-control" id="rating" name="rating" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>