<?php

namespace App\Http\Requests;

use App\Repositories\UserRolesRepository;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return $this->checkAuth([
            'creative-hub-admin',
            'controller',
            'client',
            'creative-hub-team'
        ]);
    }

    public function checkAuth($data)
    {
        $userId = Auth::id();
        if (!$userId) {
            return false;
        }
        $userRepo = new UserRolesRepository();
        $userRoles = $userRepo->findUserRolesByUserId($userId);
        $tes = [];

        foreach ($userRoles as $role) {
            if(in_array($role['nama'],$data)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'string|required',
            'email' => 'nullable|string',
            'password' => 'min:8|string',
            'lokasi' => 'string',
            'nomor_telepon' =>'nullable|string|max_digits:15',
            'alamat' =>'nullable|string',
            'profil_detail' =>'nullable|string',
            'website' =>'nullable|string',
            'tag_line'=>'nullable|string',
            'fee'=> 'nullable|int',
            'spesialisasi' => 'nullable',
            'media_sosial' => 'nullable|string'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'message' => 'Validasi gagal',
            'errors' => $validator->errors(),
        ];

        throw new ValidationException($validator, response()->json($response, 422));
    }
}
