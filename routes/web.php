<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');

//});
Auth::routes();
Route::get('/', 'AlhajHomeController@index');
Route::get('/open-bo-account', 'AlhajHomeController@openBoAccount');
Route::get('/why-alhaj', 'AlhajHomeController@whyAlhaj');
Route::get('/services', 'AlhajHomeController@services');
Route::get('/bo-form-download', 'AlhajHomeController@boDownload');
Route::get('/contact', 'AlhajHomeController@contact');
Route::get('/guidelines', 'AlhajHomeController@guidelines');

/*SEND MAIL*/
Route::post('/send-mail', 'AlhajHomeController@sendmail');

Route::post('/register-bo-account', 'BoAccountController@registerBoAccount');
Route::post('/login-bo-account', 'BoAccountController@loginBoAccount');

Route::get('/bo-logout', 'BoAccountController@logoutBOAccount');

// BO Dashboard Start

Route::prefix('/bo-dashboard')->middleware('bo_middleware')->group(function () {
    Route::get('/', 'BoAccountController@boDashboard');
    Route::post('/add-account-holder-save', 'BoAccountController@addAccountHolderSave');
    Route::post('/first-ac-holder-image', 'BoAccountController@firstACHolderImage');
    Route::post('/front-page-nid-image', 'BoAccountController@frontPageNIDImage');
    Route::post('/back-page-nid-image', 'BoAccountController@backPageNIDImage');
    Route::post('/ac-holder-signature-image', 'BoAccountController@acHolderSignatureImage');
    Route::post('/ac_holder_cheque_book_leaf', 'BoAccountController@acHolderChequeBookLeaf');
    Route::post('/join-ac-holder-image', 'BoAccountController@joinAcHolderImage');
    Route::post('/join-front-page-nid-image', 'BoAccountController@joinFrontPageNIDImage');
    Route::post('/join-back-page-nid-image', 'BoAccountController@joinBackPageNIDImage');
    Route::post('/join-ac-holder-signature', 'BoAccountController@joinAcHolderSignature');
    Route::post('/bo-payment', 'BoAccountController@boPayment');
    Route::get('/add-account-holder', 'BoAccountController@addAccountHolder');
    Route::post('/bank-information-save', 'BoAccountController@bankInfoSave');
    Route::post('/nominee-info-save', 'BoAccountController@nomineeInfoSave');
});

Route::get('/account-holders', 'BoAccountController@accountHolders')->middleware('bo_middleware');
Route::get('/document-upload', 'BoAccountController@documentUpload')->middleware('bo_middleware');
Route::get('/payment-option', 'BoAccountController@paymentOption')->middleware('bo_middleware');
Route::get('/payment-status', 'BoAccountController@paymentStatus')->middleware('bo_middleware');
Route::get('/bo-account/get-cities', 'BoAccountController@getCities')->middleware('bo_middleware');
Route::get('/bo-account/get-bank-branch', 'BoAccountController@getBankBranch')->middleware('bo_middleware');
Route::get('/bank-information', 'BoAccountController@bankInformation')->middleware('bo_middleware');
Route::get('/nominee-information', 'BoAccountController@nomineeInformation')->middleware('bo_middleware');

// BO Dashboard End


