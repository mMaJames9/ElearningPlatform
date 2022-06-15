<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exam_id' => ['required'],
            'subject_id' => ['required'],
            'document_serie' => ['required', 'string', 'max:255'],
            'document_session' => ['nullable', 'string', 'max:255'],
            'document_title' => ['nullable', 'string', 'max:255', 'unique:documents, document_title' . request()->route('document')->id],
            'document_type' => ['required', 'string', 'max:255'],
            'document_description' => ['nullable', 'string', 'max:1000'],
            'document_price' => ['required', 'string', 'max:255'],
            'document_path' => ['required', 'mimes:pdf', 'max:2048'],
            'correction_path' => ['nullable', 'mimes:pdf', 'max:2048'],
        ];
    }
}
