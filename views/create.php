<h2>Ürün Oluşturma</h2>
<form enctype="multipart/form-data">
    <ul class="nav nav-tabs" id="mainTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="genel-tab" data-bs-toggle="tab" data-bs-target="#genel" type="button" role="tab" aria-controls="genel" aria-selected="true">Genel</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="detaylar-tab" data-bs-toggle="tab" data-bs-target="#detaylar" type="button" role="tab" aria-controls="detaylar" aria-selected="false">Detaylar</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="resimler-tab" data-bs-toggle="tab" data-bs-target="#resimler" type="button" role="tab" aria-controls="resimler" aria-selected="false">Resimler</button>
        </li>
    </ul>
    <div class="tab-content" id="mainTabContent">
        <!-- Genel Tab -->
        <div class="tab-pane fade show active" id="genel" role="tabpanel" aria-labelledby="genel-tab">
            <ul class="nav nav-tabs mt-3" id="genelLangTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active mb-4" id="genel-tr-tab" data-bs-toggle="tab" data-bs-target="#genel-tr" type="button" role="tab" aria-controls="genel-tr" aria-selected="true">Türkçe</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link mb-4" id="genel-en-tab" data-bs-toggle="tab" data-bs-target="#genel-en" type="button" role="tab" aria-controls="genel-en" aria-selected="false">İngilizce</button>
                </li>
            </ul>
            <div class="tab-content" id="genelLangTabContent">
                <div class="tab-pane fade show active" id="genel-tr" role="tabpanel" aria-labelledby="genel-tr-tab">
                    <!-- Türkçe Genel Form Alanları -->
                    <div class="mb-3">
                        <label for="urun_baslik_tr" class="form-label">Ürün Başlık</label>
                        <input type="text" class="form-control" id="urun_baslik_tr" name="urun_baslik_tr">
                    </div>
                    <div class="mb-3">
                        <label for="urun_ek_bilgi_baslik_tr" class="form-label">Ürün Ek Bilgi Başlığı</label>
                        <input type="text" class="form-control" id="urun_ek_bilgi_baslik_tr" name="urun_ek_bilgi_baslik_tr">
                    </div>
                    <div class="mb-3">
                        <label for="urun_ek_bilgi_aciklama_tr" class="form-label">Ürün EK Bilgi Açıklaması</label>
                        <textarea class="form-control" id="urun_ek_bilgi_aciklama_tr" name="urun_ek_bilgi_aciklama_tr"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="meta_title_tr" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title_tr" name="meta_title_tr">
                    </div>
                    <div class="mb-3">
                        <label for="meta_keywords_tr" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords_tr" name="meta_keywords_tr">
                    </div>
                    <div class="mb-3">
                        <label for="meta_description_tr" class="form-label">Meta Description</label>
                        <input type="text" class="form-control" id="meta_description_tr" name="meta_description_tr">
                    </div>
                    <div class="mb-3">
                        <label for="seo_adresi_tr" class="form-label">Seo Adresi</label>
                        <input type="text" class="form-control" id="seo_adresi_tr" name="seo_adresi_tr">
                    </div>
                    <div class="mb-3">
                        <label for="urun_aciklama_tr" class="form-label">Ürün Açıklama</label>
                        <textarea class="form-control" id="urun_aciklama_tr" name="urun_aciklama_tr"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="video_embed_kodu_tr" class="form-label">Video Embed Kodu</label>
                        <input type="text" class="form-control" id="video_embed_kodu_tr" name="video_embed_kodu_tr">
                    </div>
                </div>
                <div class="tab-pane fade" id="genel-en" role="tabpanel" aria-labelledby="genel-en-tab">
                    <!-- İngilizce Genel Form Alanları -->
                    <div class="mb-3">
                        <label for="urun_baslik_en" class="form-label">Product Title</label>
                        <input type="text" class="form-control" id="urun_baslik_en" name="urun_baslik_en">
                    </div>
                    <div class="mb-3">
                        <label for="urun_ek_bilgi_baslik_en" class="form-label">Product Extra Info Title</label>
                        <input type="text" class="form-control" id="urun_ek_bilgi_baslik_en" name="urun_ek_bilgi_baslik_en">
                    </div>
                    <div class="mb-3">
                        <label for="urun_ek_bilgi_aciklama_en" class="form-label">Product Extra Info Description</label>
                        <textarea class="form-control" id="urun_ek_bilgi_aciklama_en" name="urun_ek_bilgi_aciklama_en"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="meta_title_en" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title_en" name="meta_title_en">
                    </div>
                    <div class="mb-3">
                        <label for="meta_keywords_en" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords_en" name="meta_keywords_en">
                    </div>
                    <div class="mb-3">
                        <label for="meta_description_en" class="form-label">Meta Description</label>
                        <input type="text" class="form-control" id="meta_description_en" name="meta_description_en">
                    </div>
                    <div class="mb-3">
                        <label for="seo_adresi_en" class="form-label">Seo Address</label>
                        <input type="text" class="form-control" id="seo_adresi_en" name="seo_adresi_en">
                    </div>
                    <div class="mb-3">
                        <label for="urun_aciklama_en" class="form-label">Product Description</label>
                        <textarea class="form-control" id="urun_aciklama_en" name="urun_aciklama_en"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="video_embed_kodu_en" class="form-label">Video Embed Code</label>
                        <input type="text" class="form-control" id="video_embed_kodu_en" name="video_embed_kodu_en">
                    </div>
                </div>
            </div>
        </div>
        <!-- Detaylar Tab -->
        <div class="tab-pane fade" id="detaylar" role="tabpanel" aria-labelledby="detaylar-tab">

            <div class="tab-pane fade show active" id="detaylar-tr" role="tabpanel" aria-labelledby="detaylar-tr-tab">
                <div class="mb-3">
                    <label for="urun_kodu" class="form-label">Ürün Kodu</label>
                    <input type="text" class="form-control" id="urun_kodu" name="urun_kodu">
                </div>
                <div class="mb-3">
                    <label for="miktar" class="form-label">Miktar</label>
                    <input type="number" class="form-control" id="miktar" name="miktar">
                </div>
                <div class="mb-3">
                    <label for="miktar_turu" class="form-label">Miktar Türü</label>
                    <select class="form-control" id="miktar_turu" name="miktar_turu">
                        <option value="adet">Adet</option>
                        <option value="kilo">Kilo</option>
                        <option value="litre">Litre</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sepet_ekstra_indirim" class="form-label">Sepet Ekstra İndirim %</label>
                    <input type="number" class="form-control" id="sepet_ekstra_indirim" name="sepet_ekstra_indirim">
                </div>
                <div class="mb-3">
                    <label for="vergi_orani" class="form-label">Vergi Oranı %</label>
                    <input type="number" class="form-control" id="vergi_orani" name="vergi_orani">
                </div>
                <div class="mb-3">
                    <label for="satis_fiyati_tl" class="form-label">Satış Fiyatı (TL)</label>
                    <input type="number" class="form-control" id="satis_fiyati_tl" name="satis_fiyati_tl">
                </div>
                <div class="mb-3">
                    <label for="satis_fiyati_usd" class="form-label">Satış Fiyatı (USD)</label>
                    <input type="number" class="form-control" id="satis_fiyati_usd" name="satis_fiyati_usd">
                </div>
                <div class="mb-3">
                    <label for="satis_fiyati_euro" class="form-label">Satış Fiyatı (EURO)</label>
                    <input type="number" class="form-control" id="satis_fiyati_euro" name="satis_fiyati_euro">
                </div>
                <div class="mb-3">
                    <label for="ikinci_satis_fiyati" class="form-label">2. Satış Fiyatı (Sadece TL)</label>
                    <input type="number" class="form-control" id="ikinci_satis_fiyati" name="ikinci_satis_fiyati">
                </div>
                <div class="mb-3">
                    <label for="stoktan_dus" class="form-label">Stoktan Düş</label>
                    <select class="form-control" id="stoktan_dus" name="stoktan_dus">
                        <option value="evet">Evet</option>
                        <option value="hayir">Hayır</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="durum" class="form-label">Durum</label>
                    <select class="form-control" id="durum" name="durum">
                        <option value="acik">Açık</option>
                        <option value="kapali">Kapalı</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ozellik_bolumu" class="form-label">Özellik Bölümü</label>
                    <select class="form-control" id="ozellik_bolumu" name="ozellik_bolumu">
                        <option value="goster">Göster</option>
                        <option value="gosterme">Gösterme</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gecerlilik_suresi" class="form-label">Geçerlilik Süresi</label>
                    <input type="date" class="form-control" id="gecerlilik_suresi" name="gecerlilik_suresi">
                </div>
                <div class="mb-3">
                    <label for="siralama" class="form-label">Sıralama</label>
                    <input type="number" class="form-control" id="siralama" name="siralama">
                </div>
                <div class="mb-3">
                    <label for="anasayfada_goster" class="form-label">Anasayfada Göster</label>
                    <select class="form-control" id="anasayfada_goster" name="anasayfada_goster">
                        <option value="evet">Evet</option>
                        <option value="hayir">Hayır</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="yeni_urun" class="form-label">Yeni Ürün</label>
                    <select class="form-control" id="yeni_urun" name="yeni_urun">
                        <option value="evet">Evet</option>
                        <option value="hayir">Hayır</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="taksit" class="form-label">Taksit</label>
                    <select class="form-control" id="taksit" name="taksit">
                        <option value="evet">Evet</option>
                        <option value="hayir">Hayır</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="garanti_suresi" class="form-label">Garanti Süresi (Ay)</label>
                    <input type="number" class="form-control" id="garanti_suresi" name="garanti_suresi">
                </div>
            </div>

        </div>
        <!-- Resimler Tab -->
        <div class="tab-pane fade" id="resimler" role="tabpanel" aria-labelledby="resimler-tab">

            <div class="tab-content" id="resimlerLangTabContent">
                <div class="tab-pane fade show active" id="resimler-tr" role="tabpanel" aria-labelledby="resimler-tr-tab">
        
                    <div class="mb-3">
                        <label for="ana_resim" class="form-label">Ana Resim</label>
                        <input type="file" class="form-control" id="ana_resim" name="ana_resim">
                    </div>
                    <div class="mb-3">
                        <label for="resimler" class="form-label">Resimler</label>
                        <input type="file" class="form-control" id="resimler" name="resimler[]" multiple>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-5">Kaydet</button>
