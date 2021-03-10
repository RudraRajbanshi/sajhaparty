@if($type == 'foreign')

<tr>
        <th>
            {{ trans('cruds.member.fields.current_country') }}
        </th>
        <td>
            {{$address->province ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.foreign_country_address') }}
        </th>
        <td>
            {{$address->district ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.foreign_country_zip_code') }}
        </th>
        <td>
            {{$address->toll_no ?? ''}}
        </td>
    </tr>
@else
    <tr>
        <th>
            {{ trans('cruds.member.fields.province') }}
        </th>
        <td>
            {{$address->province ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.district') }}
        </th>
        <td>
            {{$address->district ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.municipality') }}
        </th>
        <td>
            {{$address->municipality ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.ward_no') }}
        </th>
        <td>
            {{$address->ward_no ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.toll_no') }}
        </th>
        <td>
            {{$address->toll_no ?? ''}}
        </td>
    </tr>
@endif