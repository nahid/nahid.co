<?php namespace Nahidz\Tagx;

use App\Models\Tags;
use App\Models\Tagged;

class Tagx{

	function __construct(){

	}

	protected function makeInsertableData($data, $diaryId){
		$insertableData=[];
		$newData = explode(',', $data);

		foreach($newData as $tagId){
			$tagId=trim((int)$tagId);
			$insertableData[]=['diary_id' => $diaryId, 'tag_id' => $tagId];
		}

		return $insertableData;

	}

	public function saveTagged($data, $diaryId){
		$save=Tagged::insert($this->makeInsertableData($data, $diaryId));
		if($save){
			return true;
		}

		return false;
	}

	
}
