<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();

        return view('artikel/index', compact('artikel', 'title'));
    }

    public function admin_index()
    {
    $title = 'Daftar Artikel';
    $model = new ArtikelModel();
    $data = [
    'title' => $title,
    'artikel' => $model->paginate(10), #data dibatasi 10 record
    'pager' => $model->pager,
    ];

    return view('artikel/admin_index', $data);
    
    }

    public function add()
    {
        // Ambil service validasi
        $validation = \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => [
                'label' => 'Gambar',
                'rules' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Gambar wajib diunggah.',
                    'is_image' => 'File harus berupa gambar.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                ],
            ],
        ]);

        // Jalankan validasi terhadap request
        if ($validation->withRequest($this->request)->run()) {
            // Ambil file gambar dari form
            $file = $this->request->getFile('gambar');

            // Pindahkan file ke folder public/gambar
            $fileName = $file->getRandomName(); // Hindari overwrite nama file
            $file->move(ROOTPATH . 'public/gambar', $fileName);

            // Simpan data ke database
            $artikel = new \App\Models\ArtikelModel();
            $artikel->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul'), '-', true),
                'gambar' => $fileName,
                'status' => 0, // default status 0 (misalnya: draft)
            ]);

            return redirect()->to(base_url('admin/artikel'));
        }

        // Jika validasi gagal
        $data = [
            'title' => 'Tambah Artikel',
            'validation' => $validation
        ];
        return view('artikel/form_add', $data);
    }


    public function edit($id)
    {
        $artikel = new ArtikelModel();

        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel->update($id, [
                'judul' => $this->request->getPost('judul'),
                'isi'   => $this->request->getPost('isi'),
            ]);

            return redirect()->to('admin/artikel');
        }

        // Ambil data lama
        $data = $artikel->where('id', $id)->first();
        $title = "Edit Artikel";

        return view('artikel/form_edit', compact('title', 'data'));
    }

    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);

        return redirect()->to('admin/artikel');
    }

        public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where('slug', $slug)->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan slug '$slug' tidak ditemukan.");
        }

        $data = [
            'title' => $artikel['judul'],
            'artikel' => $artikel
        ];

        return view('artikel/view', $data);
    }

}