Route::prefix('client')->middleware('auth')->group(function () {
    // Client Dashboard Start
    Route::get('/dashboard', 'ClientController@clientDashboard');
    Route::get('/cbdl-change-request', 'ClientController@CBDLChangeRequest');
    Route::post('/add-account-holder-save', 'ClientController@addAccountHolderSave');
    Route::post('/bank-information-save', 'ClientController@bankInfoSave');
    Route::post('/nominee-info-save', 'ClientController@nomineeInfoSave');

    Route::get('/portfolio', 'ClientController@clientProtfolio');
    Route::post('/portfolio', 'ClientController@clientProtfolioView');
    Route::get('/live-portfolio', 'ClientController@clientLiveProtfolio');
    Route::get('/client-ledger', 'ClientController@clientLedger');
    Route::post('/client-ledger', 'ClientController@clientLedgerView');
    Route::get('/client-confirmation', 'ClientController@clientConfirmation');
    Route::post('/client-confirmation', 'ClientController@clientConfirmationView');
    Route::get('/receipt-payment', 'ClientController@receiptPayment');
    Route::post('/receipt-payment', 'ClientController@receiptPaymentView');
    Route::get('/profit-loss-pl', 'ClientController@protfolioDetailsPl');
    Route::post('/profit-loss-pl', 'ClientController@protfolioDetailsPlView');
    Route::get('/buy-share', 'ClientController@BuyShare');
    Route::get('/sell-share', 'ClientController@clientSellShare');
    Route::get('/selling-share/{id}', 'ClientController@clientSellingShare');
    Route::get('/dse-mobile-app', 'ClientController@dseMobileApp');
    Route::get('/chatbox', 'ClientController@chatbox');
    Route::get('/support', 'ClientController@support');
    Route::get('/margin-loan', 'MarginLoanController@marginLoan');
    Route::post('/margin-loan-save', 'MarginLoanController@marginLoanSave');

// Client Dashboard End

    Route::post('/first-ac-holder-image-change-request', 'ClientController@firstACHolderImageChangeRequest');
    Route::post('/first-ac-holder-front-page-nid-image-change-request', 'ClientController@firstACHolderFrontNidImageChangeRequest');
    Route::post('/first-ac-holder-back-page-nid-image-change-request', 'ClientController@firstACHolderBackNidImageChangeRequest');
    Route::post('/first-ac-holder-signature-image-change-request', 'ClientController@firstACHolderSignatureImageChangeRequest');
    Route::post('/joint-ac-holder-image-change-request', 'ClientController@jointACHolderImageChangeRequest');
    Route::post('/joint-ac-holder-front-page-nid-image-change-request', 'ClientController@jointACHolderFrontNidImageChangeRequest');
    Route::post('/joint-ac-holder-back-page-nid-image-change-request', 'ClientController@jointACHolderBackNidImageChangeRequest');
    Route::post('/joint-ac-holder-signature-image-change-request', 'ClientController@jointACHolderSignatureImageChangeRequest');


//    File Upload Start



//    File Upload End
// Client Deposit  Start

    Route::get('/deposit-in-your-account', 'ClientController@depositInYourAccount');
    Route::post('/deposit-in-your-account-update', 'DepositController@depositInYourAccountUpdate');
    Route::get('/deposit-in-your-account-list', 'DepositController@depositInYourAccountList');

// Client Deposit  End
// Client Withdraw Start

    Route::get('/withdraw-amount', 'ClientWithdrawController@withdrawAmount');
    Route::post('/withdraw-amount-update', 'ClientWithdrawController@withdrawAmountUpdate');
    Route::get('/withdraw-amount-list', 'ClientWithdrawController@withdrawAmountList');

// Client Withdraw End
// Share Request (Buy) Start

    Route::get('/buy-share-price', 'ShareRequestController@buySharePrice');
    Route::post('/buy-share-save', 'ShareRequestController@buyShareSave');
    Route::get('/buy-share-list', 'ShareRequestController@buyShareList');

// Share Request (Buy) End
// Share Request (Sell) Start

    Route::post('/sell-share-save', 'ShareSellRequestController@sellShareSave');
    Route::get('/sell-share-list', 'ShareSellRequestController@sellShareList');

// Share Request (Sell) End

// IPO Route Start

    Route::get('/apply-ipo', 'IPOController@applyIPO');
    Route::get('/ipo-apply-submit/{id}', 'IPOController@ipoApplySubmit');
    Route::get('/applied-ipo-information', 'IPOController@appliedIPOInfo');

// IPO Route End

    //MarginLoanController Start
    Route::get('/margin-load', 'MarginLoanController@marginLoan');
    //MarginLoanController End


});
Route::get('/print/client-dashboard/{id}', 'ClientController@printClientDashboard');

// Client Route End

