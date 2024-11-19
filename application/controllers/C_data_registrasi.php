<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class c_data_registrasi extends CI_Controller{
 
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
        $data['title'] = "DATA REGISTRASI";
        $data['get_user'] = $this->m_master_data->get_user();
        $data['get_ak_all'] = $this->m_master_data->get_ak_all();
        $data['krl_master'] = $this->m_master_data->get_data('krl_master')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/data_registrasi/index',$data);
        // $this->load->view('SA_Super_Admin/data_registrasi/krl_master/desa/modal_insert',$data);
        $this->load->view('SA_Super_Admin/data_registrasi/modal_status',$data);
        $this->load->view('__footer');

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
        //$mail->SMTPDebug = 3;
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
               redirect(base_url().'c_data_registrasi/index');
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
               redirect(base_url().'c_data_registrasi/index');
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
               redirect(base_url().'c_data_registrasi/index');
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
           if($data2 > 0){
            $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Nasabah Sudah Terdaftar <i class="fa fa-uncheck"></i></div>');
            redirect(base_url().'c_data_registrasi/index');
          }else{
            if(!$mail->send()){
              $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Data Status Gagal Dirubah</div>');
             echo 'Mailer Error: ' . $mail->ErrorInfo;
          }else{
            $this->m_master_data->insert_data($data2,'nasabah');
            $this->m_master_data->update_data($where,$data,'registrasi');
            $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Status Berhasil Dirubah <i class="fa fa-check"></i></div>');
            redirect(base_url().'c_data_registrasi/index');
           }
            
          }
            
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
                redirect(base_url().'c_data_registrasi/index');
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
                redirect(base_url().'c_data_registrasi/index');
             }
           }
         
      }
     
      
     
  }
   
}