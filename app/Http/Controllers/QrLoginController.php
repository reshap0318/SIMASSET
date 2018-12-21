<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\user;
use Redirect;
use Carbon\Carbon;

class QrLoginController extends Controller
{
     public function qr1()
    {
    	//dd('berhasil');
    	return view('Auth.QrLogin');
    }

    public function qr2()
    {
    	return view('Auth.QrLogin2');
    }

    public function MyQrCode()
	{
		$user = Sentinel::getuser();
		$pemilik = 'saya';
		return view('backend.user.qrcode',compact('user','pemilik'));
	}

	public function UserQrCode($id)
	{
		$user = Sentinel::findById($id);
		//dd($user);
		$pemilik = 'bukan-saya';
		return view('backend.user.qrcode',compact('user','pemilik'));
	}

	public function checkUser(Request $request)
	{
		$result =0;
		if ($request->data)
		{
				if ($users = User::where('QRpassword',$request->data)->first())
				{
				    $result =1;
				    if ($user = Sentinel::authenticate($users))
					{

					    $carbon = Carbon::now();
					    $tgl = $carbon->day;
					    $now = $carbon->dayOfWeek;
					    $user = Sentinel::getUser();
					    $id = $user->id;
					    $waktu = $carbon->toTimeString();

					    //cekpiketsekarang
					    $piketsk = piket::where('hari',$now)->where('user_id',$id)->first();

					    //logika piket sekarang maka isi detail absen
					    if($piketsk){
					        //dd('anda piket sekarang');
					        //cek status absen sudah atau belum
					        $absendetail = piket_detail::where('piket_id',$piketsk->id)->whereday('tanggal',$tgl)->first();
					        //cek apakah disudah absen pagi
					        if($absendetail){
					            if(!$absendetail->akhir){
					                //dd('anda sudah absen pagi, tapi belum absen sore');
					                //cek waktu sudah jam 4 atau belum
					                if($waktu >= '16:00:00'){
					                    //dd('ada sudah absen pagi, dan sekarang sudah lewat pukul 4 sore');
					                    //jika sudah isi absen sore
					                    $absensore = $absendetail;
					                    $absensore->akhir = $waktu;
					                    $absensore->update();

					                }else{
					                    //dd('ada sudah absen pagi, dan sekarang Belum pukul 4 sore');
					                    //jika belum pergi ke dashbord langsung
					                }
					                //jika sudah lihat jam sekarang, kalau blm jam 4, tidak ada di apa apakan, jika sudah isi piket sore
					            }
					            $result =1;
					        }else{
					            //dd('ada Belum absen pagi');
					            //jika belum, lihat izin telat,
					            $izin = izin_piket::where('piket_id',$piketsk->id)->whereday('tanggal',$tgl)->first();

					            if($izin){
					                //dd('anda izin');
					                $waktu = Carbon::now();
					                $jamnow = Carbon::parse($izin->tenggang)->format('H');
					                $menitnow = Carbon::parse($izin->tenggang)->format('i');
					                $detiknow = Carbon::parse($izin->tenggang)->format('s');

					                $waktu = $waktu->subHours($jamnow);
					                $waktu = $waktu->subMinutes($menitnow);
					                $waktu = $waktu->subSeconds($detiknow);
					                $waktu = $waktu->toTimeString();

					                //jikadia izin telat, tambahkan waktu 09.00 dengan waktu izin
					                //cek apakah waktu sekarang besar dari waktu absen, //jika iya, denda
					                if($waktu >= '09:10:01'){
					                    //dd('Anda Telat dan tidak izin');
					                    $kenadenda = new denda;
					                    $kenadenda->user_id = $id;
					                    //pilihan denda
					                    if($waktu>='09:10:01' && $waktu <= '11:00:01'){
					                    //dd('Anda Telat dan tidak izin, Telat 1');
					                        $kenadenda->jenis_denda_id = 1;
					                        $kenadenda->keterangan = "Terlambat 2 Jam";
					                    }elseif($waktu>='11:00:01' && $waktu <= '13:00:01'){
					                    //dd('Anda Telat dan tidak izin, Telat 2');
					                        $kenadenda->jenis_denda_id = 2;
					                        $kenadenda->keterangan = "Terlambat 4 Jam";
					                    }elseif($waktu>='14:00:01' && $waktu <= '16:00:01'){
					                    //dd('Anda Telat dan tidak izin, Telat 3');
					                        $kenadenda->jenis_denda_id = 3;
					                        $kenadenda->keterangan = "Terlambat 6 Jam";
					                    }else{
					                    //dd('Anda Telat dan tidak izin, Telat 4');
					                        $kenadenda->jenis_denda_id = 4;
					                        $kenadenda->keterangan = "Terlambat 8 Jam(Tidak Hadir Piket)";
					                    }

					                    $kenadenda->save();
					                }
					                        //isi absen pagi
					            }else{
					                if($waktu >= '09:10:01'){
					                    //dd('Anda Telat dan tidak izin');
					                    $kenadenda = new denda;
					                    $kenadenda->user_id = $id;
					                    //pilihan denda
					                    if($waktu>='09:10:01' && $waktu <= '11:00:01'){
					                    //dd('Anda Telat dan tidak izin, Telat 1');
					                        $kenadenda->jenis_denda_id = 1;
					                        $kenadenda->keterangan = "Terlambat 2 Jam";
					                    }elseif($waktu>='11:00:01' && $waktu <= '13:00:01'){
					                    //dd('Anda Telat dan tidak izin, Telat 2');
					                        $kenadenda->jenis_denda_id = 2;
					                        $kenadenda->keterangan = "Terlambat 4 Jam";
					                    }elseif($waktu>='14:00:01' && $waktu <= '16:00:01'){
					                    //dd('Anda Telat dan tidak izin, Telat 3');
					                        $kenadenda->jenis_denda_id = 3;
					                        $kenadenda->keterangan = "Terlambat 6 Jam";
					                    }else{
					                    //dd('Anda Telat dan tidak izin, Telat 4');
					                        $kenadenda->jenis_denda_id = 4;
					                        $kenadenda->keterangan = "Terlambat 8 Jam(Tidak Hadir Piket)";
					                    }

					                    $kenadenda->save();
					                }
					            }

					            //dd('mengisi absen detail');
					            $lakukanabsen = new piket_detail;
					            $lakukanabsen->piket_id = $piketsk->id;
					            $lakukanabsen->mulai = $waktu;
					            $lakukanabsen->tanggal = now();
					            $lakukanabsen->save();

					             //jikadia tidak izintelat,
					                    //cek apakah waktu sekarang besar dari waktu absen
					                        //jika iya, denda
					                        //jikatidak, tidak denda
					                        //isi absen pagi
					        }
					    }
					   $result =1;
					}else{
					    $result =0;
					}

				 }else{
				 	$result =0;
				}
		}
		return $result;
	}

	public function QrAutoGenerate(Request $request)
	{
		$result=0;
		if ($request->action = 'updateqr') {
			$user = Sentinel::getUser();
			if ($user) {
				$qrLogin=bcrypt($user->personal_number.$user->email.str_random(40));
		        $user->QRpassword= $qrLogin;
		        $user->update();
		        $result=1;
			}

		}

        return $result;
	}
}
