<?php

class Files {

	public static function scanDir($dir){

		$dirEntry = scandir($dir);
		$files = [];

		if(!empty($dirEntry)){

			$dirEntry = Files::trimDir($dirEntry);

			foreach($dirEntry as $objects){

				if(is_dir($dir . '/' . $objects)){

					$objects_dir = scandir($dir . '/' . $objects);

					$objects_dir = Files::trimDir($objects_dir);


					foreach ($objects_dir as $object){

						if(is_dir($dir . '/' . $objects . '/' . $object)){

							$object_dir = scandir($dir . '/' . $objects . '/' . $object);


							$object_dir = Files::trimDir($object_dir);


							foreach($object_dir as $item){

								if(is_dir($dir . '/' . $objects . '/' . $object . '/' . $item)){
									$item_dir = scandir($dir . '/' . $objects . '/' . $object . '/' . $item);
									foreach ($item_dir as $it){
										$files[$it];
									}
								}else{
									$files[] = $item;
								}

							}

						}else{
							$files[] = $object;
						}
					}


				}else{
					$files[] = $objects;
				}

			}

		}

		return self::trimFiles($files);

	}

	public static function trimFiles($files){

		$trimFiles = [];

		foreach ($files as $file){
			if(strpos($file, '.css') !== false ||
				strpos($file, '.js')){

				if(strpos($file, '.json') !== false ||
					strpos($file, '.map') !== false){
					continue;
				}

				$trimFiles[] = $file;
			}
		}

		return $trimFiles;

	}

	public static function trimDir($dir){

		if(in_array('.', $dir)){
			unset($dir[array_search('.', $dir)]);
		}
		if(in_array('..', $dir)){
			unset($dir[array_search('..', $dir)]);
		}

		return $dir;

	}
}

new Files();