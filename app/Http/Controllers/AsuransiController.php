<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use DB;
use App\User;
use App\Permintaan;
use App\Setoran;
use App\Kritik;
use Illuminate\Http\Request;

class AsuransiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('asuransi.home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function asuransi()
	{
		return view('asuransi.home');
	}

	public function about()
	{
		return view('asuransi.about');
	}

	public function post()
	{
		return view('asuransi.post');
	}

	public function contact()
	{
		return view('asuransi.contact');
	}

	public function contactsave()
	{
		$post = new Kritik;
		$post->nama = \Input::get('nama');
		$post->email = \Input::get('email');
		$post->pilihan = \Input::get('pilihan');
		$post->isi = \Input::get('isi');

		$post->save();
		return redirect(url());
	}

	public function register()
	{
		return view('asuransi.register');
	}

	public function login()
	{
		return view('asuransi.login');
	}



			// Member //

	public function memberindex()
	{
		$users = DB::table('users')->where('type','user')->count();
		$users2 = DB::table('users')->where('type','admin')->count();
		return view('asuransi.member.home')->with('users', $users)->with('users2',$users2);
	}

	public function memberforms()
	{
		return view('asuransi.member.forms');
	}

	public function memberlist()
	{

		$data = array('data'=>User::all());
		return view('asuransi.member.list')->with($data);
	}

	public function memberlistreport()
	{
		$no = 1;
		$pdf = DB::select('select *from users');
		$html = view('asuransi.member.listreport')->with('pdf',$pdf)->with('no',$no);
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($html->render())->setPaper('a4')->setOrientation('potrait')->setWarnings(false);
		return $pdf->stream();

		// $data1 = array('data1'=>\App\User::all());

		// if(!empty($data1)){
		// 	$data = array('data'=>\App\User::all());
		// 	$pdf = \PDF::loadView('asuransi.member.listreport', $data);
		// 	return $pdf->stream();
			
		// }else{
		// 	return redirect(url());
		// }
	}

	public function membertableshow($id)
	{
		$data = array('data'=>User::find($id));
		return view('asuransi.member.detail')->with($data);
	}

	public function memberedit($id)
	{
		$data = array('data'=>User::find($id));
		return view('asuransi.member.edit')->with($data);
	}

	public function memberdelete($id)
	{
		User::find($id)->delete();

		return redirect(url('/asuransi/member/list'));
	}

	public function memberupdate()
	{
		$data = array(
			'nama' => \Input::get('nama'),
			'jenisKelamin' => \Input::get('jenisKelamin'),
			'ttl' => \Input::get('ttl'),
			'alamat' => \Input::get('alamat'),
			'no_tlp' => \Input::get('no_tlp'),
		);
		\DB::table('users')->where('id', \Input::get('id'))->update($data);
		return redirect(url('/asuransi/member/list'));
	}

	public function membersetting()
	{
		return view('asuransi.member.setting');
	}

	public function membersettingedit($id)
	{
		$data = array('data'=>User::find($id));
		return view('asuransi.member.settingedit')->with($data);
	}

	public function membersettingupdate()
	{
		$data = array(
			'nama' => \Input::get('nama'),
			'jenisKelamin' => \Input::get('jenisKelamin'),
			'ttl' => \Input::get('ttl'),
			'alamat' => \Input::get('alamat'),
			'no_tlp' => \Input::get('no_tlp'),
		);
		\DB::table('users')->where('id', \Input::get('id'))->update($data);
		return redirect(url('/asuransi/member/setting'));
	}

	public function memberpermintaan()
	{
		return view('asuransi.member.permintaan');
	}

	public function memberpermintaansave()
	{
		$post = new Permintaan;
		$post->username = \Input::get('username');
		$post->nama_nasabah = \Input::get('nama_nasabah');
		$post->no_rek = \Input::get('no_rek');
		$post->jenis_rek = \Input::get('jenis_rek');
		$post->alamat = \Input::get('alamat');
		$post->penerima_faedah = \Input::get('penerima_faedah');
		$post->jml_permintaan = \Input::get('jml_permintaan');

		$post->save();
		return redirect(url('/asuransi/member/history/permintaan'));
	}

	public function memberhistorypermintaan()
	{
		$data = array('data'=>Permintaan::all());
		return view('asuransi.member.historypermintaan')->with($data);
	}

	public function membersetoran()
	{
		return view('asuransi.member.setoran');
	}

	public function membersetoransave()
	{
		$post = new Setoran;
		$post->username = \Input::get('username');
		$post->nama_nasabah = \Input::get('nama_nasabah');
		$post->no_rek = \Input::get('no_rek');
		$post->jenis_rek = \Input::get('jenis_rek');
		$post->jml_setoran = \Input::get('jml_setoran');

		$post->save();
		return redirect(url('/asuransi/member/history/setoran'));
	}

	public function memberhistorysetoran()
	{
		$data = array('data'=>Setoran::all());
		return view('asuransi.member.historysetoran')->with($data);
	}

	public function memberhistoripermintaan()
	{
		$data = array('data'=>Permintaan::all());
		return view('asuransi.member.historipermintaan')->with($data);
	}

	public function memberpengeluaranreport()
	{
		$no = 1;
		$pdf = DB::select('select *from permintaans');
		$jumlah = DB::select('select sum(jml_permintaan) as jumlah from permintaans where status=?', ['Terkirim']);
		$html = view('asuransi.member.pengeluaranreport')->with('pdf',$pdf)->with('jumlah',$jumlah)->with('no',$no);
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($html->render())->setPaper('a4')->setOrientation('potrait')->setWarnings(false);
		return $pdf->stream();
	}

	public function memberhistoripermintaanedit($id)
	{
		$data = array('data'=>Permintaan::find($id));
		return view('asuransi.member.historipermintaanedit')->with($data);
	}

	public function memberhistoripermintaanupdate()
	{
		$data = array(
			'status' => \Input::get('status'),
		);
		\DB::table('permintaans')->where('id', \Input::get('id'))->update($data);
		return redirect(url('/asuransi/member/histori/permintaan'));
	}

	public function memberhistorisetoran()
	{
		$data = array('data'=>Setoran::all());
		return view('asuransi.member.historisetoran')->with($data);
	}

	public function memberpemasukanreport()
	{
		$no = 1;
		$pdf = DB::select('select *from setorans');
		$jumlah = DB::select('select sum(jml_setoran) as jumlah from setorans where status=?', ['Sudah Terkirim']);
		$html = view('asuransi.member.pemasukanreport')->with('pdf',$pdf)->with('jumlah',$jumlah)->with('no',$no);
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($html->render())->setPaper('a4')->setOrientation('potrait')->setWarnings(false);
		return $pdf->stream();
	}

	public function memberhistorisetoranedit($id)
	{
		$data = array('data'=>Setoran::find($id));
		return view('asuransi.member.historisetoranedit')->with($data);
	}

	public function memberhistorisetoranupdate()
	{
		$data = array(
			'status' => \Input::get('status'),
		);
		\DB::table('setorans')->where('id', \Input::get('id'))->update($data);
		return redirect(url('/asuransi/member/histori/setoran'));
	}

	public function memberhistorikritiksaran()
	{
		$data = array('data'=>Kritik::all());
		return view('asuransi.member.historikritiksaran')->with($data);
	}

	public function memberhistorikritik()
	{
		$data = array('data'=>Kritik::all());
		return view('asuransi.member.historikritik')->with($data);
	}

	public function memberhistorisaran()
	{
		$data = array('data'=>Kritik::all());
		return view('asuransi.member.historisaran')->with($data);
	}

	public function memberhistoridetail($id)
	{
		$data = array('data'=>Kritik::find($id));
		return view('asuransi.member.detailhistorikritiksaran')->with($data);
	}

	public function memberhistoridetaildelete($id)
	{
		Kritik::find($id)->delete();

		return redirect(url('/asuransi/member/histori/kritik-saran'));
	}

}
