<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use CodeIgniter\RESTful\ResourceController;

class ProdukController extends ResourceController
{
    protected $produks;
 
    function __construct()
    {
        $this->produks = new ProdukModel();
        helper(['form','url']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index()
    {
        $data = ([
            'produk'   => $this->produks->findAll(),
        ]);
        return view('dashboard/produk/v_produk',$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        helper(['form']);
        $data = [];
        return view('dashboard/produk/v_produk_add', $data);
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
            'nama'          => 'required|max_length[100]|is_unique[produk.nama]',
            'deskripsi'         => 'required',
        ];
        $imageFile = $this->request->getFile('gambar');
        if($this->validate($rules)){  
            $nama_produk = $this->request->getVar('nama');
            $out = explode(" ",$nama_produk);
            $slugs = implode("-",$out);
            $gambarName = ($slugs.'.'.$imageFile->getClientExtension());
            $imageFile->move(WRITEPATH . '../public/assets/produk/',$gambarName);

            $userModel = new ProdukModel();
            $data = [
                'nama'     => $nama_produk,
                'deskripsi' => $this->request->getVar('deskripsi'),
                'gambar' => $gambarName,
                'slug'     => $slugs,
            ];
            // dd($data);
            $userModel->save($data);
            return redirect()->to('dashboard/produk');

        }else{
            $data['validation'] = $this->validator;
            echo view('dashboard/produk/v_produk_add', $data);
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
        $produk = $this->produks;
        // $data['produks'] = $produk->where('id_produk', $id)->first();
        $data = ([
            'produk'   => $produk->find($id)
        ]);
        // tampilkan form edit
        echo view('dashboard/produk/v_produk_edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        helper(['form']);
        $rules = [
            'nama'          => 'required|max_length[100]',
            'deskripsi'         => 'required',
        ];
        $imageFile = $this->request->getFile('gambar');
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $out = explode(" ",$nama);
            $slugs = implode("-",$out);
            $berita_item = $this->produks->find($id);
            $imageFile = $this->request->getFile('gambar');
            $data = [
                'nama'     => $nama,
                'slug'     => $slugs,
                'deskripsi' => $this->request->getVar('deskripsi'),
            ];

            // proses replace gambar  -> jika user mengubah atau mengupload gambar baru
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $old_img = $berita_item['gambar'];
                if (file_exists("../public/assets/produk/".$old_img)) {
                    unlink('../public/assets/produk/'.$old_img);
                }
                $gambarName = ($slugs.'.'.$imageFile->getClientExtension());
                $imageFile->move('../public/assets/produk/',$gambarName);
                $data['gambar'] = $gambarName;

            }
            
            $this->produks->update($id, $data);
            // Redirect to the appropriate page
            return redirect()->to('dashboard/produk');
        }else{
            $data['validation'] = $this->validator;
            return redirect()->to('dashboard/produk/edit/'.$id);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id=null)
    {
        $query = $this->produks->where('id_produk', $id)->findAll();
        //dd($query);
        $this->produks->delete($id);
        $img_url = (WRITEPATH . '../public/assets/produk/'.$query[0]['gambar']);
        print_r($img_url);
        unlink($img_url);
        return redirect('dashboard/produk')->with('success', 'Data Deleted Successfully');
    }
}
