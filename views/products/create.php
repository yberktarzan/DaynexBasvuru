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
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="indirim-tab" data-bs-toggle="tab" data-bs-target="#indirim" type="button" role="tab" aria-controls="indirim" aria-selected="false">İndirim</button>
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
                        <option value="1">Evet</option>
                        <option value="0">Hayır</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="durum" class="form-label">Durum</label>
                    <select class="form-control" id="durum" name="durum">
                        <option value="1">Açık</option>
                        <option value="0">Kapalı</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ozellik_bolumu" class="form-label">Özellik Bölümü</label>
                    <select class="form-control" id="ozellik_bolumu" name="ozellik_bolumu">
                        <option value="1">Göster</option>
                        <option value="0">Gösterme</option>
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
                        <option value="1">Evet</option>
                        <option value="0">Hayır</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="yeni_urun" class="form-label">Yeni Ürün</label>
                    <select class="form-control" id="yeni_urun" name="yeni_urun">
                        <option value="1">Evet</option>
                        <option value="0">Hayır</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="taksit" class="form-label">Taksit</label>
                    <select class="form-control" id="taksit" name="taksit">
                        <option value="1">Evet</option>
                        <option value="0">Hayır</option>
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

        <!-- İndirim Tab -->
        <div class="tab-pane fade" id="indirim" role="tabpanel" aria-labelledby="indirim-tab">

            <div class="tab-content" id="indirimLangTabContent">

                <div id="repeater-form">

                </div>
                <button class="btn btn-primary mt-3" id="add-row" type="button">Yeni Satır Ekle</button>
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
        // Array to store form data including repeater data
        var formData = [];

        // Event listener for adding new row
        $('#add-row').click(function() {
            addNewRow(); // Call addNewRow function when add-row button is clicked
        });

        // Event listener for form submission
        $('form').submit(function(event) {
            event.preventDefault(); // Prevent form submission

            // Clear formData array to avoid duplicate data on resubmission
            formData = [];

            // Collect main form data into formData
            var mainFormData = new FormData($(this)[0]);

            // Collect repeater data
            $('.repeater-row').each(function(index, element) {
                var row = $(element);
                var rowData = {
                    musteriGrubu: row.find('select[name="musterigrubu"]').val(),
                    oncelik: row.find('select[name="oncelik"]').val(),
                    turu1: row.find('select[name="turu"]').eq(0).val(),
                    miktar1: row.find('input[type="number"]').eq(0).val(),
                    turu2: row.find('select[name="turu"]').eq(1).val(),
                    miktar2: row.find('input[type="number"]').eq(1).val(),
                    turu3: row.find('select[name="turu"]').eq(2).val(),
                    miktar3: row.find('input[type="number"]').eq(2).val(),
                    baslangicTarihi: row.find('input[name="baslangic_tarihi"]').val(),
                    bitisTarihi: row.find('input[name="bitis_tarihi"]').val()
                };
                formData.push(rowData);
            });

            // Add repeaterData array to mainFormData
            mainFormData.append('repeaterData', JSON.stringify(formData));

            // Perform AJAX request
            $.ajax({
                url: '/products/store', // Replace with your endpoint URL
                type: 'POST',
                data: mainFormData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    var responseData = JSON.parse(response);
                    if (responseData.status == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Eksik Bilgi!',
                            html: responseData.message
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı!',
                            text: 'Ürün başarıyla kaydedildi!',
                            showConfirmButton: false,
                            timer: 1500 // 1.5 seconds
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Ürünü oluştururken bir hata oluştu.'
                    });
                }
            });

            return false; // Prevent form submission
        });

        // Function to add new row dynamically
        function addNewRow() {
            var row = `
            <div class="row repeater-row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Müşteri Grubu</label>
                    <select name="musterigrubu" class="form-control">
                        <option value="1">Grup 1</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label">Öncelik</label>
                    <select name="oncelik" class="form-control">
                        <option value="1">Öncelik 1</option>
                        <option value="2">Öncelik 2</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Türü</label>
                    <select name="turu" class="form-control">
                        <option value="yuzde">Yüzde</option>
                        <option value="fiyat">Fiyat</option>
                    </select>
                    <input type="number" class="form-control" placeholder="TL">
                    <select name="turu" class="form-control mt-2">
                        <option value="yuzde">Yüzde</option>
                        <option value="fiyat">Fiyat</option>
                    </select>
                    <input type="number" class="form-control mb-1" placeholder="USD">
                    <select name="turu" class="form-control mt-2">
                        <option value="yuzde">Yüzde</option>
                        <option value="fiyat">Fiyat</option>
                    </select>
                    <input type="number" class="form-control mb-1" placeholder="EURO">
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label">Başlangıç Tarihi</label>
                    <input type="date" name="baslangic_tarihi" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label">Bitiş Tarihi</label>
                    <input type="date" name="bitis_tarihi" class="form-control">
                </div>
            </div>`;

            $('#repeater-form').append(row);
        }
    });
</script>