</form>


<script>
    $(document).ready(function() {
        function initializeSummernote(elementId) {
            $('#' + elementId).summernote({
                height: 300, // Default yüksekliği
                minHeight: 150, // Minimum yükseklik
                maxHeight: 600, // Maksimum yükseklik
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        }


        initializeSummernote('urun_aciklama_tr');
        initializeSummernote('urun_aciklama_en');
    });
</script>



<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault(); // Sayfanın yenilenmesini engeller

            var formData = new FormData($(this)[0]); // Form verilerini FormData nesnesine dönüştür

            $.ajax({
                url: '/products/store',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    var responseData = JSON.parse(response);
                    if (responseData.status == 'error') {
                        // swal fire kullanarak hata mesajlarını gösterelim
                        Swal.fire({
                            icon: 'error',
                            title: 'Eksik Bilgi!',
                            html: responseData.message // html gelen mesajı işledim.
                        });
                    } else {
       
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı!',
                            text: 'Ürün başarıyla kaydedildi!',
                            showConfirmButton: false,
                            timer: 1500  //1.5 saniye
                        });
                 
                    }
                },
                error: function(xhr, status, error) {
                    // Hata durumunda
                    console.log(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Ürünü oluştururken bir hata oluştu.'
                    });
                }
            });

            return false;
        });
    });
</script>

