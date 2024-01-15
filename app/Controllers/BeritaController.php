<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use CodeIgniter\RESTful\ResourceController;

class BeritaController extends ResourceController
{
    protected $berita;
 
    function __construct()
    {
        $this->berita = new BeritaModel();
        helper(['form','url']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index()
    {
        $autoload['helper'] = array('text');
        $data = ([
            'berita'   => $this->berita->findAll(),
        ]);
        return view('dashboard/berita/v_berita',$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($slug = null)
    {
        // ambil artikel yang akan diedit
        $berita = $this->berita;
        // $data['produks'] = $produk->where('id_produk', $id)->first();
        $data = ([
            'berita'   => $berita->getBerita($slug)
        ]);
        // tampilkan form edit
        echo view('dashboard/berita/v_berita_view', $data);
        // dd($data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [];
        return view('dashboard/berita/v_berita_add', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);
        $rules = [
            'judul'          => 'required|max_length[100]|is_unique[berita.judul]',
            'isi'         => 'required',
        ];
        $imageFile = $this->request->getFile('gambar');
        if($this->validate($rules)){  
            $judul = $this->request->getVar('judul');
            $out = explode(" ",$judul);
            $slugs = implode("-",$out);

            // proses menambahkan gambar ke directory local atau penyimpanan lokal
            $gambarName = ($slugs.'.'.$imageFile->getClientExtension());
            $imageFile->move(WRITEPATH . '../public/assets/berita/',$gambarName);

            $userModel = $this->berita;
            $data = [
                'judul'     => $judul,
                'slug'     => $slugs,
                'kategori'    => $this->request->getVar('kategori'),
                'isi' => $this->request->getVar('isi'),
                'penulis' => $this->request->getVar('penulis'),
                'tanggal' => $this->request->getVar('tanggal'),
                'publish' => $this->request->getVar('publish'),
                'gambar' => $gambarName,
            ];
            // dd($data);
            $userModel->save($data);
            return redirect()->to('/dashboard/berita');

        }else{
            $data['validation'] = $this->validator;
            echo view('dashboard/berita/v_berita_add', $data);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // ambil artikel yang akan diedit
        $berita = $this->berita;
        // $data['produks'] = $produk->where('id_produk', $id)->first();
        $data = ([
            'berita'   => $berita->find($id)
        ]);
        // tampilkan form edit
        echo view('dashboard/berita/v_berita_edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $judul = $this->request->getVar('judul');
        $out = explode(" ",$judul);
        $slugs = implode("-",$out);
        $berita_item = $this->berita->find($id);
        $imageFile = $this->request->getFile('gambar');
        $data = [
            'judul'     => $judul,
            'slug'     => $slugs,
            'kategori'    => $this->request->getVar('kategori'),
            'isi' => $this->request->getVar('isi'),
            'penulis' => $this->request->getVar('penulis'),
            'tanggal' => $this->request->getVar('tanggal'),
            'publish' => $this->request->getVar('publish')
        ];

        // proses replace gambar  -> jika user mengubah atau mengupload gambar baru
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            $old_img = $berita_item['gambar'];
            if (file_exists("../public/assets/berita/".$old_img)) {
                unlink('../public/assets/berita/'.$old_img);
            }
            $gambarName = ($slugs.'.'.$imageFile->getClientExtension());
            $imageFile->move('../public/assets/berita/',$gambarName);
            $data['gambar'] = $gambarName;

        }
        

        $this->berita->update($id, $data);
        // Redirect to the appropriate page
        return redirect()->to('/dashboard/berita');
        
        // dd($data);
        

    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $query = $this->berita->find($id);
        //dd($query);
        $this->berita->delete($id);
        $img_url = (WRITEPATH . '../public/assets/berita/'.$query['gambar']);
        // print_r($img_url);
        unlink($img_url);
        return redirect()->to('/dashboard/berita')->with('success', 'Data Deleted Successfully');
    }
}
