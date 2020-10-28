<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\VoteItem;
use App\Models\Shareholder;

class DashboardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $vote_item = VoteItem::find(route('item'));
        // $shareholder = VoteItem::find(route('shareholder'));

        // $isAllowed1 = $this->user()->any(['create', 'view', 'view-any', 'update-admin']);
        // $isAllowed2 = $this->user()->can('update-shareholder-isEligible', $shareholder);

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
            //
        ];
    }
}
