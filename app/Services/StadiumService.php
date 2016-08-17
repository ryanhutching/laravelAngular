<?php

namespace App\Services;
use App\Models\Stadiums;

class StadiumService
{

    /**
     * @var array|null $stadium
     */
    public $stadium = null;

    /**
     * Construct for initialize $stadium
     * @param Stadiums $stadium
     */
    public function __construct(Stadiums $stadium) {
        $this->stadium = $stadium;
    }

    /**
     * @param array $data
     * @return array
     */
    public function create($data)
    {
        $validator = $this->_stadiumFormValidation($data);
        if ($validator['success']) {

            if(isset($data['myImage'])) {
                $type = Helpers::getBase64FileType($data['myImage']);
                if($type) {
                    $name = uniqid();
                    $data['photo'] = $name.$type;

                    Helpers::uploadBase64File($data['myImage'], 'assets/images/stadiums/', $data['photo']);
                    Helpers::uploadBase64File($data['myCroppedImage'], 'assets/images/stadiums/croped/', $data['photo']);
                } else {
                    return ['success' => false, 'message' => ["Unknown image Type"]];
                }
            } else {
                $data['photo'] = "no_image.jpg";
            }

            $this->stadium->create($data);
        }
        return $validator;
    }


    /**
     * Get all stadiums
     * @return array
     */
    public function getAllStadiums() {
        return $this->stadium->all();
    }

    /**
     * Get all stadiums with clubs
     * @return array
     */
    public function getStadiumsWithClubs() {
        return $this->stadium->with('club')->get();
    }

    /**
     * Validate Stadium Creating Form Inputs
     * @param array $data
     * @return array
     */
    private function _stadiumFormValidation($data) {

        $validator = Validator::make($data,[
            'name' => 'required|max:60|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'string',
            'myImage' => 'string',
            'myCroppedImage' => 'string'
        ]);

        if($validator->fails()) {
            return ['success' => false, 'message' => $validator->messages()];
        }
        return ['success' => true, 'message' => ["Successfull"]];
    }
}