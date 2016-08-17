<?php

namespace App\Services;
use App\Models\User;

class UserService
{
    /**
     * @var array|null $user
    */
    public $user = null;

    /**
     * Construct for initialize $user
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Create new User
     * @param array $data
     * @return array
     */
    public function create($data)
    {
        $validator = $this->_userFormValidation($data);
        if ($validator['success']) {

            if(isset($data['myImage'])) {
                $type = Helpers::getBase64FileType($data['myImage']);
                if($type) {
                    $name = uniqid();
                    $data['photo'] = $name.$type;

                    Helpers::uploadBase64File($data['myImage'], 'assets/images/users/', $data['photo']);
                    Helpers::uploadBase64File($data['myCroppedImage'], 'assets/images/users/croped/', $data['photo']);
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
     * Get all Users
     * @return array
     */
    public function getAllUsers() {
        return $this->user->all();
    }

    /**
     * Validate User Creating Form Inputs
     * @param array $data
     * @return array
     */
    private function _userFormValidation($data) {

        $validator = Validator::make($data,[
            'name' => 'required|max:60|string',
            'last_name' => 'required|max:80|string',
            'email' => 'required|unique:users',
            'phone_number' => 'string',
            'address' => 'string',
            'myImage' => 'string',
            'myCroppedImage' => 'string',
            'role' => 'required|in:superadmin,association,teammanager',
            'status' => 'in:created,invited,active',
            'account_type' => 'required|in:premium,free,silver,gold'
        ]);

        if($validator->fails()) {
            return ['success' => false, 'message' => $validator->messages()];
        }
        return ['success' => true, 'message' => ["Successfull"]];
    }
}