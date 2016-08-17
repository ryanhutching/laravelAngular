<?php

namespace App\Services;
use App\Models\Club;

use App\Helpers\Helpers;
use Validator;

class ClubService
{

    /** @var Club $club */
    protected $club;

    /**
     * @param Club $club
     * */
    public function __construct(Club $club) {
        $this->club = $club;
    }

    /** Return All Clubs With All Relations */
    public function getAllClubs() {
        return $this->club->getAllClubs();
    }

    /** Return All Clubs With Teams */
    public function getAllClubsWithTeams() {
        return $this->club->with('team')->get();
    }

    /**
     * @param array $data
     * @return array
     */
    public function create($data)
    {
        $validator = $this->_clubFormValidation($data);
        if ($validator['success']) {

            if(isset($data['myImage'])) {
                $type = Helpers::getBase64FileType($data['myImage']);
                if($type) {
                    $name = uniqid();
                    $data['logo'] = $name.$type;

                    Helpers::uploadBase64File($data['myImage'], 'assets/images/clubs/', $data['logo']);
                    Helpers::uploadBase64File($data['myCroppedImage'], 'assets/images/clubs/croped/', $data['logo']);
                } else {
                    return ['success' => false, 'message' => ["Unknown image Type"]];
                }
            } else {
                $data['logo'] = "no_image.jpg";
            }

            $this->club->create($data);
        }
        return $validator;
    }

    /**  */
    public function edit() {

    }

    /**
     * @param int $id
     * */
    public function deleteById($id) {

    }


    /**
     * Validate Club Creating Form Inputs
     * @param array $data
     * @return array
     */
    private function _clubFormValidation($data) {

        $validator = Validator::make($data,[
            'name' => 'required|max:60|string',
            'short_name' => 'required|max:3|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'string',
            'stadium_id' => 'integer',
            'user_id' => 'integer',
            'myImage' => 'string',
            'myCroppedImage' => 'string'
        ]);

        if($validator->fails()) {
            return ['success' => false, 'message' => $validator->messages()];
        }
        return ['success' => true, 'message' => ["Successfull"]];
    }

}











