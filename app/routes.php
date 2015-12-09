<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'DistrictController@listDistricts');
Route::get('/districts', 'DistrictController@listDistricts');
Route::post('/districts', 'DistrictController@saveDistrict');
Route::get('/districts/{id}', 'DistrictController@showDistrict');
Route::post('/districts/{id}/delete', 'DistrictController@deleteDistrict');
Route::post('/districts/{id}', 'DistrictController@updateDistrict');

Route::post('/districts/{id}/subdivs', 'SubdivController@saveSubdiv');
Route::get('/districts/{distId}/subdivs/{id}', 'SubdivController@showSubdiv');
Route::post('/districts/{distId}/subdivs/{id}', 'SubdivController@updateSubdiv');
Route::post('/districts/{distId}/subdivs/{id}/delete', 'SubdivController@deleteSubdiv');

Route::post('/districts/{distId}/subdivs/{subdivId}/circles', 'CircleController@saveCircle');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}', 'CircleController@showCircle');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}', 'CircleController@updateCircle');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/delete', 'CircleController@deleteCircle');

Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas', 'MouzaController@saveMouza');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}', 'MouzaController@showMouza');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}', 'MouzaController@updateMouza');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/delete', 'MouzaController@deleteMouza');

Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots', 'LotController@saveLot');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}', 'LotController@showLot');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}', 'LotController@updateLot');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/delete', 'LotController@deleteLot');

Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages', 'VillageController@saveVillage');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}', 'VillageController@showVillage');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}', 'VillageController@updateVillage');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/delete', 'VillageController@deleteVillage');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/rates', 'VillageController@saveRate');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/rates/{rateId}', 'VillageController@updateRate');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/rates/{rateId}', 'VillageController@showRate');

Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details', 'DetailController@saveDetail');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}', 'DetailController@showDetail');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}', 'DetailController@updateDetail');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/delete', 'DetailController@deleteDetail');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/split', 'DetailController@splitDetail');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/merge', 'DetailController@mergeDetail');

Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/pattadars/{pattadarId}', 'PattadarController@showPattadar');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/pattadars', 'PattadarController@savePattadar');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/pattadars/{pattadarId}', 'PattadarController@updatePattadar');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/pattadars/{pattadarId}/delete', 'PattadarController@deletePattadar');

Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailsId}/awards', 'AwardController@saveAward');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/awards/{awardId}', 'AwardController@showAward');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/awards/{awardId}', 'AwardController@updateAward');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/awards/{awardId}/delete', 'AwardController@deleteAward');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/award/insert', 'AwardController@insertAward');

Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/awards/{awardId}/posessors/{posessorId}', 'PosessorController@showPosessor');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/awards/{awardId}/posessors', 'PosessorController@savePosessor');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/awards/{awardId}/posessors/{posessorId}', 'PosessorController@updatePosessor');
Route::post('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/details/{detailId}/awards/{awardId}/posessors/{posessorId}/delete', 'PosessorController@deletePosessor');

Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/detailsReport', 'ReportController@showDetails');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/estimateReport', 'ReportController@showEstimate');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/draftAward', 'ReportController@showDraftAward');
Route::get('/districts/{distId}/subdivs/{subdivId}/circles/{circleId}/mouzas/{mouzaId}/lots/{lotId}/villages/{villageId}/finalAward', 'ReportController@showFinalAward');

Route::get('/{number}/words','ReportController@convert_number_to_words');