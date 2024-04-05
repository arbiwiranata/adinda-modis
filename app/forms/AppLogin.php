<?php

class AppLogin extends Form {
    public $username;
	public $password;
    public $rememberMe = true;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */

    public function getForm() {
        return array (
            'title' => 'Login',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                    ),
                ),
            ),
        );
    }

    public function getFields() {
        return array (
            array (
                'type' => 'Text',
                'value' => '<style>
	.login-page {
		background-image: url(\"app/static/img/img-login.png\");
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center; 
	}
</style>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class=\"outer login-page\">
	<div class=\"middle\">
		<div class=\"inner\">
			<div class=\"text-center\">
				<h1 class=\"grandstander-9 teks-75\"><span class=\"teks-biru\">ADINDA</span> <span class=\"teks-merah\">MODIS</span></h1>
				<h1 class=\"grandstander-9 teks-60 teks-hijau\">Login</h1>
				<div class=\"p-5\">
					<input type=\"\" class=\"input-1\" name=\"AppLogin[username]\" placeholder=\"Username\">
					<input type=\"password\" class=\"input-1 mt-4\" name=\"AppLogin[password]\" placeholder=\"Password\">
					<button class=\"button button-biru mt-4\" ng-click=\"form.submit()\"><i class=\"fa-solid fa-right-to-bracket\"></i> Masuk</button>
				</div>
				<div class=\"text-center\">
					<small class=\"montserrat-4 teks-20 teks-abu\">&copy; Dinas Komunikasi dan Informatika Kabupaten Sidoarjo 2023</small><br>
					<small class=\"montserrat-4 teks-20 teks-abu\">Image by <a href=\"https://www.freepik.com/\">Freepik</a></small>
				</div>
			</div>
		</div>
	</div>
</div>',
            ),
        );
    }
    
    public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'username' => 'NIP',
			'password' => 'Password'
        );
    }

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate()){
		        $this->addError('password', 'NIP atau Password salah.');
			}
        }
	}
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
            // $record = User::model()->find(['condition' => 'UPPER(username) = UPPER(\''.$this->username.'\')']);
            // $this->_identity->loggedIn($record);
			$this->_identity->authenticate();
        }
        
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}

}