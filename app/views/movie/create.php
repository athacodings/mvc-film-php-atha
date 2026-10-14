<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Film</title>
</head>
<body>
    <h2>Tambah Film</h2>

    <?php if (!empty($_SESSION['flash'])): ?>
        <p style="color: <?= $_SESSION['flash']['type'] === 'success' ? 'green' : 'red' ?>">
            <?= htmlspecialchars($_SESSION['flash']['message']) ?>
        </p>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <form method="post" action="index.php?page=film&action=store">
        <label>Judul</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Sutradara</label><br>
        <input type="text" name="sutradara" required><br><br>

        <label>Genre</label><br>
        <input type="text" name="genre" required><br><br>

        <label>Tahun Rilis</label><br>
        <input type="number" name="tahun_rilis" min="1888" max="2100" required><br><br>

        <label>Durasi (menit)</label><br>
        <input type="number" name="durasi" min="1" required><br><br>

        <label>Rating (0-10)</label><br>
        <input type="number" name="rating" min="0" max="10" step="0.1" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</body>
</html>