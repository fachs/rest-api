<?php 

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Service extends REST_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Service_model','services');
    }
    public function index_get()
    {
        $id = $this->get('id');
        $keyword = $this->get('keyword');

        if ($id === null) {
            $services = $this->services->getServiceByKeyword($keyword);
        } elseif ($keyword === null) {
            $services = $this->services->getService($id);
        } else {
            $services = $this->services->getService();
        }
        
        if ($services) {
            $this->response([
                'status' => true,
                'data' => $services
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Service Not Found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // public function index_delete()
    // {
    //     $id = $this->delete('id');

    //         if ($id === null) {
    //             $this->response([
    //                 'status' => false,
    //                 'message' => 'Provide an id!'
    //             ], REST_Controller::HTTP_BAD_REQUEST);
    //         } else {
    //             if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
    //                 $this->response([
    //                     'status' => true,
    //                     'id' => $id,
    //                     'message' => 'deleted'
    //                 ], REST_Controller::HTTP_NO_CONTENT);
    //             } else {
    //                 $this->response([
    //                     'status' => false,
    //                     'message' => 'Id not found!'
    //                 ], REST_Controller::HTTP_BAD_REQUEST);
    //             }
    //         }
    // }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'kategori' => $this->post('kategori'),
            'workers_id' => $this->post('workers_id'),
            'harga_pil_1' => $this->post('harga_pil_1'),
            'harga_pil_2' => $this->post('harga_pil_2'),
            'harga_pil_3' => $this->post('harga_pil_3'),
            'pic_1' => $this->post('pic_1'),
            'pic_2' => $this->post('pic_2'),
            'pic_3' => $this->post('pic_3'),
            'vid_4' => $this->post('vid_4'),
            'ket_pil1' => $this->post('ket_pil1'),
            'ket_pil2' => $this->post('ket_pil2'),
            'ket_pil3' => $this->post('ket_pil3'),
            'description' => $this->post('description'),
            'requirements' => $this->post('requirements'),
            'nama_pil1' => $this->post('nama_pil1'),
            'nama_pil2' => $this->post('nama_pil2'),
            'nama_pil3' => $this->post('nama_pil3')
        ];

        if ($this->services->createService($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Service added!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Fail to add!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'nama' => $this->post('nama'),
            'kategori' => $this->post('kategori'),
            'workers_id' => $this->post('workers_id'),
            'harga_pil_1' => $this->post('harga_pil_1'),
            'harga_pil_2' => $this->post('harga_pil_2'),
            'harga_pil_3' => $this->post('harga_pil_3'),
            'pic_1' => $this->post('pic_1'),
            'pic_2' => $this->post('pic_2'),
            'pic_3' => $this->post('pic_3'),
            'vid_4' => $this->post('vid_4'),
            'ket_pil1' => $this->post('ket_pil1'),
            'ket_pil2' => $this->post('ket_pil2'),
            'ket_pil3' => $this->post('ket_pil3'),
            'description' => $this->post('description'),
            'requirements' => $this->post('requirements'),
            'nama_pil1' => $this->post('nama_pil1'),
            'nama_pil2' => $this->post('nama_pil2'),
            'nama_pil3' => $this->post('nama_pil3')
        ];
        
        if ($this->services->updateService($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Service changed!'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Fail to change!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

    
}


?>