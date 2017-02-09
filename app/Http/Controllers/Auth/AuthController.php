<?php namespace App\Http\Controllers\Auth;
     
    use App\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Contracts\Auth\Guard;
     
    use App\Http\Requests\Auth\LoginRequest;
    use App\Http\Requests\Auth\RegisterRequest;
     
    class AuthController extends Controller {
     
        /**
         * the model instance
         * @var User
         */
        protected $user; 
        /**
         * The Guard implementation.
         *
         * @var Authenticator
         */
        protected $auth;
     
        /**
         * Create a new authentication controller instance.
         *
         * @param  Authenticator  $auth
         * @return void
         */
        public function __construct(Guard $auth, User $user)
        {
            $this->user = $user; 
            $this->auth = $auth;
     
            $this->middleware('guest', ['except' => ['getLogout']]); 
        }
     
        /**
         * Show the application registration form.
         *
         * @return Response
         */
        public function getRegister()
        {
            return view('asuransi.register');
        }
     
        /**
         * Handle a registration request for the application.
         *
         * @param  RegisterRequest  $request
         * @return Response
         */
        public function postRegister(RegisterRequest $request)
        {
    	    $this->user->nama = $request->nama;
    	    $this->user->username = $request->username;
		    $this->user->password = bcrypt($request->password);
		    $this->user->jenisKelamin = $request->jenisKelamin;
		    $this->user->ttl = $request->ttl;
		    $this->user->alamat = $request->alamat;
		    $this->user->no_tlp = $request->no_tlp;
		    $this->user->save();
            //code for registering a user goes here.
            $this->auth->login($this->user); 
            return redirect('/asuransi/member'); 
        }
     
        /**
         * Show the application login form.
         *
         * @return Response
         */
        public function getLogin()
        {
            return view('asuransi.login');
        }
     
        /**
         * Handle a login request to the application.
         *
         * @param  LoginRequest  $request
         * @return Response
         */
        public function postLogin(LoginRequest $request)
        {
            if ($this->auth->attempt($request->only('username', 'password')))
            {
                return redirect('/asuransi/member');
            }
     
            return redirect('/login')->withErrors([
                'username' => 'Username atau Password Salah',
            ]);
        }
     
        /**
         * Log the user out of the application.
         *
         * @return Response
         */
        public function getLogout()
        {
            $this->auth->logout();
     
            return redirect('/');
        }
     
    }