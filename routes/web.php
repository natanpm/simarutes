<?php

Route::get('/', ['uses' => 'LoginController@index', 'as' => 'index-login']);
Route::post('/', ['uses' => 'LoginController@login', 'as' => 'login']);
Route::get('/register', ['uses' => 'RegisterController@index', 'as' => 'index-register']);
Route::post('/register', ['uses' => 'RegisterController@register', 'as' => 'register']);


Route::group(['middleware' => ['autentikasi']], function () {

    Route::get('/logout', ['uses' => 'LoginController@logout', 'as' => 'logout']);
    Route::get('/unauthorizedAccess', ['uses' => 'UnauthorizedAccess@index', 'as' => 'unauthorized-Access']);
    Route::get('/back', ['uses' => 'UnauthorizedAccess@kembali', 'as' => 'unauthorized-Access-Back']);

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['autentikasiAdmin']], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'admin-home']);
        Route::get('/back', ['uses' => 'HomeController@indexBack', 'as' => 'admin-back']);
        Route::get('/editProfile' , ['uses' => 'ProfileController@indexProfile', 'as' => 'admin-indexProfile']);
        Route::post('/editProfile' , ['uses' => 'ProfileController@editProfile', 'as' => 'admin-editProfile']);

        Route::get('/matikansurat/{id}', ['uses' => 'SuratIjinMasukController@matikanSurat', 'as' => 'get-matikanSurat']);
        Route::get('/aktifkansurat/{id}', ['uses' => 'SuratIjinMasukController@aktifkanSurat', 'as' => 'get-aktifkanSurat']);
        
        Route::get('/buatSuratMasuk', ['uses' => 'SuratIjinMasukController@indexBuat', 'as' => 'get-buatSuratMasuk']);
        Route::post('/buatSuratMasuk', ['uses' => 'SuratIjinMasukController@buatSurat', 'as' => 'post-buatSuratMasuk']);
        Route::get('/lihatSurat', ['uses' => 'SuratIjinMasukController@indexLihatSurat', 'as' => 'get-indexLihatSurat']);
        Route::get('/suratTervalidasi', ['uses' => 'SuratIjinMasukController@suratTervalidasi', 'as' => 'get-suratTervalidasi']);
        Route::get('/suratBelumTervalidasi', ['uses' => 'SuratIjinMasukController@suratBelumTervalidasi', 'as' => 'get-suratBelumTervalidasi']);
        Route::get('/suratNonaktif', ['uses' => 'SuratIjinMasukController@suratNonaktif', 'as' => 'get-suratNonaktif']);
        Route::get('/suratRevisi', ['uses' => 'SuratIjinMasukController@suratRevisi', 'as' => 'get-suratRevisi']);
        Route::get('/hapusSurat/{id}', ['uses' => 'SuratIjinMasukController@hapusSurat', 'as' => 'get-hapusSurat']);
        Route::get('/editSurat/{id}', ['uses' => 'SuratIjinMasukController@indexEditSurat', 'as' => 'get-indexEditSurat']);
        Route::post('/editSurat/{id}', ['uses' => 'SuratIjinMasukController@EditSurat', 'as' => 'post-editSurat']);
        Route::get('/detailSurat/{id}', ['uses' => 'SuratIjinMasukController@detailSurat', 'as' => 'get-detailSurat']);
        Route::get('/cetakSurat/{id}', ['uses' => 'SuratIjinMasukController@cetakSurat', 'as' => 'get-cetakSurat']);
        
        Route::get('/buatPengguna', ['uses' => 'UserController@indexUser', 'as' => 'get-buatUser']);
        Route::post('/buatPengguna', ['uses' => 'UserController@buatUser', 'as' => 'post-buatUser']);
        Route::get('/lihatPengguna', ['uses' => 'UserController@lihatUser', 'as' => 'get-lihatUser']);
        Route::get('/hapusPengguna/{id}', ['uses' => 'UserController@hapusUser', 'as' => 'get-hapusUser']);
        Route::get('/editPengguna/{id}', ['uses' => 'UserController@indexEditUser', 'as' => 'get-editUser']);
        Route::post('/editPengguna/{id}', ['uses' => 'UserController@editUser', 'as' => 'post-editUser']);
        Route::get('/buatPenggunaPicTelkom', ['uses' => 'UserController@indexUserPicTelkom', 'as' => 'get-buatUserPicTelkom']);
        Route::post('/buatPenggunaPicTelkom', ['uses' => 'UserController@buatUserPicTelkom', 'as' => 'post-buatUserPicTelkom']);
        Route::get('/lihatPenggunaPicTelkom', ['uses' => 'UserController@lihatUserPicTelkom', 'as' => 'get-lihatUserPicTelkom']);
        Route::get('/hapusPenggunaPicTelkom/{id}', ['uses' => 'UserController@hapusUserPicTelkom', 'as' => 'get-hapusUserPicTelkom']);
        Route::get('/editPenggunaPicTelkom/{id}', ['uses' => 'UserController@indexEditUserPicTelkom', 'as' => 'get-editUserPicTelkom']);
        Route::post('/editPenggunaPicTelkom/{id}', ['uses' => 'UserController@editUserPicTelkom', 'as' => 'post-editUserPicTelkom']);

        Route::get('/buatPicTelkom', ['uses' => 'PicTelkomController@indexPic', 'as' => 'get-buatPicTelkom']);
        Route::post('/buatPicTelkom', ['uses' => 'PicTelkomController@buatPic', 'as' => 'post-buatPicTelkom']);
        Route::get('/editPicTelkom/{id}', ['uses' => 'PicTelkomController@indexEditPic', 'as' => 'get-editPicTelkom']);
        Route::post('/editPicTelkom/{id}', ['uses' => 'PicTelkomController@editPic', 'as' => 'post-editPicTelkom']);
        Route::get('/lihatPicTelkom', ['uses' => 'PicTelkomController@lihatPic', 'as' => 'get-lihatPicTelkom']);
        Route::get('/hapusPicTelkom/{id}', ['uses' => 'PicTelkomController@hapusPic', 'as' => 'get-hapusPicTelkom']);

        Route::get('/lihatPicMitra', ['uses' => 'PicMitraController@lihatPic', 'as' => 'get-lihatPicMitra']);
        Route::get('/editPicMitra/{id}', ['uses' => 'PicMitraController@indexEditPic', 'as' => 'get-editPicMitra']);
        Route::post('/editPicMitra/{id}', ['uses' => 'PicMitraController@editPic', 'as' => 'post-editPicMitra']);
        Route::get('/hapusPicMitra/{id}', ['uses' => 'PicMitraController@hapusPic', 'as' => 'get-hapusPicMitra']);

        Route::get('/buatPicTelkomAkses', ['uses' => 'PicTelkomAksesController@indexPic', 'as' => 'get-buatPicTelkomAkses']);
        Route::post('/buatPicTelkomAkses', ['uses' => 'PicTelkomAksesController@buatPic', 'as' => 'post-buatPicTelkomAkses']);
        Route::get('/buatUnitTelkomAkses', ['uses' => 'PicTelkomAksesController@indexUnit', 'as' => 'get-buatUnitTelkomAkses']);
        Route::post('/BuatUnitTelkomAkses', ['uses' => 'PicTelkomAksesController@buatUnit', 'as' => 'post-buatUnitTelkomAkses']);
        Route::get('/lihatPicTelkomAkses', ['uses' => 'PicTelkomAksesController@lihatPic', 'as' => 'get-lihatPicTelkomAkses']);
        Route::get('/lihatUnitTelkomAkses', ['uses' => 'PicTelkomAksesController@lihatUnit', 'as' => 'get-lihatUnitTelkomAkses']);
        Route::get('/hapusUnitTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@hapusUnit', 'as' => 'get-hapusUnitTelkomAkses']);
        Route::get('/hapusPicTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@hapusPic', 'as' => 'get-hapusPicTelkomAkses']);
        Route::get('/editUnitTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@indexEditUnit', 'as' => 'get-editUnitTelkomAkses']);
        Route::get('/editPicTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@indexEditPic', 'as' => 'get-editPicTelkomAkses']);
        Route::post('/editUnitTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@editUnit', 'as' => 'post-editUnitTelkomAkses']);
        Route::post('/editPicTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@editPic', 'as' => 'post-editPicTelkomAkses']);

        Route::get('/buatPicMitratel', ['uses' => 'PicMitratelController@indexPic', 'as' => 'get-buatPicMitratel']);
        Route::post('/buatPicMitratel', ['uses' => 'PicMitratelController@buatPic', 'as' => 'post-buatPicMitratel']);
        Route::get('/buatUnitMitratel', ['uses' => 'PicMitratelController@indexUnit', 'as' => 'get-buatUnitMitratel']);
        Route::post('/BuatUnitMitratel', ['uses' => 'PicMitratelController@buatUnit', 'as' => 'post-buatUnitMitratel']);
        Route::get('/lihatPicMitratel', ['uses' => 'PicMitratelController@lihatPic', 'as' => 'get-lihatPicMitratel']);
        Route::get('/lihatUnitMitratel', ['uses' => 'PicMitratelController@lihatUnit', 'as' => 'get-lihatUnitMitratel']);
        Route::get('/hapusUnitMitratel/{id}', ['uses' => 'PicMitratelController@hapusUnit', 'as' => 'get-hapusUnitMitratel']);
        Route::get('/hapusPicMitratel/{id}', ['uses' => 'PicMitratelController@hapusPic', 'as' => 'get-hapusPicMitratel']);
        Route::get('/editUnitMitratel/{id}', ['uses' => 'PicMitratelController@indexEditUnit', 'as' => 'get-editUnitMitratel']);
        Route::get('/editPicMitratel/{id}', ['uses' => 'PicMitratelController@indexEditPic', 'as' => 'get-editPicMitratel']);
        Route::post('/editUnitMitratel/{id}', ['uses' => 'PicMitratelController@editUnit', 'as' => 'post-editUnitMitratel']);
        Route::post('/editPicMitratel/{id}', ['uses' => 'PicMitratelController@editPic', 'as' => 'post-editPicMitratel']);

        Route::get('/buatPicTkmNetra', ['uses' => 'PicTkmNetraController@indexPic', 'as' => 'get-buatPicTkmNetra']);
        Route::post('/buatPicTkmNetra', ['uses' => 'PicTkmNetraController@buatPic', 'as' => 'post-buatPicTkmNetra']);
        Route::get('/lihatPicTkmNetra', ['uses' => 'PicTkmNetraController@lihatPic', 'as' => 'get-lihatPicTkmNetra']);
        Route::get('/hapusPicTkmNetra/{id}', ['uses' => 'PicTkmNetraController@hapusPic', 'as' => 'get-hapusPicTkmNetra']);
        Route::get('/editPicTkmNetra/{id}', ['uses' => 'PicTkmNetraController@indexEditPic', 'as' => 'get-editPicTkmNetra']);
        Route::post('/editPicTkmNetra/{id}', ['uses' => 'PicTkmNetraController@editPic', 'as' => 'post-editPicTkmNetra']);

        Route::get('/buatPicSigma', ['uses' => 'PicSigmaController@indexPic', 'as' => 'get-buatPicSigma']);
        Route::post('/buatPicSigma', ['uses' => 'PicSigmaController@buatPic', 'as' => 'post-buatPicSigma']);
        Route::get('/buatUnitSigma', ['uses' => 'PicSigmaController@indexUnit', 'as' => 'get-buatUnitSigma']);
        Route::post('/BuatUnitSigma', ['uses' => 'PicSigmaController@buatUnit', 'as' => 'post-buatUnitSigma']);
        Route::get('/lihatPicSigma', ['uses' => 'PicSigmaController@lihatPic', 'as' => 'get-lihatPicSigma']);
        Route::get('/lihatUnitSigma', ['uses' => 'PicSigmaController@lihatUnit', 'as' => 'get-lihatUnitSigma']);
        Route::get('/hapusUnitSigma/{id}', ['uses' => 'PicSigmaController@hapusUnit', 'as' => 'get-hapusUnitSigma']);
        Route::get('/hapusPicSigma/{id}', ['uses' => 'PicSigmaController@hapusPic', 'as' => 'get-hapusPicSigma']);
        Route::get('/editUnitSigma/{id}', ['uses' => 'PicSigmaController@indexEditUnit', 'as' => 'get-editUnitSigma']);
        Route::get('/editPicSigma/{id}', ['uses' => 'PicSigmaController@indexEditPic', 'as' => 'get-editPicSigma']);
        Route::post('/editUnitSigma/{id}', ['uses' => 'PicSigmaController@editUnit', 'as' => 'post-editUnitSigma']);
        Route::post('/editPicSigma/{id}', ['uses' => 'PicSigmaController@editPic', 'as' => 'post-editPicSigma']);

        Route::get('/lampiran/{id}' , ['uses' => 'LampiranController@lihatLampiran', 'as' => 'get-lihatLampiran']);
        Route::get('/indexExportSimaru' , ['uses' => 'ExportExcelController@indexExportSimaru', 'as' => 'get-indexExportSimaru']);
        Route::get('/exportSimaru' , ['uses' => 'ExportExcelController@exportSimaru', 'as' => 'get-exportSimaru']);
        Route::get('/exportPicTelkom' , ['uses' => 'ExportExcelController@exportPicTelkom', 'as' => 'get-exportPicTelkom']);
        Route::get('/exportTelkomAkses' , ['uses' => 'ExportExcelController@exportTelkomAkses', 'as' => 'get-exportTelkomAkses']);
        Route::get('/exportMitratel' , ['uses' => 'ExportExcelController@exportMitratel', 'as' => 'get-exportMitratel']);
        Route::get('/exportSigma' , ['uses' => 'ExportExcelController@exportSigma', 'as' => 'get-exportSigma']); 
        Route::get('/exportMitra' , ['uses' => 'ExportExcelController@exportMitra', 'as' => 'get-exportMitra']);
        Route::get('/exportTkmNetra' , ['uses' => 'ExportExcelController@exportTkmNetra', 'as' => 'get-exportTkmNetra']);


        Route::get('/lihatNdaPicTelkomAkses' , ['uses' => 'NdaController@indexPicTelkomAkses', 'as' => 'get-lihatNdaTelkomAkses']);
        Route::get('/lihatNdaPicMitratel' , ['uses' => 'NdaController@indexPicMitratel', 'as' => 'get-lihatNdaMitratel']);
        Route::get('/lihatNdaPicSigma' , ['uses' => 'NdaController@indexPicSigma', 'as' => 'get-lihatNdaSigma']);
        Route::get('/lihatNdaPicMitra' , ['uses' => 'NdaController@indexPicMitra', 'as' => 'get-lihatNdaMitra']);
        Route::get('/lihatNdaPicTkmNetra' , ['uses' => 'NdaController@indexPicTkmNetra', 'as' => 'get-lihatNdaTkmNetra']);

        Route::get('/uploadNda/{id}', ['uses' => 'NdaController@indexUploadNda', 'as' => 'get-indexUploadNda']);
        Route::post('/uploadNda/{id}', ['uses' => 'NdaController@uploadNda', 'as' => 'post-uploadNda']);
        Route::get('/lihatNda/{path}', ['uses' => 'NdaController@lihatNda', 'as' => 'get-lihatNda']);
        Route::get('/hapusNda/{id}', ['uses' => 'NdaController@hapusNda', 'as' => 'get-hapusNda']);

        Route::get('/buatBerita', ['uses' => 'BeritaSimaruController@indexBuatBerita', 'as' => 'get-buatBerita']);
        Route::post('/buatBerita', ['uses' => 'BeritaSimaruController@buatBerita', 'as' => 'post-buatBerita']);
        Route::get('/editBerita/{id}', ['uses' => 'BeritaSimaruController@indexEditBerita', 'as' => 'get-editBerita']);
        Route::post('/editBerita/{id}', ['uses' => 'BeritaSimaruController@editBerita', 'as' => 'post-editBerita']);
        Route::get('/lihatBerita', ['uses' => 'BeritaSimaruController@lihatBerita', 'as' => 'get-lihatBerita']);
        Route::get('/hapusBerita/{id}', ['uses' => 'BeritaSimaruController@hapusBerita', 'as' => 'get-hapusBerita']);
        Route::get('/setAktif/{id}', ['uses' => 'BeritaSimaruController@setAktif', 'as' => 'get-setAktifBerita']);
        Route::get('/setPasif/{id}', ['uses' => 'BeritaSimaruController@setPasif', 'as' => 'get-setPasifBerita']);

        Route::get('/lihatSOP' , ['uses' => 'HomeController@lihatSOP', 'as' => 'get-LihatSOP']);
    });

    Route::group(['prefix' => 'validator', 'namespace' => 'Validator', 'middleware' => ['autentikasiValidator']], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'validator-home']);
        Route::get('/editProfile' , ['uses' => 'ProfileController@indexProfile', 'as' => 'validator-indexProfile']);
        Route::post('/editProfile' , ['uses' => 'ProfileController@editProfile', 'as' => 'validator-editProfile']);

        Route::get('/matikansurat/{id}', ['uses' => 'SuratIjinMasukController@matikanSurat', 'as' => 'get-ValidatorMatikanSurat']);
        Route::get('/aktifkansurat/{id}', ['uses' => 'SuratIjinMasukController@aktifkanSurat', 'as' => 'get-ValidatorAktifkanSurat']);

        Route::get('/buatSuratMasuk', ['uses' => 'SuratIjinMasukController@indexBuat', 'as' => 'get-validatorBuatSuratMasuk']);
        Route::post('/buatSuratMasuk', ['uses' => 'SuratIjinMasukController@buatSurat', 'as' => 'post-validatorBuatSuratMasuk']);
        Route::get('/lihatSurat', ['uses' => 'SuratIjinMasukController@indexLihatSurat', 'as' => 'get-validatorIndexLihatSurat']);
        Route::get('/validasi/{id}', ['uses' => 'SuratIjinMasukController@validasiSurat', 'as' => 'get-validatorValidasiSurat']);
        Route::get('/batalkanValidasi/{id}', ['uses' => 'SuratIjinMasukController@batalkanValidasiSurat', 'as' => 'get-validatorBatalkanValidasi']);
        
        Route::get('/detailSurat/{id}', ['uses' => 'SuratIjinMasukController@detailSurat', 'as' => 'get-validatorDetailSurat']);
        Route::get('/hapusSurat/{id}', ['uses' => 'SuratIjinMasukController@hapusSurat', 'as' => 'get-validatorHapusSurat']);
        Route::get('/editSurat/{id}', ['uses' => 'SuratIjinMasukController@indexEditSurat', 'as' => 'get-validatorIndexEditSurat']);
        Route::post('/editSurat/{id}', ['uses' => 'SuratIjinMasukController@EditSurat', 'as' => 'post-validatorEditSurat']);
        Route::get('/cetakSurat/{id}', ['uses' => 'SuratIjinMasukController@cetakSurat', 'as' => 'get-validatorCetakSurat']);
        Route::get('/suratTervalidasi', ['uses' => 'SuratIjinMasukController@suratTervalidasi', 'as' => 'get-validatorSuratTervalidasi']);
        Route::get('/suratBelumTervalidasi', ['uses' => 'SuratIjinMasukController@suratBelumTervalidasi', 'as' => 'get-validatorSuratBelumTervalidasi']);
        Route::get('/suratRevisi', ['uses' => 'SuratIjinMasukController@suratRevisi', 'as' => 'get-validatorSuratRevisi']);
        Route::get('/suratNonaktif', ['uses' => 'SuratIjinMasukController@suratNonaktif', 'as' => 'get-ValidatorSuratNonaktif']);

        Route::get('/buatPengguna', ['uses' => 'UserController@indexUser', 'as' => 'get-validatorBuatUser']);
        Route::post('/buatPengguna', ['uses' => 'UserController@buatUser', 'as' => 'post-validatorBuatUser']);
        Route::get('/lihatPengguna', ['uses' => 'UserController@lihatUser', 'as' => 'get-validatorLihatUser']);
        Route::get('/hapusPengguna/{id}', ['uses' => 'UserController@hapusUser', 'as' => 'get-validatorHapusUser']);
        Route::get('/editPengguna/{id}', ['uses' => 'UserController@indexEditUser', 'as' => 'get-validatorEditUser']);
        Route::post('/editPengguna/{id}', ['uses' => 'UserController@editUser', 'as' => 'post-validatorEditUser']);
        Route::get('/validasiPengguna/{id}', ['uses' => 'UserController@validasiSecurity', 'as' => 'get-validatorValidasiSecurity']);
        Route::get('/buatPenggunaPicTelkom', ['uses' => 'UserController@indexUserPicTelkom', 'as' => 'get-validatorBuatUserPicTelkom']);
        Route::post('/buatPenggunaPicTelkom', ['uses' => 'UserController@buatUserPicTelkom', 'as' => 'post-validatorBuatUserPicTelkom']);
        Route::get('/lihatPenggunaPicTelkom', ['uses' => 'UserController@lihatUserPicTelkom', 'as' => 'get-validatorLihatUserPicTelkom']);
        Route::get('/hapusPenggunaPicTelkom/{id}', ['uses' => 'UserController@hapusUserPicTelkom', 'as' => 'get-validatorHapusUserPicTelkom']);
        Route::get('/editPenggunaPicTelkom/{id}', ['uses' => 'UserController@indexEditUserPicTelkom', 'as' => 'get-validatorEditUserPicTelkom']);
        Route::post('/editPenggunaPicTelkom/{id}', ['uses' => 'UserController@editUserPicTelkom', 'as' => 'post-validatorEditUserPicTelkom']);
        Route::get('/validasiPenggunaPicTelkom/{id}', ['uses' => 'UserController@validasiPicTelkom', 'as' => 'get-validatorValidasiPicTelkom']);

        Route::get('/buatPicTelkom', ['uses' => 'PicTelkomController@indexPic', 'as' => 'get-validatorBuatPicTelkom']);
        Route::post('/buatPicTelkom', ['uses' => 'PicTelkomController@buatPic', 'as' => 'post-validatorBuatPicTelkom']);
        Route::get('/editPicTelkom/{id}', ['uses' => 'PicTelkomController@indexEditPic', 'as' => 'get-validatorEditPicTelkom']);
        Route::post('/editPicTelkom/{id}', ['uses' => 'PicTelkomController@editPic', 'as' => 'post-validatorEditPicTelkom']);
        Route::get('/lihatPicTelkom', ['uses' => 'PicTelkomController@lihatPic', 'as' => 'get-validatorLihatPicTelkom']);
        Route::get('/hapusPicTelkom/{id}', ['uses' => 'PicTelkomController@hapusPic', 'as' => 'get-validatorHapusPicTelkom']);

        Route::get('/buatPicTkmNetra', ['uses' => 'PicTkmNetraController@indexPic', 'as' => 'get-validatorBuatPicTkmNetra']);
        Route::post('/buatPicTkmNetra', ['uses' => 'PicTkmNetraController@buatPic', 'as' => 'post-validatorBuatPicTkmNetra']);
        Route::get('/lihatPicTkmNetra', ['uses' => 'PicTkmNetraController@lihatPic', 'as' => 'get-validatorLihatPicTkmNetra']);
        Route::get('/hapusPicTkmNetra/{id}', ['uses' => 'PicTkmNetraController@hapusPic', 'as' => 'get-validatorHapusPicTkmNetra']);
        Route::get('/editPicTkmNetra/{id}', ['uses' => 'PicTkmNetraController@indexEditPic', 'as' => 'get-validatorEditPicTkmNetra']);
        Route::post('/editPicTkmNetra/{id}', ['uses' => 'PicTkmNetraController@editPic', 'as' => 'post-validatorEditPicTkmNetra']);

        Route::get('/lihatPicMitra', ['uses' => 'PicMitraController@lihatPic', 'as' => 'get-validatorLihatPicMitra']);
        Route::get('/editPicMitra/{id}', ['uses' => 'PicMitraController@indexEditPic', 'as' => 'get-validatorEditPicMitra']);
        Route::post('/editPicMitra/{id}', ['uses' => 'PicMitraController@editPic', 'as' => 'post-validatorEditPicMitra']);
        Route::get('/hapusPicMitra/{id}', ['uses' => 'PicMitraController@hapusPic', 'as' => 'get-validatorHapusPicMitra']);

        Route::get('/buatPicTelkomAkses', ['uses' => 'PicTelkomAksesController@indexPic', 'as' => 'get-validatorBuatPicTelkomAkses']);
        Route::post('/buatPicTelkomAkses', ['uses' => 'PicTelkomAksesController@buatPic', 'as' => 'post-validatorBuatPicTelkomAkses']);
        Route::get('/buatUnitTelkomAkses', ['uses' => 'PicTelkomAksesController@indexUnit', 'as' => 'get-validatorBuatUnitTelkomAkses']);
        Route::post('/BuatUnitTelkomAkses', ['uses' => 'PicTelkomAksesController@buatUnit', 'as' => 'post-validatorBuatUnitTelkomAkses']);
        Route::get('/lihatPicTelkomAkses', ['uses' => 'PicTelkomAksesController@lihatPic', 'as' => 'get-validatorLihatPicTelkomAkses']);
        Route::get('/lihatUnitTelkomAkses', ['uses' => 'PicTelkomAksesController@lihatUnit', 'as' => 'get-validatorLihatUnitTelkomAkses']);
        Route::get('/hapusUnitTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@hapusUnit', 'as' => 'get-validatorHapusUnitTelkomAkses']);
        Route::get('/hapusPicTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@hapusPic', 'as' => 'get-validatorHapusPicTelkomAkses']);
        Route::get('/editUnitTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@indexEditUnit', 'as' => 'get-validatorEditUnitTelkomAkses']);
        Route::get('/editPicTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@indexEditPic', 'as' => 'get-validatorEditPicTelkomAkses']);
        Route::post('/editUnitTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@editUnit', 'as' => 'post-validatorEditUnitTelkomAkses']);
        Route::post('/editPicTelkomAkses/{id}', ['uses' => 'PicTelkomAksesController@editPic', 'as' => 'post-validatorEditPicTelkomAkses']);

        Route::get('/buatPicMitratel', ['uses' => 'PicMitratelController@indexPic', 'as' => 'get-validatorBuatPicMitratel']);
        Route::post('/buatPicMitratel', ['uses' => 'PicMitratelController@buatPic', 'as' => 'post-validatorBuatPicMitratel']);
        Route::get('/buatUnitMitratel', ['uses' => 'PicMitratelController@indexUnit', 'as' => 'get-validatorBuatUnitMitratel']);
        Route::post('/BuatUnitMitratel', ['uses' => 'PicMitratelController@buatUnit', 'as' => 'post-validatorBuatUnitMitratel']);
        Route::get('/lihatPicMitratel', ['uses' => 'PicMitratelController@lihatPic', 'as' => 'get-validatorLihatPicMitratel']);
        Route::get('/lihatUnitMitratel', ['uses' => 'PicMitratelController@lihatUnit', 'as' => 'get-validatorLihatUnitMitratel']);
        Route::get('/hapusUnitMitratel/{id}', ['uses' => 'PicMitratelController@hapusUnit', 'as' => 'get-validatorHapusUnitMitratel']);
        Route::get('/hapusPicMitratel/{id}', ['uses' => 'PicMitratelController@hapusPic', 'as' => 'get-validatorHapusPicMitratel']);
        Route::get('/editUnitMitratel/{id}', ['uses' => 'PicMitratelController@indexEditUnit', 'as' => 'get-validatorEditUnitMitratel']);
        Route::get('/editPicMitratel/{id}', ['uses' => 'PicMitratelController@indexEditPic', 'as' => 'get-validatorEditPicMitratel']);
        Route::post('/editUnitMitratel/{id}', ['uses' => 'PicMitratelController@editUnit', 'as' => 'post-validatorEditUnitMitratel']);
        Route::post('/editPicMitratel/{id}', ['uses' => 'PicMitratelController@editPic', 'as' => 'post-validatorEditPicMitratel']);

        Route::get('/buatPicSigma', ['uses' => 'PicSigmaController@indexPic', 'as' => 'get-validatorBuatPicSigma']);
        Route::post('/buatPicSigma', ['uses' => 'PicSigmaController@buatPic', 'as' => 'post-validatorBuatPicSigma']);
        Route::get('/buatUnitSigma', ['uses' => 'PicSigmaController@indexUnit', 'as' => 'get-validatorBuatUnitSigma']);
        Route::post('/BuatUnitSigma', ['uses' => 'PicSigmaController@buatUnit', 'as' => 'post-validatorBuatUnitSigma']);
        Route::get('/lihatPicSigma', ['uses' => 'PicSigmaController@lihatPic', 'as' => 'get-validatorLihatPicSigma']);
        Route::get('/lihatUnitSigma', ['uses' => 'PicSigmaController@lihatUnit', 'as' => 'get-validatorLihatUnitSigma']);
        Route::get('/hapusUnitSigma/{id}', ['uses' => 'PicSigmaController@hapusUnit', 'as' => 'get-validatorHapusUnitSigma']);
        Route::get('/hapusPicSigma/{id}', ['uses' => 'PicSigmaController@hapusPic', 'as' => 'get-validatorHapusPicSigma']);
        Route::get('/editUnitSigma/{id}', ['uses' => 'PicSigmaController@indexEditUnit', 'as' => 'get-validatorEditUnitSigma']);
        Route::get('/editPicSigma/{id}', ['uses' => 'PicSigmaController@indexEditPic', 'as' => 'get-validatorEditPicSigma']);
        Route::post('/editUnitSigma/{id}', ['uses' => 'PicSigmaController@editUnit', 'as' => 'post-validatorEditUnitSigma']);
        Route::post('/editPicSigma/{id}', ['uses' => 'PicSigmaController@editPic', 'as' => 'post-validatorEditPicSigma']);

        Route::get('/lampiran/{path}' , ['uses' => 'LampiranController@lihatLampiran', 'as' => 'get-validatorLihatLampiran']);
        Route::get('/indexExportSimaru' , ['uses' => 'ExportExcelController@indexExportSimaru', 'as' => 'get-validatorIndexExportSimaru']);
        Route::get('/exportSimaru' , ['uses' => 'ExportExcelController@exportSimaru', 'as' => 'get-validatorExportSimaru']);
        Route::get('/exportPicTelkom' , ['uses' => 'ExportExcelController@exportPicTelkom', 'as' => 'get-validatorExportPicTelkom']);
        Route::get('/exportTelkomAkses' , ['uses' => 'ExportExcelController@exportTelkomAkses', 'as' => 'get-validatorExportTelkomAkses']);
        Route::get('/exportMitratel' , ['uses' => 'ExportExcelController@exportMitratel', 'as' => 'get-validatorExportMitratel']);
        Route::get('/exportSigma' , ['uses' => 'ExportExcelController@exportSigma', 'as' => 'get-validatorExportSigma']);
        Route::get('/exportMitra' , ['uses' => 'ExportExcelController@exportMitra', 'as' => 'get-validatorExportMitra']);
        Route::get('/exportTkmNetra' , ['uses' => 'ExportExcelController@exportTkmNetra', 'as' => 'get-validatorExportTkmNetra']);


        Route::get('/lihatNdaPicTelkomAkses' , ['uses' => 'NdaController@indexPicTelkomAkses', 'as' => 'get-validatorLihatNdaTelkomAkses']);
        Route::get('/lihatNdaPicMitratel' , ['uses' => 'NdaController@indexPicMitratel', 'as' => 'get-validatorLihatNdaMitratel']);
        Route::get('/lihatNdaPicSigma' , ['uses' => 'NdaController@indexPicSigma', 'as' => 'get-validatorLihatNdaSigma']);
        Route::get('/lihatNdaPicMitra' , ['uses' => 'NdaController@indexPicMitra', 'as' => 'get-validatorLihatNdaMitra']);
        Route::get('/lihatNdaPicTkmNetra' , ['uses' => 'NdaController@indexPicTkmNetra', 'as' => 'get-validatorLihatNdaTkmNetra']);

        Route::get('/uploadNda/{id}', ['uses' => 'NdaController@indexUploadNda', 'as' => 'get-validatorIndexUploadNda']);
        Route::post('/uploadNda/{id}', ['uses' => 'NdaController@uploadNda', 'as' => 'post-validatorUploadNda']);
        Route::get('/lihatNda/{path}', ['uses' => 'NdaController@lihatNda', 'as' => 'get-validatorLihatNda']);
        Route::get('/hapusNda/{id}', ['uses' => 'NdaController@hapusNda', 'as' => 'get-validatorHapusNda']);
