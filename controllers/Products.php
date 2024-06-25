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
        $this->load->model('Product_Model');
        $this->load->model('Product_Model', 'product'); // Product_Model yükleniyor
        $this->load->helper('url');
    }

    public function create()
    {
        $data['title'] = 'Ürün Oluştur';
        $data['content'] = $this->load->view('products/create', [], TRUE);

        $this->load->view('layouts/daynex_layout', $data);
    }

    public function edit($productId)
    {
        $data['title'] = 'Ürün Oluştur';
        $this->load->model('Product_Model');

        // Get product details from model
        $query = $this->db->get_where('products', array('id' => $productId));

        // Check if product exists
        if ($query->num_rows() > 0) {
            $data['product'] = $query->row_array(); // Ürün bulunduysa bir dizi olarak $data'ya ekleyelim
            $data['title'] = 'Ürün Düzenle'; // Sayfa başlığı
            $data['repeaterData'] = json_decode($data['product']['repeaterData'], true);
            $data['content'] = $this->load->view('products/edit', $data, TRUE);

            $this->load->view('layouts/daynex_layout', $data);
        } else {
            show_404(); // Ürün bulunamazsa 404 hatası gösterelim veya başka bir işlem yapalım
        }
    }

    public function store()
    {
        // Ajax isteği mi kontrol et
        if (!$this->input->is_ajax_request()) {
            show_404(); // Sadece Ajax isteklerine izin ver
        }

        // Form validation kuralları
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('urun_baslik_tr', 'Ürün Başlık', 'required');
        $this->form_validation->set_rules('urun_kodu', 'Ürün Kodu', 'required');
        // Diğer gerekli alanlar için kuralları buraya ekleyebilirsiniz

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
                'repeaterData' => $this->input->post('repeaterData'),
            );

            // Resim yükleme işlemleri
            $config['upload_path'] = './uploads/urunler/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'ana_resim_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ana_resim')) {
                $data['ana_resim'] = 'uploads/urunler/' . $this->upload->data('file_name');
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
                        $uploaded_files[] = 'uploads/urunler/' . $this->upload->data('file_name');
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

    public function update()
    {
        $this->load->library('form_validation');
        $productId = $this->input->post('id');


        $this->form_validation->set_rules('urun_baslik_tr', 'Ürün Başlığı', 'required');
        $this->form_validation->set_rules('urun_ek_bilgi_baslik_tr', 'Ürün Ek Bilgi Başlığı', 'required');
        $this->form_validation->set_rules('urun_ek_bilgi_aciklama_tr', 'Ürün Ek Bilgi Açıklaması', 'required');
        $this->form_validation->set_rules('meta_title_tr', 'Meta Title', 'required');
        $this->form_validation->set_rules('meta_keywords_tr', 'Meta Keywords', 'required');
        $this->form_validation->set_rules('meta_description_tr', 'Meta Description', 'required');
        $this->form_validation->set_rules('seo_adresi_tr', 'SEO Adresi', 'required');
        $this->form_validation->set_rules('urun_aciklama_tr', 'Ürün Açıklaması', 'required');
        $this->form_validation->set_rules('video_embed_kodu_tr', 'Video Embed Kodu', 'required');
        $this->form_validation->set_rules('urun_kodu', 'Ürün Kodu', 'required');
        $this->form_validation->set_rules('miktar', 'Miktar', 'required');
        $this->form_validation->set_rules('miktar_turu', 'Miktar Türü', 'required');
        $this->form_validation->set_rules('sepet_ekstra_indirim', 'Sepet Ekstra İndirim', 'required');
        $this->form_validation->set_rules('vergi_orani', 'Vergi Oranı', 'required');
        $this->form_validation->set_rules('satis_fiyati_tl', 'Satış Fiyatı (TL)', 'required');
        $this->form_validation->set_rules('satis_fiyati_usd', 'Satış Fiyatı (USD)', 'required');
        $this->form_validation->set_rules('satis_fiyati_euro', 'Satış Fiyatı (EURO)', 'required');
        $this->form_validation->set_rules('ikinci_satis_fiyati', '2. Satış Fiyatı (Sadece TL)', 'required');
        $this->form_validation->set_rules('stoktan_dus', 'Stoktan Düş', 'required');
        $this->form_validation->set_rules('durum', 'Durum', 'required');
        $this->form_validation->set_rules('ozellik_bolumu', 'Özellik Bölümü', 'required');
        $this->form_validation->set_rules('gecerlilik_suresi', 'Geçerlilik Süresi', 'required');
        $this->form_validation->set_rules('siralama', 'Sıralama', 'required');
        $this->form_validation->set_rules('anasayfada_goster', 'Anasayfada Göster', 'required');
        $this->form_validation->set_rules('yeni_urun', 'Yeni Ürün', 'required');
        $this->form_validation->set_rules('taksit', 'Taksit', 'required');
        $this->form_validation->set_rules('garanti_suresi', 'Garanti Süresi (Ay)', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->edit($productId);
        } else {



            $updateData = array(
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
                'ana_resim' => $this->handleMainImage($productId),
                'resimler' => $this->handleAdditionalImages($productId),
                'repeaterData' => $this->input->post('repeaterData'),
            );

            // Perform update in the Product_Model
            $this->load->model('Product_Model');
            $updateResult = $this->Product_Model->updateProduct($productId, $updateData);

            if ($updateResult) {
                // Update successful
                $response = array(
                    'status' => 'success',
                    'message' => 'Ürün başarıyla güncellendi!'
                );
            } else {
                // Update failed
                $response = array(
                    'status' => 'error',
                    'message' => 'Ürün güncelleme işlemi başarısız oldu.'
                );
            }

            echo json_encode($response);
        }
    }

    public function get_products()
    {

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

    public function delete_image()
    {
        $productId = $this->input->post('productId');
        $imageType = $this->input->post('imageType');

        // İlgili resmi veritabanından sil
        // Örneğin:
        $updateData = array(
            'ana_resim' => NULL // veya resmi tamamen silme işlemi
        );
        $updateResult = $this->Product_Model->updateProduct($productId, $updateData);



        if ($updateResult) {
            $response = array(
                'status' => 'success',
                'message' => 'Resim başarıyla silindi!'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Resim silinirken hata oluştu!'
            );
        }

        echo json_encode($response);
    }



    public function delete_product_image()
    {
        $productId = $this->input->post('productId');
        $image = $this->input->post('image');

        // Örnek olarak, resmi sadece array'den kaldırmak için:
        $product = $this->Product_Model->getProductById($productId); // Ürünü veritabanından alın
        $resimler = json_decode($product['resimler'], true);

        // Silinecek resmi bul ve array'den kaldır
        if (($key = array_search($image, $resimler)) !== false) {
            unset($resimler[$key]);
        }

        // Güncelleme verisi oluşturun
        $updateData = array('resimler' => json_encode(array_values($resimler)));

        // Ürünü güncelleyin
        $updateResult = $this->Product_Model->updateProduct($productId, $updateData);

        if ($updateResult) {
            // Başarılı yanıt
            $response = array(
                'status' => 'success',
                'message' => 'Resim başarıyla silindi!'
            );
        } else {
            // Hata yanıtı
            $response = array(
                'status' => 'error',
                'message' => 'Resim silinirken hata oluştu!'
            );
        }

        echo json_encode($response);
    }


    private function handleMainImage($productId)
    {
        // Eğer ana resim yüklenmişse ve değiştirilmişse
        if (!empty($_FILES['ana_resim']['name'])) {
            $uploadPath = './uploads/'; // Yükleme dizini
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2 MB
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('ana_resim')) {
                // Hata durumu
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                // Yükleme başarılı
                $uploadData = $this->upload->data();
                $anaResim = $uploadData['file_name']; // Dosya adı
                return $anaResim;
            }
        } else {
            // Eğer ana resim değişmediyse, mevcut resmi geri döndür
            return $this->input->post('current_ana_resim');
        }
    }

    // Diğer resimler güncelleme işlemi
    private function handleAdditionalImages($productId)
    {
        // Eğer resimler yüklenmişse ve değiştirilmişse
        if (!empty($_FILES['resimler']['name'][0])) {
            $uploadPath = './uploads/'; // Yükleme dizini
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2 MB
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            $filesCount = count($_FILES['resimler']['name']);
            $uploadedFiles = array();

            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name'] = $_FILES['resimler']['name'][$i];
                $_FILES['file']['type'] = $_FILES['resimler']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['resimler']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['resimler']['error'][$i];
                $_FILES['file']['size'] = $_FILES['resimler']['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $uploadedFiles[] = $uploadData['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
            }

            return json_encode($uploadedFiles);
        } else {
            // Eğer resimler değişmediyse, mevcut resimleri geri döndür
            return $this->input->post('current_resimler');
        }
    }
}
