<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Film</title>
</head>
<body>
    <h2>Edit Film</h2>

    <?php if (!empty($_SESSION['flash'])): ?>
        <p style="color: <?= $_SESSION['flash']['type'] === 'success' ? 'green' : 'red' ?>">
            <?= htmlspecialchars($_SESSION['flash']['message']) ?>
        </p>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <form method="post" action="index.php?page=film&action=update">
        <input type="hidden" name="id" value="<?= (int) $film['id'] ?>">

        <label>Judul</label><br>
        <input type="text" name="judul"
               value="<?= htmlspecialchars($film['judul']) ?>" required><br><br>

        <label>Sutradara</label><br>
        <input type="text" name="sutradara"
               value="<?= htmlspecialchars($film['sutradara']) ?>" required><br><br>

        <label>Genre</label><br>
        <input type="text" name="genre"
               value="<?= htmlspecialchars($film['genre']) ?>" required><br><br>

        <label>Tahun Rilis</label><br>
        <input type="number" name="tahun_rilis" min="1888" max="2100"
               value="<?= htmlspecialchars($film['tahun_rilis']) ?>" required><br><br>

        <label>Durasi (menit)</label><br>
        <input type="number" name="durasi" min="1"
               value="<?= htmlspecialchars($film['durasi']) ?>" required><br><br>

        <label>Rating (0-10)</label><br>
        <input type="number" name="rating" min="0" max="10" step="0.1"
               value="<?= htmlspecialchars($film['rating']) ?>" required><br><br>

        <button type="submit">Update</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</body>
</html>