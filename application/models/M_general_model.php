<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_general_model extends CI_Model 
{
	
	// --------------------------------------------------------------------

	/**
	 * index method
	 *
	 * Generally 
	 *
	 */
	public function do_upload($path,$name_atribute)
	{
		$upPath=$path;
		if(!file_exists($upPath)) 
		{
			$oldmask = umask(0);
			mkdir($upPath, 0777, true);
			umask($oldmask);
		}

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '10000';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';
		$config["encrypt_name"] = true;
		$config["remove_spaces"] = true;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		
		$userFile=$this->input->post($name_atribute);

		if ( ! $this->upload->do_upload($name_atribute))
		{
			$error = array('error' => $this->upload->display_errors());
			$error['path']=$upPath;
			return $error;
		}
		else
		{
			$success = array('upload_data' => $this->upload->data());
			return $success;

		}

	}


	public function do_upload_documents($path,$name_atribute)
	{
		$upPath=$path;
		if(!file_exists($upPath)) 
		{
			$oldmask = umask(0);
			mkdir($upPath, 0777, true);
			umask($oldmask);
		}

		$config['upload_path'] = $upPath;
		$config['allowed_types'] = 'pdf|gif|jpg|png|docx|doc|txt|rtf|docx';
		$config['max_size']	= '10000';
		$config['max_width']  = '';
		$config['max_height']  = '';
		$config["encrypt_name"] = true;
		$config["remove_spaces"] = true;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		$userFile=$this->input->post($name_atribute);

		if ( ! $this->upload->do_upload($name_atribute))
		{
			$error = array('error' => $this->upload->display_errors());
			$error['path']=$upPath;
			return $error;
		}
		else
		{
			$success = array('upload_data' => $this->upload->data());
			return $success;

		}

	}
	
	
public	function next_tx_no() {
	$accno = rand(9999999999, 99999999999);
	$next_id = strlen($accno) != 10 ? substr($accno, 0, 10) : $accno;
	return 'TX'.$next_id;
}

public function str_number($str) {
	$number = '';
	$number = str_replace('$', '', $str);
	$number = str_replace(',', '', $number);
	return doubleval($number);
}
	
	
	
	function uploadProductImage($inputName, $uploadDir)
{
	$image     = $_FILES[$inputName];
	$imagePath = '';
	$thumbnailPath = '';
	
	// if a file is given
	if (trim($image['tmp_name']) != '') {
		$ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];

		// generate a random new file name to avoid name conflict
		$imagePath = md5(rand() * time()) . ".$ext";
		
		list($width, $height, $type, $attr) = getimagesize($image['tmp_name']); 

		// make sure the image width does not exceed the
		// maximum allowed width
		
		if (LIMIT_USER_WIDTH && $width > MAX_USER_IMAGE_WIDTH) {
			$result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_USER_IMAGE_WIDTH);
			$imagePath = $result;
		} else {
			$result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
		}	
		
		if ($result) {
			// create thumbnail
			$thumbnailPath =  md5(rand() * time()) . ".$ext";
			$result = createThumbnail($uploadDir . $imagePath, $uploadDir . $thumbnailPath, THUMBNAIL_WIDTH);
			
			// create thumbnail failed, delete the image
			if (!$result) {
				unlink($uploadDir . $imagePath);
				$imagePath = $thumbnailPath = '';
			} else {
				$thumbnailPath = $result;
			}	
		} else {
			// the product cannot be upload / resized
			$imagePath = $thumbnailPath = '';
		}
		
	}
	
	return array('image' => $imagePath, 'thumbnail' => $thumbnailPath);
}


/*
	Create a thumbnail of $srcFile and save it to $destFile.
	The thumbnail will be $width pixels.
*/
function createThumbnail($srcFile, $destFile, $width, $quality = 75)
{
	$thumbnail = '';
	
	if (file_exists($srcFile)  && isset($destFile))
	{
		$size        = getimagesize($srcFile);
		$w           = number_format($width, 0, ',', '');
		$h           = number_format(($size[1] / $size[0]) * $width, 0, ',', '');
		
		$thumbnail =  copyImage($srcFile, $destFile, $w, $h, $quality);
	}
	
	// return the thumbnail file name on sucess or blank on fail
	return basename($thumbnail);
}

/*
	Copy an image to a destination file. The destination
	image size will be $w X $h pixels
*/
function copyImage($srcFile, $destFile, $w, $h, $quality = 75)
{
    $tmpSrc     = pathinfo(strtolower($srcFile));
    $tmpDest    = pathinfo(strtolower($destFile));
    $size       = getimagesize($srcFile);

    if ($tmpDest['extension'] == "gif" || $tmpDest['extension'] == "jpg")
    {
       $destFile  = substr_replace($destFile, 'jpg', -3);
       $dest      = imagecreatetruecolor($w, $h);
       imageantialias($dest, TRUE);
    } elseif ($tmpDest['extension'] == "png") {
       $dest = imagecreatetruecolor($w, $h);
       imageantialias($dest, TRUE);
    } else {
      return false;
    }

    switch($size[2])
    {
       case 1:       //GIF
           $src = imagecreatefromgif($srcFile);
           break;
       case 2:       //JPEG
           $src = imagecreatefromjpeg($srcFile);
           break;
       case 3:       //PNG
           $src = imagecreatefrompng($srcFile);
           break;
       default:
           return false;
           break;
    }

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);

    switch($size[2])
    {
       case 1:
       case 2:
           imagejpeg($dest,$destFile, $quality);
           break;
       case 3:
           imagepng($dest,$destFile);
    }
    return $destFile;

}

function taxtion($trans_m){
	
	$dection=(0.02*$trans_m);
return $dection;	
}



	
	
 public function send_email($data) {
	$to = $data['to'];
	$sub = $data['sub'];
	$msg = $data['msg'];
	$message = $this->get_email_msg($data);
	$header = "From:bamwinealbert@gmail.com \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";
	$retval = mail ($to,$sub,$message,$header);
}

 public function get_email_msg($data) {
	$msg_text = "";
	
	switch($data['msg']) {
		
		case 'acc_open':
			$msg_text = '';
		break;
		
		case 'otp':
			$msg_text = sprintf("Your one time Transaction Authorization Code : %u", $data['token']);
		break;
		
		case 'change_pwd':
			$msg_text = sprintf("Your password is successfully changed. New Password is : %s", $data['pwd']);
		break;
		
		case 'change_pin':
			$msg_text = sprintf("Your PIN is successfully changed. New PIN is : %u", $data['pin']);
		break;		
		
		case 'transfer':
			$msg_text = $data['body'];
		break;
		
		case 'register':
			$msg_text = $data['body'];
		break;
		
	}//switch
	return $msg_text;
}

function get_image_url($type = '') {
        if (file_exists('uploads/' . $type ))
            $image_url = base_url() . 'uploads/' . $type;
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }
	
}
