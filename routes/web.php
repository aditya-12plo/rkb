<?php 

 Route::name('locale.switch')->get('switch/{locale}', 'LocaleController@switch');
 
 Route::middleware(['localized'])->group(function () {
    Route::get('/', 'IndexController@index'); 

    Route::get('/personal-account', 'IndexController@akunIndividu')->name('personalAccount');
    Route::get('/akun-individu', 'IndexController@akunIndividu')->name('personalAccount');

    Route::get('/institutional-account', 'IndexController@akunInstitusi')->name('institutionalAccount');
    Route::get('/akun-institusi', 'IndexController@akunInstitusi')->name('institutionalAccount');

    Route::get('/privacy-policy', 'IndexController@kebijakanPrivasi')->name('privacyPolicy');
    Route::get('/kebijakan-privasi', 'IndexController@kebijakanPrivasi')->name('privacyPolicy');
    
    Route::get('/daftar-akun-demo', 'IndexController@akunDemo')->name('registerDemoAccount');
    Route::get('/register-demo-account',  'IndexController@akunDemo')->name('registerDemoAccount');
    
    Route::get('/daftar-akun-real',  'IndexController@akunReal')->name('registerRealAccount');
    Route::get('/register-real-account',  'IndexController@akunReal')->name('registerRealAccount');

    Route::get('/company-profile',  'IndexController@profilPerusahaan')->name('companyProfile');
    Route::get('/profil-perusahaan',  'IndexController@profilPerusahaan')->name('companyProfile');

    Route::get('/dana-terpisah-perusahaan',  'IndexController@danaPerusahaan')->name('companyFunds');
    Route::get('/separate-company-funds',  'IndexController@danaPerusahaan')->name('companyFunds');

    Route::get('/gofx/gold',  'IndexController@gofxGold')->name('gofxGold');
    
    Route::get('/gofx/oil',  'IndexController@gofxOil')->name('gofxOil');

    Route::get('/gofx/forex',  'IndexController@gofxForex')->name('gofxForex');

    Route::get('/teknologi', 'IndexController@technology')->name('technology');
    Route::get('/technology', 'IndexController@technology')->name('technology');
    
    Route::get('/partnership', 'IndexController@partnership')->name('partnership');

    Route::get('/berita-pasar-terbaru', 'IndexController@newsPerusahaanWeb')->name('newsPerusahaanWeb');
    Route::get('/latest-market-news', 'IndexController@newsPerusahaanWeb')->name('newsPerusahaanWeb');
    
    /*Route indexweb not definied
    Route::get('/berita-pasar/{slug}', 'IndexController@newsDetailPerusahaanWeb')->name('newsDetailPerusahaanWeb');
    */
    Route::get('/hubungi-kami', 'IndexController@hubungiPerusahaan')->name('hubungiPerusahaan');
    Route::get('/contact-us', 'IndexController@hubungiPerusahaan')->name('hubungiPerusahaan');
    
    Route::get('/berita-ekonomi', 'IndexController@newsForexFactory')->name('newsForexFactory');
    Route::get('/economic-news', 'IndexController@newsForexFactory')->name('newsForexFactory');
    
    Route::get('/kalender-ekonomi', 'IndexController@econimicCalender')->name('economicCalender');
    Route::get('/economic-calendar', 'IndexController@econimicCalender')->name('economicCalender');

    Route::get('/page-not-found',['as' => 'pagenotfound','uses' => 'IndexController@index']);
    Route::get('/server-error',['as' => 'servererror','uses' => 'IndexController@index']);
        
    
    Route::post('/hubungi-kami', ['as' => 'addContact', 'uses' => 'IndexController@addContact']);
    Route::post('/newslater', ['as' => 'addNewslater', 'uses' => 'IndexController@addNewslater']);
    Route::post('/daftar-akun-demo', ['as' => 'addDemoAccount', 'uses' => 'IndexController@addDemoAccount']);
    Route::post('/partnership', ['as' => 'addPartnership', 'uses' => 'IndexController@addPartnership']);
    Route::post('/daftar-akun-real', ['as' => 'addRealAccount', 'uses' => 'IndexController@addRealAccount']);


    
    Route::get('/coba', ['as' => 'coba', 'uses' => 'IndexController@addPartnershipTest']);
});

 /*
Route::get('/', ['as' => 'indexWeb', 'uses' => 'IndexController@index']);
Route::get('/get-json-country', ['as' => 'getJsonCountry', 'uses' => 'IndexController@getJsonCountry']);
Route::get('/profil-perusahaan', ['as' => 'profilPerusahaanWeb', 'uses' => 'IndexController@profilPerusahaan']);
Route::get('/dana-terpisah-perusahaan', ['as' => 'danaPerusahaanWeb', 'uses' => 'IndexController@danaPerusahaan']);
Route::get('/hubungi-kami', ['as' => 'hubungiKamiWeb', 'uses' => 'IndexController@hubungiPerusahaan']);
Route::get('/akun-individu', ['as' => 'akunIndividuPerusahaanWeb', 'uses' => 'IndexController@akunIndividu']);
Route::get('/akun-institusi', ['as' => 'akunInstitusiPerusahaanWeb', 'uses' => 'IndexController@akunInstitusi']);
Route::get('/gofx/gold', ['as' => 'gofxGoldPerusahaanWeb', 'uses' => 'IndexController@gofxGold']);
Route::get('/gofx/oil', ['as' => 'gofxOilPerusahaanWeb', 'uses' => 'IndexController@gofxOil']);
Route::get('/gofx/forex', ['as' => 'gofxForexPerusahaanWeb', 'uses' => 'IndexController@gofxForex']);
Route::get('/kebijakan-privasi', ['as' => 'kebijakanPrivasiPerusahaanWeb', 'uses' => 'IndexController@kebijakanPrivasi']);
Route::get('/daftar-akun-demo', ['as' => 'akunDemoPerusahaanWeb', 'uses' => 'IndexController@akunDemo']);
Route::get('/akun-demo-konfirmasi/{token}', ['as' => 'aktivasiAkunPerusahaanWeb', 'uses' => 'IndexController@aktivasiAkun']);
Route::get('/daftar-akun-real', ['as' => 'akunRealPerusahaanWeb', 'uses' => 'IndexController@akunReal']);
Route::get('/teknologi', ['as' => 'technologyPerusahaanWeb', 'uses' => 'IndexController@technology']);
Route::get('/partnership', ['as' => 'partnershipPerusahaanWeb', 'uses' => 'IndexController@partnership']);
Route::get('/akun-real-konfirmasi/{token}', ['as' => 'aktivasiAkunRealPerusahaanWeb', 'uses' => 'IndexController@aktivasiAkunReal']);
Route::get('/detail-data-pendaftar-akun-real/{id}', ['as' => 'detailDataAkunReal', 'uses' => 'IndexController@detailDataAkunReal']);
Route::get('/berita-pasar-terbaru', ['as' => 'newsPerusahaanWeb', 'uses' => 'IndexController@newsPerusahaanWeb']);
Route::get('/berita-pasar/{slug}', ['as' => 'newsDetailPerusahaanWeb', 'uses' => 'IndexController@newsDetailPerusahaanWeb']);


Route::post('/hubungi-kami', ['as' => 'addContact', 'uses' => 'IndexController@addContact']);
Route::post('/newslater', ['as' => 'addNewslater', 'uses' => 'IndexController@addNewslater']);
Route::post('/daftar-akun-demo', ['as' => 'addDemoAccount', 'uses' => 'IndexController@addDemoAccount']);
Route::post('/partnership', ['as' => 'addPartnership', 'uses' => 'IndexController@addPartnership']);
Route::post('/daftar-akun-real', ['as' => 'addRealAccount', 'uses' => 'IndexController@addRealAccount']);


Route::get('/berita-ekonomi', ['as' => 'newsForexFactory', 'uses' => 'IndexController@newsForexFactory']);
Route::get('/berita-ekonomi/{id}', ['as' => 'detailNewsForexFactory', 'uses' => 'IndexController@detailNewsForexFactory']);
Route::get('/kalender-ekonomi', ['as' => 'econimiccalender', 'uses' => 'IndexController@econimicCalender']);
Route::get('/kalender-ekonomi/{id}', ['as' => 'econimiccalenderdetail', 'uses' => 'IndexController@econimicCalenderDetail']);


Route::get('/page-not-found',['as' => 'pagenotfound','uses' => 'IndexController@index']);
Route::get('/server-error',['as' => 'servererror','uses' => 'IndexController@index']);
// change language
Route::get('lang/{locale}', 'IndexController@lang');

Route::get('/coba', ['as' => 'coba', 'uses' => 'IndexController@coba']);


// for clients
Route::group(['prefix' => 'clients-area'], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.request');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.update');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
    
    

Route::get('/', 'HomeClientsController@index')->name('client.home');
Route::post('/user/change-password', 'HomeClientsController@changePassword')->name('client.changePassword');
Route::get('/get-user-detail', 'HomeClientsController@getUserDetail')->name('client.getUserDetail');
Route::post('/post-user-detail', 'HomeClientsController@postUserDetail')->name('client.postUserDetail');
Route::get('/get-list-demo-account', 'HomeClientsController@getListDemoAccount')->name('client.getListDemoAccount');
Route::get('/get-user-demo-account', 'HomeClientsController@getUserDemoAccount')->name('client.getUserDemo');
Route::get('/get-list-real-account', 'HomeClientsController@getListRealAccount')->name('client.getListRealAccount');
Route::get('/create-real-account/step/{step}/{id}', 'HomeClientsController@createRealAccount')->name('client.createRealAccount');
Route::get('/get-deposit', 'HomeClientsController@getListDeposit')->name('client.getListDeposit');
Route::get('/get-withdrawal', 'HomeClientsController@getListWithdrawal')->name('client.getListWithdrawal');

Route::post('/delete-file', 'HomeClientsController@deleteFile')->name('client.deleteFile');
Route::post('/upload-file', 'HomeClientsController@uploadFile')->name('client.uploadFile');

Route::post('/post-real-account/step-1', 'HomeClientsController@postRealAccountStep1')->name('client.postRealAccountStep1');
Route::post('/post-real-account/step-2', 'HomeClientsController@postRealAccountStep2')->name('client.postRealAccountStep2');
Route::post('/post-real-account/step-3', 'HomeClientsController@postRealAccountStep3')->name('client.postRealAccountStep3');
Route::post('/post-real-account/step-4', 'HomeClientsController@postRealAccountStep4')->name('client.postRealAccountStep4');
Route::post('/post-real-account/step-5', 'HomeClientsController@postRealAccountStep5')->name('client.postRealAccountStep5');
Route::post('/post-real-account/step-6', 'HomeClientsController@postRealAccountStep6')->name('client.postRealAccountStep6');
Route::post('/post-real-account/step-7', 'HomeClientsController@postRealAccountStep7')->name('client.postRealAccountStep7');
Route::post('/post-real-account/step-8', 'HomeClientsController@postRealAccountStep8')->name('client.postRealAccountStep8');
Route::post('/post-real-account/step-9', 'HomeClientsController@postRealAccountStep9')->name('client.postRealAccountStep9');
Route::post('/post-real-account/step-10', 'HomeClientsController@postRealAccountStep10')->name('client.postRealAccountStep10');
Route::post('/post-real-account/step-11', 'HomeClientsController@postRealAccountStep11')->name('client.postRealAccountStep11');
Route::post('/post-real-account/step-12', 'HomeClientsController@postRealAccountStep12')->name('client.postRealAccountStep12');
Route::post('/post-real-account/step-13', 'HomeClientsController@postRealAccountStep13')->name('client.postRealAccountStep13');
Route::post('/post-real-account/step-14', 'HomeClientsController@postRealAccountStep14')->name('client.postRealAccountStep14');
Route::post('/post-real-account/step-15', 'HomeClientsController@postRealAccountStep15')->name('client.postRealAccountStep15');

Route::post('/post-deposit', 'HomeClientsController@postDeposit')->name('client.postDeposit');
Route::post('/post-withdrawal', 'HomeClientsController@postWithdrawal')->name('client.postWithdrawal');
Route::post('/download-deposit-file', 'HomeClientsController@downloadDeposit')->name('client.downloadDeposit');
Route::post('/download-registrasi-file', 'HomeClientsController@downloadRegitrasiFile')->name('client.downloadRegitrasiFile');


Route::get('/coba', 'HomeClientsController@coba')->name('client.coba');

});


// for admin
Route::group(['prefix' => 'rajawaliadmin', 'namespace' => 'Rajawali'], function () {
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('Rajawali.login');
Route::post('login', 'Auth\LoginController@login')->name('Rajawali.request');
Route::post('/logout', 'Auth\LoginController@logout')->name('Rajawali.logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('Rajawali.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('Rajawali.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('Rajawali.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('Rajawali.password.reset');



Route::get('/', 'HomeController@index')->name('Adminhome');
Route::get('/get-list-real-account', 'RealAccountController@index')->name('Rajawali.getListRealAccount');
Route::post('/download-real-account', 'RealAccountController@download')->name('Rajawali.downloadRealAccount');
Route::post('/download-real-account-pdf', 'RealAccountController@downloadPdf')->name('Rajawali.downloadPdf');
Route::post('/approval-real-account', 'RealAccountController@approvalRealAccount')->name('Rajawali.approvalRealAccount');
Route::post('/upload-file-user-real', 'RealAccountController@uploadRealAccount')->name('Rajawali.uploadRealAccount');
Route::post('/delete-file-real-account', 'RealAccountController@deleteFileRealAccount')->name('Rajawali.deleteFileRealAccount');
Route::post('/update-real-account-status', 'RealAccountController@updateRealAccountStatus')->name('Rajawali.updateRealAccountStatus');
Route::post('/update-real-account', 'RealAccountController@updateRealAccount')->name('Rajawali.updateRealAccount');

Route::get('/get-list-demo-account', 'DemoAccountController@index')->name('Rajawali.getListDemoAccount');
Route::post('/used-demo-account', 'DemoAccountController@updateDemoAccount')->name('Rajawali.updateDemoAccount');
Route::post('/download-demo-account', 'DemoAccountController@downloadDemoAccount')->name('Rajawali.downloadDemoAccount');
Route::post('/upload-demo-account', 'DemoAccountController@uploadDemoAccount')->name('Rajawali.uploadDemoAccount');

Route::get('/get-list-deposit', 'DepositController@index')->name('Rajawali.getListDeposit');
Route::post('add-deposit', 'DepositController@add')->name('Rajawali.addDeposit');
Route::post('download-deposit-file', 'DepositController@downloadDepositFile')->name('Rajawali.downloadDepositFile');
Route::post('update-deposit', 'DepositController@update')->name('Rajawali.updateDeposit');
Route::post('download-deposit', 'DepositController@download')->name('Rajawali.downloadDeposit');

Route::get('/get-list-withdrawal', 'WithdrawalController@index')->name('Rajawali.getListWithdrawal');
Route::post('add-withdrawal', 'WithdrawalController@add')->name('Rajawali.addWithdrawal');
Route::post('download-withdrawal-file', 'WithdrawalController@downloadWithdrawalFile')->name('Rajawali.downloadWithdrawalFile');
Route::post('update-withdrawal', 'WithdrawalController@update')->name('Rajawali.updateWithdrawal');
Route::post('download-withdrawal', 'WithdrawalController@download')->name('Rajawali.downloadWithdrawal');

Route::get('/get-list-banner', 'BannersController@index')->name('Rajawali.getListBanner');
Route::post('/add-banner', 'BannersController@add')->name('Rajawali.addBanner');
Route::post('/update-banner', 'BannersController@update')->name('Rajawali.updateBanner');
Route::post('/delete-banner', 'BannersController@delete')->name('Rajawali.deleteBanner');

Route::get('/get-list-files', 'FilesController@index')->name('Rajawali.getListFile');
Route::post('/add-files', 'FilesController@add')->name('Rajawali.addFiles');
Route::post('download-files', 'FilesController@download')->name('Rajawali.downloadFiles');
Route::post('update-files', 'FilesController@update')->name('Rajawali.updateFiles');
Route::post('delete-files', 'FilesController@delete')->name('Rajawali.deleteFiles');


Route::get('/get-list-news', 'NewsController@index')->name('Rajawali.getListNews');
Route::post('/add-news', 'NewsController@add')->name('Rajawali.addNews');
Route::post('/update-news', 'NewsController@update')->name('Rajawali.updateNews');
Route::post('/delete-news', 'NewsController@delete')->name('Rajawali.deleteNews');

Route::get('/get-list-admin', 'AdminController@index')->name('Rajawali.getListAdmin');
Route::post('/add-admin', 'AdminController@add')->name('Rajawali.addAdmin');
Route::post('/update-admin', 'AdminController@update')->name('Rajawali.updateAdmin');
Route::post('/delete-admin', 'AdminController@delete')->name('Rajawali.deleteAdmin');
Route::post('download-admin', 'AdminController@download')->name('Rajawali.downloadAdmin');
Route::post('change-password', 'AdminController@changePassword')->name('Rajawali.changePasswordAdmin');

Route::get('/get-list-user', 'UserController@index')->name('Rajawali.getListUser');
Route::post('/add-user', 'UserController@add')->name('Rajawali.addUser');
Route::post('/update-user', 'UserController@update')->name('Rajawali.updateUser');
Route::post('/download-user', 'UserController@download')->name('Rajawali.downloadUser');
Route::post('/delete-user', 'UserController@delete')->name('Rajawali.deleteUser');
Route::get('/load-demo-and-real/{id}', 'UserController@getDemoNReal')->name('Rajawali.getDemoNReal');


Route::get('/get-email', 'MailsController@index')->name('Rajawali.getEmail');
Route::post('/update-email', 'MailsController@update')->name('Rajawali.updateEmail');

	 
Route::get('/get-list-partnership', 'PartnershipController@index')->name('Rajawali.getListPartnership');
Route::post('/download-partnership', 'PartnershipController@download')->name('Rajawali.downloadPartnership');


Route::get('/get-list-contact', 'ContactController@index')->name('Rajawali.getListContact');
Route::post('/download-contact', 'ContactController@download')->name('Rajawali.downloadContact');

	 
Route::get('/get-list-newslatters', 'NewslatterController@index')->name('Rajawali.getListNewslatter');
Route::post('/download-newslatters', 'NewslatterController@download')->name('Rajawali.downloadNewslatter');
});

*/