<?php
/**
 * Created by PhpStorm.
 * User: Hieu
 * Date: 5/8/2015
 * Time: 4:15 AM
 */

namespace helpers;


class File {

	public static function saveFile($file)
	{
		$fileModel = new \models\file();
		if (0 < $file['error'])
		{
			throw new \Exception('Error: ' . $file['error'] . '<br>');
		}
		else
		{
			move_uploaded_file($file['tmp_name'], 'img/' . $file['name']);
		}

		$obj = array(
			'file_name'     => $file['name'],
			'extension'     => pathinfo($file['name'], PATHINFO_EXTENSION),
			'path'          => 'img/',
			'uploaded_user' => Session::get('user')->id,
			'date_created'  => date('Y-m-d H:i:s')
		);

		return $fileModel->insert($obj);
	}
}