Route::prefix('admin')->middleware('auth', 'is_admin')->group(function () {
    // Admin Dashboard Start
    Route::get('/dashboard', 'AdminController@adminDashboard');

    // Bank Route Start
    Route::get('/bank-list', 'BankController@index');
    Route::get('/add-bank', 'BankController@addBank');
    Route::post('/add-bank-save', 'BankController@addBankSave');
    Route::get('/edit-bank/{id}', 'BankController@editBank');
    Route::post('/update-bank', 'BankController@updateBank');
    Route::get('/delete-bank/{id}', 'BankController@deleteBank');
    // Bank Route End
    // Bank Branch Route Start
    Route::get('/bank-branch-list', 'BankBranchController@index');
    Route::get('/add-bank-branch', 'BankBranchController@addBankBranch');
    Route::post('/add-bank-branch-save', 'BankBranchController@addBankBranchSave');
    Route::get('/edit-bank-branch/{id}', 'BankBranchController@editBankBranch');
    Route::post('/update-bank-branch', 'BankBranchController@updateBankBranch');
    Route::get('/delete-bank-branch/{id}', 'BankBranchController@deleteBankBranch');
    // Bank Branch Route End

    // Branch Route Start
    Route::get('/branch-list', 'BranchController@index');
    Route::get('/add-branch', 'BranchController@addBranch');
    Route::post('/add-branch-save', 'BranchController@addBranchSave');
    Route::get('/edit-branch/{id}', 'BranchController@editBranch');
    Route::post('/update-branch', 'BranchController@updateBranch');
    Route::get('/delete-branch/{id}', 'BranchController@deleteBranch');
    // Branch Route End

    // District Route Start
    Route::get('/district-list', 'DistrictController@index');
    Route::get('/add-district', 'DistrictController@addDistrict');
    Route::post('/add-district-save', 'DistrictController@addDistrictSave');
    Route::get('/edit-district/{id}', 'DistrictController@editDistrict');
    Route::post('/update-district', 'DistrictController@updateDistrict');
    Route::get('/delete-district/{id}', 'DistrictController@deleteDistrict');
    // District Route End

    // BoAccountAdminController Start

    Route::get('/bo-request-list', 'BoAccountAdminController@boRequestList');
    Route::get('/bo-change-request-list', 'BoAccountAdminController@boChangeRequestList');
    Route::get('/bo-change-request-edit/{id}', 'BoAccountAdminController@boChangeRequestEdit');
    Route::get('/bo-assign-list', 'BoAccountAdminController@boAssignList');
    Route::get('/bo-details/view/{id}', 'BoAccountAdminController@boDetailsView');
    Route::get('/bo-details/edit/{id}', 'BoAccountAdminController@boDetailsEdit');
    Route::get('/bo-details/delete/{id}', 'BoAccountAdminController@boDetailsDelete');

    // this is route also be used for client end (start)

    Route::post('/add-account-holder-save', 'BoAccountAdminController@addAccountHolderSave');
    Route::post('/bank-information-save', 'BoAccountAdminController@bankInfoSave');
    Route::post('/nominee-info-save', 'BoAccountAdminController@nomineeInfoSave');
    Route::post('/first-ac-holder-image', 'BoAccountAdminController@firstACHolderImage');
    Route::post('/front-page-nid-image', 'BoAccountAdminController@frontPageNIDImage');
    Route::post('/back-page-nid-image', 'BoAccountAdminController@backPageNIDImage');
    Route::post('/ac-holder-signature-image', 'BoAccountAdminController@acHolderSignatureImage');
    Route::post('/ac_holder_cheque_book_leaf', 'BoAccountAdminController@acHolderChequeBookLeaf');
    Route::post('/join-ac-holder-image', 'BoAccountAdminController@joinAcHolderImage');
    Route::post('/join-front-page-nid-image', 'BoAccountAdminController@joinFrontPageNIDImage');
    Route::post('/join-back-page-nid-image', 'BoAccountAdminController@joinBackPageNIDImage');
    Route::post('/join-ac-holder-signature', 'BoAccountAdminController@joinAcHolderSignature');

   // this is route also be used for client end (End)

    // Bo Approved

    Route::post('/bo-account-approved', 'BoAccountAdminController@boAccountApproved');

    // BoAmountController Start

    Route::get('/bo-amount', 'BoAmountController@boAmount');
    Route::post('/bo-amount-update', 'BoAmountController@boAmountUpdate');

// BoAmountController End


// Client Deposit Request Start

    Route::get('/client-deposit-request', 'DepositAdminController@clientDepositRequest');
    Route::get('/client-deposit-request-approved/{id}', 'DepositAdminController@clientDepositRequestApproved');

// Client Deposit Request End


// Withdraw Admin Start

    Route::get('/client-withdraw-request', 'WithdrawAdminController@clientWithdrawAdminRequest');
    Route::get('/client-withdraw-request-approved/{id}', 'WithdrawAdminController@clientWithdrawAdminRequestApproved');

// Withdraw Admin End


    // Share Admin Start

    Route::get('/add-share', 'ShareAdminController@addShare');
    Route::get('/get-share-price', 'ShareAdminController@getSharePrice');
    Route::post('/add-share-save', 'ShareAdminController@addShareSave');
    Route::get('/share-list', 'ShareAdminController@shareList');
    Route::get('/share-edit/{id}', 'ShareAdminController@shareEdit');
    Route::post('/share-update', 'ShareAdminController@shareUpdate');
    Route::get('/share-delete/{id}', 'ShareAdminController@shareDelete');

   // Share Admin End

    // ShareClientRequestAdminController Start

    Route::get('/client-share-buy-request', 'ShareClientRequestAdminController@cllientShareBuyRequest');
    Route::get('/client-share-buy-request-approved/{id}', 'ShareClientRequestAdminController@cllientShareBuyRequestApproved');
    Route::post('/client-share-buy-request-approved-submit', 'ShareClientRequestAdminController@cllientShareBuyRequestApprovedSubmit');

    Route::get('/client-share-sell-request', 'ShareClientRequestAdminController@cllientShareSellRequest');
    Route::get('/client-share-sell-request-approved/{id}', 'ShareClientRequestAdminController@cllientShareSellRequestApproved');
    Route::post('/client-share-sell-request-approved-submit', 'ShareClientRequestAdminController@cllientShareSellRequestApprovedSubmit');

// ShareClientRequestAdmincontroller End


    // AddAdminUserController

    Route::get('/new-user', 'AddAdminUserController@addNewUsers');
    Route::post('/add-user-registration', 'AddAdminUserController@addUserRegistration');
    Route::get('/user-list', 'AddAdminUserController@newRegistration');
    Route::get('/user-edit/{id}', 'AddAdminUserController@userEdit');
    Route::post('/user-update', 'AddAdminUserController@userUpdate');
    Route::get('/user-view/{id}', 'AddAdminUserController@userView');

    // Admin IPO Request Start

    Route::get('/new-ipo', 'IPOAdminController@newIPO');
    Route::post('/new-ipo-save', 'IPOAdminController@newIPOSave');
    Route::get('/ipo-list', 'IPOAdminController@ipoList');
    Route::get('/edit-ipo/{id}', 'IPOAdminController@editIpo');
    Route::post('/ipo-update', 'IPOAdminController@ipoUpdate');



    Route::get('/ipo-requests', 'IPOAdminController@ipoRequest');
    Route::get('/ipo-request-review/{id}', 'IPOAdminController@ipoRequestReview');
    Route::post('/ipo-request-review-approval', 'IPOAdminController@ipoRequestReviewApproval');

// Admin IPO Request End



    // XmlFileImportController

    Route::get('/traders-job', 'XmlFileImportController@tradersJob');
    Route::post('/traders-job-import', 'XmlFileImportController@tradersJobImport');
    Route::get('/eod-tickers', 'XmlFileImportController@eodTickers');
    Route::post('/eod-tickers-import', 'XmlFileImportController@eodTickersImport');

    // XmlfileImportController

    //XlFileImportController

    Route::get('/pe-ratio','XlController@peRatio');
    Route::post('/pe-ratio-save','XlController@peRatioSave');
    Route::get('/bonus-receivable','XlController@bonusReceivable');
    Route::post('/bonus-receivable','XlController@bonusReceivableSave');
    Route::get('/bonus-receivable','XlController@bonusReceivable');
    Route::get('/bonus','XlController@bonus');
    Route::post('/bonus','XlController@bonusSave');
    Route::get('/accrued-charge','XlController@accruedCharge');
    Route::post('/accrued-charge','XlController@accruedChargeSave');
    Route::get('/charge','XlController@charge');
    Route::post('/charge','XlController@chargeSave');

    //XlFileImportController

    //Margin Loan

    Route::get('/margin-loan-request', 'MarginLoanAdminController@marginLoanRequest');
    Route::get('/margin-loan-approved-list', 'MarginLoanAdminController@marginLoanApproved');
    Route::get('/margin-loan-request-edit/{id}', 'MarginLoanAdminController@marginLoanRequestEdit');
    Route::post('/margin-loan-update', 'MarginLoanAdminController@marginLoanRequestUpdate');

    //Margin Loan

    //Bo Account Change Request Approve

    Route::post('/update-bo-change-request', 'BoAccountAdminController@approveBoChangeRequest');

    //Bo Account Change Request Approve

    //PDF Generate
    Route::get('/pdf/admin-bo-account/{id}', 'BoAccountAdminController@pdfBoAccount');

});

// Admin Dashboard End

Route::get('/home', 'HomeController@index')->name('home');







