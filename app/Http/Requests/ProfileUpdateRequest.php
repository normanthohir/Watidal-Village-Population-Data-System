<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'keterangan_user' => ['nullable', 'string', 'max:255'],
            'username' => ['string', 'max:255'],
            // 'status_user' => ['nullable', 'string', 'max:255'],
            'desa_kelurahan_user' => ['nullable', 'string', 'max:255'],
            'kecamatan_user' => ['nullable', 'string', 'max:255'],
            'kabupaten_kota_user' => ['nullable', 'string', 'max:255'],
            'provinsi_user' => ['nullable', 'string', 'max:255'],
            'rt_user' => ['nullable', 'string', 'max:255'],
            'rw_user' => ['nullable', 'string', 'max:255'],
        ];
    }
}
