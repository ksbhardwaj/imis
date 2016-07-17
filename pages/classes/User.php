<?php
class User {
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $isLoggedIn;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('sessions/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');

        if(!$user) {
            if(Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if($this->find($user)) {
                    $this->isLoggedIn = true;
                } else {
                    //Logout
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('users', $fields)) {
            throw new Exception('Sorry, there was a problem creating your account;');
        }
    }
	
	public function insert_personal_info($fields = array()) {
        if(!$this->_db->insert('personal_information', $fields)) {
            throw new Exception('Sorry, there was a problem in inserting infomration;');
        }
    }
	
	public function insert_jobs_availability($fields = array()) {
        if(!$this->_db->insert('jobs', $fields)) {
            throw new Exception('Sorry, there was a problem in inserting infomration;');
        }
    }
	public function insert_student_skills($fields = array()) {
        if(!$this->_db->insert('student_skills', $fields)) {
            throw new Exception('Sorry, there was a problem in inserting infomration;');
        }
    }
	
	public function update_personal_info($fields = array() , $id) {
        if(!$this->_db->update_personal_info('personal_information', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
	
	public function delete_personal_info($student_id) {
        if(!$this->_db->delete_info('personal_information', $student_id)) {
            throw new Exception('There was a problem deleting');
        }
    }
	
	public function insert_education_detail($fields = array()) {
        if(!$this->_db->insert('education_detail', $fields)) {
            throw new Exception('Sorry, there was a problem in inserting infomration;');
        }
    }
	
	public function insert_student_hired($fields = array()) {
        if(!$this->_db->insert('student_hired', $fields)) {
            throw new Exception('Sorry, there was a problem in inserting infomration;');
        }
    }
	
	public function update_education_info($fields = array() , $id) {
        if(!$this->_db->update_education_info('education_detail', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
	
	public function delete_education_info($education_id) {
        if(!$this->_db->delete_info_education('education_detail', $education_id)) {
            throw new Exception('There was a problem deleting');
        }
    }
	
	public function insert_work_info($fields = array()) {
        if(!$this->_db->insert('work_experience', $fields)) {
            throw new Exception('Sorry, there was a problem in inserting infomration;');
        }
    }
	
	public function insert_company_info($fields = array()) {
        if(!$this->_db->insert('company_information', $fields)) {
            throw new Exception('Sorry, there was a problem in inserting information;');
        }
    }
	
	public function update_company_info($fields = array() , $id) {
        if(!$this->_db->update_company_info('company_information', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
	
	public function update_work_info($fields = array() , $id) {
        if(!$this->_db->update_work_info('work_experience', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
	
	public function delete_company_info($company_id) {
        if(!$this->_db->delete_info_company('company_information', $company_id)) {
            throw new Exception('There was a problem deleting');
        }
    }
	
	public function delete_work_info($work_id) {
        if(!$this->_db->delete_info_work('work_experience', $work_id)) {
            throw new Exception('There was a problem deleting');
        }
    }
	
	public function view_record($fields = array()) {
        $data = $this->_db->get('personal_information', $fields);
		return $data;
	}
	
    public function update($fields = array(), $id = null) {

        if(!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }

        if(!$this->_db->update('users', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
	
	public function student_id($student_id = null) {
        if($student_id) {
            $field = (is_numeric($student_id)) ? 'id' : 'student_id';
            $data = $this->_db->get('personal_information', array($field, '=', $student_id));

            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
	}
	
    public function find($user = null) {
        if($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null, $remember = false) {
        if(!$username && !$password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($username);

            if ($user) {
                if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
                    Session::put($this->_sessionName, $this->data()->id);

                    if ($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                        if (!$hashCheck->count()) {
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }

                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }

                    return true;
                }
            }
        }
        return false;
    }

    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout() {
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data(){
        return $this->_data;
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }
}