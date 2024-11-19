<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class c_user extends CI_Controller{
 
	function __construct(){
		parent::__construct();
        require APPPATH.'libraries/phpmailer/src/Exception.php';
        require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH.'libraries/phpmailer/src/SMTP.php';
        $this->load->model('m_master_data');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        
	
		if($this->session->userdata('status') != "Draft"){
			redirect(base_url("Login"));
		}
		
	}
    function index(){
     
        $data['title'] = "DATA USER";
        $data['get_user'] = $this->m_master_data->get_user();
        $data['get_ak_all'] = $this->m_master_data->get_ak_all();
        $data['krl_master'] = $this->m_master_data->get_data('krl_master')->result();
        $this->load->view('__header');
        if($this->session->userdata('user_level') == 'SA_SuperAdmin'){
        $this->load->view('SA_Super_Admin/user_management/index',$data);
        $this->load->view('SA_Super_Admin/user_management/modal_insert',$data);
        $this->load->view('SA_Super_Admin/user_management/modal_edit',$data);
        $this->load->view('SA_Super_Admin/user_management/modal_status',$data);
      }elseif($this->session->userdata('user_level') == 'AK_AdminKec'){
        $this->load->view('AK_AdminKec/user_management/index',$data);
        $this->load->view('AK_AdminKec/user_management/modal_insert',$data);
        $this->load->view('AK_AdminKec/user_management/modal_edit',$data);
        $this->load->view('AK_AdminKec/user_management/modal_status',$data);
      }elseif($this->session->userdata('user_level') == 'AB_AdminBank'){
        $this->load->view('AB_AdminBank/user_management/index',$data);
        $this->load->view('AB_AdminBank/user_management/modal_insert',$data);
        $this->load->view('AB_AdminBank/user_management/modal_edit',$data);
        $this->load->view('AB_AdminBank/user_management/modal_status',$data);
      }else{
        $this->load->view('U_User/user_management/index',$data);
        $this->load->view('U_User/user_management/modal_insert',$data);
        $this->load->view('U_User/user_management/modal_edit',$data);
        $this->load->view('U_User/user_management/modal_status',$data);
       
      }
      $this->load->view('__footer');

    }
    

    function insert(){
        $nama = $this->input->post('nama');
        $user_name = $this->input->post('user_name');
        $status = $this->input->post('status');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $krl_id = $this->input->post('krl_id');
        $user_level = $this->input->post('user_level');
        $no_hp = $this->input->post('no_hp');
        $attachement_file		=$_FILES['attachement_file'];
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|mp4';
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('attachement_file')){
            echo "Upload Gagal"; die();
            $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data User Gagal Disimpan</div>');
            redirect(base_url().'c_user/index');
        }else{
            $attachement_file=$this->upload->data('file_name');
            $data = array(
                'registrasi_id' => '',
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $no_hp,
                'status' => $status,
                'krl_id' => $krl_id,
                'user_id' => $krl_id,
                'user_level' => $user_level,
                'user_name' => $user_name,
                'password' => md5($password),
                'attachement_file' => $attachement_file,
    
            );
            $this->m_master_data->insert_data($data,'registrasi');
            $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data User Berhasil Disimpan <i class="fa fa-check"></i></div>');
            redirect(base_url().'c_user/index');

        }

    }
    function edit($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $attachement_file		=$_FILES['attachement_file'];
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|mp4';
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('attachement_file')){
            echo "Upload Gagal"; die();
            
        }else{
            $attachement_file=$this->upload->data('file_name');

        }

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp,
            'status' => $status,
            'krl_id' => $krl_id,
            'user_id' => $krl_id,
            'user_name' => $user_name,
            'password' => $password,
            'attachement_file' => $attachement_file,

        );
        $this->m_master_data->update_data($where,$data,'registrasi');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data User Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_user/index');
    }
    function delete($registrasi_id)
	{
		$where = array('registrasi_id' => $registrasi_id);
		$this->m_master_data->delete_data($where,'registrasi');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data User Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_user/index');
	}
 
    
    function edit_status($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $user_level = $this->input->post('user_level');
        $nama = $this->input->post('nama');
        $user_name = $this->input->post('user_name');
        $status = $this->input->post('status');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kurniawan.saepudin21@gmail.com'; // user email anda
        $mail->Password = 'agysutsfdzhupeky'; // diisi dengan App Password yang sudah di generate
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('kurniawan.saepudin21@gmail.com', 'BankSampah.id'); // user email anda
        $mail->addReplyTo('kurniawan.saepudin21@gmail.com', ''); //user email anda

        // Email subject
          $mail->Subject = 'Informasi Status Akun Anda | BankSampah.id'; //subject email

        // Add a recipient
        $mail->addAddress($email); //email tujuan pengiriman email

        // Set email format to HTML
        $mail->isHTML(true);
        if($user_level == 'SA_SuperAdmin'){
          $data = array(
              'status' => $status,
           );
           $mailContent = "<div class='row' >
           <div class='col-lg-12'>
           <p><img  src='https://arkanmedical.id/alkes/assets/images/BANK.jpg'  style='width:150px; display:block; margin:auto;' ></p>
           </div>
           </div>
           <hr style='color:green'>
   
           <p>Assalamualaikum Warahmatullahi Wabarakatuh</p>
           <p>Hai <b>".$nama."</b>, Selamat datang di Bank Sampah<br>
           Berikut kami sampaikan nama pengguna dan kata sandi untuk login ke www.banksampah.id</p>
           <table>
             <tr>
               <td>Nama</td>
               <td>:</td>
               <td>".$nama."</td>
             </tr>
             <tr>
               <td>Username</td>
               <td>:</td>
               <td>".$user_name."</td>
             </tr>
             <tr>
               <td>Password</td>
               <td>:</td>
               <td>".$password."</td>
             </tr>
             <tr>
               <td>Status Akun</td>
               <td>:</td>
               <td><span>".$status."</span></td>
             </tr>
           </table>
           <br>
                   <p> Silahkan masuk dan lengkapi data diri, serta unggah dokumen yang di perlukan, Harap Mengisi data dengan sebenar-benarnya.<br>
           Jika ada pertanyaan lain silahkan hubungi call center kami <b>WhatsApp : 08872751255</b></p>
           <p>Salam, <br>
         Customer Service<br>
         www.banksampah.id</p>
         <p style='font-style:italic;'><b>Note:</b> Harap tidak membalas email ini, untuk informasi lebih lanjut bisa hubungi nomor call center.</p>
         <hr style='color:green'>"; // isi email
           $mail->Body = $mailContent;
          // Send email
            if(!$mail->send()){
               $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Status Gagal Dirubah</div>');
              echo 'Mailer Error: ' . $mail->ErrorInfo;
           }else{
               $this->m_master_data->update_data($where,$data,'registrasi');
           
               $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Status Berhasil Dirubah <i class="fa fa-check"></i></div>');
               redirect(base_url().'c_user/index');
            }
      }elseif($user_level == 'AB_AdminBank'){
          $data = array(
              'status' => $status,
           );
           $mailContent = "<div class='row' >
           <div class='col-lg-12'>
           <p><img  src='https://arkanmedical.id/alkes/assets/images/BANK.jpg'  style='width:150px; display:block; margin:auto;' ></p>
           </div>
           </div>
           <hr style='color:green'>
   
           <p>Assalamualaikum Warahmatullahi Wabarakatuh</p>
           <p>Hai <b>".$nama."</b>, Selamat datang di Bank Sampah<br>
           Berikut kami sampaikan nama pengguna dan kata sandi untuk login ke www.banksampah.id</p>
           <table>
             <tr>
               <td>Nama</td>
               <td>:</td>
               <td>".$nama."</td>
             </tr>
             <tr>
               <td>Username</td>
               <td>:</td>
               <td>".$user_name."</td>
             </tr>
             <tr>
               <td>Password</td>
               <td>:</td>
               <td>".$password."</td>
             </tr>
             <tr>
               <td>Status Akun</td>
               <td>:</td>
               <td><span>".$status."</span></td>
             </tr>
           </table>
           <br>
                   <p> Silahkan masuk dan lengkapi data diri, serta unggah dokumen yang di perlukan, Harap Mengisi data dengan sebenar-benarnya.<br>
           Jika ada pertanyaan lain silahkan hubungi call center kami <b>WhatsApp : 08872751255</b></p>
           <p>Salam, <br>
         Customer Service<br>
         www.banksampah.id</p>
         <p style='font-style:italic;'><b>Note:</b> Harap tidak membalas email ini, untuk informasi lebih lanjut bisa hubungi nomor call center.</p>
         <hr style='color:green'>"; // isi email
           $mail->Body = $mailContent;
          // Send email
            if(!$mail->send()){
               $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Status Gagal Dirubah</div>');
              echo 'Mailer Error: ' . $mail->ErrorInfo;
           }else{
               $this->m_master_data->update_data($where,$data,'registrasi');
           
               $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Status Berhasil Dirubah <i class="fa fa-check"></i></div>');
               redirect(base_url().'c_user/index');
            }
      }elseif($user_level=='AK_AdminKec'){
          $data = array(
              'status' => $status,
           );
           $mailContent = "<div class='row' >
           <div class='col-lg-12'>
           <p><img  src='https://arkanmedical.id/alkes/assets/images/BANK.jpg'  style='width:150px; display:block; margin:auto;' ></p>
           </div>
           </div>
           <hr style='color:green'>
   
           <p>Assalamualaikum Warahmatullahi Wabarakatuh</p>
           <p>Hai <b>".$nama."</b>, Selamat datang di Bank Sampah<br>
           Berikut kami sampaikan nama pengguna dan kata sandi untuk login ke www.banksampah.id</p>
           <table>
             <tr>
               <td>Nama</td>
               <td>:</td>
               <td>".$nama."</td>
             </tr>
             <tr>
               <td>Username</td>
               <td>:</td>
               <td>".$user_name."</td>
             </tr>
             <tr>
               <td>Password</td>
               <td>:</td>
               <td>".$password."</td>
             </tr>
             <tr>
               <td>Status Akun</td>
               <td>:</td>
               <td><span>".$status."</span></td>
             </tr>
           </table>
           <br>
                   <p> Silahkan masuk dan lengkapi data diri, serta unggah dokumen yang di perlukan, Harap Mengisi data dengan sebenar-benarnya.<br>
           Jika ada pertanyaan lain silahkan hubungi call center kami <b>WhatsApp : 08872751255</b></p>
           <p>Salam, <br>
         Customer Service<br>
         www.banksampah.id</p>
         <p style='font-style:italic;'><b>Note:</b> Harap tidak membalas email ini, untuk informasi lebih lanjut bisa hubungi nomor call center.</p>
         <hr style='color:green'>"; // isi email
           $mail->Body = $mailContent;
          // Send email
            if(!$mail->send()){
               $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Status Gagal Dirubah</div>');
              echo 'Mailer Error: ' . $mail->ErrorInfo;
           }else{
               $this->m_master_data->update_data($where,$data,'registrasi');
           
               $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Status Berhasil Dirubah <i class="fa fa-check"></i></div>');
               redirect(base_url().'c_user/index');
            }
          }else{
          $data = array(
              'status' => $status,
           );
          $data2 = array(
              'nasabah_id' => "",
              'nasabah_nama' => $nama,
              'registrasi_id' => $registrasi_id,
           );
           if($status == 'Aktif'){
            $mailContent = "<div class='row' >
            <div class='col-lg-12'>
            <p><img  src='https://arkanmedical.id/alkes/assets/images/BANK.jpg'  style='width:150px; display:block; margin:auto;' ></p>
            </div>
            </div>
            <hr style='color:green'>
    
            <p>Assalamualaikum Warahmatullahi Wabarakatuh</p>
            <p>Hai <b>".$nama."</b>, Selamat datang di Bank Sampah<br>
            Berikut kami sampaikan nama pengguna dan kata sandi untuk login ke www.banksampah.id</p>
            <table>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td>".$nama."</td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td>".$user_name."</td>
              </tr>
              <tr>
                <td>Password</td>
                <td>:</td>
                <td>".$password."</td>
              </tr>
              <tr>
                <td>Status Akun</td>
                <td>:</td>
                <td><span style='color:green;'>".$status."</span></td>
              </tr>
            </table>
            <br>
                    <p> Silahkan masuk dan lengkapi data diri, serta unggah dokumen yang di perlukan, Harap Mengisi data dengan sebenar-benarnya.<br>
            Jika ada pertanyaan lain silahkan hubungi call center kami <b>WhatsApp : 08872751255</b></p>
            <p>Salam, <br>
          Customer Service<br>
          www.banksampah.id</p>
          <p style='font-style:italic;'><b>Note:</b> Harap tidak membalas email ini, untuk informasi lebih lanjut bisa hubungi nomor call center.</p>
          <hr style='color:green'>"; // isi email
            $mail->Body = $mailContent;
           // Send email
          //  if($data2 > 0){
          //   $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Nasabah Sudah Terdaftar <i class="fa fa-uncheck"></i></div>');
          //   redirect(base_url().'c_user/index');
          // }else{
            $cek = $this->db->query("SELECT * FROM nasabah where registrasi_id='".$registrasi_id."'");
            if ($cek->num_rows()>=1){
              $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Status Sudah Terdaftar Sebagai Nasabah</div>');
              redirect(base_url().'c_user/index');
            }else{
              if(!$mail->send()){
                $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Status Gagal Dirubah</div>');
               echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
              
              $this->m_master_data->insert_data($data2,'nasabah');
              $this->m_master_data->update_data($where,$data,'registrasi');
              $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Status Berhasil Dirubah <i class="fa fa-check"></i></div>');
              redirect(base_url().'c_user/index');
             }
            }
           
            
          // }
            
           }elseif($status == 'Expered'){
            $mailContent = "<div class='row' >
            <div class='col-lg-12'>
            <p><img  src='https://arkanmedical.id/alkes/assets/images/BANK.jpg'  style='width:150px; display:block; margin:auto;' ></p>
            </div>
            </div>
            <hr style='color:green'>
    
            <p>Assalamualaikum Warahmatullahi Wabarakatuh</p>
            <p>Hai <b>".$nama."</b>, Warga Bank Sampah<br>
            Berikut kami sampaikan status informasi nama pengguna untuk login ke www.banksampah.id</p>
            <table>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td>".$nama."</td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td>".$user_name."</td>
              </tr>
              <tr>
                <td>Status Akun</td>
                <td>:</td>
                <td><span style='color:red;'>".$status."</span></td>
              </tr>
            </table>
            <br>
                    <p> Status Akun anda sudah Expired<br>
            Jika ingin meng-aktifkan kembali silahkan hubungi call center kami <b>WhatsApp : 08872751255</b></p>
            <p>Salam, <br>
          Customer Service<br>
          www.banksampah.id</p>
          <p style='font-style:italic;'><b>Note:</b> Harap tidak membalas email ini, untuk informasi lebih lanjut bisa hubungi nomor call center.</p>
          <hr style='color:green'>"; // isi email
            $mail->Body = $mailContent;
           // Send email
             if(!$mail->send()){
                $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Status Gagal Dirubah</div>');
               echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                $this->m_master_data->update_data($where,$data,'registrasi');
            
                $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Status Berhasil Dirubah <i class="fa fa-check"></i></div>');
                redirect(base_url().'c_user/index');
             }
           }else{
            $mailContent = "<div class='row' >
            <div class='col-lg-12'>
            <p><img  src='https://arkanmedical.id/alkes/assets/images/BANK.jpg'  style='width:150px; display:block; margin:auto;' ></p>
            </div>
            </div>
            <hr style='color:green'>
    
            <p>Assalamualaikum Warahmatullahi Wabarakatuh</p>
            <p>Hai <b>".$nama."</b>, Selamat datang di Bank Sampah<br>
            Berikut kami sampaikan nama pengguna dan kata sandi untuk login ke www.banksampah.id</p>
            <table>
              <tr>
                <td>Nama</td>
                <td>:</td>111
                <td>".$nama."</td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td>".$user_name."</td>
              </tr>
              <tr>
                <td>Password</td>
                <td>:</td>
                <td>".$password."</td>
              </tr>
              <tr>
                <td>Status Akun</td>
                <td>:</td>
                <td><span>".$status."</span></td>
              </tr>
            </table>
            <br>
                    <p> Silahkan masuk dan lengkapi data diri, serta unggah dokumen yang di perlukan, Harap Mengisi data dengan sebenar-benarnya.<br>
            Jika ada pertanyaan lain silahkan hubungi call center kami <b>WhatsApp : 08872751255</b></p>
            <p>Salam, <br>
          Customer Service<br>
          www.banksampah.id</p>
          <p style='font-style:italic;'><b>Note:</b> Harap tidak membalas email ini, untuk informasi lebih lanjut bisa hubungi nomor call center.</p>
          <hr style='color:green'>"; // isi email
            $mail->Body = $mailContent;
           // Send email
             if(!$mail->send()){
                $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Status Gagal Dirubah</div>');
               echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                $this->m_master_data->update_data($where,$data,'registrasi');
            
                $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Status Berhasil Dirubah <i class="fa fa-check"></i></div>');
                redirect(base_url().'c_user/index');
             }
           }
         
      }
     
      
     
  }
    
    function v_detail($registers_id){
        $data['get_user'] = $this->m_master_data->get_user_detail($registers_id);
        $data['krl_master'] = $this->m_master_data->get_data('krl_master')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/user_management/detail/detail',$data);
        $this->load->view('SA_Super_Admin/user_management/detail/m_edit',$data);
        $this->load->view('__footer');
    }
    function edit_nasabah_nama($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $nasabah_nama = $this->input->post('nasabah_nama');
        $data = array(
            'nasabah_nama' => $nasabah_nama,
        );
        $this->m_master_data->update_data($where,$data,'nasabah');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Nama Nasabah Berhasil Dirubah</div>');
        redirect(base_url().'c_user/v_detail/'.$registrasi_id);
    }
    function edit_alamat_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $alamat_jl = $this->input->post('alamat_nasabah');
        $data = array(
            'alamat_jl' => $alamat_jl,
        );
        $this->m_master_data->update_data($where,$data,'nasabah');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Alamat Nasabah Berhasil Dirubah</div>');
        redirect(base_url().'c_user/v_detail/'.$registrasi_id);
    }
    function edit_krl_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $krl_id = $this->input->post('krl_id');
        $data = array(
            'krl_id' => $krl_id,
        );
        $this->m_master_data->update_data($where,$data,'registrasi');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">KRL Nasabah Berhasil Dirubah</div>');
        redirect(base_url().'c_user/v_detail/'.$registrasi_id);
    }
    function edit_email_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $email = $this->input->post('email');
        $data = array(
            'email' => $email,
        );
        $this->m_master_data->update_data($where,$data,'registrasi');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Email Nasabah Berhasil Dirubah</div>');
        redirect(base_url().'c_user/v_detail/'.$registrasi_id);
    }
    function edit_file_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        
        $attachement_file		=$_FILES['attachement_file'];
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|mp4';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('attachement_file')){
            echo "Upload Gagal"; die();
            
        }else{
            $attachement_file=$this->upload->data('file_name');
            $data = array(
                'attachement_file' => $attachement_file,
            );
            $this->m_master_data->update_data($where,$data,'registrasi');
            $this->session->set_flashdata('alert_1', '<div class="alert alert-success">File Pendukung Nasabah Berhasil Dirubah</div>');
            redirect(base_url().'c_user/v_detail/'.$registrasi_id);

        }
       
    }
    function edit_photo_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        
        $photo_path		=$_FILES['photo_path'];
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|mp4';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('photo_path')){
            echo "Upload Gagal"; 
            $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Photo Nasabah Berhasil Dirubah</div>');
            redirect(base_url().'c_user/v_detail/'.$registrasi_id);
            die();
            
        }else{
            $photo_path=$this->upload->data('file_name');
            $data = array(
                'photo_path' => $photo_path,
            );
            $this->m_master_data->update_data($where,$data,'nasabah');
            $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Photo Nasabah Berhasil Dirubah</div>');
            redirect(base_url().'c_user/v_detail/'.$registrasi_id);

        }
       
    }
   
}