<?php

class FilmController
{
    public function __construct(private Film $model) {}

    public function index(): void
    {
        $films = $this->model->getAll();
        require __DIR__ . '/../views/movie/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../views/movie/create.php';
    }

    public function store(): void
    {
        [$data, $error] = $this->validateInput($_POST);

        if ($error) {
            $this->redirect('index.php?page=film&action=create', 'error', $error);
        }

        try {
            $this->model->insert($data);
            $this->redirect('index.php?page=film', 'success', 'Film berhasil ditambahkan.');
        } catch (PDOException $e) {
            $this->redirect('index.php?page=film&action=create', 'error', 'Gagal menyimpan film.');
        }
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $film = $this->model->findById($id);

        if (!$film) {
            http_response_code(404);
            exit('Data film tidak ditemukan.');
        }

        require __DIR__ . '/../views/movie/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        [$data, $error] = $this->validateInput($_POST);

        if ($error) {
            $this->redirect("index.php?page=film&action=edit&id=$id", 'error', $error);
        }

        try {
            $this->model->update($id, $data);
            $this->redirect('index.php?page=film', 'success', 'Film berhasil diperbarui.');
        } catch (PDOException $e) {
            $this->redirect("index.php?page=film&action=edit&id=$id", 'error', 'Gagal memperbarui film.');
        }
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->redirect('index.php?page=film', 'success', 'Film berhasil dihapus.');
        } catch (PDOException $e) {
            $this->redirect('index.php?page=film', 'error', 'Gagal menghapus film.');
        }
    }

    private function validateInput(array $input): array
    {
        $data = [
            'judul'       => trim($input['judul'] ?? ''),
            'sutradara'   => trim($input['sutradara'] ?? ''),
            'genre'       => trim($input['genre'] ?? ''),
            'tahun_rilis' => trim($input['tahun_rilis'] ?? ''),
            'durasi'      => trim($input['durasi'] ?? ''),
            'rating'      => trim($input['rating'] ?? ''),
        ];

        foreach ($data as $value) {
            if ($value === '') {
                return [$data, 'Semua field wajib diisi.'];
            }
        }

        if (!ctype_digit($data['tahun_rilis']) || $data['tahun_rilis'] < 1888 || $data['tahun_rilis'] > 2100) {
            return [$data, 'Tahun rilis tidak valid.'];
        }

        if (!ctype_digit($data['durasi']) || (int) $data['durasi'] < 1) {
            return [$data, 'Durasi harus berupa angka menit.'];
        }

        if (!is_numeric($data['rating']) || $data['rating'] < 0 || $data['rating'] > 10) {
            return [$data, 'Rating harus antara 0 sampai 10.'];
        }

        return [$data, null];
    }

    private function redirect(string $url, string $type, string $message): never
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
        header("Location: $url");
        exit;
    }
}