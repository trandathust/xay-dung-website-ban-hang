<?php

namespace App\Traits;
use Storage;
trait StorageImageTrait{
	public function storageTraitUpload($request,$fieldName,$folderName){
		if($request -> hasFile($fieldName)){
			$file = $request-> $fieldName;
			$filenameOrigin = $file->getClientOriginalName();
			$filenameHash =str_random(20) .'.' . $file->getClientOriginalExtension();
			$filepath = $request->file($fieldName)->storeAs('public/' . $folderName .'/' . auth() -> id(),$filenameHash);
			$dataUploadTrait = [
				'file_name' => $filenameOrigin,
				'file_path' => Storage::url($filepath)
			];
			return $dataUploadTrait;
		}
		return null;
	}


	public function storageTraitUploadMutiple($file, $folderName){
		$filenameOrigin = $file->getClientOriginalName();
		$filenameHash =str_random(20) .'.' . $file->getClientOriginalExtension();
		$filepath = $file->storeAs('public/' . $folderName .'/' . auth() -> id(),$filenameHash);
		$dataUploadTrait = [
			'file_name' => $filenameOrigin,
			'file_path' => Storage::url($filepath)
		];
		return $dataUploadTrait;
	}
} 