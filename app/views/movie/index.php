<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Film</title>
</head>
<body>
    <h2>Daftar Film</h2>

    <?php if (!empty($_SESSION['flash'])): ?>
        <p style="color: <?= $_SESSION['flash']['type'] === 'success' ? 'green' : 'red' ?>">
            <?= htmlspecialchars($_SESSION['flash']['message']) ?>
        </p>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <a href="index.php?page=film&action=create">Tambah Film</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Judul</th>
            <th>Sutradara</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Durasi (menit)</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($films as $f): ?>
        <tr>
            <td><?= htmlspecialchars($f['judul']) ?></td>
            <td><?= htmlspecialchars($f['sutradara']) ?></td>
            <td><?= htmlspecialchars($f['genre']) ?></td>
            <td><?= htmlspecialchars($f['tahun_rilis']) ?></td>
            <td><?= htmlspecialchars($f['durasi']) ?></td>
            <td><?= htmlspecialchars($f['rating']) ?></td>
            <td>
                <a href="index.php?page=film&action=edit&id=<?= $f['id'] ?>">Edit</a>
                <form method="post"
                      action="index.php?page=film&action=delete"
                      style="display:inline"
                      onsubmit="return confirm('Hapus film ini?')">
                    <input type="hidden" name="id" value="<?= $f['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>