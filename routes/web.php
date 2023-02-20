<?php
use App\Models\CheckoutFasilitas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RevieController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PropertylistController;
use App\Http\Controllers\PropertytypeController;
use App\Http\Controllers\PropertyagentController;
use App\Http\Controllers\Detail_ruanganController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DatadetailruanganController;
use App\Http\Controllers\DetailRatingController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LaporanController;

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



Route::get('/contact',[ContactController::class,'index']);
 Route::get('/agent',[PropertyagentController::class,'index']);


 Route::get('/type',[PropertytypeController::class,'index']);

 Route::get('/review',[RevieController::class,'index']);
 
 
 Route::get('/about',[AboutController::class,'index']);

Route::get('/admin',[AdminController::class,'index'])->middleware(['auth', 'level:admin']);


Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'register']);

Route::group(['prefix'=>'dashbord','middleware'=>['login','level:admin']],function(){
   Route::get('/',[LoginController::class,'index']);
});
Route::resource('/data-detail_ruangan',DatadetailruanganController::class);
Route::get('/data-kategori/list/{kategori:id}', [KategoriController::class, 'list']);
Route::resource('/data-kategori',KategoriController::class);
Route::resource('/data-fasilitas',FasilitasController::class);


Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{id}',[Detail_ruanganController::class,'index']);
Route::get('/checkout/{id}',[CheckoutController::class,'index'])->middleware('auth');
Route::post('/checkout/{id}',[CheckoutController::class,'sewa'])->middleware('auth');


Route::get('/checkout/{id}/detail', [CheckoutController::class, 'detail'])->middleware('auth');

// Route::get('/list',[PropertylistController::class,'index']);
Route::get('/list/{id}',[PropertylistController::class,'index']);


Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);

Route::get('/pesanan/detail/{id}', [CheckoutController::class, 'detailAdmin'])->middleware(['auth','level:admin']);
Route::get('/pesanan/belum_dibayar', [CheckoutController::class, 'belum_dibayar'])->middleware(['auth','level:admin']);
Route::get('/pesanan/pembayaran_berhasil', [CheckoutController::class, 'pembayaran_berhasil'])->middleware(['auth','level:admin']);
Route::get('/pesanan/pembayaran_gagal', [CheckoutController::class, 'pembayaran_gagal'])->middleware(['auth','level:admin']);

Route::get('/profile-user',[ProfileController::class,'index'])->middleware('auth');
Route::post('/profile-user',[ProfileController::class,'update'])->middleware('auth');

Route::get('/pesanan-user',[PesananController::class,'index'])->middleware('auth');

Route::post('/rating-star',[DetailRatingController::class,'index'])->middleware('auth');
Route::get('/rating-detail',[RatingController::class,'index'])->middleware(['auth','level:admin']);
Route::post('/komentar',[KomentarController::class,'simpanKomentar'])->middleware('auth');
Route::get('/komentar-admin',[KomentarController::class,'komentarAdmin'])->middleware(['auth','level:admin']);

Route::get('/laporan',[LaporanController::class,'index']);
Route::post('/laporan',[LaporanController::class,'cetak']);