//        Route::get('/validasiNda/{id}', ['uses' => 'NdaController@validasiNda', 'as' => 'get-validatorValidasiNda']);

        Route::get('/buatBerita', ['uses' => 'BeritaSimaruController@indexBuatBerita', 'as' => 'get-validatorBuatBerita']);
        Route::post('/buatBerita', ['uses' => 'BeritaSimaruController@buatBerita', 'as' => 'post-validatorBuatBerita']);
        Route::get('/editBerita/{id}', ['uses' => 'BeritaSimaruController@indexEditBerita', 'as' => 'get-validatorEditBerita']);
        Route::post('/editBerita/{id}', ['uses' => 'BeritaSimaruController@editBerita', 'as' => 'post-validatorEditBerita']);
        Route::get('/lihatBerita', ['uses' => 'BeritaSimaruController@lihatBerita', 'as' => 'get-validatorLihatBerita']);
        Route::get('/hapusBerita/{id}', ['uses' => 'BeritaSimaruController@hapusBerita', 'as' => 'get-validatorHapusBerita']);
        Route::get('/setAktif/{id}', ['uses' => 'BeritaSimaruController@setAktif', 'as' => 'get-validatorSetAktifBerita']);
        Route::get('/setPasif/{id}', ['uses' => 'BeritaSimaruController@setPasif', 'as' => 'get-validatorSetPasifBerita']);

        Route::get('/lihatSOP' , ['uses' => 'HomeController@lihatSOP', 'as' => 'get-validatorLihatSOP']);
    });

    Route::group(['prefix' => 'supervalidator', 'namespace' => 'SuperValidator', 'middleware' => ['autentikasiSuperValidator']], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'supervalidator-home']);
        Route::get('/editProfile' , ['uses' => 'ProfileController@indexProfile', 'as' => 'supervalidator-indexProfile']);
        Route::post('/editProfile' , ['uses' => 'ProfileController@editProfile', 'as' => 'supervalidator-editProfile']);

        Route::get('/matikansurat/{id}', ['uses' => 'SuratIjinMasukController@matikanSurat', 'as' => 'get-superValidatorMatikanSurat']);
        Route::get('/aktifkansurat/{id}', ['uses' => 'SuratIjinMasukController@aktifkanSurat', 'as' => 'get-superValidatorAktifkanSurat']);
        Route::get('/suratNonaktif', ['uses' => 'SuratIjinMasukController@suratNonaktif', 'as' => 'get-superValidatorSuratNonaktif']);

        Route::get('/lihatSurat', ['uses' => 'SuratIjinMasukController@indexLihatSurat', 'as' => 'get-superValidatorIndexLihatSurat']);
        Route::get('/validasi/{id}', ['uses' => 'SuratIjinMasukController@validasiSurat', 'as' => 'get-superValidatorValidasiSurat']);
        Route::get('/batalkanValidasi/{id}', ['uses' => 'SuratIjinMasukController@batalkanValidasiSurat', 'as' => 'get-superValidatorBatalkanValidasi']);
        Route::get('/detailSurat/{id}', ['uses' => 'SuratIjinMasukController@detailSurat', 'as' => 'get-superValidatorDetailSurat']);
        Route::get('/cetakSurat/{id}', ['uses' => 'SuratIjinMasukController@cetakSurat', 'as' => 'get-superValidatorCetakSurat']);
        Route::get('/indexExportSimaru' , ['uses' => 'ExportExcelController@indexExportSimaru', 'as' => 'get-superValidatorIndexExportSimaru']);
        Route::post('/exportSimaru' , ['uses' => 'ExportExcelController@exportSimaru', 'as' => 'post-superValidatorExportSimaru']);
        Route::get('/suratTervalidasi', ['uses' => 'SuratIjinMasukController@suratTervalidasi', 'as' => 'get-superValidatorSuratTervalidasi']);
        Route::get('/suratBelumTervalidasi', ['uses' => 'SuratIjinMasukController@suratBelumTervalidasi', 'as' => 'get-superValidatorSuratBelumTervalidasi']);
        Route::get('/suratRevisi', ['uses' => 'SuratIjinMasukController@suratRevisi', 'as' => 'get-superValidatorSuratRevisi']);

        Route::get('/lihatPicTelkom', ['uses' => 'DataPicController@lihatPicTelkom', 'as' => 'get-superValidatorLihatPicTelkom']);
        Route::get('/exportPicTelkom' , ['uses' => 'ExportExcelController@exportPicTelkom', 'as' => 'get-superValidatorExportPicTelkom']);

        Route::get('/lihatPicTkmNetra', ['uses' => 'DataPicController@lihatPicTkmNetra', 'as' => 'get-superValidatorLihatPicTkmNetra']);
        Route::get('/exportPicTkmNetra' , ['uses' => 'ExportExcelController@exportPicTkmNetra', 'as' => 'get-superValidatorExportTkmNetra']);

        Route::get('/lihatPicMitra', ['uses' => 'DataPicController@lihatPicMitraUmum', 'as' => 'get-superValidatorLihatPicMitra']);
        Route::get('/exportMitra' , ['uses' => 'ExportExcelController@exportMitra', 'as' => 'get-superValidatorExportMitra']);

        Route::get('/lihatPicTelkomAkses', ['uses' => 'DataPicController@lihatPicTelkomAkses', 'as' => 'get-superValidatorLihatPicTelkomAkses']);
        Route::get('/lihatUnitTelkomAkses', ['uses' => 'DataPicController@lihatUnitTelkomAkses', 'as' => 'get-superValidatorLihatUnitTelkomAkses']);
        Route::get('/exportTelkomAkses' , ['uses' => 'ExportExcelController@exportTelkomAkses', 'as' => 'get-superValidatorExportTelkomAkses']);

        Route::get('/lihatPicMitratel', ['uses' => 'DataPicController@lihatPicMitratel', 'as' => 'get-superValidatorLihatPicMitratel']);
        Route::get('/lihatUnitMitratel', ['uses' => 'DataPicController@lihatUnitMitratel', 'as' => 'get-superValidatorLihatUnitMitratel']);
        Route::get('/exportMitratel' , ['uses' => 'ExportExcelController@exportMitratel', 'as' => 'get-superValidatorExportMitratel']);

        Route::get('/lihatPicSigma', ['uses' => 'DataPicController@lihatPicSigma', 'as' => 'get-superValidatorLihatPicSigma']);
        Route::get('/lihatUnitSigma', ['uses' => 'DataPicController@lihatUnitSigma', 'as' => 'get-superValidatorLihatUnitSigma']);
        Route::get('/exportSigma' , ['uses' => 'ExportExcelController@exportSigma', 'as' => 'get-superValidatorExportSigma']);

        Route::get('/lihatUser', ['uses' => 'UserController@lihatUser', 'as' => 'get-superValidatorLihatUser']);
        Route::get('/lihatUserPicTelkom', ['uses' => 'UserController@lihatUserPicTelkom', 'as' => 'get-superValidatorLihatUserPicTelkom']);

        Route::get('/exportLogBook', ['uses' => 'ExportExcelController@indexExportLogBook', 'as' =>'get-superValidatorIndexExportLogBook']);
        Route::post('/export', ['uses' => 'ExportExcelController@exportLogBook', 'as' =>'post-superValidatorExportLogBook']);

        Route::get('/indexLogHarian', ['uses' => 'LogHarianController@indexLogHarian', 'as' =>'get-superValidatorIndexLogHarian']);
        Route::get('/logHarian', ['uses' => 'LogHarianController@logHarian', 'as' =>'get-superValidatorLogHarian']);

        Route::get('/indexLogBook', ['uses' => 'LogBookController@indexLogBook', 'as' =>'get-superValidatorIndexLogBook']);
        Route::get('/logBook', ['uses' => 'LogBookController@logBook', 'as' =>'get-superValidatorLogBook']);

        Route::get('/lampiran/{id}' , ['uses' => 'LampiranController@lihatLampiran', 'as' => 'get-superValidatorLihatLampiran']);

        Route::get('/lihatPesanExtend/{id}', ['uses' => 'LogHarianController@lihatPesanExtend', 'as' =>'get-superValidatorLihatPesanExtend']);

        Route::get('/lihatSOP' , ['uses' => 'HomeController@lihatSOP', 'as' => 'get-superValidatorLihatSOP']);

    });

    Route::group(['prefix' => 'security', 'namespace' => 'Security', 'middleware' => ['autentikasiSecurity']], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'security-home']);
        Route::get('/editProfile' , ['uses' => 'ProfileController@indexProfile', 'as' => 'security-indexProfile']);
        Route::post('/editProfile' , ['uses' => 'ProfileController@editProfile', 'as' => 'security-editProfile']);

         Route::get('/detailSuratKeluar/{id}', ['uses' => 'SuratIjinKeluarBarangController@detailSuratKeluar', 'as' => 'get-securityDetailSuratKeluar']);


        Route::get('/cetakSuratKeluar/{id}', ['uses' => 'SuratIjinKeluarBarangController@cetakSuratKeluar', 'as' => 'get-securityCetakSuratKeluar']);


        Route::get('/validasisurat/{id}', ['uses' => 'SuratIjinKeluarBarangController@validasiSurat', 'as' => 'get-securityValidasiSurat']);
        Route::get('/batalkanvalidasisurat/{id}', ['uses' => 'SuratIjinKeluarBarangController@batalkanValidasiSurat', 'as' => 'get-securityRevisiSuratKeluar']);

        Route::get('/indexLihatSuratKeluarHariIni', ['uses' => 'suratIjinKeluarBarangController@indexLihatSuratKeluarHariIni', 'as' =>'get-securityIndexLihatSuratKeluarHariIni']);


        Route::get('/cariPicMitra', ['uses' => 'SuratIjinMasukController@indexCariPic', 'as' =>'get-securityIndexCariPicMitra']);
        Route::get('/hasilPicMitra', ['uses' => 'SuratIjinMasukController@CariPic', 'as' =>'get-securityCariPicMitra']);
        Route::get('/cariNoSimaru', ['uses' => 'SuratIjinMasukController@indexNoSimaru', 'as' =>'get-securityIndexCariNoSimaru']);
        Route::get('/hasilNoSimaru', ['uses' => 'SuratIjinMasukController@cariSimaru', 'as' =>'get-securityCariNoSimaru']);
        Route::get('/lihatSimaru/{id}', ['uses' => 'SuratIjinMasukController@detailSurat', 'as' =>'get-securityDetailSurat']);
        Route::get('/ijinkanMasuk/{id}', ['uses' => 'LogMasukController@petugasMasuk', 'as' =>'get-securityBeriIjinMasuk']);
        Route::get('/ijinkanKeluar/{id}', ['uses' => 'LogMasukController@petugasKeluar', 'as' =>'get-securityBeriIjinKeluar']);
        Route::get('/lihatLogMasuk', ['uses' => 'LogMasukController@logBelumTerselesaikan', 'as' =>'get-securityLogBelumTerselesaikan']);
        Route::get('/hapusLogMasuk/{id}', ['uses' => 'LogMasukController@hapusLogMasuk', 'as' =>'get-securityHapusLog']);
        Route::get('/indexLogBook', ['uses' => 'LogBookController@indexLogBook', 'as' =>'get-securityIndexLogBook']);
        Route::get('/indexLihatSuratKeluar', ['uses' => 'suratIjinKeluarBarangController@indexLihatSuratKeluar', 'as' =>'get-securityIndexLihatSuratKeluar']);
        Route::get('/logBook', ['uses' => 'LogBookController@lihatLogBook', 'as' =>'get-securityLihatLogBook']);
        Route::get('/keluarTervalidasi', ['uses' => 'LogBookController@keluarTervalidasi', 'as' =>'get-securityKeluarTervalidasi']);
        Route::get('/logMelebihiWaktu', ['uses' => 'LogBookController@logMelebihiWaktu', 'as' =>'get-securityLogMelebihiWaktu']);

        Route::get('/indexExtendLog', ['uses' => 'LogMasukController@indexExtendLog', 'as' =>'get-securityIndexExtendLog']);
        Route::get('/beriExtend/{id}', ['uses' => 'LogMasukController@indexBeriExtend', 'as' =>'get-securityIndexBeriExtend']);
        Route::post('/beriExtend/{id}', ['uses' => 'LogMasukController@beriExtend', 'as' =>'post-securityBeriExtend']);
        Route::get('/lihatPesanExtend/{id}', ['uses' => 'LogMasukController@lihatPesanExtend', 'as' =>'get-securityLihatPesanExtend']);

        Route::get('/buatBerita', ['uses' => 'BeritaSimaruController@indexBuatBerita', 'as' => 'get-buatBerita']);
        Route::post('/buatBerita', ['uses' => 'BeritaSimaruController@buatBerita', 'as' => 'post-buatBerita']);
        Route::get('/editBerita/{id}', ['uses' => 'BeritaSimaruController@indexEditBerita', 'as' => 'get-editBerita']);
        Route::post('/editBerita/{id}', ['uses' => 'BeritaSimaruController@editBerita', 'as' => 'post-editBerita']);
        Route::get('/lihatBerita', ['uses' => 'BeritaSimaruController@lihatBerita', 'as' => 'get-lihatBerita']);
        Route::get('/hapusBerita/{id}', ['uses' => 'BeritaSimaruController@hapusBerita', 'as' => 'get-hapusBerita']);
        Route::get('/setAktif/{id}', ['uses' => 'BeritaSimaruController@setAktif', 'as' => 'get-setAktifBerita']);
        Route::get('/setPasif/{id}', ['uses' => 'BeritaSimaruController@setPasif', 'as' => 'get-setPasifBerita']);

        Route::get('/lihatSOP' , ['uses' => 'HomeController@lihatSOP', 'as' => 'get-securityLihatSOP']);

        Route::get('/tambahkanNda/{id}', ['uses' => 'NdaController@tambahkanNda', 'as' => 'get-securityTambahkanNda']);
        Route::get('/lihatNda/{path}', ['uses' => 'NdaController@lihatNda', 'as' => 'get-securitylihatNda']);
        Route::get('/batalkanNda/{id}', ['uses' => 'NdaController@batalkanNda', 'as' => 'get-securityBatalkanNda']);
    });

    Route::group(['prefix' => 'PicTelkom', 'namespace' => 'PicTelkom', 'middleware' => ['autentikasiPicTelkom']], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'picTelkom-home']);
        Route::get('/editProfile' , ['uses' => 'ProfileController@indexProfile', 'as' => 'picTelkom-indexProfile']);
        Route::post('/editProfile' , ['uses' => 'ProfileController@editProfile', 'as' => 'picTelkom-editProfile']);


        


        Route::get('/buatSuratKeluar', ['uses' => 'SuratKeluarBarangController@indexBuatSurat', 'as' => 'get-picTelkomBuatSuratKeluar']);
        Route::post('/buatSuratKeluar', ['uses' => 'SuratKeluarBarangController@buatSuratKeluar', 'as' => 'post-picTelkomBuatSuratKeluar']);
         Route::get('/editSuratKeluar{id}', ['uses' => 'SuratKeluarBarangController@indexEditSurat', 'as' => 'get-picTelkomEditSuratKeluar']);
        Route::post('/editSuratKeluar{id}', ['uses' => 'SuratKeluarBarangController@editSuratKeluar', 'as' => 'post-picTelkomEditSuratKeluar']);


        Route::get('/lihatSuratKeluar', ['uses' => 'SuratKeluarBarangController@indexLihatSuratKeluar', 'as' => 'get-picTelkomIndexLihatSuratKeluar']);
        Route::get('/hapusSurat/{id}', ['uses' => 'SuratKeluarBarangController@hapusSurat', 'as' => 'get-picTelkomHapusSurat']);
        Route::get('/editSurat/{id}', ['uses' => 'SuratKeluarBarangController@indexEditSurat', 'as' => 'get-picTelkomIndexEditSurat']);
        Route::post('/editSurat/{id}', ['uses' => 'SuratKeluarBarangController@EditSurat', 'as' => 'post-picTelkomEditSurat']);
        Route::get('/detailSuratKeluar/{id}', ['uses' => 'SuratKeluarBarangController@detailSuratKeluar', 'as' => 'get-picTelkomDetailSuratKeluar']);
        Route::get('/cetakSuratKeluar/{id}', ['uses' => 'SuratKeluarBarangController@cetakSuratKeluar', 'as' => 'get-picTelkomCetakSuratKeluar']);


        Route::get('/lihatSimaru/{id}', ['uses' => 'SuratIjinMasukController@detailSurat', 'as' =>'get-picTelkomDetailSurat']);
        Route::get('/lihatLogPetugas', ['uses' => 'LogMasukController@logPetugas', 'as' =>'get-picTelkomLogPetugas']);
        Route::get('/lihatLogExtend', ['uses' => 'LogMasukController@logPetugasExtend', 'as' =>'get-picTelkomLogPetugasExtend']);
        Route::get('/lihatSurat', ['uses' => 'SuratIjinMasukController@indexLihatSurat', 'as' => 'get-picTelkomIndexLihatSurat']);
        Route::get('/lihatPesanExtend/{id}', ['uses' => 'LogMasukController@lihatPesanExtend', 'as' =>'get-picTelkomLihatPesanExtend']);
        
        Route::get('/keluarTervalidasi', ['uses' => 'LogBookController@keluarTervalidasi', 'as' =>'get-picTelkomKeluarTervalidasi']);
        Route::get('/logMelebihiWaktu', ['uses' => 'LogMasukController@logMelebihiWaktu', 'as' =>'get-picTelkomLogMelebihiWaktu']);
        Route::get('/lihatLogBelumTerselesaikan', ['uses' => 'LogMasukController@logBelumTerselesaikan', 'as' =>'get-picTelkomLogBelumTerselesaikan']);
        Route::get('/lihatLogMasuk', ['uses' => 'LogMasukController@logMasukTervalidasi', 'as' =>'get-picTelkomLogMasukTervalidasi']);
        Route::get('/lihatLogKeluar', ['uses' => 'LogMasukController@logKeluarTervalidasi', 'as' =>'get-picTelkomLogKeluarTervalidasi']);



        Route::get('/lihatSOP' , ['uses' => 'HomeController@lihatSOP', 'as' => 'get-picTelkomLihatSOP']);
    });


    Route::group(['prefix' => 'Gm', 'namespace' => 'Gm', 'middleware' => ['autentikasiGm']], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'gm-home']);
        Route::get('/editProfile' , ['uses' => 'ProfileController@indexProfile', 'as' => 'gm-indexProfile']);
        Route::post('/editProfile' , ['uses' => 'ProfileController@editProfile', 'as' => 'gm-editProfile']);

        Route::get('/lihatSimaru/{id}', ['uses' => 'SuratIjinMasukController@detailSurat', 'as' =>'get-gmDetailSurat']);

        Route::get('/lihatSOP' , ['uses' => 'HomeController@lihatSOP', 'as' => 'get-gmLihatSOP']);

    });

    Route::group(['prefix' => 'Sas', 'namespace' => 'Sas', 'middleware' => ['autentikasiSas']], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'sas-home']);
        Route::get('/editProfile' , ['uses' => 'ProfileController@indexProfile', 'as' => 'sas-indexProfile']);
        Route::post('/editProfile' , ['uses' => 'ProfileController@editProfile', 'as' => 'sas-editProfile']);

        Route::get('/lihatSimaru/{id}', ['uses' => 'SuratIjinMasukController@detailSurat', 'as' =>'get-sasDetailSurat']);

        Route::get('/lihatSOP' , ['uses' => 'HomeController@lihatSOP', 'as' => 'get-sasLihatSOP']);

    });

});
