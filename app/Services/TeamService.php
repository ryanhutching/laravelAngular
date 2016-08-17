<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 16-Mar-16
 * Time: 10:37 AM
 */

namespace App\Services;
use App\Models\Team;

class TeamService
{

    /**
     * @var array|null $team
     */
    public $team = null;

    /**
     * Construct for initialize $team
     * @param Team $team
     */
    public function __construct(Team $team) {
        $this->team = $team;
    }

    /**
     * @param array $data
     * @return array
     */
    public function create($data)
    {
        $validator = $this->_teamFormValidation($data);

        if ($validator['success']) {
            $this->team->create($data);
        }

        return $validator;
    }

    /**
     * Validate Team Creating Form Inputs
     * @param array $data
     * @return array
     */
    private function _teamFormValidation($data) {

        $validator = Validator::make($data,[
            'club_id' => 'required|integer|min:1',
            'stadium_id' => 'integer|min:1',
            'type' => 'required|in:MEN,WOMEN,YOUTH',
        ]);

        if($validator->fails()) {
            return ['success' => false, 'message' => $validator->messages()];
        }
        return ['success' => true, 'message' => ["Successfull"]];
    }
}