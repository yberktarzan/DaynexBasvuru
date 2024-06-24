<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Validation $form_validation
 * @property CI_Model $form_validation
 */
class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_Model', 'product'); // Product_Model al.
    }

    public function create()
    {
        $data['title'] = 'Ürün Oluştur';
        $data['content'] = $this->load->view('products/create', [], TRUE);

        $this->load->view('layouts/daynex_layout', $data); // Layouta gönder
    }

    public function store()
    {
        // Ajax isteği mi kontrol et
        if (!$this->input->is_ajax_request()) {
            show_404(); // Sadece Ajax istekleri için.
        }

        // Form validation kuralları
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('urun_baslik_tr', 'Ürün Başlık', 'required');
        $this->form_validation->set_rules('urun_kodu', 'Ürün Kodu', 'required');


        // Form validation işlemleri
        if ($this->form_validation->run() == FALSE) {
            // Hata durumunda
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
            return;
        } else {
            // Başarılı validasyon durumu
            $data = array(
                'urun_baslik_tr' => $this->input->post('urun_baslik_tr'),
                'urun_baslik_en' => $this->input->post('urun_baslik_en'),
                'urun_ek_bilgi_baslik_tr' => $this->input->post('urun_ek_bilgi_baslik_tr'),
                'urun_ek_bilgi_baslik_en' => $this->input->post('urun_ek_bilgi_baslik_en'),
                'urun_ek_bilgi_aciklama_tr' => $this->input->post('urun_ek_bilgi_aciklama_tr'),
                'urun_ek_bilgi_aciklama_en' => $this->input->post('urun_ek_bilgi_aciklama_en'),
                'meta_title_tr' => $this->input->post('meta_title_tr'),
                'meta_title_en' => $this->input->post('meta_title_en'),
                'meta_keywords_tr' => $this->input->post('meta_keywords_tr'),
                'meta_keywords_en' => $this->input->post('meta_keywords_en'),
                'meta_description_tr' => $this->input->post('meta_description_tr'),
                'meta_description_en' => $this->input->post('meta_description_en'),
                'seo_adresi_tr' => $this->input->post('seo_adresi_tr'),
                'seo_adresi_en' => $this->input->post('seo_adresi_en'),
                'urun_aciklama_tr' => $this->input->post('urun_aciklama_tr'),
                'urun_aciklama_en' => $this->input->post('urun_aciklama_en'),
                'video_embed_kodu_tr' => $this->input->post('video_embed_kodu_tr'),
                'video_embed_kodu_en' => $this->input->post('video_embed_kodu_en'),
                'urun_kodu' => $this->input->post('urun_kodu'),
                'miktar' => $this->input->post('miktar'),
                'miktar_turu' => $this->input->post('miktar_turu'),
                'sepet_ekstra_indirim' => $this->input->post('sepet_ekstra_indirim'),
                'vergi_orani' => $this->input->post('vergi_orani'),
                'satis_fiyati_tl' => $this->input->post('satis_fiyati_tl'),
                'satis_fiyati_usd' => $this->input->post('satis_fiyati_usd'),
                'satis_fiyati_euro' => $this->input->post('satis_fiyati_euro'),
                'ikinci_satis_fiyati' => $this->input->post('ikinci_satis_fiyati'),
                'stoktan_dus' => $this->input->post('stoktan_dus'),
                'durum' => $this->input->post('durum'),
                'ozellik_bolumu' => $this->input->post('ozellik_bolumu'),
                'gecerlilik_suresi' => $this->input->post('gecerlilik_suresi'),
                'siralama' => $this->input->post('siralama'),
                'anasayfada_goster' => $this->input->post('anasayfada_goster'),
                'yeni_urun' => $this->input->post('yeni_urun'),
                'taksit' => $this->input->post('taksit'),
                'garanti_suresi' => $this->input->post('garanti_suresi'),
            );

            // Resim yükleme işlemleri
            $config['upload_path'] = './urunler/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'ana_resim_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ana_resim')) {
                $data['ana_resim'] = 'urunler/' . $this->upload->data('file_name');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $response = array(
                    'status' => 'error',
                    'message' => 'Ana resim yükleme hatası: ' . $error['error']
                );
                echo json_encode($response);
                return;
            }

            // Diğer resimler yükleme (eğer varsa)
            $uploaded_files = array();
            if (!empty($_FILES['resimler']['name'])) {
                $files = $_FILES['resimler'];
                foreach ($files['name'] as $key => $image) {
                    $_FILES['userfile']['name'] = $files['name'][$key];
                    $_FILES['userfile']['type'] = $files['type'][$key];
                    $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$key];
                    $_FILES['userfile']['error'] = $files['error'][$key];
                    $_FILES['userfile']['size'] = $files['size'][$key];

                    $config['file_name'] = 'resim_' . time() . '_' . $key;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('userfile')) {
                        $uploaded_files[] = 'urunler/' . $this->upload->data('file_name');
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        $response = array(
                            'status' => 'error',
                            'message' => 'Diğer resim yükleme hatası: ' . $error['error']
                        );
                        echo json_encode($response);
                        return;
                    }
                }
            }

            // Yüklenen resimleri $data dizisine ekle
            $data['resimler'] = json_encode($uploaded_files);


            if ($this->Product_Model->insert('products', $data)) {
                // Product successfully inserted
                $response = array(
                    'status' => 'success',
                    'message' => 'Ürün başarıyla kaydedildi.'
                );
                echo json_encode($response);
            } else {
                // Insertion failed
                $response = array(
                    'status' => 'error',
                    'message' => 'Ürün kaydedilirken bir hata oluştu.'
                );
                echo json_encode($response);
            }
            
        }
    }

    public function list()
    {
        $data['title'] = 'Ürünler';
        $data['content'] = $this->load->view('products/list', [], TRUE);

        $this->load->view('layouts/daynex_layout', $data);
    }

    public function get_products() {

        $list = $this->product->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $product) {
            $no++;
            $row = array();
            $row[] = $product->id;
            $row[] = $product->urun_kodu;
            $row[] = $product->urun_baslik_tr;
            $row[] = $product->satis_fiyati_tl;
            $row[] = $product->durum;

            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->product->count_all(),
            "recordsFiltered" => $this->product->count_filtered(),
            "data" => $data,
        );

        if (!empty($_POST['search']['value'])) {
            $output['data'] = array_filter($output['data'], function ($row) {
                return strpos(strtolower(implode($row)), strtolower($_POST['search']['value'])) !== false;
            });
            $output['recordsFiltered'] = count($output['data']);
        }
        
        echo json_encode($output);
    }
}
